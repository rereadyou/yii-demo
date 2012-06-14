<div class="ma">
	<div class="zti_a"><span class="ma_zt">网友评论管理 </span> >>  好评/差评</div>
  <div class="bolck10"></div>
  <div class="hp_top">
   <div style="width:44px; float:left; height:27px;"></div>
   <div class="hp_t2"><a href="<?php echo url("user/oaskusercomment/lscomment")?>"><font color="#000000">好评（<?php echo $pages->itemCount?>）</font></a></div>
   <div class="hp_t1"><a href="<?php echo url("user/oaskusercomment/lscommentchaping")?>"><font color="#ffffff">差评</font>（<?php echo $numchaping;?>）</a></div>
  </div>
  <div class="hp_text">
     <?php
     foreach($questions as  $k=>$v)
         {
     ?>
   <div class="ah_t1">
    <div class="ah_t2">·<?php echo $v->question->title?></div>
    <div class="ah_t3">[<span class="ah_ju"><a href="<?php echo AskTool::Qustion_GetUrl($v->question->ID)?>" target="_blank"><font color="#000000">查看详情</font></a></span>]</div>
   </div>
 <?php
         }
  ?>

  <div class="ma_shbd" style="background-color:#FFFFFF; width:720px; height:35px; text-align:center; margin-left:25px; padding-top:10px;">

<span style="color:#000;">
    <?php
    $this->widget('CLinkPager', array(
	'pages' => $pages,
    'header' => '翻页',
    'firstPageLabel' => '首页',
    'lastPageLabel' => '末页',
    'nextPageLabel' => '下页',
    'prevPageLabel' => '上页',
));
    ?></span>
  </div>
  </div>
</div>
 