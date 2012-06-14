<?php

class MsgController extends Controller
{
	//消息提示框
	public function actionIndex()
	{
		app()->msg->message('提示');
	}
}