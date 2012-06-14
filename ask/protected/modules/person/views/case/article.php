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
        <td height="30" colspan="3" bgcolor="#effaff">&nbsp;<span class="cu">添加案例</span></td>
        </tr>
      
      <tr>
          <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">标题：</span>&nbsp; </td>
        <td align="center" bgcolor="#FFFFFF"><img src="../images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
          	<?php echo $form->textField($model,'title',array('class'=>'kk','size'=>40)); ?>
        </div></td>
      </tr>
      
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">内容：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"><img src="../images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
         
		<?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
			"model"=>$model,				# Data-Model
			"attribute"=>'content',			# Attribute in the Data-Model
			"height"=>'400px',
			"width"=>'100%',
			"toolbarSet"=>'Person', 			# EXISTING(!) Toolbar (see: fckeditor.js)
			"fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
											# Path to fckeditor.php
			"fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
											# Relative Path to the Editor (from Web-Root)
			"config" => array("EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
											# Additional Parameters
			) );
		?> 
	
        </div></td>
      </tr>
    
         <tr>
        <td height="30" colspan="5" align="center" bgcolor="#effaff"> 
        <?php echo CHtml::submitButton('Submit',array('value'=>'我要保存修改','id'=>'submit')); ?></td>
        </tr>
    </table>
  </div>
 </div>
<img src="../images/user/xgzl_r2_c21.jpg" />
</div>
<?php $this->endWidget(); ?>
