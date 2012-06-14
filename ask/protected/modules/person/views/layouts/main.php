<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="/css/headerfooter.css"/>
        <?php
        if($this->module->user->IsStar==2) {
            ?>
        <link rel="stylesheet" type="text/css" href="/css/person_vip.css"/>
    <?
        }
        else {                     ?>
        <link rel="stylesheet" type="text/css" href="/css/person_pt.css"/>
            <?

        }
        ?>
        <link rel="stylesheet" type="text/css" href="/css/thickbox.css"/>
        <title>中顾法律网律师<?php echo $this->module->user->name;?>个人主页</title>
    </head>
    <body >
        <!--topnav-->
        <script src='<?php echo url('site/jsloginform')?>'></script>
        <!--logo-->
        <div id="logo" class="cwidth">
            <div class="pinforep">
<?php if(!app()->user->isGuest && app()->user->name == $this->module->user->name) {?>
                <a href="<?php echo url('person/vipedit/EditTitle',array('name'=>$this->module->user->name,'id'=>$this->module->user->ID,'height'=>180,'width'=>750));?>" class="thickbox" title="头部修改">
                    <img src="/images_2/rep3.gif" width="60" height="25" />
                </a>
    <?php }?>
            </div>
            <div class="lawyername">
<?php if($this->module->user->viptitle) {?>
    <?php echo $this->module->user->viptitle;?>
                    <?php }else { ?>
		欢迎光临<span class="nametext"><?php echo $this->module->user->TrueName;?></span>的个人工作室
                    <?php }?>


            </div>
            <div class="hotline">咨询热线：<?php echo $this->module->user->mobile;?></div>
        </div>
        <!--navbar-->
        <div id="nav" class="cwidth">
            <div class="navleft"></div>
            <div class="navright"></div>
            <div class="vipstyle"><?php echo $this->module->user->vipnav;?></div>
            <div class="navbar">
                <ul>
                    <li><a href="<?php echo url('person/default/index',array('name'=>$this->module->user->name));?>">首页</a></li>
                    <li><a href="<?php echo url('person/cheng/index',array('name'=>$this->module->user->name));?>">诚信档案</a></li>
                    <li><a href="<?php echo url('person/one/index',array('name'=>$this->module->user->name));?>">一对一咨询</a></li>
                    <li><a href="<?php echo url('person/public/index',array('name'=>$this->module->user->name));?>">公开咨询</a></li>
                    <li><a href="<?php echo url('person/inact/index',array('name'=>$this->module->user->name));?>">在线互动</a></li>
                    <li><a href="<?php echo url('person/case/index',array('name'=>$this->module->user->name));?>">成功案例</a></li>
<?php if(!app()->user->isGuest) {?>
                    <li><a href="<?php echo url('person/wt/index',array('name'=>$this->module->user->name));?>">案源中心</a></li>
                        <?php }?>
                </ul>
            </div>
        </div>
        <!--commonbody-->
        <div id="sbody" class="cwidth margin_top_10">
            <!--left-->
            <div class="left">
                <!--资料-->
                <div class="borderdark ziliao">
<?php
if($v->user->IsStar==2) {
                        ?>
                    <div class="vip"></div>
                        <?php
                    }
?>
                    <div><img src="/images_2/zlhead.gif" width="233" height="14" /></div>
                    <!--照片栏-->
                    <div class="phototext margin_top_10">
                        <div class="photo"><img src="<?php echo  $v->user->userpic ? param('userpic').$v->user->userpic : param('userpic').'/souask/images/pic_9ask2.jpg'; ?>" width="90" height="120" />

                        </div>
                        <div class="text">
                            <p><a href="#" class="e15"><?php echo $this->module->user->TrueName;?></a>
<?php if($this->module->user->qq) { ?>
                                <a target=blank href=tencent://message/?uin=<?php echo $this->module->user->qq;?>&Site=www.zhgu.com&Menu=yes><img src="/images_2/q.gif" width="15" height="16" /></a>
    <?php }?>
                            </p>
                            <p>地区：<?php echo $this->module->user->prov->pname;?> <?php echo $this->module->user->city->cname;?></p>
                            <p class="lightgrey">咨询说明来自中顾法律网</p>
                            <p>电话：<?php echo $this->module->user->mobile;?> </p>
                            <p>
                                <a href="<?php echo url('person/one/index',array('name'=>$this->module->user->name));?>">
                                    <img src="/images_2/a1.gif" width="123" height="31" />
                                </a>
                            </p>
                        </div>
                        <div class="cboth"></div>
                    </div>
                    <!--资料-->
                    <div class="zlbox margin_top_10">
                        <p><strong>执业证号：</strong> <span><?php echo $this->module->user->Code;?></span></p>
                        <p><strong>执业机构：</strong> <span><?php echo $this->module->user->work->WorkName;?></span></p>
                        <p><strong>办公电话：</strong> <span><?php echo $this->module->user->Phone;?></span></p>
                        <p><strong>E-mail：</strong>  <span><?php echo $this->module->user->email;?></span></p>
                        <p><strong>联系地址：</strong> <span><?php echo $this->module->user->Address;?></span></p>
                    </div>
                    <div class="t_right">
<?php if(!app()->user->isGuest && app()->user->name == $this->module->user->name) {?>
                        <a href="<?php echo url('person/vipedit/EditProfileLs',array('name'=>$this->module->user->name,'id'=>$this->module->user->ID,'height'=>420,'width'=>750));?>" class="thickbox" title="个人资料"><img src="/images_2/rep.gif"/></a>
    <?php }?>
                    </div>
                </div>
                <!--用户评价统计-->
                <div class="userpj borderdark margin_top_10">
                    <div class="chead">
                        <div class="f_l">用户评价</div>
                    </div>
<?php 
$caina = PersonTool::getNa($this->module->user->name);
$pingjia = PersonTool::getMark($this->module->user->name);
                    $quest = PersonTool::getQuest($this->module->user->name,$this->module->user->ID);
                    ?>
                    <p><b><?php echo $this->module->user->TrueName;?></b>律师共回复公开咨询<?php echo $quest['pub'];?>条</p>
                    <p>一对一咨询<?php echo $quest['one'];?>条</p>
                    <p>其中：<img src="/images_2/good.gif" width="16" height="16" />好评：<?php echo $pingjia['flower'] ?$pingjia['flower'] : 0;?>个&nbsp;&nbsp;
                        <img src="/images_2/bad.gif" width="16" height="16" />差评：<?php echo $pingjia['egg'] ? $pingjia['egg'] : 0;?>个</p>
                    <div class="count">被采纳：<?php echo $caina;?>条回复被采纳</div>

                </div>

                <!--专家领域-->
                <div class="borderdark eptarea margin_top_10">
                    <div class="chead">
                        <div class="f_l">专家领域</div>
                        <div class="f_r margin_right_7">
<?php if(!app()->user->isGuest && app()->user->name == $this->module->user->name) {?>
                            <a href="<?php echo url('person/vipedit/EditSpecial',array('name'=>$this->module->user->name,'id'=>$this->module->user->ID,'height'=>220,'width'=>750));?>" class="thickbox" title="我的专长">
                                <img src="/images_2/rep.gif"/>
                            </a>
    <?php }?>

                        </div>
                    </div>
<?php 
$arr = explode(',', $this->module->user->Specaility);
$class= AskTool::OaskClass_GetClass();

                    ?>
                    <span><?php echo $class[$arr[0]] ? $class[$arr[0]] : '婚姻家庭';?></span>
                    <span><?php echo $class[$arr[1]] ? $class[$arr[1]]: '婚姻家庭';?></span>
                    <span><?php echo $class[$arr[2]] ? $class[$arr[2]]: '婚姻家庭';?></span>
                    <span><?php echo $class[$arr[3]] ? $class[$arr[3]]: '婚姻家庭';?></span>
                </div>
<?php $this->widget('bcontent',array('name'=>$this->module->user->name))?>
            </div>

                <?php echo $content;?>

            <!--帮助信息-->
            <div class="cwidth margin_top_10"><img src="/images_2/qa.jpg" width="950" height="34" /></div>
            <div class="borderdark cwidth help padding_10">
                <div class="hhead"><img src="/images_2/hhead.gif" width="792" height="18" /></div>
                <div class="h_a">
		如何装饰我的个人网站？<br>
		如何完善我的网站内容？<br>
		VIP律师是怎么设定的？<br>
		用户评价是怎样评出来的？<br>
		如何快速回复咨询？

                                    </div>
                                    <div class="h_b">
		诚信律法通会员专享服务有哪些？<br>
		如何增加我的信赖感，让用户更信任我？<br>
		如何提高我的好评？<br>
		排行榜是怎样评选出来的？<br>
		如何提高我的案源接洽率？
                                                        </div>
                                                        <div class="h_c">
		如何增加个人网站流量？<br>
		为什么要在中顾法律网宣传推广？<br>
		怎样保证诚信律法通会员的诚信、专业？<br>
		普通律师与诚信律法通律师有什么区别？<br>
		怎样申请成为诚信律法通律师？	
                                                                            </div>
                                                                            <div class="h_d">
		手机上网费用很贵吗？<br>
		使用手机中顾法律网内容全免费吗？<br>
		目前手机中顾法律网有哪些服务？<br>
		为何有时无法打开手机中顾法律网？<br>
		如何在手机上打开中顾法律网？
                                                                                                </div>
                                                                                                <div class="cboth"></div>
                                                                                                </div>
                                                                                                <!--footer-->
                                                                                                <div class="footer cwidth margin_top_10">
	技术支持：中顾法律网&nbsp;&nbsp;版权所有：<?php echo  $this->module->user->name;?>律师&nbsp;&nbsp;
	律师执业证号：<?php echo $this->module->user->Code;?><br />
	电话：<?php echo $this->module->user->Phone;?> QQ：<?php echo $this->module->user->qq;?><br />
                                                                                                </div>
                                                                                                </body>
                                                                                                </html>
<?php cs()->registerCoreScript('jquery');?>
<?php cs()->registerScriptFile(resBu('scripts/thickbox.js'), CClientScript::POS_END);?>

