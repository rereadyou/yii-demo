<?php //<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
include_once"data/config.php";
if($adminurl){
include_once "{$adminurl}/config.php";
}else{
$codess=$_SERVER['QUERY_STRING'];
//$adminfile=$_SERVER["PHP_SELF"]; 
$adminfile="?s=show"; //若想显示菜单则要加“$s="show"”
	if(!$tc)$tc=$_REQUEST[tc];
	if(!$s)$s=$_REQUEST[s];
	if($tc=="tc"){ SetCookie("admin2", ""); echo "恭喜您，您已经安全退出系统了！"; exit;}
if($_COOKIE["admin2"]){
	//登陆成功提示
	if($s=="show"){
print <<<EOD
<a href="index.php">返回广告管理</a>
EOD;
}
}else{
$admin1=$_REQUEST[admin1];
$admin2=$_REQUEST[admin2];
if($codess==$safecode){
	if($adminname==$admin1 and $adminword==$admin2){	
	SetCookie("admin2",$adminword); 
	Header("Location:$adminfile");
	}else{
print <<<EOD
<title>登陆管理</title><link rel="stylesheet" type="text/css" href="gr/css.css"><div align="center"><center><table width="200" height="100%" border="0" cellpadding="0" cellspacing="0"><tr><td><form method="POST" action=""><table border="0" width="299" cellspacing="1" cellpadding="2" bgcolor="#55AAFF" height="180"><tr><td width="293" colspan="2" bgcolor="#000080" height="20"><b><font color="#FFFFFF">后台登陆管理</font></b></td></tr><tr><td width="293" colspan="2" height="20">您好！请输入管理用户名和管理密码登陆管理页</td></tr><tr><td width="120" bgcolor="#FFFFFF" height="25">管理员帐号：</td><td width="169" bgcolor="#FFFFFF" height="25">
	<input type="text" name="admin1" size="16"></td></tr><tr><td width="120" bgcolor="#FFFFFF" height="25">管理员密码：</td><td width="169" bgcolor="#FFFFFF" height="25"><input type="password" name="admin2" size="16"></td></tr><tr><td width="293" colspan="2" bgcolor="#FFFFFF" align="center" height="25"><input type="submit" value="  登 陆  " name="B1"></td></tr><tr><td width="293" colspan="2" bgcolor="#FFFFFF" align="right" height="35"><br><img src="images/lianxi.gif" width="9" height="10">程序制作：<a href="http://std.chjia.com" target="_blank">蒲涛 @ 创佳工作室</a></td></tr></table></form><br></td></tr></table></center></div>
EOD;
exit();
}
}else {
print <<<EOD
<title>登陆管理</title><link rel="stylesheet" type="text/css" href="gr/css.css"><div align="center"><center><table width="200" height="100%" border="0" cellpadding="0" cellspacing="0"><tr><td><form method="POST" action=""><table border="0" width="299" cellspacing="1" cellpadding="2" bgcolor="#55AAFF" height="180"><tr><td width="293" colspan="2" bgcolor="#000080" height="20"><b><font color="#FFFFFF">后台登陆管理</font></b></td></tr><tr><td width="293" colspan="2" height="20">您好！请输入管理用户名和管理密码登陆管理页</td></tr><tr><td width="120" bgcolor="#FFFFFF" height="25">管理员帐号：</td><td width="169" bgcolor="#FFFFFF" height="25">
	<input type="text" name="adminuser" size="16"></td></tr><tr><td width="120" bgcolor="#FFFFFF" height="25">管理员密码：</td><td width="169" bgcolor="#FFFFFF" height="25"><input type="password" name="adminpw" size="16"></td></tr><tr><td width="293" colspan="2" bgcolor="#FFFFFF" align="center" height="25"><input type="submit" value="  登 陆  " name="B1"></td></tr><tr><td width="293" colspan="2" bgcolor="#FFFFFF" align="right" height="35"><br><img src="images/lianxi.gif" width="9" height="10">程序制作：<a href="http://std.chjia.com" target="_blank">蒲涛 @ 创佳工作室</a></td></tr></table></form><br></td></tr></table></center></div>
EOD;
exit();
}
}
}