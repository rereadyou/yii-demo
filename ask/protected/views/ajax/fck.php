<form action="?r=ajax/submit" target="submitIframe" method="post">
	<?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
	"model"=>$model, # Data-Model
	"attribute"=>$attr, # Attribute in the Data-Model
	"height"=>'200px',
	"width"=>'400px',
	"toolbarSet"=>'Basic',  # EXISTING(!) Toolbar (see: fckeditor.js)
	"fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
	# Path to fckeditor.php
	"fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
	# Relative Path to the Editor (from Web-Root)
	"config" => array("EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
	# Additional Parameters
	) );
	?>
	<input type="submit" value="提交">
	<input type="button" value="取消" onclick="showContent('<?php echo $attr?>co');">
</form>

<iframe name="submitIframe" style="display: none" src="">