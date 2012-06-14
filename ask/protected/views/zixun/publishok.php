<?php cs()->registerCssFile(resBu('/css/publicok.css', 'screen'));?>
<!--pagebody-->
<div id="pagebody" class="cwidth borderblue2 margin_top_10">
    <!--pagebodyleft-->
    <div class="left">
        <div class="okimg"><img src="/images/okimg.gif" width="248" height="71" /></div>
        <div class="ft14 ftb lightgrey">您好，正在将咨询推送给全国10万爱心律师，3分钟内100%回复！</div>
        <div class="okimg">
            <span><a href="<?php $qid = app()->session->get('qid');
echo  AskTool::Question_GetUrl($qid);?>"><img src="/images/button1.gif" width="167" height="38" /></a></span>
            <span><a href="javascript:addFavorite2('<?php echo '我的咨询-' . $models->title ."','" . AskTool::Question_GetUrl($qid) ?>');"><img src="/images/button2.gif" width="167" height="38" /></a></span>
        </div>
        <?php
        //设置cookie 保存用户进入用户中心的路径
        $cookie = new CHttpCookie('usercenterpath',url('user/profile/editprofile'));
        $cookie->expire = time()+60*60*24*30;  //有限期30天
        app()->request->cookies['usercenterpath']=$cookie;
?>
        <div class="margin_top_10 margin_bottom_10 lightgrey">如果您的回答，有律师回复后我们会在第一时间通过邮件通知您，请注意查收！</div>
        <div class="hotalert margin_bottom_10">
            <span class="hth">温馨提示：</span><br>
			您的联系方式非常不完善， [<a href="<?php echo url('user')?>"  target="_blank" class="rlink">点此修改</a>]以方便律师快速准确的帮助您！
        </div>

<?php if(app()->session->get('youke')) {?>
        <div class="lightgrey margin_bottom_10">请保管好系统自动分配的帐号 用 户 名：
            <span class="ftred"><?php echo app()->user->name;?></span> 密码：<span class="ftred"><?php echo app()->session->get('pwd')?></span></div>
        <div class="lightgrey margin_bottom_10">或修改为您的个性化帐号(仅一次) </div>
        <div class="userreg lightgrey margin_bottom_10">
            <form action="<?php url('zixun/publishok')?>" method="post">
                <span>个性帐号:<input name="name" type="text" class="ipts" /></span>
                <span>新密码：<input name="pwd" type="text"  class="ipts" /></span>
                <input name="oldname" id="oldname" type="hidden" value="<?php echo $models->sender?>" >
                <span>
                    <input type="image" name="imageField" id="imageField" src="/images/btnok.jpg" /></span><span style="color:red"><?php echo $errmsg?></span>
            </form>
        </div>
    <?php }?>
        <div class="lightgrey2 margin_bottom_10 padding_left_10 padding_top_10" style="width:400px;clear:both">[提醒]请保存帐号密码，登录到用户中心可查看律师回复，
            如果忘记可点击在线客服QQ：<a href="http://wpa.qq.com/msgrd?V=1&;Uin=520281050&Site=客服&Menu=yes" class="e09">520281050</a>索取
        </div>
        <div class="aboutitembox">
            <p class="listhead ft14 ftb grey margin_bottom_10 margin_top_10 borderbottom">看看以下回答是否解决了您的问题</p>
            <ul>
                <?
                if(is_array($listsolved)) { //如果数组有数据，那么再进行循环
                  //  print_r($listsolved);
                    //调用3调已解决咨询，有字数限制
                    $maxcount=count($listsolved);
                    if($maxcount>4) $maxcount=4;//只调去4行
                    for($i=0;$i<$maxcount;$i++) {
                        ?> <li>
                    <div class="at"><a href="<?php echo AskTool::Question_GetUrl($listsolved[$i]['id'])  ?>" class="ft14"><?php echo  $listsolved[$i]['title']?></a>[<a href="<?php echo AskTool::Question_GetUrl($listsolved[$i]['id'])  ?>" class="ft12">详细</a>]</div>
                    <div class="aw"><?php echo  AskTool::str_cut($listsolved[$i]['content'],99)?></div>
                </li>
        <?php
                    }
                }
                ?>

            </ul>
        </div>
    </div>
    <!--pagebodyright-->
    <div class="right f_r padding_left_10">
        <div class="rightone lawerbox">
            <p class="ft14 ftb grey margin_bottom_10 margin_top_10 borderbottom">为了更快的让您的问题得到解答，您可以进行以下操作：</p>
            <p class="margin_bottom_10 lineheight22 lightgrey2">
				您可以直接将问题发送给中顾网推荐的<?php  echo ($citylist[$models->cnameid] .$oaskclass[$models->fenleiid]);?>律师（选中律师，点击确认按钮即可）
				如果您的问题比较紧急，<span class="ftred">请直接拨打律师电话咨询</span>。说明来自中顾法律网，<span class="ftred">电话咨询免费</span>
            </p>
            <script src="<?php echo url('billask/fbok',array('zcid'=>$models->fenleiid,'cnameid'=>$models->cnameid,'newid'=>$qid)); ?>"    language="javascript"></script>
        </div>
        <!--righttwo-->
        <div class="righttwo">
            <p class="ft14 ftb grey margin_bottom_10 margin_top_10">如果您希望该问题得到律师更快更有针对性的回复和解决方案，您可以:</p>
            <div class="margin_bottom_14">
                <form action="http://www.9ask.cn/usersite/Wt1/Wtadd.asp"  name="frmzh" id="frmzh" method="post" target="_blank">
                    <span><input name="asktowt" type="image"  src="/images/wtbutton.gif" /></span>
                    <span><a href="http://news.9ask.cn/help/ask/200910/259805.html">什么是案件委托?</a></span>
                    <input name="newid" type="hidden" id="newid" value="<?php echo $qid?>" />
                </form>

            </div>
            <div class="haochu margin_top_10">
                <p class="ft14 lightgrey">转换案件委托的好处</p>
                <ol>
                    <li>1增加案件的真实性，会有更多律师有针对性的回答。</li>
                    <li>2专享“诚信律法通”律师会员的回复，值得信赖。</li>
                    <li>3方便您找到最合适的律师。</li>
                    <li>4愿意承接您案件的律师，将会主动与您联系。</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--pagefooter-->