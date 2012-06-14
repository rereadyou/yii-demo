<?php
class DbController extends Controller
{
	public function actionIndex(){
		
		$criteria=new CDbCriteria();
		$pages=new CPagination(4);
		$pages->pageSize=1;
		$pages->applyLimit($criteria);//给$criteria->limit offset等符值
		$posts=User::model()->findAll($criteria);
		
		$this->widget('CLinkPager',array('pages'=>$pages));
		$this->render('index');
		 
		
		
	}
	
	public function actionList(){
	
	}
}