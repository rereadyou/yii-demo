<?php

class DefaultController extends CController
{
	public $layout = '1';
	public function actionIndex()
	{
		$this->render('index');
	}
}