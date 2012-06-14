<?php 
echo CHtml::beginForm();
$this->widget('application.widget.ckeditor.editor.CKkceditor',array(
		"model"=>$model,                # Data-Model
		"attribute"=>'descripcion',         # Attribute in the Data-Model
		"height"=>'400px',
		"width"=>'100%',
		"filespath"=>(!$model->isNewRecord)?Yii::app()->basePath."/../media/paquetes/".$model->idpaquete."/":"",
		"filesurl"=>(!$model->isNewRecord)?Yii::app()->baseUrl."/media/paquetes/".$model->idpaquete."/":"",
));
echo CHtml::submitButton('提交');
echo CHtml::endForm();