
<div class="ma_lsb">
<div class="ma_gk_tob">
 <div class="zti_a"><span class="ma_zt">个人资料管理</span> >>被采纳的咨询 </div>
 <div class="bolck10"></div>
    <div class="ld_sc">
    <ul>
       <li style="width:400px; text-align:center;">标题</li>
      <li style="width:140px;">咨询人</li>
      <li style="width:130px">回复数</li>
      <li>咨询时间</li>
    </ul>
  </div>
</div>
  <div class="ma_gl_ma">
  <div class="lb_ds_a">
    <ul>
        <?php
      foreach($questions as $k=>$v){
        ?>
      <li style="width:390px; text-align:left; padding-left:18px;">·<a   href='<?php echo AskTool::Qustion_GetUrl($v->ID)?>' target=_blank ><?php echo $v->title ?></a></li>
      <li style="width:130px;"><?php echo $v->sender ?></li>
      <li style="width:130px"><?php echo $v->replys ?></li>
      <li><?php  echo date('Y-m-d',strtotime($v->sendtime)); ?></li>
      <?php
        }
        ?>
    </ul>
  </div>

  <div class="ma_shbd" style="background-color:#FFFFFF; width:720px; height:35px; text-align:center; margin-left:25px; padding-top:10px;">

<span style="color:#000;">
    <?php
    $this->widget('CLinkPager', array(
         'cssFile' => '/css/pager.css',
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
  <div><img  src="/images/user/gkzx_08.gif" width="800" height="13" /></div>
</div>
