var tss=setTimeout("set_ip_prov()",2000);
<?php
if ($pnameid<4)
    {
    $cname=$pname;
    $cname_py=$pname_py;
    }
?>
function set_ip_prov()
{
document.getElementById("ip_top_s_prov").innerHTML="<?php echo $pname;?>";
document.getElementById("ip_top_s_prov_href").href="http://ask.9ask.cn/<?php echo $pname_py;?>/";
document.getElementById("ip_top_s_city").innerHTML="<?php echo $cname;?>";
document.getElementById("ip_top_s_city_href").href="http://ask.9ask.cn/<?php echo $cname_py;?>/";
 
}

