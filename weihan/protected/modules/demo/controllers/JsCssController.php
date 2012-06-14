<?php

class JsCssController extends Controller
{
	//合并压缩css，js，需要在main.php中配置
	public function actionIndex()
	{
		$this->render('index');
	}
}