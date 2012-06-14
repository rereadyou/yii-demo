<div class="ma_lsb">
<div class="ma_lsb_tob">
	<div class="zti_a"><span class="ma_zt">个人资料管理</span> >>  我的最新一对一咨询</div>
	<div class="bolck10"></div>
    <div class="ld_sc">
    <ul>
      <li style="width:540px; text-align:center;">标题</li>
      <li style="width:140px;">咨询人</li>
      <li>咨询时间</li>
    </ul>
  </div>
</div>
  <div class="ma_lsb_ma">
  <div class="lb_ds_a">
    <ul>
        <?php
        foreach($questions as $k=>$v)
            {
        
        ?>
      <li style="width:412px; text-align:left; padding-left:18px;">·<a href='<?php echo url('user/message/view',array('id'=>$v->ID,'class'=>'askme'))?>'><?php echo $v->Title  ?></a></li>
	   <li style="width:110px; height:35px"><a href='<?php echo url('user/message/view',array('id'=>$v->ID,'class'=>'askme'))?>'><img  src="/images/user/zg_d.gif" width="46" height="26" /></a></li>
      <li style="width:130px;"><?php echo $v->oaskuser->name  ?></li>
      <li><?php   echo date('Y-m-d',strtotime($v->AddDate))  ?></li>
        <?php        
        }
        ?>
    </ul>
  </div>
  <div class="ma_shbd" style="background-color:#FFFFFF; width:720px; height:35px; text-align:center; margin-left:25px; padding-top:10px;">
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
  ?>
  </div>
  </div>
  <div><img  src="/images/user/lbnr_09.gif" /></div>
</div>