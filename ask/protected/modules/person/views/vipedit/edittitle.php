<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php cs()->registerCoreScript('jquery');?>
	<?php cs()->registerScriptFile(resBu('scripts/jquery.tools.min.js'), CClientScript::POS_END);?>
	<?php cs()->registerScriptFile(resBu('scripts/common.js'), CClientScript::POS_END);?>

<?php $form=$this->beginWidget('CActiveForm'); ?>
	<?php echo $form->errorSummary($model); ?>
<div class="xgal">

 <div class="xg_main">
  <div class="fs">
    <table width="730" border="0" cellpadding="0" cellspacing="1" bgcolor="#E4E4E4">
      <tr>
        <td height="30" colspan="3" bgcolor="#effaff">&nbsp;<span class="cu">顶部配置</span></td>
        </tr>
      <tr>
          <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">网站标题：</span>&nbsp; </td>
        <td align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
          	<?php echo $form->textField($model,'viptitle',array('class'=>'kk','size'=>40)); ?>
        </div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">咨询热线：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
         <?php echo $form->textField($model,'mobile',array('class'=>'kk')); ?>
        </div></td>
      </tr>
      
       <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">导航文字：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
         <?php echo $form->textField($model,'vipnav',array('class'=>'kk')); ?>
        </div></td>
      </tr>
    
         <tr>
        <td height="30" colspan="5" align="center" bgcolor="#effaff"> 
        <?php echo CHtml::submitButton('Submit',array('value'=>'我要保存修改','id'=>'submit')); ?></td>
        </tr>
    </table>
  </div>
 </div>
<img src="/images/user/xgzl_r2_c21.jpg" />
</div>
<script>
$(function(){
	$('#submit').click(function(){
		var str = $('#OaskUser_viptitle').val() 
		var l = str.replace(/[^\x00-\xff]/g, 'xx').length
		if(l>40){
			alert('标题最长20个汉字');
			return false;
		}

		var str = $('#OaskUser_vipnav').val() 
		var l = str.replace(/[^\x00-\xff]/g, 'xx').length
		if(l>20){
			alert('导航文字最长10个汉字');
			return false;
		}
		
	});
	
});
</script>
<?php $this->endWidget(); ?>
