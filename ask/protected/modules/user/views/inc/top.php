<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/css/user/style.css" rel="stylesheet" type="text/css" />
<script src="/scripts/common.js"></script>
</head>
<body>
<div class="top">
	<div class="top_sb">
			<div class="top_l"><img src="/images/user/ls_03.gif" /></div>
			<div class="ner"><img src="/images/user/ls_06.gif" /></div>
			<div class="zui">尊敬的<span class="zt"><?php echo app()->user->name;    ?></span>您好，欢迎进入中顾法律网用户中心！<br />
			 <a onclick="setHomePage(this)" style="cursor:pointer;">设为首页</a> | <a onclick="addFavorite();" style="cursor:pointer;">加入收藏</a> | <a href="http://www.9ask.cn/about/comment.asp" target="_blank">意见反馈</a> | <a href="http://www.9ask.cn/souask/help.asp" target="_blank">帮助中心</a> </div>
	
	</div>
	<div class="bolck5"></div>
	<div class="top_xb">
			<div class="tsh">
				<ul>
                                    <li style="width:86px;"><a href="http://www.9ask.cn/" target="_blank" >首页</a></li>
				<li><a href="http://www.9ask.cn/souask/" target="_blank">法律咨询</a></li>
				<li><a href="http://www.9ask.cn/entrust/" target="_blank">案件委托</a></li>
				<li><a href="http://news.9ask.cn/" target="_blank">法律新闻</a></li>
				<li><a href="http://www.9ask.cn/search/" target="_blank">律师、律所</a></li>
				</ul>
                            <div class="main_ssd"> <a href="<?php echo url('site/logout', array('referer'=>url('/user')))?>" target="_top" >退出</a> </div>
			</div>
	</div>
</div>
</body>
</html>
