<?php

class PersonModule extends CWebModule
{
	public $user;
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'person.models.*',
			'person.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			if(!app()->request->isAjaxRequest){
				$username = $_GET['name'];
				$user = OaskUser::model()->findByAttributes(array('name'=>$username,'userClassID'=>1,'IsPass'=>1));
				if(!$user) throw new CHttpException('404');
				$this->user = $user;
			}
			
			return true;
		}
		else
			return false;
	}
}
