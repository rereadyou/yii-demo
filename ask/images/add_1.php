<?php
/*================================================================== 
*\   创佳PHPTXT留言本  1.0版  
*\------------------------------------------------------------------  
*\    Copyright(C) www.chjia.com, 2006. All rights reserved  
*\------------------------------------------------------------------  
*\    主页:http://www.chjia.com   
*\------------------------------------------------------------------  
*\    本程序为免费程序,源代码使用者可任意更改,但请保留本版权信息!  
*\------------------------------------------------------------------  
*\=================================================================*/ 
include("data/config.php");
include("log.php");
if($_REQUEST['action']=="提交"){
$msgd=explode("|www_chjia_com|",file_get_contents($dbtable)); 
$rows=count($msgd);  
for ($i=0;$i<=$rows;$i++){
$tmp2=explode("|chjia_com|",$msgd[$i]);  
$msgn[$i]=$tmp2[0];
//echo $msgn[$i];
if(eregi("^$id$",$msgn[$i])){
$chj_nr=$msgd[$i];
}
}
if($chj_nr!=""){error("该广告ID已经存在，请换一个吧。");}
if($data=="" or $id==""){
die("ID或者内容为空！");
}

$data=StripSlashes($data);
$fp=fopen("$dbtable","a+");
$all.="$id|chjia_com|$nx|chjia_com|$data|chjia_com|$notice|chjia_com|$gge|chjia_com|$type_id|www_chjia_com|";

@fputs($fp,$all) or die(error('写入信息时出错!'));
if(!is_dir($addata)){mkdir($addata,0777) or die(error('无法建立{$addata}文件夹，请FTP手工建立，并更改其属性为0777!'));}
if($nx=="纯HTML"){
	$data=chj_thu($data,"$addata/$id.js");
	}else{
	chjia_file($data,"$addata/$id.js");
	}
isok("添加广告成功!请稍等...");
}
head('添加广告');
?>
<form action="<? echo $PHP_SELF; ?>" method="post" name="adform">
  <table cellspacing=1 cellpadding=3 width=700  class="fonts" align="center">
  <tr> 
    <td height="11" align="center" bgcolor="#999999" class="mycss"> 
    <div align="center" class="style1">::::添加广告:::: <a href="./" target="_self">返回管理</a></div>
    </td>
  </tr>
  <tr> 
    <td align="center" bgcolor="#FFFFFF" class="mycss"> 
    <div align="left"> 
      <table width="100%" border="1" cellpadding="3" cellspacing="0" bgcolor="#CCCCCC">
      <tr> 
        <td width="16%">广告ID：<font color="#FF0000">*</font><br>          
          <br>          </td>
        <td width="84%"> 
          <input  name="id" type="TEXT"   class="input" id="id" size="25" maxlength="30">
</td>
      </tr> <tr>
            <td>广告所属分类<font color="#FF0000">*</font>&nbsp;&nbsp; </td>
            <td><select name="type_id">
<?php
	$tpye_tmp=@file($dbtpye);
	array_multisort ($tpye_tmp);
	for($i=0;$i<count($tpye_tmp);$i++){
	$tpye=explode("｜",$tpye_tmp[$i]); 
	if($tpye[1]==$tmp[5]){$tmp_str=" style=\"color:#FFFFFF; background-color:#228822\" selected='selected' ";}else{$tmp_str="";}
	echo "<option value=\"$tpye[1]\" $tmp_str>($tpye[1])$tpye[2]</option>";
	}
	?></select> [<a href="?action=edit_type" target="_blank">添加分类</a>]
            </td>
          </tr> 
      <tr> 
        <td height="14">广告类型<font color="#FF0000">*</font>&nbsp;&nbsp; </td>
        <td height="14">
          <select name="nx" id="nx"><option value="纯HTML">纯HTML</option><option value="脚本式">脚本式</option>
          </select> 
          HTML中的换行符将会被省略掉。</td>
      </tr>
      <tr> 
        <td>规格(宽*高)</td>
        <td><input  name="gge" type="TEXT"   class="input" id="id" value="X" size="20" maxlength="30"></td> 
      </tr>
      <tr> 
        <td height="76" valign="top">
        <p>广告内容<font color="#FF0000">*</font></p>        </td>
        <td valign="middle"><textarea name="data" cols="80" rows="20" wrap="virtual" class="input" id="data" tabindex="2"></textarea> 
        </td> 
      </tr>
			<tr>
			  <td height="30">简单注释：</td>
		      <td height="30"><textarea name="notice" cols="80" rows="4" wrap="virtual" class="input" id="notice" tabindex="2"></textarea></td>
			</tr>
			<tr align="center">
			  <td height="30" colspan="2"><input type="submit" name="action" value="提交" class="botton">
                <input type="reset" value="重填" class="botton" name="reset">
                <input type="button" value="返回上一页" onClick="javascript:history.back(-1);" class='botton'></td>
		    </tr>
      </table>
    </div>
    </td>
  </tr>
  <tr> 
    <td height="2" align="center" bgcolor="#999999" class="mycss"> 
    <div align="left"><font color="#000000">注意:带</font><font color="#990000"> 
      <font color="#FF0000">*</font> <font color="#000000">号的必须填写</font></font></div>
    </td>
  </tr>
  </table>
</form>
<?php foot(); ?>