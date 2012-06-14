
	<!--宣传通栏-->
	<div class="cwidth margin_top_10"><a href="http://www.9ask.cn/usersite/home/yuzhengchun/" target="_blank"><img src="/images/gb2.jpg" width="950" height="90" /></a></div>

<?php
foreach($categoryData as $k=>$v){
	echo '<!-- begin category -->';
	echo '<div class="three margin_top_10">';
	echo '<div class="left margin_right_10">';
	echo '<div class="thead3">'.$v["name"].'相关法律知识</div>';
	echo '<div class="cbody zsbody">';
	foreach($v['zhishi'] as $l=>$w) {
		echo '<a title="'.$w['name'].'" href="http://news.9ask.cn/'.$w['dir'].'/">'.$w['name'].'</a>';
	}
	echo '</div></div>';
	echo '<!--分类咨询-->
			<div class="center">
			<div class="thead3">
				<h4>'.$v["name"].'法律咨询</h4>
				<div class="more">更多</div>
			</div>
			<div class="cbody qqbox padding_top_10">
			<div class="zsqboxhead padding_left_10">';
	$ii=0;
	foreach($v['zixun'] as $l=>$w) {
		$ii++;
		if ($ii==1) {
			echo '<span id="zixun_'.$v['id'].'_'.$ii.'_ctrlpanel" class="oback">'.$w['name'].'</span>';// 或不是箭头的
		}
		else {
			echo '<span id="zixun_'.$v['id'].'_'.$ii.'_ctrlpanel" class="cback">'.$w['name'].'</span>';// 或不是箭头的
		}
	}
	echo '</div>';
	$ii=0;
	foreach($v['zixun']	as $l=>$w) {
		$ii++;
		echo '<ul id="zixun_'.$v['id'].'_'.$ii.'_showpanel">';
		foreach($w['data'] as $m=>$x) {
			echo '<li><a href="http://ask.9ask.cn/s_'.$x->fenleidir.'">['.$x->topic.
			']</a> <a href="http://ask.9ask.cn/question/'.$x->year.'/'.$x->ID.'.html">'.mb_substr($x->title,0,14,'utf-8').
			'</a><div class="answer_p">回复者：';
			if($x->LastReply=='') { echo '无回复'; }
			else { echo $x->LastReply; }
			echo '</div></li>';
		}
		echo '</ul>';
	}
	echo '</div></div>';
	// 显示JS脚本
	echo "
<script>
var current_ctrl_".$v['id']."=1;
(jQuery)(function(){
	for(var k=2;k<5;k++) {
		jQuery('#zixun_'+".$v['id']."+'_'+k+'_showpanel').hide();
	}
});
";
for($ctrl=1;$ctrl<5;$ctrl++) {
	echo "
jQuery('#zixun_'+".$v['id']."+'_'+".$ctrl."+'_ctrlpanel').bind({
	mouseenter:function(){
		if(current_ctrl_".$v['id']."==".$ctrl.") { return false; }
		var tmp = current_ctrl_".$v['id'].";
		jQuery('#zixun_'+".$v['id']."+'_'+".$ctrl."+'_ctrlpanel').removeClass('cback').addClass('oback');
		jQuery('#zixun_'+".$v['id']."+'_'+tmp+'_ctrlpanel').removeClass('oback').addClass('cback');
		jQuery('#zixun_'+".$v['id']."+'_'+".$ctrl."+'_showpanel').show();
		jQuery('#zixun_'+".$v['id']."+'_'+tmp+'_showpanel').hide();
		current_ctrl_".$v['id']."=".$ctrl.";
	}
});
";
}
	echo "
</script>
";
	echo '<div class="right">
			<div class="thead3">推荐'.$v['name'].'律师</div>
			<div class="cbody zsceptbox">
				<ul>';
	//$i=0;
	//var_dump($v['lvshi']);
	//foreach($v['lvshi'] as $l=>$w) {
		//$i++;
		//echo '<li><div class="o1">'.$i.'、</div><div class="o2">'.$w->btitle.'&nbsp;&nbsp; '.$w->mobile.'</div></li>';
	//}
	//echo '</ul><div style="clear:both"></div></div></div></div>';

}
?>

<!--three-->
<!--
	<div class="three margin_top_10">
		<div class="left margin_right_10">
			<div class="thead3">民事类相关法律知识</div>
			<div class="cbody zsbody">

                <a href="http://news.9ask.cn/hyjt/">婚姻家庭</a>
                <a title="家庭暴力" href="http://news.9ask.cn/hyjt/jtbl/">家庭暴力</a>
                <a title="离婚赔偿" href="http://news.9ask.cn/hyjt/lhpc/">离婚赔偿</a><br>
                <a title="离婚" href="http://news.9ask.cn/hyjt/syf/">子女收养</a>
                <a title="重婚" href="http://news.9ask.cn/hyjt/chlaw/">重婚知识</a>
                <a title="离婚协议书 " href="http://news.9ask.cn/hyjt/lhxys/">离婚协议</a><br>
                <a title="交通事故鉴定" href="http://news.9ask.cn/jtsg/sgjd/">事故鉴定</a>
                <a title="债权债务" href="http://news.9ask.cn/zwzt/">债权债务</a>
                <a title="个人债务" href="http://news.9ask.cn/zwzt/grzw/">个人债务</a><br>
                <a title="风险防范" href="http://news.9ask.cn/zwzt/fxff/">风险防范</a>
                <a title="债权转让" href="http://news.9ask.cn/zwzt/zqzr/zqzr/">债权转让</a>
                <a title="金融债务" href="http://news.9ask.cn/zwzt/jrzw/">金融债务</a><br>
                <a title="债务重组" href="http://news.9ask.cn/zwzt/zwzz/">债务重组</a>
                <a title="企业债务" href="http://news.9ask.cn/zwzt/qyzw/">企业债务</a>
                <a title="损害赔偿" href="http://news.9ask.cn/shpc/">损害赔偿</a><br>
                <a title="消费维权" href="http://news.9ask.cn/xfwq">消费维权</a>
                <a title="遗嘱继承" href="http://news.9ask.cn/ycjc/yzjc/">遗嘱继承</a>
                <a title="遗产继承" href="http://news.9ask.cn/ycjc/">遗产继承</a><br>
                <a title="抵押担保" href="http://news.9ask.cn/dydb">抵押担保</a>
                <a title="合同纠纷" href="http://news.9ask.cn/htjf/">合同纠纷</a>
                <a title="合同转让" href="http://news.9ask.cn/htjf/htzr/">合同转让</a><br>
                <a title="合同效力" href="http://news.9ask.cn/htjf/htxiaoli/">合同效力</a>
                <a title="合同赔偿" href="http://news.9ask.cn/htjf/hetongpeichang/">合同赔偿</a>
                <a title="合同履行" href="http://news.9ask.cn/htjf/htlvxing/">合同履行</a>

			</div>
		</div>

		<div class="center">
			<div class="thead3">
				<h4>民事法律类咨询</h4>
				<div class="more">更多</div>
			</div>
			<div class="cbody qqbox padding_top_10">
				<div class="zsqboxhead padding_left_10">
					<span class="cback">人身损害</span>
					<span class="oback">医疗纠纷</span>
					<span class="cback">债权债务</span>
					<span class="cback">交通事故</span>
				</div>
				<ul>
					<li><a href="#">[人身损害]</a> <a href="#">醉酒驾车拘留还是拘役，什么区别</a><div class="answer_p">回复者：无回复</div></li>
					<li><a href="#">[人身损害]</a> <a href="#">醉酒驾车拘留还是拘役，什么区别</a><div class="answer_p">回复者：无回复</div></li>
					<li><a href="#">[人身损害]</a> <a href="#">醉酒驾车拘留还是拘役，什么区别</a><div class="answer_p">回复者：无回复</div></li>
					<li><a href="#">[人身损害]</a> <a href="#">醉酒驾车拘留还是拘役，什么区别</a><div class="answer_p">回复者：无回复</div></li>
					<li><a href="#">[人身损害]</a> <a href="#">醉酒驾车拘留还是拘役，什么区别</a><div class="answer_p">回复者：无回复</div></li>
					<li><a href="#">[人身损害]</a> <a href="#">醉酒驾车拘留还是拘役，什么区别</a><div class="answer_p">回复者：无回复</div></li>
				</ul>
			</div>
		</div>
		<div class="right">
			<div class="thead3">推荐民事类律师</div>
			<div class="cbody zsceptbox">
				<ul>
					<li>
						<div class="o1">1、</div>
						<div class="o2">薛从刚&nbsp;&nbsp; 16844448888</div>
					</li>
					<li>
						<div class="o1">1、</div>
						<div class="o2">薛从刚&nbsp;&nbsp; 16844448888</div>
					</li>
					<li>
						<div class="o1">3、</div>
						<div class="o3">
							<div class="iphoto"><img src="/images/w.jpg" width="60" height="80" /></div>
							<p>王娇艳律师</p>
							<p>电话：16588887777</p>
							<p>专长：婚姻家庭</p>
							<p><img src="/images/askme.jpg" width="50" height="17" /></p>
						</div>
					</li>
					<li>
						<div class="o1">1、</div>
						<div class="o2">薛从刚&nbsp;&nbsp; 16844448888</div>
					</li>

				</ul>
				<div style="clear:both"></div>
			</div>
		</div>
	</div>
-->
<!--three-->
<!-- over category -->

<!--数据-->
	<div class="cwidth four margin_top_10">
		<div class="left margin_right_10">
			<div class="thead4">免费法律咨询</div>
			<div class="borderdark padding_10 mfdk">
				中顾法律网免费法律咨询频道，是一个专门为有法律需求的公众开设的免费服务专区，在这里我们拥有一个几万名专业律师组成的强大律师团队，您只需要将您的法律咨询进行发布，立刻就会得到回复。点击这里立刻发布免费法律咨询。
			</div>
		</div>
		<div class="center margin_right_10">
			<div class="thead4">上周活跃律师</div>
			<div class="borderdark padding_10 ph_c">
				<ul>
<?php
foreach($ActiveBigLawyer as $v){
	echo '<li><div class="q1">'.$v['truename'].'律师</div><div class="q2">'.
		$v['pname'].$v['cname'].'</div><div class="q3">'.$v['jifen'].'分</div></li>';
}
?>
				</ul>
			</div>
		</div>
		<div class="center1 margin_right_10">
			<div class="thead4">总积分排行榜</div>
			<div class="borderdark padding_10 ph_c">
				<ul>
<?php
foreach($BigLawyer as $v){
	echo '<li><div class="q1">'.$v->TrueName.'律师</div><div class="q2">'.
		$v->prov->pname.$v->city->cname.'</div><div class="q3">'.$v->jifen.'分</div></li>';
}
?>
				</ul>
			</div>
		</div>
		<div class="right">
			<div class="thead4">在线律师</div>
			<div class="borderdark padding_10 ph_c">
				<ul>
<?php
foreach($OnlineLawyer as $v){
	echo '<li><div class="q1">'.$v['truename'].'律师</div><div class="q2">'.
		$v['pname'].$v['cname'].'</div><div class="q3">'.$v['jifen'].'分</div></li>';
}
?>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--pagefooter-->
<!--footer-->
<div id="footer" class="cwidth margin_top_10">

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
