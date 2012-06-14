
<form method=post name="form1_mima"   id="form1_mima" action="<?php echo  url('user/profile/savepsw',array())?>" >
 <div class="ma">
	<div class="zti_a"><span class="ma_zt">个人资料管理</span> >>  修改帐号密码</div>
	<div class="bolck10"></div>
	<div class="mi_a">
	旧密码：<input name="oldpwd" type="password" class="kk" />
	<div class="bolck10"></div>
	新密码：
	<input name="newpwd" type="password" class="kk" />
	<div class="bolck10"></div>
	确认新密码：
	<input name="newpwd1" type="password" class="kk" /><br />
    <div class="bolck10"></div>
    <img src="../../../../../images/user/msg_bg.png" /> <span class="l_error">两次修改的密码不一致！</span>
	<div class="bolck10"></div>
    
        <div style=" text-align:right; padding-right:15px;"><input name="submit" type="image" src="/images/user/ann_03.gif" /> <a  href="#" onclick="document.getElementById('form1_mima').reset()"><img src="/images/user/ann_05.gif" /></a></div>
	</div>
 </div>
</form>
 
