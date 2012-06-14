<?php
class PublicController extends CController{
	public function actionIndex(){
		
		//读我回复的咨讯
		$count = OaskReply::model()->with('question')->count(array('limit'=>10,'condition'=>"replyer = '".$this->module->user->name."'"));
		$criteria=new CDbCriteria();
		$criteria->condition = "replyer = '".$this->module->user->name."'";
		$pages=new CPagination($count);
		$pages->pageSize=20;
		$pages->applyLimit($criteria);//给$criteria->limit offset等符值
		$mys=OaskReply::model()->with('question')->findAll($criteria);
		
		
		$this->render('index',array('mys'=>$mys,'pages'=>$pages));
	}
	
	
}