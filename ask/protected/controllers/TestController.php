<?php
class TestController extends Controller{
	
	public function actionArea(){
		
		$a = Banner::filter('a界通');
		var_dump($a);
		echo 'good';
	}
	
	public function actionSession(){
		$session = Yii::app()->session;
		$session['terry'] = 30;
		//var_dump($session['key']);
		
		Yii::app()->user->setState('tom', '40');
		//var_dump(Yii::app()->user->getState('key', 'default'));
	}
}