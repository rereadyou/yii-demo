<?php cs()->registerCssFile(resBu('/css/list.css', 'screen'));?> 
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
<?php $this->widget('navzixunnum');?>
<!--qnav-->
<?php $this->widget('askmenumiddle');?>
<!--locabox-->
<?php
/*
 * 新增判断程序，判断用户是否为版主
*/
$ismsaster=Webmastertools::fenleimaster($categoryid, app()->user->id);
?>
<div id="locbox" class="cwidth borderdark margin_top_10">
    <span></span>
    <div class="f_l margin_top_10 grey">您的位置：<a href="http://www.9ask.cn/" target="_blank">中顾法律网首页</a> > <a href="http://ask.9ask.cn/" target="_blank">法律咨询</a> > 咨询列表</div>
    <div class="f_r"><img src="/images/limager2.jpg" width="263" height="37" /></div>
</div>

<!--pagebody-->
<div id="pagebody" class="cwidth margin_top_10">
    <!--left-->
    <div class="left f_l">
        <!--listhead-->
        <div class="listhead">
            <ul>
                <li class="<?php if (empty ($menu) || $menu==1) {
    echo 'over';
} else {
    echo 'nor';
} ?>" id="menu_1" ><a href="<?php echo url('ask/categorylistall',array('cname'=>$_GET['cname']))?>">全部最新咨询</a></li>
                <li class="<?php if ($menu==2) {
    echo 'over';
} else {
    echo 'nor';
} ?>" id="menu_2" ><a href="<?php echo url('ask/categorylistrecommend',array('cname'=>$_GET['cname']))?>">精彩推荐</a></li>
                <li class="<?php if ($menu==3) {
    echo 'over';
} else {
    echo 'nor';
} ?>" id="menu_3" ><a href="<?php echo url('ask/categorylistnosolved',array('cname'=>$_GET['cname']))?>">待解决问题</a></li>
                <li class="<?php if ($menu==4) {
    echo 'over';
} else {
    echo 'nor';
} ?>" id="menu_4"><a href="<?php echo url('ask/categorylistsolved',array('cname'=>$_GET['cname']))?>" >新解决问题</a></li>
                <li class="<?php if ($menu==5) {
                            echo 'over';
                        } else {
                            echo 'nor';
} ?>" id="menu_5" ><a href="<?php echo url('ask/categorylisthot',array('cname'=>$_GET['cname']))?>">热点问题</a></li>
                <li class="<?php if ($menu==6) {
                            echo 'over';
                        } else {
    echo 'nor';
} ?>" id="menu_6"><a href="<?php echo url('ask/categorylisthighscore',array('cname'=>$_GET['cname']))?>">高分问题</a></li>
                <li class="<?php if ($menu==7) {
                        echo 'over';
                    } else {
                        echo 'nor';
                    } ?>"id="menu_7" ><a href="<?php echo url('ask/categorylistnoanswer',array('cname'=>$_GET['cname']))?>">零回复问题</a></li>
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
<?php
if ($ismsaster=="1") //如果是专长版主，那么就显示
            {
                ?>
                        <td class="answers" >删除</td>
                <?php
            }
            ?>
                    </tr>
                </thead>
                <tbody>
            <?php
            foreach ($questions as $k=>$v) {
    echo "<tr><td>[".
            //CHtml::link($v->topic,url('ask/categorylistall',array('cname'=> $v->fenleiid )),array('class'=>'e19','target'=>'_blank'))."-".
            CHtml::link($citys[$v->cnameid],url('ask/arealistall',array('area'=>AskTool::AskCity_getpaixu($v->cnameid))),array('class'=>'e19','target'=>'_blank')).'] '.
            CHtml::link(AskTool::str_cut($v->title, 39),AskTool::Question_GetUrl($v->ID),array('target'=>'_blank'))."</td><td align='center'>".
            $v->views."</td><td align='center'><img ssrc='/images/p.jpg' width='10' height='9' />".
                    $v->shang."</td><td align='center'>".
            $v->replys."</td><td align='center'><script>disQstate(" .$v->jie.")</script></td><td align='center'>".
            date('m-d',strtotime($v->sendtime))."</td>";
    if ($ismsaster=="1") echo "<td style='text-align:center'><a onclick=\" return confirm('确认要删除么！') \" href='" . url('/ask/delquestion_byclass',array('qid'=>$v->ID,'leixing'=>1,'categoryid'=>$categoryid,'cachename'=>$cachename_list))."' ><img src='/images/msg_bg.png' witdth='16' height='16' /></a></td>";
    echo "</tr>";
}
                    ?>
                </tbody>
            </table>
        </div>
        <!--listfoot-->
      <div class="listfoot margin_top_10" style="float:left; display: inline ">

<?php
$tiao="<input type='input' size=5 name='gopage' style='float:left;  margin-top:5px;'  class='gopage'/><input type='button' value='转到' class='gopage' style=' margin-top:3px;'/>";
$this->widget('CLinkPager', array(
    'cssFile' => '/css/pagerlist.css',
	'pages' => $pages,
    'header' => '',
    'firstPageLabel' => '首页',
    'lastPageLabel' => '末页',
    'nextPageLabel' => '下页',
    'prevPageLabel' => '上页',
     'footer'=>$tiao .'&nbsp;&nbsp;总数'.$pages->ItemCount . ',每页' .$pages->pageSize . ',页次 <font color=red>' . ((int)$pages->currentpage+1) . '</font>/' .$pages-> pageCount ,
     'maxButtonCount'=>4,
));
//echo '总页数'.$pages->ItemCount;
//echo '<br />';
//echo '每页记录数'.$pages->pageSize;
//echo '<br />';
//echo '当前页'.$pages->currentPage;
?>

<script>

$(function(){
	$(':button.gopage').bind('click',function(){
		var page = $(':input.gopage').val();
		var host = document.location.hostname;
		var url = host
	    url = 'http://' + url + '/index.php/all/'+page;
		self.location =  url;


	})
});
$(function(){
	$(':text.gopage').bind('blur',function(){
		var page = $(':input.gopage').val();
		var host = document.location.hostname;
		var url = host
	    url = 'http://' + url + '/index.php/all/'+page;
		self.location =  url;


	})
});
</script>
 </div> <table width="100%" border="0" cellspacing="0" cellpadding="0" class="listtable" >	<tbody>
              <tr>
                <th width="41%" class="align_left nire_xtj" colspan="2"><span><a href="http://www.9ask.cn/souask/j/qlist.asp" >查看以往法律咨询</a></span></th>
              </tr>
               <tr>
               <td   style="text-align:left; line-height:24px; font-size:14px; "   >
                <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2005-1-1&amp;e=2005-2-1&amp;nian=true">05年</a>

                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2005-8-1&amp;e=2005-9-1">8月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2005-9-1&amp;e=2005-10-1">
                   9月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2005-10-1&amp;e=2005-11-1">10月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2005-11-1&amp;e=2005-12-1">11月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2005-12-1&amp;e=2006-1-1">12月</a>
                    </td>
               <td   style="text-align:left"><a href="http://www.9ask.cn/souask/j/qlist.asp?s=2006-1-1&amp;e=2006-2-1&amp;nian=true">

                   06年</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2006-1-1&amp;e=2006-2-1">1月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2006-2-1&amp;e=2006-3-1">2月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2006-3-1&amp;e=2006-4-1">
                   3月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2006-4-1&amp;e=2006-5-1">4月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2006-5-1&amp;e=2006-6-1">5月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2006-6-1&amp;e=2006-7-1">

                   6月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2006-7-1&amp;e=2006-8-1">7月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2006-8-1&amp;e=2006-9-1">8月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2006-9-1&amp;e=2006-10-1">
                   9月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2006-10-1&amp;e=2006-11-1">10月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2006-11-1&amp;e=2006-12-1">11月</a>

                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2006-12-1&amp;e=2007-1-1">12月</a> </td>
              </tr>
               <tr>
               <td   style="text-align:left; background-color:#f3f3f3"   >
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2007-1-1&amp;e=2007-2-1&amp;nian=true">07年</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2007-1-1&amp;e=2007-2-1">1月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2007-2-1&amp;e=2007-3-1">
                   2月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2007-3-1&amp;e=2007-4-1">3月</a>

                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2007-4-1&amp;e=2007-5-1">4月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2007-5-1&amp;e=2007-6-1">
                   5月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2007-6-1&amp;e=2007-7-1">6月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2007-7-1&amp;e=2007-8-1">7月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2007-8-1&amp;e=2007-9-1">
                   8月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2007-9-1&amp;e=2007-10-1">9月</a>

                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2007-10-1&amp;e=2007-11-1">10月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2007-11-1&amp;e=2007-12-1">11月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2007-12-1&amp;e=2008-1-1">12月</a> </td>

               <td   style="text-align:left; background-color:#f3f3f3; font-size:14px;"><a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-1-1&amp;e=2008-2-1&amp;nian=true">
                   08年</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-1-1&amp;e=2008-2-1">1月</a>

                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-2-1&amp;e=2008-3-1">2月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-3-1&amp;e=2008-4-1">
                   3月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-4-1&amp;e=2008-5-1">4月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-5-1&amp;e=2008-6-1">5月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-6-1&amp;e=2008-7-1">
                   6月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-7-1&amp;e=2008-8-1">7月</a>

                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-8-1&amp;e=2008-9-1">8月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-9-1&amp;e=2008-10-1">
                   9月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-10-1&amp;e=2008-11-1">10月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-11-1&amp;e=2008-12-1">11月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2008-12-1&amp;e=2009-1-1">12月</a>  </td>
              </tr>

               <tr>
               <td   style="text-align:left"   >
                  <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2009-1-1&amp;e=2009-2-1&amp;nian=true">09年</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2009-1-1&amp;e=2009-2-1">1月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2009-2-1&amp;e=2009-3-1">
                   2月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2009-3-1&amp;e=2009-4-1">3月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2009-4-1&amp;e=2009-5-1">4月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2009-5-1&amp;e=2009-6-1">

                   5月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2009-6-1&amp;e=2009-7-1">6月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2009-7-1&amp;e=2009-8-1">7月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2009-8-1&amp;e=2009-9-1">
                   8月</a> <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2009-9-1&amp;e=2009-10-1">9月</a>
                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2009-10-1&amp;e=2009-11-1">10月</a>

                   <a href="http://www.9ask.cn/souask/j/qlist.asp?s=2009-11-1&amp;e=2009-12-1">11月</a>  12月
                   </td>
               <td   style="text-align:left">&nbsp;

               </td>
              </tr>
                    </tbody>
              </table>
	</div>
    <!--right-->
    <div class="right f_r">
        <!--rightone-->
<?php $this->widget('listrightbanner');?>
        <div class="righthead borderdark margin_top_10 ft14 ftb padding_left_10">推荐<span class="ftred"><?php echo $pos['name'];?></span>律师</div>
        <div class="rightbody borderdark">
            <div class="ftred padding_top_10 padding_left_10 padding_bottom_10">电话咨询免费，请说明来源于中顾网</div>
            <div class="rightlist1">
                <ul>
                    <?php
                    if (isset($_GET['catid'])) {//如果是类别下,就调用广告系统的广告位
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
foreach($weekScoreLawyers as $k=>$v) {
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
foreach($monthScoreLawyers as $k=>$v) {
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

                                    $('#week_lawyer_highscore_panel').bind('mouseover', function() {
                                        $('#month_lawyer_highscore_panel').removeClass('rover').addClass('rnorm');
                                        $('#week_lawyer_highscore_panel').removeClass('rnorm').addClass('rover');
                                        jQuery('#month_lawyer_highscore').hide();
                                        jQuery('#week_lawyer_highscore').show();
                                    });

                                    $('#month_lawyer_highscore_panel').bind('mouseover', function() {
                                        $('#week_lawyer_highscore_panel').removeClass('rover').addClass('rnorm');
                                        $('#month_lawyer_highscore_panel').removeClass('rnorm').addClass('rover');
                                        jQuery('#month_lawyer_highscore').show();
                                        jQuery('#week_lawyer_highscore').hide();
                                    });

                                });

        </script>
        <!--rightthree-->
        <div class="righthead borderdark margin_top_10 ft14 ftb padding_left_10 orange"><?php echo  $categoryname ;?>咨询版主</div>
        <div class="rightbody borderdark">
            <div class="rightlist3">
                <div class="leftphoto">
<?
$lsurl=AskTool::GetLawyerurl($webmaster->user->ID,$webmaster->user->name, $webmaster->user->IsStar);                                    
?>
                    <p class="margin_bottom_10"><a href="<?php echo $lsurl;?>" target="_blank"><img src="http://img.9ask.cn<?php echo $webmaster->user->userpic;?>" width="80" height="98" /></a></p>
                    <p class="margin_bottom_10"><a href="<?php echo $lsurl;?>" target="_blank"><?php echo $webmaster->user->TrueName;?>律师</a></p>
                    <p class="margin_bottom_10"><?php echo $webmaster->user->jifen;?>分</p>
                    <p><a href="<?php echo AskTool::GetLawyeraskurl($webmaster->user->ID,$webmaster->user->name, $webmaster->user->IsStar);?>" target="_blank"><img src="/images/askme.jpg" width="50" height="17" /></a></p>
                </div>
                <div class="ft14 ftb orange borderbottom">精选回复</div>
                <ul>
<?php
foreach($webmasterAnswer as $k=>$v) {
    ?>
                    <li><a href="http://ask.9ask.cn/question/<?php echo $v->question->year;?>/<?php echo $v->question->ID;?>.html" target="_blank"><?php echo AskTool::str_cut($v->question->title,16)?></a></li>
    <?php
}
?>
                </ul>
            </div>
        </div>
    </div>
    <div style="clear:both"></div>
</div>
<!--pagefooter-->