<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/css/user/index.css" rel="stylesheet" type="text/css" />
<?php
$cs=Yii::app()->clientScript;
$cs->registerScriptFile("jquery.KinSlideshow-1.1.js");
?>
<style type="text/css">
<!--
.STYLE1 {color: #155d98}
-->
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
   <div class="top_a"><img src="/images/user/index/gzyh_r3_c2.jpg" /></div>
   <div class="top_b"></div>
   <div class="top_a"><img src="/images/user/index/gzyh_r3_c22.jpg" /></div>
   <div id="main_a">
    <div class="main_b">
     <div class="title_a">
      <div class="title_ic"><img src="/images/user/index/ic_6.jpg" align="absmiddle" /> 公告专区</div>
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
   <div class="top_a"><img src="/images/user/index/gzyh_r9_c2.jpg" /></div>
   <div class="top_c"></div>
   <div class="top_a"><img src="/images/user/index/gzyh_r9_c22.jpg" /></div>
  </div>
  <!--左边下方-->
  <div class="ls_bot">
   <div class="ls_b1">
    <div class="ls_b2">
     <div class="ls_bt" id="infor_messageall">+1</div>
    </div>
    <div class="ls_b3">
     <div class="ls_bt" id="infor_questionall">+1</div>
    </div>
    <div class="ls_b4">
     <div class="ls_bt" id="infor_questionarea" >+1</div>
    </div>
    <div class="ls_b5">
        <div class="ls_bt" id="infor_questionzc">+1</div>
    </div>
    <div class="ls_b6">
     <div class="ls_bt" id="infor_questionscore">+1</div>
    </div>
    <div class="ls_b7">
     <div class="ls_bt" id="infor_questionbest">+1</div>
    </div>
    <div class="ls_b8">
     <div class="ls_bt"id="infor_weituoarea">+1</div>
    </div>
    <div class="ls_b9">
        <div class="ls_bt" id="infor_weituozc">+1</div>
    </div>
    <div class="ls_b10">
     <div class="ls_bt">+0</div>
    </div>
    <div class="ls_b11">
     <div class="ls_bt">+0</div>
    </div>
   </div>
  </div>

  <div class="le"></div>
  </div>
 <div id="a_right">
  <div class="yhmess"><img src="/images/user/index/rt_title1.jpg" />
  <div class="yh_pic">
   <div class="yh_p1"><img src="/images/user/index/b_r2_c6.jpg" width="82" height="92" /></div>
   <div class="yh_p2">用户名：<span class="rt_lan"><?php echo   UserTool::user()->getTrueName() ;?></span><br />

[<span class="rt_blue"><a href="<?php         echo url('user/profile/editprofilels') ; ?>" >修改资料</a></span>]　<br />[<span class="rt_blue"><a href="<?php echo url('user/profile/editpsw') ; ?>">修改密码</a></span>]</div>
  </div>
   <div class="le"></div>
   <div class="mess_t1">好评数：<?php echo   UserTool::user()->GetCountGoods() ;?>个（如何获得好评）<br />

       我的注册日期：<?php echo  substr(UserTool::user()->GetRegTime(),0,11);?> <br />

       上次登陆日期：<?php echo  substr(UserTool::user()->GetLoginTime(),0,11);?> </div>
  </div>
  <div class="acctive"><img src="/images/user/index/rt_title.jpg" />
   <div class="acc_pic">
    <div class="acc_p1"><img src="/images/user/index/rt_left2.jpg" /></div>
    <div class="acc_p2"></div>
    <div class="acc_p1"><img src="/images/user/index/rt_rt1.jpg" /></div>
    <div class="acc_main">

     <div class="acc_m1"><img src="/images/user/index/gzyh_r17_c26.jpg" /></div></div>
     <div class="acc_p1"><img src="/images/user/index/rt_left1.jpg" /></div>
     <div class="acc_p3"></div>
     <div class="acc_p1"><img src="/images/user/index/rt_rt2.jpg" /></div>
   </div>
   <div id="a_text">
     <ul style="list-style:none">
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
    <script language="javascript" src="<?php echo url('user/tongji/index');?>"></script>
</body>
</html>
