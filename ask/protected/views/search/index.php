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
                    } ?>" id="menu_1" ><a href="<?php echo url('search/search',array('key'=>$_GET['key']))?>">所有的提问</a></li>
                <li class="<?php if ($menu==2) {
                    echo 'over';
                } else {
                    echo 'nor';
                    } ?>" id="menu_2" ><a href="<?php echo url('search/searchnosolated',array('key'=>$_GET['key']))?>">待解决提问</a></li>
                <li class="<?php if ($menu==3) {
                    echo 'over';
                } else {
                    echo 'nor';
                    } ?>" id="menu_3" ><a href="<?php echo url('search/searchsolated',array('key'=>$_GET['key']))?>">已解决提问</a></li>

            </ul>
        </div>
        <!--listbody-->
        <div class="listbody margin_top_10">
            <table border="0" cellpadding="0" cellspacing="0" class="listtable" style="border:1px #ccc solid;"  >
                <thead>
                    <tr>
                        <td style="text-align:left; font-size:15px; font-weight:bold; padding-left:15px; ">搜索 '<font color="red"><?php echo $key;?></font> '</td>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $lsids='';
                    foreach ($questions as $k=>$v) {
                        echo "<tr><td style='font-size:14px; line-height:25px; color:#048fff;padding-left:5px; '><a href='" . AskTool::Question_GetUrl($v->ID) ."' target='_blank'>". $v->title ."</a></td></tr>";
                        echo "<tr><td  style='padding-left:15px;' > ". AskTool::str_cut($v->content, 350) ."</td>

		</tr>";

                        ?>     <tr>

                        <td  style='font-size:12px; line-height:25px; padding:10px; border-bottom:1px #CCC dashed;  '>咨询者：<span class="xljie"><?php echo $v->sender;?></span> | 咨询时间：<?php echo $v->sendtime?> | 所属分类:<?php echo $v->topic?> | <span id="last<?php echo $v->ID; ?>"> </span></td>
                    </tr>
                        <?php
                        $lsids.= $v->ID . ",";
                    }
                    if (!empty ($lsids)) $lsids=substr($lsids, 0,strlen($lsids)-1);
                    ?>
                </tbody>
            </table>
        </div>
        <!--listfoot-->
        <div class="listfoot margin_top_10">
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
                    'maxButtonCount'=>4,
                    'footer'=>$tiao .'&nbsp;&nbsp;总数'.$pages->ItemCount . ',每页' .$pages->pageSize . ',页次 <font color=red>' . ((int)$pages->currentpage+1) . '</font>/' .$pages-> pageCount ,
            ));
            ?>
        </div>
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
                    <script src="<?php echo url('billask/searchright')?>"></script>
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
<script  >
                        function getlastperson()
                        {
                            $.getJSON(
                            "/index.php/search/getjsonuser/qids/<?php echo $lsids;?>",
                            function(data) {
                                $.each(data, function(k, v) {
                                    //$("#last" + v['qid']).html("fsdfsd");

                                    document.getElementById('last'+v['qid']).innerHTML="最后解答:<span class='xljie'><a href='" + v['url']+"'>" + v['truename']+"</a></span><a href='" + v['askme']+"'> <span class='xjhongs'>咨询我</span></a>";

                                })

                            });
                        }
                        getlastperson();
</script>

<!--pagefooter-->