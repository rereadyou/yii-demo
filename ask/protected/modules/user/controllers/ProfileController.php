<?php
class ProfileController extends CController {
    public function actions() {
        
    }
    //律师上传照片
    public function actionUppic()
    {    $users=OaskUser::model()->findByPk(app()->user->id,array('select'=>'userpic'));
         $this->render('uppic',array('user'=>$users));
    }
    //上传图片后的通知页
    public function actionNoticepic($picurl)
    {
        if(!empty($picurl))
            {//如果图片不为ongoing
             //更新个人照片
            $nums=OaskUser::model()->updateByPk(app()->user->id,array('userpic'=>$picurl));
            $this->Render('noticepic',array('nums'=>$nums,'picurl'=>$picurl));//RenderPartial
            }

    }
    //修改密码登录窗体
    public function actionEditPsw()
    {
        $this->render('editpsw');
    }
    //修改密码保存程序
    public function actionSavePsw()
    {       //判断用户是否登录
            $this->render('editpsw');
            $oldpsw=$_POST['oldpwd'];//老密码
            $newpsw=$_POST['newpwd'];//新密码
            $newpsw2=$_POST['newpwd1'];//新密码
            if (empty ($oldpsw))
                {
               app()->msg->message('老密码不能为空');
                return null;
                }
               if (empty ($newpsw))
                   {
                  app()->msg->message('新密码不能为空');
                   return null;
                   }

                 if($newpsw!=$newpsw2)
                     {
                     app()->msg->message('两次输入的密码不一致');
                     return null;
                     }
                    if(strlen($newpsw2)<4)
                      {
                     app()->msg->message('密码必须在4位以上');
                      return null;
                     }
                    //检验老密码输入是否正确
                 $users=OaskUser::model()->find(array('condition'=>' ID='.app()->user->id));
               
                  if ($users->pwd!=AskTool::MD5($oldpsw))
                      {
                     app()->msg->message('您输入的原密码不正确，请重新输入');
                      return null;
                      }
                      else
                          {
                           //如果两次输入的密码一致
                          $users->pwd=AskTool::MD5($newpsw);
                          $users->save(FALSE);
                          //保存密码
                          //同步修改blog密码等信息
                          //暂时省略
                          //
                          //AskTool::GoUrl('恭喜，密码已经修改成功',url('user/profile/editpsw',array()));
                          app()->msg->message('密码修改成功！',url('user/profile/editpsw',array()));
                          return null;
                          }

             
    }
    //修改公众个人资料
    public function  actionEditProfile()
    {      
		$model=OaskUser::model()->findByPk(app()->user->id);
		if(isset($_POST['OaskUser']))
		{ $model->attributes=$_POST['OaskUser'];
			if($model->validate())
			{       $model->pnameid=$_POST['pnameid'];
                                $model->cnameid=$_POST['cnameid'];
                                $model->xnameid=$_POST['xnameid'];
                                $model->Specaility=$_POST['lsspec'];
                              
                                app()->user->setFlash('success','更新成功');
				$model->save(false);

			}
		}
		$this->render('editprofile',array('model'=>$model));
    }
     
    //用于更新律师个人资料
    public function actionEditProfileLs()
    {
               $model=OaskUser::model()->findByPk(app()->user->id);
		if(isset($_POST['OaskUser']))
		{ $model->attributes=$_POST['OaskUser'];
			if($model->validate())
			{       $model->pnameid=$_POST['pnameid'];
                                $model->cnameid=$_POST['cnameid'];
                                $model->xnameid=$_POST['xnameid'];
                                $model->Specaility=$_POST['lsspec'];
                                
                                 app()->user->setFlash('success','更新成功');
				$model->save(false);
				//app()->request->redirect(url('user/profile/editprofilels', array('name'=>'terry')));
			}
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
}

?>
