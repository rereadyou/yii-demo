<?php 
class VipeditController extends CController{
	
	public $layout = 'ajaxmain';
	public function actionIndex(){
		
		echo 'y';
	}

	
	//用于更新相册
    public function actionEditPhoto($id)
    {
        $model = new AskCert();
        
		if(isset($_POST['AskCert']))
		{ 
			$model->attributes=$_POST['AskCert'];
			$model->UserID = $this->module->user->ID;
			$file = CUploadedFile::getInstance($model,'Certpic');
			if($file){
				$filename=AskTool::makeUploadFileName($file->extensionName);
				$model->Certpic= $filename;
            	$file->saveAs($filename);
			}
			
			if($model->validate())
			{       
				
				$model->save(false);
				app()->request->redirect(url('person/default/index', array('name'=>$this->module->user->name)));
			}
			echo CHtml::errorSummary($model);
			exit;
		}
                //获取到律所信息
		 $this->render('editphoto',array('model'=>$model));
    }
	
	
	//用于更新简介
    public function actionEditJianjie($id)
    {
        $model=OaskUser::model()->findByPk($id);
        
		if(isset($_POST['OaskUser']))
		{ 
			$model->attributes=$_POST['OaskUser'];
			if($model->validate())
			{       
				
				$model->save(false);
				app()->request->redirect(url('person/default/index', array('name'=>$model->name)));
			}
			echo CHtml::errorSummary($model);
			exit;
		}
                //获取到律所信息
		 $this->render('editjianjie',array('model'=>$model));
    }
	
	
	//用于更新我的专长
    public function actionEditSpecial($id)
    {
        $model=OaskUser::model()->findByPk($id);
        
		if($_POST)
		{ 
			$model->Specaility=$_POST['speciality1'].','.$_POST['speciality2'].','.$_POST['speciality3'].','.$_POST['speciality4'];
			if($model->validate())
			{   
				$model->save(false);
				app()->request->redirect(url('person/default/index', array('name'=>$model->name)));
			}
			echo CHtml::errorSummary($model);
			exit;
		}
         $arr = explode(',',$model->Specaility);
         if(!$arr[0]) $arr[0] = 11;
         if(!$arr[1]) $arr[1] = 11;
         if(!$arr[2]) $arr[2] = 11;
         if(!$arr[3]) $arr[3] = 11;
		 $this->render('editspical',array('model'=>$model,'arr'=>$arr));
    }
	
	
	//用于更新律师头部
    public function actionEditTitle($id)
    {
        $model=OaskUser::model()->findByPk($id);
        if(!$model->viptitle) $model->viptitle = '欢迎光临'.$model->TrueName.'律师的个人工作室';
		if(isset($_POST['OaskUser']))
		{ 
			$model->attributes=$_POST['OaskUser'];
			if($model->validate())
			{       
				
				$model->save(false);
				app()->request->redirect(url('person/default/index', array('name'=>$model->name)));
			}
			echo CHtml::errorSummary($model);
			exit;
		}
                //获取到律所信息
		 $this->render('edittitle',array('model'=>$model));
    }
	
	
	
	
    //用于更新律师个人资料
    public function actionEditProfileLs($id)
    {
        $model=OaskUser::model()->findByPk($id);
		if(isset($_POST['OaskUser']))
		{ 
			$model->attributes=$_POST['OaskUser'];
			if($model->validate())
			{       
				$model->pnameid=$_POST['pnameid'];
                $model->cnameid=$_POST['cnameid'];
                $model->xnameid=$_POST['xnameid'];
                
                app()->user->setFlash('success','更新成功');
				$model->save(false);
				app()->request->redirect(url('person/default/index', array('name'=>$model->name)));
			}
			echo CHtml::errorSummary($model);
			exit;
		}
                //获取到律所信息
          $workname='';
          if($model->WorkID>0)
           {
             $lvsuo=AskWork::model()->findByPk($model->WorkID,array('select'=>'WorkName'));
             $workname=$lvsuo->WorkName;
           }
		   $this->render('editprofilels',array('model'=>$model,'workname'=>$workname));
    }

     //获取省份城市
     public function actionArea(){
		//ajax根据省获得市
		if($_GET['pnameid']){
			if(cache()->get('area_citys_'.$_GET['pnameid'])){
				$citys = unserialize(cache()->get('area_citys_'.$_GET['pnameid']));
			}else{
				$p = AskCityPname::model()->findByPk($_GET['pnameid']);
				foreach((array)$p->citys as $k=>$v){
					$tmp = array(
		            	'id' => $v->cnameID,
		                'name' => $v->cname,
		            );
		            $citys[] = $tmp;
				}
				cache()->set('area_citys_'.$_GET['pnameid'],serialize($citys),3600);
			}
			echo CHtml::dropDownList('cnameid', 0, array(0=>'请选择') + CHtml::listData((array)$citys, 'id', 'name'),array('class'=>'ft12 selwidth'));
			$this->renderPartial('blank');
			app()->end();
		}

		//ajax根据市获得区
		if($_GET['cnameid']){
			if(cache()->get('area_xname_'.$_GET['cnameid'])){
				$areas = unserialize(cache()->get('area_xname_'.$_GET['cnameid']));

			}else{
				$city = AskCityCname::model()->findByPk($_GET['cnameid']);
				$xs = $city->xians;
				foreach((array)$xs as $k=>$x){
					$tmp = array(
		            	'id' => $x->xnameid,
		                'name' => $x->xname,
		            );
		            $areas[] = $tmp;
				}
				cache()->set('area_xname_'.$_GET['cnameid'],serialize($areas),3600);
			}

			echo CHtml::dropDownList('xnameid', 0, array(0=>'请选择')+ (array)CHtml::listData((array)$areas, 'id', 'name'),array('class'=>'ft12 selwidth'));
			$this->renderPartial('blank');
			app()->end();
		}


	}
	
}
?>