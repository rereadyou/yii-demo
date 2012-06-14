<?php

class ZgWtController extends CController
{
//	public $layout = 'application.modules.user.views.layouts.main';

	public function actionIndex()
	{
//		$this->render('index');
		$this->redirect(url('user/zgwt/list'));
	}
        //公众会员，我发布的委托
        public  function actionMywt()
        {       $model = ZgWt::model();
		$criteria = new CDbCriteria();
		//我接洽过的，所在地区的，传参获取类别
                $criteria->alias = 'zg_wt';
		 $criteria->addCondition(array("title <> ''",'ispass=1', 'fatherid=0', "userName='".app()->user->name."'"));
	         $criteria->select = 'wtID,title,userName,addDate';		 
		//缓存总数，60秒
                $cachename="zgwt_num_mywt_" .app()->user->id  ;
                $num=0;
		if (!$num = cache()->get('zg_wt_nums')){
			$num = $model->count($criteria);
			cache()->set('zg_wt_nums', $num, 60);
		}
		$pages = new CPagination($num);
		$pages->setPageSize(10);
		$pages->applyLimit($criteria);
		$criteria->alias = 'zg_wt';
		$criteria->order = 'zg_wt.wtid desc';
		$zgwt = $model->with('hf_num')->findAll($criteria);
//		foreach ($zgwt as $k=>$v){
//			echo $v->userName;
//			echo $v->jieqia;
//		}
//		exit;
		$this->render('mywt',array('pages'=>$pages,'wt'=>$zgwt));
                      
        }
        //律师回复过的案件委托
        public  function actionMywtyhf() 
        {
                $model = ZgWt::model();
		$criteria = new CDbCriteria();
		//我接洽过的，所在地区的，传参获取类别
		 $criteria->addCondition(array("title <> ''",'ispass=1','hf_num.hf_num>0', 'fatherid=0', "userName='".app()->user->name."'"));
	         $criteria->select = 'wtID,title,userName,addDate';
                 $criteria->with=array('hf_num'=>array('select'=>'hf_num'));
		 $criteria->order = 't.wtid desc';
                 $criteria->together=true;
		//缓存总数，60秒
                $cachename="zgwt_num_mywtyhf_" .app()->user->id  ;
		$num=0;                
		if (!$num = cache()->get($cachename)){
			$num = $model->count($criteria);
			cache()->set( $cachename, $num, 60);
		}
                else
                    {
                    $num=cache()->get($cachename);
                    }
		$pages = new CPagination($num);
		$pages->setPageSize(10);
		$pages->applyLimit($criteria);	
                if (!$num = cache()->get($cachename)){
			$num = $model->count($criteria);
			cache()->set($cachename, $num, 600);
		}
		$zgwt =$model->findAll($criteria);
 
		$this->render('mywtyhf',array('pages'=>$pages,'wt'=>$zgwt));
        }
        
	public function actionList(){
		$model = ZgWt::model();
		$criteria = new CDbCriteria();
		//我接洽过的，所在地区的，传参获取类别
		$type = $_GET['t'];
		if ($type == 'own'){
			$criteria->addCondition(array("title <> ''",'ispass=1', 'fatherid <> 0', "userName='".app()->user->name."'"));
		}elseif ($type == 'area'){
			$user = OaskUser::model()->findByAttributes(array('name'=>app()->user->name),array('select'=>'pnameid'));
			$criteria->addCondition(array('pnameID='.$user->pnameid));
		}

		$criteria->select = 'wtID,title,userName,addDate';
		!($type == 'own') && $criteria->addCondition(array("title <> ''",'fatherid=0','ispass=1'));
                   $num=0;
               $cachename="zg_wt_nums_" .app()->user->id . $type  ;
		if (!$num = cache()->get($cachename)){
			$num = $model->count($criteria);
			cache()->set($cachename, $num, 60);
		}
                 $pages = new CPagination($num);
		$pages->setPageSize(10);
		$pages->applyLimit($criteria);

		$criteria->alias = 'zg_wt';
		$criteria->order = 'zg_wt.wtid desc';
		$zgwt = $model->with('hf_num')->findAll($criteria);
//		foreach ($zgwt as $k=>$v){
//			echo $v->userName;
//			echo $v->jieqia;
//		}
//		exit;
		$this->render('listZgWt',array('pages'=>$pages,'wt'=>$zgwt));
	}

	public function actionView($wtid){
		$wtid = (int)$wtid;
		$wt = ZgWt::model()->with('user')->findByPk($wtid);
//		print_r(Yii::app()->user->id);exit;

		$this->render('viewZgWt', array('wt'=>$wt));
//		app()->msg->message('aaa');
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