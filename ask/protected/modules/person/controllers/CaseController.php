<?php
class CaseController extends CController{
	public function actionIndex(){
		//读出案例并分页
		$count = OaskArticle::model()->count(array('condition'=>'userid = '.$this->module->user->ID));
		$criteria=new CDbCriteria();
		$criteria->condition = 'userid = '.$this->module->user->ID;
		$criteria->order = 'id desc';
		$pages=new CPagination($count);
		$pages->pageSize=8;
		$pages->applyLimit($criteria);//给$criteria->limit offset等符值
		$posts=OaskArticle::model()->findAll($criteria);
		
		
		$this->render('index',array('articles'=>$posts,'pages'=>$pages));
	}
	
	
	public function actionAddarticle(){
		$model = new OaskArticle();
		if(isset($_POST['OaskArticle'])) {
			$model->attributes = $_POST['OaskArticle'];
			$model->sendtime = date('Y-m-d H:i:s');
			$model->userid = $this->module->user->ID;
			if($model->validate())
			{       
				
				$model->save(false);
				app()->request->redirect(url('person/case/index', array('name'=>$this->module->user->name)));
			}
			echo CHtml::errorSummary($model);
			exit;
		}
		$this->renderPartial('article',array('model'=>$model));
	}
	
	public function actionDelarticle($aid){
		$model  = OaskArticle::model()->findByPk($aid);
		$model->delete();
		app()->request->redirect(url('person/case', array('name'=>$this->module->user->name)));
	}
	
	public function actionEditarticle($aid){
		$model  = OaskArticle::model()->findByPk($aid);
		if(isset($_POST['OaskArticle'])) {
			$model->attributes = $_POST['OaskArticle'];
			$model->sendtime = date('Y-m-d H:i:s');
			$model->userid = $this->module->user->ID;
			if($model->validate())
			{       
				
				$model->save(false);
				app()->request->redirect(url('person/case', array('name'=>$this->module->user->name)));
			}
			echo CHtml::errorSummary($model);
			exit;
		}
		$this->renderPartial('article',array('model'=>$model));
	}
	
	
	public function actionShowarticle($aid){
		$model  = OaskArticle::model()->findByPk($aid);
		$this->render('casecontent',array('model'=>$model));
	}
}