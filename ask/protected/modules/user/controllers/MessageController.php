<?php
class MessageController extends CController {

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
    public function actionIndex() {

    }
    //列举出我咨询过的问题
    public  function actionMyask() {
        //CPagination代表分页信息,有多少页，每页几条记录等
        //CLinkPager生成分页的代码,自定义css可以给属性cssFile一个值

        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
        $criteria->select="t.ID,t.Title,AddDate"; //只取需要的字段
        $criteria->condition="SenderID=" .app()->user->id . " and Fatherid=0"; //构建我发布过的咨询
        $criteria->order="t.ID desc"; //按最新的进行排序
        $criteria->with=array('oaskreply'
                =>array('select'=> 'ID,name,TrueName') //联合查询，回复发布者是谁
        );

        $cachename="message_user_myask_"  .  app()->user->id;
        if(cache()->get($cachename)) {
            $num = cache()->get($cachename);
        }else {
            $num = Message::model()->count($criteria);
            cache()->set($cachename,$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=Message::model()->findAll($criteria);
        $this->render('myask',array('pages'=>$pages,'questions'=>$questions));
    }
    //咨询我的问题
    public function actionAskme() {
        //CPagination代表分页信息,有多少页，每页几条记录等
        //CLinkPager生成分页的代码,自定义css可以给属性cssFile一个值
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
        $criteria->select="t.ID,t.Title,t.AddDate"; //只取需要的字段
        $criteria->condition="AddresseeId=" .app()->user->id . " and Fatherid=0"; //构建查询我的咨询
        $criteria->order="t.ID desc"; //按最新的进行排序
        $criteria->with=array('oaskuser'
                =>array('select'=> 'ID,name,TrueName') //联合查询，回复发布者是谁
        );
        $criteria->limit=3;
        $cachename="message_askme_".app()->user->id;
        if(cache()->get($cachename)) {
            $num = cache()->get($cachename);
        }else {

            $num = Message::model()->count($criteria);

            cache()->set($cachename,$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=Message::model()->findAll($criteria);
        $this->render('askme',array('pages'=>$pages,'questions'=>$questions));
    }
    //律师回复的咨询
    public function actionyhf() {
        //CPagination代表分页信息,有多少页，每页几条记录等
        //CLinkPager生成分页的代码,自定义css可以给属性cssFile一个值
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
        $criteria->select="t.ID,t.Title,t.AddDate"; //只取需要的字段
        $criteria->condition="SenderID=" .app()->user->id . " and Fatherid=0 and t.ReplyDate>t.AddDate"; //构建查询我的咨询
        $criteria->order="t.ID desc"; //按最新的进行排序
        $criteria->with=array('oaskreply'
                =>array('select'=> 'ID,name,TrueName') //联合查询，回复发布者是谁
        );
        $cachename="message_yhf_" .app()->user->id;
        if(cache()->get($cachename)) {
            $num = cache()->get($cachename);
        }else {
            $num = Message::model()->count($criteria);
            cache()->set($cachename,$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=Message::model()->findAll($criteria);
        $this->render('yhf',array('pages'=>$pages,'questions'=>$questions));
    }
    //咨询我的问题
    public function actionyjd() {
        //CPagination代表分页信息,有多少页，每页几条记录等
        //CLinkPager生成分页的代码,自定义css可以给属性cssFile一个值
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
        $criteria->select="t.ID,t.Title,t.AddDate"; //只取需要的字段
        $criteria->condition="AddresseeId=" .app()->user->id . " and Fatherid=0 and t.ReplyDate>t.AddDate"; //构建查询我的咨询
        $criteria->order="t.ID desc"; //按最新的进行排序
        $criteria->with=array('oaskuser'
                =>array('select'=> 'ID,name,TrueName') //联合查询，回复发布者是谁
        );
        $cachename="message_yjd_" .app()->user->id;
        if(cache()->get($cachename)) {
            $num = cache()->get($cachename);
        }else {
            $num = Message::model()->count($criteria);
            cache()->set($cachename,$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=Message::model()->findAll($criteria);
        $this->render('yjd',array('pages'=>$pages,'questions'=>$questions));
    }

    //保存一对一咨询的回复结果
    public function actionsaveanswermessage($id) {    //获取到信息
        $content=$_POST["Content"];
        $senderid=$_POST["SenderID"];
        $title="咨询回复";
        $messageid=(int)$id;
        $addressid=0;
        $state=1;
        $fbrq=date('Y-m-d h:i:s');
        //开始保存记录
        if(!empty ($messageid) &&  !empty ($senderid) && !empty ($content)) {
            $newreply=new Message();
            $content=CHtml::encode($content);//过滤特殊字符
            $newreply->AddDate=$fbrq;
            $newreply->AddresseeID=0;
            $newreply->Content=$content;
            $newreply->FatherID=$messageid;
            $newreply->Title="咨询回复";
            $newreply->AddDate=$fbrq;
            $newreply->ReplyDate=$fbrq;
            $newreply->SenderID=app()->user->id;
            $newreply->save(FALSE);
            //同步更新咨询最后的回复人
            $message=Message::model()->findByPk($messageid);
            $message->LastReply=$senderid;
            $message->ReplyDate=date("Y-m-d h:i:s"); //更新回复日期
            $message->save(false);
            //最后回复信息保存完毕
            //清空缓存
            cache()->delete('message_my_list' . $messageid);
            $cachenamne='message_my_list' . $messageid;
            $this->render('saveAnswermessage',url('user/message/view',array('id'=>$messageid)));
            app()->msg->message('信息回复成功',url('user/message/view',array('id'=>$messageid)));
        }
        else {
            $this->render('saveAnswermessage',url('user/message/view',array('id'=>$messageid)));
            AskTool::GoToback('发送失败！');
        }
    }
    /**
     * 分页列出的例子，及数据缓存的演示
     * 以oask_question表为例
     *
     */
    public function actionlistmessage() {

        //CPagination代表分页信息,有多少页，每页几条记录等
        //CLinkPager生成分页的代码,自定义css可以给属性cssFile一个值
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
        $criteria->condition="t.id>10000";
        $criteria->select="ID,Title";
        /* $criteria->with=array('oaskuser'
                                   =>array('select'=> 'ID,name,TrueName',"condition"=>"oaskuser.ID=1")
             );     
        */
        $criteria->with=array('oaskuser'
                =>array('select'=> 'ID,name,TrueName')
        );
        if(cache()->get('questionnum')) {
            $num = cache()->get('questionnum');
        }else {
            $num = Message::model()->count($criteria);
            cache()->set('questionnum',$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=10;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=Message::model()->findAll($criteria);
        $this->render('listmessage',array('pages'=>$pages,'questions'=>$questions));

    }
    /**
     * question详情页
     * Enter description here ...
     * @param unknown_type $id
     */
    public function actionShowMessage($id) {
        $id = (int)$id;
        $question = Message::model()->with('oaskuser')->findByPk($id);
        $this->render('showmessage',array('question'=>$question));
    }
    /**
     * 删除演示
     * Enter description here ...
     * @param unknown_type $id
     */
    public function actionDelQuestion($id) {
        $id = (int)$id;
        Message::model()->deleteByPk($id);
        app()->request->redirect(url('ask/listquestion', array('name'=>'terry')));
    }

    /**
     * 添加验示，为oask_question表中加一条记录
     * Enter description here ...
     */
    public function actionCreateQuestion() {
        $model=new Message();
        if(isset($_POST['Message'])) {
            $model->attributes=$_POST['Message'];
            if($model->validate()) {
                app()->user->setFlash('success','发布成功');
                //存的时候就不验证了;
                $r = $model->save(false);
                $this->refresh();
            }
        }
        $this->render('create',array('model'=>$model));
    }
    /**
     * 修改验示，为中加一条记录
     * Enter description here ...
     */
    public function actionEditMessage($id) {
        $id = (int)$id;
        $model=Message::model()->findByPk($id);
        if(isset($_POST['Message'])) {
            $model->attributes=$_POST['Message'];
            if($model->validate()) {
                app()->user->setFlash('success','更新成功');
                $model->save(false);
                app()->request->redirect(url('message/listmessage', array('name'=>'terry')));
            }
        }
        $this->render('editmessage',array('model'=>$model));
    }
    //浏览一条记录
    public function actionView($id) {  //接收参数id
        $messageid=(int)$id;
        // echo   $messageid; //输出id作为测试
        if( empty($messageid)) { //如果输入的id无效，那么以什么已不操作
            return null;
        }
        //读取需要的一对一咨询信息
        $criteria_msg = new CDbCriteria();
        $criteria_msg->select="ID,Title,Content,SenderID,FatherID,SenderID,AddresseeID,AddDate";
        $criteria_msg->condition="t.ID=$messageid";
        $criteria_msg->limit=1;
        $criteria_msg->with=array('oaskuser'
                =>array('select'=>'TrueName,LastIP,pnameid,cnameid')
                /*,
                           'oaskreply'=>array('select'=> 'TrueName')
             * 
                */
        );
        $cachenamne='message_my_list_top_' . $messageid;
        if(cache()->get($cachenamne)) {
            $questions = cache()->get($cachenamne);
        }
        else {
            $questions=Message::model()->find($criteria_msg);
            cache()->set($cachenamne,$questions,600); //缓存10分钟
        }
        //读取回复信息
        $criteria = new CDbCriteria();
        $criteria->select="t.ID,t.Title,t.Content,ReplyDate"; //只取需要的字段
        $criteria->condition="Fatherid=$messageid"; //构建查询我的咨询
        $criteria->limit=5;
        $criteria->order="t.ID desc"; //按最新的进行排序
        $criteria->with=array('oaskuser'
                =>array('select'=> 'ID,name,TrueName,LastIP'),
                'oaskreply'=>array('select'=> 'TrueName')
        );
        //联合查询回复人
        //缓存一下
        $cachenamne='message_my_list' . $messageid;
        if(cache()->get($cachenamne)) {
            $questons_answer = cache()->get($cachenamne);
        }else {
            $questons_answer=Message::model()->findall($criteria);
            cache()->set($cachenamne,$questons_answer,600); //缓存10分钟
        }
        // $this->Get_Next($id,$_GET['class'],'prev');

        $this->render('view',array('pages'=>$pages,'questions'=>$questions,'questions_answer'=>$questons_answer,'pnames'=>AskTool::Area_GetPname(),'cnames'=>AskTool::Area_GetCname(),'arrnext'=>$this->Get_Next($id,$_GET['class'],'next'),'arrprv'=>$this->Get_Next($id,$_GET['class'],'prev')));
    }
    //编写函数，获取下一条咨询
    //返回一个二位数组 $id ，$class= 类型名称，$type 是上一个，还是下一个
    private  function  Get_Next($id,$class,$type='next') {
        $criteria = new CDbCriteria();
        $criteria->select="t.ID,t.Title"; //只取需要的字段
        $where=" Fatherid=0 ";
        switch ($class) {
            case "myask": //我发布的问题
                $where=" Fatherid=0 and SenderID=" .app()->user->id;
                break;
            case "yhf"://已回复
                $where=" Fatherid=0 and SenderID=" .app()->user->id .' and t.ReplyDate>t.AddDate';
                break;
            case "askme"://我的所有问题
                $where=" Fatherid=0 and AddresseeID=" .app()->user->id ;
                break;
            case "yjd"://我的已解答的所有问题
                $where=" Fatherid=0 and AddresseeID=" .app()->user->id .' and t.ReplyDate>t.AddDate';
                break;
        }
        $defautlfind="t.ID>$id";
        if ($type=="prev") $defautlfind="t.ID<$id";
        $criteria->condition.=$defautlfind .  " and " .$where  ;
        $criteria->order="t.ID desc";
        $questons_answer=Message::model()->find($criteria);
        $ArryMsg=array();
        if ($questons_answer!=null) {
            $ArryMsg['id']=$questons_answer->ID;
            $ArryMsg['Title']=$questons_answer->Title;
        }
        else {
            $ArryMsg['id']=0;
            $ArryMsg['Title']="没有了";
        }
        // echo "prv=" .$ArryMsg['id'] ;
        return $ArryMsg;
    }

    //过滤脚本
    public function filters() {
        return array(
                'accessControl'
        );
    }
    public function accessRules() {
        return array(
                array('allow',
                        'users' => array('@'),
                ),
                array('deny',
                        'users' => array('*'),
                )
        );
    }
}