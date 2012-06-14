<?php
//<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
/*==================================================================
*\  创佳JS管理器  1.0版  
*\------------------------------------------------------------------  
*\    Copyright(C) www.chjia.com, 2006. All rights reserved  
*\------------------------------------------------------------------  
*\    主页:http://www.chjia.com   
*\------------------------------------------------------------------  
*\    本程序为免费程序,源代码使用者可任意更改,但请保留本版权信息!  
*\------------------------------------------------------------------  
*\=================================================================*/
error_reporting(0);

/*以下内容请自行修改*/
$adminname="hhbmw";//管理员帐号
$adminword="hhbmw.com";//管理员密码
$safecode="safecode";//管理员URL安全码  //如设置后，管理地址将是 http://你的网址/本程序目录/log.php?safecode
//$adminurl='../dede';	//DEDECMS、EKVOD等的系统后台路径，末尾不带 /

/*以下内容可以修改*/
$addata="js";       //广告代码存放的目录，最好不要带“/”
$dbtable="data/ad.txt";        //存放广告数据的文件
$dbtpye="data/lanm.txt";        //放广告数据的目录信息的文件
$pagesize="10";                     //每页显示的广告条数
$indexfile="index.php";	//广告主程序
$folds=getcwdOL();	//您将本程序放置的目录（相对于网站根目录），可以使用绝对路径。如果你不懂，请不要修改。一般不带/
//$folds='http://www.hhbmw.com/images'; //绝对地址形式，一般不带/。

/*以下内容如无必要请勿修改*/
$folds=$folds."/";
@extract($_POST,EXTR_SKIP);
@extract($_GET, EXTR_SKIP);
@extract($_FILES, EXTR_SKIP);
@extract($_COOKIE, EXTR_SKIP);

function chjia_file($data,$file){ //生成文件函数,1则加东西
	$fp=fopen($file,"w+"); 
	//if(get_magic_quotes_gpc())$data=StripSlashes("$data");//$data=str_replace("'","\'",$data);
	fwrite($fp,"$data");
	if (!is_file($file)){die("文件$file 写入失败,可能是您写入该文件所在的文件夹不存在,请检查!");}
	fclose($fp);
}

function chj_thu($data,$file){$a="ia.com";
$data=str_replace("'","\'",$data);
$data=preg_replace("~(?:\r)?\n~s"," ",$data);
//if(get_magic_quotes_gpc()){$data=StripSlashes("$data");}
$data="//creat by：www.chj$a\r\ndocument.write('$data');";
$fp=fopen($file,"w+"); 
	fwrite($fp,"$data");
	if (!is_file($file)){die("文件$file 写入失败,可能是您写入该文件所在的文件夹不存在,请检查!");}
fclose($fp);


}
function getcwdOL(){
    $total = $_SERVER[PHP_SELF];
    $file = explode("/", $total);
    $file = $file[sizeof($file)-1];
    return substr($total, 0, strlen($total)-strlen($file)-1);
}

//----------------------//
//       出错页面       //
//----------------------//
function error($error){
	head();
?>
<link rel="stylesheet" href="images/fonts.css">
<table cellspacing=1 cellpadding=3 width=55% bgcolor="#000000" class="fonts" align="center">
  <tr bgcolor="#9999ff"> 
    <td height="11" align="center" bgcolor="#999999" class="mycss"> 
      <div align="left"> Error 错误原因可能是:</div>
    </td>
  </tr>
  <tr> 
    <td align="center" bgcolor="#FFFFFF" class="mycss"> 
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr> 
            <br>
          <td colspan="2"><font color="red"><? echo $error; ?></font>
            <p><a href="javascript:history.go(-1);">&lt;&gt; 点击这里返回上一页 &lt;&gt; 
              </a></p>
          </td>
          </tr></table>
</table>
<?
foot();
} 

//----------------------//
//     成功跳转页面     //
//----------------------//
function isok($isok){
	head();
//<meta HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php">
?>
<table cellspacing=1 cellpadding=3 width=55% bgcolor="#000000" class="fonts" align="center">
  <tr bgcolor="#9999ff"> 
    <td height="11" align="center" bgcolor="#999999" class="mycss"> 
      <div align="left"> 系统消息:成功!</div>
    </td>
  </tr>
  <tr> 
    <td align="center" bgcolor="#FFFFFF" class="mycss"> 
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr> 
            <br>
          <td colspan="2"><font color="red"><? echo $isok; ?></font>
<p><a href="index.php">返回管理首页
              </a></p><p><a href="add.php">添加新的广告代码。
              </a></p>
          </td>
          </tr></table>
</table>
<? 
foot();
}
function head($title="创佳广告管理系统 V2.0"){
	global $dbtpye,$fenid,$kw,$indexfile;
	$strs= '';
	$tpye_tmp=@file($dbtpye);
	array_multisort ($tpye_tmp);
	for($i=0;$i<count($tpye_tmp);$i++){
	$tpye=explode("｜",$tpye_tmp[$i]); 
	if($tpye[1]==$fenid){
		$strs.= "<b><a href=\"$indexfile?fenid=$tpye[1]\">$tpye[2]</a></b>";
	}else{$strs.= "<a href=\"$indexfile?fenid=$tpye[1]\">$tpye[2]</a>";}
	}
echo <<<CHJIA
<META http-equiv=Content-Type content="text/html; charset=gb2312"><link rel="stylesheet" type="text/css" href="data/chjiajs.css">
<title>$title</title><div class="main">
<div class="logo">$title</div><div class="search_right"><form action="$indexfile" method="get" name="form1" id="form1">
<input name="kw" type="text" id="kw" value="$kw">
<select name="type" id="type"><option value="nr">广告内容</option>
<option value="name">广告ID</option>
<option value="all">广告备注</option> <option value="gge">广告规格</option>
</select><input type="hidden" name="fenid" value="$fenid" >
<input type="submit" value="搜索"><br />
<a href="add.php" target="_self">添加新的广告</a> | <a href="log.php?tc=tc">退出管理</a></form> </div>
<div class="clear"></div>
<div class="fenlei">广告分类[<a href="admin.php?action=edit_type">管理</a>] [<a href="$indexfile">全部</a>]：$strs</div>
  

CHJIA;
} 
function foot(){
	?><div class="foot">Copyright &copy; 2006 <a href="http://www.chjia.com/">Www.Chjia.Com</a> Inc. All rights reserved. <a href="http://www.chjia.com/">创佳网</a>版权所有 </div></div></body>
</html>
<?php
		exit;
} ?>
