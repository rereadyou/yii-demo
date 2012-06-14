<?php
class QuestionsController extends CController {
    public function actions() {
        return array(
                // captcha action renders the CAPTCHA image displayed on the contact page
                'captcha'=>array(
                        'class'=>'CCaptchaAction',
                        'backColor'=>0xFFFFFF,
                        'width' => 70,
                        'maxLength' => 4,
                        'minLength' => 4,
                        'foreColor' => 0xFF0000,
                        'padding' => 3,
                ),
        );
    }
    public function actionIndex() {      
     //CPagination代表分页信息,有多少页，每页几条记录等
        //CLinkPager生成分页的代码,自定义css可以给属性cssFile一个值       
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
         $criteria->select="t.ID,t.title,replys,sender,sendtime"; //只取需要的字段
         $criteria->condition="sender='" .app()->user->name . "' "; //构建我发布过的咨询

        $cachename="questionnum_user_myquestion".app()->user->id;
        if(cache()->get($cachename)) {
            $num = cache()->get($cachename);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename,$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=OaskQuestion::model()->findAll($criteria);
        $this->render('index',array('pages'=>$pages,'questions'=>$questions));
    }
    //我发布的问题
   public function actionMyAsk()
    {   $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
         $criteria->select="t.ID,t.title,replys,sender,sendtime"; //只取需要的字段
         $criteria->condition="t.sender='" .app()->user->name . "' "; //构建我发布过的咨询
        $criteria->order="t.id desc"; //按最新的进行排序
        //$criteria->together=true;
        $cachename="questionnum_user_myquestion_myask_".app()->user->name;
        if(cache()->get($cachename)) {
           $num = cache()->get($cachename);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename,$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=OaskQuestion::model()->findAll($criteria);
        $this->render('myask',array('pages'=>$pages,'questions'=>$questions));

    }
 //我回复的咨询
  public function actionMyAnswer()
    {
      //CPagination代表分页信息,有多少页，每页几条记录等
        //CLinkPager生成分页的代码,自定义css可以给属性cssFile一个值
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
         $criteria->select="t.ID,t.title,replys,sender,sendtime"; //只取需要的字段
         $criteria->condition="reply.replyer='" .app()->user->name . "' "; //构建我发布过的咨询
         $criteria->order="reply.replytime desc"; //按最新的进行排序
         /*$criteria->with=array('replys'
                              =>array('select'=> 'id,replytime','joinType'=>'inner join') //联合查询，回复发布者是谁
            );
          * 
          */
        $criteria->with=array('reply'
                              =>array('select'=> 'id,replytime','joinType'=>'inner join') //联合查询，回复发布者是谁
            );
        $criteria->together=true;
        $cachename="questionnum_user_myquestion_answer_".app()->user->name;
        if(cache()->get($cachename)) {
           $num = cache()->get($cachename);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename,$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=OaskQuestion::model()->findAll($criteria);
      
        $this->render('myanswer',array('pages'=>$pages,'questions'=>$questions));

    }
  //
  //  专长咨询

  public function actionZczx($classid=11)
    {
      //CPagination代表分页信息,有多少页，每页几条记录等
        //CLinkPager生成分页的代码,自定义css可以给属性cssFile一个值
       //需要获取到律师专长
        $users=OaskUser::model()->findByPk(app()->user->id); //读专长
        $spec="11,24";
        if(!empty($users->Specaility)) $spec=$users->Specaility;
        //判断格式是否正确
        if(substr($spec, strlen($spec)-1)==",") $spec.="11";
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
         $criteria->select="t.ID,t.title,replys,sender,sendtime"; //只取需要的字段
         $criteria->condition="fenleiid in (" .$spec. ") "; //构建我发布过的咨询
         //$criteria->order="t.id desc"; //按最新的进行排序
        /*
         $criteria->with=array('replys'
                              =>array('select'=> 'id,replytime','joinType'=>'inner join') //联合查询，回复发布者是谁
            );
         * 
         */
        $criteria->together=true;
        $cachename="questionnum_user_myquestion_class_".app()->user->name;
        if(cache()->get($cachename)) {
           $num = cache()->get($cachename);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename,$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=OaskQuestion::model()->findAll($criteria);
        $this->render('zczx',array('pages'=>$pages,'questions'=>$questions,'oaskclasses'=>AskTool::OaskClass_GetClass()));

    }
//我回复了，并且获得最佳答案的
public function   actionmybest()
{
//CPagination代表分页信息,有多少页，每页几条记录等
        //CLinkPager生成分页的代码,自定义css可以给属性cssFile一个值
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
         $criteria->select="t.ID,t.title,replys,sender,sendtime"; //只取需要的字段
         $criteria->condition=" t.jie=1 and reply.replyer='" .app()->user->name . "' "; //构建我发布过的咨询
         $criteria->order="reply.replytime desc"; //按最新的进行排序
         /*$criteria->with=array('reply'
                              =>array('select'=> 'id,replytime','joinType'=>'inner join') //联合查询，回复发布者是谁
            );
          */
        $criteria->with=array('reply'
                              =>array('select'=> 'id,replytime','joinType'=>'inner join') //联合查询，回复发布者是谁
            );       
        $criteria->together=true;
        $cachename="questionnum_use_bestss_".app()->user->name;
        if(cache()->get($cachename)) {
           $num = cache()->get($cachename);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename,$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=OaskQuestion::model()->findAll($criteria);
        $this->render('mybest',array('pages'=>$pages,'questions'=>$questions));

    }
//我回复过的咨询
public function   actionArea()
{
//CPagination代表分页信息,有多少页，每页几条记录等
        //CLinkPager生成分页的代码,自定义css可以给属性cssFile一个值
        $users=OaskUser::model()->findByPk(app()->user->id); //读专长
        $pnameid=1;
        //$cnameid=1;
        if(!empty ($users->pnameid))$pnameid=$users->pnameid;
        //if()$cnameid=$users->cnameid;
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
         $criteria->select="t.ID,t.title,replys,sender,sendtime"; //只取需要的字段
        // $criteria->condition=" t.jie=1 and  replys.replyer='" .app()->user->name . "' "; //构建我发布过的咨询
         $criteria->condition=" t.pnameid=" .$pnameid;
         //$criteria->order="t.id desc"; //按最新的进行排序
         $criteria->together=true;
         $cachename="questionnum_user_myquestion_area_".app()->user->name;
        if(cache()->get($cachename)) {
           $num = cache()->get($cachename);
        }else {
            $num = OaskQuestion::model()->count($criteria);
            cache()->set($cachename,$num,600);
        }
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=OaskQuestion::model()->findAll($criteria);
        $this->render('area',array('pages'=>$pages,'questions'=>$questions));

    }
  //过滤脚本
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
