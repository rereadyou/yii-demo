<?php
class ScoreController extends CController {
   //用户积分首页
    public function actionIndex()
    { //统计用户回复数量综合
         $num_reply=0;
         $num_reply_best=0;
          $num_shang=0;//悬赏分总数
         $criteria = new CDbCriteria();
        //总记录数放到缓存中600秒
         $criteria->select=" id "; //只取需要的字段
         $criteria->condition="replyer='" .$_COOKIE['souask']['UNM'] . "' "; //构建我发布过的咨询
         $num_reply=OaskReply::model()->count($criteria);
         echo "我一共回复了" . $num_reply;
         $criteria->condition="replyer='" .$_COOKIE['souask']['UNM'] . "' and best=1 "; // 回复过并获得最佳答案的数量
         $num_reply_best=OaskReply::model()->count($criteria);
         echo "<br/>获得最佳答案咨询数量为" . $num_reply_best;
         $criteria->select="sum(shang) as shang";
         $criteria->condition="sender='" .$_COOKIE['souask']['UNM'] . "'  "; // 回复过并获得最佳答案的数量
          $num_shang=OaskQuestion::model()->find($criteria);
           echo "<br/>我付出的悬赏分总和" . $num_reply_best;
           $this->render("index");
           app()->msg->message('您的信息已保存！');

    }

}
?>
 