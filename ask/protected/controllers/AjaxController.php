<?php
class AjaxController extends Controller {
	public function filters(){
		return array(
			'accessControl'
		);
	}
	public function accessRules(){
		return array(
			array('allow',
				'actions' => array('loadFck', 'submit', 'getContent'),
				'users' => array('@'),
			),
			array('deny',
				'actions' => array('loadFck', 'submit', 'getContent'),
				'users' => array('*'),
			)
		);
	}
	
	public function actionIndex(){
		
	}
	//加载FCKEditor，需要传递两个参数,表模型名称，字段名称
	public function actionLoadFck(){
		//获取表模型
		$modelName = $_POST['model'];
		empty($modelName) && $modelName = $_GET['model'];
						
		switch ($modelName){
			case 'OaskUser':
				$user = OaskUser::model();
				//去掉干扰
				unset($_GET['r']);
				unset($_GET['model']);
				//虽然是使用的foreach，但是实际上，只有一个参数
				$attr = null;
				//获取通过get传递的值
				foreach ($_GET as $k=>$v){
					$attr = $k;
					$user->$k = $v;
				}
		
				$this->renderPartial('fck', array('model'=>$user, 'attr'=>$attr));
				break;
			
		}
		
	}
	//更新用户的修改信息到数据库中
	public function actionSubmit(){
//		print_r($_POST);exit;
		$modelName = array_keys($_POST);
		$modelName = $modelName[0];
		switch ($modelName){
			case 'OaskUser':
				$model = OaskUser::model();
				
				$model->ID = app()->user->id;
				//虽然是使用的foreach，但是实际上，只有一个参数
				$attr = null;
				//获取通过get传递的值
				foreach ($_POST[$modelName] as $k=>$v){
					$attr = $k;
					$model->$k = $v;
				}
			
				(!$model->save()) && $msg = "window.parent.alert('修改失败！可能您的输入不合法')";
				break;
		}
		//去掉编辑框，显示内容
		($attr == 'pnameid' || $attr == 'cnameid') && $attr = 'PCnameid';//选择省市的下拉框，这个比较特殊，前台使用的是PCnameid
		
		echo "<script type='text/javascript'>$msg;window.parent.showContent('{$attr}co');</script>";
		
	}
//	上传图片,并更新用户的修改信息到数据库中
	public function actionUpload(){
//		print_r($_POST);exit;
		$modelName = array_keys($_POST);
		$modelName = $modelName[0];
		
		switch ($modelName){
			case 'OaskUser':
				$model = OaskUser::model();
				$model->attributes = $_POST[$modelName];
				$model->ID = app()->user->id;
				//虽然是使用的foreach，但是实际上，只有一个参数
				$attr = null;
				//获取通过get传递的值
				foreach ($_POST[$modelName] as $k=>$v){
					$attr = $k;
					$model->$k = $v;
				}
				//初始化上传文件
				$model->image4upload = CUploadedFile::getInstance($model, 'image4upload');
				if (!(is_object($model->image4upload ) && get_class($model->image4upload) === 'CUploadedFile')){
					echo "<script type='text/javascript'>alert('您没有选择要上传的文件！');</script>";
					exit; 
				}
				//错误提示
				$error = $model->image4upload->getError();
				$msg = '';
				switch ($error){
					case UPLOAD_ERR_INI_SIZE:
						$msg = '上传的文件太大，超过php系统设定！';
						break;
					case UPLOAD_ERR_FORM_SIZE:
						$msg = '上传的文件太大，超过form设定！';
						break;
					case UPLOAD_ERR_PARTIAL:
						$msg = '文件只上传了一部分！';
						break;
					case UPLOAD_ERR_NO_FILE:
						$msg = '没有上传文件！';
						break;
					case UPLOAD_ERR_EXTENSION:
						$msg = '不允许上传的文件类别！';
						break;
				}
				if(!empty($msg)){
					echo "<script type='text/javascript'>alert('$msg');</script>";
					exit; 
				}
				
				//创建存放文件夹
				$newName = 'images/upload/' . date('Y-m',time());
				AskTool::createFolder($newName);
				//获取文件后缀，设置新的文件名
				$sufix = split('\.', $model->image4upload->getName());
				$newName = $newName .'/'. time(). rand(1000,9999) .'.'.$sufix[count($sufix) -1];
				//保存上传的文件，到本地
				$result = $model->image4upload->saveAs(Yii::app()->getBasePath(). '/../' . $newName);
				//存放路径到数据库中，
				($result) && $model->$attr = $newName;

				if(!$model->save())  $msg = "window.parent.alert('文件上传失败，请确定您的文件，符合要求')";
				
				break;
		}
		//去掉编辑框，显示内容
		($attr == 'pnameid' || $attr == 'cnameid') && $attr = 'PCnameid';//选择省市的下拉框，这个比较特殊，前台使用的是PCnameid
		
		echo "<script type='text/javascript'>$msg;window.parent.showContent('{$attr}co');</script>";
		
	}
	
	//提交修改后，重新获取用户资料
	public function actionGetContent(){
		$modelName = $_POST['model'];
		$attr = $_POST['attr'];
		$criteria = new CDbCriteria();
		$criteria->select = "$attr";
		
		switch ($modelName){
			case 'OaskUser':
				$model = OaskUser::model();
				$result = $model->findByPk(app()->user->id, $criteria);
				$return = $result[$attr];
				break;
			
		}
		//判断是否是图片的字段，如果是，加上img标签
		(stripos($attr, 'pic') > -1) && $return = "<img src='$return' />";
		echo $return;
	}
	
	//加载textEditor，需要传递两个参数,表模型名称，字段名称
	public function actionLoadText(){
		//获取表模型
		$modelName = $_POST['model'];
		empty($modelName) && $modelName = $_GET['model'];
						
		switch ($modelName){
			case 'OaskUser':
				$user = OaskUser::model();
				//去掉干扰
				unset($_GET['r']);
				unset($_GET['model']);
				//虽然是使用的foreach，但是实际上，只有一个参数
				$attr = null;
				//获取通过get传递的值
				foreach ($_GET as $k=>$v){
					$attr = $k;
					$user->$k = $v;
				}
		
				$this->renderPartial('textEditor', array('model'=>$user, 'modelName'=>$modelName, 'attr'=>$attr));
				break;
			
		}
		
	}
	
	//加载selectEditor，需要传递两个参数,表模型名称，字段名称
	public function actionLoadSelect(){
		//获取表模型
		$modelName = $_POST['model'];
		empty($modelName) && $modelName = $_GET['model'];
						
		switch ($modelName){
			case 'OaskUser':
				$user = OaskUser::model();
				//去掉干扰
				unset($_GET['r']);
				unset($_GET['model']);
				
				//获取通过get传递的值,一般只有一个值
				foreach ($_GET as $k=>$v){
					$attr = $k;
				}
				//省市
				if ($attr == 'PCnameid'){
					$user = $user->findByPk(app()->user->id, array('select'=>array('pnameid, cnameid')));
				}
				$this->renderPartial('selectEditor', array('model'=>$user, 'modelName'=>$modelName, 'attr'=>$attr));
				break;
			
		}
		
	}
	//area组件附加
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
	
	//加载picEditor，需要传递两个参数,表模型名称，字段名称
	public function actionLoadPic(){
		//获取表模型
		$modelName = $_POST['model'];
		empty($modelName) && $modelName = $_GET['model'];
						
		switch ($modelName){
			case 'OaskUser':
				$user = OaskUser::model();
				//去掉干扰
				unset($_GET['r']);
				unset($_GET['model']);
				//虽然是使用的foreach，但是实际上，只有一个参数
				$attr = null;
				//获取通过get传递的值
				foreach ($_GET as $k=>$v){
					$attr = $k;
					$user->$k = $v;
				}
		
				$this->renderPartial('picEditor', array('model'=>$user, 'modelName'=>$modelName, 'attr'=>$attr));
				break;
			
		}
		
	}
}
?>