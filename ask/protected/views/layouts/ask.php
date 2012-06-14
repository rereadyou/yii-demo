<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/css/headerfooter.css"/>
<title><?php echo sprintf('%s', $this->pageTitle);?></title>
</head>
<body>
<!--topnav-->
 <script src='<?php echo url('site/jsloginform')?>'></script>
<!--logo-->
<div id="logo" class="cwidth">
    <div class="logo f_l"><a href="http://ask.9ask.cn"><img src="/images/logo.jpg" width="198" height="64" /></a></div>
		<div class="tel f_r margin_top_10"></div>
</div>
<!--navbar-->
<div id="navbar" class="cwidth">
	<ul>
		<li class="cnav"><a href="http://www.9ask.cn/" target="_blank">中顾首页</a></li>
		<li class="nnav"><a href="http://ask.9ask.cn" target="_blank">法律咨询中心</a></li>
		<li class="nnav"><a href="http://ask.9ask.cn/souask/ask.php" target="_blank">发布咨询</a></li>
		<li class="nnav"><a href="http://www.9ask.cn/souask/question_list.asp?lei=xin" target="_blank">最新咨询</a></li>
		<li class="nnav"><a href="http://www.9ask.cn/souask/qs_law.asp" target="_blank">按专长找咨询</a></li>
		<li class="nnav"><a href="http://www.9ask.cn/souask/qs_area.asp" target="_blank">按地区找咨询</a></li>
		<li class="nnav"><a href="http://www.9ask.cn/search/findonline.asp" target="_blank">在线律师</a></li>
		<li class="nnav"><a href="http://www.9ask.cn/search/lvsuo.asp" target="_blank">找律所</a></li>
		<li class="nnav"><a href="http://www.9ask.cn/entrust/" target="_blank">案源中心</a></li>
		<li class="nnav"><a href="http://news.9ask.cn/zhishi/" target="_blank">知识</a></li>
		<li class="nnav"><a href="http://news.9ask.cn/fagui/" target="_blank">法规</a></li>
		<li class="nnav"><a href="<?php echo url('paihangbang/index')?>" target="_blank">积分排行榜</a></li>
		<li class="nnav"><a href="<?php echo url('askstar/index')?>" target="_blank">咨询之星</a></li>
	</ul>
</div>
<?php echo $content;?>
<!--footer-->
<div id="footer" class="cwidth margin_top_10">
		<div class="footer_2 borderblue_1 margin_bottom_7">
				<script src=" http://www.9ask.cn/js/getZXNum.asp" charset="gbk"></script>
		</div>
		<div class="footer_3 margin_bottom_7 borderdark_2">

					<strong>友情链接:</strong>
           <a href="http://www.zgdls.com/" target="_blank">中国大律师</a>
           <a href="http://www.9ask.cn/" target="_blank">法律咨询</a>
           <a href="http://shanghai.koubei.com/fang" target="_blank">上海口碑房产</a>
           <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-1-1&amp;e=2008-2-1&amp;nian=true" target="_blank">历年精华法律咨询 </a>
           <a href="http://www.9ask.cn/rss/zxrss.htm" target="_blank">咨询订阅中心</a>
           <a href="http://www.exam8.com/zige/sifa/" target="_blank">司法考试</a>
           <a href="http://www.ihlaw.cn/" target="_blank">360法网</a>

		</div>
		<div class="footer_4 margin_bottom_7">
			<div>
					<a href="http://www.9ask.cn/about/about.asp" target="_blank">关于中顾法律网</a> |
					<a href="http://www.9ask.cn/about/map.asp" target="_blank">网站地图</a> |
					<a href="http://www.9ask.net" target="_blank">企业服务</a> |
					<a href="http://www.9ask.cn/fa/index.asp" target="_blank">律师服务</a> |
					<a href="http://www.9ask.cn/trust/" target="_blank">诚信律法通服务</a> |
					<a href="http://www.9ask.cn/fa/" target="_blank">商务合作</a> |
					<a href="http://www.9ask.cn/about/shengming.asp" target="_blank">法律声明</a> |
					<a href="http://www.9ask.cn/zhuanti/20090907/" target="_blank">挑错或提意见</a> |
					<a href="http://www.9ask.cn/about/zpxx.asp" target="_blank">诚征英才</a> |
					<a href="http://www.9ask.cn/link/lj.asp" target="_blank">欢迎合作</a> |
					<a onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.9ask.cn');" href="#">设为首页</a> |
					<a href="#" onclick="javascript:window.external.addFavorite('http://www.9ask.cn','中顾法律网');" style="border: 0pt none;">加入收藏</a>
			</div>
		</div>
		<div class="footer_5">
				中顾法律网版权所有 Copyright 2005-2015国家信息产业部备案 <a href="http://www.miibeian.gov.cn/"><span>鲁ICP备05047375</span></a><br>网站使用帮助QQ群:27971708　客服热线:0531-55511555　客服邮箱:<a href="mailto:kefu01@9ask.com">kefu01@9ask.com</a>
		</div>
	</div>
</div>
</body>
</html>
<?php cs()->registerCoreScript('jquery');?>
<?php cs()->registerScriptFile(resBu('scripts/jquery.tools.min.js'), CClientScript::POS_END);?>
<?php cs()->registerScriptFile(resBu('scripts/common.js'), CClientScript::POS_END);?>
<script src="http://www.google-analytics.com/urchin.js"  type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-390261-1";
urchinTracker();
</script>