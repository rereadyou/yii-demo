<?php 
echo CHtml::dropDownList('pnameid', $this->provinceid, CHtml::listData($this->provinces, 'id', 'name'),array('class'=>"ft12 selwidth"));
echo CHtml::dropDownList('cnameid', $this->cnameid, CHtml::listData($this->citys, 'id', 'name'),array('class'=>"ft12 selwidth"));
 if ($this->areas!=null)
 {
 echo CHtml::dropDownList('xnameid', 0, array(0=>'请选择')+ (array)CHtml::listData($this->areas, 'id', 'name'),array('class'=>"ft12 selwidth"));
 }
 else
     {
echo CHtml::dropDownList('xnameid', 0, array(0=>'请选择'),array('class'=>"ft12 selwidth"));
     }
 ?>
<script>
$(function(){
	$('#cnameid').live('change',function(){
		var url = '<?php  echo url("{$this->controller->module->id}/{$this->controller->id}/area");?>';
		$.get(url,{cnameid:$('#cnameid').val()},function(data){
			$('#xnameid').replaceWith(data);
		})
	});
	
	$('#pnameid').live('change',function(){
		var url = '<?php  echo url("{$this->controller->module->id}/{$this->controller->id}/area");?>';
		$.get(url,{pnameid:$('#pnameid').val()},function(data){
			$('#cnameid').replaceWith(data);
			$('#xnameid').replaceWith("<select id='xnameid' class='ft12 selwidth'><option value='0'>请选择</option></select>");
		})
	});
	
});
</script>

