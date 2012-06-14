<?php
 $nums=count($ads);
 for($i=0;$i<6;$i++)
 {
 ?>
document.write("<li> <p><a href='http://www.9ask.cn/usersite/home/<?php echo $ads[$i]['name'] ;?>/' target='_blank' ><img src='<?php echo $ads[$i]['UserPic'] ;?>' width='60' height='80' /></a></p>  	<p  ><a href='http://www.9ask.cn/10yingxiao/<?php echo $ads[$i]['name'] ;?>/'>  <?php echo $ads[$i]['Truename'] ;?>律师</a></p>  <p><a href='http://www.9ask.cn/usersite/home/<?php echo $ads[$i]['name'] ;?>/ask.asp' target='_blank' ><img src='/images/askme.jpg' width='50' height='17' /></a></p><p><?php echo $ads[$i]['pname'] ;?>-<?php echo $ads[$i]['cname'] ;?></p><p><?php echo  substr($ads[$i]['Mobile'],0,11)  ;?></p>  </li>");
 <?php
 }
 exit();
?>
 