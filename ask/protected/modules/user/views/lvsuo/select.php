 <style>
 body{text-align:center; margin:0 auto; font-size:13px; line-height:25px;}
 a:link {color: #004BCA; text-decoration:none;}
 a:visited {color: #004BCA;text-decoration:none;}
 a:hover {color: #cc0000; text-decoration:underline;}
 a:active {color: #004BCA;}
.User_S{width:650px; border:1px solid #cee9fa; margin-top:5px; line-height:20px; }
.User_S h2{font-size:14px; text-align:left; color:#ffffff; height:27px; padding:5px 0 0 5px; overflow: hidden; background: url(images/win_top.gif);}
.User_S ul{ margin-left:10px; line-height:25px;}
.User_S li{ list-style-type:none; text-align:left;}
.User_S li#S1{width:65px; float:left; padding:5px 0 0 5px;}
.User_S li#S2{widtha:140px; float:left; text-align:left;}
.User_S li#S3{width:70px; float:left; padding:5px 0 0 5px; text-align:left;}
.User_S li#S4{width:80px; float:left; text-align:left;}
.User_S li#S5{width:180px;}
.User_S span{float:right;}
.User_S .L{clear:both; margin-left:15px;}
.User_S .L ul{ line-height:29px;}
.User_S .L li{ list-style-type:none;}
.User_S .L li#L1{width:20px; text-align:left; float:left; line-height:2px;}
.User_S .L li#L2{text-align:left; padding:10px 0 0 0; line-height:2px;}
.User_S .P {clear:both; margin:0;}
.User_S .P ul{margin:0;}
.User_S .P li{list-style-type:none; text-align:center;}
.top_ss{font-size:12px; color:#004592;}
.top_ss ul{}
.top_ss li{ list-style-type:none; font-size:12px; text-align:left;}
</style>

	<?php cs()->registerCoreScript('jquery');?>
	<?php cs()->registerScriptFile(resBu('scripts/jquery.tools.min.js'), CClientScript::POS_END);?>
	<?php cs()->registerScriptFile(resBu('scripts/common.js'), CClientScript::POS_END);?>
 <center>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" class="top_ss" style="margin-top:5px">
<tr>
    <td height="24" bgcolor="#c2e8ff" align="left" style="font-weight:bold;">　中顾网用户中心->添加执业机构：</td>
</tr></table>
<div class="User_S">
    <form action="<?php echo url('user/lvsuo/search')?>" method="post" name="form1">
   <ul><li><font color="#004592" style=" line-height:19px;">
     <font color="#FF0000">操作指导：</font>第一步：搜索已有的律师事务所，点击选择加入即可；<br> 
   第二步：如没有数据，请您点击添加按钮花一分钟时间添加一下，您将成为该所管理员 </font></li>
   </ul>
    <ul><li id="S1">所属地区：</li>
    <li id="S2">    <?php                
			   $cnameid=86;
			   if (isset($_GET['cnameid']))
			   {
                               if(!empty($_GET['cnameid'])) $cnameid=$_GET['cnameid'];
			   
			   }
			   else
			   { if(isset($_COOKIE['cnameid']))  $cnameid=$_COOKIE['cnameid'];
			   }
               $this->widget('ModuleArea',array('cnameid'=>$cnameid));
           ?></li> <br />

           <li style="height:5px; overflow:hidden;"></li>
           <li style="margin-left:5px; _margin-left:2px; float:left; clear:both;">律所名称：<input name="workname" type="text" id="workname" size="20" style="line-height:18px; height:18px;" maxlength="50"> <input type="submit" name="Submit"    value="查询">
  <input type="button" onClick="window.location.href='<?php echo url('user/lvsuo/lvsuoadd');?>'" name="Submit3" value="点此添加">
    </li>
    </ul>



</form>
<div class="L">
<div style="height:10px; overflow:hidden;"></div>
<LI style="font-size:14px;"><font color="#FF0000">友情提示：</font>以下是您搜索的相关律所</LI>
<div style="height:8px; overflow:hidden;"></div>
    <form action="<?php echo url('user/lvsuo/selectone');?>" method="post" name="form2">

      <?php
        foreach($questions as $k=>$v)
            {
        ?>
    <li style="margin-left: 5px; line-height: 19px;  ">
    <input type="radio" name="workid" value="<?php echo $v->id ?>,<?php echo $v->WorkName ?>"  >  <?php echo $v->WorkName ?>
      </li>
	<?php
        }
        ?>
 
       
   <ul>
     <li style="text-align:center; "><input type="submit" name="Submit2" value="确认加入该律所"></li>
   </ul>
  </form>

</div>
</div>
     <div class="P" style="margin-top: 10px"> <ul>

   
 <?php
  $this->widget('CLinkPager', array(
	'pages' => $pages,
    'header' => '翻页',
    'firstPageLabel' => '首页',
    'lastPageLabel' => '末页',
    'nextPageLabel' => '下页',
    'prevPageLabel' => '上页',
));
  ?>
  </ul></div></center>
 
 