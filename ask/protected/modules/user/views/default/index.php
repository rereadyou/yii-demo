<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/user/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/user/top.css" />
	<?php cs()->registerCoreScript('jquery');?>
	<?php cs()->registerScriptFile(resBu('scripts/jquery.tools.min.js'), CClientScript::POS_END);?>
	<?php cs()->registerScriptFile(resBu('scripts/common.js'), CClientScript::POS_END);?>
 <title>中顾法律网用户中心</title>
</head>
<body> 
<div id="top">
<iframe src="<?php echo  url('user/inc/top',array()) ;?>" width="960" frameborder="0"  height="110px" scrolling="no" onload="this.height=this.contentWindow.document.documentElement.scrollHeight-1"  ></iframe>
</div>
<div class="top_sb">
	<div class="zuo"><iframe src="<?php echo  url('user/inc/left',array()) ;?>" width="145" frameborder="0"  height="550"  scrolling="no" onload="this.height=this.contentWindow.document.documentElement.scrollHeight-1"></iframe></div>
	<div class="zhy_ma">
	<div class="bolck10"></div>
        <iframe src="<?php echo  url('user/inc/main',array()) ;?>" width="815px;"    style="_width:810px;" frameborder="0" scrolling="no" id="mymain" onload="this.height=this.contentWindow.document.documentElement.scrollHeight"></iframe>
	</div>
	<div class="bolck10"></div>
	<div class="Bottom">
            <iframe src="<?php echo  url('user/inc/foot',array()) ;?>"     style="margin-left: 0; margin-top: 0" frameborder="0"  height="90" width="960"  scrolling="no" name="rightframe" id="rightframe" onload="this.height=this.contentWindow.document.documentElement.scrollHeight-1" ></iframe>
	</div>
</div>
</body>
</html>
