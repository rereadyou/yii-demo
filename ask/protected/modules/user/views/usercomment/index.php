<div class="ma">
	<div class="zti_a"><span class="ma_zt">首页</span> >>  问题反馈</div>
	<div class="bolck10"></div>

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="kjz">
	
	<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('class'=>'wtk_bk')); ?>
	
	
		<div class="bolck10"></div>
		  <?php echo $form->labelEx($model,'comment'); ?>
			<?php echo $form->textArea($model,'comment',array('class'=>'wtk_bk2')); ?>
	</div>
	
	<div class="bolck10"></div>
	<div class="bolck10"></div>
	<div class="bolck10"></div>
	<div style="text-align:center;">
		
		<input type="image"  src="/images/user/wt_25.gif">
		&nbsp;&nbsp;&nbsp;&nbsp;<img  src="/images/user/wt_27.gif" width="149" height="36" /></div>
	<div style="text-align:center; margin-top:30px;"><img  src="/images/user/lse.gif" /></div>

<?php $this->endWidget(); ?>

</div>