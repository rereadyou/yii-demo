<? //<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
/*==================================================================
*\   ����JS������  1.0��  
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
if($_GET[action]=="edit_type"){
	head("��ӷ���");
	if($datacon){
		$strdata='';
		for($i=0;$i<count($datacon);$i++){
			if($datacon[$i]!="" and $dataid[$i]!=""){$strdata.=$datasort[$i]."��".$dataid[$i]."��".$datacon[$i]."\r\n";}
		}
		chjia_file($strdata,$dbtpye);
		isok("������Ŀ�ɹ���");
	}
	$str="";
	$tpye_tmp=@file($dbtpye);
	array_multisort ($tpye_tmp);
	for($i=0;$i<count($tpye_tmp);$i++){
	$tpye=explode("��",$tpye_tmp[$i]);
	$u[]=$tpye[1];
	$str.="����ID��<input name='dataid[]' type='text' value='$tpye[1]' size=2 readonly> �������ƣ�<input name='datacon[]' type='text' value='$tpye[2]'>  ����<input name='datasort[]' type='text' value='$tpye[0]' size=2 ><br>";
	}
?><script language=javascript>
var i=<?php echo max($u)+1;?>;
function addinput()
{showinput.insertAdjacentHTML('beforeEnd','����ID��<input name="dataid[]" type="text" value="'+i+'" size=2 > �������ƣ�<input name="datacon[]" type="text" value=""> ����<input name="datasort[]" type="text" value="1" size=2 ><br>');i=i+1;}
</script>

<form action="?action=edit_type" method="post" name="adform"><?php echo $str;?>

<div id=showinput></div>
<input type=button onclick="addinput()" value='���ӷ���'><br />˵���������ֵԽСԽ��ǰ������IDԭ���ϲ����޸ģ����Ӳ����Ҫ�޸ĵĻ������<?php echo $dbtpye;?>�����޸Ĳ����档
<br />ɾ������ֻ�轫���������ơ�Ϊ�ռ���
<br /><br />
<input type="submit" name="action" value="�޸�" class="botton"> <input type="reset" value="����" class="botton" name="reset">
<input type="button" value="������һҳ" onClick="javascript:history.back(-1);" class='botton'></form>
<?php
foot();
}


if($_POST[action]=="ɾ��"){
head("ɾ�����");
$msg="";
$tmp=explode("|www_chjia_com|",file_get_contents($dbtable));
$len=count($tmp)-1;
for($i=0;$i<$len;$i++){
$info=explode("|chjia_com|",$tmp[$i]);
if($info[0]==$_POST[id]){continue;}
$tmp[$i]="$tmp[$i]|www_chjia_com|";
$msg.=$tmp[$i];}
chjia_file($msg,$dbtable);
unlink("$addata/$id.js");isok('ɾ�����ɹ�!');fclose($fp);
}
	/*��������JS*/
if($_REQUEST[action]=="makejs"){
//echo "<xmp>";
$msg=""; 
$echoid="";  
$tmp=explode("|www_chjia_com|",file_get_contents($dbtable));
$len=count($tmp);      //ȡ������
 /*����JS */	//echo "$info[0] ** $info[1] ** $info[2] ** $info[3]\n________________________________\n";
 if($alljs){
	for($i=0;$i<$len;$i++){
	$tmp[$i] = trim($tmp[$i]);
	if($tmp[$i] == "") continue;
	$info=explode("|chjia_com|",$tmp[$i]); 
	$echoid.="$addata/$info[0].js <br>";
	if($info[1]=="��HTML"){
	$data=chj_thu($info[2],"$addata/$info[0].js");
	}else{
	chjia_file($info[2],"$addata/$info[0].js");
	}
 }
 }else{
 	for($i=0;$i<$len;$i++){
	$tmp[$i] = trim($tmp[$i]);
	if($tmp[$i] == "") continue;
	$info=explode("|chjia_com|",$tmp[$i]); 
 	/*JS��ID*/
 	$tcount=count($_REQUEST['idjs']);
	for($j=0;$j<=$tcount;$j++){
    	$idjs=$_REQUEST['idjs'][$j];
		//echo "$idjs\n";
			if($info[0]==$idjs){  
				$echoid.="$addata/$info[0].js <br>";
					if($info[1]=="��HTML"){
						chj_thu($info[2],"$addata/$info[0].js");
						}else{
						chjia_file($info[2],"$addata/$info[0].js");
						}
			}
		}
	}
}
isok("��������ID��JS�ɹ���<p>$echoid");
}
/*��������JS����*/

if($_POST["action"]!=""){

$data=StripSlashes($data);
$msg="";   
$tmp=explode("|www_chjia_com|",file_get_contents($dbtable));
$len=count($tmp);     //ȡ������
for($i=0;$i<$len;$i++){
$tmp[$i] = trim($tmp[$i]);
if($tmp[$i] == "") continue;
$info=explode("|chjia_com|",$tmp[$i]);  
if($info[0]==$_POST[id]){  
$msgk=array($id,$nx,$data,$notice,$gge,$type_id);
$msgk2 = implode("|chjia_com|",$msgk);
$msg.=$msgk2."|www_chjia_com|";
continue;
}
$rows=$tmp[$i];
$msg.=$rows."|www_chjia_com|";
}
//die("<xmp>".$data);
chjia_file($msg,$dbtable);

if($nx=="��HTML"){
	chj_thu($data,"$addata/$id.js");
	}else{
	chjia_file($data,"$addata/$id.js");
	}
head();
echo "<meta HTTP-EQUIV=\"REFRESH\" CONTENT='5;URL=admin.php?action=edit&id=$_POST[id]'><center><br><br>�޸ĸù��ɹ�!<br><a href='admin.php?action=edit&id=$_POST[id]'>�����޸ĸ�JS�ļ�</a>&nbsp;&nbsp;<a href='./'>����JS������ҳ </a><br><br><br><br>";
foot();
//isok('�޸Ĺ��ɹ�!');
}

if($_GET[action]=="del"){
head("ɾ�����");
echo <<<CHJIA
<form action="$PHP_SELF" method="post">
<table cellspacing=1 cellpadding=3 width=50% bgcolor="#000000" class="fonts" align="center" name="passwd">
  <tr bgcolor="#99CC66"> 
    <td height="11" align="center" bgcolor="#999999" class="mycss"> 
      <div align="center" class="style1"><> ɾ�����</div>    </td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td align="center" class="mycss"> 
        <div align="center">
          <p><br>
            ������������ɾ�������ô������ҳ�ϵĴ��룬���鲻Ҫɾ����</p>
          <p>��ȷ��Ҫɾ��IDΪ <font color="#FF0000">$id</font> �Ĺ����??</p>
        </div>        
        <div align="center"> <br>
		  <input type="hidden" name=id value=$id>
          <input type="submit" name="action" value="ɾ��" class="botton" >
		  <input type="button" value="��ɾ����������һҳ" onClick="javascript:history.back(-1);" class='botton'>
          <br>
      </div></td>
  </tr>
</table>
</form>
CHJIA;
foot();
}





if($_GET[action]=="edit"){
//_________________________
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
if(!$chj_nr){error("����û�иù���?");}
$tmp=explode("|chjia_com|",$chj_nr);  
}
$tmp[2]=str_replace("&","&amp;",$tmp[2]);
if(get_magic_quotes_gpc())StripSlashes($tmp[2]);
head('�޸Ĺ��');
?><br><br><form action="<? echo $PHP_SELF; ?>" method="post" name="adform">
<table cellspacing=1 cellpadding=3 width=700 bgcolor="#000000" class="fonts" align="center">
  <tr bgcolor="#9999ff">
    <td height="11" align="center" bgcolor="#999999" class="mycss"><div align="center"><font color="#000000">::::�޸Ĺ��::::</font> <a href="./" target="_self">���ع���</a></div></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF" class="mycss"><div align="left">
        <table width="700" border="1" cellpadding="3" cellspacing="0" bgcolor="#CCCCCC">
          <tr>
            <td width="16%">���ID��<font color="#FF0000">*</font><br>
                <br>
            </td>
            <td width="84%"><input  name="id" type="TEXT"   class="input" id="id" value="<?=$tmp[0]?>" size="25" maxlength="30" readonly> 
            ���ID�����޸ģ�</td>
          </tr>
          <tr>
            <td>�����������<font color="#FF0000">*</font>&nbsp;&nbsp; </td>
            <td><select name="type_id">
<?php
	$tpye_tmp=@file($dbtpye);
	for($i=0;$i<count($tpye_tmp);$i++){
	$tpye=explode("��",$tpye_tmp[$i]); 
	if($tpye[1]==$tmp[5]){$tmp_str=" style=\"background-color:#DDDDDD\" selected='selected' ";}else{$tmp_str="";}
	echo "<option value=\"$tpye[1]\" $tmp_str>($tpye[1])$tpye[2]</option>";
	}
	?></select> 
            (ԭID��<?echo $tmp[5];?> <a href="?action=edit_type" target="_blank">��ӷ���</a>)            </td>
          </tr> <tr>
            <td>�������<font color="#FF0000">*</font>&nbsp;&nbsp; </td>
            <td><select name="nx" id="nx">
                <option value="�ű�ʽ">�ű�ʽ</option>
                <option value="��HTML" <?php if($tmp[1]=="��HTML") echo "selected";?>>��HTML</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>���(��*��)</td>
            <td><input  name="gge" type="TEXT"   class="input" value="<?=$tmp[4]?>" size="20" maxlength="30"></td>
          </tr>
          <tr>
            <td>�������<font color="#FF0000">*</font></td>
            <td><textarea name="data" cols="80" rows="20" wrap="virtual" class="input" id="data" tabindex="2"><?php echo $tmp[2];?></textarea>
            <br></td>
          </tr>
          <tr>
            <td height="86" valign="top"><p>��ע�ͣ�</p></td>
            <td valign="middle"><textarea name="notice" cols="80" rows="4" wrap="virtual" class="input" id="notice" tabindex="2"><?=$tmp[3]?></textarea>
            </td>
          </tr>
          <tr align="center">
            <td colspan="2"><input type="submit" name="action" value="�޸�" class="botton">
                <input type="reset" value="����" class="botton" name="reset">
                <input type="button" value="������һҳ" onClick="javascript:history.back(-1);" class='botton'></td>
          </tr>
          <tr align="center">
            <td>���ô��룺 </td> <td>HTML��ҳ��ֱ�ӵ��ô���<input name="Input" onfocus="this.select()" value='&lt;script type="text/javascript" src="<?php echo "$folds$addata/$tmp[0]"; ?>.js" charset="gb2312"&gt;&lt;/script&gt;' size="78" /><br />��JS�ļ��л�PHP��ASP�ȴ�����ֱ�ӵ��õ�ת�����
<input name="Input2" onfocus="this.select()" value='&lt;script type=\"text/javascript\" src=\&quot;<?php echo "$folds$addata/$tmp[0]"; ?>.js\&quot; charset=\"gb2312\"&gt;&lt;/script&gt;' size="78" /></td>
          </tr>
        </table>
    </div></td>
  </tr>
 <tr bgcolor="#9999ff">
        <td height="2" align="center" bgcolor="#999999" class="mycss"><font color="#000000">ע��:��</font><font color="#990000"> <font color="#FF0000">*</font> <font color="#000000">�ŵı�����д</font></font></td>
      </tr>
</table>
<br>
<table width=748 align="center" cellpadding=3 cellspacing=1 bgcolor="#999999" class="fonts">
<tr>
      <td width="748" colSpan="5" height="8">����Ԥ���� <a href="data/index.htm?<?php echo "$addata/$tmp[0]"; ?>" target="adm">�´�����Ԥ��</a>
<iframe frameborder=0 width=100% height=100% src="data/index.htm?<?php echo "$addata/$tmp[0]"; ?>"></iframe><div style="OVERFLOW-Y: scroll; OVERFLOW-X: hidden; WIDTH: 100%; HEIGHT: 100px; BACKGROUND-COLOR: #ffffff">
        </div>
      </td>
    </tr>
</table>
<?php
foot();?>