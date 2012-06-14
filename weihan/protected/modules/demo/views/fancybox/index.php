<?php 
	echo CHtml::link("test","#data", array('id'=>'inline'));
	echo '<br>';
	echo CHtml::link('百度', 'http://www.baidu.com', array('id'=>'baidu')); 
?>
<div style="display: none">
	<div id="data">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
	</div>
</div>
<?php 
	$this->widget('application.widget.fancybox.WFancyBox', array( 
		'target'=>'a#inline', 
		'config'=>array( 'scrolling' => 'yes', 'titleShow' => true, ), 
	)); 
	
	$this->widget('application.widget.fancybox.WFancyBox', array(
			'target'=>'#baidu',
			'config'=>array('type'=>'iframe', 'scrolling' => 'yes', 'titleShow' => true, ),
	));
?>