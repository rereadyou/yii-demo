<?php
/* 
 * 历届咨询执行
 * and open the template in the editor.
*/
class AskstarController extends Controller {
    public $Thisweek=1;//第几周
    public $hotclass="11,22,16,20,19,25,35,24,17,15,54,21";
    public  $pnameid=0;//省份id
    public  $cnameid=0; //城市id
    public  $zcid=11; //专长id,默认为婚姻家庭
    public  $pname='北京';
    public  $cname='东城区';
    public  $pnames;
    public  $cnames;
    public  $fenleiids;
    public function actionTest() {
        $this->SetArea();//设置好地区
        echo $this->pname ,'|',$this->cname;
        $jg=paihangbangclass::Area_replynum_best_city($this->cnameid,1);
        print_r($jg);
        exit();
        $jg=AskTool::getWebmasterAnswer('heise81', 3);
        print_r($jg);
        $jg=AskTool::getWebmasterComment('heise81', 3);
        print_r($jg);
    }
    //读取一条数据
    public function actiongetonedatajson() {
        $this->Thisweek=Date('W');
        $fenleiid=(int)$_POST['fenleiid'];
        $cachename="zhuanchangzhixing_" .$this->Thisweek;
        //直接获取到缓存中的数据
        $lsarray=cache()->get($cachename);
        if($lsarray!=null) {
             $this->renderpartial('star_class',array('lsarray'=>$lsarray,'zcid'=>$fenleiid,'oaskclass'=>AskTool::OaskClass_GetClass()));
        }
        else {
            echo "noData";
        }
    }
    public function actionIndex() {

        $this->Thisweek=Date('W');
        $cachename="zhuanchangzhixing_" .$this->Thisweek;
        $lsarray=array();
        if(!$lsarray=cache()->get($cachename)) {
            $criteria = new CDbCriteria();
            //总记录数放到缓存中600秒
            $criteria->select="t.zcid,t.username,t.num,t.bestnum"; //只取需要的字段
            $criteria->condition="t.weeks=" . $this->Thisweek . " "; //获取12个专长
            $criteria->order="t.id desc"; //按最新的进行排序
            $criteria->with=array('oaskuser'
                    =>array('select'=> 'oaskuser.ID,oaskuser.name,oaskuser.TrueName,oaskuser.jifen,oaskuser.mobile,Address,oaskuser.userpic,oaskuser.qq,oaskuser.IsStar,oaskuser.vipstime,WorkID') //联合查询，回复发布者是谁
            );
            $questions=Oaskzczhixing::model()->findAll($criteria);
            foreach($questions as $k=>$v) {
                $lsurl=AskTool::GetLawyerurl($v->oaskuser->ID, $v->oaskuser->name, $v->oaskuser->IsStar);
                $lsaskurl=AskTool::GetLawyeraskurl($v->oaskuser->ID, $v->oaskuser->name, $v->oaskuser->IsStar);
                $lsarray[$v->zcid]['userpic']='http://img.9ask.cn'.$v->oaskuser->userpic;
                $lsarray[$v->zcid]['num']=$v->num;
                $lsarray[$v->zcid]['bestnum']=$v->bestnum;
                if(!empty($v->num)) {
                    $lsarray[$v->zcid]['caina']=number_format(($v->bestnum/$v->num)*1000,2);
                }
                else {
                    $lsarray[$v->zcid]['caina']=1;
                }
                if($lsarray[$v->zcid]['caina']>100)$lsarray[$v->zcid]['caina']=100;
                $lsarray[$v->zcid]['truename']=$v->oaskuser->TrueName;
                $lsarray[$v->zcid]['mobile']=$v->oaskuser->mobile;
                $lsarray[$v->zcid]['address']=$v->oaskuser->Address;
                $lsarray[$v->zcid]['qq']=$v->oaskuser->qq;
                $lsarray[$v->zcid]['lsurl']=$lsurl;
                $lsarray[$v->zcid]['lsaskurl']=$lsaskurl;

                $lsarray[$v->zcid]['work']=AskTool::getLvsuoById($v->oaskuser->WorkID);
                if($v->oaskuser->IsStar==2) {
                    $lsarray[$v->zcid]['vipyear']=AskTool::vip_years($v->oaskuser->vipstime);
                }
                else {
                    $lsarray[$v->zcid]['vipyear']=0;
                }
            }
            cache()->set($cachename,$lsarray,3600*24*3);//缓存3天
        }
        //设置地区,获取回复之星
        $this->SetArea();//设置好地区
        $hf_zhixing_lawyer=array();//声明回复执行之星
        $hf_zhixing_hflist=array();//摘选最佳回复
        $hf_zhixing_commentlist;//摘选最佳答案评价
        if($this->cnameid) {
            $hf_zhixing_lawyer=paihangbangclass::Area_replynum_best_city($this->cnameid,1);//根据城市获取到右侧回复执行
            //echo 'sdf' .$this->cnameid;
        }
        else {
            $hf_zhixing_lawyer=paihangbangclass::Area_replynum_best_city($this->pnameid,1);//根据省份获取到右侧回复执行
        }
       //获取到咨询之星的最佳回复
        if(is_array($hf_zhixing_lawyer)) $hf_zhixing_hflist=AskTool::getWebmasterAnswer($hf_zhixing_lawyer[0]['name'], 5);//获取到5条回复
        if(is_array($hf_zhixing_lawyer)) $hf_zhixing_commentlist=AskTool::getWebmasterComment($hf_zhixing_lawyer[0]['name'], 5);//获取到5条最佳答案评价
        $webmaster = AskTool::getWebmaster(11);
        $webmasterAnswer = AskTool::getWebmasterAnswer($webmaster->user->name, 5);
       $this->pageTitle = '免费法律咨询，就上中顾法律网-中顾法律网万名律师为您提供专业的律师在线咨询服务';
        cs()->registerMetaTag('免费法律咨询，就上中顾法律网-中顾法律网(中国第一法律门户)近万名专业律师给您提供权威、及时的免费法律在线咨询和律师在线咨询服务,提供婚姻家庭刑事辩护等领域及北京上海山东广东等地区咨询,是最专业的法律咨询网站。', 'keywords');
        cs()->registerMetaTag('免费法律咨询,法律在线咨询,律师在线咨询', 'description');
        $this->render('index',array('hotclass'=>$this->hotclass,'oaskclass'=>AskTool::OaskClass_GetClass(),'lsarray'=>$lsarray,'hf_zhixing'=>$hf_zhixing_lawyer,'hf_zhixing_hflist'=>$hf_zhixing_hflist,'hf_zhixing_commentlist'=>$hf_zhixing_commentlist
                ,'webmaster'=>$webmaster,'webmasterAnswer'=>$webmasterAnswer
        ));
    }
    public function actionMakehtml_one($id) {
        //只生成一个
        $this->hotclass=$id;
        $this->makeclass();
    }
    public function actionmakehtml_all() {
        //生成所有的
        $this->hotclass='1,3,4,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66';
        $this->makeclass();
    }
    //批量生成专长
    public function actionMakehtml_hot() {
        //只生成热点的
        $this->makeclass();
    }
    public function makeclass() {
        $this->Thisweek=Date('W');
        $oaskclass=AskTool::OaskClass_GetClass();
        $hotclass=explode(',', $this->hotclass);
        foreach($hotclass as $k=>$v) {
            echo "正准备生成 " . $v . $oaskclass[$v]  .":";
            $jg=paihangbangclass::class_reply_best($v,1);

            echo $jg[0]['replyer'] ,'=',$jg[0]['replynum'];


            $this->insertdata($jg[0]['replyer'],$v,$jg[0]['replynum']);

            echo "<br>";
            flush();
        }

    }
    public function insertdata($name,$zcids,$num) {
        if($name) {
            $zxzx=Oaskzczhixing::model()->find(array('condition'=>"zcid=" .$zcids . "  and username='$name' and weeks=" . $this->Thisweek));
            if($zxzx!=null) {
                $zxzx->num=paihangbangclass::replynum_count($name);
                $zxzx->bestnum=$num;
                $zxzx->zcid=$zcids;
                $zxzx->weeks=$this->Thisweek;
                $zxzx->save(false);//更新
            }
            else {
                $one=new Oaskzczhixing();
                $one->username=$name;
                $one->num=paihangbangclass::replynum_count($name);
                $one->bestnum=$num;
                $one->zcid=$zcids;
                $one->weeks=$this->Thisweek;

                $one->save(false);//添加
            }
        }
    }
    public function actionold() {
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
        $criteria->select="t.number"; //只取需要的字段
        // $criteria->condition="SenderID=" .app()->user->id . " and Fatherid=0"; //构建我发布过的咨询
        $criteria->order="t.id desc"; //按最新的进行排序
        $criteria->with=array('oaskuser'
                =>array('select'=> 'oaskuser.ID,oaskuser.name,oaskuser.TrueName,oaskuser.jifen,oaskuser.mobile') //联合查询，回复发布者是谁
        );
        $cachename="zxzx_"  .  app()->user->id;
        if(cache()->get($cachename) ) {
            $num = cache()->get($cachename);
        }else {
            $num = Askstar::model()->count($criteria);
            cache()->set($cachename,$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=5;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=Askstar::model()->findAll($criteria);
        $this->render('index',array('pages'=>$pages,'questions'=>$questions));
    }
//获取最佳答案
    public function getmybestanser() {//已经有现有函数，暂时不写

    }
//设置地区
    //获取到省份id
    public function SetArea() {
        if(isset ($_GET['pnameid'])) {
            $this->pnameid=$_GET['pnameid'];//如果已经赋值，那么就直接进行接收参数
        }
        if(isset ($_GET['cnameid'])) {
            $this->cnameid=$_GET['cnameid'];
        }
        else {
            if(isset($_COOKIE['cnameid'])) {
                $this->cnameid=$_COOKIE['cnameid'];
            }
        }
        $this->Getpnameid();
    }

    //设置省份id，加入cookie中不存在的话
    public function Getpnameid() {
        if( !isset($_GET['cnameid']) && !isset($_GET['pnameid']) &&    isset($_COOKIE['pnameid'])) {
            //如果已经设置
            $this->pname=$_COOKIE['pname'];
            $this->pnameid=$_COOKIE['pnameid'];
            $this->cname=$_COOKIE['name'];
            $this->cnameid=$_COOKIE['cnameid'];
        }
        else {//如果有城市id,但没有传入省份id
            if(empty ($this->pnameid) && !empty ($this->cnameid)) {
                $citys=AskCityCname::model()->with(array('province'=>array('select'=>'pname')))->findByPk($this->cnameid,array('select'=>'cname,t.pnameID'));
                $this->cname=$citys->cname;
                $this->pnameid=$citys->pnameID;
                $this->pname=$citys->province->pname;
            }
            else {
                //如果只传入pnameid
                if(isset ($_GET['pnameid']) && !isset ($_GET['cnameid'])) {
                    $this->pnameis=AskTool::Area_GetPname();
                    $this->cnames=AskTool::Area_GetCname();
                    $this->pname=$this->pnameis[$_GET['pnameid']];
                    $this->cnameid=0;
                    $this->cname='';
                }
            }
            if($this->cnameid<5) {
                $this->cname=$this->pname;
            }
        }
    }
}

?>
