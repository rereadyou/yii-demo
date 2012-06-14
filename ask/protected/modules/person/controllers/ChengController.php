<?php
class ChengController extends CController {
    public function  actiontest() {
        echo "诚信通分数为:" . $this->get_score();
//获取到诚信通的年数
// $yearnum=AskTool::vip_years($vipstime)
        echo $this->module->user->name;
        echo $this->module->user->vipstime;
        echo "资质证书的分数:" . $this->get_certscore();
        echo "最佳回复数:" . $this->get_bestanswersnum();
        echo "案件委托最佳回复数量：" . $this->get_bestwtnum();
        echo "用户评价数量为："  .$this->get_usercomment();
        echo "资质证书的个数:" ;
        print_r($this->get_certpic());
    }
    public function actionIndex() {
        //用户对律师的评价
        $cachename="person_lvshipingjia_count_" .$this->module->user->name;
        $count=0;
        if(cache()->get($cachename)) {
            $count=cache()->get($cachename);
        }
        else {
            $count = OaskQuestion::model()->count(array(
                    'condition'=>"jieuser ='".$this->module->user->name."' and BContent is not null"));
            cache()->set($cachename,$count,1200);//缓存20分钟
        }
        $criteria=new CDbCriteria();
        $criteria->condition = "jieuser ='".$this->module->user->name."' and BContent is not null";
        $pages=new CPagination($count);
        $pages->pageSize=4;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $mys=array();
        $cachename="person_lvshipingjia_" .$this->module->user->name ."_" . $pages->currentpage;
        if(cache()->get($cachename)) {
            $mys=cache()->get($cachename);
        }
        else {
            $mys=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename,$mys,300);//缓存5分钟
        }

        $this->render('index',array('pages'=>$pages,'mys'=>$mys,
                'get_score'=>$this->get_score(),'get_certscore'=>$this->get_certscore(),
                'get_bestanswersnum'=>$this->get_bestanswersnum(),'get_usercomment'=>$this->get_usercomment(),
                'get_certpic'=>$this->get_certpic(),'get_yearnum'=>$this->get_yearnum(),'get_jifen'=>$this->get_jifen(),'allprov'=>AskTool::Area_GetPname()
        ));
    }
//诚信律师身份认证：100分,获取到诚信通认证的分数
    public function get_score() {
        $cachename="personal_score_" .$this->module->user->name;//缓存名称
        $jg=0;
        if(cache()->get($cachename)) {
            $jg=cache()->get($cachename);
        }
        else {
            $sql="select authdate from [9ask_auth] where username='$user'";
            $command=Yii::app()->db->createCommand($sql);
            $command->text=$sql;
            $jg=$command->queryScalar();
            $score=100;
            if($jg) {
                $jg=$score+$jg;
            }
            else {
                $jg=$score;
            }
            cache()->set($cachename,$jg,3600*24);//缓存1天
        }
        return $jg;
    }
//获取到用户的执业年限
    public function get_yearnum() {
        $cachename="personal_yearnum_" .$this->module->user->name;//缓存名称
        $jg=0;
        if(cache()->get($cachename)   ) {
            $jg=cache()->get($cachename);
        }
        else {
            $vipstime=$this->module->user->vipstime;
            echo $vipstime;
            if(empty($vipstime) ||$vipstime==null ) {
                $jg=1; //默认为1年
            }
            else {
              
                $jg=AskTool::vip_years($vipstime);//计算出用户的vip年限

            }
            cache()->set($cachename,$jg,3600*24);//缓存1天
        }
        return $jg;
    }
//certscore,获取到资质证书的分数
    public function  get_certscore() {
        $cachename="personal_certscore_" .$this->module->user->name;//缓存名称
        $jg=0;
        if(cache()->get($cachename)) {
            $jg=cache()->get($cachename);
        }
        else {
            $sql="select sum(fen) from [9ask_cert] where ispass=1 and userid=" .$this->module->user->ID;
            $command=Yii::app()->db->createCommand($sql);
            $command->text=$sql;
            $jg=$command->queryScalar();
            if ($jg) {
                $jg=$jg+10;
            }
            else {
                $jg=10;
            }
            cache()->set($cachename,$jg,3600*24);//缓存1天
        }
        return $jg;
    }
    //获取到用户的积分
    public function get_jifen() {
    $jg=$this->module->user->Score;
    return $jg;
    }
    //获取到最佳回复数
    public function get_bestanswersnum() {
        $cachename="personal_bestanswersnum_" .$this->module->user->name;//缓存名称
        $jg=0;
        if(cache()->get($cachename)) {
            $jg=cache()->get($cachename);
        }
        else {
            $BestAnswer="select count(*) from [oask_newtmpreply] where best=1 and replyer='" . $this->module->user->name ."'";
            $BestAnswer2= "select count(*) from [oask_reply] where best=1 and replyer='" . $this->module->user->name."'" ;
            $command=Yii::app()->db->createCommand($BestAnswer);
            $jg1=$command->queryScalar();
            $command->text=$BestAnswer2;
            $jg2=$command->queryScalar();
            $jg=$jg1+$jg2;
            cache()->set($cachename,$jg,3600*24);//缓存1天
        }
        return $jg;
    }
    //获取到案件委托的最佳数量
    public function get_bestwtnum() {
        $cachename="personal_usercomment_" .$this->module->user->name;//缓存名称
        $jg=0;
        if(cache()->get($cachename)) {
            $jg=cache()->get($cachename);
        }
        else {
            $sql="select count(*) from [zg_wt] where ispass=1 and fatherid>0 and isok=1 and username='" . $this->module->user->name . "'";
            $command=Yii::app()->db->createCommand($sql);
            $jg=$command->queryScalar();
            cache()->set($cachename,$jg,3600*24);//缓存1天
        }
        return $jg;
    }
    //获取到用户评价
    public function get_usercomment() {
        $cachename="personal_usercomment_" .$this->module->user->name;//缓存名称
        $jg=0;
        if(cache()->get($cachename)) {
            $jg=cache()->get($cachename);
        }
        else {
            $jg= $this->get_bestanswersnum()*1 + $this->get_bestwtnum()*5+10;
            cache()->set($cachename,$jg,3600*24);//缓存1天
        }
        return $jg;
    }
    //获取到资质证书图片的个数，返回一个数组
    public function get_certpic() {
        $cachename="personal_certpic_" .$this->module->user->name;//缓存名称
        $jgs=array();
        if(cache()->get($cachename)) {
            $jgs=cache()->get($cachename);
        }
        else {
            $cert1="select count(*) from [9ask_cert] where certtype=1 and ispass=1 and userid=" .  $this->module->user->ID;
            $cert2="select count(*) from [9ask_cert] where certtype=2 and ispass=1  and userid=" . $this->module->user->ID;
            $cert3="select count(*) from [9ask_cert] where certtype=3 and ispass=1  and userid=" . $this->module->user->ID;
            $cert4="select count(*) from [9ask_cert] where certtype=4 and ispass=1  and userid=" . $this->module->user->ID;
            $sql="select count(*) from [zg_wt] where ispass=1 and fatherid>0 and isok=1 and username='" . $this->module->user->name . "'";
            $command=Yii::app()->db->createCommand($cert1);
            $jg1=$command->queryScalar();//#资格证书
            $command->text=$cert2;
            $jg2=$command->queryScalar();//#学历证书
            $command->text=$cert3;
            $jg3=$command->queryScalar();//荣誉证书
            $command->text=$cert4;
            $jg4=$command->queryScalar();//其他证书
            //保存为关联数组
            $jgs=array('1'=>$jg1,'2'=>$jg2,'3'=>$jg3,'4'=>$jg4);
            cache()->set($cachename,$jgs,3600*48);//缓存2天
        }
        return $jgs;

    }

}