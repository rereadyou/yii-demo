<?php
//<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
/*==================================================================
*\  ����JS������  1.0��  
*\------------------------------------------------------------------  
*\    Copyright(C) www.chjia.com, 2006. All rights reserved  
*\------------------------------------------------------------------  
*\    ��ҳ:http://www.chjia.com   
*\------------------------------------------------------------------  
*\    ������Ϊ��ѳ���,Դ����ʹ���߿��������,���뱣������Ȩ��Ϣ!  
*\------------------------------------------------------------------  
*\=================================================================*/
error_reporting(0);

/*���������������޸�*/
$adminname="hhbmw";//����Ա�ʺ�
$adminword="hhbmw.com";//����Ա����
$safecode="safecode";//����ԱURL��ȫ��  //�����ú󣬹����ַ���� http://�����ַ/������Ŀ¼/log.php?safecode
//$adminurl='../dede';	//DEDECMS��EKVOD�ȵ�ϵͳ��̨·����ĩβ���� /

/*�������ݿ����޸�*/
$addata="js";       //�������ŵ�Ŀ¼����ò�Ҫ����/��
$dbtable="data/ad.txt";        //��Ź�����ݵ��ļ�
$dbtpye="data/lanm.txt";        //�Ź�����ݵ�Ŀ¼��Ϣ���ļ�
$pagesize="10";                     //ÿҳ��ʾ�Ĺ������
$indexfile="index.php";	//���������
$folds=getcwdOL();	//������������õ�Ŀ¼���������վ��Ŀ¼��������ʹ�þ���·��������㲻�����벻Ҫ�޸ġ�һ�㲻��/
//$folds='http://www.hhbmw.com/images'; //���Ե�ַ��ʽ��һ�㲻��/��

/*�����������ޱ�Ҫ�����޸�*/
$folds=$folds."/";
@extract($_POST,EXTR_SKIP);
@extract($_GET, EXTR_SKIP);
@extract($_FILES, EXTR_SKIP);
@extract($_COOKIE, EXTR_SKIP);

function chjia_file($data,$file){ //�����ļ�����,1��Ӷ���
	$fp=fopen($file,"w+"); 
	//if(get_magic_quotes_gpc())$data=StripSlashes("$data");//$data=str_replace("'","\'",$data);
	fwrite($fp,"$data");
	if (!is_file($file)){die("�ļ�$file д��ʧ��,��������д����ļ����ڵ��ļ��в�����,����!");}
	fclose($fp);
}

function chj_thu($data,$file){$a="ia.com";
$data=str_replace("'","\'",$data);
$data=preg_replace("~(?:\r)?\n~s"," ",$data);
//if(get_magic_quotes_gpc()){$data=StripSlashes("$data");}
$data="//creat by��www.chj$a\r\ndocument.write('$data');";
$fp=fopen($file,"w+"); 
	fwrite($fp,"$data");
	if (!is_file($file)){die("�ļ�$file д��ʧ��,��������д����ļ����ڵ��ļ��в�����,����!");}
fclose($fp);


}
function getcwdOL(){
    $total = $_SERVER[PHP_SELF];
    $file = explode("/", $total);
    $file = $file[sizeof($file)-1];
    return substr($total, 0, strlen($total)-strlen($file)-1);
}

//----------------------//
//       ����ҳ��       //
//----------------------//
function error($error){
	head();
?>
<link rel="stylesheet" href="images/fonts.css">
<table cellspacing=1 cellpadding=3 width=55% bgcolor="#000000" class="fonts" align="center">
  <tr bgcolor="#9999ff"> 
    <td height="11" align="center" bgcolor="#999999" class="mycss"> 
      <div align="left"> Error ����ԭ�������:</div>
    </td>
  </tr>
  <tr> 
    <td align="center" bgcolor="#FFFFFF" class="mycss"> 
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr> 
            <br>
          <td colspan="2"><font color="red"><? echo $error; ?></font>
            <p><a href="javascript:history.go(-1);">&lt;&gt; ������ﷵ����һҳ &lt;&gt; 
              </a></p>
          </td>
          </tr></table>
</table>
<?
foot();
} 

//----------------------//
//     �ɹ���תҳ��     //
//----------------------//
function isok($isok){
	head();
//<meta HTTP-EQUIV="REFRESH" CONTENT="2;URL=index.php">
?>
<table cellspacing=1 cellpadding=3 width=55% bgcolor="#000000" class="fonts" align="center">
  <tr bgcolor="#9999ff"> 
    <td height="11" align="center" bgcolor="#999999" class="mycss"> 
      <div align="left"> ϵͳ��Ϣ:�ɹ�!</div>
    </td>
  </tr>
  <tr> 
    <td align="center" bgcolor="#FFFFFF" class="mycss"> 
        <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr> 
            <br>
          <td colspan="2"><font color="red"><? echo $isok; ?></font>
<p><a href="index.php">���ع�����ҳ
              </a></p><p><a href="add.php">����µĹ����롣
              </a></p>
          </td>
          </tr></table>
</table>
<? 
foot();
}
function head($title="���ѹ�����ϵͳ V2.0"){
	global $dbtpye,$fenid,$kw,$indexfile;
	$strs= '';
	$tpye_tmp=@file($dbtpye);
	array_multisort ($tpye_tmp);
	for($i=0;$i<count($tpye_tmp);$i++){
	$tpye=explode("��",$tpye_tmp[$i]); 
	if($tpye[1]==$fenid){
		$strs.= "<b><a href=\"$indexfile?fenid=$tpye[1]\">$tpye[2]</a></b>";
	}else{$strs.= "<a href=\"$indexfile?fenid=$tpye[1]\">$tpye[2]</a>";}
	}
echo <<<CHJIA
<META http-equiv=Content-Type content="text/html; charset=gb2312"><link rel="stylesheet" type="text/css" href="data/chjiajs.css">
<title>$title</title><div class="main">
<div class="logo">$title</div><div class="search_right"><form action="$indexfile" method="get" name="form1" id="form1">
<input name="kw" type="text" id="kw" value="$kw">
<select name="type" id="type"><option value="nr">�������</option>
<option value="name">���ID</option>
<option value="all">��汸ע</option> <option value="gge">�����</option>
</select><input type="hidden" name="fenid" value="$fenid" >
<input type="submit" value="����"><br />
<a href="add.php" target="_self">����µĹ��</a> | <a href="log.php?tc=tc">�˳�����</a></form> </div>
<div class="clear"></div>
<div class="fenlei">������[<a href="admin.php?action=edit_type">����</a>] [<a href="$indexfile">ȫ��</a>]��$strs</div>
  

CHJIA;
} 
function foot(){
	?><div class="foot">Copyright &copy; 2006 <a href="http://www.chjia.com/">Www.Chjia.Com</a> Inc. All rights reserved. <a href="http://www.chjia.com/">������</a>��Ȩ���� </div></div></body>
</html>
<?php
		exit;
} ?>
