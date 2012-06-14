<?php
/* 
 * 咨询搜索类
 * 搜索使用DAO
*/
class oasksearchclass {
    //搜索搜友的咨询,根据关键词
    public static function  Question_search_all($key) {
        $sql="select top 500  id,title,content from oask_question where contains(title,'$key') order by id desc";
        $criteria=new CDbCriteria(); 
        $result = Yii::app()->db->createCommand($sql)->query();
        $pages=new CPagination($result->rowCount);
        $pages->pageSize=22;
        $pages->applyLimit($criteria);
        $result=Yii::app()->db->createCommand($sql." LIMIT :offset,:limit");
        $result->bindValue(':offset', $pages->currentPage*$pages->pageSize);
        $result->bindValue(':limit', $pages->pageSize);
        $posts=$result->query();
        $this->render('index',array('posts'=>$posts,'pages'=>$pages));
 }
    private static  function select($sql) {
        //if($nums<1) return array();//如果条数正确，返回一个空数组
        $command=Yii::app()->db->createCommand($sql);//查询条件
        $ph=$command->query();//获取查询数据
        return $ph;
    }
}
?>
