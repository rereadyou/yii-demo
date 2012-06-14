 <html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php cs()->registerCoreScript('jquery');?>
<?php cs()->registerScriptFile(resBu('scripts/jquery.tools.min.js'), CClientScript::POS_END);?>
<?php cs()->registerScriptFile(resBu('scripts/common.js'), CClientScript::POS_END);?>
<title>添加律所</title>
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
.STYLE2 {font-size: 12px}
body {
	margin-left: 1px;
	margin-top: 1px;
	margin-right: 1px;
	margin-bottom: 1px;
}
.STYLE3 {color: #004592}
-->
</style>
</head>
<style>
.WorkU{font-size:12px; border-bottom:1px solid #CBE5F8; border-right:1px solid #CBE5F8; padding:0 10px 0 0; }
.WorkP{border:1px solid #A0CFF1;}
.WorkC{ padding-left:5px;}
</style>
<body>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#cee9fa" style="margin-bottom:5px">
  <tr>
    <td height="25" align="left"><span class="STYLE2" style="background-color:#cee9fa; margin:0 auto; font-weight:bold; width:550px; padding:5px; margin:0px;">&nbsp;<span class="STYLE3">中顾网用户中心-&gt;添加律所:</span></span></td>
  </tr>
</table>
<?php if(Yii::app()->user->hasFlash('success')): ?>
<div class="flash-success">
	<?php echo app()->user->getFlash('success'); ?>
     <?php
	  $workid= $model->attributes['id'];
          $workname=$model->attributes['WorkName'];
	 ?>
    <script language="javascript">
  window.parent.document.getElementById("OaskUser_WorkID").value='<?php echo $workid?>';
  window.parent.document.getElementById('ls_workname').innerHTML='<?php echo $workname?>';
  <?php
  if(!empty($workid))
      {
  ?>
   window.parent.myclose();
   <?php
      }
   ?>
 </script>
</div>
<?php else: ?>
<?php $form=$this->beginWidget('CActiveForm'); ?>
<?php echo $form->errorSummary($model); ?>
<table width="600"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#A0CFF1" class="WorkP">
<tr bgcolor="#EFF7FC">
    <td width="79" align="right" bgcolor="#EFF7FC" class="WorkU">律所名称：</td>
    <td width="469" height="26" bgcolor="#EFF7FC" class="WorkC"><?php echo $form->textField($model,'WorkName'); ?>
      <span class="STYLE1">*</span></td>
  </tr>
  <tr bgcolor="#EFF7FC">
    <td width="79" align="right" bgcolor="#EFF7FC" class="WorkU">所属城市：</td>
    <td width="469" height="26" bgcolor="#EFF7FC" class="WorkC"><?php
			   $cnameid=0;
			   if (isset($_GET['cnameid']))
			   {
			   $cnameid=$_GET['cnameid'];
			   }
			   else
			   { if(isset($_COOKIE['cnameid']))  $cnameid=$_COOKIE['cnameid'];
			   }
               $this->widget('ModuleArea',array('cnameid'=>$cnameid));
           ?></td>
  </tr>
  <tr bgcolor="#EFF7FC">
    <td width="79" align="right" bgcolor="#EFF7FC" class="WorkU">营业执照：</td>
    <td width="469" height="26" bgcolor="#EFF7FC" class="WorkC"><?php echo $form->textField($model,'Code'); ?>
       </td>
  </tr>
    <tr bgcolor="#EFF7FC">
    <td width="79" align="right" bgcolor="#EFF7FC" class="WorkU">法人代表：</td>
    <td width="469" height="26" bgcolor="#EFF7FC" class="WorkC"><?php echo $form->textField($model,'LegalPerson'); ?>
       </td>
  </tr>
     <tr bgcolor="#EFF7FC">
    <td width="79" align="right" bgcolor="#EFF7FC" class="WorkU">成员：</td>
    <td width="469" height="26" bgcolor="#EFF7FC" class="WorkC"><?php echo $form->TextArea($model,'Member',array('cols'=>36,'rows'=>3,'width'=>'100px')); ?>
       </td>
  </tr>
     <tr bgcolor="#EFF7FC">
    <td width="79" align="right" bgcolor="#EFF7FC" class="WorkU">成立时间：</td>
    <td width="469" height="26" bgcolor="#EFF7FC" class="WorkC"><?php echo $form->textField($model,'Regdate'); ?>
       </td>
  </tr>

     <tr bgcolor="#EFF7FC">
    <td width="79" align="right" bgcolor="#EFF7FC" class="WorkU">联系电话：</td>
    <td width="469" height="26" bgcolor="#EFF7FC" class="WorkC"><?php echo $form->textField($model,'Phone'); ?>
        <span class="STYLE1">*</span><span class="STYLE2">(例：0531-12345678)</span></td>
  </tr>
     <tr bgcolor="#EFF7FC">
    <td width="79" align="right" bgcolor="#EFF7FC" class="WorkU">联系地址：</td>
    <td width="469" height="26" bgcolor="#EFF7FC" class="WorkC"><?php echo $form->textField($model,'Address'); ?>
       </td>
  </tr>
     <tr bgcolor="#EFF7FC">
    <td width="79" align="right" bgcolor="#EFF7FC" class="WorkU">邮政邮编：</td>
    <td width="469" height="26" bgcolor="#EFF7FC" class="WorkC"><?php echo $form->textField($model,'Zip'); ?>
       </td>
  </tr>
     <tr bgcolor="#EFF7FC">
    <td width="79" align="right" bgcolor="#EFF7FC" class="WorkU">电子邮箱：</td>
    <td width="469" height="26" bgcolor="#EFF7FC" class="WorkC"><?php echo $form->textField($model,'Email'); ?>
       </td>
  </tr>
       <tr bgcolor="#EFF7FC">
    <td width="79" align="right" bgcolor="#EFF7FC" class="WorkU">网站主页：</td>
    <td width="469" height="26" bgcolor="#EFF7FC" class="WorkC"><?php echo $form->textField($model,'Homepage'); ?>
       </td>
  </tr>
       <tr bgcolor="#EFF7FC">
    <td width="79" align="right" bgcolor="#EFF7FC" class="WorkU">简介：</td>
    <td width="469" height="26" bgcolor="#EFF7FC" class="WorkC"><?php echo $form->TextArea($model,'Memo',array('cols'=>36,'rows'=>3,'width'=>'100px')); ?>
       </td>
  </tr>
        <tr bgcolor="#EFF7FC">
    <td width="79" align="right" bgcolor="#EFF7FC" class="WorkU"> </td>
    <td width="469" height="26" bgcolor="#EFF7FC" class="WorkC"> <?php echo CHtml::submitButton('Submit',array('value'=>'我要保存修改')); ?>
       </td>
  </tr>
  </table>
 <?php $this->endWidget(); ?>
<?php endif; ?>
  </body>
  </html>