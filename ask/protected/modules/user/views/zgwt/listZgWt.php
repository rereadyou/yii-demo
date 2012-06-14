<div class="ma_lsb">
    <div class="ma_gk_tob">
        <div class="zti_a"><span class="ma_zt">个人资料管理</span> >>
            <?php
            if(isset ($_GET['t'])) {
                if($_GET['t']=='own') {
                    echo "我接洽过的案件委托";
                }
                else {
                    echo "我所在地区的案件委托";
                }
            }
            ?>
        </div>
        <div class="bolck10"></div>
        <div class="ld_sc">
            <ul>
                <li style="width:400px; text-align:center;">标题</li>
                <li style="width:140px;">委托人</li>
                <li style="width:130px">接洽次数</li>
                <li>委托时间</li>
            </ul>
        </div>
    </div>
    <div class="ma_gl_ma">
        <div class="lb_ds_a">
            <ul>
<?php
foreach ($wt as $k=>$v) {
//			echo "<li>".CHtml::link($v->title,url('user/zgwt/view',array('wtid'=>$v->wtID))). 'author:' . $v->userName ."</li>";
                    echo "<li style='width:280px; text-align:left; padding-left:18px;'>·".
                            CHtml::link(AskTool::str_cut($v->title, 36, ''),'http://www.9ask.cn/entrust/'.$v->wtID, array('target'=>'_blank'))."</li>
				  <li style='width:110px; height:35px;'>".
                            CHtml::link("<img  src='/images/user/zg_d.gif' width='46' height='26' />", 'http://www.9ask.cn/entrust/'.$v->wtID, array('target'=>'_blank')).
                            "</li>
			      <li style='width:130px;'>$v->userName</li>
				  	  <li style='width:130px'>".$v->hf_num->hf_num."</li>
			      <li>".date('Y-m-d', strtotime($v->addDate))."</li>";
                }
                ?>
            </ul>
        </div>

        <div class="ma_shbd" style="background-color:#FFFFFF; width:720px; height:35px; text-align:center; margin-left:25px; padding-top:10px;font-size:11px;">

<?php
$this->widget('CLinkPager', array(
                    'cssFile' => '/css/pager.css',
                    'pages' => $pages,
                    'header' => ''.$pages->getItemCount().'条记录，总共'.$pages->getPageCount().'页',
                    'firstPageLabel' => '首页',
                    'lastPageLabel' => '末页',
                    'nextPageLabel' => '下页',
                    'prevPageLabel' => '上页',
            ));
            ?>

        </div>

    </div>
    <div><img  src="/images/user/gkzx_08.gif" width="800" height="13" /></div>
</div>

