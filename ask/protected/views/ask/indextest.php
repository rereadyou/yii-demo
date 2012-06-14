<?php cs()->registerCssFile(resBu('css/index.css', 'screen'));?>
  <!--通栏广告-->
 <div  style="text-align: center; margin-top: 7px">
    <script language="javascript">
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
            if(adNum<bannerAD.length-1)adNum++ ;
            else adNum=0;
            setTransition();
            document.images.bannerADrotator.src=bannerAD[adNum];
            playTransition();
            theTimer=setTimeout("nextAd()", 8000);
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
        document.write('<a onMouseOver="clearTimeout(theTimer);"  onmouseout="theTimer=setTimeout("nextAd()",8000);"   onclick="jump3url();" style="cursor:pointer;*cursor:hand;"><img src="http://img.9ask.cn/souask/images/20100126/950_90_aa.gif" ');
        document.write('name=bannerADrotator align="middle" ');
        document.write('style="FILTER: revealTrans(duration=2,transition=40)"></a>');
        nextAd();
    </script>
</div>
<!--通栏广告结束-->
<!--data-->
<div class="cwidth footer_2 borderblue_1 margin_top_10" style="width:936px;">
				中顾法律网<a href="http://www.9ask.cn/souask/" target="_blank">法律咨询</a>中心：昨日公开法律咨询 <span><?php echo $ask_counts->question_num;?></span> 条,一对一咨询 <span><?php echo $ask_counts->msg_num;?></span> 条,昨日委托 <span><?php echo $ask_counts->weituo_num;?></span> 条, 共解决当事人<span><?php echo $ask_counts->question_num;?></span> 个问题。<span><a href="http://www.9ask.cn/souask/ask.asp" target="_blank"><font color="#ff0000"><b>我要发布法律咨询</b></font></a></span> <span><a href="http://www.9ask.cn/usersite/Wt1/Wtadd.asp" target="_blank"><font color="#ff0000"><b>我要请律师打官司</b></font></a></span>
</div>
<!--banner1-->
<div class="cwidth margin_top_10 nodisplay"><img src="images/topbanner.jpg" width="950" height="80" /></div>
<!--locabox-->
<div id="locbox" class="cwidth margin_top_10">
    <div class="f_l margin_top_10 grey">您的位置：中顾法律网首页 > 法律咨询 > 咨询列表</div>

</div>

<!--pagebody-->
<div id="pagebody" class="cwidth">
    <!--one-->
    <div class="one">
        <!--left-->
        <div class="left margin_right_10">
            <div><a href="http://www.9ask.cn/souask/ask.asp" target="_blank"><img src="images/fbtutton.jpg" width="200" height="62" /></a></div>
            <div class="qbox"><a href="http://www.9ask.cn/souask/ask.asp">如何发布咨询？</a>&nbsp;<a href="http://www.9ask.cn/souask/answer.asp">如何查看问题？</a></div>
            <!--地域查询-->
            <div class="thead0 margin_top_7 ft14 ftb">按地域查询</div>
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
            <div class="thead0 margin_top_7 ft14 ftb">问题分类</div>
            <div class="cbody leftbody2 padding_6">
                <!--热门分类-->
                <div class="typehead ftb margin_top_10">热门分类</div>
                <div class="typelist margin_top_10">
                    <a href="">婚姻家庭</a>&nbsp;&nbsp;
                    <a href="">劳动纠纷</a>&nbsp;&nbsp;
                    <a href="">人身损害</a><br />
                    <a href="">交通事故</a>&nbsp;&nbsp;
                    <a href="">合同纠纷</a>&nbsp;&nbsp;
                    <a href="">房产纠纷</a><br />
                    <a href="">刑事辩护</a>&nbsp;&nbsp;
                    <a href="">拆迁安置</a>&nbsp;&nbsp;
                    <a href="">债权债务</a>
                </div>
                <!--专业分类-->
                <div class="typehead ftb margin_top_10">按专业分类</div>
                <div class="typeprolist ">

                    <span onmouseover="closeall_menu();document.getElementById('fz_menu_1').style.display=''" onmouseout="document.getElementById('fz_menu_1').style.display='none'">
                        <a href="javascript:void(0)" onclick="javascript:return false">民事类律师</a>
                        <div class="itemlistmenu" id="fz_menu_1" style="display:none">
                            <p><a href="/cangzhou/hyjt">婚姻家庭</a></p>
                            <p><a href="/cangzhou/ycjc">遗产继承</a></p>
                            <p><a href="/cangzhou/xfwq">消费维权</a></p>
                            <p><a href="/cangzhou/dydb">抵押担保</a></p>

                            <p><a href="/cangzhou/htjf">合同纠纷</a></p>
                            <p><a href="/cangzhou/ldjf">劳动纠纷</a></p>
                            <p><a href="/cangzhou/shpc">人身损害</a></p>
                            <p><a href="/cangzhou/bxlp">保险理赔</a></p>
                            <p><a href="/cangzhou/cqaz">拆迁安置</a></p>
                            <p><a href="/cangzhou/zqzw">债权债务</a></p>

                            <p><a href="/cangzhou/yljf">医疗纠纷</a></p>
                            <p><a href="/cangzhou/jtsg">交通事故</a></p>
                        </div>
                    </span>
                    <span onmouseover="closeall_menu();document.getElementById('fz_menu_2').style.display='block'" onmouseout="document.getElementById('fz_menu_2').style.display='none'">
                        <a href="javascript:void(0)" onclick="javascript:return false">经济类律师</a>	<div class="itemlistmenu"  id="fz_menu_2" style="display:none;" >
                            <p><a href="cangzhou/gcjz">工程建筑</a></p>
                            <p><a href="cangzhou/fcjf">房产纠纷</a></p>
                            <p><a href="cangzhou/zclaw">知识产权</a></p>
                            <p><a href="cangzhou/hhjm">合伙加盟</a></p>
                            <p><a href="cangzhou/grdz">个人独资</a></p>
                            <p><a href="cangzhou/jrzq">金融证券</a></p>

                            <p><a href="cangzhou/yhbx">银行保险</a></p>
                            <p><a href="cangzhou/bdjz">不当竞争</a></p>
                            <p><a href="cangzhou/jjzq">经济仲裁</a></p>
                            <p><a href="cangzhou/wlfl">网络法律</a></p>
                            <p><a href="cangzhou/zbtb">招标投标</a></p>
                        </div></span>

                    <span onmouseover="closeall_menu();document.getElementById('fz_menu_3').style.display=''"><a href="javascript:void(0)" onclick="javascript:return false">刑事行政法类律师</a><div class="itemlistmenu"  id="fz_menu_3" style="display:none" onmouseout="this.style.display='none'">
                            <p><a href="/cangzhou/qbhs">取保候审</a></p>
                            <p><a href="/cangzhou/xsbh">刑事辩护</a></p>
                            <p><a href="/cangzhou/xszs">刑事自诉</a></p>
                            <p><a href="/cangzhou/xzfy">行政复议</a></p>

                            <p><a href="/cangzhou/xzss">行政诉讼</a></p>
                            <p><a href="/cangzhou/gjpc">国家赔偿</a></p>
                            <p><a href="/cangzhou/gssw">工商税务</a></p>
                            <p><a href="/cangzhou/hgsj">海关商检</a></p>
                            <p><a href="/cangzhou/gaga">公安国安</a></p>
                            <p><a href="/cangzhou/caishui">财税</a></p>
                        </div> </span>

                    <span onmouseover="closeall_menu();document.getElementById('fz_menu_4').style.display=''"><a href="javascript:void(0)" onclick="javascript:return false">涉外法律类律师</a><div class="itemlistmenu" id="fz_menu_4" style="display:none" onmouseout="this.style.display='none'">
                            <p><a href="/cangzhou/hshs">海事海商</a></p>
                            <p><a href="/cangzhou/gjmy">国际贸易</a></p>
                            <p><a href="/cangzhou/zsyz">招商引资</a></p>
                            <p><a href="http://www.9ask.cn/souask/sort.asp?cid=46">外商投资</a></p>
                            <p><a href="/cangzhou/hzhz">合资合作</a></p>

                            <p><a href="/cangzhou/wto">WTO事务</a></p>
                            <p><a href="/cangzhou/qxbt">倾销补贴</a></p>
                            <p><a href="/cangzhou/swzc">涉外仲裁</a></p>
                        </div></span>

                    <span onmouseover="closeall_menu();document.getElementById('fz_menu_5').style.display=''"><a href="javascript:void(0)" onclick="javascript:return false">公司专项法类律师</a><div class="itemlistmenu"  id="fz_menu_5" style="display:none" onmouseout="this.style.display='none'">
                            <p><a href="/cangzhou/gsbg">公司并购</a></p>
                            <p><a href="/cangzhou/gfzr">股份转让</a></p>
                            <p><a href="/cangzhou/gsgz">企业改制</a></p>
                            <p><a href="/cangzhou/gsqs">公司清算</a></p>

                            <p><a href="/cangzhou/pcjf">破产解散</a></p>
                            <p><a href="/cangzhou/zcpm">资产拍卖</a></p>
                        </div></span>

                    <span onmouseover="closeall_menu();document.getElementById('fz_menu_6').style.display='block'"><a href="javascript:void(0)" onclick="javascript:return false">其他非诉讼类律师</a><div class="itemlistmenu"  id="fz_menu_6" style="display:none; z-index:999" onmouseout="this.style.display='none'">
                            <p><a href="/cangzhou/gscx">工商查询</a></p>
                            <p><a href="/cangzhou/zxdc">资信调查</a></p>
                            <p><a href="/cangzhou/htsc">合同审查</a></p>
                            <p><a href="/cangzhou/tjtp">调解谈判</a></p>

                            <p><a href="/cangzhou/cngw">常年顾问</a></p>
                            <p><a href="/cangzhou/srls">私人律师</a></p>
                            <p><a href="/cangzhou/wsdl">文书代理</a></p>
                            <p><a href="/cangzhou/ymlx">移民留学</a></p>
                            <p><a href="/cangzhou/szzs">商帐追收</a></p>
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
                        if($i>6) {
                            break;
                        }
                        echo "<li><div class='nopbx'>".$i."</div><div class='notit'><a href='" .$v['url'] ."' target='_blank' >".$lawyer['truename'].'律师</a></div><div class="nopop">'.$lawyer['jifen'].'</div></li>';
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
                        echo "<li><div class='nopbx'>".$i."</div><div class='notit'><a href='" .$v['url'] ."' target='_blank' >".$lawyer['truename'].'律师</a></div><div class="nopop">'.$lawyer['jifen'].'</div></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!--center-->
        <div class="center">
            <div><img src="images/g1.jpg" width="490" height="60" /></div>
            <div class="quickask borderblue_1 margin_top_7">
                <!--快速发布-->
                <div class="quickask_pub">
                    <form name="fsearch1" id="fsearch1" method="post" action="/souask/ask.asp" onKeyDown="if (event.keyCode==13) document.all.fsearch1.submit();" class="ask_form">
                        <div class="quickask_pubhead"></div>
                        <div class="quickask_title"><input id="kuang1" name="title" type="text" class="borderdark ipt1"/></div>
                        <div class="quickask_content"><textarea id="kuang2"  name="content" cols="" rows="" class="borderdark ipt2"></textarea></div>
                        <div class="quickask_button"><img src="images/quickbutton.gif" width="171" height="29" onclick="document.fsearch1.submit();return false;" /></div>
                    </form>
                </div>
                <!--活动公告-->
                <div class="noticeboard">
                    <div class="notice_head ftb">活动公告</div>
                    <ul>
                        <?php
                        foreach($gonggao as $k=>$v) {
                            echo '<li><a href="http://www.9ask.cn/souask/jingcai/index.asp?qishu='.$v->ID.'" target="_blank">'.$v->title.'</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <!--宣传图-->
            <div class="margin_top_7"><iframe src="<?php echo url('billask/indexmiddel')?>" frameborder="0" scrolling="no" width="483px" height="70px"></iframe></div>
            <!--最新法律咨询-->
            <div class="thead2 margin_top_7">
                <h4>最新法律咨询</h4>
                <div class="more"><a href="http://ask.9ask.cn/all">更多</a></div>
            </div>
            <div class="cbody newqlist">
                <ul>
                    <?php
                    foreach ($q_new as $k=>$v) {
                        //echo mb_substr($v->title, 0, 10, 'utf-8'),' xxxx.<br />';
                        echo "<li>[<a href='" . url('ask/arealistall',array('area'=>AskTool::AskCity_getpaixu($v->cnameid))) . "' target=_blank >" . $citys[$v->cnameid] .
                                "</a> <a href='http://ask.9ask.cn/s_".$v->fenleiid."'>".$v->topic.
                                "</a>] <a href='http://ask.9ask.cn/question/2011/".$v->ID.".html'>".mb_substr($v->title, 0, 14, 'utf-8').
                                "</a><span>".date('Y-m-d H:i:s', strtotime($v->sendtime))."</span></li>";
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
                        <p class="l3"><a href="http://www.9ask.cn/usersite/home/qianlawyer/" ><img src="images/askme.jpg" width="50" height="17" /></a></p>
                        <p class="l4">13810947805</p>
                    </li>
                    <li>
                        <p class="l1"><a href="http://www.9ask.cn/usersite/home/wlg5796/" ><img src="http://img.9ask.cn/souask/userpic/2010527154650.jpg" width="60" height="80"/></a></p>
                        <p class="l2"><a href="http://www.9ask.cn/usersite/home/wlg5796/" >拆迁律师</a></p>
                        <p class="l3"><a href="http://www.9ask.cn/usersite/home/wlg5796/ask.asp" ><img src="images/askme.jpg" width="50" height="17" /></a></p>
                        <p class="l4">15811275796</p>
                    </li>
                    <li>
                        <p class="l1"><a href="http://www.9ask.cn/usersite/home/niexiaoyue/" ><img src="http://img.9ask.cn/souask/userpic/201117172211.jpg" width="60" height="80"/></a></p>
                        <p class="l2"><a href="http://www.9ask.cn/usersite/home/niexiaoyue/" >房产聂晓岳</a></p>
                        <p class="l3"><a href="http://www.9ask.cn/usersite/home/niexiaoyue/ask.asp" ><img src="images/askme.jpg" width="50" height="17" /></a></p>
                        <p class="l4">13401148002</p>
                    </li>
                    <li>
                        <p class="l1"><a href="http://www.9ask.cn/usersite/home/tianke/index.asp" ><img src="http://img.9ask.cn/souask/userpic/20086310473973499.jpg" width="60" height="80"/></a></p>
                        <p class="l2"><a href="http://www.9ask.cn/usersite/home/tianke/index.asp" >李立群</a></p>
                        <p class="l3"><a href="http://www.9ask.cn/usersite/home/tianke/ask.asp" ><img src="images/askme.jpg" width="50" height="17" /></a></p>
                        <p class="l4">13910155597</p>
                    </li>
                    <li>
                        <p class="l1"><a href="http://www.9ask.cn/usersite/home/zhangshaoli/" ><img src="http://img.9ask.cn/souask/userpic/20104312521.jpg" width="60" height="80"/></a></p>
                        <p class="l2"><a href="http://www.9ask.cn/usersite/home/zhangshaoli/" >张绍礼</a></p>
                        <p class="l3"><a href="http://www.9ask.cn/usersite/home/zhangshaoli/ask.asp" ><img src="images/askme.jpg" width="50" height="17" /></a></p>
                        <p class="l4">13910176640</p>
                    </li>
                    <li>
                        <p class="l1"><a href="http://www.9ask.cn/usersite/home/liamfan/index.asp" ><img src="http://img.9ask.cn/souask/images/fang.jpg" width="60" height="80"/></a></p>
                        <p class="l2"><a href="http://www.9ask.cn/usersite/home/liamfan/index.asp" >北京范林刚</a></p>
                        <p class="l3"> <a href="http://www.9ask.cn/usersite/home/liamfan/ask.asp" ><img src="images/askme.jpg" width="50" height="17" /></a></p>
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
            <div class="cbody newqlist hotqlist">
                <ul>
                    <?php
                    foreach ($q_hot as $k=>$v) {
                        echo "<li>[<a href='" . url('ask/arealistall',array('area'=>AskTool::AskCity_getpaixu($v->cnameid))) . "' target=_blank >" . $citys[$v->cnameid] .
                                "</a> <a href='http://ask.9ask.cn/s_".$v->fenleiid."'>".$v->topic.
                                "</a>] <a href='http://ask.9ask.cn/question/2011/".$v->ID.".html'>".mb_substr($v->title, 0, 14, 'utf-8').
                                "</a><span>".date('Y-m-d H:i:s', strtotime($v->sendtime))."</span></li>";
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
                <span class="margin_right_7"><a href="http://www.9ask.cn/souask/ask.asp" target="_blank"><img src="images/fb1.jpg" width="116" height="34" /></a></span>
                <span><a href="http://www.9ask.cn/souask/showpersons.asp" target="_blank"><img src="images/fb2.jpg" width="116" height="34" /></a></span>
                <span class="margin_right_7 margin_top_7"><a href="http://www.9ask.cn/souask/qs_area.asp" target="_blank"><img src="images/fb3.jpg" width="116" height="34" /></a></span>
                <span class="margin_top_7"><a href="http://www.9ask.cn/souask/qs_law.asp" target="_blank"><img src="images/fb4.jpg" width="116" height="34" /></a></span>
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
                                href="http://www.9ask.cn/usersite/home/xueqing/" target=_blank><img src="images/askme.jpg" width="50" height="17" /></A></p>
                        <p class="l4">13910189633</p>
                    </li>
                    <li>
                        <p class="l1"><A href="http://www.9ask.cn/usersite/home/myl5362/"
                                         target=_blank><IMG src="http://img.9ask.cn/souask/userpic/201081614479.jpg"
                                               width=60 height=80></A></p>
                        <p class="l2"><A href="http://www.9ask.cn/usersite/home/myl5362/"
                                         target=_blank>牟艳玲</A></p>
                        <p class="l3"><A href="http://www.9ask.cn/usersite/home/myl5362/ask.asp"
                                         target=_blank><img src="images/askme.jpg" width="50" height="17" /></A></p>
                        <p class="l4">15910785133</p>
                    </li>
                    <li>
                        <p class="l1"><A href="http://www.9ask.cn/usersite/home/zidong/"
                                         target=_blank><IMG src="http://img.9ask.cn/souask/userpic/201036122635.jpg"
                                               width=60 height=80></p>
                                <p class="l2"><A href="http://www.9ask.cn/usersite/home/zidong/"
                                                 target=_blank>许子栋</A></p>
                                <p class="l3"><A href="http://www.9ask.cn/usersite/home/zidong/ask.asp"
                                                 target=_blank><img src="images/askme.jpg" width="50" height="17" /></A></p>
                                <p class="l4">13520160465</p>
                    </li>
                    <li>
                        <p class="l1"><A href="http://www.9ask.cn/usersite/home/nowhy/"
                                         target=_blank><IMG src="http://img.9ask.cn/souask/userpic//201031614233.jpg"
                                               width=60 height=80></A></p>
                        <p class="l2"><A href="http://www.9ask.cn/usersite/home/nowhy/"
                                         target=_blank>上海谢正力</A></p>
                        <p class="l3"><A href="http://www.9ask.cn/usersite/home/nowhy/ask.asp"
                                         target=_blank><img src="images/askme.jpg" width="50" height="17" /></A></p>
                        <p class="l4">18221683141</p>
                    </li>
                    <li>
                        <p class="l1"><A href="http://www.9ask.cn/usersite/home/davidwwx/"
                                         target=_blank><IMG src="http://img.9ask.cn/souask/userpic/201039155123.jpg"
                                               width=60 height=80></A></p>
                        <p class="l2"><A href="http://www.9ask.cn/usersite/home/davidwwx/"
                                         target=_blank>王卫新</A></p>
                        <p class="l3"><A href="http://www.9ask.cn/usersite/home/davidwwx/ask.asp"
                                         target=_blank><img src="images/askme.jpg" width="50" height="17" /></A></p>
                        <p class="l4">3811959982</p>
                    </li>
                    <li>
                        <p class="l1"><A href="http://www.9ask.cn/usersite/home/legendyhq/"
                                         target=_blank><IMG src="http://img.9ask.cn/souask/userpic/201085103342.jpg"
                                               width=60 height=80></A></p>
                        <p class="l2"><A href="http://www.9ask.cn/usersite/home/legendyhq/"
                                         target=_blank>杨汉卿</A></p>
                        <p class="l3"><A href="http://www.9ask.cn/usersite/home/legendyhq/ask.asp"
                                         target=_blank><img src="images/askme.jpg" width="50" height="17" /></A></p>
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
            <div><a href="http://www.9ask.cn/search/" target="_blank"><img src="images/gobanner.jpg" width="240" height="41" /></a></div>
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
                            <p><a href="http://www.9ask.cn/usersite/home/wangyongjie/ask.asp"><img src="images/askme.jpg" width="50" height="17" /></a> </p>
                        </div>
                    </li>
                    <li>
                        <div class="m1">2、</div>
                        <div class="m2"><a href="http://www.9ask.cn/usersite/home/jennygao/index.asp"><img src="http://img.9ask.cn/souask/userpic/2010319165615.jpg" width="60" height="80"  /></a></div>
                        <div class="m3">
                            <p><a href="http://www.9ask.cn/usersite/home/jennygao/index.asp">高岩律师</a></p>
                            <p>电话：13911552806</p>
                            <p>专长：合同纠纷</p>
                            <p><a href="http://www.9ask.cn/usersite/home/jennygao/ask.asp"><img src="images/askme.jpg" width="50" height="17" /></a></p>
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
    <div class="cwidth margin_top_10"><a href="http://www.9ask.cn/usersite/home/laile/index.asp"><img src="images/gb1.jpg" width="950" height="60" /></a></div>
    <!--two-->
    <div class="two margin_top_10">
        <!--上周咨询之星-->
        <div class="left margin_right_10">
            <div class="thead0 ftb">上周咨询之星</div>
            <div class="cbody lastaskstar padding_5">
                <div class="firststarhead"></div>
                <?php
                $i=0;
                foreach($AskStars as $k=>$v) {
                if($i==0) {
                echo '<div class="firststar">
<div class="mphoto"><img src="images/mphoto.jpg" width="60" height="70" /></div>
<p><a href="'.$v['url'].'" target=_blank >'.$v['truename'].'律师</a></p><p>电话：'.$v['mobile'].'</p><p>积分：'.$v['jifen'].'</p>
<p><a href="'.$v['askurl'].'" target=_blank ><img src="images/askme.jpg" width="50" height="17" /></a></p></div> ' . '
<div class="jsanswer"><h5 class="margin_bottom_10">精选回答</h5>';
//打印最佳答案
                foreach($AskStars_bestanswer as $kbest=>$vv) {
                ?>
                <p><a href="http://ask.9ask.cn/question/<?php echo $vv->question->year;?>/<?php echo $vv->question->ID;?>.html" target="_blank"><?php echo AskTool::str_cut($vv->question->title,26)?></a></p>
                <?php
                }
          

//最佳答案获取结束
                echo '</div><div class="askstar"><ul>';
                } else {
                    echo '<li><div class="k1">'.($i+1).'</div>
<div class="k2"><a href="'.$v['url'].'" target=_blank >'.$v['truename'].'</a>&nbsp;'.$v['mobile'].'</div>
<div class="k3"> <a href="'.$v['url'].'" target=_blank >'.'<img src="images/aski.jpg" width="39" height="17" /></a></div></li>
';
                }
                $i++;
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
            <div class="more">更多</div>
        </div>
        <div class="cbody newqlist hpqlistbody">
            <ul>
                <?php
                foreach ($q_highscore as $k=>$v) {
                    echo "<li>[<a href='" . url('ask/arealistall',array('area'=>AskTool::AskCity_getpaixu($v->cnameid))) . "' target=_blank >" . $citys[$v->cnameid] .
                            "</a> <a href='http://ask.9ask.cn/s_".$v->fenleiid."'>".$v->topic.
                            "</a>] <a href='http://ask.9ask.cn/question/2011/".$v->ID.".html'>".mb_substr($v->title, 0, 14, 'utf-8').
                            "</a><span>".date('Y-m-d H:i:s', strtotime($v->sendtime))."</span></li>";
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
                        <p><a href="http://www.9ask.cn/usersite/home/6688limin/ask.asp"><img src="images/askme.jpg" width="50" height="17" /></a></p>
                    </div>
                </li>
                <li>
                    <div class="m1">2、</div>
                    <div class="m2"><a href="http://www.9ask.cn/usersite/home/dauking/index.asp"><img src="http://img.9ask.cn/souask/userpic/20095320275073499.jpg" width="60" height="80" class="law_pic" /></a></div>
                    <div class="m3">
                        <p><a href="http://www.9ask.cn/usersite/home/dauking/index.asp">吕士才律师</a></p>
                        <p>电话：13452926868</p>
                        <p>专长：知识产权</p>
                        <p><a href="http://www.9ask.cn/usersite/home/dauking/ask.asp"><img src="images/askme.jpg" width="50" height="17" /></a> </p>
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
                        <p><a href="http://www.9ask.cn/usersite/home/wangzuhui/ask.asp"><img src="images/askme.jpg" width="50" height="17" /></a></p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<!--宣传通栏-->
<div class="cwidth margin_top_10"><a href="http://www.9ask.cn/usersite/home/yuzhengchun/" target="_blank"><img src="images/gb2.jpg" width="950" height="90" /></a></div>
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
            <div class="more">更多</div>
        </div>
        <div class="cbody qqbox padding_top_10">
            <div class="zsqboxhead padding_left_10">
                <span class="oback" id="class17" onmouseover="hideit('17,21,20,22');showclass(17);" >人身损害</span>
                <span class="cback" id="class21" onmouseover="hideit('17,21,20,22');showclass(21);">医疗纠纷</span>
                <span class="cback" id="class20" onmouseover="hideit('17,21,20,22');showclass(20);">债权债务</span>
                <span class="cback" id="class22" onmouseover="hideit('17,21,20,22');showclass(22);">交通事故</span>
            </div>
            <?php
            // question_minshi
            $icount=0;
            foreach ($question_minshi as $k=>$v) {
                //如果是数组，那么就接下来进行循环
                $licontent='';
                foreach($v as $onekey=>$onequestion) {
                    $hfusers='暂无回复';
                    if($onequestion->hfuser->userClassID==1)
                    {
                    $lsurl=AskTool::GetLawyerurl($onequestion->hfuser->ID, $onequestion->hfuser->name, $onequestion->hfuser->IsStar);
                    $hfusers="<a  href='$lsurl'   target=_blank >".$onequestion->hfuser->TrueName."</a>";
                    }
                    else
                        {
                        $hfusers='公众回复';
                        }
                    $licontent .="<li><a href='s_" . $onequestion['fenleiid'] . "'>[". $onequestion['topic'] ."]</a> <a href='" . AskTool::Question_GetUrl($onequestion['ID']) ."'>" . AskTool::str_cut($onequestion['title'], 30) ."</a><div class='answer_p'><span class='qq_box'>回复者：</span>$hfusers</div></li>";

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
                        <div class="iphoto"><img src="images_0/w.jpg" width="60" height="80" /></div>
                        <p>王娇艳律师</p>
                        <p>电话：16588887777</p>
                        <p>专长：婚姻家庭</p>
                        <p><img src="images_0/askme.jpg" width="50" height="17" /></p>
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
                <a title="工商税务" href="%20http://news.9ask.cn/gssw/">工商税务</a>
                <a title="海关海检" href="http://news.9ask.cn/hgsj/">海关海检</a><br>
                <a title="刑事诉讼指南" href="http://news.9ask.cn/xsss/xssszn/">刑事诉讼指南</a>

        </div>
    </div>
    <!--分类咨询-->
<div class="center">
        <div class="thead3">
            <h4>刑事行政类咨询</h4>
            <div class="more">更多</div>
        </div>
        <div class="cbody qqbox padding_top_10">
            <div class="zsqboxhead padding_left_10">
                <span class="oback" id="class35" onmouseover="hideit('35,34,36,38');showclass(35);" >刑事辩护</span>
                <span class="cback" id="class34" onmouseover="hideit('35,34,36,38');showclass(34);">去保候审</span>
                <span class="cback" id="class36" onmouseover="hideit('35,34,36,38');showclass(36);">刑事自诉</span>
                <span class="cback" id="class38" onmouseover="hideit('35,34,36,38');showclass(38);">交通事故</span>
            </div>
            <?php
            // question_minshi
            $icount=0;
            foreach ($question_xsxz as $k=>$v) {
                //如果是数组，那么就接下来进行循环
                $licontent='';
                foreach($v as $onekey=>$onequestion) {
                    $hfusers='暂无回复';
                    if($onequestion->hfuser->userClassID==1)
                    {
                    $lsurl=AskTool::GetLawyerurl($onequestion->hfuser->ID, $onequestion->hfuser->name, $onequestion->hfuser->IsStar);
                    $hfusers="<a  href='$lsurl' target=_blank >".$onequestion->hfuser->TrueName."</a>";
                    }
                    else
                        {
                        $hfusers='公众回复';
                        }
                    $licontent .="<li><a href='s_" . $onequestion['fenleiid'] . "'>[". $onequestion['topic'] ."]</a> <a href='" . AskTool::Question_GetUrl($onequestion['ID']) ."'>" . AskTool::str_cut($onequestion['title'], 30) ."</a><div class='answer_p'><span class='qq_box'>回复者：</span>$hfusers</div></li>";

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
                        <div class="iphoto"><img src="images_0/w.jpg" width="60" height="80" /></div>
                        <p class="ipho">王娇艳律师</p>
                        <p class="ipho">电话：16588887777</p>
                        <p class="ipho">专长：婚姻家庭</p>
                        <p><img src="images_0/askme.jpg" width="50" height="17" /></p>
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
            <div class="more">更多</div>
        </div>
        <div class="cbody qqbox padding_top_10">
            <div class="zsqboxhead padding_left_10">
                <span class="oback" id="class24" onmouseover="hideit('24,27,31,23');showclass(24);" >房产纠纷</span>
                <span class="cback" id="class27" onmouseover="hideit('24,27,31,23');showclass(27);">个人独资</span>
                <span class="cback" id="class31" onmouseover="hideit('24,27,31,23');showclass(31);">经济仲裁</span>
                <span class="cback" id="class23" onmouseover="hideit('24,27,31,23');showclass(23);">工程建筑</span>
            </div>
            <?php
            // question_minshi
            $icount=0;
            foreach ($question_jingji as $k=>$v) {
                //如果是数组，那么就接下来进行循环
                $licontent='';
                foreach($v as $onekey=>$onequestion) {
                    $hfusers='暂无回复';
                    if($onequestion->hfuser->userClassID==1)
                    {
                    $lsurl=AskTool::GetLawyerurl($onequestion->hfuser->ID, $onequestion->hfuser->name, $onequestion->hfuser->IsStar);
                    $hfusers="<a  href='$lsurl' target=_blank >".$onequestion->hfuser->TrueName."</a>";
                    }
                    else
                        {
                        $hfusers='公众回复';
                        }
                    $licontent .="<li><a href='s_" . $onequestion['fenleiid'] . "'>[". $onequestion['topic'] ."]</a> <a href='" . AskTool::Question_GetUrl($onequestion['ID']) ."'>" . AskTool::str_cut($onequestion['title'], 30) ."</a><div class='answer_p'><span class='qq_box'>回复者：</span>$hfusers</div></li>";

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
                        <div class="iphoto"><img src="images_0/w.jpg" width="60" height="80" /></div>
                        <p class="ipho">王娇艳律师</p>
                        <p class="ipho">电话：16588887777</p>
                        <p class="ipho">专长：婚姻家庭</p>
                        <p><img src="images_0/askme.jpg" width="50" height="17" /></p>
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
<!--经济类结束-->
<!--公司法律类咨询-->
<div class="three margin_top_10">
    <!--知识分类-->
    <div class="left margin_right_10">
        <div class="thead3">民事类相关法律知识</div>
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
            <h4>经济类咨询</h4>
            <div class="more">更多</div>
        </div>
        <div class="cbody qqbox padding_top_10">
            <div class="zsqboxhead padding_left_10">
                <span class="oback" id="class51" onmouseover="hideit('51,52,53,54');showclass(51);" >公司并购</span>
                <span class="cback" id="class52" onmouseover="hideit('51,52,53,54');showclass(52);">股份转让</span>
                <span class="cback" id="class53" onmouseover="hideit('51,52,53,54');showclass(53);">企业改制</span>
                <span class="cback" id="class54" onmouseover="hideit('51,52,53,54');showclass(54);">公司清算</span>
            </div>
            <?php
            // question_minshi
            $icount=0;
            foreach ($question_company as $k=>$v) {
                //如果是数组，那么就接下来进行循环
                $licontent='';
                foreach($v as $onekey=>$onequestion) {
                   $hfusers='暂无回复';
                    if($onequestion->hfuser->userClassID==1)
                    {
                    $lsurl=AskTool::GetLawyerurl($onequestion->hfuser->ID, $onequestion->hfuser->name, $onequestion->hfuser->IsStar);
                    $hfusers="<a  href='$lsurl' target=_blank >".$onequestion->hfuser->TrueName."</a>";
                    }
                    else
                        {
                        $hfusers='公众回复';
                        }
                    $licontent .="<li><a href='s_" . $onequestion['fenleiid'] . "'>[". $onequestion['topic'] ."]</a> <a href='" . AskTool::Question_GetUrl($onequestion['ID']) ."'>" . AskTool::str_cut($onequestion['title'], 30) ."</a><div class='answer_p'><span class='qq_box'>回复者：</span>$hfusers</div></li>";

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
        <div class="thead3">推荐公司类律师</div>
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
                        <div class="iphoto"><img src="images_0/w.jpg" width="60" height="80" /></div>
                        <p class="ipho">王娇艳律师</p>
                        <p class="ipho">电话：16588887777</p>
                        <p class="ipho">专长：婚姻家庭</p>
                        <p><img src="images_0/askme.jpg" width="50" height="17" /></p>
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
<!--公司法律类咨询结束-->
<!--其他法律类咨询开始-->
<div class="three margin_top_10">
    <!--知识分类-->
    <div class="left margin_right_10">
        <div class="thead3">涉外类相关法律知识</div>
        <div class="cbody zsbody">
          <a href="http://news.9ask.cn/zsyz/%20">招商引资</a>
                <a href="http://news.9ask.cn/qxbt/%20">倾销补贴</a>
                <a href="http://news.9ask.cn/swzc/%20">涉外仲裁</a>
                <a href="http://news.9ask.cn/wto/%20">WTO事务</a>
                                <a href="http://news.9ask.cn/hshs/peichang%20">海事赔偿</a>
                <a href="http://news.9ask.cn/hshs/pz/%20">船舶碰撞</a><br/>
                
                <a href="http://news.9ask.cn/zsyz/zsyzxm/%20">招商引资项目</a>

                <a href="http://news.9ask.cn/zsyz/zsyzff/%20">招商引资方法</a><br/>
                <a href="http://news.9ask.cn/zsyz/zsyzff/%20">补贴申请书</a>
                <a href="http://news.9ask.cn/qxbt/qxfqx/%20">倾销与反倾销</a><br/>
                <a href="http://news.9ask.cn/swzc/swzcf/%20">涉外仲裁法</a>
                <a href="http://news.9ask.cn/swzc/swzcgz/%20">涉外仲裁规则</a><br/>
                <a href="http://news.9ask.cn/swzc/swzcjg/%20">涉外仲裁机构</a>

                <a href="http://news.9ask.cn/hshs/baoxian/%20">海上保险合同</a><br/>
                <a href="http://news.9ask.cn/zsyz/zsyzcs/%20">招商引资措施</a>
                <a href="http://news.9ask.cn/gjmy/dl/%20">国际贸易代理</a><br>
                <a href="http://news.9ask.cn/gjmy/ys/%20">国际货物运输</a>
                <a href="http://news.9ask.cn/gjmy/zhifu/%20">国际贸易支付</a>
       </div>
    </div>
    <!--分类咨询-->
<div class="center">
        <div class="thead3">
            <h4>涉外类咨询</h4>
            <div class="more">更多</div>
        </div>
        <div class="cbody qqbox padding_top_10">
            <div class="zsqboxhead padding_left_10">
                <span class="oback" id="class43" onmouseover="hideit('43,44,46,47');showclass(43);" >海事海商</span>
                <span class="cback" id="class44" onmouseover="hideit('43,44,46,47');showclass(44);" >国际贸易</span>
                <span class="cback" id="class46" onmouseover="hideit('43,44,46,47');showclass(46);" >外商投资</span>
                <span class="cback" id="class47" onmouseover="hideit('43,44,46,47');showclass(47);">合资合作</span>
            </div>
            <?php
            // question_minshi
            $icount=0;
            foreach ($question_shewai as $k=>$v) {
                //如果是数组，那么就接下来进行循环
                $licontent='';
                foreach($v as $onekey=>$onequestion) {
                  $hfusers='暂无回复';
                    if($onequestion->hfuser->userClassID==1)
                    {
                    $lsurl=AskTool::GetLawyerurl($onequestion->hfuser->ID, $onequestion->hfuser->name, $onequestion->hfuser->IsStar);
                    $hfusers="<a  href='$lsurl' target=_blank >".$onequestion->hfuser->TrueName."</a>";
                    }
                    else
                        {
                        $hfusers='公众回复';
                        }
                    $licontent .="<li><a href='s_" . $onequestion['fenleiid'] . "'>[". $onequestion['topic'] ."]</a> <a href='" . AskTool::Question_GetUrl($onequestion['ID']) ."'>" . AskTool::str_cut($onequestion['title'], 30) ."</a><div class='answer_p'><span class='qq_box'>回复者：</span>$hfusers</div></li>";

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
                        <div class="iphoto"><img src="images_0/w.jpg" width="60" height="80" /></div>
                        <p class="ipho">王娇艳律师</p>
                        <p class="ipho">电话：16588887777</p>
                        <p class="ipho">专长：婚姻家庭</p>
                        <p><img src="images_0/askme.jpg" width="50" height="17" /></p>
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
<!--其他法律类咨询结束-->
<!--行使行政-->
<div class="three margin_top_10">
    <!--知识分类-->
    <div class="left margin_right_10">
        <div class="thead3">非诉讼相关法律知识</div>
        <div class="cbody zsbody">
 <a href="http://news.9ask.cn/wsdl/%20">文书代理</a>
                <a href="http://news.9ask.cn/hetongshencha/%20">合同审查</a>
                <a href="http://news.9ask.cn/cngw/%20">常年顾问</a>
                <a href="http://news.9ask.cn/ymlx/%20">移民留学</a>
                <a href="http://news.9ask.cn/zxdc/%20">资信调查</a>
                <a href="http://news.9ask.cn/szzs/%20">商帐追收</a>

                <a href="http://news.9ask.cn/fgjd/%20">法规解读</a>
                <a href="http://news.9ask.cn/flws/%20">法律文书</a>
                <a href="http://news.9ask.cn/gscx/cxzn/%20">查询指南</a>
                <a href="http://news.9ask.cn/gscx/wsbl/%20">网上办理</a>
                <a href="http://news.9ask.cn/wsdl/%20">实务文书</a>
                <a href="http://news.9ask.cn/flws/%20">法律文书</a>

                <a href="http://news.9ask.cn/sifajianding/sfjdfl/wsjd/%20">文书鉴定</a>
                <a href="http://news.9ask.cn/xsss/xsws/%20">刑事文书</a>
                <a href="http://news.9ask.cn/ldjf/laodongtiaojie/%20">劳动调解</a>
                <a href="http://news.9ask.cn/msss/tjzc/%20">调解仲裁</a>
                <a href="http://news.9ask.cn/hetongshencha/htsclc/%20">合同审查流程</a><br />
                <a href="http://news.9ask.cn/hetongshencha/htscyd/%20">合同审查要点</a>

                <a href="http://news.9ask.cn/hetongshencha/htsczy/%20">合同审查指引</a><br />
                <a href="http://news.9ask.cn/hetongshencha/htscb/%20">合同审查表</a>
                <a href="http://news.9ask.cn/cngw/cnpxgw/%20">常年培训顾问</a>

        </div>
    </div>
    <!--分类咨询-->
<div class="center">
        <div class="thead3">
            <h4>非诉讼类咨询</h4>
            <div class="more">更多</div>
        </div>
        <div class="cbody qqbox padding_top_10">
            <div class="zsqboxhead padding_left_10">
                <span class="oback" id="class62" onmouseover="hideit('62,60,59,57');showclass(62);" >私人律师</span>
                <span class="cback" id="class60" onmouseover="hideit('62,60,59,57');showclass(60);">调节谈判</span>
                <span class="cback" id="class59" onmouseover="hideit('62,60,59,57');showclass(59);">合同审查</span>
                <span class="cback" id="class57" onmouseover="hideit('62,60,59,57');showclass(57);">工商查询</span>
            </div>
            <?php
            // question_minshi
            $icount=0;
            foreach ($question_feisusong as $k=>$v) {
                //如果是数组，那么就接下来进行循环
                $licontent='';
                foreach($v as $onekey=>$onequestion) {
                   $hfusers='暂无回复';
                    if($onequestion->hfuser->userClassID==1)
                    {
                    $lsurl=AskTool::GetLawyerurl($onequestion->hfuser->ID, $onequestion->hfuser->name, $onequestion->hfuser->IsStar);
                    $hfusers="<a  href='$lsurl' target=_blank >".$onequestion->hfuser->TrueName."</a>";
                    }
                    else
                        {
                        $hfusers='公众回复';
                        }
                    $licontent .="<li><a href='s_" . $onequestion['fenleiid'] . "'>[". $onequestion['topic'] ."]</a> <a href='" . AskTool::Question_GetUrl($onequestion['ID']) ."'>" . AskTool::str_cut($onequestion['title'], 30) ."</a><div class='answer_p'><span class='qq_box'>回复者：</span>$hfusers</div></li>";

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
                        <div class="iphoto"><img src="images_0/w.jpg" width="60" height="80" /></div>
                        <p class="ipho">王娇艳律师</p>
                        <p class="ipho">电话：16588887777</p>
                        <p class="ipho">专长：婚姻家庭</p>
                        <p><img src="images_0/askme.jpg" width="50" height="17" /></p>
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
foreach($ActiveBigLawyer as $v){
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
foreach($BigLawyer as $k=>$v){
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
foreach($OnlineLawyer as $v){
    $icount=0;
    if($v->TrueName && $icount<8 )
        { $areadname=$citys[$v->cnameid];
         if(strlen($citys[$v->cnameid])<9)
          {
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