<?php
class InactController extends CController{
	public function actionIndex(){
		$cnameid = $this->module->user->cnameid;
		$cnameid = $cnameid ? $cnameid : 86;
		$nums = 7;
        //按回复咨询数量排行
        $city_reply = paihangbangclass::Area_replynum_city($cnameid, $nums, 0, 0);
        //按回复被采纳数量排行
        $city_best = paihangbangclass::Area_replynum_best_city($cnameid, $nums, 0, 0);
        //按回复获好评数量排行
        $city_comment = paihangbangclass::Area_usercomment_city($cnameid, $nums, 0, 0);
        //获取到公告
        $critGG = new CDbCriteria();
        $critGG->select="ID,title"; //只取需要的字段
        $critGG->condition="ispic=0";
        $critGG->order="ID desc"; //按最新的进行排序
        $critGG->limit=11;
        $cache_gonggao="index_gg_person_" . $critGG->limit;
          if(!$gonggao=cache()->get($cache_gonggao)) {
            $gonggao=OaskGonggao::model()->findAll($critGG);
            cache()->set($cache_gonggao,$gonggao,3600*4);//缓存4小时
        }
        $cnameArr = AskTool::Area_GetCname();
		$this->render('index',array('city_reply'=>$city_reply,'city_best'=>$city_best,'city_comment'=>$city_comment,'cnameArr'=>$cnameArr,'gonggao'=>$gonggao));
	}
}