<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>中顾网一对一咨询管理</title>

<LINK href="http://www.9ask.cn/usersite/img/user.css" type="text/css" rel="stylesheet">
<link href="http://www.9ask.cn/usersite/common/styleMain.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<body>

<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:5px">
  <tr>
    <td width="23%" height="23" bgcolor="#FFCC00">&nbsp;<a href="/user" target="_top">中顾网用户中心</a>-&gt;一对一咨询：</td>
    <td width="77%" bgcolor="#FFCC00"><a href="../search/findindex.asp"><strong><font color="#CC0000">点此免费一对一咨询</font></strong></a></td>
  </tr>
</table>
<table width="98%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#A4C8FF" style="margin-top:3px">
<tr><td colspan=2 height=24 align=center><b>一 对 一 咨 询</b></td></tr>
<tr>
<td colspan=2 height=24 align=center bgcolor=#FFFFFF>
[<a href="user_oneMessage.asp">全部咨询</a>]
[<a href="user_oneMessage.asp?Action=1">我收到的咨询</a>]
[<a href="user_oneMessage.asp?Action=2">我发布的咨询</a>]</td>
</tr>
<tr  height="24" bgcolor="#FFFFFF">
<td  align="right" width="13%">标　　题：</td>
<td width="87%"><?php echo $questions->Title;?></td>
</tr>
<tr height="24" bgcolor="#FFFFFF">
<td align="right">收 件 人：</td>
<td>
聂先生</td>
</tr>
<tr height="24" bgcolor="#FFFFFF">
<td align="right">发 件 人：</td>
<td>
<?php echo $questions->oaskuser->name;?></td>
</tr>
<tr height="24" bgcolor="#FFFFFF">
<td align="right">发布时间：</td>
<td><?php echo $questions->AddDate;?></td>
</tr>
<tr height="24" bgcolor="#FFFFFF">
<td align="right">留言内容：</td>
<td><?php echo $questions->Content;?></td>
</tr>
<tr height="24" bgcolor="#FFFFFF">
<td align="right">ip地址：</td>
<td><?php echo $questions->oaskuser->LastIP;?>(山东-济南)
</td>
</tr>
<tr><td colspan=2 height=24 align=center><b>补 充 回 复</b></td></tr>

 <?php
 foreach($questions_answer as $k=>$v){
 ?>
 
<tr height="24" bgcolor="#FFFFFF">
<td align="right" width="13%">回 复 人：</td>
<td>
<?php echo (empty ($v->oaskuser->TrueName))?"暂无姓名":$v->oaskuser->TrueName?></td>
</tr>
<tr height="24" bgcolor="#FFFFFF">
<td align="right">回复时间：</td>
<td><?php echo $v->ReplyDate?></td>
</tr>
<tr height="24" bgcolor="#FFFFFF">
<td align="right">回复内容：</td>
<td><?php echo  $v->Content ?></td>
</tr>
<tr><td colspan=2 height=10></td></tr>
 
<?php
 }
?>
<tr><td colspan=2 height=24 align=center><a name=Reply><b>发 表 回 复</b></a></td></tr>
<form name="form1" method="post" action="index.php?r=message/SaveAnswerMessage&id=<?php echo $questions->ID;?>">
<tr height="24" bgcolor="#FFFFFF">
<td width="13%" align="right">回复内容：</td>
<td>
<input name="i" type="hidden" size="5" value="1">
<input name="LawID" type="hidden" size="5" value="">
<input name="FatherID" type="hidden" size="5" value="<?php echo $questions->ID?>">

<input name="U" type="hidden" size="5" value="1">
<input name="SenderID" type="hidden" size="5" value="<?php echo $questions->oaskuser->ID?>">
<input name="AddresseeID" type="hidden" size="5" value="0">


<SCRIPT language=JavaScript>
<!-- Begin
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit)
field.value = field.value.substring(0,maxlimit);
else
countfield.value = maxlimit - field.value.length;
}
// End -->
</SCRIPT>
<textarea name="Content" cols="65" rows="10" onkeydown=textCounter(this.form.Content,this.form.remLen,500); onkeyup=textCounter(this.form.Content,this.form.remLen,500);></textarea>
<BR><font color="#FF0000">共可输入500字，还剩 <INPUT class=editbox1 readOnly maxLength=3 size=3 value=500
name=remLen> 字。</font>
<a href="&1170797" target=_blank>咨询 <b>聂先生 </b>新问题请点击这里</a></td>
</tr>
<tr height="24" bgcolor="#FFFFFF">
<td align="right"></td>
<td>
<input type="submit" name="Submit" value="提交发布"></td>
</tr>
</form>
</table>


</body>
</html>
