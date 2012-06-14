<?php
/*
 * 各地排行榜
 * ndw
*/
class PaihangbangController extends CController {
    public $layout = '//layouts/paihangbang';

    //地区排行
    public function actionarea($pnameid=0,$cnameid=0,$fenleiid=0) {
        $areaname="全国";
        if($cnameid>0) {
            $askcitys=AskTool::Area_GetCname();
            $areaname=$askcitys[$cnameid];
        }
        else {
            if($cnameid>0) {
                $askprovs=AskTool::Area_GetPname();
                $areaname=$askprovs[$pnameid];
            }
        }
        $zhuanchangname='';
        if($fenleiid)
            {
             $oaskclass=AskTool::OaskClass_GetClass();
             $zhuanchangname=$oaskclass[$fenleiid];
            }
        $search=$_POST['search'];
        if(!empty ($search)) {//如果是搜索
            $search_rear=AskTool::Area_search($search);
            if(is_array($search_rear)) {
                //如果是城市
                if($search_rear['iscity']) {
                    $replylist=paihangbangclass::get(30, 0,$search_rear['id'],  0,1);
                    $bestlist=paihangbangclass::get(30,0, $search_rear['id'],  0,2);
                    $hplist=paihangbangclass::get(30,0, $search_rear['id'], 0,3);
                    $areaname=$search;
                    //echo $search_rear['id'];
                }
                else {
                    //如果是省份
                    $replylist=paihangbangclass::get(30, $search_rear['id'], 0, 0,1);
                    $bestlist=paihangbangclass::get(30, $search_rear['id'], 0, 0,2);
                    $hplist=paihangbangclass::get(30, $search_rear['id'], 0, 0,3);
                    $areaname=$search;
                }
            }
            else {
                //如果找不到，调用全国的
                $replylist=paihangbangclass::get(30, $pnameid, $cnameid, 0,1);
                $bestlist=paihangbangclass::get(30, $pnameid, $cnameid, 0,2);
                $hplist=paihangbangclass::get(30, $pnameid, $cnameid, 0,3);
            }
        }
        else {
            //默认情况下进行的搜索
            $replylist=paihangbangclass::get(30, $pnameid, $cnameid,$fenleiid,1);
            $bestlist=paihangbangclass::get(30, $pnameid, $cnameid,$fenleiid,2);
            $hplist=paihangbangclass::get(30, $pnameid, $cnameid,11,3);
            // echo $fenleiid;
        }
        $this->pageTitle = '中顾法律网法律咨询中心 - 积分排行榜';
        cs()->registerMetaTag(sprintf('%s%s', $this->pageTitle,'法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');
        $this->render("area",array('replylist'=>$replylist,'bestlist'=>$bestlist,'hplist'=>$hplist,'areaname'=>$areaname,'zhuanchangname'=>$zhuanchangname));
    }
    //专长排行
    public function actionzhuanchang($fenleiid) {
        $replylist=paihangbangclass::class_replynum($fenleiid, 30);//普通回复数量
        $bestlist=paihangbangclass::class_reply_best($fenleiid, 30);//最佳回复数量
        $hplist=paihangbangclass::class_usercomment($fenleiid, 30);//好评排行榜
        $oaskclass=AskTool::OaskClass_GetClass();
        $this->pageTitle = '中顾法律网法律咨询中心 - 积分排行榜';
        cs()->registerMetaTag(sprintf('%s%s', $this->pageTitle,'法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');
        $this->render("zhuanchang",array('replylist'=>$replylist,'bestlist'=>$bestlist,'hplist'=>$hplist,'oaskclass'=>$oaskclass));
    }
    //总积分排行
    public function actionJifen() {
        $viplist=paihangbangclass::ScorePaihangByWeek_vip(30);
        $lawyerlist=paihangbangclass::ScorePaihangByWeek_lawyer(30);
        $gzlist=paihangbangclass::ScorePaihangByWeek_public(30);
        $this->pageTitle = '中顾法律网法律咨询中心 - 积分排行榜';
        cs()->registerMetaTag(sprintf('%s%s', $this->pageTitle,'法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');
        $this->render("jifen",array('viplist'=>$viplist,'lawyerlist'=>$lawyerlist,'gzlist'=>$gzlist));
    }
    public function actionIndex() {
        //print_r(paihangbangclass::ScorePaihangByWeek_vip(10));//统计积分排行榜
        //print_r(paihangbangclass::ScorePaihangByWeek_lawyer(10));
        // print_r(paihangbangclass::ScorePaihangByWeek_public(10));
        //print_r(paihangbangclass::Area_replynum_all(3));
        //print_r(paihangbangclass::Area_replynum_best_all(3));
        //print_r(paihangbangclass::Area_replynum_usercomment_all(3));
        // print_r(paihangbangclass::Area_replynum_prov(2,3)); //Area_replynum_prov
        // print_r(paihangbangclass::Area_replynum_best_prov(2,3)); // Area_replynum_best_prov
        //print_r(paihangbangclass::Area_replynum_best_city(86,4));   //Area_replynum_best_city
        // print_r(paihangbangclass::Area_usercomment_prov(1,4));// Area_usercomment_prov
        //print_r(paihangbangclass::Area_usercomment_city(86,4));
        //print_r(paihangbangclass::class_replynum(11,3));

        //print_r(paihangbangclass::get(3,2,0,11,1,'2010-11-11','2011-7-1'));
        //$jg=AskTool::Area_search('山东');
        //$jg=AskTool::OaskClass_search('婚姻家庭');
        // $this->actionZcndareajson(5,1, 0,11,1);
        $cnameid = $_COOKIE['cnameid'];
        $pnameid = $_COOKIE['pnameid'];
        $pnameArr = AskTool::Area_GetPname();
        $cnameArr = AskTool::Area_GetCname();

        $nums = 10;
        $ksdate=0;
        $jsdate=0;

        //城市
        //按回复咨询数量排行
        $city_reply = paihangbangclass::Area_replynum_city($cnameid, $nums);
        //按回复被采纳数量排行
        $city_best = paihangbangclass::Area_replynum_best_city($cnameid, $nums);

        //按回复获好评数量排行
        $city_comment = paihangbangclass::Area_usercomment_city($cnameid, $nums);

        //省份
        //按回复咨询数量排行
        $prov_reply = paihangbangclass::Area_replynum_prov($pnameid, $nums);
        //按回复被采纳数量排行
        $prov_best = paihangbangclass::Area_replynum_best_prov($pnameid, $nums);
        //按回复获好评数量排行
        $prov_comment = paihangbangclass::Area_usercomment_prov($pnameid, $nums);

        $paihangbang = array();
        $fenleiidArr = array(11,35,15,20,51,16,24,21,17,22);
        $nums = 5;
        foreach ($fenleiidArr as $k=>$fenleiid) {
            $inner_data = array();
            if ($k % 2 == 0) {
                //市+专长
                //按回复咨询数量排行
                $inner_data['city_reply'] = paihangbangclass::get($nums, 0, $cnameid, $fenleiid, 1);
                //按回复被采纳数量排行
                $inner_data['city_best'] = paihangbangclass::get($nums, 0, $cnameid, $fenleiid, 2);
                //按回复获好评数量排行
                $inner_data['city_comment'] = paihangbangclass::get($nums, 0, $cnameid, $fenleiid, 3);
            }
      
//			//省+专长
//			//按回复咨询数量排行
//			$inner_data['prov_reply'] = paihangbangclass::get($nums, $pnameid, 0, $fenleiid, 1);
//			//按回复被采纳数量排行
//			$inner_data['prov_best'] = paihangbangclass::get($nums, $pnameid, 0, $fenleiid, 2);
//			//按回复获好评数量排行
//			$inner_data['prov_comment'] = paihangbangclass::get($nums, $pnameid, 0, $fenleiid, 3);

            $fenlei = AskTool::getOaskClass($fenleiid);
            $inner_data[$fenleiid] = $fenlei;            
            $paihangbang[$fenleiid] = $inner_data;
        }

        $data = array(
                'cnameid'=>$cnameid,
                'pnameid'=>$pnameid,
                'pnameArr'=>$pnameArr,
                'cnameArr'=>$cnameArr,
                'city_reply2'=>$city_reply,
                'city_best2'=>$city_best,
                'city_comment2'=>$city_comment,
                'prov_reply'=>$prov_reply,
                'prov_best'=>$prov_best,
                'prov_comment'=>$prov_comment,
                'paihangbang'=>$paihangbang,
                'nums'=>$nums,

        );
        $this->pageTitle = '中顾法律网法律咨询中心 - 积分排行榜';
        cs()->registerMetaTag(sprintf('%s%s', $this->pageTitle,'法律咨询'), 'keywords');
        cs()->registerMetaTag(sprintf('%s', '法律咨询'), 'description');
        $this->render('index', $data);

    }
    //
    public function actionZcndareajson() {
        $nums = (int)$_POST['nums'];
        $pnameid = (int)$_POST['pnameid'];
        $cnameid = (int)$_POST['cnameid'];
        $fenleiid = (int)$_POST['fenleiid'];
        if(empty ($nums)) $nums=5;
        $pnameArr = AskTool::Area_GetPname();
        $cnameArr = AskTool::Area_GetCname();
        $pc_reply = paihangbangclass::get($nums, $pnameid, $cnameid, $fenleiid, $typeid, 1);
        $pc_best = paihangbangclass::get($nums, $pnameid, $cnameid, $fenleiid, $typeid, 2);
        $pc_comment = paihangbangclass::get($nums, $pnameid, $cnameid, $fenleiid, $typeid, 3);

        $data = array(
                'cnameid'=>$cnameid,
                'pnameid'=>$pnameid,
                'pnameArr'=>$pnameArr,
                'cnameArr'=>$cnameArr,
                'pc_reply'=>$pc_reply,
                'pc_best'=>$pc_best,
                'pc_comment'=>$pc_comment,
        );
        $this->renderPartial('pc_class', $data);
    }




}