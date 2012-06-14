<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
sd
<form method="post" action="index.php?r=/user/login/userlogin&refer=<?php echo $_GET['refer']?>" id="frmlogin2" name="frmlogin2" class="">
      <li>用户名</li>
      <li>
        <input style="height: 14px;" size="8" name="name" id="name">
      </li>
      <li>密码</li>
      <li>
        <input type="password" onkeydown="if (event.keyCode==13){document.getElementById('frmlogin2').submit();return false}" size="8" name="pwd" style="height: 14px;" id="pwd">
      </li>
      <li class="S1">
        <input type="hidden" value="登录" name="login">
        <a onclick=" document.getElementById('frmlogin2').submit()" href="#"><img src="http://www.9ask.cn/images/login.gif"></a></li>
      <li class="S2"><a target="_blank" href="http://www.9ask.cn/reg/reg.html">[3秒免费注册]</a> </li>
    <li class="S2"> <a target="_blank" href="http://www.9ask.cn/souask/ask.asp">免费法律咨询</a></li>
      <li><a target="_blank" href="http://www.9ask.cn/about/checkip.asp">ip纠错</a><a></a></li>
<a>    </a></form>