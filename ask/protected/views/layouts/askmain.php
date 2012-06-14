<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/common.css"/>
<link rel="stylesheet" type="text/css" href="/css/headerfooter.css"/>
<link rel="stylesheet" type="text/css" href="/css/toppopup.css"/>
<link rel="stylesheet" type="text/css" href="/css/tuopsousu.css"/>
<title><?php echo sprintf('%s', $this->pageTitle);?></title>
<SCRIPT LANGUAGE="JavaScript">
<!-- Hide
function killErrors() {
return true;
}
window.onerror = killErrors;
// -->
</SCRIPT>
<script src="http://img.9ask.cn/public/js/9askindextop.js" type="text/javascript"></script>
<script src="http://img.9ask.cn/public/js/lvsuo_bj.js"></script>
<script src="/scripts/indexall.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
//显示与隐藏列表
function showlist(main_,num){
if(num == 1){
document.getElementById(main_).style.display = "block";
}
else{
document.getElementById(main_).style.display = "none";
}
}
var delayId;
function delaySubSearch(sc,swz)
{ if(delayId)
        {
            clearTimeout(delayId);
          
        }
   delayId=setTimeout(function(){nTabs(sc,swz);},350);

}
function cancelDelay()
{ if(delayId)
    { clearTimeout(delayId);
    }
}
</script> 
</head>
<body >
<!--topnav-->
 <script src='<?php echo url('site/jsloginform')?>'></script>
<!--logo-->
<div id="logo" class="cwidth" >
    <div class="logo f_l"><a href="/"><img src="/images/logo.jpg" width="198" height="64" /></a></div>
        <div style="width:90px; float:left; text-align:center; margin-top:10px;">
        <div class="new_ProList" style="">
    <h2 onmouseover=popcity(); style="CURSOR: hand" onmouseout=hidecity();><span
style="PADDING-BOTTOM: 25px; TEXT-DECORATION: underline; font-size:15px; color:#FF0000; line-height:32px;">全国站</span><h3 style="font-size:12px; color:#034591; font-weight:normal;  ">[进入分站]</h3></h2>

<div class=city id=citylayer onmouseover=popcity();
style="DISPLAY: none; Z-INDEX:29999; POSITION: absolute;" onmouseout=hidecity();>
 <h4>请您选择相应省级分站</h4>
          <div class="line_clear"></div>
          <ul>
            <li><A href="http://bj.9ask.cn" target=_blank>北京</A></li>
            <li><A href="http://sh.9ask.cn/" target=_blank>上海</A></li>
            <li><A href="http://www.9ask.cn/sd/" target=_blank>山东</A></li>

            <li><A href="http://www.9ask.cn/gd/" target=_blank>广东</A></li>
            <li><A href="http://www.9ask.cn/tj/" target=_blank>天津</A></li>
            <li><A href="http://www.9ask.cn/zj/" target=_blank>浙江</A></li>
            <li><A href="http://www.9ask.cn/cq/" target=_blank>重庆</A></li>
            <li><A href="http://www.9ask.cn/js/" target=_blank>江苏</A></li>
            <li><A href="http://www.9ask.cn/hunan/" target=_blank>湖南</A> </li>

            <li><A href="http://www.9ask.cn/hb/" target=_blank>湖北</A></li>
            <li><A href="http://www.9ask.cn/sc/" target=_blank>四川</A></li>
            <li><A href="http://www.9ask.cn/hn/" target=_blank>河南</A></li>
            <li><A href="http://www.9ask.cn/hebei/" target=_blank>河北</A></li>
            <li><A href="http://www.9ask.cn/ln/" target=_blank>辽宁</A> </li>
            <li><A href="http://www.9ask.cn/jl/" target=_blank>吉林</A></li>

            <li><A href="http://www.9ask.cn/hlj/" target=_blank>黑龙江</A></li>
            <li><A href="http://www.9ask.cn/fj/" target=_blank>福建</A></li>
            <li><A href="http://www.9ask.cn/anhui/" target=_blank>安徽</A></li>
            <li><A href="http://www.9ask.cn/jiangxi/" target=_blank>江西</A></li>
            <li><A href="http://www.9ask.cn/gs/" target=_blank>甘肃</A></li>
            <li><A href="http://www.9ask.cn/yn/" target=_blank>云南</A></li>

            <li><A href="http://www.9ask.cn/gx/" target=_blank>广西</A></li>
            <li><A href="http://www.9ask.cn/shanxi/" target=_blank>陕西</A></li>
            <li><A href="http://www.9ask.cn/sx/" target=_blank>山西</A></li>
            <li><A href="http://www.9ask.cn/nmg/" target=_blank>内蒙古</A> </li>
            <li><A href="http://www.9ask.cn/hainan/" target="_blank">海南</A></li>
            <li><A href="http://www.9ask.cn/guizhou/" target="_blank">贵州</A></li>

            <li><A href="http://www.9ask.cn/xz/" target=_blank>西藏</A></li>
            <li><A href="http://www.9ask.cn/qh/" target="_blank">青海</A></li>
            <li><A href="http://www.9ask.cn/nx/" target="_blank">宁夏</A></li>
            <li><A href="http://www.9ask.cn/xj/" target="_blank">新疆</A></li>
            <li><A href="http://www.9ask.cn/" target="_blank">香港</A></li>

            <li><A href="http://www.9ask.cn/" target="_blank">澳门</A></li>

            <li><A href="http://www.9ask.cn/taiwan" target="_blank">台湾</A></li>
            <li>　</li>
          </ul>
          <h4>请您选择相应城市分站</h4>
          <div class="line_clear"></div>
          <ul>
            <li><A href="http://www.9ask.cn/chengdu/" target="_blank">成都</A></li>
            <li><A href="http://www.9ask.cn/guangzhou/" target="_blank">广州</A></li>
            <li><A href="http://www.9ask.cn/hangzhou/" target="_blank">杭州</A></li>
            <li><A href="http://www.9ask.cn/qingdao/" target="_blank">青岛</A></li>
            <li><A href="http://www.9ask.cn/jinan/" target="_blank">济南</A></li>
            <li><A href="http://www.9ask.cn/kunming/" target="_blank">昆明</A></li>
            <li><A href="http://www.9ask.cn/dalian/" target="_blank">大连</A></li>

            <li><A href="http://www.9ask.cn/nanjing/" target="_blank">南京</A></li>
            <li><A href="http://www.9ask.cn/shenyang/" target="_blank">沈阳</A></li>
            <li><A href="http://www.9ask.cn/suzhou/" target="_blank">苏州</A></li>
            <li><A href="http://www.9ask.cn/xian" target="_blank">西安</A></li>
            <li><A href="http://www.9ask.cn/xiamen" target="_blank">厦门</A></li>
            <li><A href="http://www.9ask.cn/wuhan/" target="_blank">武汉</A></li>

            <li><A href="http://www.9ask.cn/zhengzhou/" target="_blank">郑州</A></li>
            <li><A href="http://www.9ask.cn/site/shenzhen" target="_blank">深圳</A></li>
            <li><A href="http://www.9ask.cn/hefei" target="_blank">合肥</A></li>
            <li><A href="http://www.9ask.cn/zibo" target="_blank">淄博</A></li>
            <li><A href="http://www.9ask.cn/yantai" target="_blank">烟台</A></li>
            <li><A href="http://www.9ask.cn/weifang" target="_blank">潍坊</A></li>

            <li><A href="http://www.9ask.cn/sjz" target="_blank">石家庄</A></li>
            <li><A href="http://www.9ask.cn/linyi" target="_blank">临沂</A></li>
            <li><A href="http://www.9ask.cn/dongying" target="_blank">东营</A></li>
            <li><A href="http://www.9ask.cn/dongguan" target="_blank">东莞</A></li>
            <li><A href="http://www.9ask.cn/cz" target="_blank">常州</A></li>
            <li><A href="http://www.9ask.cn/wuxi" target="_blank">无锡</A></li>

            <li><A href="http://www.9ask.cn/haerbin" target="_blank">哈尔滨</A></li>
	    	<li><A href="http://www.9ask.cn/suqian" target="_blank">宿迁</A></li>
            <li><A href="http://www.9ask.cn/foshan" target="_blank">佛山</A></li>
            <li><A href="http://www.9ask.cn/fuzhou" target="_blank">福州</A></li>
            <li><A href="http://www.9ask.cn/wenzhou" target="_blank">温州</A></li>
            <li><A href="http://www.9ask.cn/huzhou" target="_blank">湖州</A></li>

            <li><A href="http://www.9ask.cn/baoding" target="_blank">保定</A></li>
            <li><A href="http://www.9ask.cn/rizhao" target="_blank">日照</A></li>
            <li><A href="http://www.9ask.cn/jiaxing" target="_blank">嘉兴</A></li>

            <li><A href="http://www.9ask.cn/xiangfan" target="_blank">襄樊</A></li>
            <li><A href="http://www.9ask.cn/nanchang" target="_blank">南昌</A></li>
            <li><A href="http://www.9ask.cn/jinhua" target="_blank">金华</A></li>

            <li><A href="http://www.9ask.cn/ningbo" target="_blank">宁波</A></li>
            <li><A href="http://www.9ask.cn/nantong" target="_blank">南通</A></li>
            <li><A href="http://www.9ask.cn/zhongshan" target="_blank">中山</A></li>
            <li><A href="http://www.9ask.cn/huizhou" target="_blank">惠州</A></li>
            <li><A href="http://www.9ask.cn/changsha" target="_blank">长沙</A></li>
            <li><A href="http://www.9ask.cn/changchun" target="_blank">长春</A></li>

            <li><A href="http://www.9ask.cn/taiyuan" target="_blank">太原</A></li>
            <li><A href="http://www.9ask.cn/yichang" target="_blank">宜昌</A></li>
            <li><A href="http://www.9ask.cn/weihai" target="_blank">威海</A></li>
            <li><A href="http://www.9ask.cn/jining" target="_blank">济宁</A></li>
            <li><A href="http://www.9ask.cn/taian" target="_blank">泰安</A></li>
            <li><A href="http://www.9ask.cn/jinzhou/" target="_blank">锦州</A></li>

            <li><A href="http://www.9ask.cn/yancheng" target="_blank">盐城</A></li>
            <li><A href="http://www.9ask.cn/lanzhou" target="_blank">兰州</A></li>
			<li><A href="http://www.9ask.cn/tangshan/" target="_blank">唐山</A></li>
            <li><A href="http://www.9ask.cn/langfang/" target="_blank">廊坊</A></li>
            <li><A href="http://www.9ask.cn/xingtai/" target="_blank">邢台</A></li>
            <li style="width:70px;"><A href="http://www.9ask.cn/wlmq/" target="_blank">乌鲁木齐</A></li>

            <li><A href="http://www.9ask.cn/nanchong/" target="_blank">南充</A></li>
            <li><A href="http://www.9ask.cn/nanning/" target="_blank">南宁</A></li>
            <li><A href="http://www.9ask.cn/taizhou/" target="_blank">台州</A></li>
            <li><A href="http://www.9ask.cn/cangzhou/" target="_blank">沧州</A></li>
            <li><A href="http://www.9ask.cn/shaoxing/" target="_blank">绍兴</A></li>
            <li><A href="http://www.9ask.cn/jingzhou/" target="_blank">荆州</A></li>

            <li><A href="http://www.9ask.cn/quanzhou/" target="_blank">泉州</A></li>
            <li><A href="http://www.9ask.cn/anyang/" target="_blank">安阳</A></li>
            <li><A href="http://www.9ask.cn/dezhou/" target="_blank">德州</A></li>
            <li><A href="http://www.9ask.cn/zhuhai/" target="_blank">珠海</A></li>
            <li><A href="http://www.9ask.cn/nanyang/" target="_blank">南阳</A></li>
            <li><A href="http://www.9ask.cn/yangzhou/" target="_blank">扬州</A></li>

            <li><A href="http://www.9ask.cn/kunshan/" target="_blank">昆山</A></li>
             <li><A href="http://www.9ask.cn/yiwu/" target="_blank">义乌</A></li>
              <li><A href="http://www.9ask.cn/yuncheng/" target="_blank">运城</A></li>
             <li><A href="http://www.9ask.cn/daqing/" target="_blank">大庆</A></li>
              <li><A href="http://www.9ask.cn/huaian/" target="_blank">淮安</A></li>
			  <li><A href="http://www.9ask.cn/fuyang/" target="_blank">阜阳</A></li>

			  <li><A href="http://www.9ask.cn/xuzhou/" target="_blank">徐州</A></li>
			  <li><A href="http://www.9ask.cn/laiwu/" target="_blank">莱芜</A></li>
			  <li><a href="http://www.9ask.cn/luoyang/" target="_blank">洛阳</a></li>
				<li><a href="http://www.9ask.cn/xining/" target="_blank">西宁</a></li>
				<li><a href="http://9ask.cn/handan/" target="_blank">邯郸</a></li>
				<li><a href="http://www.9ask.cn/zhangzhou/" target="_blank">漳州</a></li>

				<li><a href="http://www.9ask.cn/wanyuan/" target="_blank">万源</a></li>
				<li><a href="http://www.9ask.cn/qinhuangdao/" target="_blank">秦皇岛</a></li>
			   <li><A href="http://www.9ask.cn/zhangjiagang/" target="_blank">张家港</A></li>
              <li><A href="http://www.9ask.cn/mudanjiang/" target="_blank">牡丹江</A></li>
            <li><A href="http://www.9ask.cn/lianyungang/" target="_blank">连云港</A></li>
			<li><a href="http://www.9ask.cn/chifeng/" target="_blank">赤峰</a></li>
			<li><a href="http://www.9ask.cn/mianyang/" target="_blank">绵阳</a></li>
			<li><a href="http://www.9ask.cn/liaocheng/" target="_blank">聊城</a></li>
			<li><a href="http://www.9ask.cn/binzhou/" target="_blank">滨洲</a></li>
			<li><a href="http://www.9ask.cn/heze/" target="_blank">菏泽</a></li>
			<li><a href="http://www.9ask.cn/shiyan/" target="_blank">十堰</a></li>
			<li><a href="http://www.9ask.cn/jingmen/" target="_blank">荆门</a></li>
			<li><a href="http://www.9ask.cn/guiyang/" target="_blank">贵阳</a></li>
            <li><a href="http://www.9ask.cn/pingdingshan/" target="_blank">平顶山</a></li>
			<li><a href="http://www.9ask.cn/taizhoujs/" target="_blank">泰州</a></li>
			<li><a href="http://www.9ask.cn/shantou/" target="_blank">汕头</a></li>
			<li><a href="http://www.9ask.cn/hengshui/" target="_blank">衡水</a></li>
			<li><a href="http://www.9ask.cn/meishan/" target="_blank">眉山</a></li>
			<li><a href="http://www.9ask.cn/ganzhou/" target="_blank">赣州</a></li>
			<li><a href="http://www.9ask.cn/zunyi/" target="_blank">遵义</a></li>
          </ul>
          <div style="clear:both; height:1px; overflow:hidden;"></div>
          <h4 style="padding-left:160px;"><a href="http://www.9ask.cn/station/" target="_blank"><font color="#004592">详细分站目录>></font></a></h4>
    </div>
  </div>
        </div>
        <div style="float:right; width:535px; margin-top:5px; ">
          <div class="new_LogoSearch">
            <div class="new_Search">
              <div class="TabTitle" style="position: relative">
                  <ul id="myTab0" >
                  <li class="active"  onmouseover="delaySubSearch(this,0);"
  onmouseout="cancelDelay()" onclick="window.open('http://www.9ask.cn/souask')">咨询</li>
                  <li class="normal" onmouseover="delaySubSearch(this,1);"
  onmouseout="cancelDelay()" onclick="window.open('http://www.9ask.cn/search/')">律师</li>
                  <li class="normal" onmouseover="delaySubSearch(this,2);"
  onmouseout="cancelDelay()" onclick="window.open('http://www.9ask.cn/search/lvsuo.asp')">律所</li>
                  <li class="normal" onmouseover="delaySubSearch(this,3);"
  onmouseout="cancelDelay()" onclick="window.open('http://news.9ask.cn/zhishi/')">知识</li>
                </ul>
                  <div style="padding-left: 30px;color:#333; float:left; left:450px; line-height:25px; top:20px; font-size:14px;  overflow:hidden; font-weight:bold; "><a href="" id="ip_top_s_city_href"><span style="color:#FF0000; text-decoration:underline" id="ip_top_s_city"></span>咨询中心</a></div>
                  <div  style=" padding-left: 30px; color:#333; float:left; left:450px; line-height:25px; top:20px; font-size:14px;  overflow:hidden; font-weight:bold; " ><a href="" id="ip_top_s_prov_href"><span style="color:#FF0000;text-decoration: underline;" id="ip_top_s_prov"></span>咨询中心</a></div>
         </div>
              <div class="TabContent">
                <div class="L">&nbsp;</div>
                <div class="M" id="myTab0_Content0">
                  <ul>
                      <form    name="form2_ask"  id="form2_ask"  method="get"  target="_blank" action="<?php echo url('search/search') ?>" >
                      <li>
                        <input type="text" name="key" id="content" size="49" onfocus="if(this.value=='请您输入问题的关键字，然后点击搜索'){this.value=''}else{this.style.color='#000000'}"  style="color:#999999; "  onclick="this.style.color='#000000';"  onkeydown="if (event.keyCode==13){document.getElementById('form2_ask').submit();return false}"  value="请您输入问题的关键字，然后点击搜索"  />
                      </li>
                      <li class="SearchBtn"><a href="#" onclick="if(document.getElementById('content').value!=''){document.getElementById('form2_ask').submit();return false}else {alert('请您输入关键字，然后再搜索！');document.getElementById('content').focus();return false}"    ><img src="http://img.9ask.cn/index/new_images/search_btn.gif" /></a> <a href="http://www.9ask.cn/souask/ask.asp" target="_blank"><img src="http://img.9ask.cn/index/new_images/shouyeanniu.gif" /></a></li>
                    </form>
                  </ul>
                </div>
                <div class="M none" id="myTab0_Content1">
                  <ul>
                  <form method="get" action="http://www.9ask.cn/search/findindex.asp" name="form1" id="form1" target="_blank" accept-charset="gb2312"    >
                    <li>
                      <input type="text" name="zName" id="zName"  size="10"  value="输入律师姓名" onfocus="if(this.value=='输入律师姓名'){this.value=''}else{this.style.color='#000000'}"  style="color:#999999;width=60px;"  onclick="this.style.color='#000000'"  onkeydown="if (event.keyCode==13){document.getElementById('form1').submit();return false}" />
                    </li>
                    <li>
                      <select name="Region" id="Region" onchange ="changeselect(this.value,this.form)"  style="width:55px" >
                        <option value="0">省份</option>
                        <option value="15">安徽</option>
                        <option value="34">澳门</option>
                        <option value="1">北京</option>
                        <option value="4">重庆</option>
                        <option value="13">福建</option>
                        <option value="16">甘肃</option>
                        <option value="6">广东</option>
                        <option value="17">广西</option>
                        <option value="19">贵州</option>
                        <option value="18">海南</option>
                        <option value="12">河北</option>
                        <option value="20">黑龙江</option>
                        <option value="31">河南</option>
                        <option value="7">湖北</option>
                        <option value="8">湖南</option>
                        <option value="10">江苏</option>
                        <option value="22">江西</option>
                        <option value="23">吉林</option>
                        <option value="14">辽宁</option>
                        <option value="21">内蒙古</option>
                        <option value="24">宁夏</option>
                        <option value="25">青海</option>
                        <option value="5">山东</option>
                        <option value="2">上海</option>
                        <option value="26">山西</option>
                        <option value="27">陕西</option>
                        <option value="11">四川</option>
                        <option value="33">台湾</option>
                        <option value="3">天津</option>
                        <option value="32">香港</option>
                        <option value="29">新疆</option>
                        <option value="28">西藏</option>
                        <option value="30">云南</option>
                        <option value="9">浙江</option>
                      </select>
                    </li>
                    <li>
                       <select  name="City" style="width:50px"><option value="0" selected>城市</option></select>
                       
                       
                    </li>
                    <li>
                      <select name="fatherID"  id="fatherID" style="width:99px" >
                        <option value="0">还可选择专长</option>
                        <option value='3'>├ 民事类</option>
                        <option value='11'>│├ 婚姻家庭</option>
                        <option value='12'>│├ 遗产继承</option>
                        <option value='13'>│├ 消费维权</option>
                        <option value='14'>│├ 抵押担保</option>
                        <option value='15'>│├ 合同纠纷</option>
                        <option value='16'>│├ 劳动纠纷</option>
                        <option value='17'>│├ 人身损害</option>
                        <option value='18'>│├ 保险理赔</option>
                        <option value='19'>│├ 拆迁安置</option>
                        <option value='20'>│├ 债权债务</option>
                        <option value='21'>│├ 医疗纠纷</option>
                        <option value='22'>│├ 交通事故</option>
                        <option value='4'>├ 经济类</option>
                        <option value='23'>│├ 工程建筑</option>
                        <option value='24'>│├ 房产纠纷</option>
                        <option value='25'>│├ 知识产权</option>
                        <option value='26'>│├ 合伙加盟</option>
                        <option value='27'>│├ 个人独资</option>
                        <option value='28'>│├ 金融证券</option>
                        <option value='29'>│├ 银行保险</option>
                        <option value='30'>│├ 不当竞争</option>
                        <option value='31'>│├ 经济仲裁</option>
                        <option value='32'>│├ 网络法律</option>
                        <option value='33'>│├ 招标投标</option>
                        <option value='7'>├ 刑事行政法类</option>
                        <option value='66'>│├ 财税</option>
                        <option value='34'>│├ 取保候审</option>
                        <option value='35'>│├ 刑事辩护</option>
                        <option value='36'>│├ 刑事自讼</option>
                        <option value='37'>│├ 行政复议</option>
                        <option value='38'>│├ 行政诉讼</option>
                        <option value='39'>│├ 国家赔偿</option>
                        <option value='40'>│├ 工商税务</option>
                        <option value='41'>│├ 海关商检</option>
                        <option value='42'>│├ 公安国安</option>
                        <option value='8'>├ 涉外法律类</option>
                        <option value='43'>│├ 海事海商</option>
                        <option value='44'>│├ 国际贸易</option>
                        <option value='45'>│├ 招商引资</option>
                        <option value='46'>│├ 外商投资</option>
                        <option value='47'>│├ 合资合作</option>
                        <option value='48'>│├ WTO事务</option>
                        <option value='49'>│├ 倾销补贴</option>
                        <option value='50'>│├ 涉外仲裁</option>
                        <option value='9'>├ 公司专项法律类</option>
                        <option value='51'>│├ 公司并购</option>
                        <option value='52'>│├ 股份转让</option>
                        <option value='53'>│├ 企业改制</option>
                        <option value='54'>│├ 公司清算</option>
                        <option value='55'>│├ 破产解散</option>
                        <option value='56'>│├ 资产拍卖</option>
                        <option value='67'>│├ 投资融资</option>
                        <option value='10'>├ 其他非讼法律类</option>
                        <option value='57'>│├ 工商查询</option>
                        <option value='58'>│├ 资信调查</option>
                        <option value='59'>│├ 合同审查</option>
                        <option value='60'>│├ 调解谈判</option>
                        <option value='61'>│├ 常年顾问</option>
                        <option value='62'>│├ 私人律师</option>
                        <option value='63'>│├ 文书代理</option>
                        <option value='64'>│├ 移民留学</option>
                        <option value='65'>│├ 商帐追收</option>
                      </select>
                    </li>
                    <li class="SearchBtn"><a href="#" onclick="if(document.getElementById('zName').value=='输入律师姓名'){document.getElementById('zName').value=''}else{};document.charset='gbk';document.getElementById('form1').submit(); "  ><img src="http://img.9ask.cn/index/new_images/search_btn.gif" /></a> <a href="http://www.9ask.cn/souask/ask.asp" target="_blank"><img src="http://img.9ask.cn/index/new_images/shouyeanniu.gif" /></a></li>
                    </ul>
                  </form>
                  </ul>
                </div>
                <div class="M none" id="myTab0_Content2">
                  <ul>
                  <form method="post" action="http://www.9ask.cn/search/solvsuo.asp" name="form1_lvsuo" id="form1_lvsuo" target="_blank" accept-charset="gb2312">
                    <li>
                      <input type="text" name="workname" id="workname" size="21" value="请输入律所名称" onfocus="if(this.value=='请输入律所名称'){this.value=''}else{this.style.color='#000000'}"  style="color:#999999;"  onclick="this.style.color='#000000'"  onkeydown="if (event.keyCode==13){document.getElementById('form1_lvsuo').submit();return false}" />
                    </li>
                    <li>
                      <select name="Region"  id="Region" onchange ="changeselect(this.value,this.form)"  style="width:85px" >
                        <option value="0">省份</option>
                        <option value="15">安徽</option>
                        <option value="34">澳门</option>
                        <option value="1">北京</option>
                        <option value="4">重庆</option>
                        <option value="13">福建</option>
                        <option value="16">甘肃</option>
                        <option value="6">广东</option>
                        <option value="17">广西</option>
                        <option value="19">贵州</option>
                        <option value="18">海南</option>
                        <option value="12">河北</option>
                        <option value="20">黑龙江</option>
                        <option value="31">河南</option>
                        <option value="7">湖北</option>
                        <option value="8">湖南</option>
                        <option value="10">江苏</option>
                        <option value="22">江西</option>
                        <option value="23">吉林</option>
                        <option value="14">辽宁</option>
                        <option value="21">内蒙古</option>
                        <option value="24">宁夏</option>
                        <option value="25">青海</option>
                        <option value="5">山东</option>
                        <option value="2">上海</option>
                        <option value="26">山西</option>
                        <option value="27">陕西</option>
                        <option value="11">四川</option>
                        <option value="33">台湾</option>
                        <option value="3">天津</option>
                        <option value="32">香港</option>
                        <option value="29">新疆</option>
                        <option value="28">西藏</option>
                        <option value="30">云南</option>
                        <option value="9">浙江</option>
                      </select>
                    </li>
                    <li>
                      <select  name="City" style="width:50px">
                        <option value="0" selected="selected">城市</option>
                      </select>
                    </li>
                    <li class="SearchBtn"><a href="#" onclick="if(document.getElementById('workname').value=='请输入律所名称'){document.getElementById('workname').value=''}else{};document.charset='gbk';document.getElementById('form1_lvsuo').submit();"   ><img src="http://img.9ask.cn/index/new_images/search_btn.gif" /></a> <a href="http://www.9ask.cn/souask/ask.asp" target="_blank"><img src="http://img.9ask.cn/index/new_images/shouyeanniu.gif" /></a></li>
                    </ul>
                  </form>
                  </ul>
                </div>
                <div class="M none" id="myTab0_Content3">
                  <ul>
                      <form name="form_zhishi" id="form_zhishi"    action="<?php echo url('api/news_search');?>" method="post"     target="_blank">
                    <li>
                      <input  name='query' type='text' id='query' size="49"   onfocus="if(this.value=='请输入要查询的法律知识关键字'){this.value=''}else{this.style.color='#000000'};"  value="请输入要查询的法律知识关键字" style="color:#999999;"  onclick="this.style.color='#000000'"  onkeydown="if (event.keyCode==13){document.getElementById('form_zhishi').submit();return false}" />
                      <input type="hidden" value="checkstar" name="checkstar" />
                    </li>
                    <li class="SearchBtn"><a href="#"  onclick="if(document.getElementById('query').value=='请输入您要搜索的关键字'){document.getElementById('query').value=''}else{};document.getElementById('form_zhishi').submit();"  ><img src="http://img.9ask.cn/index/new_images/search_btn.gif" /></a> <a href="http://www.9ask.cn/souask/ask.asp" target="_blank"><img src="http://img.9ask.cn/index/new_images/shouyeanniu.gif" /></a></li>
                    </ul>
                    <input type="hidden" name="catalog" value="news,hyjt,Article,ycjc,xfwq,dydb,htjf,ldjf,tdjf,rssh,cqaz,zwzt,yljf,jtsg,qbhs,xszs,xzfy,xsbh,xzss,gjpc,gssw,hgsj,gaga,fcjf,gcjz,hhjm,grdz,jrzq,fagui,yhbx,bdjz,jjzc,wlfl,zbtb,hshs,gjmy,zsyz,wstz,hzhz,qxbt,swzc,gsbg,gfzr,qygz,gsqs,pcjs,zcpm,gscx,zxdc,tjtp,cngw,srls,wsdl,ymlx,szzs,zlq,sbq,zzq,gssl,shpc,caishui,xzcf,xzxk,msss,xsss,sifajianding,lvshifuwu,simuguquan,touzirongzi,hetongshencha,baoxianlipei,zclaw,wto,flal,flws,htfb,fgjd,falvlunwen,lsyx,falvyuanzhu,xueshengpindao,zhishi ,feisusong" />
                    <input type="hidden" name="qsort" value="pubdate" />
                    <input type="hidden" name="qtype" value="title" />
                    <input type="hidden" name="cname" value="法律知识" />
                    <input type="hidden" name="calias" value="zhishi" />
                    <input type="hidden" name="zcid" value="11" />
                  </form>
                  </ul>
                </div>
                <div class="R"></div>
              </div>
            </div>
            <div style="clear:both;"></div>
          </div>
        </div>
</div>
<!--navbar-->
<div id="navbar" class="cwidth">
	<ul>
		<li class="cnav"><a href="http://www.9ask.cn/" target="_blank">中顾首页</a></li>
		<li class="nnav"><a href="http://ask.9ask.cn" target="_blank">法律咨询中心</a></li>
		<li class="nnav"><a href="http://ask.9ask.cn/souask/ask.php" target="_blank">发布咨询</a></li>
		<li class="nnav"><a href="http://ask.9ask.cn/all" target="_blank">最新咨询</a></li>
		<li class="nnav"><a href="http://www.9ask.cn/souask/qs_law.asp" target="_blank">按专长找咨询</a></li>
		<li class="nnav"><a href="http://www.9ask.cn/souask/qs_area.asp" target="_blank">按地区找咨询</a></li>
		<li class="nnav"><a href="http://www.9ask.cn/search/findonline.asp" target="_blank">在线律师</a></li>
		<li class="nnav"><a href="http://www.9ask.cn/search/lvsuo.asp" target="_blank">找律所</a></li>
		<li class="nnav"><a href="http://www.9ask.cn/entrust/" target="_blank">案源中心</a></li>
		<li class="nnav"><a href="http://news.9ask.cn/zhishi/" target="_blank">知识</a></li>
		<li class="nnav"><a href="http://news.9ask.cn/fagui/" target="_blank">法规</a></li>
		<li class="nnav"><a href="<?php echo url('paihangbang/index')?>" target="_blank">积分排行榜</a></li>
		<li class="nnav"><a href="<?php echo url('askstar/index')?>" target="_blank">咨询之星</a></li>
	</ul>
</div>
<?php echo $content;?>
<!--footer-->
<div id="footer" class="cwidth margin_top_10">
		<div class="footer_2 borderblue_1 margin_bottom_7">
				<script src=" http://www.9ask.cn/js/getZXNum.asp" charset="gbk"></script>
		</div>
		<div class="footer_3 margin_bottom_7 borderdark_2">

					<strong>友情链接:</strong>
           <a href="http://www.zgdls.com/" target="_blank">中国大律师</a>
           <a href="http://www.9ask.cn/" target="_blank">法律咨询</a>
           <a href="http://shanghai.koubei.com/fang" target="_blank">上海口碑房产</a>
           <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-1-1&amp;e=2008-2-1&amp;nian=true" target="_blank">历年精华法律咨询 </a>
           <a href="http://www.9ask.cn/rss/zxrss.htm" target="_blank">咨询订阅中心</a>
           <a href="http://www.exam8.com/zige/sifa/" target="_blank">司法考试</a>
           <a href="http://www.ihlaw.cn/" target="_blank">360法网</a>

		</div>
		<div class="footer_4 margin_bottom_7">
			<div>
					<a href="http://www.9ask.cn/about/about.asp" target="_blank">关于中顾法律网</a> |
					<a href="http://www.9ask.cn/about/map.asp" target="_blank">网站地图</a> |
					<a href="http://www.9ask.net" target="_blank">企业服务</a> |
					<a href="http://www.9ask.cn/fa/index.asp" target="_blank">律师服务</a> |
					<a href="http://www.9ask.cn/trust/" target="_blank">诚信律法通服务</a> |
					<a href="http://www.9ask.cn/fa/" target="_blank">商务合作</a> |
					<a href="http://www.9ask.cn/about/shengming.asp" target="_blank">法律声明</a> |
					<a href="http://www.9ask.cn/zhuanti/20090907/" target="_blank">挑错或提意见</a> |
					<a href="http://www.9ask.cn/about/zpxx.asp" target="_blank">诚征英才</a> |
					<a href="http://www.9ask.cn/link/lj.asp" target="_blank">欢迎合作</a> |
					<a onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.9ask.cn');" href="#">设为首页</a> |
					<a href="#" onclick="javascript:window.external.addFavorite('http://www.9ask.cn','中顾法律网');" style="border: 0pt none;">加入收藏</a>
			</div>
		</div>
		<div class="footer_5">
				中顾法律网版权所有 Copyright 2005-2015国家信息产业部备案 <a href="http://www.miibeian.gov.cn/"><span>鲁ICP备05047375</span></a><br>网站使用帮助QQ群:27971708　客服热线:0531-55511555　客服邮箱:<a href="mailto:kefu01@9ask.com">kefu01@9ask.com</a>
		</div>
	</div>
</div>
</body>
</html>
<script src="<?php echo url('api/getarea');?>" charset="utf-8"></script>
 <?php cs()->registerCoreScript('jquery');?>
<?php cs()->registerScriptFile(resBu('scripts/jquery.tools.min.js'), CClientScript::POS_END);?>
<?php cs()->registerScriptFile(resBu('scripts/common.js'), CClientScript::POS_END);?>
<script src="http://www.google-analytics.com/urchin.js"  type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-390261-1";
urchinTracker();
</script>