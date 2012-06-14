<?php
class HomepageController extends Controller {
	//在线编辑效果测试
	public function actionTest(){
		$username = $_GET['username'];
		$model = OaskUser::model();
		$user = $model->findByAttributes(array('name'=>$username));
		
		$this->render('test', array('user'=>$user));
	}
	//律师个人网站，首页
	public function actionIndex(){
		$username = $_GET['username'];
		$userModel = OaskUser::model();
		//用户资料
		$user = $userModel->findByAttributes(array('name'=>$username));
		//获取评价
		
		//获取公开解答的问题
		$questions = OaskQuestion::model()->findByAttributes(array('sender'=>$username));
		
		
		$this->render('index', array('user'=>$user));
	}
}
?>