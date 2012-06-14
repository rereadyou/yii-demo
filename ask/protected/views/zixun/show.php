<?php cs()->registerCssFile(resBu('/css/askshow.css', 'screen'));?>
<?php cs()->registerScriptFile(resBu('/scripts/show.js', 'screen'));?>
<!--qnav-->
<div id="qnav" class="cwidth">
    <div class="pagehead">
        <div class="ico"><img src="/images_1/ico.gif" width="20" height="19" /></div>
        <div class="text"><?php echo $fenleiName ?>法律咨询</div>
    </div>
    <?php
    if (count($zhuanti_keys) > 0) {
        foreach ($zhuanti_keys as $v) {
            echo "<a href='http://zhuanti.9ask.cn/{$v->mulu}/' target='_blank'>$v->title</a> | ";
        }
    }
    ?>

</div>

<!--data-->
<div class="cwidth footer_2 borderblue_1 margin_top_10" style="width:936px;">
    <script src=" http://www.9ask.cn/js/getZXNum.asp" charset="gbk"></script>
</div>
<!--locabox-->
<div id="locbox" class="cwidth">
    <span></span>
    <div class="f_l margin_top_10 grey">您的位置：<a href="http://www.9ask.cn">中顾法律网首页</a> > <a href="http://ask.9ask.cn">法律咨询</a><?php echo $nav; ?></div>
    <div class="f_r">
        <script src="http://www.9ask.cn/common/sum.asp?zcid=<?php echo $model->fenleiid; ?>" language="javascript" charset="gbk"></script>&nbsp;&nbsp;
        <a href="http://www.9ask.cn/blog/user/9ask/archives/2009/76549.html" target="_blank">如何获得？</a>
    </div>
</div>

<!--pagebody-->
<div id="pagebody" class="cwidth ">
    <!--left-->
    <div class="left">
        <!--问题区-->
        <div class="tround"></div>
        <div class="qbox borderblue_1">
            <!--问题标题-->
            <div class="thead0">
                <div class="ico_a"></div>
                <div class="text">问题区</div>
                <div class="staback">
                    <?php echo $model->jie == 1 ? '已解决' : '解决中'; ?>
                </div>
                <div class="f_r margin_right_7"><a href="<?php echo  url('zixun/publish'); ?>"><img src="/images_1/button1.gif" width="130" height="22" /></a></div>
            </div>
            <div class="qbox_w">
                <!--问题属性-->
                <?php
                $area_xname='';
                if($model->xnameid>0) {
                     $area_xnames=AskTool::Area_getXname($model->xnameid);
                     $area_xname="-" . $area_xnames->xname;
                }
                ?>
                <div class="qinfo margin_bottom_10">
					悬赏：<?php echo $model->shang;?>分 | <span class="lightgrey2">提交时间：<?php echo $model->sendtime;?> | </span>
					提问者：<a href="javascript:ShowPerson(<?php echo $model->senduser->ID; ?>);" class="e08"><?php echo $model->sender;?></a> <span class="lightgrey2">| [<?php echo $model->province->pname.'-'.$model->city->cname . $area_xname;?>]</span>
                </div>
                <!--问题标题-->
                <div class="q_title margin_bottom_10"><?php echo $model->title;?></div>
                <!--问题内容-->
                <div class="q_content margin_bottom_10">
<?php echo $model->content;?>
                    <?php
                    if (!empty($model->bu)) {
                        echo "<br /><span class='ftred ftb'>补充：{$model->bu}</span>";
                    }
                    ?>
                </div>
                <!--问题操作区-->
                <div class="q_operate margin_bottom_10">
                    <p class="margin_bottom_10">
                    <form id="frmsearch" method="get"  action="<?php echo url('search/search') ?>" target="_blank">
                        <input name="key" type="text" />
                        <input type="image" src="/images_1/search.jpg"   width="39" height="22"/>
                        <a href="<?php echo url('zixun/publish');?>"><img src="/images_1/asksame.jpg" width="110" height="21" /></a>
                    </form>
                    </p>
                    <p class="lightgrey">
                        <a href="#" onclick="document.getElementById('answerbox').focus();return false"><img src="/images_1/iask.jpg" width="62" height="20"/></a>
                        <img src="/images_1/j.jpg" width="16" height="17" />
                        <a href="http://www.9ask.cn/search/findindex.asp?pnameid=<?php echo $model->pnameid; ?>" target="_blank">找<?php echo $model->city->cname; ?>律师</a>&nbsp;&nbsp;&nbsp;
                        <a href="http://news.9ask.cn/<?php echo $OaskClass->dir; ?>" target="_blank">找<?php echo $fenleiName ?>律师</a>&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo "http://www.9ask.cn/search/findindex.asp?zcID={$model->fenleiid}&cnameid={$model->cnameid}"; ?>" target="_blank">找<?php echo $model->city->cname . $fenleiName ?>律师</a><br />
                    </p>
<?php if ($model->sender == app()->user->name) { ?>
                    <a href="#" class="bu">问题补充</a>
                    <div class="bu" style="display:none"><textarea class="bu" style="border:1px solid;width:300px;height:100px;"><?php echo $model->bu;?></textarea>
                        <button class="bu">提交</button>
                        <input class="bu" type="hidden" value="<?php echo $model->ID;?>" />
                    </div>
                    <script type="text/javascript">
                        $(function(){
                            $('a.bu').click(function(){
                                $('div.bu').slideDown();
                                return false;
                            });

                            $(':button.bu').click(function(){
                                var bu = $('textarea.bu').val();
                                var id = $(':hidden.bu').val();
                                $.get("<?php echo  url('zixun/bu')?>",{bu:bu,id:id},function(){
                                    $('div.bu').slideUp();
                                    alert('补充成功');
                                });
                            });;
                        });
                    </script>
    <?php } ?>
                </div>
                <!--信息来自手机-->
<?php if (strpos($model->sender, 'wap') !== FALSE) { ?>
                <div class="q_fmobile"><img src="/images_1/mobile.jpg" />&nbsp;&nbsp;该条咨询来自手机用户，手机上中顾，问题即时解答。</div>
    <?php  }?>
                <!--分享-->
                <div class="padding_top_10 lightgrey">
                    <div class="f_l"><img src="/images_1/addf.jpg" width="82" height="15" onclick="addFavorite();" style="cursor: pointer;"/></div>

                    <div class="f_r" style="width:560px; float:left;">
                        <script type="text/javascript" src="http://img.9ask.cn/js/share/share.js" charset="gbk"></script>
                    </div>
                    <div style="clear:both"></div>
                </div>
            </div>
        </div>
        <div class="bround"></div>
<?php if (!empty($bestReply) && count($bestReply) > 0) { ?>
        <!--最佳答案-->
        <?php
        $lsaskurl=AskTool::GetLawyeraskurl($bestReply->user->ID, $bestReply->user->name,$bestReply->user->IsStar) ; //咨询我路径
        $lsurl=AskTool::GetLawyerurl($bestReply->user->ID, $bestReply->user->name,$bestReply->user->IsStar);//律师网址
        ?>
        <div class="thead4 margin_top_10 ft14">
            <div class="xzz"></div><strong>最佳答案</strong>
        </div>
        <div class="tbody4">
            <div class="goodbody">
                <div class="answerbody">
                    <div class="answersin">
                        <div class="l_photo">
    <?php if ($bestReply->user->userClassID == 1) { ?>
                            <a href="<?php echo $lsurl;?>" >
                                <p><img src="<?php echo  $bestReply->user->userpic ? param('userpic').$bestReply->user->userpic : param('userpic').'/souask/images/pic_9ask2.jpg'; ?>" width="40" height="50" /></p>
                                <p><?php echo $bestReply->user->TrueName . (strpos($bestReply->user->TrueName, '律师') === FALSE ? '律师' : '');?></p>
                            </a>
        <?php }else { ?>
                            <a href="javascript:ShowPerson(<?php echo $bestReply->user->ID; ?>);">
                                <p><img src="<?php echo  $bestReply->user->userpic ? param('userpic').$bestReply->user->userpic : param('userpic').'/souask/images/pic_9ask2.jpg'; ?>" width="40" height="50" /></p>
                                <p><?php echo $bestReply->user->TrueName ? $bestReply->user->TrueName : '匿名';?></p>
                            </a>
        <?php } ?>

                            <p><a href="http://www.9ask.cn/usersite/home/<?php echo $bestReply->user->name; ?>/ask.asp">[咨询我]</a></p>
    <?php if ($bestReply->user->IsStar == 2) { ?>
                            <p><img src="/images_1/cxlft<?php echo AskTool::vip_years($bestReply->user->vipstime) ?>.gif" width="120" height="34" /></p>
        <?php } ?>
                            <p><?php echo $bestReply->user->Phone; ?></p>
                        </div>
                        <div class="a_content padding_left_10">
                            <div class="lightgrey margin_bottom_10 margin_top_10">回复时间：<?php echo $bestReply->replytime ?></div>
                            <div class="c_text ft14">
    <?php echo $bestReply->content ?>
                                <br>
								咨询人对最佳答案的评价：<?php echo empty($model->BContent) ? '无' : $model->BContent; ?>
                            </div>
                            <div class="answer_op" style="display:none">
                                <a href="#"  class="b0">修改答案</a> |　<a href="#" class="b0">补充回复</a>	 <a href="#" class="a0">向该律师咨询</a>
                            </div>
                        </div>
                        <div class="cboth"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tfoot4">
        </div>
        <!--最佳答案-->
    <?php } ?>
        <!--已解决的咨询-->
        <div class="thead1 margin_top_10">
            <div class="ico_b"></div>
            <div class="text ft14 ftb grey">已解决的<span class="ftred"><?php echo $key; ?></span>咨询</div>
            <div class="f_r margin_right_7"><a href="<?php echo url('zixun/publish') ?>" target="_blank"><img src="/images_1/pua.jpg" width="70" height="22" /></a></div>
            <div class="f_r margin_top_7 margin_right_7">免费发布<span class="ftred"><?php echo $key; ?></span>咨询</div>
        </div>
        <div class="cbody dlistbody">
            <ul>
<?php
                foreach ($xgzx as $v) {
                    echo "<li><a href='".url('zixun/show', array('id'=>$v->ID))."' target='_blank'>".AskTool::str_cut($v->title, 34, '')."</a></li>";
                }
                ?>
            </ul>
            <div style="clear:both"></div>
        </div>
        <div class="tfoot1"></div>
        <!--推荐律师-->
        <script src="<?php echo url('billask/contentleft',array('cnameid'=>$model->cnameid,'zcid'=>$model->fenleiid)); ?>"    ></script>
        <div class="tfoot1"></div>
        <!--回复区-->
<?php if (!empty($replies) && count($replies) > 0) { ?>
        <div class="thead1 margin_top_10">
            <div class="ico_c"></div>
            <div class="text ft14 ftb grey">回复区</div>
        </div>
        <div class="cbody answerbody">
            <ul>
    <?php foreach($replies as $v) {
    ?>
     <li>
       <div class="l_photo">
        <?php if ($v->user->userClassID == 1) { ?>
             <?php
                       $lsaskurl=AskTool::GetLawyeraskurl($v->user->ID, $v->user->name,$v->user->IsStar) ; //咨询我路径
                       $lsurl=AskTool::GetLawyerurl($v->user->ID, $v->user->name,$v->user->IsStar);//
                        ?>
           <a href="<?echo $lsurl?>" target="_blank"  title="<?php echo $v->user->TrueName ;?>律师">
                            <p><img src="<?php echo  $v->user->userpic ? param('userpic').$v->user->userpic : param('userpic').'/souask/images/pic_9ask2.jpg'; ?>" width="40" height="50" /></p>
                            <p><?php echo $v->user->TrueName . (strpos($v->user->TrueName, '律师') === FALSE ? '律师' : '');?></p>
                        </a>
            <?php }else { ?>
                        <a href="javascript:ShowPerson(<?php echo $v->user->ID; ?>);">
                            <p><img src="<?php echo  $v->user->userpic ? param('userpic').$v->user->userpic : param('userpic').'/souask/images/pic_9ask2.jpg'; ?>" width="40" height="50" /></p>
                            <p><?php echo $v->user->TrueName ? $v->user->TrueName : '匿名';?></p>
                        </a>
            <?php } ?>
                                <?php if ($v->user->userClassID == 1) { ?>
                      
                        <p><a href="<?php echo  $lsaskurl;?>">[咨询我]</a></p>
            <?php } ?>
                                <?php if ($v->user->IsStar == 2) { ?>
                        <p><img src="/images_1/cxlft<?php echo AskTool::vip_years($v->user->vipstime) ?>.gif" width="120" height="34" /></p>
            <?php } ?>
                        <p><?php echo $v->user->Phone;?></p>
                    </div>
                    <div class="a_content padding_left_10">
                        <div class="lightgrey margin_bottom_10 margin_top_10">回复时间：<?php echo $v->replytime;?></div>
                        <div class="c_text ft14" id="showAnswer_<?php echo $v->id; ?>">
        <?php echo $v->content;?>
                        </div>
        <?php if ($v->replyer == app()->user->name) { ?>
                        <div class="zirong" id="editDiv_<?php echo $v->id; ?>">
                            <p class="bitinr">修改答案</p>
                            <p class="shewxuy"></p>
                            <p><textarea rows="3" cols="30"  name="editAnswer" id="editAnswer_<?php echo $v->id; ?>"><?php echo $v->content; ?></textarea></p>
                            <p><input type="button" value="提交" onclick="editAnswer(<?php echo $v->id;?>);">&nbsp;&nbsp;
                                <a href="javascript:void(0)"  onclick="showDiv('editDiv_<?php echo $v->id; ?>');">关闭此窗口</a></p>
                        </div>
            <?php } ?>
                        <div class="answer_op">
                            <div class="f_r"><a href="<?php echo $lsurl?>" class="a0" target="_blank">向该律师咨询</a></div>
                            <div class="f_r margin_top_7 margin_right_7 ping">
        <?php if ($model->sender == app()->user->name) { ?>
                                <div class="useandanswer" id="bestDiv_<?php echo $v->id; ?>">

                                    <p class="ftb">感谢语或评价：</p>
                                    <p class="lightgrey">您可以发表对<?php echo $v->user->TrueName . (strpos($v->user->TrueName, '律师') === FALSE ? '律师' : '');?>的感谢或者对答案的评价！</p>
                                    <p><textarea rows="3" cols="30" name="best" id="best_<?php echo $v->id; ?>"></textarea></p>
                                    <p><input type="button" value="提交" onclick="setBestAnswer(<?php echo $model->ID . ',' . $v->id . ',\'' . $v->replyer .'\'';?>);">&nbsp;&nbsp;关闭此窗口</p>
                                </div>
                                <a class="b0" href="javascript:void(0);" onclick="showDiv('bestDiv_<?php echo $v->id; ?>');">采纳为最佳答案</a> |
            <?php }elseif ($v->replyer == app()->user->name) { ?>

                                <a class="b0" href="javascript:void(0);" onclick="showDiv('editDiv_<?php echo $v->id; ?>');">修改答案</a> |
            <?php } ?>
                                <span href="<?php echo url('reply/ping',array('id'=>$v->id,'p'=>'flower'))?>" style="cursor: pointer;">好:<?php echo $v->flower;?></span> |
                                <span href="<?php echo url('reply/ping',array('id'=>$v->id,'p'=>'egg'));?>" style="cursor: pointer;">不好:<?php echo $v->egg;?></span>
                            </div>

                        </div>

                    </div>
                </li>
        <?php }?>
            </ul>
            <div style="clear:both"></div>
        </div>
        <div class="tfoot1"></div>
        <!--回复end-->
    <?php } ?>
        <!--回复框-->
        <div class="thead1 margin_top_10">
            <div class="ico_c"></div>
            <div class="text ft14 ftb grey">我来回答</div>
            <div class="f_r padding_top_5 dred">最先解答法律咨询  系统奖励5分，答案被采纳，系统奖励10分。</div>
        </div>
        <div class="cbody answerbox">
            <form action="<?php echo url('reply/insert')?>" method="post">
                <div class="atit"><img src="/images_1/t.jpg" width="13" height="13" />&nbsp;您不登录也可以回答问题</div>
                <div class="abox">
                    <textarea id="answerbox"  name="content" cols="" rows="" class="answerinput"></textarea>
                    <input type="hidden" name="id" value="<?php echo $model->ID;?>" />
                </div>


                <div class="sbutton" id="userinfo_area">
<?php if (app()->user->isguest) { ?>
                    <div class="yazzuid">
                        <div class="yazhm"">
                        	验证码：<input type="text" name="verifyCode" size="4" maxlength="4">
                        </div>
                        <div class="yazmn">
    <?php $replyController->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('class'=>'xjihet' ))); ?>
                        </div>
                    </div>

                    <div class="f_l zubya"><input type="image" src="/images_1/submitask.jpg" width="200" height="26" /></div>
                    <div class=" margin_top_7 yazyou">
                        <div class="f_l margin_left_10 "><input id="anonymous" style=" margin-top:4px;" name="anonymous" type="checkbox" checked="checked"/></div>
                        <div class="f_l margin_left_10 ieyazm">匿名 <a href="javascript:void(0)" onclick="showAjaxLogin();">登录</a>|<a href="http://www.9ask.cn/reg/reg.html" target="_blank">注册</a>(登录后回答可获得积分)</div>
                    </div>
    <?php }else { ?>
                    <div class="f_l"><input type="image" src="/images_1/submitask.jpg" width="200" height="26" /></div>
                    <div class="f_l margin_left_10 margin_top_7">欢迎您，<?php echo app()->user->name; ?> <a href="<?php echo url('site/logout', array('referer'=>app()->request->url)); ?>">退出</a></div>
    <?php } ?>
                </div>

                <div id="ajax_login" class="zitiannrs">
					用户名：<input type="text" name="ajax_username" id="ajax_username" style=" width:150px;"><br />
                    <div style="height:10px; overflow:hidden; "></div>
					密　码：<input type="password" name="ajax_password" id="ajax_password" style="width:150px;"><br />
                    <input type="button" value="登录">
                </div>
            </form>
        </div>
        <div class="tfoot1"></div>

    </div>
    <!--right-->
    <div class="right">
<?php
        $this->widget('quickask');
        ?>
        <!--常见婚姻咨询-->
        <div class="thead2 margin_top_10"><div class="f_l ft14 ftb">常见<?php echo $key ?>咨询</div></div>
        <div class="cbody2 rbody2">
            <ul>
<?php
                foreach ($rdhf as $v) {
                    echo "<li><a href='".url('zixun/show', array('id'=>$v->ID))."' target='_blank'>".AskTool::str_cut($v->title, 28, '')."</a></li>";
                }
                ?>
            </ul>
            <div style="clear:both"></div>
        </div>
        <!--推荐律师-->
        <script src="<?php echo url('billask/contentright', array('cnameid'=>$model->cnameid,'zcid'=>$model->fenleiid)); ?>"></script>
        <!--排行榜-->
        <div class="thead2 margin_top_10"><div class="f_l ft14 ftb">推荐律师</div></div>

        <div class="cbody2 rightlist1">
            <div class="rightlist2_head">
                <ul>
                    <li class="rover" id="list1" onmouseover="setTab2('list', 1, 2);">周排行</li>
                    <li class="rnorm" id="list2" onmouseover="setTab2('list', 2, 2);">月排行</li>
                </ul>
            </div>
            <div class="rightlist2" id="con_list_1">
                <ul>
<?php foreach ($week_layers as $k=>$v) { ?>
                    <li>
                        <div class="nbg"><?php echo $k+1; ?></div>
                        <div class="rlt">
                            <a href="http://www.9ask.cn/usersite/home/<?php echo $v['name']; ?>/">
    <?php echo $v['truename'] .(strpos($v['truename'], '律师') === FALSE ? '律师' : ''); ?>
                            </a>
                        </div>
                        <div class="jfb"><?php echo $v['jifen']; ?>分</div>
                    </li>
    <?php } ?>

                </ul>
                <div style="clear:both"></div>
            </div>

            <div class="rightlist2" style="display:none"  id="con_list_2">
                <ul>
<?php foreach ($month_layers as $k=>$v) { ?>
                    <li>
                        <div class="nbg"><?php echo $k+1; ?></div>
                        <div class="rlt">
                            <a href="http://www.9ask.cn/usersite/home/<?php echo $v['name']; ?>/">
    <?php echo $v['truename'] .(strpos($v['truename'], '律师') === FALSE ? '律师' : ''); ?>
                            </a>
                        </div>
                        <div class="jfb"><?php echo $v['jifen']; ?>分</div>
                    </li>
    <?php } ?>

                </ul>
                <div style="clear:both"></div>
            </div>
        </div>
        <!--排行榜-->
        <div class="thead2 margin_top_10"><div class="f_l ft14 ftb">律师搜索</div></div>
        <div class="cbody2 lsearch">
            <script type="text/javascript" src="http://img.9ask.cn/public/js/9askindextop.js" charset="gbk"></script>
            <form target="_blank" id="form1" name="form1" action="http://www.9ask.cn/search/findindex.asp" method="Post" accept-charset="gbk">
                <span>姓名：<input name="zName" id="zName" value="请输入律师姓名" onclick="if(this.value='请输入律师姓名') this.value=''" class="ft12 lightgrey" type="text"></span>
                <span>专长：<select name="fatherID" size="1" class="ft12 lightgrey" style="width: 156px;">
                        <option value="0">还可选择专长</option>
                        <option value="3">├ 民事类</option><option value="11">│├ 婚姻家庭</option><option value="12">│├ 遗产继承</option><option value="13">│├ 消费维权</option><option value="14">│├ 抵押担保</option><option value="15">│├ 合同纠纷</option><option value="16">│├ 劳动纠纷</option><option value="17">│├ 人身损害</option><option value="18">│├ 保险理赔</option><option value="19">│├ 拆迁安置</option><option value="20">│├ 债权债务</option><option value="21">│├ 医疗纠纷</option><option value="22">│├ 交通事故</option><option value="4">├ 经济类</option><option value="23">│├ 工程建筑</option><option value="24">│├ 房产纠纷</option><option value="25">│├ 知识产权</option><option value="26">│├ 合伙加盟</option><option value="27">│├ 个人独资</option><option value="28">│├ 金融证券</option><option value="29">│├ 银行保险</option><option value="30">│├ 不当竞争</option><option value="31">│├ 经济仲裁</option><option value="32">│├ 网络法律</option><option value="33">│├ 招标投标</option><option value="7">├ 刑事行政法类</option><option value="66">│├ 财税</option><option value="34">│├ 取保候审</option><option value="35">│├ 刑事辩护</option><option value="36">│├ 刑事自讼</option><option value="37">│├ 行政复议</option><option value="38">│├ 行政诉讼</option><option value="39">│├ 国家赔偿</option><option value="40">│├ 工商税务</option><option value="41">│├ 海关商检</option><option value="42">│├ 公安国安</option><option value="8">├ 涉外法律类</option><option value="43">│├ 海事海商</option><option value="44">│├ 国际贸易</option><option value="45">│├ 招商引资</option><option value="46">│├ 外商投资</option><option value="47">│├ 合资合作</option><option value="48">│├ WTO事务</option><option value="49">│├ 倾销补贴</option><option value="50">│├ 涉外仲裁</option><option value="9">├ 公司专项法律类</option><option value="51">│├ 公司并购</option><option value="52">│├ 股份转让</option><option value="53">│├ 企业改制</option><option value="54">│├ 公司清算</option><option value="55">│├ 破产解散</option><option value="56">│├ 资产拍卖</option><option value="10">├ 其他非讼法律类</option><option value="57">│├ 工商查询</option><option value="58">│├ 资信调查</option><option value="59">│├ 合同审查</option><option value="60">│├ 调解谈判</option><option value="61">│├ 常年顾问</option><option value="62">│├ 私人律师</option><option value="63">│├ 文书代理</option><option value="64">│├ 移民留学</option><option value="65">│├ 商帐追收</option>

                    </select></span>
                <span>省份：<select name="Region" onchange="changeselect(this.form.Region.options[this.form.Region.selectedIndex].value,this.form)" id="Region" size="1" style="width: 156px;" class="ft12 lightgrey">
                        <option value="0">省份</option>
                        <option value="1">北京</option>
                        <option value="15">安徽</option>
                        <option value="34">澳门</option>
                        <option value="4">重庆</option>
                        <option value="13">福建</option>
                        <option value="16">甘肃</option>
                        <option value="6">广东</option>
                        <option value="17">广西</option>
                        <option value="19">贵州</option>
                        <option value="18">海南</option>
                        <option value="12">河北</option>
                        <option value="20">黑龙江</option>
                        <option value="31">河南</option>
                        <option value="7">湖北</option>
                        <option value="8">湖南</option>
                        <option value="10">江苏</option>
                        <option value="22">江西</option>
                        <option value="23">吉林</option>
                        <option value="14">辽宁</option>
                        <option value="21">内蒙古</option>
                        <option value="24">宁夏</option>
                        <option value="25">青海</option>
                        <option value="5">山东</option>
                        <option value="2">上海</option>
                        <option value="26">山西</option>
                        <option value="27">陕西</option>
                        <option value="11">四川</option>
                        <option value="33">台湾</option>
                        <option value="3">天津</option>
                        <option value="32">香港</option>
                        <option value="29">新疆</option>
                        <option value="28">西藏</option>
                        <option value="30">云南</option>
                        <option value="9">浙江</option>
                        <option value="0" selected="selected">请选择省份</option>
                    </select>
                </span>
                <span>城市：<select size="1" name="City" style="width: 156px;" class="ft12 lightgrey"><option value="0">还可选择城市</option></select>  </span>
                <span style="padding: 0pt 0pt 0pt 50px;">
                    <input name="imageField" src="http://ask.9ask.cn/images/lysearch.jpg" type="image" width="130" height="32" onClick="if(document.getElementById('zName').value=='请输入律师姓名'){document.getElementById('zName').value=''}else{};submiturl();return false;" ></span>
            </form>

        </div>
        <!--知识专题-->
        <div class="thead2 margin_top_10"><div class="f_l ft14 ftb"><?php echo $fenleiName ?>知识专题</div></div>
        <div class="cbody2 specbox">
<?php
            foreach ($zhuanti as $v) {
                echo "<a href='http://zhuanti.9ask.cn/{$v->mulu}/' target='_blank'>$v->title</a>  ";
            }

            ?>

        </div>
    </div>
    <div style="clear:both"></div>
</div>
<!--pagefooter-->
