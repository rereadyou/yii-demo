<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<STYLE>

A IMG {
	PADDING-BOTTOM: 0px; BORDER-RIGHT-WIDTH: 0px; MARGIN: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; PADDING-TOP: 0px
}
UL {
	LIST-STYLE-TYPE: none
}

LI {
	LIST-STYLE-TYPE: none
}

.cursor {
	CURSOR: pointer
}

A:link {
	COLOR: #437ca0; TEXT-DECORATION: none
}
A:visited {
	COLOR: #437ca0; TEXT-DECORATION: none
}
A:hover {
	TEXT-DECORATION: underline
}



 .left {
	WIDTH: 339px; FLOAT: left
}
 .left P {
	MARGIN-TOP: 5px; FLOAT: left
}
 .left DL {
	MARGIN-TOP: 5px; FLOAT: left
}
.left DL {
	MARGIN: 0px 0px 38px 22px; WIDTH: 118px; FONT-SIZE: 14px
}
#content .left DT {
	LINE-HEIGHT: 28px; FONT-WEIGHT: bold
}
 .left DD {
	LINE-HEIGHT: 24px; COLOR: #666666
}
#content .left OL {
	COLOR: #a6a9ad; CLEAR: both
}

.left OL SPAN {
	COLOR: #6699ba; FONT-SIZE: 14px; FONT-WEIGHT: bold; MARGIN-RIGHT: 8px
}
.right {   
	WIDTH: 421px; background-image:url(/images/user/pic_login.gif); overflow:hidden;   HEIGHT: 267px; text-align:left
}
.right UL {
	MARGIN: 25px 0px 0px 35px; COLOR: #4c4c4c; FONT-SIZE: 14px
}
.right UL LI {
	MARGIN-BOTTOM: 12px
}
 .now {
	MARGIN: 20px 0px 0px 190px
}
 .wrong {
	MARGIN: 0px 0px 17px 130px; COLOR: #ff0000; FONT-SIZE: 12px
}
#login_tip {
	POSITION: absolute; MARGIN-TOP: 10px; COLOR: #ff6600; FONT-SIZE: 14px; FONT-WEIGHT: bold
}
#top {
	HEIGHT: 120px
}
#ad {
	CLEAR: both
}
.font12 {
	FONT-SIZE: 12px
}
.mar {
	MARGIN-LEFT: 55px
}
.wid1{border:1px solid #ccc;  width:160px; height:22px; line-height:22px;}
.fterror{ color:#FF0000; font-size:12px;}
.allcontent {  margin:auto;  float:none; clear:both; text-align:center; padding-top:100px; width:428px}
.login_shuru1 { width:150px; height:18px; border:1px solid #D6D6D6; padding-top:6px; color:#785B00; font-family:Arial; font-size:14px;}
.login_shuru2 { width:150px; height:18px; border:1px solid #005FAB; padding-top:6px; color:#025FAC; font-family:Arial; font-size:14px;}

</STYLE>
 
    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>true,
)); ?>
<div class="allcontent" style=" margin:auto">
<div  class="right"  >
  	<input type="hidden" name="referer" value="<?php echo $referer; ?>" />
    <div style="height:20px; overflow:hidden; clear:both;"></div>
    <ul>
      <li id="errorMsg" class="wrong"> </li>
      <li>用户名：               
		<?php echo $form->textField($model,'username',array('class'=>'login_shuru1','onfocus'=>"this.className='login_shuru2'",'onblur'=>"this.className='login_shuru1'")); ?>
		<?php echo $form->error($model,'username',array('class'=>'fterror')); ?>      </li>
      <li>密　码：
		<?php echo $form->passwordField($model,'password',array('class'=>'login_shuru1','onfocus'=>"this.className='login_shuru2'",'onblur'=>"this.className='login_shuru1'")); ?>
		<?php echo $form->error($model,'password',array('class'=>'fterror')); ?>      </li>
      <li class="font12 mar">       
        <label for="rpwd"><?php echo $form->checkBox($model,'rememberMe'); ?>记住登录状态</label><?php echo $form->error($model,'rememberMe'); ?>
        <span
  style="MARGIN: 0px 0px 17px 13px"><a class="pw" title="从登录开始全程加密，让你的信息更安全。"
  href="http://www.9ask.cn/reg/reg.html">注册用户</a></span> </li>
      <li class="mar"><input name="image" type="image" id="login_img" tabindex="1" 
  src="/images/user/button_login_new.gif" border="0" />
        
        <span
   id="login_tip">
		</span> </li>
      <li class="now"> <img class="cursor" border="0"
  src="/images/user/spacer.gif" width="1" height="1" />  </li>
    </ul>
 
</div>
</div>
    <?php $this->endWidget(); ?>
 
