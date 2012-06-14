<?php
class OaskGonggaoController extends CController
{    //公告列表
      public function actionIndex()
	{ $criteria = new CDbCriteria();
           //总记录数放到缓存中600秒
          $criteria->select="t.ID,t.title,picurl,content,time"; //只取需要的字段
          $criteria->condition="ispic=1";
          $criteria->order="t.ID desc"; //按最新的进行排序
          $criteria->limit=2;
          $news=OaskGonggao::model()->findAll($criteria);
          $this->render('index',array('news'=>$news)); //推送到前台
	}
        //查看公告
        public function actionView($id)
        {//根据公告id查看公告
             
              $news=OaskGonggao::model()->findByPk($id);
              $this->render('view',array('v'=>$news)); //推送到前台
        }
        //制作列表页
        public function actionList()
        {

        $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
      //    $criteria->condition="t.id>10000";
         $criteria->select="ID,title";
         $cachename="gonggao_ask";
         if(cache()->get($cachename)) {
            $num = cache()->get($cachename);
        }else {
            $num = OaskGonggao::model()->count($criteria);
            cache()->set($cachename,$num,600);        }         
        $pages=new CPagination($num);
        $pages->pageSize=15;
        $pages->applyLimit($criteria);//给$criteria->limit offset等符值
        $questions=OaskGonggao::model()->findAll($criteria);
        $this->render('list',array('pages'=>$pages,'questions'=>$questions));
        }
}