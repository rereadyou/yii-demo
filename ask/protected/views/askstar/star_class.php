 <?php
 getonelvshi($flag,$zcid,$lsarray,$oaskclass,1);
?>
<?php
function getonelvshi($flag,$zcid,$lsarray,$oaskclass,$isdisply) {
    $dispycss="style='display:none'";
    if ($isdisply==1) $dispycss="style='display:block'";
    if(empty($lsarray[$zcid]['truename']))
    {
        exit('暂无数据');
    }
    ?>
 <div  class="linfobox" <?php echo $dispycss;?>  >
									<div class="imga" >
										<p><a href="<?php echo $lsarray[$zcid]['lsurl']?>" target="_blank"><img src="<?php echo  $lsarray[$zcid]['userpic'];?>" width="77" height="97" /></a></p>
										<p><a href="<?php echo $lsarray[$zcid]['lsaskurl']?>" target="_blank"><img src="/images/onebtn.jpg"  /></a></p>
									</div>
									<div class="info">
										<p><a href="<?php echo $lsarray[$zcid]['lsurl']?>" target="_blank"><?php echo  $lsarray[$zcid]['truename'];?>律师</a><img src="/images/cxlft1.gif" width="120" height="34" /></p>
										<p>执业机构：<?php echo  $lsarray[$arrhotzc[$flag]]['work'];?></p>
										<p>电话：<?php echo  $lsarray[$zcid]['mobile'];?></p>
										<p>回复数量：<?php echo  $lsarray[$zcid]['num'] ;?> | 留言:<?php echo  $lsarray[$zcid]['bestnum']?>调</p>
									</div>
								</div>
    <?php
}
?> 