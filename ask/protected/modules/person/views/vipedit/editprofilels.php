<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php cs()->registerCoreScript('jquery');?>
	<?php cs()->registerScriptFile(resBu('scripts/jquery.tools.min.js'), CClientScript::POS_END);?>
	<?php cs()->registerScriptFile(resBu('scripts/common.js'), CClientScript::POS_END);?>
        <script type="text/javascript" src="/scripts/jquery.mousewheel-3.0.4.pack.js"></script>
       <script type="text/javascript" src="/scripts/jquery.fancybox-1.3.4.pack.js"></script>
       <link rel="stylesheet" type="text/css" href="/css/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
       <script type="text/javascript">
		$(document).ready(function() {

			$("#various3").fancybox({
				'width'				: '95%',
				'height'			: '49%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe',
				'height'            : 500,
				'width'             : 800
			});


		});
                function myclose()
                {   alert('律所添加成功！');
                    $.fancybox.close();


                }
	</script>

<?php $form=$this->beginWidget('CActiveForm'); ?>
	<?php echo $form->errorSummary($model); ?>
<div class="xgal">

 <div class="xg_main">
  <div class="fs">
    <table width="730" border="0" cellpadding="0" cellspacing="1" bgcolor="#E4E4E4">
      <tr>
        <td height="30" colspan="3" bgcolor="#effaff">&nbsp;<span class="cu">姓名联系方式</span></td>
        </tr>
      <tr>
        <td width="112" height="30" align="right" bgcolor="#effaff"><span class="cu_1">真实姓名：</span>&nbsp;</td>
        <td width="38" align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td width="576" bgcolor="#FFFFFF"><div class="contact"><?php echo $form->textField($model,'TrueName',array('disabled'=>'true','class'=>'kk')); ?>
         <img src="/images/user/msg_bg1.png" style="margin-top:5px;" />(<span class="l_right">不允许修改真实姓名</span>,)</div></td>
      </tr>
      <tr>
          <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">执业证号：</span>&nbsp; </td>
        <td align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
          	<?php echo $form->textField($model,'Code',array('class'=>'kk')); ?>
        </div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">执业机构：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
          <?php echo $form->hiddenField($model,'WorkID',array('class'=>'kk','readonly'=>'true')); ?>  <span id="ls_workname"><?php echo $workname?></span> &nbsp;<a id="various3" href="<?echo url('user/lvsuo/select'); ?>" style=" color:#999999" >选择执业机构</a>
        </div></td>
      </tr>
      <tr>
        <td height="52" align="right" bgcolor="#effaff"><span class="cu_1">电子邮箱：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
  		<?php echo $form->textField($model,'email',array('class'=>'kk')); ?>
          <br />
        <img src="/images/user/msg_bg2.png" /> <span class="l_info" >非常重要！这是公众和您联系的首选方式，请一定填写真实。</span></div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">联系电话：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
         <?php echo $form->textField($model,'Phone',array('class'=>'kk')); ?>
        </div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">所在地区：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
              <?php
               $usercnameid=$model->cnameid;
               $userxnameid=$model->xnameid;
               $this->widget('ModuleArea',array('cnameid'=>$usercnameid,));
 ?>

          </div></td>
      </tr>
      <tr>
        <td height="54" align="right" bgcolor="#effaff"><span class="cu_1">联系地址：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
         <?php echo $form->textField($model,'Address',array('size'=>50,'class'=>'kk')); ?>
          <br />
        填写区、街道、门牌号</div>
          <br /></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">传 真：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
         	<?php echo $form->textField($model,'Fax',array('class'=>'kk')); ?>
        </div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">腾讯QQ：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF"><div class="contact">
         <?php echo $form->textField($model,'qq',array('class'=>'kk')); ?>
        </div></td>
      </tr>
         <tr>
        <td height="30" colspan="5" align="center" bgcolor="#effaff"> 
        <?php echo CHtml::submitButton('Submit',array('value'=>'我要保存修改','id'=>'submit')); ?></td>
        </tr>
    </table>
  </div>
 </div>
<img src="/images/user/xgzl_r2_c21.jpg" />
</div>
<script>
$(function(){
	$('#submit').click(function(){
		

		var str = $('#OaskUser_Code').val() 
		var l = str.replace(/[^\x00-\xff]/g, 'xx').length
		if(l>12){
			alert('执业证号12字以内');
			return false;
		}

		var str = $('#OaskUser_email').val() 
		var l = str.replace(/[^\x00-\xff]/g, 'xx').length
		if(l>28){
			alert('邮箱过长');
			return false;
		}

		var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/; 
        //验证邮箱的正则表达式
		if(!reg.test(str))
		{
			alert("邮箱格式不对");
			return false;
		} 

		var str = $('#OaskUser_Phone').val() 
		var l = str.replace(/[^\x00-\xff]/g, 'xx').length
		if(l>15){
			alert('联系电话过长');
			return false;
		}

		var str = $('#OaskUser_Address').val() 
		var l = str.replace(/[^\x00-\xff]/g, 'xx').length
		if(l>50){
			alert('联系地址过长');
			return false;
		}
	});
	
});
</script>
<?php $this->endWidget(); ?>


<script language="javascript">
function selzc(svalue,zcflag)
{ document.getElementById('lsspec').value="";
 document.getElementById('lsspec').value=document.getElementById('speciality1').value +",";
 document.getElementById('lsspec').value+=document.getElementById('speciality2').value +",";
 document.getElementById('lsspec').value+=document.getElementById('speciality3').value +",";
 document.getElementById('lsspec').value+=document.getElementById('speciality4').value +",";
 document.getElementById('lsspec').value+=document.getElementById('speciality5').value ;
}

</script>
<script language="javascript" defer="defer" >
 if (document.getElementById('lsspec')!=null)
     {
         if(document.getElementById('lsspec').value.indexOf(',')>0)
             {
                 var mylsspec=document.getElementById('lsspec').value.split(',');
                  document.getElementById('speciality1').value=mylsspec[0];
                  document.getElementById('speciality2').value=mylsspec[1];
                  document.getElementById('speciality3').value=mylsspec[2];
                  document.getElementById('speciality4').value=mylsspec[3];
                  document.getElementById('speciality5').value=mylsspec[4];
             }

     }
 document.getElementById("xnameid").value='<?php echo $userxnameid?>';
</script>