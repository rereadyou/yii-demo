<?php
class Bcontent extends CWidget
{
		public $name;
		
		
		public function init(){
			$this->renderContent();
		}
		
		public function renderContent(){
			$bcontents = OaskQuestion::model()->findAll(array(
							'limit'=>5,
							'condition'=>"jieuser ='".$this->name."' and BContent is not null",
							'order'=>'BDatetime DESC'
						));
						
			$this->render('bcontent',array('bcontents'=>$bcontents));
		}
		public function run(){
		
		}
}