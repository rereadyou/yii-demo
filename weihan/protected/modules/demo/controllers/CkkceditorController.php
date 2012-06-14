<?php

class CkkceditorController extends Controller
{
	//编辑器
	public function actionIndex()
	{
		$model = Users::model();
		if (app()->request->isPostRequest){
// 			$model->attributes = $_POST['Users'];
			var_dump($_POST['Users']['descripcion']);
		}
		
		$this->render('index', array('model'=>$model));
	}
}