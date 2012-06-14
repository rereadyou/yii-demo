<?php
class AreaController extends Controller{
	public function actionList(){
		
		if(cache()->get('ps')){
			$ps = cache()->get('ps');
			$cs = cache()->get('cs');
		}else{
			$ps = AskCityPname::model()->findAll();
			$cs = AskCityCname::model()->findAll();
			cache()->set('ps',$ps,600);
			cache()->set('cs',$cs,600);
		}
		$this->render('list',array('ps'=>$ps,'cs'=>$cs));
		
		
	}

}