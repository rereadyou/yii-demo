<?php cs()->registerCssFile(resBu('css/index.css', 'screen'));?>  
<?php cs()->registerScriptFile(resBu('/scripts/marquee.js', 'screen'));?>
<!-- 通栏广告 -->
<script type="text/javascript">
    jQuery(function(){  //一次横向滚动一个
        //Marquee
        jQuery('#marquee6').kxbdSuperMarquee({
            isEqual:false,
            distance:20,
            time:4,
            //btnGo:{up:'#goU',down:'#goD'},
            direction:'up'
        });


    });

</script>
<div  style="text-align: center; margin-top: 7px">
    <script language="javascript"  >
        var bannerAD=new Array();
        var bannerADlink=new Array();
        var adNum=0;

        var theTimer=0;

        bannerAD[0]="http://img.9ask.cn/index/aa_images/huangqun.gif";
        bannerADlink[0]="http://www.9ask.cn/usersite/home/huangqun/";
        bannerAD[1]="http://img.9ask.cn/souask/aa_images/zhangweizhong.gif";
        bannerADlink[1]="http://www.9ask.cn/usersite/home/majun/";


        var preloadedimages=new Array();
        for (i=1;i<bannerAD.length;i++){
            preloadedimages[i]=new Image();
            preloadedimages[i].src=bannerAD[i];
        }
        function setTransition(){
            if (document.all){
                bannerADrotator.filters.revealTrans.Transition=Math.floor(Math.random()*23);
                bannerADrotator.filters.revealTrans.apply();
            }
        }
        function playTransition(){
            if (document.all)
                bannerADrotator.filters.revealTrans.play()
        }
        function nextAd(){
            //alert('s');
            if(adNum<bannerAD.length-1)adNum++ ;
            else adNum=0;
            setTransition();
            document.images.bannerADrotator.src=bannerAD[adNum];
            playTransition();
            theTimer=setTimeout("nextAd()", 6000);
        }
        function jump3url(){
            jumpUrl=bannerADlink[adNum];
            jumpTarget='_blank';
            if (jumpUrl != ''){
                if (jumpTarget != '')window.open(jumpUrl,jumpTarget);
                else location.href=jumpUrl;
            }
        }
        function displayStatusMsg() {
            status=bannerADlink[adNum];
            document.returnValue = true;
        }
        document.write('<a onMouseOver="clearTimeout(theTimer);"      onclick="jump3url();" style="cursor:pointer;*cursor:hand;"><img src="http://img.9ask.cn/souask/images/20100126/950_90_aa.gif" ');
        document.write('name=bannerADrotator align="middle" ');
        document.write('style="FILTER: revealTrans(duration=2,transition=40)"></a>');
        nextAd();
    </script>
</div>
<!--通栏广告结束-->
<!--data-->
<div class="cwidth footer_2 borderblue_1 margin_top_10" style="width:936px;">
				中顾法律网<a href="http://www.9ask.cn/souask/" target="_blank">法律咨询</a>中心：昨日公开法律咨询 <span><?php echo $ask_counts->question_num;?></span> 条,一对一咨询 <span><?php echo $ask_counts->msg_num;?></span> 条,昨日委托 <span><?php echo $ask_counts->weituo_num;?></span> 条, 共解决当事人<span><?php echo $ask_counts->question_num;?></span> 个问题。<span><a href="http://ask.9ask.cn/ask.php" target="_blank"><font color="#ff0000"><b>我要发布法律咨询</b></font></a></span> <span><a href="http://www.9ask.cn/usersite/Wt1/Wtadd.asp" target="_blank"><font color="#ff0000"><b>我要请律师打官司</b></font></a></span>
</div>
<!--banner1-->
<div class="cwidth margin_top_10 nodisplay"><img src="/images/topbanner.jpg" width="950" height="80" /></div>
<!--locabox-->
<div id="locbox" class="cwidth margin_top_10">
    <div class="f_l margin_top_10 grey">您的位置：<a href="http://www.9ask.cn">中顾法律网首页</a> > <a href="http://ask.9ask.cn">法律咨询</a> > 咨询中心</div>
    <div class="f_r toplawyer" id="scrollDiv2" >

        <div    id="marquee6">
            <ul class="f_l" >
                <?php
                foreach($gonggao as $k=>$v) {
                    echo '<li  ><a href="http://www.9ask.cn/souask/gonggao.asp?id='.$v->ID.'" target="_blank">'.$v->title.'</a></li>';
                }
                ?>

            </ul>
        </div>

    </div>
</div>

<!--pagebody-->
<div id="pagebody" class="cwidth">
    <!--one-->
    <div class="one">
        <div class="onexc"><a href="http://www.9ask.cn/usersite/home/laile/index.asp"><img src="images_0/onexc.jpg" width="740" height="60" /></a></div>
        <!--left-->
        <div class="left margin_right_10">
            <div><a href="http://ask.9ask.cn/ask.php" target="_blank"><img src="/images/fbtutton.jpg" width="200" height="62" /></a></div>
            <div class="qbox"><a href="http://ask.9ask.cn/ask.php">如何发布咨询？</a>&nbsp;<a href="http://www.9ask.cn/souask/answer.asp">如何查看问题？</a></div>
            <!--地域查询-->
            <div class="thead00 margin_top_7">
                <ul>
                    <li class="ton">地区咨询中心</li>
                    <li class="tno"><a href="http://www.9ask.cn/souask/qs_area.asp" class="blink">按地区找咨询</a></li>
                </ul>
            </div>
            <div class="cbody leftbody1">
                <a href="http://ask.9ask.cn/beijing/"><span>北京</span></a>
                <a href="http://ask.9ask.cn/hebei/">河北</a>
                <a href="http://ask.9ask.cn/tianjin/">天津</a>
                <a href="http://ask.9ask.cn/shandong/"><span>山东</span></a>
                <a href="http://ask.9ask.cn/henan/">河南</a>
                <a href="http://ask.9ask.cn/shanghai/"><span>上海</span></a>
                <a href="http://ask.9ask.cn/jiangsu/">江苏</a>
                <a href="http://ask.9ask.cn/anhui/">安徽</a>
                <a href="http://ask.9ask.cn/zhejiang/">浙江</a>
                <a href="http://ask.9ask.cn/jiangxi/">江西</a>
                <a href="http://ask.9ask.cn/hunan/">湖南</a>
                <a href="http://ask.9ask.cn/hubei/">湖北</a>
                <a href="http://ask.9ask.cn/sichuan/">四川</a>
                <a href="http://ask.9ask.cn/chongqing/">重庆</a>
                <a href="http://ask.9ask.cn/yunnan/">云南</a>
                <a href="http://ask.9ask.cn/sx/">山西</a>
                <a href="http://ask.9ask.cn/shanxi/">陕西</a>
                <a href="http://ask.9ask.cn/gansu/">甘肃</a>
                <a href="http://ask.9ask.cn/qinghai/">青海</a>
                <a href="http://ask.9ask.cn/ningxia/">宁夏</a>
                <a href="http://ask.9ask.cn/liaoning/">辽宁</a>
                <a href="http://ask.9ask.cn/jilin/">吉林</a>
                <a href="http://ask.9ask.cn/neimenggu/">内蒙古</a>
                <a href="http://ask.9ask.cn/heilongjiang/">黑龙江 </a>
                <a href="http://ask.9ask.cn/fujian/">福建</a>
                <a href="http://ask.9ask.cn/guangdong/"><span>广东</span></a>
                <a href="http://ask.9ask.cn/guangxi/">广西</a>
                <a href="http://ask.9ask.cn/xianggang/">香港</a>
                <a href="http://ask.9ask.cn/aomen/">澳门</a>
                <a href="http://ask.9ask.cn/guizhou/">贵州</a>
                <a href="http://ask.9ask.cn/hainan/">海南</a>
                <a href="http://ask.9ask.cn/xinjiang/">新疆</a>
                <a href="http://ask.9ask.cn/xizang/">西藏</a>
                <a href="http://ask.9ask.cn/taiwan/">台湾</a> <br />
                <a href="http://www.9ask.cn/souask/qs_area.asp"><span>更多地区咨询&gt;&gt;</span></a>
            </div>
            <!--问题分类-->
            <div class="thead00 margin_top_7">
                <ul>
                    <li class="ton">专长咨询中心</li>
                    <li class="tno"><a href="http://www.9ask.cn/souask/qs_law.asp" class="blink">按专长找咨询</a></li>
                </ul>
            </div>
            <div class="cbody leftbody2 padding_6">
                <!--热门分类-->
                <div class="typehead ftb margin_top_10">热门分类</div>
                <div class="typelist margin_top_10">
                    <a href="/hyjt">婚姻家庭</a>&nbsp;&nbsp;
                    <a href="/ldjf">劳动纠纷</a>&nbsp;&nbsp;
                    <a href="/shpc">人身损害</a><br />
                    <a href="/jtsg">交通事故</a>&nbsp;&nbsp;
                    <a href="/htjf">合同纠纷</a>&nbsp;&nbsp;
                    <a href="/fcjf">房产纠纷</a><br />
                    <a href="/xsbh">刑事辩护</a>&nbsp;&nbsp;
                    <a href="/cqaz">拆迁安置</a>&nbsp;&nbsp;
                    <a href="/zqzw">债权债务</a>
                </div>
                <!--专业分类-->
                <div class="typehead ftb margin_top_10">按专业分类</div>
                <div class="typeprolist ">

                    <span onmouseover="closeall_menu();document.getElementById('fz_menu_1').style.display=''" onmouseout="document.getElementById('fz_menu_1').style.display='none'">
                        <a href="javascript:void(0)" onclick="javascript:return false">民事类律师</a>
                        <div class="itemlistmenu" id="fz_menu_1" style="display:none">
                            <p><a href="/hyjt">婚姻家庭</a></p>
                            <p><a href="/ycjc">遗产继承</a></p>
                            <p><a href="/xfwq">消费维权</a></p>
                            <p><a href="/dydb">抵押担保</a></p>

                            <p><a href="/htjf">合同纠纷</a></p>
                            <p><a href="/ldjf">劳动纠纷</a></p>
                            <p><a href="/shpc">人身损害</a></p>
                            <p><a href="/bxlp">保险理赔</a></p>
                            <p><a href="/cqaz">拆迁安置</a></p>
                            <p><a href="/zqzw">债权债务</a></p>

                            <p><a href="/yljf">医疗纠纷</a></p>
                            <p><a href="/jtsg">交通事故</a></p>
                        </div>
                    </span>
                    <span onmouseover="closeall_menu();document.getElementById('fz_menu_2').style.display='block'" onmouseout="document.getElementById('fz_menu_2').style.display='none'">
                        <a href="javascript:void(0)" onclick="javascript:return false">经济类律师</a>	<div class="itemlistmenu"  id="fz_menu_2" style="display:none;" >
                            <p><a href="/gcjz">工程建筑</a></p>
                            <p><a href="/fcjf">房产纠纷</a></p>
                            <p><a href="/zclaw">知识产权</a></p>
                            <p><a href="/hhjm">合伙加盟</a></p>
                            <p><a href="/grdz">个人独资</a></p>
                            <p><a href="/jrzq">金融证券</a></p>

                            <p><a href="/yhbx">银行保险</a></p>
                            <p><a href="/bdjz">不当竞争</a></p>
                            <p><a href="/jjzq">经济仲裁</a></p>
                            <p><a href="/wlfl">网络法律</a></p>
                            <p><a href="/zbtb">招标投标</a></p>
                        </div></span>

                    <span onmouseover="closeall_menu();document.getElementById('fz_menu_3').style.display=''"><a href="javascript:void(0)" onclick="javascript:return false">刑事行政法类律师</a><div class="itemlistmenu"  id="fz_menu_3" style="display:none" onmouseout="this.style.display='none'">
                            <p><a href="/qbhs">取保候审</a></p>
                            <p><a href="/xsbh">刑事辩护</a></p>
                            <p><a href="/xszs">刑事自诉</a></p>
                            <p><a href="/xzfy">行政复议</a></p>

                            <p><a href="/xzss">行政诉讼</a></p>
                            <p><a href="/gjpc">国家赔偿</a></p>
                            <p><a href="/gssw">工商税务</a></p>
                            <p><a href="/hgsj">海关商检</a></p>
                            <p><a href="/gaga">公安国安</a></p>
                            <p><a href="/caishui">财税</a></p>
                        </div> </span>

                    <span onmouseover="closeall_menu();document.getElementById('fz_menu_4').style.display=''"><a href="javascript:void(0)" onclick="javascript:return false">涉外法律类律师</a><div class="itemlistmenu" id="fz_menu_4" style="display:none" onmouseout="this.style.display='none'">
                            <p><a href="/hshs">海事海商</a></p>
                            <p><a href="/gjmy">国际贸易</a></p>
                            <p><a href="/zsyz">招商引资</a></p>
                            <p><a href="http://www.9ask.cn/souask/sort.asp?cid=46">外商投资</a></p>
                            <p><a href="/hzhz">合资合作</a></p>

                            <p><a href="/wto">WTO事务</a></p>
                            <p><a href="/qxbt">倾销补贴</a></p>
                            <p><a href="/swzc">涉外仲裁</a></p>
                        </div></span>

                    <span onmouseover="closeall_menu();document.getElementById('fz_menu_5').style.display=''"><a href="javascript:void(0)" onclick="javascript:return false">公司专项法类律师</a><div class="itemlistmenu"  id="fz_menu_5" style="display:none" onmouseout="this.style.display='none'">
                            <p><a href="/gsbg">公司并购</a></p>
                            <p><a href="/gfzr">股份转让</a></p>
                            <p><a href="/gsgz">企业改制</a></p>
                            <p><a href="/gsqs">公司清算</a></p>

                            <p><a href="/pcjf">破产解散</a></p>
                            <p><a href="/zcpm">资产拍卖</a></p>
                        </div></span>

                    <span onmouseover="closeall_menu();document.getElementById('fz_menu_6').style.display='block'"><a href="javascript:void(0)" onclick="javascript:return false">其他非诉讼类律师</a><div class="itemlistmenu"  id="fz_menu_6" style="display:none; z-index:999" onmouseout="this.style.display='none'">
                            <p><a href="/gscx">工商查询</a></p>
                            <p><a href="/zxdc">资信调查</a></p>
                            <p><a href="/htsc">合同审查</a></p>
                            <p><a href="/tjtp">调解谈判</a></p>

                            <p><a href="/cngw">常年顾问</a></p>
                            <p><a href="/srls">私人律师</a></p>
                            <p><a href="/wsdl">文书代理</a></p>
                            <p><a href="/ymlx">移民留学</a></p>
                            <p><a href="/szzs">商帐追收</a></p>
                        </div></span>


                    <script language="javascript">
                        function closeall_menu(){
                            for(var i=1;i<=6;i++){document.getElementById('fz_menu_'+i).style.display='none';}
                        }
                    </script>
                </div>
            </div>

            <!--回复数量排行榜-->
            <div class="thead0 margin_top_7 ft14 ftb">上周咨询回复数量排行榜</div>
            <div class="cbody leftbody3">
                <div class="phhead">律师姓名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;总共积分</div>
                <ul>
                    <?php
                    $i=0;
                    foreach($lastweekBestReplyLawyer as $lawyer) {
                        $i++;
                        if($i>10) {
                            break;
                        }
                        echo "<li><div class='nopbx'>".$i."</div><div class='notit'><a href='" .$lawyer['url'] ."' target='_blank' >".$lawyer['truename'].'律师</a></div><div class="nopop">'.$lawyer['jifen'].'</div></li>';
                    }
                    ?>
                </ul>
            </div>
            <!--好评数量排行榜-->
            <div class="thead0 margin_top_7 ft14 ftb">上周好评数排行榜</div>
            <div class="cbody leftbody3">
                <div class="phhead">律师姓名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;总共积分</div>
                <ul>
                    <?php
                    $i=0;
                    foreach($lastweekMostFlowerLawyer as $lawyer) {
                        $i++;
                        echo "<li><div class='nopbx'>".$i."</div><div class='notit'><a href='" .$lawyer['url'] ."' target='_blank' >".$lawyer['truename'].'律师</a></div><div class="nopop">'.$lawyer['jifen'].'</div></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!--center-->
        <div class="center">
            <div><img src="/images/g1.jpg" width="490" height="60" /></div>
            <div class="quickask borderblue_1 margin_top_7">
                <!--快速发布-->
                <div class="quickask_pub">
                    <form action="/ask.php" method="post" target="_blank">
                        <div class="quickask_pubhead"></div>
                        <div class="quickask_title"><input name="OaskQuestion[title]"  type="text" class="borderblue_1 ipt1"/></div>
                        <div class="quickask_content"><textarea name="OaskQuestion[content]"  cols="" rows="" class="borderblue_1 ipt2"></textarea>
                        </div>
                        <div class="quickask_button"><input type="image" src="/images_0/submitz.gif" idth="171" height="29"  />  </div>
                    </form>
                </div>
            </div>

            <!--宣传图-->
            <div class="margin_top_7"><iframe src="<?php echo url('billask/indexmiddel')?>" frameborder="0" scrolling="no" width="483px" height="70px"></iframe></div>
            <!--thead2 margin_top_7最新法律咨询body qqbox padding_top_10-->
            <div class="thead2 margin_top_7">
                <h4>最新法律咨询</h4>
                <div class="more"><a href="http://ask.9ask.cn/all">更多</a></div>
            </div>
            <div class="cbody qqbox_d  ">
                <ul>
                    <?php
                    foreach ($q_new as $k=>$v) {
                        $hfusers='暂无回复';
                        if ($v->replys>0) {
                            if($v->hfuser->userClassID==1) {
                                $lsurl=AskTool::GetLawyerurl($v->hfuser->ID, $v->hfuser->name, $v->hfuser->IsStar);
                                $hfusers="<a  href='$lsurl'   target=_blank >". AskTool::str_cut($v->hfuser->TrueName, 9)."</a>";
                            }
                            else {
                                $hfusers='公众回复';
                            }
                        }
                         
                        echo "<li><a href='http://ask.9ask.cn/catalog_".$v->fenleiid ."/all" ."'>[".$v->topic.
                                "]</a> <a href='http://ask.9ask.cn/question/2011/".$v->ID.".html'>".mb_substr($v->title, 0, 14, 'utf-8').
                                "</a> <div class='answer_p'><span class='qq_box'>回复者：</span>" . $hfusers ." </div></li>";
                    }
                    ?>

                </ul>
            </div>
            <!--律师照片列表六个-->
            <div class="lawyer6 borderblue_1 margin_top_7">
                <ul>
                    <li>
                        <p class="l1"><a href="http://www.9ask.cn/usersite/home/qianlawyer/" ><img src="http://img.9ask.cn/souask/userpic/2010427121024.jpg" width="60" height="80"/></a></p>
                        <p class="l2"><a href="http://www.9ask.cn/usersite/home/qianlawyer/" >钱媛媛律师</a></p>
                        <p class="l3"><a href="http://www.9ask.cn/usersite/home/qianlawyer/" ><img src="/images/askme.jpg" width="50" height="17" /></a></p>
                        <p class="l4">13810947805</p>
                    </li>
                    <li>
                        <p class="l1"><a href="http://www.9ask.cn/usersite/home/wlg5796/" ><img src="http://img.9ask.cn/souask/userpic/2010527154650.jpg" width="60" height="80"/></a></p>
                        <p class="l2"><a href="http://www.9ask.cn/usersite/home/wlg5796/" >拆迁律师</a></p>
                        <p class="l3"><a href="http://www.9ask.cn/usersite/home/wlg5796/ask.asp" ><img src="/images/askme.jpg" width="50" height="17" /></a></p>
                        <p class="l4">15811275796</p>
                    </li>
                    <li>
                        <p class="l1"><a href="http://www.9ask.cn/usersite/home/niexiaoyue/" ><img src="http://img.9ask.cn/souask/userpic/201117172211.jpg" width="60" height="80"/></a></p>
                        <p class="l2"><a href="http://www.9ask.cn/usersite/home/niexiaoyue/" >房产聂晓岳</a></p>
                        <p class="l3"><a href="http://www.9ask.cn/usersite/home/niexiaoyue/ask.asp" ><img src="/images/askme.jpg" width="50" height="17" /></a></p>
                        <p class="l4">13401148002</p>
                    </li>
                    <li>
                        <p class="l1"><a href="http://www.9ask.cn/usersite/home/tianke/index.asp" ><img src="http://img.9ask.cn/souask/userpic/20086310473973499.jpg" width="60" height="80"/></a></p>
                        <p class="l2"><a href="http://www.9ask.cn/usersite/home/tianke/index.asp" >李立群</a></p>
                        <p class="l3"><a href="http://www.9ask.cn/usersite/home/tianke/ask.asp" ><img src="/images/askme.jpg" width="50" height="17" /></a></p>
                        <p class="l4">13910155597</p>
                    </li>
                    <li>
                        <p class="l1"><a href="http://www.9ask.cn/usersite/home/zhangshaoli/" ><img src="http://img.9ask.cn/souask/userpic/20104312521.jpg" width="60" height="80"/></a></p>
                        <p class="l2"><a href="http://www.9ask.cn/usersite/home/zhangshaoli/" >张绍礼</a></p>
                        <p class="l3"><a href="http://www.9ask.cn/usersite/home/zhangshaoli/ask.asp" ><img src="/images/askme.jpg" width="50" height="17" /></a></p>
                        <p class="l4">13910176640</p>
                    </li>
                    <li>
                        <p class="l1"><a href="http://www.9ask.cn/usersite/home/liamfan/index.asp" ><img src="http://img.9ask.cn/souask/images/fang.jpg" width="60" height="80"/></a></p>
                        <p class="l2"><a href="http://www.9ask.cn/usersite/home/liamfan/index.asp" >北京范林刚</a></p>
                        <p class="l3"> <a href="http://www.9ask.cn/usersite/home/liamfan/ask.asp" ><img src="/images/askme.jpg" width="50" height="17" /></a></p>
                        <p class="l4">13391711388</p>
                    </li>
                </ul>
                <div style="clear:both"></div>
            </div>
            <!--热点法律咨询-->
            <div class="thead2 margin_top_7">
                <h4>热点法律咨询</h4>
                <div class="more"><a href="http://ask.9ask.cn/hot">更多</a></div>
            </div>
            <div class="cbody newqlist qqbo_xd">
                <ul>
<?php
foreach ($q_hot as $k=>$v) {
                                  $hfusers='暂无回复';
                        if ($v->replys>0) {
                            if($v->hfuser->userClassID==1) {
                                $lsurl=AskTool::GetLawyerurl($v->hfuser->ID, $v->hfuser->name, $v->hfuser->IsStar);
                                $hfusers="<a  href='$lsurl'   target=_blank >". AskTool::str_cut($v->hfuser->TrueName, 9)."</a>";
                            }
                            else {
                                $hfusers='公众回复';
                            }
                        }
                        echo "<li><a href='http://ask.9ask.cn/catalog_".$v->fenleiid ."/all" ."'>[".$v->topic.
                                "]</a> <a href='http://ask.9ask.cn/question/2011/".$v->ID.".html'>".mb_substr($v->title, 0, 14, 'utf-8').
                                "</a> <div class='answer_p'><span class='qq_box'>回复者：</span>$hfusers</div></li>";
                    }
                    ?>
                </ul>
                <div class="footinfo"><a href="http://ask.9ask.cn/nosolved" class="e14">邀您解答：待解决咨询</a></div>
            </div>
        </div>
        <!--right-->
        <div class="right">
            <script src="<?php echo url("billask/indexright") ?>"   language="javascript"></script>
            <div class="margin_top_7 rightfb">
                <div class="ra"><a href="http://www.9ask.cn/station/" target="_blank">找地区律师</a>&nbsp;<a href="http://www.9ask.cn/zhuanchang/" target="_blank" >找专长律师</a></div>
                <div class="rb margin_top_10">  <a href="http://www.9ask.cn/souask/qs_area.asp" target="_blank">按地区解答</a>&nbsp;<a href="http://www.9ask.cn/souask/qs_law.asp" target="_blank">按专长解答</a></div>
            </div>
            <!--推荐律师-->
            <div class="thead1 margin_top_7">推荐律师</div>
            <div class="cbody lawyer62">
                <ul>
                    <li>
                        <p class="l1"><A
                                href="http://www.9ask.cn/usersite/home/xueqing/" target=_blank><IMG
                                    src="http://img.9ask.cn/souask/userpic/n20090725093315.jpg" width=60
                                    height=80></A></p>
                        <p class="l2"><A href="http://www.9ask.cn/usersite/home/xueqing/"
                                         target=_blank>白丽萍律师</A></p>
                        <p class="l3"><A
                                href="http://www.9ask.cn/usersite/home/xueqing/" target=_blank><img src="/images/askme.jpg" width="50" height="17" /></A></p>
                        <p class="l4">13910189633</p>
                    </li>
                    <li>
                        <p class="l1"><A href="http://www.9ask.cn/usersite/home/myl5362/"
                                         target=_blank><IMG src="http://img.9ask.cn/souask/userpic/201081614479.jpg"
                                               width=60 height=80></A></p>
                        <p class="l2"><A href="http://www.9ask.cn/usersite/home/myl5362/"
                                         target=_blank>牟艳玲</A></p>
                        <p class="l3"><A href="http://www.9ask.cn/usersite/home/myl5362/ask.asp"
                                         target=_blank><img src="/images/askme.jpg" width="50" height="17" /></A></p>
                        <p class="l4">15910785133</p>
                    </li>
                    <li>
                        <p class="l1"><A href="http://www.9ask.cn/usersite/home/zidong/"
                                         target=_blank><IMG src="http://img.9ask.cn/souask/userpic/201036122635.jpg"
                                               width=60 height=80></p>
                                <p class="l2"><A href="http://www.9ask.cn/usersite/home/zidong/"
                                                 target=_blank>许子栋</A></p>
                                <p class="l3"><A href="http://www.9ask.cn/usersite/home/zidong/ask.asp"
                                                 target=_blank><img src="/images/askme.jpg" width="50" height="17" /></A></p>
                                <p class="l4">13520160465</p>
                    </li>
                    <li>
                        <p class="l1"><A href="http://www.9ask.cn/usersite/home/nowhy/"
                                         target=_blank><IMG src="http://img.9ask.cn/souask/userpic//201031614233.jpg"
                                               width=60 height=80></A></p>
                        <p class="l2"><A href="http://www.9ask.cn/usersite/home/nowhy/"
                                         target=_blank>上海谢正力</A></p>
                        <p class="l3"><A href="http://www.9ask.cn/usersite/home/nowhy/ask.asp"
                                         target=_blank><img src="/images/askme.jpg" width="50" height="17" /></A></p>
                        <p class="l4">18221683141</p>
                    </li>
                    <li>
                        <p class="l1"><A href="http://www.9ask.cn/usersite/home/davidwwx/"
                                         target=_blank><IMG src="http://img.9ask.cn/souask/userpic/201039155123.jpg"
                                               width=60 height=80></A></p>
                        <p class="l2"><A href="http://www.9ask.cn/usersite/home/davidwwx/"
                                         target=_blank>王卫新</A></p>
                        <p class="l3"><A href="http://www.9ask.cn/usersite/home/davidwwx/ask.asp"
                                         target=_blank><img src="/images/askme.jpg" width="50" height="17" /></A></p>
                        <p class="l4">3811959982</p>
                    </li>
                    <li>
                        <p class="l1"><A href="http://www.9ask.cn/usersite/home/legendyhq/"
                                         target=_blank><IMG src="http://img.9ask.cn/souask/userpic/201085103342.jpg"
                                               width=60 height=80></A></p>
                        <p class="l2"><A href="http://www.9ask.cn/usersite/home/legendyhq/"
                                         target=_blank>杨汉卿</A></p>
                        <p class="l3"><A href="http://www.9ask.cn/usersite/home/legendyhq/ask.asp"
                                         target=_blank><img src="/images/askme.jpg" width="50" height="17" /></A></p>
                        <p class="l4">18611337988</p>
                    </li>

                </ul>
            </div>
            <!--按地域查律师-->
            <div class="thead1 margin_top_7">按地域查律师</div>
            <div class="cbody flawyerofa">
                <a href="http://ask.9ask.cn/beijing/"><span>北京</span></a>
                <a href="http://ask.9ask.cn/hebei/">河北</a>
                <a href="http://ask.9ask.cn/tianjin/">天津</a>
                <a href="http://ask.9ask.cn/shandong/"><span>山东</span></a>
                <a href="http://ask.9ask.cn/henan/">河南</a>
                <a href="http://ask.9ask.cn/shanghai/"><span>上海</span></a>
                <a href="http://ask.9ask.cn/anhui/">安徽</a> <br>
                <a href="http://ask.9ask.cn/zhejiang/">浙江</a>
                <a href="http://ask.9ask.cn/jiangxi/">江西</a>
                <a href="http://ask.9ask.cn/hunan/">湖南</a>
                <a href="http://ask.9ask.cn/hubei/">湖北</a>
                <a href="http://ask.9ask.cn/sichuan/">四川</a>
                <a href="http://ask.9ask.cn/chongqing/">重庆</a>
                <a href="http://ask.9ask.cn/sx/">山西</a> <br>
                <a href="http://ask.9ask.cn/shanxi/">陕西</a>
                <a href="http://ask.9ask.cn/gansu/">甘肃</a>
                <a href="http://ask.9ask.cn/qinghai/">青海</a>
                <a href="http://ask.9ask.cn/ningxia/">宁夏</a>
                <a href="http://ask.9ask.cn/liaoning/">辽宁</a>
                <a href="http://ask.9ask.cn/jilin/">吉林</a>
                <a href="http://ask.9ask.cn/neimenggu/">内蒙古</a>
            </div>
            <div><a href="http://www.9ask.cn/search/" target="_blank"><img src="/images/gobanner.jpg" width="240" height="41" /></a></div>
            <!--推荐专家-->
            <div class="thead1 margin_top_7">推荐专家</div>
            <div class="cbody commendept">
                <ul>
                    <li>
                        <div class="m1">1、</div>
                        <div class="m2"><a href="http://www.9ask.cn/usersite/home/wangyongjie/index.asp"><img src="http://img.9ask.cn/souask/aa_images/wangyongjie.gif" width="60" height="80"   /></a></div>
                        <div class="m3">
                            <p><a href="http://www.9ask.cn/usersite/home/wangyongjie/index.asp">王永杰律师</a></p>
                            <p>电话：13910203169</p>
                            <p>专长：刑事辩护</p>
                            <p><a href="http://www.9ask.cn/usersite/home/wangyongjie/ask.asp"><img src="/images/askme.jpg" width="50" height="17" /></a> </p>
                        </div>
                    </li>
                    <li>
                        <div class="m1">2、</div>
                        <div class="m2"><a href="http://www.9ask.cn/usersite/home/jennygao/index.asp"><img src="http://img.9ask.cn/souask/userpic/2010319165615.jpg" width="60" height="80"  /></a></div>
                        <div class="m3">
                            <p><a href="http://www.9ask.cn/usersite/home/jennygao/index.asp">高岩律师</a></p>
                            <p>电话：13911552806</p>
                            <p>专长：合同纠纷</p>
                            <p><a href="http://www.9ask.cn/usersite/home/jennygao/ask.asp"><img src="/images/askme.jpg" width="50" height="17" /></a></p>
                        </div>
                    </li>
                </ul>
            </div>
            <!--特别推荐律师-->
            <div class="thead1 margin_top_7">特别推荐律师</div>
            <div class="cbody spcmdlawyer">
                <div class="lphoto"> <iframe src="http://www.9ask.cn/souask/include/aa_gundong.html" frameborder="0" width="236px " height="122px;" scrolling="no"></iframe></div>

            </div>
        </div>
    </div>
    <!--宣传通栏-->

    <!--two-->
    <div class="two margin_top_10">
        <!--上周咨询之星-->
        <div class="left margin_right_10">
            <div class="thead0 ftb">上周咨询之星</div>
            <div class="cbody lastaskstar padding_5">
                <div class="firststarhead"></div>
<?php
$i=0;
			if (count($AskStars) > 0){
                foreach($AskStars as $k=>$v) {
                    if($i==0) {
                        echo '<div class="firststar">
<div class="mphoto"><img src="/images/mphoto.jpg" width="60" height="70" /></div>
<p><a href="'.$v['url'].'" target=_blank >'.$v['truename'].'律师</a></p><p>电话：'.$v['mobile'].'</p><p>积分：'.$v['jifen'].'</p>
<p><a href="'.$v['askurl'].'" target=_blank ><img src="/images/askme.jpg" width="50" height="17" /></a></p></div> ' . '
<div class="jsanswer"><h5 class="margin_bottom_10">精选回答</h5>';
//打印最佳答案
                        foreach($AskStars_bestanswer as $kbest=>$vv) {
                            ?>
                <p><a href="<?php echo AskTool::Question_GetUrl($vv->question->ID);?>" target="_blank"><?php echo AskTool::str_cut($vv->question->title,26)?></a></p>
                            <?php
        }


//最佳答案获取结束
                        echo '</div><div class="askstar"><ul>';
                    } else {
                        echo '<li><div class="k1">'.($i+1).'</div>
<div class="k2"><a href="'.$v['url'].'" target=_blank >'.$v['truename'].'</a>&nbsp;'.str_ireplace('.','', $v['mobile']).'</div>
<div class="k3"> <a href="'.$v['url'].'" target=_blank >'.'<img src="/images/aski.jpg" width="39" height="17" /></a></div></li>
';
                    }
                    $i++;
                }
				}
                ?>

                </ul>
            </div>
        </div>
    </div>
    <!--高分法律咨询-->
    <div class="center">
        <div class="thead2">
            <h4>高分法律咨询</h4>
            <div class="more"><a href="/highscore" target="_blank" >更多</a></div>
        </div>
        <div class="cbody newqlist qqbo_x">
            <ul>
<?php
foreach ($q_highscore as $k=>$v) {
                              $hfusers='暂无回复';
                        if ($v->replys>0) {
                            if($v->hfuser->userClassID==1) {
                                $lsurl=AskTool::GetLawyerurl($v->hfuser->ID, $v->hfuser->name, $v->hfuser->IsStar);
                                $hfusers="<a  href='$lsurl'   target=_blank >". AskTool::str_cut($v->hfuser->TrueName, 9)."</a>";
                            }
                            else {
                                $hfusers='公众回复';
                            }
                        }
                    echo "<li><a href='http://ask.9ask.cn/catalog_".$v->fenleiid ."/all" ."'>[".$v->topic.
                            "]</a> <a href='http://ask.9ask.cn/question/2011/".$v->ID.".html'>".mb_substr($v->title, 0, 14, 'utf-8').
                            "</a> <div class='answer_p'><span class='qq_box' >回复者：</span>$hfusers</div></li>";
                }
                ?>
            </ul>
            <div class="footinfo"><a href="http://ask.9ask.cn/nosolved" class="e14">邀您解答：待解决咨询</a></div>
        </div>
    </div>
    <!--推荐专家-->
    <div class="right">
        <div class="thead3">推荐专家</div>
        <div class="cbody commendept commendept2">
            <ul>
                <li>
                    <div class="m1">1、</div>
                    <div class="m2"><a href="http://www.9ask.cn/usersite/home/6688limin/"><img src="http://img.9ask.cn/souask/userpic/2010315211943.jpg" width="60" height="80"  /></a></div>
                    <div class="m3">
                        <p><a href="http://www.9ask.cn/usersite/home/6688limin/">李敏律师</a></p>
                        <p>电话：13821621685</p>
                        <p>专长：婚姻家庭</p>
                        <p><a href="http://www.9ask.cn/usersite/home/6688limin/ask.asp"><img src="/images/askme.jpg" width="50" height="17" /></a></p>
                    </div>
                </li>
                <li>
                    <div class="m1">2、</div>
                    <div class="m2"><a href="http://www.9ask.cn/usersite/home/dauking/index.asp"><img src="http://img.9ask.cn/souask/userpic/20095320275073499.jpg" width="60" height="80" class="law_pic" /></a></div>
                    <div class="m3">
                        <p><a href="http://www.9ask.cn/usersite/home/dauking/index.asp">吕士才律师</a></p>
                        <p>电话：13452926868</p>
                        <p>专长：知识产权</p>
                        <p><a href="http://www.9ask.cn/usersite/home/dauking/ask.asp"><img src="/images/askme.jpg" width="50" height="17" /></a> </p>
                    </div>
                </li>
                <li>
                    <div class="m1">3、</div>
                    <div class="m2"><a href="http://www.9ask.cn/usersite/home/zxd672387785/index.asp"><img src="http://img.9ask.cn/souask/userpic/2008102716582673499.jpg" width="60" height="80" class="law_pic" /></a></div>
                    <div class="m3">
                        <p><a href="http://www.9ask.cn/usersite/home/zxd672387785/index.asp">曾晓东律师</a></p>
                        <p>电话：13983485961</p>
                        <p>专长：合同纠纷</p>
                        <p> <a href="http://www.9ask.cn/usersite/home/zxd672387785/ask.asp"><img src="http://img.9ask.cn/souask/images/ask_me.jpg" width="50" height="17" /></a></p>
                    </div>
                </li>
                <li>
                    <div class="m1">4、</div>
                    <div class="m2"><a href="http://www.9ask.cn/usersite/home/wangzuhui/index.asp"><img src="http://img.9ask.cn/souask/userpic/200673202449.jpg" width="60" height="80" class="law_pic" /></a></div>
                    <div class="m3">
                        <p><a href="http://www.9ask.cn/usersite/home/wangzuhui/index.asp">王祖惠律师</a></p>
                        <p>电话：13983091026</p>
                        <p>专长：人身损害</p>
                        <p><a href="http://www.9ask.cn/usersite/home/wangzuhui/ask.asp"><img src="/images/askme.jpg" width="50" height="17" /></a></p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!--宣传通栏-->
<div class="cwidth margin_top_10"><a href="http://www.9ask.cn/usersite/home/yuzhengchun/" target="_blank"><img src="/images/gb2.jpg" width="950" height="90" /></a></div>
<!--民事类开始-->
<div class="three margin_top_10">
    <!--知识分类-->
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
    <!--分类咨询-->
    <div class="center">
        <div class="thead3">
            <h4>民事法律类咨询</h4>
            <div class="more"><a href="http://ask.9ask.cn/index.php/catalog_3/all" target="_blank">更多</a></div>
        </div>
        <div class="cbody qqbox padding_top_10">
            <div class="zsqboxhead padding_left_10">
                <span class="oback" id="class17" onmouseover="hideit('17,21,20,22');showclass(17);" ><a href="http://ask.9ask.cn/index.php/catalog_17/all" target="_blank">人身损害</a></span>
                <span class="cback" id="class21" onmouseover="hideit('17,21,20,22');showclass(21);"><a href="http://ask.9ask.cn/index.php/catalog_21/all" target="_blank">医疗纠纷</a></span>
                <span class="cback" id="class20" onmouseover="hideit('17,21,20,22');showclass(20);"><a href="http://ask.9ask.cn/index.php/catalog_20/all" target="_blank">债权债务</a></span>
                <span class="cback" id="class22" onmouseover="hideit('17,21,20,22');showclass(22);"><a href="http://ask.9ask.cn/index.php/catalog_22/all" target="_blank">交通事故</a></span>
            </div>
<?php
// question_minshi
            $icount=0;
            foreach ($question_minshi as $k=>$v) {
                //如果是数组，那么就接下来进行循环
                $licontent='';
                foreach($v as $onekey=>$onequestion) {
                              $hfusers='暂无回复';
                        if ($v->replys>0) {
                            if($v->hfuser->userClassID==1) {
                                $lsurl=AskTool::GetLawyerurl($v->hfuser->ID, $v->hfuser->name, $v->hfuser->IsStar);
                                $hfusers="<a  href='$lsurl'   target=_blank >". AskTool::str_cut($v->hfuser->TrueName, 9)."</a>";
                            }
                            else {
                                $hfusers='公众回复';
                            }
                        }
                    $licontent .="<li><a href='catalog_"   . $onequestion['fenleiid'] . "/all'>[". $onequestion['topic'] ."]</a> <a href='" . AskTool::Question_GetUrl($onequestion['ID']) ."'>" . AskTool::str_cut($onequestion['title'], 30) ."</a><div class='answer_p'><span class='qq_box'>回复者：</span>$hfusers</div></li>";

                }
                if($icount==0) {
                    echo "<ul id='index_smaillcalss_$k' >" . $licontent ."</ul>";
                }
                else {
                    echo "<ul id='index_smaillcalss_$k' style='display:none '>" . $licontent ."</ul>";
                }
                $icount++;
            }
            ?>

        </div>
    </div>
    <div class="right">
        <div class="thead3">推荐民事类律师</div>
        <div class="cbody zsceptbox">
            <div class="clicktxt" id="cka_cont1">
                <dl class="" onmouseover="changeList(this, 'cka_cont1', event)" onmouseout="changeList(this, 'cka_cont1', event)">
                    <dt class="lt01">1、</dt>

                    <dd class="lt02">
                        <a href="http://www.9ask.cn/usersite/home/ziranlvshi/index.asp" ><img src="http://img.9ask.cn/souask/userpic/20097913515373499.jpg" alt="薛从刚律师" width="60" height="80" /></a>
                    </dd>

                    <dd class="lt03">
                        <div>薛从刚律师 15922137882</div>
                        <a href="http://www.9ask.cn/usersite/home/ziranlvshi/index.asp"  title="薛从刚律师">
                            <strong>薛从刚律师</strong>
                            <span>电话：15922137882<br>
                                专长：合同纠纷</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/ziranlvshi/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span>

                    </dd>

                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont1', event)" onmouseout="changeList(this, 'cka_cont1', event)">
                    <dt class="lt01">2、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/guanjinfu/" ><img src="http://img.9ask.cn/souask/userpic/200921211224373499.jpg" alt="官金福律师" /></a></dd>
                    <dd class="lt03">
                        <div>官金福律师 13902286737</div>
                        <a href="http://www.9ask.cn/usersite/home/guanjinfu/"  title="官金福律师"><strong>官金福律师</strong><span>电话：13902286737<br>
                                专长：交通事故</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/guanjinfu/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont1', event)" onmouseout="changeList(this, 'cka_cont1', event)">
                    <dt class="lt01">3、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/wjy00/index.asp" ><img src="http://img.9ask.cn/beijing/index/aa_images/zhiming/wangjiaoyan.gif" alt="王娇艳律师" /></a></dd>
                    <dd class="lt03">
                        <div>王娇艳律师 13810459829</div>
                        <a href="http://www.9ask.cn/usersite/home/wjy00/index.asp"  title="王娇艳律师"><strong>王娇艳律师</strong><span>电话：13810459829<br>
                                专长：婚姻家庭</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/wjy00/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont1', event)" onmouseout="changeList(this, 'cka_cont1', event)">
                    <dt class="lt01">4、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/zgh5544/" ><img src="http://img.9ask.cn/souask/userpic/2009216917673499.jpg" alt="张桂华律师" /></a></dd>
                    <dd class="lt03">
                        <div>张桂华律师 13261515544</div>
                        <a href="http://www.9ask.cn/usersite/home/zgh5544/"  title="张桂华律师"><strong>张桂华律师</strong><span>电话：13261515544<br>
                                专长：房产纠纷</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/zgh5544/ask.asp"><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <div class="clear"></div>
                <script src="http://www.9ask.cn/souask/js/click.js" type="text/javascript"></script>

            </div>

        </div>
    </div>
</div>
<!--民事类结束-->
<!--刑事行政类-->
<div class="three margin_top_10">
    <!--知识分类-->
    <div class="left margin_right_10">
        <div class="thead3">刑事行政相关法律知识</div>
        <div class="cbody zsbody">

            <a title="犯罪量刑" href="http://news.9ask.cn/xsbh/xflx/">犯罪量刑</a>
            <a title="正当防卫" href="http://news.9ask.cn/xsbh/zdfw/">正当防卫</a>
            <a title="罪名解读" href="http://news.9ask.cn/xsbh/zmjd/">罪名解读</a>
            <a title="刑罚种类" href="http://news.9ask.cn/xsbh/xfzl/">刑罚种类</a>
            <a title="刑事责任" href="http://news.9ask.cn/xsbh/xszrnl/">刑事责任</a>
            <a title="犯罪心理" href="http://news.9ask.cn/xsbh/fzxl/">犯罪心理</a>

            <a title="刑事诉讼" href="http://news.9ask.cn/xsss/">刑事诉讼</a>
            <a title="立案" href="http://news.9ask.cn/xsss/la/">立案相关</a>
            <a title="刑事拘留" href="http://news.9ask.cn/xsss/sxjl/">刑事拘留</a>
            <a title="管辖权" href="http://news.9ask.cn/xsss/gxq/">管辖相关</a>
            <a title="强制执行" href="http://news.9ask.cn/xsss/qzzx/">强制执行</a>
            <a title="刑事文书" href="http://news.9ask.cn/xsss/xsws/">刑事文书</a>
            <a title="行政复议" href="http://news.9ask.cn/xzfy/">行政复议</a>

            <a title="公安国安" href="http://news.9ask.cn/gaga/">公安国安</a>
            <a title="国家赔偿" href="http://news.9ask.cn/gjpc/">国家赔偿</a>
            <a title="工商税务" href="http://news.9ask.cn/gssw/">工商税务</a>
            <a title="海关海检" href="http://news.9ask.cn/hgsj/">海关海检</a><br>
            <a title="刑事诉讼指南" href="http://news.9ask.cn/xsss/xssszn/">刑事诉讼指南</a>

        </div>
    </div>
    <!--分类咨询-->
    <div class="center">
        <div class="thead3">
            <h4>刑事行政类咨询</h4>
            <div class="more"><a href="http://ask.9ask.cn/index.php/catalog_7/all" target="_blank">更多</a></div>
        </div>
        <div class="cbody qqbox padding_top_10">
            <div class="zsqboxhead padding_left_10">
                <span class="oback" id="class35" onmouseover="hideit('35,34,36,38');showclass(35);"><a href="http://ask.9ask.cn/index.php/catalog_35/all" target="_blank">刑事辩护</a></span>
                <span class="cback" id="class34" onmouseover="hideit('35,34,36,38');showclass(34);"><a href="http://ask.9ask.cn/index.php/catalog_34/all" target="_blank">去保候审</a></span>
                <span class="cback" id="class36" onmouseover="hideit('35,34,36,38');showclass(36);"><a href="http://ask.9ask.cn/index.php/catalog_36/all" target="_blank">刑事自诉</a></span>
                <span class="cback" id="class38" onmouseover="hideit('35,34,36,38');showclass(38);"><a href="http://ask.9ask.cn/index.php/catalog_38/all" target="_blank">交通事故</a></span>
            </div>
<?php
// question_minshi
            $icount=0;
            foreach ($question_xsxz as $k=>$v) {
                //如果是数组，那么就接下来进行循环
                $licontent='';
                foreach($v as $onekey=>$onequestion) {
                              $hfusers='暂无回复';
                        if ($v->replys>0) {
                            if($v->hfuser->userClassID==1) {
                                $lsurl=AskTool::GetLawyerurl($v->hfuser->ID, $v->hfuser->name, $v->hfuser->IsStar);
                                $hfusers="<a  href='$lsurl'   target=_blank >". AskTool::str_cut($v->hfuser->TrueName, 9)."</a>";
                            }
                            else {
                                $hfusers='公众回复';
                            }
                        }
                    $licontent .="<li><a href='catalog_"   . $onequestion['fenleiid'] . "/all'>[". $onequestion['topic'] ."]</a> <a href='" . AskTool::Question_GetUrl($onequestion['ID']) ."'>" . AskTool::str_cut($onequestion['title'], 30) ."</a><div class='answer_p'><span class='qq_box'>回复者：</span>$hfusers</div></li>";

                }
                if($icount==0) {
                    echo "<ul id='index_smaillcalss_$k' >" . $licontent ."</ul>";
                }
                else {
                    echo "<ul id='index_smaillcalss_$k' style='display:none '>" . $licontent ."</ul>";
                }
                $icount++;
            }
            ?>

        </div>
    </div>
    <div class="right">
        <div class="thead3">推荐刑事行政类律师</div>
        <div class="cbody zsceptbox">
            <div class="clicktxt" id="cka_cont2">
                <dl class="" onmouseover="changeList(this, 'cka_cont2', event)" onmouseout="changeList(this, 'cka_cont2', event)">
                    <dt class="lt01">1、</dt>

                    <dd class="lt02">
                        <a href="http://www.9ask.cn/usersite/home/yuliangang/" ><img src="http://img.9ask.cn/souask/userpic/2010319163457.jpg" alt="余联刚律师" width="60" height="80" /></a>
                    </dd>

                    <dd class="lt03">
                        <div>余联刚律师 13905192708</div>
                        <a href="http://www.9ask.cn/usersite/home/yuliangang/"  title="余联刚律师">
                            <strong>余联刚律师</strong>
                            <span>电话：13905192708<br>
                                专长：刑事辩护</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/yuliangang/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span>

                    </dd>

                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont2', event)" onmouseout="changeList(this, 'cka_cont2', event)">
                    <dt class="lt01">2、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/zjt06/" ><img src="http://img.9ask.cn/souask/userpic/zjt06.jpg" alt="赵江涛律师" /></a></dd>
                    <dd class="lt03">
                        <div>赵江涛律师 13031008678</div>
                        <a href="http://www.9ask.cn/usersite/home/zjt06/"  title="赵江涛律师"><strong>赵江涛律师</strong><span>电话：13031008678<br>
                                专长：刑事辩护</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/zjt06/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont2', event)" onmouseout="changeList(this, 'cka_cont2', event)">
                    <dt class="lt01">3、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/souask/user/index.asp?ID=2579369" ><img src="http://img.9ask.cn/souask/userpic/201083103953.JPG" alt="张高领律师" /></a></dd>
                    <dd class="lt03">
                        <div>张高领律师 15093101390</div>
                        <a href="http://www.9ask.cn/souask/user/index.asp?ID=2579369"  title="张高领律师"><strong>张高领律师</strong><span>电话：15093101390<br>
                                专长：刑事辩护</a><br>
                                <em><a href="http://www.9ask.cn/souask/user/ask.asp?uid=2579369" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont2', event)" onmouseout="changeList(this, 'cka_cont2', event)">
                    <dt class="lt01">4、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/lthlvshi/" ><img src="http://img.9ask.cn/souask/userpic/20101221819.JPG" alt="李同红律师" /></a></dd>
                    <dd class="lt03">
                        <div>李同红律师 13261908418</div>
                        <a href="http://www.9ask.cn/usersite/home/lthlvshi/"  title="李同红律师"><strong>李同红律师</strong><span>电话：13261908418<br>
                                专长：刑事辩护</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/lthlvshi/ask.asp"><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<!--刑事行政类结束-->
<!--经济类类开始-->
<div class="three margin_top_10">
    <!--知识分类-->
    <div class="left margin_right_10">
        <div class="thead3">经济类相关法律知识</div>
        <div class="cbody zsbody">

            <a title="房产买卖" href="http://news.9ask.cn/fcjf/fcmm/">房产买卖</a>
            <a title="房屋租赁" href="http://news.9ask.cn/fcjf/zulin/">房屋租赁</a>
            <a title="城市规划" href="http://news.9ask.cn/fcjf/guihua/">城市规划</a>
            <a title="物业管理" href="http://news.9ask.cn/fcjf/wuye/">物业管理</a>
            <a title="房屋中介" href="http://news.9ask.cn/fcjf/zhongjie/">房屋中介</a>
            <a title="房屋拆迁" href="http://news.9ask.cn/fcjf/chaiqian/">房屋拆迁</a>

            <a title="知识产权" href="http://news.9ask.cn/zclaw/">知识产权</a>
            <a title="专利代理" href="http://news.9ask.cn/zlq/zldl/">专利代理</a>
            <a title="金融证券" href="http://news.9ask.cn/jrzq/">金融证券</a>
            <a title="票据时效" href="http://news.9ask.cn/jrzq/pjsx/">票据时效</a>
            <a title="空白票据" href="http://news.9ask.cn/jrzq/kbpj/">空白票据</a>
            <a title="证券交易" href="http://news.9ask.cn/jrzq/zqjy/">证券交易</a>

            <a title="银行保险" href="http://news.9ask.cn/yhbx/">银行保险</a>
            <a title="经济仲裁" href="http://news.9ask.cn/jjzc/">经济仲裁</a>
            <a title="网络法律" href="http://news.9ask.cn/wlfl/">网络法律</a>
            <a title="招标投标" href="http://news.9ask.cn/zbtb/">招标投标</a>
            <a title="专利诉讼" href="http://news.9ask.cn/zlss/">专利诉讼</a>
            <a title="合伙加盟" href="http://news.9ask.cn/hhjm/">合伙加盟</a>

            <a title="企业名称权保护" href="http://news.9ask.cn/zclaw/zcbh/qybh/">企业名称权保护</a>
            <a title="商业秘密保护" href="http://news.9ask.cn/zclaw/symm/smbh/">商业秘密保护</a>
            <a title="著作权 " href="http://news.9ask.cn/zzq">著作权</a>
            <a title="商标权" href="http://news.9ask.cn/sbq/">商标权</a>

        </div>
    </div>
    <!--分类咨询-->
    <div class="center">
        <div class="thead3">
            <h4>经济类咨询</h4>
            <div class="more"><a href="http://ask.9ask.cn/index.php/catalog_4/all" target="_blank">更多</a></div>
        </div>
        <div class="cbody qqbox padding_top_10">
            <div class="zsqboxhead padding_left_10">
                <span class="oback" id="class24" onmouseover="hideit('24,27,31,23');showclass(24);"><a href="http://ask.9ask.cn/index.php/catalog_24/all" target="_blank">房产纠纷</a></span>
                <span class="cback" id="class27" onmouseover="hideit('24,27,31,23');showclass(27);"><a href="http://ask.9ask.cn/index.php/catalog_27/all" target="_blank">个人独资</a></span>
                <span class="cback" id="class31" onmouseover="hideit('24,27,31,23');showclass(31);"><a href="http://ask.9ask.cn/index.php/catalog_31/all" target="_blank">经济仲裁</a></span>
                <span class="cback" id="class23" onmouseover="hideit('24,27,31,23');showclass(23);"><a href="http://ask.9ask.cn/index.php/catalog_23/all" target="_blank">工程建筑</a></span>
            </div>
<?php
// question_minshi
            $icount=0;
            foreach ($question_jingji as $k=>$v) {
                //如果是数组，那么就接下来进行循环
                $licontent='';
                foreach($v as $onekey=>$onequestion) {
                              $hfusers='暂无回复';
                        if ($v->replys>0) {
                            if($v->hfuser->userClassID==1) {
                                $lsurl=AskTool::GetLawyerurl($v->hfuser->ID, $v->hfuser->name, $v->hfuser->IsStar);
                                $hfusers="<a  href='$lsurl'   target=_blank >". AskTool::str_cut($v->hfuser->TrueName, 9)."</a>";
                            }
                            else {
                                $hfusers='公众回复';
                            }
                        }
                    $licontent .="<li><a href='catalog_"   . $onequestion['fenleiid'] . "/all'>[". $onequestion['topic'] ."]</a> <a href='" . AskTool::Question_GetUrl($onequestion['ID']) ."'>" . AskTool::str_cut($onequestion['title'], 30) ."</a><div class='answer_p'><span class='qq_box'>回复者：</span>$hfusers</div></li>";

                }
                if($icount==0) {
                    echo "<ul id='index_smaillcalss_$k' >" . $licontent ."</ul>";
                }
                else {
                    echo "<ul id='index_smaillcalss_$k' style='display:none '>" . $licontent ."</ul>";
                }
                $icount++;
            }
            ?>

        </div>
    </div>
    <div class="right">
        <div class="thead3">推荐经济类律师</div>
        <div class="cbody zsceptbox">
            <div class="clicktxt" id="cka_cont3">
                <dl class="" onmouseover="changeList(this, 'cka_cont3', event)" onmouseout="changeList(this, 'cka_cont3', event)">
                    <dt class="lt01">1、</dt>

                    <dd class="lt02">
                        <a href="http://www.9ask.cn/usersite/home/baixuefei/" ><img src="http://img.9ask.cn/souask/userpic/2011114151954.jpg" alt="白雪飞律师" width="60" height="80" /></a>
                    </dd>

                    <dd class="lt03">
                        <div>白雪飞律师 13801662966</div>
                        <a href="http://www.9ask.cn/usersite/home/baixuefei/"  title="白雪飞律师">
                            <strong>白雪飞律师</strong>
                            <span>电话：13801662966<br>
                                专长：合同纠纷</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/baixuefei/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span>

                    </dd>

                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont3', event)" onmouseout="changeList(this, 'cka_cont3', event)">
                    <dt class="lt01">2、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/guanjinfu/" ><img src="http://img.9ask.cn/souask/userpic/200921211224373499.jpg" alt="官金福律师" /></a></dd>
                    <dd class="lt03">
                        <div>官金福律师 13902286737</div>
                        <a href="http://www.9ask.cn/usersite/home/guanjinfu/"  title="官金福律师"><strong>官金福律师</strong><span>电话：13902286737<br>
                                专长：交通事故</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/guanjinfu/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont3', event)" onmouseout="changeList(this, 'cka_cont3', event)">
                    <dt class="lt01">3、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/maodun7715/" ><img src="http://img.9ask.cn/souask/userpic/200942915374073499.JPG" alt="邢伟华律师" /></a></dd>
                    <dd class="lt03">
                        <div>邢伟华律师 18916748810</div>
                        <a href="http://www.9ask.cn/usersite/home/maodun7715/"  title="邢伟华律师"><strong>邢伟华律师</strong><span>电话：18916748810<br>
                                专长：合同纠纷</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/maodun7715/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont3', event)" onmouseout="changeList(this, 'cka_cont3', event)">
                    <dt class="lt01">4、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/sxwangjun/" ><img src="http://img.9ask.cn/souask/userpic/n20091113070409.jpg" alt="王俊律师" /></a></dd>
                    <dd class="lt03">
                        <div>王俊律师 13803460497</div>
                        <a href="http://www.9ask.cn/usersite/home/sxwangjun/"  title="王俊律师"><strong>王俊律师</strong><span>电话：13803460497<br>
                                专长：合同纠纷</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/sxwangjun/ask.asp"><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <div class="clear"></div>

            </div>
        </div>
    </div>
</div>
<!--经济类结束-->
<!--公司法律类咨询-->
<div class="three margin_top_10">
    <!--知识分类-->
    <div class="left margin_right_10">
        <div class="thead3">公司法相关法律知识</div>
        <div class="cbody zsbody">
            <a title="公司兼并" href="http://news.9ask.cn/gsbg/gsjb/">公司兼并</a>
            <a title="外资并购" href="http://news.9ask.cn/gsbg/wzbg/">外资并购</a>
            <a title="资产收购" href="http://news.9ask.cn/gsbg/zcsg/">资产收购</a>
            <a title="审计评估" href="http://news.9ask.cn/gsbg/sjpg/">审计评估</a>
            <a title="并购咨询" href="http://www.9ask.cn/souask/sort.asp?cid=51">并购咨询</a>
            <a title="股权收购" href="http://news.9ask.cn/gsbg/gqsg/">股权收购</a>
            <a title="尽职调查" href="http://news.9ask.cn/gsbg/jzdc/">尽职调查</a>

            <a title="并购诉讼" href="http://news.9ask.cn/gsbg/bgss/">并购诉讼</a>
            <a title="并购审批" href="http://news.9ask.cn/gsbg/bgsp">并购审批</a>
            <a href="http://news.9ask.cn/gsbg/zzbg/" target="_blank">增资并购</a>
            <a href="http://news.9ask.cn/gsbg/hwbg/" target="_blank">海外并购</a>
            <a href="http://news.9ask.cn/gsbg/bgjf/" target="_blank">并购纠纷</a>
            <a title="公司清算" href="http://news.9ask.cn/gsqs/">公司清算</a>

            <a title="外企清算" href="http://news.9ask.cn/gsqs/wqqs/">外企清算</a>
            <a title="破产解散" href="http://news.9ask.cn/pcjs">破产解散</a>
            <a title="资产拍卖" href="http://news.9ask.cn/zcpm">资产拍卖</a>
            <a title="公司清算法律" href="http://news.9ask.cn/gsqs/">公司清算法律</a> <br/>
            <a title="公司清算常识" href="http://news.9ask.cn/gsqs/qscs/">公司清算常识</a>
            <a title="公司清算程序" href="http://news.9ask.cn/gsqs/qscx/">公司清算程序</a> <br/>
            <a title="公司清算公告" href="http://news.9ask.cn/gsqs/qsgg/">公司清算公告</a>
            <a title="公司清算指南" href="http://news.9ask.cn/gsqs/qszn/">公司清算指南</a>
        </div>
    </div>
    <!--分类咨询-->
    <div class="center">
        <div class="thead3">
            <h4>公司法类咨询</h4>
            <div class="more"><a href="http://ask.9ask.cn/index.php/catalog_9/all" target="_blank">更多</a></div>
        </div>
        <div class="cbody qqbox padding_top_10">
            <div class="zsqboxhead padding_left_10">
                <span class="oback" id="class51" onmouseover="hideit('51,52,53,54');showclass(51);"><a href="http://ask.9ask.cn/index.php/catalog_51/all" target="_blank">公司并购</a></span>
                <span class="cback" id="class52" onmouseover="hideit('51,52,53,54');showclass(52);"><a href="http://ask.9ask.cn/index.php/catalog_52/all" target="_blank">股份转让</a></span>
                <span class="cback" id="class53" onmouseover="hideit('51,52,53,54');showclass(53);"><a href="http://ask.9ask.cn/index.php/catalog_53/all" target="_blank">企业改制</a></span>
                <span class="cback" id="class54" onmouseover="hideit('51,52,53,54');showclass(54);"><a href="http://ask.9ask.cn/index.php/catalog_54/all" target="_blank">公司清算</a></span>
            </div>
<?php
// question_minshi
            $icount=0;
            foreach ($question_company as $k=>$v) {
                //如果是数组，那么就接下来进行循环
                $licontent='';
                foreach($v as $onekey=>$onequestion) {
                              $hfusers='暂无回复';
                        if ($v->replys>0) {
                            if($v->hfuser->userClassID==1) {
                                $lsurl=AskTool::GetLawyerurl($v->hfuser->ID, $v->hfuser->name, $v->hfuser->IsStar);
                                $hfusers="<a  href='$lsurl'   target=_blank >". AskTool::str_cut($v->hfuser->TrueName, 9)."</a>";
                            }
                            else {
                                $hfusers='公众回复';
                            }
                        }
                    $licontent .="<li><a href='catalog_"   . $onequestion['fenleiid'] . "/all'>[". $onequestion['topic'] ."]</a> <a href='" . AskTool::Question_GetUrl($onequestion['ID']) ."'>" . AskTool::str_cut($onequestion['title'], 30) ."</a><div class='answer_p'><span class='qq_box'>回复者：</span>$hfusers</div></li>";

                }
                if($icount==0) {
                    echo "<ul id='index_smaillcalss_$k' >" . $licontent ."</ul>";
                }
                else {
                    echo "<ul id='index_smaillcalss_$k' style='display:none '>" . $licontent ."</ul>";
                }
                $icount++;
            }
            ?>

        </div>
    </div>
    <div class="right">
        <div class="thead3">推荐公司法类律师</div>
        <div class="cbody zsceptbox">
            <div class="clicktxt" id="cka_cont4">
                <dl class="" onmouseover="changeList(this, 'cka_cont4', event)" onmouseout="changeList(this, 'cka_cont4', event)">
                    <dt class="lt01">1、</dt>

                    <dd class="lt02">
                        <a href="http://www.9ask.cn/usersite/home/youdian123/" ><img src="http://img.9ask.cn/souask/userpic/201137111017.jpg" alt="田野律师" width="60" height="80" /></a>
                    </dd>

                    <dd class="lt03">
                        <div>田野律师 18701565101</div>
                        <a href="http://www.9ask.cn/usersite/home/youdian123/"  title="田野律师">
                            <strong>田野律师</strong>
                            <span>电话：18701565101<br>
                                专长：合同纠纷</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/youdian123/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span>

                    </dd>

                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont4', event)" onmouseout="changeList(this, 'cka_cont4', event)">
                    <dt class="lt01">2、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/nmwhg/" ><img src="http://img.9ask.cn/souask/userpic/2011228151822.gif" alt="王律师" /></a></dd>
                    <dd class="lt03">
                        <div>王律师 13801075778</div>
                        <a href="http://www.9ask.cn/usersite/home/nmwhg/"  title="王律师"><strong>王律师</strong><span>电话：13801075778<br>
                                专长：公司并购</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/nmwhg/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont4', event)" onmouseout="changeList(this, 'cka_cont4', event)">
                    <dt class="lt01">3、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/zjt06/" ><img src="http://img.9ask.cn/souask/userpic/zjt06.jpg" alt="赵江涛律师" /></a></dd>
                    <dd class="lt03">
                        <div>赵江涛律师 13031008678</div>
                        <a href="http://www.9ask.cn/usersite/home/zjt06/"  title="赵江涛律师"><strong>赵江涛律师</strong><span>电话：13031008678<br>
                                专长：婚姻家庭</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/zjt06/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont4', event)" onmouseout="changeList(this, 'cka_cont4', event)">
                    <dt class="lt01">4、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/yuliangang/" ><img src="http://img.9ask.cn/souask/userpic/2010319163457.jpg" alt="余联刚律师" /></a></dd>
                    <dd class="lt03">
                        <div>余联刚律师 13905192708</div>
                        <a href="http://www.9ask.cn/usersite/home/yuliangang/"  title="余联刚律师"><strong>余联刚律师</strong><span>电话：13905192708<br>
                                专长：房产纠纷</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/yuliangang/ask.asp"><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <div class="clear"></div>

            </div>
        </div>
    </div>
</div>
<!--公司法律类咨询结束-->
<!--其他法律类咨询开始-->
<div class="three margin_top_10">
    <!--知识分类-->
    <div class="left margin_right_10">
        <div class="thead3">涉外类相关法律知识</div>
        <div class="cbody zsbody">
            <a href="http://news.9ask.cn/zsyz/">招商引资</a>
            <a href="http://news.9ask.cn/qxbt/">倾销补贴</a>
            <a href="http://news.9ask.cn/swzc/">涉外仲裁</a>
            <a href="http://news.9ask.cn/wto/">WTO事务</a>
            <a href="http://news.9ask.cn/hshs/peichang/">海事赔偿</a>
            <a href="http://news.9ask.cn/hshs/pz/">船舶碰撞</a><br/>

            <a href="http://news.9ask.cn/zsyz/zsyzxm/">招商引资项目</a>

            <a href="http://news.9ask.cn/zsyz/zsyzff/">招商引资方法</a><br/>
            <a href="http://news.9ask.cn/zsyz/zsyzff/">补贴申请书</a>
            <a href="http://news.9ask.cn/qxbt/qxfqx/">倾销与反倾销</a><br/>
            <a href="http://news.9ask.cn/swzc/swzcf/">涉外仲裁法</a>
            <a href="http://news.9ask.cn/swzc/swzcgz/">涉外仲裁规则</a><br/>
            <a href="http://news.9ask.cn/swzc/swzcjg/">涉外仲裁机构</a>

            <a href="http://news.9ask.cn/hshs/baoxian/">海上保险合同</a><br/>
            <a href="http://news.9ask.cn/zsyz/zsyzcs/">招商引资措施</a>
            <a href="http://news.9ask.cn/gjmy/dl/">国际贸易代理</a><br>
            <a href="http://news.9ask.cn/gjmy/ys/">国际货物运输</a>
            <a href="http://news.9ask.cn/gjmy/zhifu/">国际贸易支付</a>
        </div>
    </div>
    <!--分类咨询-->
    <div class="center">
        <div class="thead3">
            <h4>涉外类咨询</h4>
            <div class="more"><a href="http://ask.9ask.cn/index.php/catalog_8/all" target="_blank">更多</a></div>
        </div>
        <div class="cbody qqbox padding_top_10">
            <div class="zsqboxhead padding_left_10">
                <span class="oback" id="class43" onmouseover="hideit('43,44,46,47');showclass(43);"><a href="http://ask.9ask.cn/index.php/catalog_43/all" target="_blank">海事海商</a></span>
                <span class="cback" id="class44" onmouseover="hideit('43,44,46,47');showclass(44);"><a href="http://ask.9ask.cn/index.php/catalog_44/all" target="_blank">国际贸易</a></span>
                <span class="cback" id="class46" onmouseover="hideit('43,44,46,47');showclass(46);"><a href="http://ask.9ask.cn/index.php/catalog_46/all" target="_blank">外商投资</a></span>
                <span class="cback" id="class47" onmouseover="hideit('43,44,46,47');showclass(47);"><a href="http://ask.9ask.cn/index.php/catalog_47/all" target="_blank">合资合作</a></span>
            </div>
<?php
// question_minshi
            $icount=0;
            foreach ($question_shewai as $k=>$v) {
                //如果是数组，那么就接下来进行循环
                $licontent='';
                foreach($v as $onekey=>$onequestion) {
                              $hfusers='暂无回复';
                        if ($v->replys>0) {
                            if($v->hfuser->userClassID==1) {
                                $lsurl=AskTool::GetLawyerurl($v->hfuser->ID, $v->hfuser->name, $v->hfuser->IsStar);
                                $hfusers="<a  href='$lsurl'   target=_blank >". AskTool::str_cut($v->hfuser->TrueName, 9)."</a>";
                            }
                            else {
                                $hfusers='公众回复';
                            }
                        }
                    $licontent .="<li><a href='catalog_"   . $onequestion['fenleiid'] . "/all'>[". $onequestion['topic'] ."]</a> <a href='" . AskTool::Question_GetUrl($onequestion['ID']) ."'>" . AskTool::str_cut($onequestion['title'], 30) ."</a><div class='answer_p'><span class='qq_box'>回复者：</span>$hfusers</div></li>";

                }
                if($icount==0) {
                    echo "<ul id='index_smaillcalss_$k' >" . $licontent ."</ul>";
                }
                else {
                    echo "<ul id='index_smaillcalss_$k' style='display:none '>" . $licontent ."</ul>";
                }
                $icount++;
            }
            ?>

        </div>
    </div>
    <div class="right">
        <div class="thead3">推荐涉外类政类律师</div>
        <div class="cbody zsceptbox">
            <div class="clicktxt" id="cka_cont5">
                <dl class="" onmouseover="changeList(this, 'cka_cont5', event)" onmouseout="changeList(this, 'cka_cont5', event)">
                    <dt class="lt01">1、</dt>

                    <dd class="lt02">
                        <a href="http://www.9ask.cn/usersite/home/shangjianping/" ><img src="http://img.9ask.cn/souask/userpic/20096110473673499.jpg" alt="尚建平律师" width="60" height="80" /></a>
                    </dd>

                    <dd class="lt03">
                        <div>尚建平律师 13901770587</div>
                        <a href="http://www.9ask.cn/usersite/home/shangjianping/"  title="尚建平律师">
                            <strong>尚建平律师</strong>
                            <span>电话：13901770587<br>
                                专长：合同纠纷</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/shangjianping/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span>

                    </dd>

                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont5', event)" onmouseout="changeList(this, 'cka_cont5', event)">
                    <dt class="lt01">2、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/guanjinfu/" ><img src="http://img.9ask.cn/souask/userpic/200921211224373499.jpg" alt="官金福律师" /></a></dd>
                    <dd class="lt03">
                        <div>官金福律师 13902286737</div>
                        <a href="http://www.9ask.cn/usersite/home/guanjinfu/"  title="官金福律师"><strong>官金福律师</strong><span>电话：13902286737<br>
                                专长：交通事故</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/guanjinfu/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont5', event)" onmouseout="changeList(this, 'cka_cont5', event)">
                    <dt class="lt01">3、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/wjy00/index.asp" ><img src="http://img.9ask.cn/beijing/index/aa_images/zhiming/wangjiaoyan.gif" alt="王娇艳律师" /></a></dd>
                    <dd class="lt03">
                        <div>王娇艳律师 13810459829</div>
                        <a href="http://www.9ask.cn/usersite/home/wjy00/index.asp"  title="王娇艳律师"><strong>王娇艳律师</strong><span>电话：13810459829<br>
                                专长：婚姻家庭</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/wjy00/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont5', event)" onmouseout="changeList(this, 'cka_cont5', event)">
                    <dt class="lt01">4、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/zgh5544/" ><img src="http://img.9ask.cn/souask/userpic/2009216917673499.jpg" alt="张桂华律师" /></a></dd>
                    <dd class="lt03">
                        <div>张桂华律师 13261515544</div>
                        <a href="http://www.9ask.cn/usersite/home/zgh5544/"  title="张桂华律师"><strong>张桂华律师</strong><span>电话：13261515544<br>
                                专长：房产纠纷</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/zgh5544/ask.asp"><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <div class="clear"></div>

            </div>
        </div>
    </div>
</div>
<!--其他法律类咨询结束-->
<!--行使行政-->
<div class="three margin_top_10">
    <!--知识分类-->
    <div class="left margin_right_10">
        <div class="thead3">非诉讼相关法律知识</div>
        <div class="cbody zsbody">
            <a href="http://news.9ask.cn/wsdl/">文书代理</a>
            <a href="http://news.9ask.cn/hetongshencha/">合同审查</a>
            <a href="http://news.9ask.cn/cngw/">常年顾问</a>
            <a href="http://news.9ask.cn/ymlx/">移民留学</a>
            <a href="http://news.9ask.cn/zxdc/">资信调查</a>
            <a href="http://news.9ask.cn/szzs/">商帐追收</a>

            <a href="http://news.9ask.cn/fgjd/">法规解读</a>
            <a href="http://news.9ask.cn/flws/">法律文书</a>
            <a href="http://news.9ask.cn/gscx/cxzn/">查询指南</a>
            <a href="http://news.9ask.cn/gscx/wsbl/">网上办理</a>
            <a href="http://news.9ask.cn/wsdl/">实务文书</a>
            <a href="http://news.9ask.cn/flws/">法律文书</a>

            <a href="http://news.9ask.cn/sifajianding/sfjdfl/wsjd/">文书鉴定</a>
            <a href="http://news.9ask.cn/xsss/xsws/">刑事文书</a>
            <a href="http://news.9ask.cn/ldjf/laodongtiaojie/">劳动调解</a>
            <a href="http://news.9ask.cn/msss/tjzc/">调解仲裁</a>
            <a href="http://news.9ask.cn/hetongshencha/htsclc/">合同审查流程</a><br />
            <a href="http://news.9ask.cn/hetongshencha/htscyd/">合同审查要点</a>

            <a href="http://news.9ask.cn/hetongshencha/htsczy/">合同审查指引</a><br />
            <a href="http://news.9ask.cn/hetongshencha/htscb/">合同审查表</a>
            <a href="http://news.9ask.cn/cngw/cnpxgw/">常年培训顾问</a>

        </div>
    </div>
    <!--分类咨询-->
    <div class="center">
        <div class="thead3">
            <h4>非诉讼类咨询</h4>
            <div class="more"><a href="http://ask.9ask.cn/index.php/catalog_10/all" target="_blank">更多</a></div>
        </div>
        <div class="cbody qqbox padding_top_10">
            <div class="zsqboxhead padding_left_10">
                <span class="oback" id="class62" onmouseover="hideit('62,60,59,57');showclass(62);"><a href="http://ask.9ask.cn/index.php/catalog_62/all" target="_blank">私人律师</a></span>
                <span class="cback" id="class60" onmouseover="hideit('62,60,59,57');showclass(60);"><a href="http://ask.9ask.cn/index.php/catalog_60/all" target="_blank">调节谈判</a></span>
                <span class="cback" id="class59" onmouseover="hideit('62,60,59,57');showclass(59);"><a href="http://ask.9ask.cn/index.php/catalog_59/all" target="_blank">合同审查</a></span>
                <span class="cback" id="class57" onmouseover="hideit('62,60,59,57');showclass(57);"><a href="http://ask.9ask.cn/index.php/catalog_57/all" target="_blank">工商查询</a></span>
            </div>
<?php
// question_minshi
            $icount=0;
            foreach ($question_feisusong as $k=>$v) {
                //如果是数组，那么就接下来进行循环
                $licontent='';
                foreach($v as $onekey=>$onequestion) {
                              $hfusers='暂无回复';
                        if ($v->replys>0) {
                            if($v->hfuser->userClassID==1) {
                                $lsurl=AskTool::GetLawyerurl($v->hfuser->ID, $v->hfuser->name, $v->hfuser->IsStar);
                                $hfusers="<a  href='$lsurl'   target=_blank >". AskTool::str_cut($v->hfuser->TrueName, 9)."</a>";
                            }
                            else {
                                $hfusers='公众回复';
                            }
                        }
                    $licontent .="<li><a href='catalog_"   . $onequestion['fenleiid'] . "/all'>[". AskTool::str_cut($onequestion['topic'], 12) ."]</a> <a href='" . AskTool::Question_GetUrl($onequestion['ID']) ."'>" . AskTool::str_cut($onequestion['title'], 30) ."</a><div class='answer_p'><span class='qq_box'>回复者：</span>$hfusers</div></li>";

                }
                if($icount==0) {
                    echo "<ul id='index_smaillcalss_$k' >" . $licontent ."</ul>";
                }
                else {
                    echo "<ul id='index_smaillcalss_$k' style='display:none '>" . $licontent ."</ul>";
                }
                $icount++;
            }
            ?>

        </div>
    </div>
    <div class="right">
        <div class="thead3">非诉讼类律师</div>
        <div class="cbody zsceptbox">
            <div class="clicktxt" id="cka_cont6">
                <dl class="" onmouseover="changeList(this, 'cka_cont6', event)" onmouseout="changeList(this, 'cka_cont6', event)">
                    <dt class="lt01">1、</dt>

                    <dd class="lt02">
                        <a href="http://www.9ask.cn/usersite/home/royddc/" ><img src="http://img.9ask.cn/souask/userpic/2010316161011.jpg" alt="罗毅律师" width="60" height="80" /></a>
                    </dd>

                    <dd class="lt03">
                        <div>罗毅律师 15812575718</div>
                        <a href="http://www.9ask.cn/usersite/home/royddc/"  title="罗毅律师">
                            <strong>罗毅律师</strong>
                            <span>电话：15812575718<br>
                                专长：土地纠纷</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/royddc/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span>

                    </dd>

                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont6', event)" onmouseout="changeList(this, 'cka_cont6', event)">
                    <dt class="lt01">2、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/huangqun/" ><img src="http://img.9ask.cn/souask/userpic/20103312027.jpg" alt="黄群律师" /></a></dd>
                    <dd class="lt03">
                        <div>黄群律师 13981805015</div>
                        <a href="http://www.9ask.cn/usersite/home/huangqun/"  title="黄群律师"><strong>黄群律师</strong><span>电话：13981805015<br>
                                专长：常年顾问</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/huangqun/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont6', event)" onmouseout="changeList(this, 'cka_cont6', event)">
                    <dt class="lt01">3、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/huazhoulvshi/" ><img src="http://img.9ask.cn/souask/userpic/20095817563873499.jpg" alt="任向东律师" /></a></dd>
                    <dd class="lt03">
                        <div>任向东律师 13601397889</div>
                        <a href="http://www.9ask.cn/usersite/home/huazhoulvshi/"  title="任向东律师"><strong>任向东律师</strong><span>电话：13601397889<br>
                                专长：常年顾问</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/huazhoulvshi/ask.asp" ><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <dl class="bg" onmouseover="changeList(this, 'cka_cont6', event)" onmouseout="changeList(this, 'cka_cont6', event)">
                    <dt class="lt01">4、</dt>
                    <dd class="lt02"><a href="http://www.9ask.cn/usersite/home/zgh5544/" ><img src="http://img.9ask.cn/souask/userpic/2009216917673499.jpg" alt="张桂华律师" /></a></dd>
                    <dd class="lt03">
                        <div>张桂华律师 13261515544</div>
                        <a href="http://www.9ask.cn/usersite/home/zgh5544/"  title="张桂华律师"><strong>张桂华律师</strong><span>电话：13261515544<br>
                                专长：房产纠纷</a><br>
                                <em><a href="http://www.9ask.cn/usersite/home/zgh5544/ask.asp"><img src="http://img.9ask.cn/souask/images/ask_me.jpg" /></a></em></span></dd>
                </dl>
                <div class="clear"></div>

            </div>
        </div>
    </div>
</div>
<!--行使行政类结束-->
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
foreach($ActiveBigLawyer as $v) {
                    echo '<li><div class="q1"><a href="'.$v['url'] .'" target=_blank >'.$v['truename'].'律师</a></div><div class="q2">'.
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
foreach($BigLawyer as $k=>$v) {
                    echo '<li><div class="q1"><a href="'.$v['url'] .'" target=_blank >'.$v['truename'].'律师</a></div><div class="q2">'. $v['pname'] . $v['cname']. '</div><div class="q3">'.$v['jifen'].'分</div></li>';
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
$icount=0;
                foreach($OnlineLawyer as $v) {

                    if($v->TrueName && $icount<8) {
                        $areadname=$citys[$v->cnameid];
                        if(strlen($citys[$v->cnameid])<9) {
                            $areadname=$provs[$v->pnameid] . $areadname;
                        }
                        $lsurl=AskTool::GetLawyerurl($v->ID, $v->name, $v->IsStar);
                        echo '<li><div class="q1"><a href="' . $lsurl . '" target=_blank >'. $v->TrueName .'律师</a></div><div class="q2">'.
                                $areadname .'&nbsp;</div><div class="q3">'.$v->jifen.'分</div></li>';
                        $icount++;
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<script language="javascript">
    function hideit(ids)
    {
        id=ids.split(',');
        for(var i=0;i<4;i++)
        {
            document.getElementById("class"+id[i]).className='cback';//index_smaillcalss_
            document.getElementById("index_smaillcalss_"+id[i]).style.display='none';
        }
    }
    function showclass(id)
    {
        document.getElementById("class"+id).className='oback';
        document.getElementById("index_smaillcalss_"+id).style.display='';
    }
</script>


