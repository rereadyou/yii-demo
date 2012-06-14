<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php cs()->registerCoreScript('jquery');?>
	<?php cs()->registerScriptFile(resBu('scripts/jquery.tools.min.js'), CClientScript::POS_END);?>
	<?php cs()->registerScriptFile(resBu('scripts/common.js'), CClientScript::POS_END);?>

<?php $form=$this->beginWidget('CActiveForm'); ?>
	<?php echo $form->errorSummary($model); ?>
<div class="xgal">

 <div class="xg_main">
  <div class="fs">
    <table width="730" border="0" cellpadding="0" cellspacing="1" bgcolor="#E4E4E4">
      <tr>
        <td height="30" colspan="3" bgcolor="#effaff">&nbsp;<span class="cu">我的专长</span></td>
        </tr>
      <tr>
          <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">我的专长一:</span>&nbsp; </td>
        <td align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
          	<select name="speciality1" id="specaility1" class="lei_b1">
              <option value=0 selected>选择专长</option>
              <option value='1'>律师</option><option value='3'>├ 民事类</option><option value='11' selected >│├ 婚姻家庭</option><option value='12'>│├ 遗产继承</option><option value='13'>│├ 消费维权</option><option value='14'>│├ 抵押担保</option><option value='15'>│├ 合同纠纷</option><option value='16'>│├ 劳动纠纷</option><option value='17'>│├ 人身损害</option><option value='18'>│├ 保险理赔</option><option value='19'>│├ 拆迁安置</option><option value='20'>│├ 债权债务</option><option value='21'>│├ 医疗纠纷</option><option value='22'>│├ 交通事故</option><option value='4'>├ 经济类</option><option value='23'>│├ 工程建筑</option><option value='24'>│├ 房产纠纷</option><option value='25'>│├ 知识产权</option><option value='26'>│├ 合伙加盟</option><option value='27'>│├ 个人独资</option><option value='28'>│├ 金融证券</option><option value='29'>│├ 银行保险</option><option value='30'>│├ 不当竞争</option><option value='31'>│├ 经济仲裁</option><option value='32'>│├ 网络法律</option><option value='33'>│├ 招标投标</option><option value='66'>│├ 财税</option><option value='7'>├ 刑事行政法类</option><option value='34'>│├ 取保候审</option><option value='35'>│├ 刑事辩护</option><option value='36'>│├ 刑事自诉</option><option value='37'>│├ 行政复议</option><option value='38'>│├ 行政诉讼</option><option value='39'>│├ 国家赔偿</option><option value='40'>│├ 工商税务</option><option value='41'>│├ 海关商检</option><option value='42'>│├ 公安国安</option><option value='8'>├ 涉外法律类</option><option value='43'>│├ 海事海商</option><option value='44'>│├ 国际贸易</option><option value='45'>│├ 招商引资</option><option value='46'>│├ 外商投资</option><option value='47'>│├ 合资合作</option><option value='48'>│├ WTO事务</option><option value='49'>│├ 倾销补贴</option><option value='50'>│├ 涉外仲裁</option><option value='9'>├ 公司专项法律类</option><option value='51'>│├ 公司并购</option><option value='52'>│├ 股份转让</option><option value='53'>│├ 企业改制</option><option value='54'>│├ 公司清算</option><option value='55'>│├ 破产解散</option><option value='56'>│├ 资产拍卖</option><option value='10'>├ 其他非讼法律类</option><option value='57'>│├ 工商查询</option><option value='58'>│├ 资信调查</option><option value='59'>│├ 合同审查</option><option value='60'>│├ 调解谈判</option><option value='61'>│├ 常年顾问</option><option value='62'>│├ 私人律师</option><option value='63'>│├ 文书代理</option><option value='64'>│├ 移民留学</option><option value='65'>│├ 商帐追收</option>
            </select>
        </div></td>
      </tr>

	  <tr>
          <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">我的专长二:</span>&nbsp; </td>
        <td align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
          	<select name="speciality2" id="specaility2" class="lei_b1">
              <option value=0 selected>选择专长</option>
              <option value='1'>律师</option><option value='3'>├ 民事类</option><option value='11' selected >│├ 婚姻家庭</option><option value='12'>│├ 遗产继承</option><option value='13'>│├ 消费维权</option><option value='14'>│├ 抵押担保</option><option value='15'>│├ 合同纠纷</option><option value='16'>│├ 劳动纠纷</option><option value='17'>│├ 人身损害</option><option value='18'>│├ 保险理赔</option><option value='19'>│├ 拆迁安置</option><option value='20'>│├ 债权债务</option><option value='21'>│├ 医疗纠纷</option><option value='22'>│├ 交通事故</option><option value='4'>├ 经济类</option><option value='23'>│├ 工程建筑</option><option value='24'>│├ 房产纠纷</option><option value='25'>│├ 知识产权</option><option value='26'>│├ 合伙加盟</option><option value='27'>│├ 个人独资</option><option value='28'>│├ 金融证券</option><option value='29'>│├ 银行保险</option><option value='30'>│├ 不当竞争</option><option value='31'>│├ 经济仲裁</option><option value='32'>│├ 网络法律</option><option value='33'>│├ 招标投标</option><option value='66'>│├ 财税</option><option value='7'>├ 刑事行政法类</option><option value='34'>│├ 取保候审</option><option value='35'>│├ 刑事辩护</option><option value='36'>│├ 刑事自诉</option><option value='37'>│├ 行政复议</option><option value='38'>│├ 行政诉讼</option><option value='39'>│├ 国家赔偿</option><option value='40'>│├ 工商税务</option><option value='41'>│├ 海关商检</option><option value='42'>│├ 公安国安</option><option value='8'>├ 涉外法律类</option><option value='43'>│├ 海事海商</option><option value='44'>│├ 国际贸易</option><option value='45'>│├ 招商引资</option><option value='46'>│├ 外商投资</option><option value='47'>│├ 合资合作</option><option value='48'>│├ WTO事务</option><option value='49'>│├ 倾销补贴</option><option value='50'>│├ 涉外仲裁</option><option value='9'>├ 公司专项法律类</option><option value='51'>│├ 公司并购</option><option value='52'>│├ 股份转让</option><option value='53'>│├ 企业改制</option><option value='54'>│├ 公司清算</option><option value='55'>│├ 破产解散</option><option value='56'>│├ 资产拍卖</option><option value='10'>├ 其他非讼法律类</option><option value='57'>│├ 工商查询</option><option value='58'>│├ 资信调查</option><option value='59'>│├ 合同审查</option><option value='60'>│├ 调解谈判</option><option value='61'>│├ 常年顾问</option><option value='62'>│├ 私人律师</option><option value='63'>│├ 文书代理</option><option value='64'>│├ 移民留学</option><option value='65'>│├ 商帐追收</option>
            </select>
        </div></td>
      </tr>
      
      <tr>
          <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">我的专长三:</span>&nbsp; </td>
        <td align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
          	<select name="speciality3" id="specaility3" class="lei_b1">
              <option value=0 selected>选择专长</option>
              <option value='1'>律师</option><option value='3'>├ 民事类</option><option value='11' selected >│├ 婚姻家庭</option><option value='12'>│├ 遗产继承</option><option value='13'>│├ 消费维权</option><option value='14'>│├ 抵押担保</option><option value='15'>│├ 合同纠纷</option><option value='16'>│├ 劳动纠纷</option><option value='17'>│├ 人身损害</option><option value='18'>│├ 保险理赔</option><option value='19'>│├ 拆迁安置</option><option value='20'>│├ 债权债务</option><option value='21'>│├ 医疗纠纷</option><option value='22'>│├ 交通事故</option><option value='4'>├ 经济类</option><option value='23'>│├ 工程建筑</option><option value='24'>│├ 房产纠纷</option><option value='25'>│├ 知识产权</option><option value='26'>│├ 合伙加盟</option><option value='27'>│├ 个人独资</option><option value='28'>│├ 金融证券</option><option value='29'>│├ 银行保险</option><option value='30'>│├ 不当竞争</option><option value='31'>│├ 经济仲裁</option><option value='32'>│├ 网络法律</option><option value='33'>│├ 招标投标</option><option value='66'>│├ 财税</option><option value='7'>├ 刑事行政法类</option><option value='34'>│├ 取保候审</option><option value='35'>│├ 刑事辩护</option><option value='36'>│├ 刑事自诉</option><option value='37'>│├ 行政复议</option><option value='38'>│├ 行政诉讼</option><option value='39'>│├ 国家赔偿</option><option value='40'>│├ 工商税务</option><option value='41'>│├ 海关商检</option><option value='42'>│├ 公安国安</option><option value='8'>├ 涉外法律类</option><option value='43'>│├ 海事海商</option><option value='44'>│├ 国际贸易</option><option value='45'>│├ 招商引资</option><option value='46'>│├ 外商投资</option><option value='47'>│├ 合资合作</option><option value='48'>│├ WTO事务</option><option value='49'>│├ 倾销补贴</option><option value='50'>│├ 涉外仲裁</option><option value='9'>├ 公司专项法律类</option><option value='51'>│├ 公司并购</option><option value='52'>│├ 股份转让</option><option value='53'>│├ 企业改制</option><option value='54'>│├ 公司清算</option><option value='55'>│├ 破产解散</option><option value='56'>│├ 资产拍卖</option><option value='10'>├ 其他非讼法律类</option><option value='57'>│├ 工商查询</option><option value='58'>│├ 资信调查</option><option value='59'>│├ 合同审查</option><option value='60'>│├ 调解谈判</option><option value='61'>│├ 常年顾问</option><option value='62'>│├ 私人律师</option><option value='63'>│├ 文书代理</option><option value='64'>│├ 移民留学</option><option value='65'>│├ 商帐追收</option>
            </select>
        </div></td>
      </tr>
      
      <tr>
          <td height="30" align="right" bgcolor="#effaff"><span class="cu_1">我的专长四:</span>&nbsp; </td>
        <td align="center" bgcolor="#FFFFFF"><img src="/images/xgzl_r2_c2.jpg" width="13" height="7" /></td>
        <td bgcolor="#FFFFFF"><div class="contact">
          	<select name="speciality4" id="specaility4" class="lei_b1">
              <option value=0 selected>选择专长</option>
              <option value='1'>律师</option><option value='3'>├ 民事类</option><option value='11' selected >│├ 婚姻家庭</option><option value='12'>│├ 遗产继承</option><option value='13'>│├ 消费维权</option><option value='14'>│├ 抵押担保</option><option value='15'>│├ 合同纠纷</option><option value='16'>│├ 劳动纠纷</option><option value='17'>│├ 人身损害</option><option value='18'>│├ 保险理赔</option><option value='19'>│├ 拆迁安置</option><option value='20'>│├ 债权债务</option><option value='21'>│├ 医疗纠纷</option><option value='22'>│├ 交通事故</option><option value='4'>├ 经济类</option><option value='23'>│├ 工程建筑</option><option value='24'>│├ 房产纠纷</option><option value='25'>│├ 知识产权</option><option value='26'>│├ 合伙加盟</option><option value='27'>│├ 个人独资</option><option value='28'>│├ 金融证券</option><option value='29'>│├ 银行保险</option><option value='30'>│├ 不当竞争</option><option value='31'>│├ 经济仲裁</option><option value='32'>│├ 网络法律</option><option value='33'>│├ 招标投标</option><option value='66'>│├ 财税</option><option value='7'>├ 刑事行政法类</option><option value='34'>│├ 取保候审</option><option value='35'>│├ 刑事辩护</option><option value='36'>│├ 刑事自诉</option><option value='37'>│├ 行政复议</option><option value='38'>│├ 行政诉讼</option><option value='39'>│├ 国家赔偿</option><option value='40'>│├ 工商税务</option><option value='41'>│├ 海关商检</option><option value='42'>│├ 公安国安</option><option value='8'>├ 涉外法律类</option><option value='43'>│├ 海事海商</option><option value='44'>│├ 国际贸易</option><option value='45'>│├ 招商引资</option><option value='46'>│├ 外商投资</option><option value='47'>│├ 合资合作</option><option value='48'>│├ WTO事务</option><option value='49'>│├ 倾销补贴</option><option value='50'>│├ 涉外仲裁</option><option value='9'>├ 公司专项法律类</option><option value='51'>│├ 公司并购</option><option value='52'>│├ 股份转让</option><option value='53'>│├ 企业改制</option><option value='54'>│├ 公司清算</option><option value='55'>│├ 破产解散</option><option value='56'>│├ 资产拍卖</option><option value='10'>├ 其他非讼法律类</option><option value='57'>│├ 工商查询</option><option value='58'>│├ 资信调查</option><option value='59'>│├ 合同审查</option><option value='60'>│├ 调解谈判</option><option value='61'>│├ 常年顾问</option><option value='62'>│├ 私人律师</option><option value='63'>│├ 文书代理</option><option value='64'>│├ 移民留学</option><option value='65'>│├ 商帐追收</option>
            </select>
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
<?php $this->endWidget(); ?>

<script>
$(function(){
	$('#specaility1').val("<?php echo $arr[0]?>");
	$('#specaility2').val("<?php echo $arr[1]?>");
	$('#specaility3').val("<?php echo $arr[2]?>");
	$('#specaility4').val("<?php echo $arr[3]?>");
});
</script>
