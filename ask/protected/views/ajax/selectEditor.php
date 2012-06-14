<?php 
if ($attr == 'PCnameid'){
	$cnameid = $model->cnameid;
	$this->widget('area',array('cnameid'=>$cnameid));
?>
	<script type="text/javascript">
		function resetPCnameid(){
			
			if($("#cnameid").val() == '' || $("#cnameid").val() == 0){
				alert('请选择市');
				return false;
			}
			$("#OaskUser_pnameid").val($("#pnameid").val());
			$("#OaskUser_cnameid").val($("#cnameid").val());
//			alert($("#OaskUser_cnameid").val());
		}
	</script>
	<form action="?r=ajax/submit" target="submitIframe" method="post" onsubmit="return resetPCnameid();">
<?php
	echo "<input type='hidden' id='OaskUser_pnameid' name='OaskUser[pnameid]' value=".$model->pnameid.">";
	echo "<input type='hidden' id='OaskUser_cnameid' name='OaskUser[cnameid]' value=".$cnameid.">";
	echo "<input type='submit' value='提交'>";
} 

//else
?>


		<input type="button" value="取消" onclick="showContent('<?php echo $attr?>co');">
	</form>
	
	<iframe name="submitIframe" style="display: none" src="">

