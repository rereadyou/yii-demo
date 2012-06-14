<?php
//$this->widget('area');
echo "<ul>";
foreach($questions as $k=>$v){
	echo "<li>".CHtml::link($v->title,url('ask/showquestion',array('id'=>$v->ID))).
	CHtml::link('XX',url('ask/delquestion',array('id'=>$v->ID)),array('class'=>'del')).
	CHtml::link('EE',url('ask/editquestion',array('id'=>$v->ID))).
	"</li>";

	echo "<li><a href='".url('ask/showquestion',array('id'=>$v->ID))."'>".$v->title."</a><a class='del' href='".url('ask/delquestion',array('id'=>$v->ID))."'>X</a></li>";
	echo '-------------------------';
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
echo '共用'.$pages->pageCount.'页';
?>
<script>
$(function(){
	$('a.del').bind('click',function(){
		return  confirm('您确定要删除吗？');
	});
});
</script>