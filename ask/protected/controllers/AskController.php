<?php
class AskController extends Controller {
    public $begintime;//咨询开始时间
    public $endtime;//咨询结束时间
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
    public function actionArea() {
        $this->render('area');
    }
    /*
     * 首页测试页
     * parame  $criteria=查询条件对象，$cachename=页面片段缓存名称，$cachetime=缓存时间，是否禁用日期限制，
    */

    public function SelectQuestion_LimitDate($criteria,$cachename,$cachetime=600,$isnodatelimit=false)//最小化缓存30秒
    {  //测试期间先不进行缓存
        $criteria->select='ID,title,sendtime,shang,fenleiid,topic,pnameid,cnameid,replys,lastuser';
        $this->begintime=date("Y-m-d",mktime(0, 0 , 0,date("m"),date("d")-date("w")-250,date("Y")));
        $this->endtime= date("Y-m-d",mktime(23,59,59,date("m"),date("d")-date("w")-110,date("Y")));
        if($isnodatelimit==FALSE) {
            $criteria->addCondition("  sendtime between '" . $this->begintime."' and  '" .$this->endtime . "' ");
        }
          $criteria->addCondition(" jie<>44");
        $criteria->with=array(
                'hfuser' ,
        );
        if(empty($cachename)    ) {
            //  return OaskQuestion::model()->findAll($criteria); //如果缓存为空，直接进行输出,退出后面的执行
            $question=OaskQuestion::model()->findAll($criteria);
            return $question;
        }
       $question;
        if(!$question=cache()->get($cachename)  ) {
            $question=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename,$question,$cachetime);//缓存它
            //  echo "it is ";
        }
        return $question;
    }
    public function SelectQuestion_LimitDate_forhf($criteria,$cachename,$cachetime=6000)//最小化缓存30秒
    {  //测试期间先不进行缓存
        $criteria->select='ID,title,sendtime,shang,fenleiid,topic,pnameid,cnameid,replys,lastuser';
        $this->begintime=date("Y-m-d",mktime(0, 0 , 0,date("m"),date("d")-date("w")-250,date("Y")));
        $this->endtime= date("Y-m-d",mktime(23,59,59,date("m"),date("d")-date("w")-110,date("Y")));
        $criteria->addCondition("  sendtime between '" . $this->begintime."' and  '" .$this->endtime . "' ");
        $criteria->addCondition(" jie<>44");
        $criteria->with=array(
                'hfuser' ,
        );
        if(empty($cachename)   ) {
            return OaskQuestion::model()->findAll($criteria); //如果缓存为空，直接进行输出,退出后面的执行
        }
        $question;

        if(!$question=cache()->get($cachename)   ) {
            $question=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename,$question,$cachetime);//缓存它
            //echo "it is ";
        }
        return $question;
    }
    //根据列别id,分别调用该大类下的咨询，然后放入到一个数组中
    public function getquestion_byclassid($bigclass) {   //每行四个
        $criteria = new CDbCriteria();
        $questions=array();
        for($iii=0;$iii<4;$iii++) {
            $criteria->condition=' replys>0 and fenleiid=' .$bigclass[$iii];
            $criteria->limit=7;
            $questions[$bigclass[$iii]]=$this->SelectQuestion_LimitDate_forhf($criteria, 'index2_smaill_class_'.$bigclass[$iii]);
        }
        return $questions;
    }
    public function actionindex() {
        //  echo "测试顶部的三个查询";
        $criteria = new CDbCriteria();
        $criteria->limit =14;
        $q_new =$this->SelectQuestion_LimitDate($criteria, 'index_question_new',600,true);//首页最新问题
        $criteria->order = "replys DESC";
        $criteria->limit = 13;
        $q_hot = $this->SelectQuestion_LimitDate($criteria,'index_question_hot');//首页热点问题
        $criteria->order = "shang DESC";
        $criteria->condition='shang>0';
        $criteria->limit = 14;
        $q_highscore =$this->SelectQuestion_LimitDate($criteria,'index_question_hignscore');//首页高分问题

        // 上周咨询回复排行
        $lastweekBestReplyLawyer=paihangbangclass::Area_replynum_all(10);//上周回复排行
        $lastweekMostFlowerLawyer=paihangbangclass::Area_replynum_usercomment_all(10);//上周好评律师
        $AskStars=paihangbangclass::Area_replynum_best_all(8);//上周咨询之星
        $shouge=$AskStars[0]['replyer'];//首歌咨询之星
        $AskStars_bestanswer=AskTool::getWebmasterAnswer($shouge, 3);

        // 活动公告
        $critGG = new CDbCriteria();
        $critGG->select="ID,title"; //只取需要的字段
        $critGG->condition="ispic=0";
        $critGG->order="ID desc"; //按最新的进行排序
        $critGG->limit=6;
        $cache_gonggao="index_gg_";
        //调用民事类大类相关咨询
        $question_minshi_classid=array(17,20,21,22);
        //调用刑事行政类
        $question_xsxz_classid=array(35,34,36,38);
        //调用经济类
        $question_jingji_classid=array(24,27,31,23);
        //公司类
        $question_company_classid=array(51,52,53,54);
        //涉外类
        $question_shewai_classid=array(43,44,46,47);
        //非诉讼
        $question_feisusong_classid=array(62,60,59,57);

        $question_minshi=$this->getquestion_byclassid($question_minshi_classid);
        $question_xsxz  =$this->getquestion_byclassid($question_xsxz_classid);
        $question_jingji =$this->getquestion_byclassid($question_jingji_classid);
        $question_company =$this->getquestion_byclassid($question_company_classid);
        $question_shewai =$this->getquestion_byclassid($question_shewai_classid);
        $question_feisusong =$this->getquestion_byclassid($question_feisusong_classid);
        if(!$gonggao=cache()->get($cache_gonggao)) {
            $gonggao=OaskGonggao::model()->findAll($critGG);
            cache()->set($cache_gonggao,$gonggao,100);
        }
        //$this->render('index',array('news'=>$news)); //推送到前台
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();
        //底部在线律师等
        $ActiveBigLawyer=paihangbangclass::ScorePaihangByWeek_lawyer(8);
        // 在线律师
        $OnlineLawyers =Online::model()->findall(array('limit'=>30,'select'=>'username','distinct'=>true)); // $db_command->queryAll();
        $templs;
        foreach($OnlineLawyers as $v) {
            $templs.="'" . $v['username'] ."',";
        }
        $templs.="'00aabbc_ndw'";
        //统计出所有的在线律师

        $OnlineLawyer=OaskUser::model()->findall(array('condition'=>" userclassid=1 and  name in ($templs)",'select'=>'ID,name,TrueName,userClassID,IsStar,pnameid,cnameid,jifen'));
        // 咨询之星
        $BigLawyer =paihangbangclass::ScorePaihangByWeek_vip(8);
        // 昨日数据统计
        $ask_counts = AskCount::GetQuestionNum();
        $this->pageTitle = '免费法律咨询，就上中顾法律网-中顾法律网万名律师为您提供专业的律师在线咨询服务';
        cs()->registerMetaTag('免费法律咨询，就上中顾法律网-中顾法律网(中国第一法律门户)近万名专业律师给您提供权威、及时的免费法律在线咨询和律师在线咨询服务,提供婚姻家庭刑事辩护等领域及北京上海山东广东等地区咨询,是最专业的法律咨询网站。', 'keywords');
        cs()->registerMetaTag('免费法律咨询,法律在线咨询,律师在线咨询', 'description');

        //底部在线律师结束
        $this->render('index',array('q_new'=>$q_new,'q_hot'=>$q_hot,'q_highscore'=>$q_highscore,
                'categoryData'=>$categoryData,'lastweekBestReplyLawyer'=>$lastweekBestReplyLawyer,
                'lastweekMostFlowerLawyer'=>$lastweekMostFlowerLawyer,'ask_counts'=>$ask_counts,
                'BigLawyer'=>$BigLawyer,'ActiveBigLawyer'=>$ActiveBigLawyer,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'provs'=>AskTool::Area_GetPname(),  'AskStars_bestanswer'=>$AskStars_bestanswer,
                'question_minshi_classid'=>$question_minshi_classid,'question_minshi'=>$question_minshi,//民事类
                'question_xsxz_classid'=>$question_xsxz_classid,'question_xsxz'=>$question_xsxz,//刑事行政类
                'question_jingji_classid'=>$question_jingji_classid,'question_jingji'=>$question_jingji,//经济类
                'question_company_classid'=>$question_company_classid,'question_company'=>$question_company,//公司类
                'question_shewai_classid'=>$question_shewai_classid,'question_shewai'=>$question_shewai,//涉外类
                'question_feisusong_classid'=>$question_feisusong_classid,'question_feisusong'=>$question_feisusong,//非诉讼
                'OnlineLawyer'=>$OnlineLawyer,'AskStars'=>$AskStars,'gonggao'=>$gonggao));

    }
    public function actionindextest2() {
        echo "测试顶部的三个查询";
        $criteria = new CDbCriteria();
        $criteria->addCondition("topic is NOT NULL");
        $criteria->addCondition("fenleiid is NOT NULL");
        $criteria->limit = 11;
        $q_new = OaskQuestion::model()->findAll($criteria);

        $criteria->order = "replys DESC";
        $criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<5'));
        $criteria->limit = 9;
        $q_hot = OaskQuestion::model()->findAll($criteria);
        $criteria->order = "shang DESC";
        $criteria->addCondition('shang>0');
        $criteria->limit = 13;
        $q_highscore = OaskQuestion::model()->findAll($criteria);
        //遍历所有专长
        // 各大类专长的咨询调用
        // 先列举各大类id
        // 根据id得到小类id
        // 根据id得到咨询内容
        $bigCategory = OaskClass::model()->findAll('fatherID=1');
        $categoryData = array();
        $crit_zixun = new CDbCriteria();
        $crit_zixun->limit = 6;
        $crit_lvshi  = new CDbCriteria();
        $crit->lvshi->limit = 4;
        $j=0; // 记录大类顺序
        foreach ($bigCategory as $k=>$v) {
            $j++;
            $i=0; // 控制小类
            //echo $v->ID,' is id,',$v->topic,' is name<br />';
            $categoryData[$j]['name'] = $v->topic;
            $categoryData[$j]['id']   = $v->ID;
            $categoryData[$j]['dir'] = $v->dir;
            $smallCategory = OaskClass::model()->findAll('fatherID='.$v->ID);
            $zixun = array();
            $zhishi = array();
            $lvshi = array();
            $xiaolei = array();

            // 子类
            foreach ($smallCategory as $l=>$w) {
                $xiaolei[$l]['dir'] = $w->dir;
                $xiaolei[$l]['topic'] = $w->topic;
                //print_r($w);echo '<br /><br /><br />';
            }
            $categoryData[$j]['xiaolei'] = $xiaolei;

            // 咨询
            foreach ($smallCategory as $l=>$w) {
                if ($i>=4) {
                    break;
                }
                $i++;
                //echo '>>>>',$w->ID,' is id,',$w->topic,' is name.<br />';
                $crit_zixun->condition = 'fenleiid='.$w->ID;
                $zixun[$i]['data'] = OaskQuestion::model()->findAll($crit_zixun);
                $zixun[$i]['name'] = $w->topic;
                $zixun[$i]['id'] = $w->ID;
            }
            $categoryData[$j]['zixun'] = $zixun;

            // 知识
            $crit_zhishi->select = 'ID,topic,dir';
            $i=0;
            foreach ($smallCategory as $l=>$w) {
                $i++;
                $zhishi[$i]['dir'] = $w->dir;
                $zhishi[$i]['name'] = $w->topic;
                $zhishi[$i]['id'] = $w->ID;
            }
            $categoryData[$j]['zhishi'] = $zhishi;

            // 律师
            $searchStr = '';
            if ($pos['isCity']==true) {
                $searchStr = 'city='.$pos['cnameid'];
            }else {
                $searchStr = 'prov='.$pos['pnameid'];
            }
            //   $crit_lvshi->condition = $searchStr . ' AND bigclass=' . $v->ID;
            //$lvshi = AskBillAll::model()->findAll($crit_lvshi);
            // $categoryData[$j]['lvshi'] = $lvshi;
        }
        $this->render('index',array('q_new'=>$q_new,'q_hot'=>$hot,'q_highscore'=>$q_highscore));
    }
    /**
     * 咨询首页
     * 周泉
     * 2011-03-11
     */
    public function actionIndextest() {

        $criteria = new CDbCriteria();
        $criteria->addCondition("topic is NOT NULL");
        $criteria->addCondition("fenleiid is NOT NULL");
        $criteria->limit = 11;
        $q_new = OaskQuestion::model()->findAll($criteria);

        $criteria->order = "replys DESC";
        $criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<5'));
        $criteria->limit = 9;
        $q_hot = OaskQuestion::model()->findAll($criteria);
        $criteria->order = "shang DESC";
        $criteria->addCondition('shang>0');
        $criteria->limit = 13;
        $q_highscore = OaskQuestion::model()->findAll($criteria);

        $pos = AskTool::getCustomerPosition(AskTool::getClientIp());
        // 各大类专长的咨询调用
        // 先列举各大类id
        // 根据id得到小类id
        // 根据id得到咨询内容
        $bigCategory = OaskClass::model()->findAll('fatherID=1');
        $categoryData = array();
        $crit_zixun = new CDbCriteria();
        $crit_zixun->limit = 6;
        $crit_lvshi  = new CDbCriteria();
        $crit->lvshi->limit = 4;
        $j=0; // 记录大类顺序
        foreach ($bigCategory as $k=>$v) {
            $j++;
            $i=0; // 控制小类
            //echo $v->ID,' is id,',$v->topic,' is name<br />';
            $categoryData[$j]['name'] = $v->topic;
            $categoryData[$j]['id']   = $v->ID;
            $categoryData[$j]['dir'] = $v->dir;
            $smallCategory = OaskClass::model()->findAll('fatherID='.$v->ID);
            $zixun = array();
            $zhishi = array();
            $lvshi = array();
            $xiaolei = array();

            // 子类
            foreach ($smallCategory as $l=>$w) {
                $xiaolei[$l]['dir'] = $w->dir;
                $xiaolei[$l]['topic'] = $w->topic;
                //print_r($w);echo '<br /><br /><br />';
            }
            $categoryData[$j]['xiaolei'] = $xiaolei;

            // 咨询
            foreach ($smallCategory as $l=>$w) {
                if ($i>=4) {
                    break;
                }
                $i++;
                //echo '>>>>',$w->ID,' is id,',$w->topic,' is name.<br />';
                $crit_zixun->condition = 'fenleiid='.$w->ID;
                $zixun[$i]['data'] = OaskQuestion::model()->findAll($crit_zixun);
                $zixun[$i]['name'] = $w->topic;
                $zixun[$i]['id'] = $w->ID;
            }
            $categoryData[$j]['zixun'] = $zixun;

            // 知识
            $crit_zhishi->select = 'ID,topic,dir';
            $i=0;
            foreach ($smallCategory as $l=>$w) {
                $i++;
                $zhishi[$i]['dir'] = $w->dir;
                $zhishi[$i]['name'] = $w->topic;
                $zhishi[$i]['id'] = $w->ID;
            }
            $categoryData[$j]['zhishi'] = $zhishi;

            // 律师
            $searchStr = '';
            if ($pos['isCity']==true) {
                $searchStr = 'city='.$pos['cnameid'];
            }else {
                $searchStr = 'prov='.$pos['pnameid'];
            }
            $crit_lvshi->condition = $searchStr . ' AND bigclass=' . $v->ID;
            $lvshi = AskBillAll::model()->findAll($crit_lvshi);
            $categoryData[$j]['lvshi'] = $lvshi;
        }

        // 上周咨询回复排行
        // 日期减10是为了调取数据，需修改成1
        $sql="
SELECT top 6 A.*,B.truename,B.jifen
FROM (
select top 100 C.* from (
SELECT replyer,count(*) as num FROM oask_reply
	WHERE DATEPART(wk, replytime) = DATEPART(wk, GETDATE())-10
	and DATEPART(yy, replytime) = DATEPART(yy, GETDATE())
	group by replyer
) C
order by C.num desc
) A
left join oask_user B
on A.replyer=B.name
WHERE B.userclassid=1
order by A.num desc
";
        $db_conn = Yii::app()->db;
        $db_command=$db_conn->createCommand($sql);
        $lastweekBestReplyLawyer = $db_command->queryAll();
        // 上周咨询好评排行
        // 日期减10是为了调取数据，需修改成1
        $sql="
SELECT top 6 A.*,B.truename,B.jifen
FROM (
select top 100 C.* from (
SELECT replyer,sum(flower) as num FROM oask_reply
	WHERE DATEPART(wk, replytime) = DATEPART(wk, GETDATE())-10
	and DATEPART(yy, replytime) = DATEPART(yy, GETDATE())
	group by replyer
) C
order by C.num desc
) A
left join oask_user B
on A.replyer=B.name
WHERE B.userclassid=1
order by A.num desc
";
        $lastweekMostFlowerLawyer = $db_command->queryAll();

        // 上周活跃律师排行
        // 日期减10是为了调取数据，需修改成1
        $sql="
SELECT top 8 A.*,B.truename,B.jifen,D.pname,E.cname
FROM (
select top 100 C.* from (
SELECT replyer,count(*) as num FROM oask_reply
	WHERE DATEPART(wk, replytime) = DATEPART(wk, GETDATE())-10
	and DATEPART(yy, replytime) = DATEPART(yy, GETDATE())
	group by replyer
) C
order by C.num desc
) A
left join oask_user B
on A.replyer=B.name
left join [9ask_city_pname] D
on B.pnameid=D.pNameID
left join [9ask_city_cname] E
on B.cnameid=E.cnameID
WHERE B.userclassid=1
order by A.num desc
";
        $db_conn = Yii::app()->db;
        $db_command=$db_conn->createCommand($sql);
        $ActiveBigLawyer = $db_command->queryAll();

        // 在线律师
        $sql="
SELECT top 8 A.*,B.truename,B.jifen,D.pname,E.cname
FROM (
	select top 100  * from  online
	order by id desc
) A
left join oask_user B
on A.username=B.name
left join [9ask_city_pname] D
on B.pnameid=D.pNameID
left join [9ask_city_cname] E
on B.cnameid=E.cnameID
WHERE B.userclassid=1
order by A.id desc
";
        $db_conn = Yii::app()->db;
        $db_command=$db_conn->createCommand($sql);
        $OnlineLawyer = $db_command->queryAll();

        // 咨询之星
        $sql="
select A.*,B.id,B.name,B.truename,B.jifen,B.cnameid,B.userpic,B.mobile,B.isstar,b.userclassid from (
select replyer,count(*) as num from [oask_reply]
where DATEPART(wk, replytime) = DATEPART(wk, GETDATE())-1
and DATEPART(yy, replytime) = DATEPART(yy, GETDATE())
group by replyer
) A
left join [oask_user] B
on A.replyer=B.name
where b.userclassid=1
order by num desc
";
        $db_conn = Yii::app()->db;
        $db_command=$db_conn->createCommand($sql);
        $AskStars = $db_command->queryAll();

        // 活动公告
        $critGG = new CDbCriteria();
        $critGG->select="ID,title"; //只取需要的字段
        $critGG->condition="ispic=0";
        $critGG->order="ID desc"; //按最新的进行排序
        $critGG->limit=6;
        $gonggao=OaskGonggao::model()->findAll($critGG);
        //$this->render('index',array('news'=>$news)); //推送到前台

        // 总积分最多律师

        $BigLawyer =paihangbangclass::ScorePaihangByWeek_vip(5);

        // 昨日数据统计
        $ask_counts = AskCount::GetQuestionNum();

        $this->pageTitle = '免费法律咨询，就上中顾法律网-中顾法律网万名律师为您提供专业的律师在线咨询服务';
        cs()->registerMetaTag('免费法律咨询，就上中顾法律网-中顾法律网(中国第一法律门户)近万名专业律师给您提供权威、及时的免费法律在线咨询和律师在线咨询服务,提供婚姻家庭刑事辩护等领域及北京上海山东广东等地区咨询,是最专业的法律咨询网站。', 'keywords');
        cs()->registerMetaTag('免费法律咨询,法律在线咨询,律师在线咨询', 'description');

        $this->render('index',array('q_new'=>$q_new,'q_hot'=>$q_hot,'q_highscore'=>$q_highscore,
                'categoryData'=>$categoryData,'lastweekBestReplyLawyer'=>$lastweekBestReplyLawyer,
                'lastweekMostFlowerLawyer'=>$lastweekMostFlowerLawyer,'ask_counts'=>$ask_counts,
                'BigLawyer'=>$BigLawyer,'ActiveBigLawyer'=>$ActiveBigLawyer,
                'OnlineLawyer'=>$OnlineLawyer,'AskStars'=>$AskStars,'gonggao'=>$gonggao));
    }

    /**
     * 列出所有问答数据
     * 周泉
     * 2011-03-11
     */
    public function actionListAll2() {
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        $criteria->order = 'ID DESC';
        //总记录数放到缓存中600秒
        if(cache()->get('questionnum')) {
            $num = cache()->get('questionnum');
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set('questionnum',$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="questionlist_" .$pages->currentpage;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存3分钟
        }

        $pos = $this->getCustomerPosition();
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = '中顾法律网法律咨询中心 - 全部法律咨询';
        cs()->registerMetaTag(sprintf('%s%s', $this->pageTitle,'法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('list',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers
                ,'oaskclass'=>$oaskclass,'citys'=>$citys
        ));
    }
    public function actionListAll() {
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        $criteria->addCondition('jie<>44');
        $criteria->order = 'ID DESC';
        //总记录数放到缓存中600秒
        if(cache()->get('questionnum')) {
            $num = cache()->get('questionnum');
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set('questionnum',$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="questionlist_" .$pages->currentpage;
        if(cache()->get($cachename_list) ) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存3分钟
        }
    
        $pos = $this->getCustomerPosition();
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();
       
        $this->pageTitle = '中顾法律网法律咨询中心 - 全部法律咨询';
        cs()->registerMetaTag(sprintf('%s%s', $this->pageTitle,'法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('list',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers
                ,'oaskclass'=>$oaskclass,'citys'=>$citys
        ));
    }

    /**
     * 列出所有已解决的问答数据
     * 周泉
     * 2011-03-11
     */
    public function actionListSolved() {
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        $criteria->addCondition('jie=1');
        //$criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'ChangeTime DESC';
        //总记录数放到缓存中600秒
        if(cache()->get('question_solved_num')) {
            $num = cache()->get('question_solved_num');
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set('question_solved_num',$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="listsolved_" .$pages->currentpage;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存3分钟
        }
        $pos = $this->getCustomerPosition();
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = '中顾法律网法律咨询中心 - 已解决法律咨询';
        cs()->registerMetaTag(sprintf('%s%s', $this->pageTitle,'法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('list',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers,'menu'=>4
                ,'oaskclass'=>$oaskclass,'citys'=>$citys
        ));
    }

    /**
     * 列出所有未解决的问答数据
     * 周泉
     * 2011-03-11
     */
    public function actionListNoSolved() {
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        $criteria->addCondition('jie=0');
        //$criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'ChangeTime DESC';
        //总记录数放到缓存中600秒
        if(cache()->get('question_nosolved_num')) {
            $num = cache()->get('question_nosolved_num');
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set('question_nosolved_num',$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="listnosolved_" .$pages->currentpage;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存6分钟
        }
        $pos = $this->getCustomerPosition();
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = '中顾法律网法律咨询中心 - 未解决法律咨询';
        cs()->registerMetaTag(sprintf('%s%s', $this->pageTitle,'法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('list',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers,'menu'=>3
                ,'oaskclass'=>$oaskclass,'citys'=>$citys
        ));
    }

    /**
     * 列出所有零回答的问答数据
     * 周泉
     * 2011-03-11
     */
    public function actionListNoAnswer() {
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        $criteria->addCondition('replys=0');
        //$criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'ID DESC';
        //总记录数放到缓存中600秒
        if(cache()->get('question_noanswer_num')) {
            $num = cache()->get('question_noanswer_num');
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set('question_noanswer_num',$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="listboanswer_" .$pages->currentpage;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存3分钟
        }
        $pos = $this->getCustomerPosition();
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = '中顾法律网法律咨询中心 - 零回复法律咨询';
        cs()->registerMetaTag(sprintf('%s%s', $this->pageTitle,'法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('list',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers,'menu'=>7
                ,'oaskclass'=>$oaskclass,'citys'=>$citys
        ));
    }

    /**
     * 列出所有高分的问答数据
     * 周泉
     * 2011-03-11
     */
    public function actionListHighscore() {
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        $criteria->addCondition('shang>0');
        //$criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'shang DESC';

        //总记录数放到缓存中600秒
        if(cache()->get('question_highscore_num')) {
            $num = cache()->get('question_highscore_num');
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set('question_highscore_num',$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="listhighscore_" .$pages->currentpage;
        if(cache()->get($cachename_list)   ) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {

            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600);//缓存10分钟
        }
        $pos = $this->getCustomerPosition();
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = '中顾法律网法律咨询中心 - 高分法律咨询';
        cs()->registerMetaTag(sprintf('%s%s', $this->pageTitle,'法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('list',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers,'menu'=>6
                ,'oaskclass'=>$oaskclass,'citys'=>$citys
        ));
    }

    /**
     * 列出所有推荐的问答数据
     * 周泉
     * 2011-03-11
     */
    public function actionListRecommend() {
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        $criteria->addCondition('tui=1');
        //$criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'ChangeTime DESC';
        //总记录数放到缓存中600秒
        if(cache()->get('question_recommend_num')) {
            $num = cache()->get('question_recommend_num');
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set('question_recommend_num',$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="recommend_" .$pages->currentpage;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存6分钟
        }

        $pos = $this->getCustomerPosition();
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = '中顾法律网法律咨询中心 - 推荐法律咨询';
        cs()->registerMetaTag(sprintf('%s%s', $this->pageTitle,'法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('list',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers,'menu'=>2
                ,'oaskclass'=>$oaskclass,'citys'=>$citys)
        );
    }

    /**
     * 列出所有热点的问答数据
     * 周泉
     * 2011-03-11
     */
    public function actionListHot() {
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        //$criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'replys DESC';
        //总记录数放到缓存中600秒
        if(cache()->get('question_hot_num')) {
            $num = cache()->get('question_hot_num');
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set('question_hot_num',$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="listhot_" .$pages->currentpage;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存3分钟
        }
        $pos = $this->getCustomerPosition();
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = '中顾法律网法律咨询中心 - 热门法律咨询';
        cs()->registerMetaTag(sprintf('%s%s', $this->pageTitle,'法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('list',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers
                ,'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>5,
        ));
    }

    /**
     * 列出地区（省份、城市）所有问答数据
     * 周泉
     * 2011-03-14
     *
     */
    public function actionAreaListAll($area) {
        if(!$area) {
            throw new CHttpException(404);
        }
        $key = $area;
        $areaid=0;
        $areaname='';
        $isCity=false;

        $provArr = array();
        if(cache()->get('prov_all_miker')) {
            $provArr = unserialize(cache()->get('prov_all_miker'));
        }else {
            $prov = AskCityPname::model()->findAll();
            foreach ($prov as $k=>$v) {
                $provArr[]= strtolower($v->paixu);
            }
            cache()->set('prov_all_miker',serialize($provArr),600);
        }

        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        $criteria->order = 'ChangeTime DESC';
        $criteria->addCondition('jie<>44');
        if (in_array($key, $provArr)) {
            $provObj = AskCityPname::model()->findByAttributes(array('paixu'=>$key));
            $areaid = $provid = $provObj->pNameID;
            $areaname = $provObj->pname;
            $isCity = false;
            $criteria->addCondition('pnameid='.$provid);
        } else {
            $city = AskCityCname::model()->findByAttributes(array('paixu'=>$key));
            $areaid = $cityid = $city->cnameID;
            $areaname = $city->cname;
            $isCity = true;
            $criteria->addCondition('cnameid='.$cityid);
        }

        //总记录数放到缓存中600秒
        $cachename_count="AreaListAll_" . $area;
        if(cache()->get($cachename_count)) {
            $num = cache()->get($cachename_count);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename_count,$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值

        $cachename_list="questionlist_area_listall_" .$pages->currentpage . $area;
        if(cache()->get($cachename_list)  ) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存5分钟
        }
        $pos = $this->getCustomerPosition(AskTool::getClientIp());
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$areaid,$isCity);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6,$areaid,$isCity);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = "中顾法律网法律咨询中心 - $areaname所有法律咨询";
        cs()->registerMetaTag(sprintf('%s %s', $this->pageTitle, '法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('listarea',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>1,'provid'=>$provid,'cityid'=>$cityid,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers));
    }

    /**
     * 列出地区（省份、城市）已解决的问答数据
     * 周泉
     * 2011-03-14
     *
     */
    public function actionAreaListSolved($area) {
        if(!$area) {
            throw new CHttpException(404);
        }
        $key = $area;
        $areaid=0;
        $areaname='';
        $isCity=false;

        $provArr = array();
        if(cache()->get('prov_all_miker')) {
            $provArr = unserialize(cache()->get('prov_all_miker'));
        }else {
            $prov = AskCityPname::model()->findAll();
            foreach ($prov as $k=>$v) {
                $provArr[]= strtolower($v->paixu);
            }
            cache()->set('prov_all_miker',serialize($provArr),600);
        }

        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        $criteria->addCondition('jie=1');
        //$criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'ChangeTime DESC';
        if (in_array($key, $provArr)) {
            $provObj = AskCityPname::model()->findByAttributes(array('paixu'=>$key));
            $areaid = $provid = $provObj->pNameID;
            $areaname = $provObj->pname;
            $isCity = false;
            $criteria->addCondition('pnameid='.$provid);
        } else {
            $city = AskCityCname::model()->findByAttributes(array('paixu'=>$key));
            $areaid = $cityid = $city->cnameID;
            $areaname = $city->cname;
            $isCity = true;
            $criteria->addCondition('cnameid='.$cityid);
        }

        //总记录数放到缓存中600秒
        $cachename_count="Area_Listsolved_" . $area;
        if(cache()->get($cachename_count)) {
            $num = cache()->get($cachename_count);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename_count,$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="questionlist_area_listall_" .$pages->currentpage . $area;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存5分钟
        }
        $pos = $this->getCustomerPosition();
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$areaid,$isCity);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6,$areaid,$isCity);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = "中顾法律网法律咨询中心 - $areaname已解决法律咨询";
        cs()->registerMetaTag(sprintf('%s %s', $this->pageTitle, '法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('listarea',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>4,'provid'=>$provid,'cityid'=>$cityid,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers));
    }

    /**
     * 列出地区（省份、城市）未解决的问答数据
     * 周泉
     * 2011-03-14
     *
     */
    public function actionAreaListNoSolved($area) {
        if(!$area) {
            throw new CHttpException(404);
        }
        $key = $area;
        $areaid=0;
        $areaname='';
        $isCity=false;

        $provArr = array();
        if(cache()->get('prov_all_miker')) {
            $provArr = unserialize(cache()->get('prov_all_miker'));
        }else {
            $prov = AskCityPname::model()->findAll();
            foreach ($prov as $k=>$v) {
                $provArr[]= strtolower($v->paixu);
            }
            cache()->set('prov_all_miker',serialize($provArr),600);
        }

        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        $criteria->addCondition('jie=0');
        //  $criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'ChangeTime DESC';
        if (in_array($key, $provArr)) {
            $provObj = AskCityPname::model()->findByAttributes(array('paixu'=>$key));
            $areaid = $provid = $provObj->pNameID;
            $areaname = $provObj->pname;
            $isCity = false;
            $criteria->addCondition('pnameid='.$provid);
        } else {
            $city = AskCityCname::model()->findByAttributes(array('paixu'=>$key));
            $areaid = $cityid = $city->cnameID;
            $areaname = $city->cname;
            $isCity = true;
            $criteria->addCondition('cnameid='.$cityid);
        }

        //总记录数放到缓存中600秒
        $cachename_count="AreaListNOSOLVED_" . $area;
        if(cache()->get($cachename_count)) {
            $num = cache()->get($cachename_count);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename_count,$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="questionlist_area_NOSOLVED_" .$pages->currentpage . $area;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存5分钟
        }
        $pos = $this->getCustomerPosition();
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$areaid,$isCity);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6,$areaid,$isCity);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = "中顾法律网法律咨询中心 - $areaname未解决法律咨询";
        cs()->registerMetaTag(sprintf('%s %s', $this->pageTitle, '法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('listarea',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>3,'provid'=>$provid,'cityid'=>$cityid,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers));
    }

    /**
     * 列出地区（省份、城市）零回答的问答数据
     * 周泉
     * 2011-03-14
     *
     */
    public function actionAreaListNoAnswer($area) {
        if(!$area) {
            throw new CHttpException(404);
        }
        $key = $area;
        $areaid=0;
        $areaname='';
        $isCity=false;

        $provArr = array();
        if(cache()->get('prov_all_miker')) {
            $provArr = unserialize(cache()->get('prov_all_miker'));
        }else {
            $prov = AskCityPname::model()->findAll();
            foreach ($prov as $k=>$v) {
                $provArr[]= strtolower($v->paixu);
            }
            cache()->set('prov_all_miker',serialize($provArr),600);
        }

        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        $criteria->addCondition('replys=0');
         $criteria->addCondition('jie<>44');
        // $criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'ID DESC';
        if (in_array($key, $provArr)) {
            $provObj = AskCityPname::model()->findByAttributes(array('paixu'=>$key));
            $areaid = $provid = $provObj->pNameID;
            $areaname = $provObj->pname;
            $isCity = false;
            $criteria->addCondition('pnameid='.$provid);
        } else {
            $city = AskCityCname::model()->findByAttributes(array('paixu'=>$key));
            $areaid = $cityid = $city->cnameID;
            $areaname = $city->cname;
            $isCity = true;
            $criteria->addCondition('cnameid='.$cityid);
        }

        //总记录数放到缓存中600秒
        $cachename_count="AreaLisT_NOANSWER_" . $area;
        if(cache()->get($cachename_count)) {
            $num = cache()->get($cachename_count);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename_count,$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="questionlist_area_NOANSWER_" .$pages->currentpage . $area;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存5分钟
        }
        $pos = $this->getCustomerPosition();
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$areaid,$isCity);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6,$areaid,$isCity);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();


        $this->pageTitle = "中顾法律网法律咨询中心 - $areaname零回答法律咨询";
        cs()->registerMetaTag(sprintf('%s %s', $this->pageTitle, '法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('listarea',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>7,'provid'=>$provid,'cityid'=>$cityid,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers));
    }

    /**
     * 列出地区（省份、城市）高分的问答数据
     * 周泉
     * 2011-03-14
     *
     */
    public function actionAreaListHighscore($area) {
        if(!$area) {
            throw new CHttpException(404);
        }
        $key = $area;
        $areaid=0;
        $areaname='';
        $isCity=false;

        $provArr = array();
        if(cache()->get('prov_all_miker')) {
            $provArr = unserialize(cache()->get('prov_all_miker'));
        }else {
            $prov = AskCityPname::model()->findAll();
            foreach ($prov as $k=>$v) {
                $provArr[]= strtolower($v->paixu);
            }
            cache()->set('prov_all_miker',serialize($provArr),600);
        }

        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        $criteria->addCondition('shang>0');
         $criteria->addCondition('jie<>44');
        //$criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'shang DESC';
        if (in_array($key, $provArr)) {
            $provObj = AskCityPname::model()->findByAttributes(array('paixu'=>$key));
            $areaid = $provid = $provObj->pNameID;
            $areaname = $provObj->pname;
            $isCity = false;
            $criteria->addCondition('pnameid='.$provid);
        } else {
            $city = AskCityCname::model()->findByAttributes(array('paixu'=>$key));
            $areaid = $cityid = $city->cnameID;
            $areaname = $city->cname;
            $isCity = true;
            $criteria->addCondition('cnameid='.$cityid);
        }

        //总记录数放到缓存中600秒
        $cachename_count="AreaList_HIGHSCORE_" . $area;
        if(cache()->get($cachename_count)) {
            $num = cache()->get($cachename_count);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename_count,$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="questionlist_area_HIGHSCORE_" .$pages->currentpage . $area;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存5分钟
        }
        $pos = $this->getCustomerPosition();
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);

        $this->pageTitle = "中顾法律网法律咨询中心 - $areaname高分法律咨询";
        cs()->registerMetaTag(sprintf('%s %s', $this->pageTitle, '法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->render('listarea',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>6,'provid'=>$provid,'cityid'=>$cityid,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers));
    }

    /**
     * 列出地区（省份、城市）推荐的问答数据
     * 周泉
     * 2011-03-14
     *
     */
    public function actionAreaListRecommend($area) {
        if(!$area) {
            throw new CHttpException(404);
        }
        $key = $area;
        $areaid=0;
        $areaname='';
        $isCity=false;

        $provArr = array();
        if(cache()->get('prov_all_miker')) {
            $provArr = unserialize(cache()->get('prov_all_miker'));
        }else {
            $prov = AskCityPname::model()->findAll();
            foreach ($prov as $k=>$v) {
                $provArr[]= strtolower($v->paixu);
            }
            cache()->set('prov_all_miker',serialize($provArr),600);
        }

        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        $criteria->addCondition('tui=1');
         $criteria->addCondition('jie<>44');
        // $criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'ChangeTime DESC';
        if (in_array($key, $provArr)) {
            $provObj = AskCityPname::model()->findByAttributes(array('paixu'=>$key));
            $areaid = $provid = $provObj->pNameID;
            $areaname = $provObj->pname;
            $isCity = false;
            $criteria->addCondition('pnameid='.$provid);
        } else {
            $city = AskCityCname::model()->findByAttributes(array('paixu'=>$key));
            $areaid = $cityid = $city->cnameID;
            $areaname = $city->cname;
            $isCity = true;
            $criteria->addCondition('cnameid='.$cityid);
        }

        //总记录数放到缓存中600秒
        $cachename_count="AreaListAll_HIGHSCORE_" . $area;
        if(cache()->get($cachename_count)) {
            $num = cache()->get($cachename_count);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename_count,$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="questionlist_area_RECOMMAND_" .$pages->currentpage . $area;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存5分钟
        }
        $pos = $this->getCustomerPosition();
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$areaid,$isCity);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6,$areaid,$isCity);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = "中顾法律网法律咨询中心 - $areaname推荐法律咨询";
        cs()->registerMetaTag(sprintf('%s %s', $this->pageTitle, '法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('listarea',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>2,'provid'=>$provid,'cityid'=>$cityid,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers));
    }

    /**
     * 列出地区（省份、城市）热门的问答数据
     * 周泉
     * 2011-03-14
     *
     */
    public function actionAreaListHot($area) {
        if(!$area) {
            throw new CHttpException(404);
        }
        $key = $area;
        $areaid=0;
        $areaname='';
        $isCity=false;

        $provArr = array();
        if(cache()->get('prov_all_miker')) {
            $provArr = unserialize(cache()->get('prov_all_miker'));
        }else {
            $prov = AskCityPname::model()->findAll();
            foreach ($prov as $k=>$v) {
                $provArr[]= strtolower($v->paixu);
            }
            cache()->set('prov_all_miker',serialize($provArr),600);
        }

        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        $criteria->addCondition('replys>0');
        $criteria->addCondition('jie<>44');
        // $criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'replys DESC';
        if (in_array($key, $provArr)) {
            $provObj = AskCityPname::model()->findByAttributes(array('paixu'=>$key));
            $areaid = $provid = $provObj->pNameID;
            $areaname = $provObj->pname;
            $isCity = false;
            $criteria->addCondition('pnameid='.$provid);
        } else {
            $city = AskCityCname::model()->findByAttributes(array('paixu'=>$key));
            $areaid = $cityid = $city->cnameID;
            $areaname = $city->cname;
            $isCity = true;
            $criteria->addCondition('cnameid='.$cityid);
        }

        //总记录数放到缓存中600秒
        $cachename_count="AreaListAll_HOTQUESTION_" . $area;
        if(cache()->get($cachename_count)) {
            $num = cache()->get($cachename_count);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename_count,$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=20;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="questionlist_area_HOTQUESTION_" .$pages->currentpage . $area;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存5分钟
        }
        $pos = $this->getCustomerPosition();
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$areaid,$isCity);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6,$areaid,$isCity);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6,$areaid,$isCity);
        $oaskclass=AskTool::OaskClass_GetClass();

        $this->pageTitle = "中顾法律网法律咨询中心 - $areaname热门法律咨询";
        cs()->registerMetaTag(sprintf('%s %s', $this->pageTitle, '法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('listarea',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>5,'provid'=>$provid,'cityid'=>$cityid,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers));
    }

    /**
     * 列出分类（专长）所有问答数据
     * 周泉
     * 2011-03-16
     */
    public function actionCategoryListAll($cname) {
        if (!$cname) {
            throw new CHttpException(404);
        }
        $key = strtolower($cname);
        $pos = $this->getCustomerPosition();
        //print_r($pos);
        $isBigId = false;
        $catArr = array();
        if (cache()->get('category_arr_'.$key) ) {
            $catArr = unserialize(cache()->get('category_arr_'.$key));
        } else {
            if(is_numeric($key)) {
                $catArr = OaskClass::model()->find( " ID='".$key."' ");
            }
            else {
                $catArr = OaskClass::model()->find("dir='".$key."'   ");
            }
            cache()->set('category_arr_'.$key, serialize($catArr), 6000);
        }

        $categoryid = $catArr->ID;
        $categoryname = $catArr->topic;
        if ($catArr->fatherID==1) {
            $isBigId = true;
        }
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        if ($isBigId) {
            $criteria->addCondition('fatherID='.$categoryid);
        } else {
            $criteria->addCondition('fenleiid='.$categoryid);
        }
        //避免删除的对象出现
        $criteria->addCondition('jie<>44');
        $criteria->order = 'ChangeTime DESC';
        //总记录数放到缓存中600秒
        $cachename_count="CategoryListall_" . $cname;
        if(cache()->get($cachename_count)) {
            $num = cache()->get($cachename_count);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename_count,$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=26;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="questioncatalog_" .$pages->currentpage . $cname;
        if(cache()->get($cachename_list) ) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存5分钟
        }
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);

        $webmaster = AskTool::getWebmaster($categoryid);
        $webmasterAnswer = AskTool::getWebmasterAnswer($webmaster->user->name, 5);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = "中顾法律网法律咨询中心 - $categoryname所有法律咨询";
        cs()->registerMetaTag(sprintf('%s %s', $this->pageTitle, '法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('listcategory',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>1,'categoryid'=>$categoryid,'cachename_list'=>$cachename_list,'categoryname'=>$categoryname,
                'webmaster'=>$webmaster,'webmasterAnswer'=>$webmasterAnswer));
    }

    /**
     * 列出分类（专长）所有已解决的问答数据
     * 周泉
     * 2011-03-16
     */
    public function actionCategoryListSolved($cname) {
        if (!$cname) {
            throw new CHttpException(404);
        }
        $key = strtolower($cname);
        $pos = $this->getCustomerPosition();

        $isBigId = false;
        $catArr = array();
        if (cache()->get('category_arr_'.$key)) {
            $catArr = unserialize(cache()->get('category_arr_'.$key));
        } else {
            if(is_numeric($key)) {
                $catArr = OaskClass::model()->find( " ID='".$key."' ");
            }
            else {
                $catArr = OaskClass::model()->find("dir='".$key."'   ");
            }
            cache()->set('category_arr_'.$key, serialize($catArr), 6000);
        }
        if ($catArr->fatherID==1) {
            $isBigId = true;
        }

        $categoryid = $catArr->ID;
        $categoryname = $catArr->topic;
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        if ($isBigId) {
            $criteria->addCondition('fatherID='.$categoryid);
        } else {
            $criteria->addCondition('fenleiid='.$categoryid);
        }
        $criteria->addCondition('jie=1');
        $criteria->addCondition('jie<>44');
        // $criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'ChangeTime DESC';
        //总记录数放到缓存中600秒
        $cachename_count="CategoryList_solved_" . $cname;
        if(cache()->get($cachename_count)) {
            $num = cache()->get($cachename_count);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename_count,$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=26;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="questioncatalogListSolved_" .$pages->currentpage . '_' .$cname;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存5分钟
        }
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $webmaster = AskTool::getWebmaster($categoryid);
        $webmasterAnswer = AskTool::getWebmasterAnswer($webmaster->user->name, 5);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = "中顾法律网法律咨询中心 - $categoryname已解决法律咨询";
        cs()->registerMetaTag(sprintf('%s %s', $this->pageTitle, '法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('listcategory',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>4,'categoryid'=>$categoryid,'cachename_list'=>$cachename_list,'categoryname'=>$categoryname,
                'webmaster'=>$webmaster,'webmasterAnswer'=>$webmasterAnswer));
    }

    /**
     * 列出分类（专长）所有未解决的问答数据
     * 周泉
     * 2011-03-16
     */
    public function actionCategoryListNoSolved($cname) {
        if (!$cname) {
            throw new CHttpException(404);
        }
        $key = strtolower($cname);
        $pos = $this->getCustomerPosition();

        $isBigId = false;
        $catArr = array();
        if (cache()->get('category_arr_'.$key)) {
            $catArr = unserialize(cache()->get('category_arr_'.$key));
        } else {
            if(is_numeric($key)) {
                $catArr = OaskClass::model()->find( " ID='".$key."' ");
            }
            else {
                $catArr = OaskClass::model()->find("dir='".$key."'   ");
            }
            cache()->set('category_arr_'.$key, serialize($catArr), 6000);
        }
        if ($catArr->fatherID==1) {
            $isBigId = true;
        }

        $categoryid = $catArr->ID;
        $categoryname = $catArr->topic;
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        if ($isBigId) {
            $criteria->addCondition('fatherID='.$categoryid);
        } else {
            $criteria->addCondition('fenleiid='.$categoryid);
        }

        //$criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'ChangeTime DESC';
        //总记录数放到缓存中600秒
        $cachename_count="CategoryList_nosolved_count_" . $cname;
        if(cache()->get($cachename_count)) {
            $num = cache()->get($cachename_count);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename_count,$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=26;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="questioncatalog_NoSolved_" .$pages->currentpage . $cname;

        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存5分钟
        }
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $webmaster = AskTool::getWebmaster($categoryid);
        $webmasterAnswer = AskTool::getWebmasterAnswer($webmaster->user->name, 5);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = "中顾法律网法律咨询中心 - $categoryname未解决法律咨询";
        cs()->registerMetaTag(sprintf('%s %s', $this->pageTitle, '法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('listcategory',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>3,'categoryid'=>$categoryid,'cachename_list'=>$cachename_list,'categoryname'=>$categoryname,
                'webmaster'=>$webmaster,'webmasterAnswer'=>$webmasterAnswer));
    }

    /**
     * 列出分类（专长）所有零回答的问答数据
     * 周泉
     * 2011-03-16
     */
    public function actionCategoryListNoAnswer($cname) {
        if (!$cname) {
            throw new CHttpException(404);
        }
        $key = strtolower($cname);
        $pos = $this->getCustomerPosition();

        $isBigId = false;
        $catArr = array();
        if (cache()->get('category_arr_'.$key)) {
            $catArr = unserialize(cache()->get('category_arr_'.$key));
        } else {
            if(is_numeric($key)) {
                $catArr = OaskClass::model()->find( " ID='".$key."' ");
            }
            else {
                $catArr = OaskClass::model()->find("dir='".$key."'   ");
            }
            cache()->set('category_arr_'.$key, serialize($catArr), 6000);
        }
        if ($catArr->fatherID==1) {
            $isBigId = true;
        }

        $categoryid = $catArr->ID;
        $categoryname = $catArr->topic;
        $criteria = new CDbCriteria();
        if ($isBigId) {
            $criteria->addCondition('fatherID='.$categoryid);
        } else {
            $criteria->addCondition('fenleiid='.$categoryid);
        }
        $criteria->addCondition('replys=0');
        $criteria->addCondition('jie<>44');
        //$criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'ID DESC';
        //总记录数放到缓存中600秒
        $cachename_count="Category_list_noanser_count_" . $cname;
        if(cache()->get($cachename_count)) {
            $num = cache()->get($cachename_count);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename_count,$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=26;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=OaskQuestion::model()->findAll($criteria);
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $webmaster = AskTool::getWebmaster($categoryid);
        $webmasterAnswer = AskTool::getWebmasterAnswer($webmaster->user->name, 5);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = "中顾法律网法律咨询中心 - $categoryname零回答法律咨询";
        cs()->registerMetaTag(sprintf('%s %s', $this->pageTitle, '法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('listcategory',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>7,'categoryid'=>$categoryid,'cachename_list'=>$cachename_list,'categoryname'=>$categoryname,
                'webmaster'=>$webmaster,'webmasterAnswer'=>$webmasterAnswer));
    }

    /**
     * 列出分类（专长）所有高分的问答数据
     * 周泉
     * 2011-03-16
     */
    public function actionCategoryListHighscore($cname) {
        if (!$cname) {
            throw new CHttpException(404);
        }
        $key = strtolower($cname);
        $pos = $this->getCustomerPosition();

        $isBigId = false;
        $catArr = array();
        if (cache()->get('category_arr_'.$key)) {
            $catArr = unserialize(cache()->get('category_arr_'.$key));
        } else {
            if(is_numeric($key)) {
                $catArr = OaskClass::model()->find( " ID='".$key."' ");
            }
            else {
                $catArr = OaskClass::model()->find("dir='".$key."'   ");
            }
            cache()->set('category_arr_'.$key, serialize($catArr), 6000);
        }
        if ($catArr->fatherID==1) {
            $isBigId = true;
        }

        $categoryid = $catArr->ID;
        $categoryname = $catArr->topic;
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        if ($isBigId) {
            $criteria->addCondition('fatherID='.$categoryid);
        } else {
            $criteria->addCondition('fenleiid='.$categoryid);
        }
        $criteria->addCondition('shang>0');
        $criteria->addCondition('jie<>44');
        //$criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'shang DESC';

        //总记录数放到缓存中600秒
        $cachename_count="CategoryListHighscore_count_" . $cname;
        if(cache()->get($cachename_count)) {
            $num = cache()->get($cachename_count);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename_count,$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=26;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="questioncatalog_Highscore_" .$pages->currentpage . $cname;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存5分钟
        }
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $webmaster = AskTool::getWebmaster($categoryid);
        $webmasterAnswer = AskTool::getWebmasterAnswer($webmaster->user->name, 5);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = "中顾法律网法律咨询中心 - $categoryname高分法律咨询";
        cs()->registerMetaTag(sprintf('%s %s', $this->pageTitle, '法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('listcategory',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>6,'categoryid'=>$categoryid,'cachename_list'=>$cachename_list,'categoryname'=>$categoryname,
                'webmaster'=>$webmaster,'webmasterAnswer'=>$webmasterAnswer));
    }

    /**
     * 列出分类（专长）所有推荐的问答数据
     * 周泉
     * 2011-03-16
     */
    public function actionCategoryListRecommend($cname) {
        if (!$cname) {
            throw new CHttpException(404);
        }
        $key = strtolower($cname);
        $pos = $this->getCustomerPosition();

        $isBigId = false;
        $catArr = array();
        if (cache()->get('category_arr_'.$key)) {
            $catArr = unserialize(cache()->get('category_arr_'.$key));
        } else {
            if(is_numeric($key)) {
                $catArr = OaskClass::model()->find( " ID='".$key."' ");
            }
            else {
                $catArr = OaskClass::model()->find("dir='".$key."'   ");
            }
            cache()->set('category_arr_'.$key, serialize($catArr), 6000);
        }
        if ($catArr->fatherID==1) {
            $isBigId = true;
        }

        $categoryid = $catArr->ID;
        $categoryname = $catArr->topic;
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        if ($isBigId) {
            $criteria->addCondition('fatherID='.$categoryid);
        } else {
            $criteria->addCondition('fenleiid='.$categoryid);
        }
        $criteria->addCondition('tui=1');
        $criteria->addCondition('jie<>44');
        // $criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->order = 'ChangeTime DESC';
        //总记录数放到缓存中600秒
        $cachename_count="CategoryListrecommand_" . $cname;
        if(cache()->get($cachename_count)) {
            $num = cache()->get($cachename_count);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename_count,$num,600);
        }

        $pages=new CPagination($num);
        $pages->pageSize=26;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="questioncatalog_recommand_" .$pages->currentpage .'_' . $cname;
        if(cache()->get($cachename_list)  ) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存5分钟
        }
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $webmaster = AskTool::getWebmaster($categoryid);
        $webmasterAnswer = AskTool::getWebmasterAnswer($webmaster->user->name, 5);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = "中顾法律网法律咨询中心 - $categoryname推荐法律咨询";
        cs()->registerMetaTag(sprintf('%s %s', $this->pageTitle, '法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('listcategory',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>2,'categoryid'=>$categoryid,'cachename_list'=>$cachename_list,'categoryname'=>$categoryname,
                'webmaster'=>$webmaster,'webmasterAnswer'=>$webmasterAnswer));
    }

    /**
     * 列出分类（专长）所有热点的问答数据
     * 周泉
     * 2011-03-16
     */
    public function actionCategoryListHot($cname) {
        if (!$cname) {
            throw new CHttpException(404);
        }
        $key = strtolower($cname);
        $pos = $this->getCustomerPosition();
        $isBigId = false;
        $catArr = array();
        if (cache()->get('category_arr_'.$key)) {
            $catArr = unserialize(cache()->get('category_arr_'.$key));
        } else {
            if(is_numeric($key)) {
                $catArr = OaskClass::model()->find( " ID='".$key."' ");
            }
            else {
                $catArr = OaskClass::model()->find("dir='".$key."'   ");
            }
            cache()->set('category_arr_'.$key, serialize($catArr), 6000);
        }
        if ($catArr->fatherID==1) {
            $isBigId = true;
        }

        $categoryid = $catArr->ID;
        $categoryname = $catArr->topic;
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,fenleiid,pnameid,cnameid,topic,shang,sendtime,jie,replys,views,ChangeTime';
        if ($isBigId) {
            $criteria->addCondition('fatherID='.$categoryid);
        } else {
            $criteria->addCondition('fenleiid='.$categoryid);
        }
        //$criteria->addCondition(new CDbExpression('datediff(mm,sendtime,getdate())<1'));
        $criteria->addCondition('jie<>44');
        $criteria->order = 'replys DESC';

        //总记录数放到缓存中600秒
        $cachename_count="Category_ListHot_" . $cname;
        if(cache()->get($cachename_count)) {
            $num = cache()->get($cachename_count);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename_count,$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=26;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="questioncatalog_listhot_" .$pages->currentpage . $cname;
        if(cache()->get($cachename_list)) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),600,new CDbCacheDependency('select  top 1 changetime from oask_question order by changetime desc'));//缓存5分钟
        }
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $webmaster = AskTool::getWebmaster($categoryid);
        $webmasterAnswer = AskTool::getWebmasterAnswer($webmaster->user->name, 5);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();

        $this->pageTitle = "中顾法律网法律咨询中心 - $categoryname热点法律咨询";
        cs()->registerMetaTag(sprintf('%s %s', $this->pageTitle, '法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');

        $this->render('listcategory',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers,
                'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>5,'categoryid'=>$categoryid,'cachename_list'=>$cachename_list,'categoryname'=>$categoryname,
                'webmaster'=>$webmaster,'webmasterAnswer'=>$webmasterAnswer));
    }

    /**
     * question详情页
     * Enter description here ...
     * @param unknown_type $id
     */
    public function actionShowQuestion($id) {
        $id = (int)$id;
        ;
        $question = OaskQuestion::model()->findByPk($id);
        $this->render('showquestion',array('question'=>$question));
    }

    /**
     * 删除演示
     * Enter description here ...
     * @param unknown_type $id
     */
    public function actionDelQuestions($id) {
        $id = (int)$id;
        OaskQuestion::model()->deleteByPk($id);
        app()->request->redirect(url('ask/listquestion', array('name'=>'terry')));
    }
    /**
     * 添加验示，为oask_question表中加一条记录
     * Enter description here ...
     */
    public function actionCreateQuestion() {
        $model=new OaskQuestion();
        if(isset($_POST['OaskQuestion'])) {
            $model->attributes=$_POST['OaskQuestion'];
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
     * 修改验示，为oask_question表中加一条记录
     * Enter description here ...
     */
    public function actionEditQuestion($id) {
        $id = (int)$id;
        $model=OaskQuestion::model()->findByPk($id);
        if(isset($_POST['OaskQuestion'])) {
            $model->attributes=$_POST['OaskQuestion'];
            if($model->validate()) {
                app()->user->setFlash('success','更新成功');
                $model->save(false);
                app()->request->redirect(url('ask/listquestion', array('name'=>'terry')));
            }
        }
        $this->render('create',array('model'=>$model));
    }
    private function getCustomerPosition($ip = '') {
        $cachename="ips"; //读取以后进行缓存20分钟
        $pos=array();
        if(isset($_COOKIE['sip'])) {
            $pos=unserialize($_COOKIE["sip"]) ;
        }
        else {
            // echo "sdffsd";
            $ipdata = new IPData();
            $isCity=false;
            $pos = $ipdata->get_ip_position($ip);
            if ($pos['isCity']) {
                $city = $pos['name'];
                $sql="cname = '$city'";
                $cityArr = AskCityCname::model()->find(array('condition'=>$sql));
                //print_r($cityArr);
                if (empty($cityArr)) {
                    $pos=array('isCity'=>false,'name'=>'北京','pnameid'=>1,'areaid'=>1,'searchstr'=>'pnameid=1'); // 北京
                } else {
                    $pos['areaid'] = $pos['cnameid'] = $cityArr->cnameID;
                    $pos['searchstr'] = 'cnameid='.$cityArr->cnameID;
                }
            } else {
                $sql="pname = '$pos->name'";
                $provArr = AskCityPname::model()->find(array('condition'=>$sql));
                if (empty($provArr)) {
                    $pos=array('isCity'=>false,'name'=>'北京','pnameid'=>1,'areaid'=>1,'searchstr'=>'pnameid=1'); // 北京
                } else {
                    $pos['areaid'] = $pos['pnameid'] = $provArr->pnameID;
                    $pos['searchstr'] = 'pnameid='.$provArr->pnameID;
                }
            }
            // $_COOKIE['sip']=$pos;
            setcookie('sip',serialize($pos),time()+3600*1, "/");

        }

        return $pos;
    }
    //版主删除问题，根据地区
    public function actionDelquestion_area($qid,$pnameid,$cnameid) {
        $jg=0;
        if(!empty($qid) && !empty(app()->user->id) &&  app(!empty($pnameid) || !empty($cnameid) )) {
            $ismsaster=Webmastertools::areamaster($pnameid, $cnameid,app()->user->id);
           // echo $ismsaster;
            if($ismsaster=="1") {
                //如果是版主
                $jg=1;               
                Webmastertools::Delquestion($qid);//删除咨询
            }
        }
        $this->renderpartial('delquestion');
        $url=app()->request->urlReferrer;
        if(empty($url)) {
            if($cname) {
                $url=url("ask/AreaListAll",array('cname'=>$cname));
            }
            else {
                $url=url("ask/AreaListAll",array('cname'=>$pname));
            }
        }
        //app()->request->redirect($url);
        $title="删除完成!";
        if($jg==0)   $title="删除过程中出现错误，删除失败！";
        AskTool::GoUrl($title, $url);
    }
    //版主删除问题
    //核心参数 $qid,后面【$fenleiid=11,$leixing=1】这些参数,用于判断该用户是否为版主的双重验证,根据类别删除
    public function actionDelquestion_byclass($qid,$leixing,$categoryid,$cachename) {
        if($leixing==1 && app()->user->id>0)//并且用户已经登录
        {   //如果是根据专长来的删除，首先判断该问题是否存在
            $question=OaskQuestion::model()->findbyPK($qid);
            // echo "状态：开始查询$qid";
            // print_r($question);
            if($question!=null) {
                //echo "状态：找到问题";
                if($question->fenleiid==$categoryid) {//如果类别也相等，排除用户故意输入id,试图跳过检验
                    //判断用户死否为版主
                    $ismsaster=Webmastertools::fenleimaster($categoryid, app()->user->id);
                    if($ismsaster!="1") {//如果用户不是版主
                        $jg=0;
                    }
                    else {
                        $jg=1;
                        Webmastertools::Delquestion($qid);//开始调用删除函数
                    }
                }
            }
        }
        $this->renderpartial('delquestion');
        $url=app()->request->urlReferrer;
        if(empty($url)) $url=url("ask/listcategory",array('cname'=>$fenleiid));
        //app()->request->redirect($url);
        $title="删除完成!";
        if($jg==0) {
            $title="删除过程中出现错误，删除失败！";
        }
        else {
            //清空缓存
            cache()->delete($cachename);
        }

        AskTool::GoUrl($title, $url);
    }

/*
    public function filters() {
        return array(
                array(
                        'COutputCache+index',
                        'duration'=>300,//缓存1小时
                        'varyByParam'=>array('name','Page')
                ),
        );
    }
 */
 


}