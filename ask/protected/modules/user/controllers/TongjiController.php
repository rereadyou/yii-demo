<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
class TongJiController extends CController {
    public $begtindate;
    public $todaybegtindate;
    public $enddate;
    public $cnameid=86;
    public $pnameid=5;
    public $zhuanchang=11;//我的专长领域，如果没有就设置为婚姻家庭
    public function tongjisetup() {
        if(!isset(app()->user->id))
                {
                app()->end();
                }
        $this->todaybegtindate=date("Y-m-d h:i:s",mktime(23,59,59,date("m"),date("d")-20,date("Y")));
        $this->begtindate=date("Y-m-d h:i:s",mktime(23,59,59,date("m"),date("d")-50,date("Y")));
        $this->enddate= date("Y-m-d h:i:s",mktime(23,59,59,date("m"),date("d"),date("Y")));
        if(isset($_COOKIE['cnameid'])) {
            if(!empty($_COOKIE['cnameid'])) $this->cnameid=isset($_COOKIE['cnameid']);
        }
        if(isset($_COOKIE['pnameid'])) {
            if(!empty($_COOKIE['pnameid'])) $this->cnameid=isset($_COOKIE['pnameid']);
        }
        $cachename='count_questionall_' . $this->cnameid;
        $myuser=OaskUser::model()->findbyPk(app()->user->id,array('select'=>'Specaility'));
        $this->zhuanchang=$myuser->Specaility;
        if($myuser==null || empty ($this->zhuanchang)) $this->zhuanchang='11,24,11,11,11'; //如果匹配不上就获取到默认
    }
    //路由，今日 我的 一对一咨询 总数
    public function actionIndex() {
          $this->tongjisetup();
        //所有的一对一咨询
        //  echo   $this->message_messageall();
        //所有最新咨询
        //echo "<br/>" . $this->Question_Questionall();
        //当地咨询
        // echo "<br/>" . $this->Question_QuestionArea();
        //专长咨询
        // echo "<br/>" . $this->Question_QuestionZc();
        //读取高分问题
        // echo "<br/>" . $this->Question_QuestionScore();
        //读取被采纳的所有答案的总数
        //  echo "<br/>" .$this->Questin_Questionbest();
        //读取当地案件委托的数量
        //echo "<br/>" . $this->weituo_weituoArea();
        //读取专长委托
        //echo "<br/>" .$this->weituo_weituozc();
       $this->RenderPartial('index',array('messageall'=>$this->message_messageall(),'questionall'=>$this->Question_Questionall(),'questionarea'=>$this->Question_QuestionArea(),'questionzc'=>$this->Question_QuestionZc(),'questionscore'=>$this->Question_QuestionScore(),'questionbest'=>$this->Questin_Questionbest(),'weituoarea'=>$this->weituo_weituoArea(),'weituozc'=>$this->weituo_weituozc()));
    }
     
    //统计今日一对一咨询的总数
    public function message_messageall() {
      
        //echo $this->enddate,date("Y-m-d h:i:s",time());
        $sql='AddresseeID='. app()->user->id . " and adddate between '$this->todaybegtindate' and '$this->enddate' and Fatherid=0";
        // echo $sql;
        $cachename='count_messageall_'.app()->user->id;
        $count_meesage=0;
        if(cache()->get($cachename)) {
            $count_meesage=cache()->get($cachename);
        }
        else {
            $count_meesage=Message::model()->count($sql);
            cache()->set($cachename,$count_meesage,300);
        }
        return $count_meesage;
    }
    //统计今日公开咨询总是
    public function Question_Questionall() {
        $sql="sendtime between '$this->todaybegtindate' and '$this->enddate'";
        $cachename='count_questionall';
        $count_meesage=0;
        if(cache()->get($cachename)) {
            $count_meesage=cache()->get($cachename);
        }
        else {
            $count_meesage=OaskQuestion::model()->count($sql);
            cache()->set($cachename,$count_meesage,300);
        }
        return $count_meesage;
    }
    //统计当地公开咨询数量
    public function  Question_QuestionArea() {
        //读取当期的咨询
        $sql="sendtime between '$this->begtindate' and '$this->enddate' and cnameid=$this->cnameid";
        $count_meesage=0;
        $cachename="count_questionarea_" . $this->cnameid;
        if(cache()->get($cachename)) {
            $count_meesage=cache()->get($cachename);
        }
        else {
            $count_meesage=OaskQuestion::model()->count($sql);
            cache()->set($cachename,$count_meesage,300);
        }
        return $count_meesage;
    }
    //获取专业相关咨询
    public function Question_QuestionZc() {    //读取桩长相关咨询

        $sql="sendtime between '$this->begtindate' and '$this->enddate' and fenleiid in ($this->zhuanchang)";
        $count_meesage=0;
        $cachename="count_questionzc_" .$this->zhuanchang;
        if(cache()->get($cachename)) {
            $count_meesage=cache()->get($cachename);
        }
        else {
            $count_meesage=OaskQuestion::model()->count($sql);
            cache()->set($cachename,$count_meesage,300);
        }
        return $count_meesage;
    }
    //读取高分问题
    public function Question_QuestionScore() {      //读取高分问题
        $sql="sendtime between '$this->begtindate' and '$this->enddate' and shang>20";
        $count_meesage=0;
        $cachename="count_questionscore";
        if(cache()->get($cachename)) {
            $count_meesage=cache()->get($cachename);
        }
        else {
            $count_meesage=OaskQuestion::model()->count($sql);
            cache()->set($cachename,$count_meesage,300);
        }
        return $count_meesage;
    }
    //读取被采纳答案问题数量
    public function Questin_Questionbest() {    //我被采纳的所有问题
        $sql="sendtime between '$this->begtindate' and '$this->enddate' and shang>20 and jieuser='".app()->user->name."'";
        // echo $sql;
        $count_meesage=0;
        $cachename="count_questionsbest_" .  app()->user->id;
        if(cache()->get($cachename)) {
            $count_meesage=cache()->get($cachename);
        }
        else {
            $count_meesage=OaskQuestion::model()->count($sql);
            cache()->set($cachename,$count_meesage,300);
        }
        return $count_meesage;
    }
    //当地案件委托
    public function weituo_weituoArea() {    //我被采纳的所有问题
        $sql=" fatherid=0 and pnameID=$this->pnameid";
        $count_meesage=0;
        $cachename="count_weituobest";
        if(cache()->get($cachename)) {
            $count_meesage=cache()->get($cachename);
        }
        else {
            $count_meesage=OaskQuestion::model()->count($sql);
            cache()->set($cachename,$count_meesage,300);
        }
        return $count_meesage;
    }
    //读取专业相关案件委托
    public function weituo_weituozc() {
        $myzc=11;
        if(!empty($this->zhuanchang) && strpos($this->zhuanchang,',')>0) {
            $myzc=substr($this->zhuanchang,0,strpos($this->zhuanchang,','));

        }
        //根据专长获取到父类
        if ($myzc>10) {
            //如果是小类，那么就自己动手获取所在的大类
            $oask_class=OaskClass::model()->findByPk($myzc,array('select'=>'fatherID'));
            if($oask_class!=null) $myzc=$oask_class->fatherID;
        }
        $sql=" t.fatherid=0 and addDate between '$this->begtindate' and '$this->enddate' and hf_num.classid=4";
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
        $criteria->condition=$sql;
        $criteria->order="t.ID desc"; //按最新的进行排序
        $criteria->with=array('hf_num'); //联合查询，回复发布者是谁
        $criteria->together=true;
        $count_meesage=0;
        $cachename="count_weituozc_".  app()->user->id;
        if(cache()->get($cachename)   ) {
            $count_meesage=cache()->get($cachename);
        }
        else {
            $count_meesage=ZgWt::model()->count($criteria);
            cache()->set($cachename,$count_meesage,300);
        }
        return $count_meesage;
    }
}
?>
