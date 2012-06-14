<?php
class WtController extends CController{
	public function actionIndex(){
		//读出所有省
		$ps = AskCityPname::model()->findAll();
		
		if($_GET['pnameid']){
			$count = ZgWt::model()->count(array('condition'=>'fatherid = 0 and pnameID = '.$_GET['pnameid']));
		}else{
			$count = ZgWt::model()->count(array('condition'=>'fatherid = 0'));
		}
		
		
		$criteria=new CDbCriteria();
		
		if($_GET['pnameid']){
			$criteria->condition = 'fatherid = 0 and pnameID = '.$_GET['pnameid'];
		}else{
			$criteria->condition = 'fatherid = 0';
		}
		
		$criteria->order = 'wtID DESC';
		
		$pages=new CPagination($count);
		$pages->pageSize=20;
		$pages->applyLimit($criteria);//给$criteria->limit offset等符值
		$wts=ZgWt::model()->findAll($criteria);
	  
		
		$this->render('index',array('ps'=>$ps,'wts'=>$wts,'pages'=>$pages));
	}
}