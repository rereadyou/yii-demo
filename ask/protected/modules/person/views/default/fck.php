<?php cs()->registerCoreScript('jquery');?>
<?php cs()->registerScriptFile(resBu('scripts/thickbox.js'), CClientScript::POS_END);?>
<link rel="stylesheet" type="text/css" href="css/thickbox.css"/>


<a href="<?php echo url('person/vipedit/EditProfileLs',array('id'=>282102));?>" class="thickbox" title="个人资料">编辑</a>

<div id="abc">
<?php 
$model = new OaskQuestion();
$this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
"model"=>$model, # Data-Model
"attribute"=>'content', # Attribute in the Data-Model
"height"=>'400px',
"width"=>'100%',
"toolbarSet"=>'Person',  # EXISTING(!) Toolbar (see: fckeditor.js)
"fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
# Path to fckeditor.php
"fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
# Relative Path to the Editor (from Web-Root)
"config" => array("EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
# Additional Parameters
) );
?>

</div>