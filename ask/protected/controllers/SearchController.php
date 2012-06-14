<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
class SearchController extends Controller {
    public function actionSearch($key) {
        //$key=mb_convert_encoding($key,"utf-8","gbk");
        //$sql="select ID,title,content,sender,sendtime,fenleiid,topic,jieuser from oask_question where contains(title,'离婚') order by id desc";
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,content,sender,sendtime,fenleiid,topic,jieuser,jie';
        $criteria->condition="contains(title,'". $key ."') ";
        //echo $criteria->condition;
        $criteria->order = 'jie desc,ID DESC';
        //总记录数放到缓存中600秒
        $cachename='search_count_all_' . urlencode($key) .urlencode($key);
        if(cache()->get($cachename)) {
            $num = cache()->get($cachename);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename,$num,600);
        }
        $pages=new CPagination($num);
         $pages->pageSize=8;;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="searchlist_all_" .$pages->currentpage .urlencode($key);
        if(cache()->get($cachename_list)  ) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),3600*8);//8小时
        }
        $pos =$this->getCustomerPosition(AskTool::getClientIp());
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();
        $this->pageTitle =$key . '免费法律咨询，就上中顾法律网-中顾法律网万名律师为您提供专业的律师在线咨询服务';
        cs()->registerMetaTag('免费法律咨询，就上中顾法律网-中顾法律网(中国第一法律门户)近万名专业律师给您提供权威、及时的免费法律在线咨询和律师在线咨询服务,提供婚姻家庭刑事辩护等领域及北京上海山东广东等地区咨询,是最专业的法律咨询网站。', 'keywords');
        cs()->registerMetaTag('免费法律咨询,法律在线咨询,律师在线咨询', 'description');
        $this->render('index',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers
                ,'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>1,'key'=>$key
        ));
    }

    public function actionSearchnosolated($key) {
       // $key=mb_convert_encoding($key,"utf-8","gbk");
        //$sql="select ID,title,content,sender,sendtime,fenleiid,topic,jieuser from oask_question where contains(title,'离婚') order by id desc";
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,content,sender,sendtime,fenleiid,topic,jieuser,jie';
        $criteria->condition="contains(title,'". $key ."') and jie=0";
        $criteria->order = 'jie desc,ID DESC';
        //总记录数放到缓存中600秒
        $cachename='search_count_nos_' . urlencode($key) .urlencode($key);
        if(cache()->get($cachename)) {
            $num = cache()->get($cachename);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename,$num,600);
        }
        $pages=new CPagination($num);
         $pages->pageSize=8;;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="searchlist_nos_" .$pages->currentpage.urlencode($key);
        if(cache()->get($cachename_list)  ) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),3600*8);//8小时
        }
        $pos =$this->getCustomerPosition(AskTool::getClientIp());
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();
        $this->pageTitle =$key . '免费法律咨询，就上中顾法律网-中顾法律网万名律师为您提供专业的律师在线咨询服务';
        cs()->registerMetaTag('免费法律咨询，就上中顾法律网-中顾法律网(中国第一法律门户)近万名专业律师给您提供权威、及时的免费法律在线咨询和律师在线咨询服务,提供婚姻家庭刑事辩护等领域及北京上海山东广东等地区咨询,是最专业的法律咨询网站。', 'keywords');
        cs()->registerMetaTag('免费法律咨询,法律在线咨询,律师在线咨询', 'description');
        $this->render('index',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers
                ,'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>2,'key'=>$key
        ));
    }
  public function actionSearchsolated($key) {
        //$key=mb_convert_encoding($key,"utf-8","gbk");
        //$sql="select ID,title,content,sender,sendtime,fenleiid,topic,jieuser from oask_question where contains(title,'离婚') order by id desc";
        $criteria = new CDbCriteria();
        $criteria->select='ID,title,content,sender,sendtime,fenleiid,topic,jieuser,jie';
        $criteria->condition="contains(title,'". $key ."') and jie=1";
        $criteria->order = 'jie desc,ID DESC';
        //总记录数放到缓存中600秒
        $cachename='search_count_ok_' . urlencode($key) .urlencode($key);
        if(cache()->get($cachename)) {
            $num = cache()->get($cachename);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename,$num,600);
        }
        $pages=new CPagination($num);
         $pages->pageSize=8;;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $cachename_list="searchlist_ok_" .$pages->currentpage.urlencode($key);
        if(cache()->get($cachename_list)  ) {
            $questions=unserialize(cache()->get($cachename_list));
        }
        else {
            $questions=OaskQuestion::model()->findAll($criteria);
            cache()->set($cachename_list,serialize($questions),3600*8);//8小时
        }
        $pos =$this->getCustomerPosition(AskTool::getClientIp());
        $weekScoreLawyers = AskTool::getWeekScoreLawyers(6,$pos['areaid'],$pos['isCity']);
        $monthScoreLawyers = AskTool::getMonthScoreLawyers(6, $pos['areaid'], $pos['isCity']);
        $oaskclass=AskTool::OaskClass_GetClass();
        $citys=AskTool::Area_GetCname();
        $this->pageTitle =$key . '-免费法律咨询，就上中顾法律网-中顾法律网万名律师为您提供专业的律师在线咨询服务';
        cs()->registerMetaTag('免费法律咨询，就上中顾法律网-中顾法律网(中国第一法律门户)近万名专业律师给您提供权威、及时的免费法律在线咨询和律师在线咨询服务,提供婚姻家庭刑事辩护等领域及北京上海山东广东等地区咨询,是最专业的法律咨询网站。', 'keywords');
        cs()->registerMetaTag('免费法律咨询,法律在线咨询,律师在线咨询', 'description');
        $this->render('index',array('pages'=>$pages,'questions'=>$questions,'pos'=>$pos,
                'weekScoreLawyers'=>$weekScoreLawyers,'monthScoreLawyers'=>$monthScoreLawyers
                ,'oaskclass'=>$oaskclass,'citys'=>$citys,'menu'=>3,'key'=>$key
        ));
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
    //获取最后解答者
    //param qids 咨询id列表，比如 111,3333
    public function actionGetjsonuser($qids) {
        $cachename='qlist'.$qids;
        $lsarry=array();//声明数组
        if(!$lsarry=cache()->get($cachename)) {
            if(empty($qids)) exit();
            $replys=OaskReply::model()->with(array('user'=>array('select'=>'ID,name,TrueName,IsStar,userClassID')))->findall(array('condition'=>"qid in ($qids)",'select'=>'T.id as rid,qid','order'=>'t.id desc','limit'=>100));

            $temp=array();//临时数组，用于解决判断数组是否重复的问题
            foreach($replys as $k=>$v) {
                if (!in_array($v->qid, $temp)) {
                    //如果不重复，那么就进行添加
                    $lsarry[$i]['qid']=$v->qid;
                    $lsarry[$i]['name']=$v->user->name;
                    if ($v->user->userClassID) {
                        $lsarry[$i]['truename']=$v->user->TrueName . '律师';
                        $lsarry[$i]['askme']=AskTool::GetLawyeraskurl($v->user->ID, $v->user->name, $v->user->IsStar);
                        $lsarry[$i]['url']=AskTool::GetLawyeraskurl($v->user->ID, $v->user->name, $v->user->IsStar);
                    }
                    else {
                        $lsarry[$i]['truename']='公众回复';
                        $lsarry[$i]['askme']='';
                        $lsarry[$i]['url']='';
                    }
                    $i++;
                }
                else {


                }
                $temp[$v->qid]=$v->qid;
            }
            cache()->set($cachename,$lsarry,3600*8);//缓存8小时
        }
        echo json_encode($lsarry);
        exit();
    }

}
?>
