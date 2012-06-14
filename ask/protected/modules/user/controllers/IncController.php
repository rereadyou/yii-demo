<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
class IncController extends CController {
    public function actionTop() {
        $this->renderPartial('top');
    }
    public function actionLeft() {
        if(isset(app()->user->ID)) {
            if(UserTool::user()->userClassID==1) {
                $this->renderPartial('left'); //公众
            }
            else {
                $this->renderPartial('leftgz');//律师                
            }
        }
        else {            
            $this->renderPartial('left');//律师
        }
    }
    public function actionFoot() {
        $this->renderPartial('foot');
    }
    //用户中心首页
   public function actionMain()
    {  //根据是否律师等资源，判断律师用户是否相同
       $All_ask_counts= AskCount::GetQuestionNum();
       //print_r( $All_ask_counts);
       if(isset(app()->user->ID)) {
            if(UserTool::user()->userClassID==1) {
                 $this->renderPartial('main',array('All_ask_counts'=>$All_ask_counts,'news'=>$this->GetPicnNews_top(2,0,1),'huodong'=>$this->GetPicnNews_top(5,1,0))); //公众
            }
            else {
                 $this->renderPartial('maingz',array('All_ask_counts'=>$All_ask_counts,'news'=>$this->GetPicnNews_top(2,0,1),'huodong'=>$this->GetPicnNews_top(5,1,0)));//律师
            }
        }
        else {
               $this->redirect(url('site/login', array('referer'=>url('user/inc/main'))));
        }      
    }
  //获取到图片新闻
    public function GetPicnNews_top($num,$classid,$ispic)
    {    $news=null;
         $cachename="news_user_{$num}{$classid}{$ispic}";
         if(cache()->get($cachename))
                 {
               $news=unserialize(cache()->get($cachename));
                 }
                 else
                     {
          $criteria = new CDbCriteria();
           //总记录数放到缓存中600秒
          $criteria->select="t.ID,t.title,picurl,content"; //只取需要的字段
          $criteria->condition="ispic=$ispic and classid=$classid";
          $criteria->order="t.ID desc"; //按最新的进行排序
          $criteria->limit=$num;
          $news=OaskGonggao::model()->findAll($criteria);
          cache()->set($cachename,serialize($news));
                     }   
          return $news;
    }
}

?>
