<?php
echo "<ul>";
foreach($questions as $k=>$v){
	//echo "<li>".CHtml::link($v->Title,url('message/showmessage',array('id'=>$v->ID))).
	//CHtml::link('XX',url('ask/delquestion',array('id'=>$v->ID)),array('class'=>'del')).
	//CHtml::link('EE',url('message/editmessage',array('id'=>$v->ID))).
	//"</li>";

	echo  "<li>+++++<a href='".url('user/oaskgonggao/view',array('id'=>$v->ID))."'>".$v->title."</a></li>";
	//echo '-------------------------';
}
echo "</ul>";
$this->widget('CLinkPager', array(
     'cssFile' => '/css/pager.css',
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
	$('a.del').bind('click',function(){
		return  confirm('您确定要删除吗？');
	});
});
</script>