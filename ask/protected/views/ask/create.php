
<h1>发布咨询</h1>

<?php if(Yii::app()->user->hasFlash('success')): ?>

<div class="flash-success">
	<?php echo app()->user->getFlash('success'); ?>
</div>

<?php else: ?>

<p>
请发布
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'sender'); ?>
		<?php echo $form->textField($model,'sender'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">输入验证码.
		<br/>不区分大小写</div>
	</div>

	<div class="row submit">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>