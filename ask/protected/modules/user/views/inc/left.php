<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/css/user/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="zuo">
	<div class="bolck5"></div>
    <div class="zzt"><img src="/images/user/wt_15.gif" /> 个人资料管理</div>
	<div class="jusz"><a href="javascript:openurl('<?php echo url('user/profile/editpsw')?>')">修改帐号密码</a><br />
  <a href="javascript:openurl('<?php echo url('user/profile/editprofilels') ?>')">修改个人资料</a><br />
   <a href="javascript:openurl('<?php echo url('user/profile/uppic') ?>')">上传个人照片</a><br />
   <a href="javascript:openurl('<?php echo url('urlshortcut/get') ?>')">建立桌面图标</a>
        </div>
     <div class="bolck5"></div>
	 <div class="zzt"><img src="/images/user/wt_18.gif" width="20" height="12" /> 网友评论管理</div>
         <div class="jusz"><a href="javascript:openurl('<?php echo url('user/oaskusercomment/lscomment')?>')" >好评/差评</a><br />
             <a href="javascript:openurl('<?php echo url('user/oaskcomment/list')?>')" >网友留言</a></div>
	 <div class="bolck5"></div>
	 <div class="zzt"><img src="/images/user/lsas.gif" width="18" height="18" /> 公开咨询管理</div>
         <div class="jusz"><a href="javascript:openurl('<?php echo url('user/questions/area')?>')" >我所在地区的咨询</a><br />
		<a href="javascript:openurl('<?php echo url('user/questions/zczx')?>')" >专长相关咨询</a><br />
		<a href="javascript:openurl('<?php echo url('user/questions/myanswer')?>')" >我回复的咨询</a><br />
  <a href="javascript:openurl('<?php echo url('user/questions/mybest')?>')" >我被采纳的咨询</a></div>
	   <div class="bolck5"></div>
	 <div class="zzt"><img src="/images/user/wt_22.gif" width="20" height="19" /> 一对一咨询管理</div>
	 <div class="jusz"><a href="javascript:openurl('<?php echo url('user/message/askme')?>')" >我的最新一对一咨询</a><br />
     <a href="javascript:openurl('<?php echo url('user/message/yjd')?>')" >我已解答的咨询</a></div>
	    <div class="bolck5"></div>
	 <div class="zzt"><img src="/images/user/wt_31.gif" width="20" height="17" /> 案件委托管理</div>
	 <div class="jusz">	 
	 	<a href="javascript:openurl('<?php echo url('user/zgwt/list',array('t'=>area))?>')" >我所在地区的案件委托</a><br />
     	<a href="javascript:openurl('<?php echo url('user/zgwt/list',array('t'=>'own'))?>')">我接洽过的案件委托</a>
     </div>
	 <div class="zzt">
	 	<img src="/images/user/ls4.gif" width="18" height="15" /> 个人网站管理
	 </div>
	 <div class="bolck10"></div>
         <div class="zzt"><img src="/images/user/wt_45.gif" width="20" height="18" />
         <a href="javascript:openurl('<?php echo url('user/usercomment')?>')">问题反馈</a></div>
	 <div class="bolck10"></div>
</div>
<script type="text/javascript">
function openurl(url){
	var mymain = window.parent.document.getElementById('mymain');
	mymain.src = url;
}
</script>
</body>
</html>
