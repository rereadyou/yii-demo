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
				'width'				: '99%',
				'width'				: '95%',
				'height'			: '49%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});


		});
                function myclose()
                {   alert('律所添加成功！');
                    $.fancybox.close();
                }
	</script>
<?php if(Yii::app()->user->hasFlash('success')): ?>
<div class="flash-success">
	<?php echo app()->user->getFlash('success'); ?>
     <?php
	  app()->msg->message("更新成功",url('user/profile/editprofilels'))
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
        <td width="38" align="center" bgcolor="#FFFFFF"><img  src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td width="576" bgcolor="#FFFFFF"><div class="contact"><?php echo $form->textField($model,'TrueName',array('disabled'=>'true','class'=>'kk')); ?>
         <img src="../../../../../images/user/msg_bg1.png" style="margin-top:5px;" />(<span class="l_right">不允许修改真实姓名</span>,)</div></td>
      </tr>
      <tr>
          <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">执业证号：</span>&nbsp; </td>
        <td align="center" bgcolor="#FFFFFF"><img  src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
          	<?php echo $form->textField($model,'Code',array('class'=>'kk')); ?>
        </div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">执业机构：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"><img  src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
          <?php echo $form->textField($model,'WorkID',array('class'=>'kk','readonly'=>'true')); ?>  <span id="ls_workname"><?php echo $workname?></span> &nbsp;<a id="various3" href="<?echo url('user/lvsuo/select'); ?>" style=" color:#999999" >选择执业机构</a>
        </div></td>
      </tr>
      <tr>
        <td height="52" align="right" bgcolor="#effaff"><span class="cu_1">电子邮箱：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"><img  src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
  		<?php echo $form->textField($model,'email',array('class'=>'kk')); ?>
          <br />
        <img src="../../../../../images/user/msg_bg2.png" /> <span class="l_info" >非常重要！这是公众和您联系的首选方式，请一定填写真实。</span></div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">联系电话：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"><img  src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
         <?php echo $form->textField($model,'Phone',array('class'=>'kk')); ?>
        </div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">业务手机：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF"><div class="contact">
        <?php echo $form->textField($model,'mobile',array('class'=>'kk')); ?>
         <img src="../../../../../images/user/msg_bg.png" style="margin-top:3px; _margin-top:9px;" /> <span class="l_error ">(这是公众和您联系的重要方式，建议您填写)</span></div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">所在地区：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"><img  src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
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
        <td align="center" bgcolor="#FFFFFF"><img  src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
         <?php echo $form->textField($model,'Address',array('size'=>50,'class'=>'kk')); ?>
          <br />
        填写区、街道、门牌号</div>
          <br /></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">邮政编码：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
        <td bgcolor="#FFFFFF"><div class="contact">
          <?php echo $form->textField($model,'Zip',array('class'=>'kk')); ?>
        </div></td>
      </tr>
      <tr>
        <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">传 真：</span>&nbsp;</td>
        <td align="center" bgcolor="#FFFFFF"><img  src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
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
    </table>
    <table style="margin-top:22px;" width="730" border="0" cellpadding="0" cellspacing="1" bgcolor="#E4E4E4">
      <tr>
        <td height="30" colspan="5" bgcolor="#effaff">&nbsp;<span class="cu">设置个人专长</span></td>
      </tr>
      <tr>
        <td width="148" height="30" align="center" bgcolor="#effaff"><span class="contact">
                <select name="duoda1" id="duoda1" class="lei_b1" onChange="selzc(this,1);">
              <option value=0 selected>选择专长</option>
              <option value='1'>律师</option><option value='3'>├ 民事类</option><option value='11' selected >│├ 婚姻家庭</option><option value='12'>│├ 遗产继承</option><option value='13'>│├ 消费维权</option><option value='14'>│├ 抵押担保</option><option value='15'>│├ 合同纠纷</option><option value='16'>│├ 劳动纠纷</option><option value='17'>│├ 人身损害</option><option value='18'>│├ 保险理赔</option><option value='19'>│├ 拆迁安置</option><option value='20'>│├ 债权债务</option><option value='21'>│├ 医疗纠纷</option><option value='22'>│├ 交通事故</option><option value='4'>├ 经济类</option><option value='23'>│├ 工程建筑</option><option value='24'>│├ 房产纠纷</option><option value='25'>│├ 知识产权</option><option value='26'>│├ 合伙加盟</option><option value='27'>│├ 个人独资</option><option value='28'>│├ 金融证券</option><option value='29'>│├ 银行保险</option><option value='30'>│├ 不当竞争</option><option value='31'>│├ 经济仲裁</option><option value='32'>│├ 网络法律</option><option value='33'>│├ 招标投标</option><option value='66'>│├ 财税</option><option value='7'>├ 刑事行政法类</option><option value='34'>│├ 取保候审</option><option value='35'>│├ 刑事辩护</option><option value='36'>│├ 刑事自诉</option><option value='37'>│├ 行政复议</option><option value='38'>│├ 行政诉讼</option><option value='39'>│├ 国家赔偿</option><option value='40'>│├ 工商税务</option><option value='41'>│├ 海关商检</option><option value='42'>│├ 公安国安</option><option value='8'>├ 涉外法律类</option><option value='43'>│├ 海事海商</option><option value='44'>│├ 国际贸易</option><option value='45'>│├ 招商引资</option><option value='46'>│├ 外商投资</option><option value='47'>│├ 合资合作</option><option value='48'>│├ WTO事务</option><option value='49'>│├ 倾销补贴</option><option value='50'>│├ 涉外仲裁</option><option value='9'>├ 公司专项法律类</option><option value='51'>│├ 公司并购</option><option value='52'>│├ 股份转让</option><option value='53'>│├ 企业改制</option><option value='54'>│├ 公司清算</option><option value='55'>│├ 破产解散</option><option value='56'>│├ 资产拍卖</option><option value='10'>├ 其他非讼法律类</option><option value='57'>│├ 工商查询</option><option value='58'>│├ 资信调查</option><option value='59'>│├ 合同审查</option><option value='60'>│├ 调解谈判</option><option value='61'>│├ 常年顾问</option><option value='62'>│├ 私人律师</option><option value='63'>│├ 文书代理</option><option value='64'>│├ 移民留学</option><option value='65'>│├ 商帐追收</option>
              </select>
        </span></td>
        <td width="153" align="center" bgcolor="#effaff"><span class="contact">
          <select name="duoda2" id="duoda2" class="lei_b1" onChange="selzc(this,2);">
              <option value=0 selected>选择专长</option>
              <option value='1'>律师</option><option value='3'>├ 民事类</option><option value='11' selected >│├ 婚姻家庭</option><option value='12'>│├ 遗产继承</option><option value='13'>│├ 消费维权</option><option value='14'>│├ 抵押担保</option><option value='15'>│├ 合同纠纷</option><option value='16'>│├ 劳动纠纷</option><option value='17'>│├ 人身损害</option><option value='18'>│├ 保险理赔</option><option value='19'>│├ 拆迁安置</option><option value='20'>│├ 债权债务</option><option value='21'>│├ 医疗纠纷</option><option value='22'>│├ 交通事故</option><option value='4'>├ 经济类</option><option value='23'>│├ 工程建筑</option><option value='24'>│├ 房产纠纷</option><option value='25'>│├ 知识产权</option><option value='26'>│├ 合伙加盟</option><option value='27'>│├ 个人独资</option><option value='28'>│├ 金融证券</option><option value='29'>│├ 银行保险</option><option value='30'>│├ 不当竞争</option><option value='31'>│├ 经济仲裁</option><option value='32'>│├ 网络法律</option><option value='33'>│├ 招标投标</option><option value='66'>│├ 财税</option><option value='7'>├ 刑事行政法类</option><option value='34'>│├ 取保候审</option><option value='35'>│├ 刑事辩护</option><option value='36'>│├ 刑事自诉</option><option value='37'>│├ 行政复议</option><option value='38'>│├ 行政诉讼</option><option value='39'>│├ 国家赔偿</option><option value='40'>│├ 工商税务</option><option value='41'>│├ 海关商检</option><option value='42'>│├ 公安国安</option><option value='8'>├ 涉外法律类</option><option value='43'>│├ 海事海商</option><option value='44'>│├ 国际贸易</option><option value='45'>│├ 招商引资</option><option value='46'>│├ 外商投资</option><option value='47'>│├ 合资合作</option><option value='48'>│├ WTO事务</option><option value='49'>│├ 倾销补贴</option><option value='50'>│├ 涉外仲裁</option><option value='9'>├ 公司专项法律类</option><option value='51'>│├ 公司并购</option><option value='52'>│├ 股份转让</option><option value='53'>│├ 企业改制</option><option value='54'>│├ 公司清算</option><option value='55'>│├ 破产解散</option><option value='56'>│├ 资产拍卖</option><option value='10'>├ 其他非讼法律类</option><option value='57'>│├ 工商查询</option><option value='58'>│├ 资信调查</option><option value='59'>│├ 合同审查</option><option value='60'>│├ 调解谈判</option><option value='61'>│├ 常年顾问</option><option value='62'>│├ 私人律师</option><option value='63'>│├ 文书代理</option><option value='64'>│├ 移民留学</option><option value='65'>│├ 商帐追收</option>
              </select>
        </span></td>
        <td width="141" align="center" bgcolor="#effaff"><span class="contact">
          <select name="duoda3" id="duoda3" class="lei_b1" onChange="selzc(this,3);">
              <option value=0 selected>选择专长</option>
              <option value='1'>律师</option><option value='3'>├ 民事类</option><option value='11' selected >│├ 婚姻家庭</option><option value='12'>│├ 遗产继承</option><option value='13'>│├ 消费维权</option><option value='14'>│├ 抵押担保</option><option value='15'>│├ 合同纠纷</option><option value='16'>│├ 劳动纠纷</option><option value='17'>│├ 人身损害</option><option value='18'>│├ 保险理赔</option><option value='19'>│├ 拆迁安置</option><option value='20'>│├ 债权债务</option><option value='21'>│├ 医疗纠纷</option><option value='22'>│├ 交通事故</option><option value='4'>├ 经济类</option><option value='23'>│├ 工程建筑</option><option value='24'>│├ 房产纠纷</option><option value='25'>│├ 知识产权</option><option value='26'>│├ 合伙加盟</option><option value='27'>│├ 个人独资</option><option value='28'>│├ 金融证券</option><option value='29'>│├ 银行保险</option><option value='30'>│├ 不当竞争</option><option value='31'>│├ 经济仲裁</option><option value='32'>│├ 网络法律</option><option value='33'>│├ 招标投标</option><option value='66'>│├ 财税</option><option value='7'>├ 刑事行政法类</option><option value='34'>│├ 取保候审</option><option value='35'>│├ 刑事辩护</option><option value='36'>│├ 刑事自诉</option><option value='37'>│├ 行政复议</option><option value='38'>│├ 行政诉讼</option><option value='39'>│├ 国家赔偿</option><option value='40'>│├ 工商税务</option><option value='41'>│├ 海关商检</option><option value='42'>│├ 公安国安</option><option value='8'>├ 涉外法律类</option><option value='43'>│├ 海事海商</option><option value='44'>│├ 国际贸易</option><option value='45'>│├ 招商引资</option><option value='46'>│├ 外商投资</option><option value='47'>│├ 合资合作</option><option value='48'>│├ WTO事务</option><option value='49'>│├ 倾销补贴</option><option value='50'>│├ 涉外仲裁</option><option value='9'>├ 公司专项法律类</option><option value='51'>│├ 公司并购</option><option value='52'>│├ 股份转让</option><option value='53'>│├ 企业改制</option><option value='54'>│├ 公司清算</option><option value='55'>│├ 破产解散</option><option value='56'>│├ 资产拍卖</option><option value='10'>├ 其他非讼法律类</option><option value='57'>│├ 工商查询</option><option value='58'>│├ 资信调查</option><option value='59'>│├ 合同审查</option><option value='60'>│├ 调解谈判</option><option value='61'>│├ 常年顾问</option><option value='62'>│├ 私人律师</option><option value='63'>│├ 文书代理</option><option value='64'>│├ 移民留学</option><option value='65'>│├ 商帐追收</option>
              </select>
        </span></td>
        <td width="151" align="center" bgcolor="#effaff"><span class="contact">
           <select name="duoda4" id="duoda4" class="lei_b1" onChange="selzc(this,4);">
              <option value=0 selected>选择专长</option>
              <option value='1'>律师</option><option value='3'>├ 民事类</option><option value='11' selected >│├ 婚姻家庭</option><option value='12'>│├ 遗产继承</option><option value='13'>│├ 消费维权</option><option value='14'>│├ 抵押担保</option><option value='15'>│├ 合同纠纷</option><option value='16'>│├ 劳动纠纷</option><option value='17'>│├ 人身损害</option><option value='18'>│├ 保险理赔</option><option value='19'>│├ 拆迁安置</option><option value='20'>│├ 债权债务</option><option value='21'>│├ 医疗纠纷</option><option value='22'>│├ 交通事故</option><option value='4'>├ 经济类</option><option value='23'>│├ 工程建筑</option><option value='24'>│├ 房产纠纷</option><option value='25'>│├ 知识产权</option><option value='26'>│├ 合伙加盟</option><option value='27'>│├ 个人独资</option><option value='28'>│├ 金融证券</option><option value='29'>│├ 银行保险</option><option value='30'>│├ 不当竞争</option><option value='31'>│├ 经济仲裁</option><option value='32'>│├ 网络法律</option><option value='33'>│├ 招标投标</option><option value='66'>│├ 财税</option><option value='7'>├ 刑事行政法类</option><option value='34'>│├ 取保候审</option><option value='35'>│├ 刑事辩护</option><option value='36'>│├ 刑事自诉</option><option value='37'>│├ 行政复议</option><option value='38'>│├ 行政诉讼</option><option value='39'>│├ 国家赔偿</option><option value='40'>│├ 工商税务</option><option value='41'>│├ 海关商检</option><option value='42'>│├ 公安国安</option><option value='8'>├ 涉外法律类</option><option value='43'>│├ 海事海商</option><option value='44'>│├ 国际贸易</option><option value='45'>│├ 招商引资</option><option value='46'>│├ 外商投资</option><option value='47'>│├ 合资合作</option><option value='48'>│├ WTO事务</option><option value='49'>│├ 倾销补贴</option><option value='50'>│├ 涉外仲裁</option><option value='9'>├ 公司专项法律类</option><option value='51'>│├ 公司并购</option><option value='52'>│├ 股份转让</option><option value='53'>│├ 企业改制</option><option value='54'>│├ 公司清算</option><option value='55'>│├ 破产解散</option><option value='56'>│├ 资产拍卖</option><option value='10'>├ 其他非讼法律类</option><option value='57'>│├ 工商查询</option><option value='58'>│├ 资信调查</option><option value='59'>│├ 合同审查</option><option value='60'>│├ 调解谈判</option><option value='61'>│├ 常年顾问</option><option value='62'>│├ 私人律师</option><option value='63'>│├ 文书代理</option><option value='64'>│├ 移民留学</option><option value='65'>│├ 商帐追收</option>
              </select>
        </span></td>
        <td width="131" align="center" bgcolor="#effaff"><span class="contact">
         <select name="duoda5" id="duoda5" class="lei_b1" onChange="selzc(this,5);">
          <option value=0 selected>选择专长</option>
          <option value='1'>律师</option><option value='3'>├ 民事类</option><option value='11' selected >│├ 婚姻家庭</option><option value='12'>│├ 遗产继承</option><option value='13'>│├ 消费维权</option><option value='14'>│├ 抵押担保</option><option value='15'>│├ 合同纠纷</option><option value='16'>│├ 劳动纠纷</option><option value='17'>│├ 人身损害</option><option value='18'>│├ 保险理赔</option><option value='19'>│├ 拆迁安置</option><option value='20'>│├ 债权债务</option><option value='21'>│├ 医疗纠纷</option><option value='22'>│├ 交通事故</option><option value='4'>├ 经济类</option><option value='23'>│├ 工程建筑</option><option value='24'>│├ 房产纠纷</option><option value='25'>│├ 知识产权</option><option value='26'>│├ 合伙加盟</option><option value='27'>│├ 个人独资</option><option value='28'>│├ 金融证券</option><option value='29'>│├ 银行保险</option><option value='30'>│├ 不当竞争</option><option value='31'>│├ 经济仲裁</option><option value='32'>│├ 网络法律</option><option value='33'>│├ 招标投标</option><option value='66'>│├ 财税</option><option value='7'>├ 刑事行政法类</option><option value='34'>│├ 取保候审</option><option value='35'>│├ 刑事辩护</option><option value='36'>│├ 刑事自诉</option><option value='37'>│├ 行政复议</option><option value='38'>│├ 行政诉讼</option><option value='39'>│├ 国家赔偿</option><option value='40'>│├ 工商税务</option><option value='41'>│├ 海关商检</option><option value='42'>│├ 公安国安</option><option value='8'>├ 涉外法律类</option><option value='43'>│├ 海事海商</option><option value='44'>│├ 国际贸易</option><option value='45'>│├ 招商引资</option><option value='46'>│├ 外商投资</option><option value='47'>│├ 合资合作</option><option value='48'>│├ WTO事务</option><option value='49'>│├ 倾销补贴</option><option value='50'>│├ 涉外仲裁</option><option value='9'>├ 公司专项法律类</option><option value='51'>│├ 公司并购</option><option value='52'>│├ 股份转让</option><option value='53'>│├ 企业改制</option><option value='54'>│├ 公司清算</option><option value='55'>│├ 破产解散</option><option value='56'>│├ 资产拍卖</option><option value='10'>├ 其他非讼法律类</option><option value='57'>│├ 工商查询</option><option value='58'>│├ 资信调查</option><option value='59'>│├ 合同审查</option><option value='60'>│├ 调解谈判</option><option value='61'>│├ 常年顾问</option><option value='62'>│├ 私人律师</option><option value='63'>│├ 文书代理</option><option value='64'>│├ 移民留学</option><option value='65'>│├ 商帐追收</option>
         </select>
        </span>
            <input type="hidden" value="<?php echo $model->Specaility ?>" name="lsspec" id="lsspec" />
        </td>
      </tr>
           <tr>
        <td colspan="5" align="center" bgcolor="#effaff">
       <?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
	"model"=>$model,				# Data-Model
	"attribute"=>'jianjie',			# Attribute in the Data-Model
	"height"=>'400px',
	"width"=>'100%',
	"toolbarSet"=>'Basic', 			# EXISTING(!) Toolbar (see: fckeditor.js)
	"fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
									# Path to fckeditor.php
	"fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
									# Relative Path to the Editor (from Web-Root)
	"config" => array("EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
									# Additional Parameters
) );
?>  </td>
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

<script language="javascript">
function selzc(svalue,zcflag)
{ document.getElementById('lsspec').value="";
 document.getElementById('lsspec').value=document.getElementById('duoda1').value +",";
 document.getElementById('lsspec').value+=document.getElementById('duoda2').value +",";
 document.getElementById('lsspec').value+=document.getElementById('duoda3').value +",";
 document.getElementById('lsspec').value+=document.getElementById('duoda4').value +",";
 document.getElementById('lsspec').value+=document.getElementById('duoda5').value ;
}

</script>
<script language="javascript" defer="defer" >
 if (document.getElementById('lsspec')!=null)
     {
         if(document.getElementById('lsspec').value.indexOf(',')>0)
             {
                 var mylsspec=document.getElementById('lsspec').value.split(',');
                  document.getElementById('duoda1').value=mylsspec[0];
                  document.getElementById('duoda2').value=mylsspec[1];
                  document.getElementById('duoda3').value=mylsspec[2];
                  document.getElementById('duoda4').value=mylsspec[3];
                  document.getElementById('duoda5').value=mylsspec[4];
                  
             }

     }
 document.getElementById("xnameid").value='<?php echo $userxnameid?>';

</script>