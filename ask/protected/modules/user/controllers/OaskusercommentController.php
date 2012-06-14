<?php

class OaskUserCommentController extends CController {      //律师好评与差评
    public function actionIndex() {
        echo "my gooods is star";
    }
    //查询我发布的好评
    public function actionGzcomment() {
        //读取好评列表
        //CPagination代表分页信息,有多少页，每页几条记录等
        //CLinkPager生成分页的代码,自定义css可以给属性cssFile一个值
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
        $criteria->condition=' pltype=0 and usercomment.senderid=' . app()->user->id;
        $criteria->select="question.id as id,question.title as title"; //只取需要的字段
        $criteria->order="t.id desc"; //按最新的进行排序
        $criteria->with=array('question'
                =>array('select'=> 'title','join') //联合查询，回复发布者是谁
            ,'usercomment'=>array('select'=>'adddate')
        );
        $cachename="haoping_gongzhong_myask_"  .  app()->user->id;
        $num=0;
        if(cache()->get($cachename)  ) {
            $num = cache()->get($cachename);
        }else {
            $num = OaskReply::model()->count($criteria);
            cache()->set($cachename,$num,60);
        }
        $criteria->together=true;
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=OaskReply::model()->findAll($criteria);
        $cachename="chaping_gongzhong_myask_"  .  app()->user->id;
        $numchaping=0;
        if(cache()->get($cachename)  ) {
            $numchaping = cache()->get($cachename);
        }else {
            //$criteria->condition='t.lawyer='.app()->user()->id;
            $criteria->condition=' pltype=1 and usercomment.senderid=' . app()->user->id;
            $numchaping = OaskReply::model()->count($criteria);
            cache()->set($cachename,$numchaping,60);
        }

        $this->render('gzcomment',array('pages'=>$pages,'numchaping'=>$numchaping,'questions'=>$questions));
    }
    //我发布的差评
        public function actionGzcommentchaping() {
        //读取好评列表
        //CPagination代表分页信息,有多少页，每页几条记录等
        //CLinkPager生成分页的代码,自定义css可以给属性cssFile一个值
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
        $criteria->condition=' pltype=1 and usercomment.senderid=' . app()->user->id;
        $criteria->select="question.id as id,question.title as title"; //只取需要的字段
        $criteria->order="t.id desc"; //按最新的进行排序
        $criteria->with=array('question'
                =>array('select'=> 'title','join') //联合查询，回复发布者是谁
            ,'usercomment'=>array('select'=>'adddate')
        );
        $cachename="haoping_gongzhong_myask_"  .  app()->user->id;
        $num=0;
        if(cache()->get($cachename)   ) {
            $num = cache()->get($cachename);
        }else {
            $num = OaskReply::model()->count($criteria);
            cache()->set($cachename,$num,60);
        }
        $criteria->together=true;
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=OaskReply::model()->findAll($criteria);
        $cachename="chaping_gongzhong_myask_"  .  app()->user->id;
        $numchaping=0;
        if(cache()->get($cachename)  ) {
            $numchaping = cache()->get($cachename);
        }else {
            //$criteria->condition='t.lawyer='.app()->user()->id;
            $criteria->condition=' pltype=0 and usercomment.senderid=' . app()->user->id;
            $numchaping = OaskReply::model()->count($criteria);
            cache()->set($cachename,$numchaping,60);
        }
        $this->render('gzcommentchaping',array('pages'=>$pages,'numchaping'=>$numchaping,'questions'=>$questions));
    }
    //律师好评
    public function actionLscomment() {
        //读取好评列表
        //CPagination代表分页信息,有多少页，每页几条记录等
        //CLinkPager生成分页的代码,自定义css可以给属性cssFile一个值
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
        $criteria->condition=' pltype=0 and lawyer=' . app()->user->id;
        $criteria->select="question.id as id,question.title as title"; //只取需要的字段
        $criteria->order="t.id desc"; //按最新的进行排序
        $criteria->with=array('question'
                =>array('select'=> 'title','join') //联合查询，回复发布者是谁
            ,'usercomment'=>array('select'=>'adddate')
        );
        $cachename="haoping_user_myask_"  .  app()->user->id;
        $num=0;
        if(cache()->get($cachename)) {
            $num = cache()->get($cachename);
        }else {
            $num = OaskReply::model()->count($criteria);
            cache()->set($cachename,$num,60);
        }
        
         $criteria->together=true;
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=OaskReply::model()->findAll($criteria);
        //统计差评
        $cachename="chaping_user_myask_"  .  app()->user->id;
        $numchaping=0;
        if(cache()->get($cachename) ) {
            $numchaping = cache()->get($cachename);
        }else {
            //$criteria->condition='t.lawyer='.app()->user()->id;
            $criteria->condition=' pltype=1 and lawyer=' . app()->user->id;
            $numchaping = OaskReply::model()->count($criteria);
            cache()->set($cachename,$numchaping,60);
        }
        $this->render('lscomment',array('pages'=>$pages,'numchaping'=>$numchaping,'questions'=>$questions));
    }
    //差评
     public function actionLscommentchaping() {
        //读取好评列表
        //CPagination代表分页信息,有多少页，每页几条记录等
        //CLinkPager生成分页的代码,自定义css可以给属性cssFile一个值
        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
        $criteria->condition=' pltype=1 and lawyer=' . app()->user->id;
        $criteria->select="question.id as id,question.title as title"; //只取需要的字段
        $criteria->order="t.id desc"; //按最新的进行排序
        $criteria->with=array('question'
                =>array('select'=> 'title','join') //联合查询，回复发布者是谁
            ,'usercomment'=>array('select'=>'adddate')
        );
        $cachename="chaping_user_myask_"  .  app()->user->id;
        $num=0;
        if(cache()->get($cachename)) {
            $num = cache()->get($cachename);
        }else {
            $num = OaskReply::model()->count($criteria);
            cache()->set($cachename,$num,60);
        }

         $criteria->together=true;
        $pages=new CPagination($num);
        $pages->pageSize=12;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=OaskReply::model()->findAll($criteria);
        //统计差评
        $cachename="haoping_user_myask_"  .  app()->user->id;
        $numchaping=0;
        if(cache()->get($cachename) ) {
            $numchaping = cache()->get($cachename);
        }else {
            //$criteria->condition='t.lawyer='.app()->user()->id;
           $criteria->condition=' pltype=0 and lawyer=' . app()->user->id;
            $numchaping = OaskReply::model()->count($criteria);
            cache()->set($cachename,$numchaping,60);
        }
        $this->render('lscommentchaping',array('pages'=>$pages,'numchaping'=>$numchaping,'questions'=>$questions));
    }
   //根据用户传来的id列表，获取咨询列表
    public function GetLimitQustion($ids)
    {

        OaskQuestion::model()->findall(array('condition'=>'id in($ids)'));
        return ;
    }
    public function filters() {
        return array(
                'accessControl'
        );
    }
    public function accessRules() {
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