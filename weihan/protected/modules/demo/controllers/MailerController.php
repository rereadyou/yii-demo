<?php

class MailerController extends Controller
{
	//邮件发送
	public function actionIndex()
	{
		
		
		sendMail::sendEmail('380688162@qq.com', '测试', '只是个测试<img src="http://www.mf321.com/images/tianhong.jpg">');
		
		exit;
	}
}