<?php
/*================================================================== 
*\   ����PHPTXT���Ա�  1.0��  
*\------------------------------------------------------------------  
*\    Copyright(C) www.chjia.com, 2006. All rights reserved  
*\------------------------------------------------------------------  
*\    ��ҳ:http://www.chjia.com   
*\------------------------------------------------------------------  
*\    ������Ϊ��ѳ���,Դ����ʹ���߿��������,���뱣������Ȩ��Ϣ!  
*\------------------------------------------------------------------  
*\=================================================================*/ 
include("data/config.php");
include("log.php");
if($_REQUEST['action']=="�ύ"){
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
if($chj_nr!=""){error("�ù��ID�Ѿ����ڣ��뻻һ���ɡ�");}
if($data=="" or $id==""){
die("ID��������Ϊ�գ�");
}

$data=StripSlashes($data);
$fp=fopen("$dbtable","a+");
$all.="$id|chjia_com|$nx|chjia_com|$data|chjia_com|$notice|chjia_com|$gge|chjia_com|$type_id|www_chjia_com|";

@fputs($fp,$all) or die(error('д����Ϣʱ����!'));
if(!is_dir($addata)){mkdir($addata,0777) or die(error('�޷�����{$addata}�ļ��У���FTP�ֹ�������������������Ϊ0777!'));}
if($nx=="��HTML"){
	$data=chj_thu($data,"$addata/$id.js");
	}else{
	chjia_file($data,"$addata/$id.js");
	}
isok("��ӹ��ɹ�!���Ե�...");
}
head('��ӹ��');
?>
<form action="<? echo $PHP_SELF; ?>" method="post" name="adform">
  <table cellspacing=1 cellpadding=3 width=700  class="fonts" align="center">
  <tr> 
    <td height="11" align="center" bgcolor="#999999" class="mycss"> 
    <div align="center" class="style1">::::��ӹ��:::: <a href="./" target="_self">���ع���</a></div>
    </td>
  </tr>
  <tr> 
    <td align="center" bgcolor="#FFFFFF" class="mycss"> 
    <div align="left"> 
      <table width="100%" border="1" cellpadding="3" cellspacing="0" bgcolor="#CCCCCC">
      <tr> 
        <td width="16%">���ID��<font color="#FF0000">*</font><br>          
          <br>          </td>
        <td width="84%"> 
          <input  name="id" type="TEXT"   class="input" id="id" size="25" maxlength="30">
</td>
      </tr> <tr>
            <td>�����������<font color="#FF0000">*</font>&nbsp;&nbsp; </td>
            <td><select name="type_id">
<?php
	$tpye_tmp=@file($dbtpye);
	array_multisort ($tpye_tmp);
	for($i=0;$i<count($tpye_tmp);$i++){
	$tpye=explode("��",$tpye_tmp[$i]); 
	if($tpye[1]==$tmp[5]){$tmp_str=" style=\"color:#FFFFFF; background-color:#228822\" selected='selected' ";}else{$tmp_str="";}
	echo "<option value=\"$tpye[1]\" $tmp_str>($tpye[1])$tpye[2]</option>";
	}
	?></select> [<a href="?action=edit_type" target="_blank">��ӷ���</a>]
            </td>
          </tr> 
      <tr> 
        <td height="14">�������<font color="#FF0000">*</font>&nbsp;&nbsp; </td>
        <td height="14">
          <select name="nx" id="nx"><option value="��HTML">��HTML</option><option value="�ű�ʽ">�ű�ʽ</option>
          </select> 
          HTML�еĻ��з����ᱻʡ�Ե���</td>
      </tr>
      <tr> 
        <td>���(��*��)</td>
        <td><input  name="gge" type="TEXT"   class="input" id="id" value="X" size="20" maxlength="30"></td> 
      </tr>
      <tr> 
        <td height="76" valign="top">
        <p>�������<font color="#FF0000">*</font></p>        </td>
        <td valign="middle"><textarea name="data" cols="80" rows="20" wrap="virtual" class="input" id="data" tabindex="2"></textarea> 
        </td> 
      </tr>
			<tr>
			  <td height="30">��ע�ͣ�</td>
		      <td height="30"><textarea name="notice" cols="80" rows="4" wrap="virtual" class="input" id="notice" tabindex="2"></textarea></td>
			</tr>
			<tr align="center">
			  <td height="30" colspan="2"><input type="submit" name="action" value="�ύ" class="botton">
                <input type="reset" value="����" class="botton" name="reset">
                <input type="button" value="������һҳ" onClick="javascript:history.back(-1);" class='botton'></td>
		    </tr>
      </table>
    </div>
    </td>
  </tr>
  <tr> 
    <td height="2" align="center" bgcolor="#999999" class="mycss"> 
    <div align="left"><font color="#000000">ע��:��</font><font color="#990000"> 
      <font color="#FF0000">*</font> <font color="#000000">�ŵı�����д</font></font></div>
    </td>
  </tr>
  </table>
</form>
<?php foot(); ?>