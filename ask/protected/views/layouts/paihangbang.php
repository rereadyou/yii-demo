<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/paihangbang/css/txt.css"/>
<link rel="stylesheet" type="text/css" href="/css/paihangbang/css/headerfooter.css"/>
<title><?php echo sprintf('%s', $this->pageTitle);?></title>
</head>
<body>
<!--top-->
    <script src='<?php echo url('site/jsloginform')?>'></script>
<!--logo-->
<div id="top">
    
	<div class="top_s">
    	<div class="top_z"><img src="/css/paihangbang/images/logo.jpg" /></div>
        <div class="top_ds"><a href="<?php echo  url('/paihangbang');?>">律师排行榜</a></div>
        <div class="topr_d"><img src="/css/paihangbang/images/tel.gif" /></div>
    </div>
</div>
<div class="bolck10"></div>
<!--线条-->
<div class="hxed"></div>
<div class="bolck5"></div>

<?php echo $content;?>

<?php cs()->registerCoreScript('jquery');?>
<?php cs()->registerScriptFile(resBu('scripts/jquery.tools.min.js'), CClientScript::POS_END);?>
<?php cs()->registerScriptFile(resBu('scripts/common.js'), CClientScript::POS_END);?>
<script src="http://www.google-analytics.com/urchin.js"  type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-390261-1";
urchinTracker();
</script>