<?php 
	$form = $this->beginWidget('CActiveForm', array(
		'id'=>'user-form',
		'action' => url('demo/upload/upload'),
		'enableClientValidation'=>true,
		'htmlOptions' => array(
			'enctype' => 'multipart/form-data',		
			),	
		));
	
	echo $form->errorSummary($model);
	
	echo $form->fileField($model, 'image4upload');
	
	echo CHtml::submitButton('提交');
	
	$this->endWidget();
?>