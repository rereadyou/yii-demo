<?php 
       foreach($news as $k=>$v){

		    echo "<div class='text_a'>
			      	<div class='text_b'>
			      		<a href=".url('user/oaskGonggao/view/',array('id'=>$v->ID))." target=_blank >".AskTool::str_cut($v->title, 30, '')."</a> —
		    			".date('Y-m-d', strtotime($v->time))."
			      	</div>
			        <div class='pic_a'>
			        	<img src='$v->picurl' width='75px;' height='75px;'/>
			        </div>
			         ".AskTool::str_cut($v->content, 120, '...')."<br />
			         关注度：36520      
			     </div>";
		}
		?>
<link href="<?php echo bu(); ?>/css/user/index.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE1 {color: #155d98}
-->
</style>
<?php cs()->registerCoreScript('jquery');?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.marqueeZFJ.js"></script>
<script type="text/javascript">
jQuery(function() {
	jQuery(".txes_dyhs").marqueeZFJ({speed:10,step:2,direction:'left'});
});
</script>
<div style="width:803px;">
 <div id="center">
 <!--公告专区-->
  <div id="ann_top">
   <div class="top_a"><img  src="/images/user/gzyh_r3_c2.jpg" /></div>
   <div class="top_b"></div>
   <div class="top_a"><img  src="/images/user/gzyh_r3_c22.jpg" /></div>
   <div id="main_a">
    <div class="main_b">
     <div class="title_a">
      <div class="title_ic"><img  src="/images/user/ic_6.jpg" align="absmiddle" /> 公告专区</div>
      <div class="more_1">更多</div>
     </div>
     <div class="center_a" >
      <div style="width:24px; float:left; margin-top:50px;"><img  src="/images/user/gzyh_r7_c5.jpg" /></div>
	  <div class="txes_dyhs ">
	  <ul style="width:470px;">
	  <li>
	  <div style="font-size:12px; font-weight:bold; color:#999;">亚烂尾别墅成流浪 —2011-03-09</div>
       <div class="pic_a"><img  src="/images/user/pic_c1.jpg" /></div>
	   <div style=" float:left; width:125px;">有网友称，在三亚湾路棕榈泉国际公寓西侧隐藏着一个烂尾楼项目藏着一个烂尾楼项目
	  </div><br />
      <div class="bolck10"></div>
	  </li>
	    <li>
	  <div style="font-size:12px; font-weight:bold; color:#999;">三烂尾别墅成流浪 —2011-03-09</div>
       <div class="pic_a"><img  src="/images/user/pic_c1.jpg" /></div>
	   <div style=" float:left; width:125px;">有网友称，在三亚湾路棕榈泉国际公寓西侧隐藏着一个烂尾楼项目藏着一个烂尾楼项目
	  </div>
	   <div class="bolck10"></div>
	  </li>
	  <li>
	  <div style="font-size:12px; font-weight:bold; color:#999;">亚烂尾别墅成流浪 —2011-03-09</div>
       <div class="pic_a"><img  src="/images/user/pic_c1.jpg" /></div>
	   <div style=" float:left; width:125px;">有网友称，在三亚湾路棕榈泉国际公寓西侧隐藏着一个烂尾楼项目藏着一个烂尾楼项目
	  </div><br />
      <div class="bolck10"></div>
	  </li>
	    <li>
	  <div style="font-size:12px; font-weight:bold; color:#999;">三烂尾别墅成流浪 —2011-03-09</div>
       <div class="pic_a"><img  src="/images/user/pic_c1.jpg" /></div>
	   <div style=" float:left; width:125px;">有网友称，在三亚湾路棕榈泉国际公寓西侧隐藏着一个烂尾楼项目藏着一个烂尾楼项目
	  </div>
	   <div class="bolck10"></div>
	  </li>
	   </ul>
	  </div>
	  <div style="width:24px; float:right; margin-top:50px;"><img  src="/images/user/gzyh_r7_c20.jpg" /></div>
     
     </div>
    </div>
   </div>
   <div class="top_a"><img  src="/images/user/gzyh_r9_c2.jpg" /></div>
   <div class="top_c"></div>
   <div class="top_a"><img  src="/images/user/gzyh_r9_c22.jpg" /></div>
  </div>
  <!--左边下方-->
  <div class="ls_bot">
   <div class="ls_b1">
    <div class="ls_b2">
     <div class="ls_bt">+1</div>
    </div>
    <div class="ls_b3"> 
     <div class="ls_bt">+1</div>
    </div>
    <div class="ls_b4">
     <div class="ls_bt">+1</div>
    </div>
    <div class="ls_b5">
     <div class="ls_bt">+1</div>
    </div>
    <div class="ls_b6">
     <div class="ls_bt">+1</div>
    </div>
    <div class="ls_b7">
     <div class="ls_bt">+1</div>
    </div>
    <div class="ls_b8">
     <div class="ls_bt">+1</div>
    </div>
    <div class="ls_b9">
     <div class="ls_bt">+1</div>
    </div>
    <div class="ls_b10">
     <div class="ls_bt">+1</div>
    </div>
    <div class="ls_b11">
     <div class="ls_bt">+1</div>
    </div>
   </div>
  </div>
  
  <div class="le"></div>
  </div>
 <div id="a_right">
  <div class="yhmess"><img  src="/images/user/rt_title1.jpg" />
  <div class="yh_pic">
   <div class="yh_p1"><img  src="/images/user/b_r2_c6.jpg" width="82" height="92" /></div>
   <div class="yh_p2">用户名：<span class="rt_lan">卜越</span><br />

[<span class="rt_blue">修改用户名</span>]　<br />[<span class="rt_blue">修改密码</span>]</div>
  </div>
   <div class="le"></div>
   <div class="mess_t1">好评数：20个（如何获得好评）<br />
 
我的注册日期：2011-03-09 <br />

上次登陆日期：2011-02-28 </div>
  </div>
  <div class="acctive"><img  src="/images/user/rt_title.jpg" />
   <div class="acc_pic">
    <div class="acc_p1"><img  src="/images/user/rt_left2.jpg" /></div>
    <div class="acc_p2"></div>
    <div class="acc_p1"><img  src="/images/user/rt_rt1.jpg" /></div>
    <div class="acc_main">
    
     <div class="acc_m1"><img  src="/images/user/gzyh_r17_c26.jpg" /></div></div>  
     <div class="acc_p1"><img  src="/images/user/rt_left1.jpg" /></div>
     <div class="acc_p3"></div>
     <div class="acc_p1"><img  src="/images/user/rt_rt2.jpg" /></div>
   </div>
   <div id="a_text">
     <ul>
       <li>中顾法律网举办的律师原创文章...</li>
       <li>律师亲身参与办理的案件</li>
       <li>肯德基部分门店 已下架“黄...</li>
       <li>中顾法律网举办的律师原创文章...</li>
       <li>律师亲身参与办理的案件</li>
     </ul>
   </div>
  </div>
 </div>
</div>