<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>fdsfsd</title>
        <link href="/css/user/index.css" rel="stylesheet" type="text/css" />
        <style>
            body {
	margin:0;
	padding:0;
	margin-left: 10px;
}
            img { border:0; }
            li {list-style:none;}
            .btn{cursor:pointer;background:none;border:none;}

            .banner{height:262px; background-position:0 -57px; background-repeat:repeat-x;padding-top:8px;}
            .mod-banner{width:700px;height:300px;border:1px solid #c0c0c0;margin:0 auto;position:relative; z-index:1;}
            #focus_img{height:300px;overflow:hidden;}
            #focus_img img{ cursor:pointer;}
            #focus_btn{position:absolute;top:170px;left:900px;z-index:9;}
            #btn_focus_prev,#btn_focus_next{width:64px;height:47px;position:absolute;top:150px; text-indent:-99em; cursor:pointer;}
            #btn_focus_prev{ background-position:0px 0px;left:-70px;background-image:url(/images/user/ic_1.jpg);background-repeat:no-repeat;}
            #btn_focus_next{ background-position:0px -47px;right:-70px;background-image:url(/images/user/ic_1.jpg);background-repeat:no-repeat;}
        </style>
    </head>
    <body>
         <?php
    if(!isset(app()->user->id))
            {
             echo "<script>top.location.href='".url('site/login')."'</script>";
              app()->end();
            }
    ?>
        <div style="width:803px;">
            <div id="center">
                <!--公告专区-->
                <div id="ann_top">
                    <div class="top_a"><img src="/images/user/gzyh_r3_c2.jpg" /></div>
                    <div class="top_b"></div>
                    <div class="top_a"><img src="/images/user/gzyh_r3_c22.jpg" /></div>
                    <div id="main_a">
                        <div class="main_b">
                            <div class="title_a">
                                <div class="title_ic"><img src="/images/user/ic_6.jpg" align="absmiddle" /> 公告专区</div>
                                <div class="more_1">更多</div>
                            </div>

                            <div class="center_a">
                                <div class="ic_a"><img src="/images/user/gzyh_r7_c5.jpg" /></div>

                                <?php
                                foreach($news as $k=>$v) {

                                    ?>

                                <div class="text_a">
                                    <div class="text_b"><?php echo "<a href='".url('user/oaskgonggao/view',array('id'=>$v->ID))."' target='_blank' >".$v->title."</a>";?></div>
                                    <div class="pic_a"><img src="<?php echo $v->picurl; ?>" width="75px" height="75px"  /></div><?php echo AskTool::str_cut($v->content,56)?>...<br />关注度：36520      </div>
                                    <?php
                                }
                                ?>
                                <span id="btn_focus_prev" class="btn"></span>
                                <span id="btn_focus_next" class="btn"></span>
                                <div class="ic_a"><img src="/images/user/gzyh_r7_c20.jpg" width="21" height="19" /></div>
                            </div>



                        </div>
                    </div>
                    <div class="top_a"><img src="/images/user/gzyh_r9_c2.jpg" /></div>
                    <div class="top_c"></div>
                    <div class="top_a"><img src="/images/user/gzyh_r9_c22.jpg" /></div>
                </div>
                <!--站内信息-->
                <div id="message">
                    <div class="mess_title"><img src="/images/user/gzyh_r11_c2.jpg" /></div>
                    <div class="mess_text">
                        <div class="mess_a">
                            <div class="a_text blue">一对一咨询</div>
                            <div class="b_text">咨询数目：<?php echo $All_ask_counts['question_num']?> 条</div>
                            <div class="b_text">律师回复数目：<?php echo $All_ask_counts['reply_num']?> 条</div>
                            <div class="c_text"> [<span class="STYLE1">点击查看详情</span>]</div>
                        </div>
                        <div class="mess_a">
                            <div class="a_text blue">一对一咨询</div>
                            <div class="b_text">咨询数目：<?php echo $All_ask_counts['msg_num']?> 条</div>
                            <div class="b_text">律师回复数目：<?php echo $All_ask_counts['msg_reply_num']?> 条</div>
                            <div class="c_text"> [<span class="STYLE1">点击查看详情</span>]</div>
                        </div>
                    </div>
                    <div class="mess_title"><img src="/images/user/gzyh_r11_c21.jpg" /></div>
                </div>
                <!--左边下方-->
                <div class="le"></div>
                <div id="left_bottom">
                    <img src="/images/user/aghyh_r2_c2.jpg" /><div class="bot_tp">
                        <div class="bot_a"><img src="/images/user/aghyh_r3_c2.jpg" /></div>
                        <div class="bot_a"><img src="/images/user/aghyh_r3_c3.jpg" /></div>
                        <div class="bot_b">
                            <div class="zi_a">法律问题帮助</div>
                        </div>
                        <div class="bot_a"><img src="/images/user/rt_t2.jpg" /></div>
                        <div class="bot_c">
                            <div class="zi_b"> 法律知识帮助</div>
                        </div>
                    </div>
                    <!--开始-->
                    <div class="bl_left">
                        <div class="bl_1"></div>
                        <div id="bot_main">
                            <div class="bot_text">
                                <div class="bot_pic"><img src="/images/user/gzyh_r15_c7.jpg" /></div><span class="ziju">免费法律咨询</span>
                                <br />
                                中顾法律网服务覆盖全国34省、258市、2891县/区，拥有注册律师会员110230人，如果您有法律疑难，请点此进行快速咨询，众多律师在线快速为您提供专业分析。<span class="ju">马上发布咨询>> </span>   </div>
                            <div class="ic">
                                <div class="ic_1">
                                    <div class="ic_2"><img src="/images/user/ico.jpg" /></div>
                                    <span class="lan">法律文书</span><br />
                                    拥有几十类文书范本可供查阅 </div>
                                <div class="ic_1">
                                    <div class="ic_2"><img src="/images/user/ic_1.jpg" /></div>
                                    <span class="lan">法律常识</span><br />
                                    拥有各方面的法律常识可供查阅 </div>
                                <div class="ic_1">
                                    <div class="ic_2"><img src="/images/user/ic_2.jpg" /></div>
                                    <span class="lan">法律常识</span><br />
                                    拥有各方面的法律常识可供查阅 </div>
                                <div class="ic_1">
                                    <div class="ic_2"><img src="/images/user/ic_3.jpg" /></div>
                                    <span class="lan"> 案例分析</span><br />
                                    最大法律案例数据并保持更新 </div>
                                <div class="ic_1">
                                    <div class="ic_2"><img src="/images/user/ic_4.jpg" /></div>
                                    <span class="lan">合同范本</span><br />
                                    拥有近百种分类的合同可供下载  </div>
                                <div class="ic_1">
                                    <div class="ic_2"><img src="/images/user/ic_5.jpg" /></div>
                                    <span class="lan"> 律师文集</span><br />
                                    专业律师为您分享办案心得 </div>
                            </div>
                        </div>
                        <div class="ba_bottom">
                            <div class="ba_a1"><img src="/images/user/aghyh_r7_c2.jpg" /></div>
                            <div class="ba_a2"></div>
                        </div>
                    </div>
                    <div class="bl_rt"><img src="/images/user/aghyh_r4_c7.jpg" /></div>
                    <!--结尾-->
                </div>
            </div>
            <div id="a_right">
                <div class="yhmess"><img src="/images/user/rt_title1.jpg" />
                    <?php if($this->beginCache(app()->user->id, array('duration'=>300))) { ?>

                    <div class="mess_t1">用户名：<span class="rt_lan"><?php echo app()->user->name ?></span><br />

                        [<span class="rt_blue"> <a href="<?php   echo url('user/profile/editprofile') ; ?>" >修改资料</a> </span>]　　[<span class="rt_blue"><a href="<?php echo url('user/profile/editpsw') ; ?>"> 修改密码</a></span>]<br />

                        我的注册日期：<?php echo  substr(UserTool::user()->GetRegTime(),0,11);?> <br />

                        上次登陆日期：<?php echo  substr(UserTool::user()->GetLoginTime(),0,11);?> <br />

                        积分：<span class="rt_blue"><?php echo(UserTool::user()->GetJiFen())?> </span>分[怎么样获取积分]<br />

                        咨询问题：<span class="rt_blue"><?php echo(UserTool::user()->GetAallQuestion())?></span> 个            [<span class="rt_blue">点击查看</span>]<br />
                        回复问题数：<?php echo UserTool::user()->GetAllReplys();?> 个          [<span class="rt_blue">点击查看</span>]<br />
                        回复咨询采纳数：<?php echo UserTool::user()->GetAllReplys_jie();?> 个      [<span class="rt_blue">点击查看</span>]<br />
                        您获得的荣誉：暂无 </div>
                        <?php $this->endCache();
} ?>

                </div>
                <div class="acctive"><img src="/images/user/rt_title.jpg" />
                    <div class="acc_pic">
                        <div class="acc_p1"><img src="/images/user/rt_left2.jpg" /></div>
                        <div class="acc_p2"></div>
                        <div class="acc_p1"><img src="/images/user/rt_rt1.jpg" /></div>
                        <div class="acc_main">

                            <div class="acc_m1"><img src="/images/user/gzyh_r17_c26.jpg" /></div></div>
                        <div class="acc_p1"><img src="/images/user/rt_left1.jpg" /></div>
                        <div class="acc_p3"></div>
                        <div class="acc_p1"><img src="/images/user/rt_rt2.jpg" /></div>
                    </div>
                    <div id="a_text">
                        <ul>
                            <?php
                            foreach($huodong as $k=>$v) {

                                echo  "<li><a href='".url('user/oaskgonggao/view',array('id'=>$v->ID))."' target='_blank'>" . AskTool::str_cut($v->title, 38) ."</a></li>";
                            }
?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both"></div>
    </body>
</html>