<?php
class ZixunController extends Controller {
    public $layout = '//layouts/ask';
    public $defaultAction = 'publish';
    public $errormsg;
    public function actionTest() {

    }
    public function actions() {
        return array(
                // captcha action renders the CAPTCHA image displayed on the contact page
                'captcha'=>array(
                        'class'=>'CCaptchaAction',
                        'backColor'=>0xFFFFFF,
                        'width' => 70,
                        'maxLength' => 4,
                        'minLength' => 4,
                        'foreColor' => 0xFF0000,
                        'padding' => 3,
                ),
        );
    }

    public function actionPublish() {
        $model=new OaskQuestion();
        $model->attributes=$_POST['OaskQuestion'];
        //删除session
        app()->session->remove('pwd');
        app()->session->remove('youkie');
        app()->session->remove('qid');
    
        if(isset($_POST['OaskQuestion']) && isset($_POST['pnameid'])) {
//            $model->attributes=$_POST['OaskQuestion'];
            $model->pnameid = $_POST['pnameid'];
            $model->cnameid = $_POST['cnameid'];
            $model->xnameid = $_POST['xnameid'];
           // $model->xnameid= $_POST['xnameid'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $qq = $_POST['qq'];
            //去掉特殊标签，包括html标签
            $model->title = AskTool::filterSpecialChars($model->title);
            $model->content = AskTool::filterSpecialChars($model->content);
            if(!$_POST['son']) {
                //$pa = new WordSplit();
                //$keys = $pa->doSplit($model->title);

                //获得自动匹配的关键字缓存
                $keys = OaskKeyItem::getCachedItem();
                $title = $model->title;
                foreach ($keys as $k=>$v) {
                    if(strpos($title, $k)!==false) {
                        $id = $v;
                        $class = AskTool::getOaskClass($id);
                        $model->fatherID = $class->fatherID;
                        $model->fenleiid = $id;
                        $model->topic  = $class->topic;
                    }
                }
                if(!$model->fatherID) {
                    /*$model->fatherID = 1;
		        	$model->fenleiid = 1;
		        	$model->topic = '民事类';*/
                    //added by weihan
                    $randFenlei = AskTool::randomFenlei();
                    $model->fatherID = $randFenlei[0];
                    $model->fenleiid = $randFenlei[1];
                    $model->topic = $randFenlei[2];
                }

            }else {
                $model->fatherID = intval($_POST['father']);
                $model->fenleiid =intval($_POST['son']);
                $category = explode(',',$_POST['category']);
                $model->topic = $category[1];	            
            }
            //处理违禁词
            //声明违禁词变量
            $isbadquestion=false;
            if(!Banner::filter($model->title) || !Banner::filter($model->content)) {
                //echo 'y';
                //  $model->addError('title', '你发布的信息中有敏感词，请修改后再发');
                $isbadquestion=TRUE;
            }
            if($model->validate()) {
                //保存前判断一下topic
                if(empty($model->topic) &&  $model->fenleiid>0)
                  {
                        $class = AskTool::getOaskClass($model->fenleiid);
                        $model->fatherID = $class->fatherID;
                        //$model->fenleiid = $id;
                        $model->topic  = $class->topic;
                  }
                 
                //存的时候就不验证了;
                $id = $model->save(false);               
                app()->user->setFlash('success','发布成功');
                //把咨询id保存到session中
                app()->session->add('qid',$model->ID);              
                if(app()->user->isguest) {
                  
                    //生成随机用户，并返回数组
                    $user = AskTool::makeRandUser($model->pnameid, $model->cnameid, $email, $phone,$qq,$model->xnameid);
                    //更新问题作者
                    $model->sender = $user['name'];
                    /*违禁词变量处理开始 */
                    if($isbadquestion) {
                        $model->jie=44;
                        $model->state=44;//方便区分是否为删除咨询
                    }
                    /*违禁词变量处理结束 */
                   // $model->save(false);
                    //用户登陆
                    $modeluser=new LoginForm();
                    $modeluser->username = $user['name'];
                    $modeluser->password = $user['pwd'];
                    $modeluser->rememberMe = TRUE;
                    app()->session->add('pwd',$user['pwd']);
                    app()->session->add('youke','youke');
                    $modeluser->validate();
                    $modeluser->login();
                }
                //发邮件		added by weihan
                sendMail::send('您的法律问题已经成功发布，请查收', app()->user->id, $model->ID, $model->title, 14);
            
                if($isbadquestion) {
                    app()->request->redirect(url('zixun/publishok_wjc'));
                }
                else {
                    app()->request->redirect(url('zixun/publishok'));
                }

            }

        }
        $this->pageTitle = '免费律师在线咨询-免费法律咨询';
        cs()->registerMetaTag('免费律师在线咨询', 'keywords');
        cs()->registerMetaTag('免费发布法律咨询，法律问题在线提问，中顾网提供免费律师在线咨询解答。', 'description');
        $this->render('publish',array('model'=>$model));
    }
    public  function actionpublishok_wjc()
    {    if(!app()->user->id) throw new CHttpException(404);
        $this->pageTitle ='您的咨询发布成功！';
        //cs()->registerMetaTag( $model->title, 'keywords');
        //cs()->registerMetaTag($model->title . '免费法律咨询,法律在线咨询,律师在线咨询', 'description');
        if(isset($_POST['name'])) {
            //检验用户名是否合法
            if($this->ChkUser($_POST['name']) && $this->ChkPdw($_POST['pwd'])) {
                //更新随机用户
                $result = AskTool::updateRandUser(app()->user->id,$_POST['name'],$_POST['pwd']);
                //更新问题发送者
                OaskQuestion::model()->updateByPk(app()->session->get('qid'), array('sender'=>$_POST['name']));
                //如果该用户发布过委托，也进行更新
                zgwt::model()->updateAll(array('userName'=>$_POST['name']),"userName='".$_POST['oldname'] ."'");
                //用户登陆
                if($result) {
                    //app()->user->logout();
                    $model=new LoginForm();
                    $model->username = $_POST['name'];
                    $model->password = $_POST['pwd'];
                    app()->session->add('pwd',$_POST['pwd']);
                    app()->session->add('youke',null);
                    $model->validate();
                    $model->login();
                    echo "<script>alert('修改成功！')</script>";
                }
            }
            else {//如果匹配不上，那么什么也不操作
                // AskTool::GoToback('用户名或密码不符合规范');

            }
        }
        $models=OaskQuestion::model()->findByPk(app()->session->get('qid'));
        //获取类别缓存
        $oask_class=AskTool::OaskClass_GetClass();
        $citylist=AskTool::Area_GetCname();
        $key = OaskKeyItem::model()->find(array('select'=>'KeyStr', 'condition'=>"charindex(keystr,'{$model->title}')>0", 'order'=>'datalength(keystr) desc,orderid desc'));
        $key = $key->KeyStr;
        $listsolved=$this->Getlistbykey($key,11,4);
        $this->render('publishok_wjc',array('models'=>$models,'oaskclass'=>$oask_class,'citylist'=>$citylist,'listsolved'=>$listsolved,'errmsg'=>$this->errormsg));
        //$this->render('publishok_wjc',array('model'=>$model));
    }
    //用户名检验
    public function ChkUser($username) {
        //首先根据判断用户名
        $pattern="/^[a-zA-Z][_a-zA-Z0-9]{5,15}$/";//验证用户名
        if(preg_match($pattern, $username)) {
            //检测用户是否重名
            if(!OaskUser::model()->exists("name='$username'")) {

                return true;
            }
            else {
                $this->errormsg='用户名已经存在';
                return false;
            }
        }
        else {
            $this->errormsg='用户名格式不正确';
            return false;
        }
    }
    //密码检验
    public function ChkPdw($psw) {
        //字码要简单一些，只根据长度
        $pwdlength=strlen($psw);
        if($pwdlength>16 || $pwdlength<5) {
            $this->errormsg='密码格式不正确！';
            return false;
        }
        else {
            return true;
        }
    }
    public function actionTests() {
        $this->ChkUser('niedewang');
    }
    public function actionPublishOk() {
        if(!app()->user->id) throw new CHttpException(404);
        $this->pageTitle ='您的咨询发布成功！';
        //cs()->registerMetaTag( $model->title, 'keywords');
        //cs()->registerMetaTag($model->title . '免费法律咨询,法律在线咨询,律师在线咨询', 'description');
        if(isset($_POST['name'])) {
            //检验用户名是否合法
            if($this->ChkUser($_POST['name']) && $this->ChkPdw($_POST['pwd'])) {
                //更新随机用户
                $result = AskTool::updateRandUser(app()->user->id,$_POST['name'],$_POST['pwd']);
                //更新问题发送者
                OaskQuestion::model()->updateByPk(app()->session->get('qid'), array('sender'=>$_POST['name']));
                //如果该用户发布过委托，也进行更新
                zgwt::model()->updateAll(array('userName'=>$_POST['name']),"userName='".$_POST['oldname'] ."'");
                //用户登陆
                if($result) {
                    //app()->user->logout();
                    $model_user=new LoginForm();
                    $model_user->username = $_POST['name'];
                    $model_user->password = $_POST['pwd'];
                    app()->session->add('pwd',$_POST['pwd']);
                    app()->session->add('youke',null);
                    $model_user->validate();
                    $model_user->login();
                    echo "<script>alert('修改成功！')</script>";
                }
            }
            else {//如果匹配不上，那么什么也不操作
                // AskTool::GoToback('用户名或密码不符合规范');

            }
        }
        $models=OaskQuestion::model()->findByPk(app()->session->get('qid'));
        //获取类别缓存
        $oask_class=AskTool::OaskClass_GetClass();
        $citylist=AskTool::Area_GetCname();
        $key = OaskKeyItem::model()->find(array('select'=>'KeyStr', 'condition'=>"charindex(keystr,'{$model->title}')>0", 'order'=>'datalength(keystr) desc,orderid desc'));
        $key = $key->KeyStr;
        $listsolved=$this->Getlistbykey($key,11,4);
        $this->render('publishok',array('models'=>$models,'oaskclass'=>$oask_class,'citylist'=>$citylist,'listsolved'=>$listsolved,'errmsg'=>$this->errormsg));
    }

    //area组件附加
    public function actionArea() {
        //ajax根据省获得市
        if($_GET['pnameid']) {
            if(cache()->get('area_citys_'.$_GET['pnameid'])) {
                $citys = unserialize(cache()->get('area_citys_'.$_GET['pnameid']));
            }else {
                $p = AskCityPname::model()->findByPk($_GET['pnameid']);
                foreach((array)$p->citys as $k=>$v) {
                    $tmp = array(
                            'id' => $v->cnameID,
                            'name' => $v->cname,
                    );
                    $citys[] = $tmp;
                }
                cache()->set('area_citys_'.$_GET['pnameid'],serialize($citys),3600);
            }
            echo CHtml::dropDownList('cnameid', 0, array(0=>'请选择') + CHtml::listData((array)$citys, 'id', 'name'),array('class'=>'ft12 selwidth'));
            $this->renderPartial('blank');
            app()->end();
        }

        //ajax根据市获得区
        if($_GET['cnameid']) {
            if(cache()->get('area_xname_'.$_GET['cnameid'])) {
                $areas = unserialize(cache()->get('area_xname_'.$_GET['cnameid']));

            }else {
                $city = AskCityCname::model()->findByPk($_GET['cnameid']);
                $xs = $city->xians;
                foreach((array)$xs as $k=>$x) {
                    $tmp = array(
                            'id' => $x->xnameid,
                            'name' => $x->xname,
                    );
                    $areas[] = $tmp;
                }
                cache()->set('area_xname_'.$_GET['cnameid'],serialize($areas),3600);
            }

            echo CHtml::dropDownList('xnameid', 0, array(0=>'请选择')+ (array)CHtml::listData((array)$areas, 'id', 'name'),array('class'=>'ft12 selwidth'));
            $this->renderPartial('blank');
            app()->end();
        }


    }

    //category组件附加
    public function actionCategory($id) {
        $v = OaskClass::model()->findByPk((int)$id);
        $sons = $v->son;
        foreach ($sons as $k=>$v) {
            $son[$k]['topic'] = $v->topic;
            $son[$k]['ID'] = $v->ID;
        }
        foreach($son as $kk=>$vv) {
            echo '<span><a href="'.$vv['ID'].'" text="'.$vv['topic'].'">'.$vv['topic'].'</a></span>';
        }
        $this->renderPartial('blank');
        app()->end();
    }

    /**
     * 显示咨询
     * Enter description here ...
     * @param int $id
     */
    public function actionShow($id) {
        $this->layout = '//layouts/askmain';
        if(!$id) throw new CHttpException(404);
        $model = OaskQuestion::model()->with('reply','senduser')->findByPk($id);
        if (count($model) != 1) throw new CHttpException(404);

        $replies = $model->reply;      
        //如果超过3分钟没有回复，设定自动匹配的答案
        if (count($replies) == 0) {
            $isAdded = self::setDefaultAnswer($model->ID, $model->title, $model->sendtime);
            $isAdded && $replies = OaskReply::model()->with('user')->findAllByAttributes(array('qid'=>$model->ID));
        }
        //面包屑导航
        $nav = AskTool::getQuestionNav($model->fenleiid);
        //最佳答案
        $bestReply = OaskReply::model()->with('user')->findByAttributes(array('qid'=>$model->ID), array('condition'=>'NeedVerify=0 and best=1'));
        //分类名
        $OaskClass = AskTool::getOaskClass($model->fenleiid);
        $fenleiName = $OaskClass->topic;
        //根据标题，获取关键字，后面的获取相关咨询等用得到
        $key = OaskKeyItem::model()->find(array('select'=>'KeyStr', 'condition'=>"charindex(keystr,'{$model->title}')>0", 'order'=>'datalength(keystr) desc,orderid desc'));
        $key = $key->KeyStr;
        //已解决相关咨询,先从缓存里面读取，如果没有，则从数据库里面读取，并缓存
        $key_md5 = 'xgzx_' .$key;
        if (!$xgzx = cache()->get($key_md5)) {
            if (!empty($key)) {
                $xgzx = OaskQuestion::model()->findAll(array('select'=>'ID,title', 'limit'=>8, 'condition'=>"jie=1 and contains(title,'{$key}') and title<>'{$model->title}'"));
            }
            //没有获取到数据
            if (empty($key) || empty($xgzx) || count($xgzx) < 8) {
                $xgzx = OaskQuestion::model()->findAll(array('select'=>'ID,title', 'limit'=>8, 'condition'=>"fenleiid={$model->fenleiid} and title<>'{$model->title}' and jie=1", 'order'=>'id desc'));
            }
            //缓存
            cache()->set($key_md5, $xgzx, 3600);
        }
        //热点回复，包含某关键词回复最多的问题
        $key_md5 = 'rdhf_' .$key;
        if (!$rdhf = cache()->get($key_md5)) {

            if (!empty($key)) {
                $rdhf = OaskQuestion::model()->findAll(array('select'=>'ID,title', 'limit'=>8, 'condition'=>"contains(title,'{$key}')", 'order'=>'replys desc'));
            }else {
                $rdhf = OaskQuestion::model()->findAll(array('select'=>'ID,title', 'limit'=>8, 'order'=>'replys desc'));
            }
            //缓存
            cache()->set($key_md5, $rdhf, 3600);
        }

        //周排行
        $week_layers = AskTool::getWeekScoreLawyers(6, $model->pnameid, FALSE);

        //月排行
        $month_layers = AskTool::getMonthScoreLawyers(6, $model->pnameid, FALSE);

        //创建回复控制器
        $replyController = app()->createController('reply/');
        list($replyController, $replyActionID) = $replyController;

        //相关专题
        $zhuanti = AskTool::getZhuanti($model->fenleiid, 30);
        //获取导航部分的关键专题
        $zhuanti_keys = AskTool::getZhuanti_keys($fenleiName);

        //更新点击量
        AskTool::updateViews($id);

        //保存信息
        $parmArr = array(
                'model'=>$model,
                'nav'=>$nav,
                'bestReply'=>$bestReply,
                'OaskClass'=>$OaskClass,
                'fenleiName'=>$fenleiName,
                'key'=>$key,
                'xgzx'=>$xgzx,
                'rdhf'=>$rdhf,
                'week_layers'=>$week_layers,
                'month_layers'=>$month_layers,
                'replyModel'=>OaskReply::model(),
                'replyController'=>$replyController,
                'replies'=>$replies,
                'zhuanti'=>$zhuanti,
                'zhuanti_keys'=>$zhuanti_keys,
        );
        $this->pageTitle=$model->title. '-免费法律咨询-中顾法律网(中国第一法律门户)';
        cs()->registerMetaTag( $model->title, 'keywords');
        cs()->registerMetaTag($model->title . '免费法律咨询,法律在线咨询,律师在线咨询', 'description');
        $this->render('show',$parmArr);
  }

    /*
	 * 问题补充
    */
    public function actionBu($id) {
        $model = OaskQuestion::model()->findByPk($id);
        $model->bu = $_GET['bu'];
        $model->update();
    }

    /**
     * 楼主设置最佳答案
     * 周泉 2011-03-29
     * @$id   咨询编号
     * @$user 回复人用户名
     */
    public function actionSetBestAnswer() {
        //参数不合法
        $qid = (int)$_POST['qid'];
        if(empty($qid)) exit('0');
        $rid = (int)$_POST['rid'];
        if(empty($rid)) exit('0');
        $replyer = $_POST['replyer'];
        if(empty($replyer)) exit('0');
        //已经有最佳答案
        $model = OaskQuestion::model()->findByPk($qid);
        if ($model->jie == 1) exit('-1');
        if (empty(app()->user->name) || $model->sender != app()->user->name) exit('0');
        //设置最佳答案
        $model->jie = 1;
        $model->jieuser = $replyer;
        $model->BContent = AskTool::filterSpecialChars($_POST['best']);
        $model->BDatetime = date('Y-m-d H:i:s', time());
        $model->update();

        //更新回复表中的回复为最佳答案
        $replyModel = OaskReply::model()->findByPk($rid);
        $replyModel->best = 1;
        $replyModel->NeedVerify = 0;
        $replyModel->update();

        //更新回复者积分
        AskTool::addJifen($replyer, 10);

        //向律师发邮件
        sendMail::send4best('恭喜您，您在中顾网的咨询回复被选为最佳答案', $replyer, $qid, 15);

        echo '1';

    }

    /**
     * 显示一个对话框，让楼主对最佳答案发表感谢
     * 周泉 2011-03-29
     */
    public function actionThanksPanel($id) {
        $model = OaskQuestion::model()->findByPk($id);
        if(!$model->jie) throw new CHttpException(404);
        $this->renderPartial('best_answer_panel');
    }

    /**
     * 显示一个对话框，让楼主对最佳答案发表感谢
     * 周泉 2011-03-29
     */
    public function actionThanks($id) {
        $model=new OaskComment();
        if(isset($_POST['OaskComment'])) {
            $model->attributes=$_POST['OaskComment'];
            if($model->validate()) {
                app()->user->setFlash('success','发布感谢成功');
                $r = $model->save(false);
                $this->refresh();
            }
        }
        $this->render('create',array('model'=>$model));
    }

    public function Getkeys($title) {
        $keys = OaskKeyItem::getCachedItem();
        $key='';
        foreach ($keys as $k=>$v) {
            if(strpos($title, $k)!==false) {
                $key= $k;
                break;
            }

        }
        return $key;
    }

    public function Getlistbykey($key,$fenleiid,$num) {

        $sql2=" jie=1 and fenleiid=$fenleiid";
        $lists=array();
        $keyscount=0;

        if(!empty($key)) {//如果含有关键字
            $list=OaskQuestion::model()->findall(array('condition'=>"jie=1 and contains(title,'$key')",'limit'=>$num,'select'=>'ID,title,content','order'=>'ID desc'));
            foreach($list as $k =>$v) {
                $lists[$keyscount]['id']=$v->ID;
                echo $v->ID;
                $lists[$keyscount]['title']=$v->title;
                $lists[$keyscount]['content']=AskTool::str_cut($v->content, 145);
                $keyscount++;
            }
            //如果匹配不上，或者匹配内容不够
        }
        if($keyscount<$num  ) {
            $list=OaskQuestion::model()->findall(array('condition'=>$sql2,'limit'=>$num-$keyscount+1,'select'=>'ID,title,content','order'=>'ID desc'));
            foreach($list as $k =>$v) {
                $lists[$keyscount]['id']=$v->ID;
                $lists[$keyscount]['title']=$v->title;
                $lists[$keyscount]['content']=AskTool::str_cut($v->content, 145);
                $keyscount++;
            }
            return $lists;
        }
    }

    private function setDefaultAnswer($qid, $title, $sendtime) {
        $times = time() - strtotime($sendtime);
        //超过3分钟
        if ($times/60 >= 3) {
            $answer = AskTool::getDefaultAnswer($title);

            if (empty($answer))return ;
            $model = new OaskReply();
            $model->qid = $qid;
            $model->content = $answer->content;
            $model->replyer = $answer->username;
            if($model->save(FALSE)) {
                //更新最后回复人
                OaskQuestion::model()->updateByPk($qid, array('lastuser'=>$model->replyer));

                AskTool::updateReplyNumbers($qid);
                return true;
            }
        }

    }
}