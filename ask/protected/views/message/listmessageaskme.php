
<?php
echo "我收到的一对一咨询";

echo "<ul  >";
foreach($questions as $k=>$v){
	//echo "<li>".CHtml::link($v->Title,url('message/showmessage',array('id'=>$v->ID))).
	//CHtml::link('XX',url('ask/delquestion',array('id'=>$v->ID)),array('class'=>'del')).
	//CHtml::link('EE',url('message/editmessage',array('id'=>$v->ID))).
	//"</li>";
	//echo  "<li>".$v->oaskuser->TrueName."+++++<a href='".url('message/showmessage',array('id'=>$v->ID))."'>".$v->Title."</a><a class='del' href='".url('message/editmessage',array('id'=>$v->ID))."'>X</a></li>";
      echo "<li> 发布人：" .    $v->oaskuser->TrueName  ." || 最后回复人：".  $v->oasklastreply->TrueName."<a class='del' href='".url('message/answermessage',array('id'=>$v->ID))."'>我要回复</a></li>";
      echo  "<li><a href='".url('message/showmessage',array('id'=>$v->ID))."'>".$v->Title."</a></li>";
      echo '<li><br/>-------------------------<br/></li>';
      }
echo "</ul>";
$this->widget('CLinkPager', array(
	'pages' => $pages,
    'header' => '翻页',
    'firstPageLabel' => '首页',
    'lastPageLabel' => '末页',
    'nextPageLabel' => '下页',
    'prevPageLabel' => '上页',
));
?>
 
<script>
$(function(){
	//$('a.del').bind('click',function(){
		//return  confirm('您确定要删除吗？');
	//});
});
</script>