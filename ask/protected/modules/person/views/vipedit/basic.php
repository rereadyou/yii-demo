<?php $form=$this->beginWidget('CActiveForm'); ?>
<?php echo $form->errorSummary($user); ?>
<table>
<tr><td>名子：</td>
<td>
<?php echo CHtml::activeTextField($user, 'name');?>
</td></tr>
<tr><td>地区：</td>
<td><?php $this->widget('area',array('cnameid'=>$user->cnameid ?  $_COOKIE['cnameid'] : 86));?></td></tr>
<tr><td>电话：</td>
<td><?php echo CHtml::activeTextField($user, 'mobile');?></td></tr>
<tr><td>aaaa</td><td>bbb</td></tr>
<tr><td>营业执照：</td><td>bbb</td></tr>
<tr><td>执业机构：</td><td>bbb</td></tr>
<tr><td>电话：</td><td>bbb</td></tr>
<tr><td>邮件：</td><td>bbb</td></tr>
<tr><td>地址：</td><td>bbb</td></tr>
</table>
<?php echo CHtml::submitButton('提交 ');?>
<?php $this->endWidget(); ?>