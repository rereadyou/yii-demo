<?php
class OneController extends CController
{
	public function actionIndex(){
		//
		$model = new AskOne2Message();
		if($_POST['title']) $model->Title = $_POST['title'];
		if($_POST['content']) $model->Content = $_POST['content'];
		
		//读类别
		if(cache()->get('parents')){
			$parents = unserialize(cache()->get('parents'));
			$son = unserialize(cache()->get('son'));
		}else{
			$fathers = OaskClass::model()->findAll(array('condition'=>'fatherID = 1'));
			foreach($fathers as $k=>$v){
				$parents[$k]['topic'] = $v->topic;
				$parents[$k]['ID'] = $v->ID;
				//读出第一个分类下的小分类
				if($k == 0){
					$sons = $v->son;
					foreach ($sons as $kk=>$vv){
						$son[$kk]['topic'] = $vv->topic;
						$son[$kk]['ID'] = $vv->ID;
					}
				}
			}
			cache()->set('parents',serialize($parents),3600);
			cache()->set('son',serialize($son),3600);
		}
		
		
		//读公开解答的咨询
		$public = OaskReply::model()->with('question')->findAll(array('limit'=>3,'condition'=>"replyer = '".$this->module->user->name."'"));
		
		//读一对一咨询
		$ones = AskOne2Message::model()->findAll(array(
											'condition'=>'SenderID = '.$this->module->user->ID.' and FatherID > 0',
											'limit'=>3,
											'order'=>'ID desc'
									));
		
		$this->render('index',array('model'=>$model,'parents'=>$parents,'son'=>$son,'public'=>$public,'ones'=>$ones));
	}
	
	/**
	 * 发布一对一
	 * Enter description here ...
	 */
	public function actionInsert(){
		$model = new AskOne2Message();
		$model->attributes = $_POST['AskOne2Message'];
		
		$model->AddresseeID = $this->module->user->ID;
		$model->pnameid = $_POST['pnameid'];
		$model->cnameid = $_POST['cnameid'];
		$model->AddDate = date('Y-m-d H:i:s',time());
		
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		if(app()->user->isguest) {
              //生成随机用户，并返回数组
             $user = AskTool::makeRandUser($model->pnameid, $model->cnameid, $email, $phone);
              //用户登陆
              $modeluser=new LoginForm();
              $modeluser->username = $user['name'];
              $modeluser->password = $user['pwd'];
              $modeluser->rememberMe = TRUE;
              $modeluser->validate();
              $modeluser->login();
         }
		$model->SenderID = app()->user->ID;
		
		if($model->validate())
		{
			
			$model->save();
			 //发邮件		added by weihan
			//sendMail::send('您的法律问题已经成功发布，请查收', app()->user->id, $model->ID, $model->Title, 14);
			app()->request->redirect(url('person/one/index',array('name'=>$this->module->user->name,'success'=>1)));
			
			
		}else{
			echo CHtml::errorSummary($model);
		}		
	}
	
	
	//category组件附加
	public function actionCategory($id){
		$v = OaskClass::model()->findByPk((int)$id);
		$sons = $v->son;
		foreach ($sons as $k=>$v){
			$son[$k]['topic'] = $v->topic;
			$son[$k]['ID'] = $v->ID;
		}
		foreach($son as $kk=>$vv){
			echo "<option value='{$vv[ID]}'>{$vv['topic']}</option>";			
		}
		$this->renderPartial('blank');
		app()->end();	
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
}