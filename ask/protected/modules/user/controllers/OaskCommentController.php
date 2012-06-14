<?php

class OaskCommentController extends CController
{
	public function actionIndex()
	{
		$this->redirect(url('user/oaskComment/list'));
	}	
	public function actionList(){
		$model = OaskComment::model();		
		$critiera = new CDbCriteria();
                $critiera->with=array('question'=>array('select'=>'qid,title'));
                $critiera->condition="username='" . app()->user->name . "'";
                $critiera->together=true;
		$critiera->order = 'comid desc';
		//缓存条数
		$cache_name = 'oask_comment_num_'.app()->user->id;
		if (!$num = cache()->get($cache_name )){
			$num = $model->with('question')->count($critiera);
			cache()->set($cache_name, $num);
		}
		//获取分页
		$page = new CPagination($num);
		$page->setPageSize(8);
		$page->applyLimit($critiera);
		//获取内容		
		$oaskComment = $model->with('question')->findAll($critiera);
                //print_r($oaskComment);
               // echo $critiera->sql;
		$this->render('list', array('pages'=>$page, 'questions'=>$oaskComment));
	}
	
	public function actionView($comid){
		$comid = (int)$comid;
		
		$oaskComment = OaskComment::model()->findByPk($comid);
		
		$this->render('view', array('oaskComment'=>$oaskComment));
	}
	
	public function filters(){
		return array(
			'accessControl'
		);
	}
	public function accessRules()
	{
		return array(
			array('allow',
				'users' => array('@'),
			),
			array('deny',
				'users' => array('*'),
			)
		);
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}