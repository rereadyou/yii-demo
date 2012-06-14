<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<style>

.tanc a {color:#0f89d2;text-decoration:none;}
.tanc a:visited {color:#0f89d2;text-decoration:none;}
.tanc a:hover {color:#f60;text-decoration:underline;}
.tanc a:active {color:#0f89d2;}
.tanc{ width:478px; margin:0 auto;}
.tanc_b{ background-image:url(/images/user/index/ta_03.gif); height:46px; width:478px;}
.tanc_title{ margin:18px; _margin-left:10px; width:350px; float:left; color:#0f89d2; font-size:15px; font-weight:bold;}
.tanc_cloe{ margin-top:19px; width:50px; float:right; margin-right:9px;  color:#0f89d2; font-size:12px; }
.tanc_zb{ background-image:url(images/user/index/ta_06.gif); width:408px; text-align:center; padding-left:35px; padding-right:35px; }
.tanc_man{ font-size:12px; color:#0f89d2; line-height:26px; text-align:left;clear:both; overflow:hidden;}
</style>
</head>

<body> 
<div class="tanc">
    <div class="tanc_b">
	    <div class="tanc_title"><?php echo $v->title; ?></div>
	    <div class="tanc_cloe"><a  href="javascript:window.close()">关闭</a></div>
	</div>
	<div class="tanc_zb">
		<div class="tanc_man">
                 <?php
                     if ($v->ispic==1 && !empty ($v->picurl) )
                         {
                      echo "<p style='text-aligh:center'> ". $v->title ."</p>";
                         }
                      echo  str_replace("\r", "<br/>", $v->content) ;
                 ?>

		</div>

	</div>
	<div><img src="/images/user/index/ta_08.gif" /></div>
</div>
</body>
</html>
