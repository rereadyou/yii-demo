<?   //<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
/*==================================================================
*\   ����JS������  1.0��
*\------------------------------------------------------------------
*\    Copyright(C) www.chjia.com, 2006. All rights reserved
*\------------------------------------------------------------------
*\    ��ҳ:http://www.chjia.com
*\------------------------------------------------------------------
*\    ������Ϊ��ѳ���,Դ����ʹ���߿��������,���뱣������Ȩ��Ϣ!
*\=================================================================*/
include("data/config.php");
head();
if($page<1){$page=1;}$page=$page-1;
$msgd=explode("|www_chjia_com|",file_get_contents($dbtable));
$rows=count($msgd);
if($fenid){
	$tmp_fen='';
	for($i=0;$i<=$rows;$i++){
		$tmp2=explode("|chjia_com|",$msgd[$i]);
		if(eregi("^$fenid$",$tmp2[5])){
			$tmp_fen[]=$msgd[$i];
		}
	}
	$tmp_fen[]='';
	unset($msgd);
	$msgd=$tmp_fen;
	$rows=count($tmp_fen);
}
if($kw){
for ($i=0;$i<=$rows;$i++){
$tmp2=explode("|chjia_com|",$msgd[$i]);
if($type=="name"){$msgn[$i]=$tmp2[0];
}elseif($type=="nr"){$msgn[$i]=$tmp2[2];}
elseif($type=="gge"){$msgn[$i]=$tmp2[4];}
else{$msgn[$i]=$tmp2[3];}
if(eregi($kw,$msgn[$i])){
$chj_nr[]=$msgd[$i];
$chj_numib++;
}
}
if($chj_numib<1){echo "û����� $kw ��ƥ����!!";exit;}
$msg=array_reverse($chj_nr);
$total=ceil($chj_numib/$pagesize); //������ҳ����
$kwnum=-1;
}else
{$chj_numib=$rows;
$msg=array_reverse($msgd);
$total=ceil($chj_numib/$pagesize);
}
//echo $chj_numib;
if($pagesize*$total<$chj_numib){      //���ÿҳ��ʾ��*��ҳ��С����������
$total++;                        //��ҳ������1
}
$chj_adlen=$chj_numib-1;
$total2=$total-1;                //
$page2=$page+1;                  //
$pp=$page*$pagesize+1+$kwnum;             //���㿪ʼ����
$pp2=$pp+$pagesize;              //�����β����
$nextpage=$page+2;               //��һ��ҳ��
$prevpage=$page;               //��һ��ҳ��
?>
<div class="fenye"><form><?if ($page != 0){ ?>
<a href="<?echo "?kw=$kw&amp;type=$type&amp;page=$prevpage&amp;fenid=$fenid"; ?>">��һҳ</a>
<?}?> 
 <? if ($page < $total2) {?>
<a href="<?echo "?kw=$kw&amp;type=$type&amp;page=$nextpage&amp;fenid=$fenid"; ?>">��һҳ</a>
<?} ?>
&nbsp;��<b><font face=Tahoma>
<?echo "<font color=red>$page2</font>/$total"; ?> </font></b>&nbsp; ��
<input type="hidden" name="kw" value="<?=$kw?>" ><input type="hidden" name="type" value="<?=$type?>" ><input type=text name=page size=3 class="input">
ҳ
<input type=submit value=��ת class="botton">
</form>
</div><form action="admin.php?action=makejs" method="get" name="makejs" id="makejs">
<?php
for($i=$pp;$i<$pp2;$i++){
if($i < $chj_numib){  #####
$tmp=explode("|chjia_com|",$msg[$i]);
?><table cellSpacing="1" cellPadding="3" width="760" align="center" bgColor="#999999" border="0">
<tbody>
<tr bgColor="#c0c0c0">
<td width="132" height="25">���ƣ�<?php echo $tmp[0]; ?></td>
<td width="126">������ͣ�<?php echo $tmp[1]; ?></td>
<td width="101">���<?php echo $tmp[4]; ?></td>
<td width="239">����<a href="admin.php?action=edit&id=<?php echo $tmp[0]; ?>">�༭</a>&nbsp;&nbsp;<a onclick="return delad();" href="admin.php?action=del&id=<?php echo $tmp[0]; ?>">ɾ�����</a></td>
<td width="126"><a href="#" target="_self">&gt;&gt;�ض���&lt;&lt;</a>
<input type="checkbox" name="idjs[]" value="<?php echo $tmp[0]; ?>">
����</td>
</tr>
<tr bgColor="#e6e6e6">
<td width="132" height="24">����˵����</td>
<td colSpan="4" height="24"><?php echo $tmp[3]; ?></td>
</tr>
<tr bgColor="#e6e6e6">
<td width="132" height="23">JS�����ô��룺</td>
<td colSpan="4" height="23"><input name="Input" onfocus="this.select()" value='&lt;script type="text/javascript" src="<?php echo "$folds$addata/$tmp[0]"; ?>.js"  charset="gb2312"&gt;&lt;/script&gt;' size="58" />
<input name="Input2" onfocus="this.select()" value='&lt;script type=\"text/javascript\" src=\&quot;<?php echo "$folds$addata/$tmp[0]"; ?>.js\&quot;&gt;&lt;/script&gt;' size="20" /></td>
</tr>
<tr>
<td colSpan="5" height="8">����Ԥ���� <a href="data/index.htm?<?php echo "$addata/$tmp[0]"; ?>" target="adm">�´�����Ԥ��</a>
<iframe frameborder=0 width=100% height=100% src="data/index.htm?<?php echo "$addata/$tmp[0]"; ?>"></iframe><div style="OVERFLOW-Y: scroll; OVERFLOW-X: hidden; WIDTH: 100%; HEIGHT: 100px; BACKGROUND-COLOR: #ffffff">
</div></td>
</tr>
</tbody>
</table>
<?php }}?><table width="760" height="28" border="1" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center" bgcolor="#CCCCCC"><input type="submit" value="����ѡ��JS"> 
    <input type="hidden" name="action" value="makejs"> 
    <input name="alljs" type="submit" id="alljs" value="��������JS"></td>
</tr>
</table>
</form><div class="fenye"><form><?if ($page != 0){ ?>
<a href="<?echo "?kw=$kw&amp;type=$type&amp;page=$prevpage&amp;fenid=$fenid"; ?>">��һҳ</a>
<?}?> 
 <? if ($page < $total2) {?>
<a href="<?echo "?kw=$kw&amp;type=$type&amp;page=$nextpage&amp;fenid=$fenid"; ?>">��һҳ</a>
<?} ?>
&nbsp;��<b><font face=Tahoma>
<?echo "<font color=red>$page2</font>/$total"; ?> </font></b>&nbsp; ��
<input type="hidden" name="kw" value="<?=$kw?>" ><input type="hidden" name="type" value="<?=$type?>" ><input type=text name=page size=3 class="input">
ҳ
<input type=submit value=��ת class="botton">
</form>
</div>
<table width="760" height="28" border="1" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center" bgcolor="#CCCCCC">Copyright &copy; 2006 <a href="http://www.chjia.com/">Www.Chjia.Com</a> Inc. All rights reserved. <a href="http://www.chjia.com/">������</a>��Ȩ���� </td>
</tr>
</table></div>
</body>
</html>