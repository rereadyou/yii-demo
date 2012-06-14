<?php cs()->registerCssFile(resBu('css/list.css', 'screen'));?>
<!--data-->
<SCRIPT language="JavaScript" type="text/JavaScript">
function disQstate(s){switch(s){
case 0: var op="<img src='http://www.9ask.cn/souask/img/icn_time.gif' alt='待解决问题'>"; break;
case 1: var op="<img src='http://www.9ask.cn/souask/img/icn_ok.gif' alt='已解决问题'>"; break;
case 4: var op="<img src='http://www.9ask.cn/souask/img/icn_close.gif' alt='问题已关闭'>"; break;
case 5: var op="<img src='http://www.9ask.cn/souask/img/icn_del.gif' alt='问题已删除'>"; break;
default: var op="未知";}
document.write(op);}
</SCRIPT>
<div class="cwidth footer_2 borderblue_1 margin_top_10" style="width:936px;">
				中顾法律网<a href="http://www.9ask.cn/souask/" target="_blank">法律咨询</a>中心：昨s日公开法律咨询 <span>4279</span> 条,一对一咨询 <span>21530</span> 条,昨日委托 <span>367</span> 条, 共解决当事人<span>2043761</span> 个问题。<span><a href="http://www.9ask.cn/souask/ask.asp" target="_blank"><font color="#ff0000"><b>我要发布法律咨询</b></font></a></span> <span><a href="http://www.9ask.cn/usersite/Wt1/Wtadd.asp" target="_blank"><font color="#ff0000"><b>我要请律师打官司</b></font></a></span>
		</div>
<!--qnav-->
<div id="qnav" class="cwidth borderdark margin_top_10">
	<ul>
		<li>咨询首页</li>
		<li>咨询列表</li>
		<li>按地区找咨询</li>
		<li>按专长找咨询</li>
		<li>历年精华法律咨询</li>
		<li>律师库</li>
		<li>积分排行榜</li>
		<li>咨询之星</li>
		<li>帮助中心</li>
	</ul>
</div>
<!--locabox-->
<div id="locbox" class="cwidth borderdark margin_top_10">
	<span></span>
	<div class="f_l margin_top_10 grey">您的位置：<a href="http://www.9ask.cn/" target="_blank">中顾法律网首页</a> > <a href="http://ask.9ask.cn/" target="_blank">法律咨询</a> > 咨询列表</div>
	<div class="f_r"><img src="images/limager2.jpg" width="263" height="37" /></div>
</div>

<!--pagebody-->
<div id="pagebody" class="cwidth margin_top_10">
	<!--left-->
	<div class="left f_l">
		<!--listhead-->
		<div class="listhead">
			<ul>
                                <li class="<?php if (empty ($menu) || $menu==1)  {echo 'over';} else { echo 'nor'; } ?>" id="menu_1" ><a href="<?php echo url('ask/listall')?>">全部最新咨询</a></li>
				<li class="<?php if ($menu==2)  {echo 'over';} else { echo 'nor'; } ?>" id="menu_2" ><a href="<?php echo url('ask/listrecommend')?>">精彩推荐</a></li>
				<li class="<?php if ($menu==3)  {echo 'over';} else { echo 'nor'; } ?>" id="menu_3" ><a href="<?php echo url('ask/listnosolved')?>">待解决问题</a></li>
				<li class="<?php if ($menu==4)  {echo 'over';} else { echo 'nor'; } ?>" id="menu_4"><a href="<?php echo url('ask/listsolved')?>" >新解决问题</a></li>
                                <li class="<?php if ($menu==5)  {echo 'over';} else { echo 'nor'; } ?>" id="menu_5" ><a href="<?php echo url('ask/listhot')?>">热点问题</a></li>
				<li class="<?php if ($menu==6)  {echo 'over';} else { echo 'nor'; } ?>" id="menu_6"><a href="<?php echo url('ask/listhighscore')?>">高分问题</a></li>
				<li class="<?php if ($menu==7)  {echo 'over';} else { echo 'nor'; } ?>"id="menu_7" ><a href="<?php echo url('ask/listnoanswer')?>">零回复问题</a></li>
			</ul>
		</div>
		<!--listbody-->
		<div class="listbody margin_top_10">
			<table border="0" cellpadding="0" cellspacing="1" class="listtable">
				<thead>
					<tr>
						<td class="ititle">标题</td>
						<td class="readcount">阅读</td>
						<td class="pointers">悬赏分</td>
						<td class="answers">回答</td>
						<td class="states">状态</td>
						<td class="times">发布时间</td>
					</tr>
				</thead>
				<tbody>
<?php
foreach ($questions as $k=>$v) {
	 echo $v->oaskuser->TrueName . "|积分=" . $v->oaskuser->jifen . "|电话等于=" . $v->oaskuser->mobile . "<br/>";
}
?>
				</tbody>
			</table>
		</div>
		<!--listfoot-->
		<div class="listfoot margin_top_10">
<?php
$this->widget('CLinkPager', array(
    'cssFile' => 'css/pagerlist.css',
	'pages' => $pages,
    'header' => '',
    'firstPageLabel' => '首页',
    'lastPageLabel' => '末页',
    'nextPageLabel' => '下页',
    'prevPageLabel' => '上页',
));
?>
		</div>
	</div>
        <?php
        exit()
        ?>
	<!--right-->
	<div class="right f_r">
		<!--rightone-->
		<div class="margin_bottom_10"><img src="images/right1.jpg"/></div>
		<div class="margin_bottom_10"><img src="images/right2.jpg"/></div>
		<div class="righthead borderdark margin_top_10 ft14 ftb padding_left_10">推荐<span class="ftred"><?php echo $pos['name'];?></span>律师</div>
		<div class="rightbody borderdark">
			<div class="ftred padding_top_10 padding_left_10 padding_bottom_10">电话咨询免费，请说明来源于中顾网</div>
			<div class="rightlist1">
				<ul>
<?php
if (isset($_GET['area']))
{//如果是类别下,就调用广告系统的广告位
?>
<script src="<?php echo url('billask/arealistright')?>"></script>
<?
} else {
?>
<script src="<?php echo url('billask/newlistright')?>"></script>
<?php
}
?>
				</ul>
				<div style="clear:both"></div>
			</div>
		</div>
		<!--righttwo-->
		<div class="righthead borderdark margin_top_10 ft14 ftb padding_left_10"><span class="ftred"><?php echo $pos['name'];?></span></span>律师积分排行榜</div>
		<div class="rightbody borderdark">
			<div class="rightlist2_head">
				<ul>
					<li class="rover" id="week_lawyer_highscore_panel">周排行</li>
					<li class="rnorm" id="month_lawyer_highscore_panel">月排行</li>
				</ul>
			</div>
			<div class="rightlist2" id="week_lawyer_highscore">
				<ul>
<?php
foreach($weekScoreLawyers as $k=>$v){
?>
					<li>
						<div class="nbg"><?php echo $k+1;?></div>
                                                <div class="rlt"><a href='<?php echo $v['url'];?>' target="_blank" ><?php echo $v['truename'];?>律师</a></div>
						<div class="jfb"><?php echo $v['jifen'];?>分</div>
					</li>
<?php
}
?>
				</ul>
				<div style="clear:both"></div>
			</div>
            <div class="rightlist2" id="month_lawyer_highscore">
            	<ul>
<?php
foreach($monthScoreLawyers as $k=>$v){
?>
					<li>
						<div class="nbg"><?php echo $k+1;?></div>
                                                <div class="rlt"><a href='<?php echo $v['url'];?>' target="_blank" ><?php echo $v['truename'];?>律师</a></div>
						<div class="jfb"><?php echo $v['jifen'];?>分</div>
					</li>
<?php
}
?>
                </ul>
                <div style="clear:both"></div>
            </div>
		</div>
<script language="javascript">
(jQuery)(function(){
	jQuery('#month_lawyer_highscore').hide();

	$('#week_lawyer_highscore_panel').bind('click', function() {
		$('#month_lawyer_highscore_panel').removeClass('rover').addClass('rnorm');
		$('#week_lawyer_highscore_panel').removeClass('rnorm').addClass('rover');
		jQuery('#month_lawyer_highscore').hide();
		jQuery('#week_lawyer_highscore').show();
	});

	$('#month_lawyer_highscore_panel').bind('click', function() {
		$('#week_lawyer_highscore_panel').removeClass('rover').addClass('rnorm');
		$('#month_lawyer_highscore_panel').removeClass('rnorm').addClass('rover');
		jQuery('#month_lawyer_highscore').show();
		jQuery('#week_lawyer_highscore').hide();
	});

});

</script>
		<!--rightthree-->
	</div>
	<div style="clear:both"></div>
</div>

<!--pagefooter-->