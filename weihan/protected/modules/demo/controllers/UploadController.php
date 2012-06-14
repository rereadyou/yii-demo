<?php

class UploadController extends Controller
{
	//文件上传
	public function actionIndex()
	{
		$model=Users::model();
		
		// Uncomment the following line if AJAX validation is needed
// 		$this->performAjaxValidation($model);
		$this->render('index', array('model'=>$model));
	}
	
	public function actionUpload(){
		$model=Users::model();
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model->image4upload=CUploadedFile::getInstance($model,'image4upload');
// 			if($model->save())
			if(true)
			{
				//按时间生成新文件名
				$newName=date('YmdHis').'_'.rand(1,9).'.'.$model->image4upload->extensionName;
				//设定上传目录
				$path=yii::app()->basePath.'/../uploads/images/'.$newName;
				echo $path;
				//上传图片
				$model->image4upload->saveAs($path);
				//设定缩略图的存放目录+名字
				$thumb_path=app()->basePath.'/../uploads/thumb_images/'.$newName;
				echo '<br>'.$thumb_path;
				//生成缩略图
				$thumb=app()->phpThumb->create($path);
				$thumb->resize(100,100);
				$thumb->save($thumb_path);
			}
		}
		exit;
	}
}