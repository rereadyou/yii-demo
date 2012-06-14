<?php cs()->registerCoreScript('jquery');?>
<?php cs()->registerScriptFile(resBu('scripts/jquery.tools.min.js'), CClientScript::POS_END);?>
 <?php cs()->registerScriptFile(resBu('scripts/common.js'), CClientScript::POS_END);?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if(Yii::app()->user->hasFlash('success')): ?>
<div class="flash-success">
	<?php echo app()->user->getFlash('success'); ?>
     <?php
	  app()->msg->message("更新成功",url('user/profile/editprofile'))
	 ?>
</div>
<?php else: ?>
<?php $form=$this->beginWidget('CActiveForm'); ?>
<?php echo $form->errorSummary($model); ?>
<div class="xgal">
 <div class="xg_top">
   <div class="bolck1"></div>
   <div class="zti_b"><span class="ma_zt">个人资料管理</span> &gt;&gt;  修改个人资料</div>
   </div>
 <div class="xg_main">
  <div class="fs">
    <table width="730" border="0" cellpadding="0" cellspacing="1" bgcolor="#E4E4E4">
      <tr>
        <td height="30" colspan="3" bgcolor="#effaff">&nbsp;<span class="cu">姓名联系方式</span></td>
        </tr>
      <tr>
        <td width="112" height="30" align="right" bgcolor="#effaff"><span class="cu_1">真实姓名：</span>&nbsp;</td>
        <td width="9" align="center" bgcolor="#FFFFFF"></td>
        <td width="605" bgcolor="#FFFFFF"><div class="contact">
		  <?php echo $form->textField($model,'TrueName'); ?>
         (请填写您的真实姓名)</div></td>
      </tr>

      <tr>
        <td height="52" align="right" bgcolor="#effaff"><span class="cu_1">电子邮箱：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"> </td>
        <td bgcolor="#FFFFFF"><div class="contact">
  		<?php echo $form->textField($model,'email'); ?>
          <br />
        非常重要！这是公众和您联系的首选方式，请一定填写真实。</div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">联系电话：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"> </td>
        <td bgcolor="#FFFFFF"><div class="contact">
         <?php echo $form->textField($model,'Phone'); ?>
        </div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">手机号码：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF"><div class="contact">
        <?php echo $form->textField($model,'mobile'); ?>
         (这是公众和您联系的重要方式，建议您填写)</div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">所在地区：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"> </td>
        <td bgcolor="#FFFFFF"><div class="contact">
              <?php
 $usercnameid=$model->cnameid;
 $userxnameid=$model->xnameid;
 $this->widget('ModuleArea',array('cnameid'=>$usercnameid));
 ?>

          </div></td>
      </tr>
      <tr>
        <td height="54" align="right" bgcolor="#effaff"><span class="cu_1">联系地址：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"> </td>
        <td bgcolor="#FFFFFF"><div class="contact">
         <?php echo $form->textField($model,'Address',array('size'=>50)); ?>
          <br />
        填写区、街道、门牌号</div>
          <br /></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">邮政编码：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF"><div class="contact"><?php echo $form->textField($model,'Zip'); ?>
        </div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">传 真：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"></td>
        <td bgcolor="#FFFFFF"><div class="contact">
         	<?php echo $form->textField($model,'Fax'); ?>
        </div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">腾讯QQ：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF"><div class="contact">
         <?php echo $form->textField($model,'qq'); ?>
        </div></td>
      </tr>
        <tr>
        <td height="30" colspan="5" align="center" bgcolor="#effaff"> <?php echo CHtml::submitButton('Submit',array('value'=>'我要保存修改')); ?></td>
        </tr>
    </table>

  </div>
 </div>
<img  src="/images/user/xgzl_r2_c21.jpg" />
</div>
<?php $this->endWidget(); ?>
<?php endif; ?>
<script defer="defer" language="javascript">
 document.getElementById("xnameid").value='<?php echo $userxnameid?>';
</script>
 