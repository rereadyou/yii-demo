<?php cs()->registerCssFile(resBu('css/list.css', 'screen'));?>

<?php $this->widget('navzixunnum');?>
<!--qnav-->
 <?php $this->widget('askmenumiddle');?>
<div id="pagebody" class="cwidth margin_top_10">
  <!--left-->
  <div class="left f_l">
    <div class="lefthead borderdark margin_top_7">
      <div class="lshead"></div>
      <div class="ftred f_l margin_right_10">热点专长：</div>
      <div class="grey f_l zm">
        <?php
                //获取到热点专长
                $arrhotzc= explode(',', $hotclass);
                for($i=0;$i<12;$i++) {
                    if($i==0 || $i==6) echo "<p>";
                    echo $oaskclass[$arrhotzc[$i]] . "  ";
                    if($i==5 || $i==11) echo "</p>";
                }
                ?>
      </div>
    </div>
    <!--listhead-->
    <div class="listhead4 margin_top_10">
      <ul>
        <li class="oov ft14 ftb" id="tabs0" onmouseover="showtab(0)"><?php echo $oaskclass[$arrhotzc[0]]?></li>
        <li class="ooo ft14" id="tabs1" onmouseover="showtab(1)"><?php echo $oaskclass[$arrhotzc[1]]?></li>
        <li class="ooo ft14" id="tabs2" onmouseover="showtab(2)"><?php echo $oaskclass[$arrhotzc[2]]?></li>
        <li class="ooo ft14" id="tabs3" onmouseover="showtab(3)"><?php echo $oaskclass[$arrhotzc[3]]?></li>
      </ul>
    </div>
    <!--listbody-->
    <?php
        getonelvshi(0,$arrhotzc,$lsarray,$oaskclass,1);
        getonelvshi(1,$arrhotzc,$lsarray,$oaskclass,0);
        getonelvshi(2,$arrhotzc,$lsarray,$oaskclass,0);
        getonelvshi(3,$arrhotzc,$lsarray,$oaskclass,0);
        ?>
    <!--listhead-->
    <div class="listhead4 margin_top_10">
      <ul>
        <li class="oov ft14 ftb" id="tabs4" onmouseover="showtab(4)"><?php echo $oaskclass[$arrhotzc[4]]?></li>
        <li class="ooo ft14" id="tabs5" onmouseover="showtab(5)"><?php echo $oaskclass[$arrhotzc[5]]?></li>
        <li class="ooo ft14" id="tabs6" onmouseover="showtab(6)"><?php echo $oaskclass[$arrhotzc[6]]?></li>
        <li class="ooo ft14" id="tabs7" onmouseover="showtab(7)"><?php echo $oaskclass[$arrhotzc[7]]?></li>
      </ul>
    </div>
    <!--listbody-->
    <?php
        getonelvshi(4,$arrhotzc,$lsarray,$oaskclass,1);
        getonelvshi(5,$arrhotzc,$lsarray,$oaskclass,0);
        getonelvshi(6,$arrhotzc,$lsarray,$oaskclass,0);
        getonelvshi(7,$arrhotzc,$lsarray,$oaskclass,0);
        ?>
    <!--listhead-->
    <div class="listhead4 margin_top_10">
      <ul>
        <li class="oov ft14 ftb" id="tabs8" onmouseover="showtab(8)"><?php echo $oaskclass[$arrhotzc[8]]?></li>
        <li class="ooo ft14" id="tabs9" onmouseover="showtab(9)"><?php echo $oaskclass[$arrhotzc[9]]?></li>
        <li class="ooo ft14" id="tabs10" onmouseover="showtab(10)"><?php echo $oaskclass[$arrhotzc[10]]?></li>
        <li class="ooo ft14" id="tabs11" onmouseover="showtab(11)"><?php echo $oaskclass[$arrhotzc[11]]?></li>
      </ul>
    </div>
    <!--listbody-->
    <?php
        getonelvshi(8,$arrhotzc,$lsarray,$oaskclass,1);
        getonelvshi(9,$arrhotzc,$lsarray,$oaskclass,0);
        getonelvshi(10,$arrhotzc,$lsarray,$oaskclass,0);
        getonelvshi(11,$arrhotzc,$lsarray,$oaskclass,0);
        ?>
    <!--listhead-->
    <div class="listhead2 borderdark margin_top_10">
      <ul>
        <li class="ov ft14 ftb grey">其它专长</li>
      </ul>
    </div>
    <!--listbody-->
    <div style="clear:both"></div>
    <div class="borderdark listbody3">
      <div class="listtitle">民事律师</div>
      <ul class="clearfix" >
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(11);" class="listitem" >婚姻家庭</a>
          <div id="classlist11" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(12);" class="listitem">遗产继承</a>
          <div id="classlist12" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(13);" class="listitem">消费维权</a>
          <div id="classlist13" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(14);" class="listitem">抵押担保</a>
          <div id="classlist14" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(15);" class="listitem"  style="z-index:-1">合同纠纷</a>
          <div id="classlist15" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(16);" class="listitem">劳动纠纷</a>
          <div id="classlist16" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(17);" class="listitem">人身损害</a>
          <div id="classlist17" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(18);" class="listitem">保险理赔</a>
          <div id="classlist18" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(19);" class="listitem">拆迁安置</a>
          <div id="classlist19" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(20);" class="listitem">债权债务</a>
          <div id="classlist20" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(21);" class="listitem">医疗纠纷</a>
          <div id="classlist21" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(22);" class="listitem">交通事故</a>
          <div id="classlist22" class="nonedd"></div>
        </li>
      </ul>
      <div class="cboth"></div>
    </div>
    <div class="borderdark listbody3">
      <ul class="clearfix" >
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(23);" class="listitem">工程建筑</a>
          <div id="classlist23" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(24);" class="listitem">房产纠纷</a>
          <div id="classlist24" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(25);" class="listitem">知识产权</a>
          <div id="classlist25" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(26);" class="listitem">合伙加盟</a>
          <div id="classlist26" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(27);" class="listitem">个人独资</a>
          <div id="classlist27" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(28);" class="listitem">金融证券</a>
          <div id="classlist28" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(29);" class="listitem">银行保险</a>
          <div id="classlist29" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(30);" class="listitem">不当竞争</a>
          <div id="classlist30" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(31);" class="listitem">经济仲裁</a>
          <div id="classlist31" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(32);" class="listitem">网络法律</a>
          <div id="classlist32" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(33);" class="listitem">招标投标</a>
          <div id="classlist33" class="nonedd"></div>
        </li>
      </ul>
      <div class="cboth"></div>
    </div>
    <div class="borderdark listbody3">
      <ul>
        <div class="listtitle">刑事行政法类法律律师</div>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(34);" class="listitem">取保候审</a>
          <div id="classlist34" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(35);" class="listitem">刑事辩护</a>
          <div id="classlist35" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(36);" class="listitem">刑事自诉</a>
          <div id="classlist36" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(37);" class="listitem">行政复议</a>
          <div id="classlist37" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(38);" class="listitem">行政诉讼</a>
          <div id="classlist38" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(39);" class="listitem">国家赔偿</a>
          <div id="classlist39" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(40);" class="listitem">工商税务</a>
          <div id="classlist40" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(41);" class="listitem">海关商检</a>
          <div id="classlist41" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(42);" class="listitem">公安国安</a>
          <div id="classlist42" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(66);" class="listitem">财税</a>
          <div id="classlist66" class="nonedd"></div>
        </li>
      </ul>
      <div class="cboth"></div>
    </div>
    <div class="borderdark listbody3">
      <ul>
        <div class="listtitle">公司专项法律类律师</div>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(51);" class="listitem">公司并购</a>
          <div id="classlist51" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(52);" class="listitem">股份转让</a>
          <div id="classlist52" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(53);" class="listitem">企业改制</a>
          <div id="classlist53" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(54);" class="listitem">公司清算</a>
          <div id="classlist54" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(55);" class="listitem">破产解散</a>
          <div id="classlist55" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(56);" class="listitem">资产拍卖</a>
          <div id="classlist56" class="nonedd"></div>
        </li>
      </ul>
      <div class="cboth"></div>
    </div>
    <div class="borderdark listbody3">
      <div class="listtitle">其他非讼法律类律师</div>
      <ul>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(57);" class="listitem">工商查询</a>
          <div id="classlist57" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(58);" class="listitem">资信调查</a>
          <div id="classlist58" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(59);" class="listitem">合同审查</a>
          <div id="classlist59" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(60);" class="listitem">调解谈判</a>
          <div id="classlist60" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(61);" class="listitem">常年顾问</a>
          <div id="classlist61" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(62);" class="listitem">私人律师</a>
          <div id="classlist62" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(63);" class="listitem">文书代理</a>
          <div id="classlist63" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(64);" class="listitem">移民留学</a>
          <div id="classlist64" class="nonedd"></div>
        </li>
        <li><a href="javascript:vodi(0)" onmouseover="loadContent(65);" class="listitem">商帐追收</a>
          <div id="classlist65" class="nonedd"></div>
        </li>
      </ul>
      <div class="cboth"></div>
    </div>
  </div>
  <!--right-->
  <div class="right f_r">
    <div class="riii">
      <p class="lineheight22 padding_top_10">中顾咨询之星版块全新改版！ 资源整合，让优秀律师脱颖而出，获得更多展示机会，快来参见吧！</p>
      <p class="margin_top_14">&nbsp;</p>
      <p class="m99"><span><img src="/images/sra.gif" width="14" height="15" /></span><a href="#">如何成为专长之星？</a></p>
      <p class="m99 margin_top_10"><span><img src="/images/srb.gif" width="14" height="15" /></span><a href="#">如何成为回复之星？</a></p>
      <p class="m99 margin_top_10"><span><img src="/images/src.gif" width="14" height="15" /></span><a href="#">申请成为律师版主>></a></p>
    </div>
    <!--righttwo-->
    <div class="righthead borderdark margin_top_10 ft14 ftb padding_left_10">回复之星</div>
    <div class="rightbodyi borderdark">
      <?php
            // print_r($hf_zhixing);
            if( is_array($hf_zhixing) ) {
                ?>
      <div class="starf">
        <div class="img"><a href="<?php echo $hf_zhixing[0]['url'] ;?>" target="_blank"><img src="<?php echo $hf_zhixing[0]['userpic'] ;?>" width="77" height="97" /></a></div>
        <p>姓名：<a href="<?php echo $hf_zhixing[0]['url'] ;?>" target="_blank"><?php echo $hf_zhixing[0]['truename'] ;?>律师</a></p>
        <p>电话：<?php echo $hf_zhixing[0]['mobile'] ;?></p>
        <p>专长：<?php echo $hf_zhixing[0]['spec'] ;?></p>
        <p>地区：<?php echo $this->pname;?> <?php echo $this->cname;?></p>
      </div>
      <div class="zbt1 ft14 ftb ftwhite "><a href="<?php echo $hf_zhixing[0]['askme'] ;?>" target="_blank"><font color="#ffffff"> 立即向里<?php echo $hf_zhixing[0]['truename'] ;?>律师咨询</font></a></div>
      <?php
            }
            ?>
      <!--精彩回复-->
      <div class="jhead margin_top_10"><span>精彩回复</span></div>
      <div class="jbody">
        <ul>
          <?php
                    foreach($hf_zhixing_hflist as $k=>$v) {
                        ?>
          <li><a href="<?php echo  AskTool::Question_GetUrl($v->question->ID);?>" target="_blank"><?php echo AskTool::str_cut($v->question->title,28)?></a></li>
          <?php
                    }
                    ?>
        </ul>
      </div>
      <!--精彩回复-->
      <div class="jhead margin_top_10"><span>用户评价</span></div>
      <div class="jbody">
        <ul>
          <?php
                    foreach($hf_zhixing_commentlist as $k=>$v) {
                        ?>
          <li><a href="<?php echo  AskTool::Question_GetUrl($v->qid);?>" target="_blank"><?php echo AskTool::str_cut($v->comment,100)?></a></li>
          <?php
                    }
                    ?>
        </ul>
      </div>
    </div>
    <!--rightthree-->
    <div class="righthead borderdark margin_top_10 ft14 ftb padding_left_10 orange"><?php echo $this->cname;?>地区咨询版主</div>
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
<?php 
function getonelvshi($flag,$arrhotzc,$lsarray,$oaskclass,$isdisply) {
    $dispycss="style='display:none'";
    if ($isdisply==1) $dispycss="style='display:block'";
    ?>
<div class="borderdark listbody4"  <?php echo $dispycss;?> id="tlists<?php echo $flag;?>">
  <div class="zxxi">
    <p><a href="<?php echo $lsarray[$arrhotzc[$flag]]['lsurl']?>" target="_blank"><img src="<?php echo  $lsarray[$arrhotzc[$flag]]['userpic'];?>" width="77" height="97" /></a></p>
    <p><a href="<?php echo $lsarray[$arrhotzc[$flag]]['lsaskurl']?>" target="_blank"><img src="/images/onebtn.jpg" width="77" height="17" /></a></p>
  </div>
  <div class="zxxt">
    <p><a href="<?php echo $lsarray[$arrhotzc[$flag]]['lsurl']?>" target="_blank"  class="rlink ftb"><?php echo  $lsarray[$arrhotzc[$flag]]['truename'];?>律师</a>&nbsp;
      <?php
                if( $lsarray[$arrhotzc[$flag]]['vipyear']>0) {
                    ?>
      <img src="http://img.9ask.cn/souask/images/cxlft<?php echo  $lsarray[$arrhotzc[$flag]]['vipyear'];?>.gif" width="120" height="34" />
      <?php
                }
                ?>
    </p>
    <p>地区：<?php echo  $lsarray[$arrhotzc[$flag]]['address'];?>&nbsp;&nbsp;|&nbsp;&nbsp;执业机构：<?php echo  $lsarray[$arrhotzc[$flag]]['work'];?></p>
    <p>电话：<?php echo  $lsarray[$arrhotzc[$flag]]['mobile'];?>&nbsp;&nbsp;|&nbsp;&nbsp;QQ号:<?php echo  $lsarray[$arrhotzc[$flag]]['qq'];?></p>
    <p>获选专长：<?php echo $oaskclass[$arrhotzc[$flag]]?>&nbsp;&nbsp;|回复数量：<?php echo  $lsarray[$arrhotzc[$flag]]['num'] ;?>条&nbsp;&nbsp;|&nbsp;&nbsp;用户留言： <?php echo  $lsarray[$arrhotzc[$flag]]['bestnum']?>条 </p>
  </div>
</div>
<?php
}
?>
<script language="javascript">
    function tabhiddenall(i)
    {  
        jishu=parseInt(i/4)
        kaishi=4*jishu;


        for(var i=kaishi;i<kaishi+4;i++)
        {
            document.getElementById('tlists'+i).style.display='none';
            document.getElementById('tabs'+i).className='ooo ft14';//oov ft14 ftb
        }
    }
    function showtab(i)
    {   tabhiddenall(i);
        document.getElementById('tlists'+i).style.display='';
        document.getElementById('tabs'+i).className='oov ft14 ftb';

    }
    function loadContent(fenleiid){
        hiddenall();//隐藏所有
        var uri = "<?php echo url('askstar/getonedatajson')?>";
        var id = "classlist" + fenleiid;
        $("#"+id).html("加载中...");
        $("#"+id).load(uri, {fenleiid: fenleiid});
        $("#"+id).css("display","block");
		$("#"+id).css("z-index","99999");		
		$("#"+id).css("position","absolute");	
		$("#"+id).css("margin-top","15");	
		$("#"+id).css("margin-left","-65");			
		$('#'+id).css("background-color","#FFF");
		
    }
    function hiddenall()
    {
        $(".nonedd").css("display","none");
    }
</script>
