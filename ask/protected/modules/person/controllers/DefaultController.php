<?php

class DefaultController extends CController
{
	public function actionIndex()
	{
		$user = $this->module->user;
		//读当前用户的证书
		$certs = AskCert::model()->findAllByAttributes(array('UserID'=>$this->module->user->ID),array('order'=>'id desc'));
		//读公开解答的咨询
		$public = OaskReply::model()->with('question')->findAll(array('limit'=>3,'condition'=>"replyer = '".$this->module->user->name."'"));
		
		//读一对一咨询
		$ones = AskOne2Message::model()->findAll(array(
											'condition'=>'SenderID = '.$this->module->user->ID.' and FatherID > 0',
											'limit'=>3,
											'order'=>'ID desc'
									));
									
		$this->render('index',array('user'=>$user,'certs'=>$certs,'public'=>$public,'ones'=>$ones));
		
	}
	
	public function actionFck()
	{
		$this->render('fck');
	}
	
	public function actionJianjie()
	{
		$this->render('jianjie');
	}
}