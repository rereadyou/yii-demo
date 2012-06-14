<?php
class lvsuoController extends CController {
 public function actionIndex()
    {
     echo "ndw test it";
    }
//律所选择框，用于选择律所时候搜索使用

    public function actionSelect() {
        $strwhere="";
        $pnameid=0;$cnameid=0;$workname='';
        if(isset($_GET['pnameid']))  $pnameid=$_GET['pnameid'];
        if(isset($_GET['cnameid']))  $cnameid=$_GET['cnameid'];
        if(isset($_GET['workname'])) $workname=$_GET['workname'];
        if(!empty ($pnameid) && $pnameid>0 ) $strwhere.=" pnameid=$pnameid and ";
        if(!empty($cnameid) && $cnameid>0) $strwhere.=" cnameid=$cnameid and ";
        if(!empty($workname)) $strwhere.=" WorkName like '%" . $workname."%' and ";
        //如果用户什么也没选择，默认情况下，调用本市的律所
        if( (empty($pnameid) && empty($cnameid) &&   empty($workname)) && isset ($_COOKIE['cnameid'])) {
            $strwhere.=' cnameid=' . $_COOKIE['cnameid'];
        }
        else {
            $strwhere.=" 1=1 ";
        }     
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
        $criteria->select="t.id,t.WorkName"; //只取需要的字段
        $criteria->condition=$strwhere;
        $criteria->order="t.id desc"; //按最新的进行排序
        $cachename="work_select";
        if(cache()->get($cachename)) {
            $num = cache()->get($cachename);
        }else {
            $num = AskWork::model()->count($criteria);
            cache()->set($cachename,$num,600);
        }        
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=AskWork::model()->findAll($criteria);  
        $this->render('select',array('pages'=>$pages,'questions'=>$questions));
    }
    //搜索
     public function actionSearch() {
         //跳转到
         $pnameid=0;$cnameid=0;$workname='';
        if(isset($_POST['pnameid']))  $pnameid=$_POST['pnameid'];
        if(isset($_POST['cnameid']))  $cnameid=$_POST['cnameid'];
        if(isset($_POST['workname'])) $workname=$_POST['workname'];
       $this->redirect(url('user/lvsuo/select',array('pnameid'=>$pnameid,'cnameid'=>$cnameid,'workname'=>$workname)));
     }
     //选择一个律所
     public function actionSelectOne()
     {
         if(isset($_POST['workid']))
         {
         $workids=$_POST['workid'];
         $arraywork=explode(',',$workids);
         $workid=$arraywork[0];
         $workname=$arraywork[1];
         $this->render('selectone',array('workid'=>$workid,'workname'=>$workname));
         }
         else
             { $this->render('selectone',array('workid'=>$workid,'workname'=>$workname));
              AskTool::GoToback("对不起，您没有选择任何律所");
             }
     }
     //添加律所
     public  function actionLvSuoadd()
     {        $model=new AskWork();
	      if(isset($_POST['AskWork']))
	      { $model->attributes=$_POST['AskWork'];
			if($model->validate())
			{      app()->user->setFlash('success','更新成功');
                                $model->pnameid=$_POST['pnameid'];
                                $model->cnameid=$_POST['cnameid'];
			       $model->save(false);
			}
		}
                 $this->render('lvsuoadd',array('model'=>$model));
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