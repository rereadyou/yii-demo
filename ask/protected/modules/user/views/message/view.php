<div class="ma_lsb">
<div class="ma_lysb_tob">
	<div class="zti_a"><span class="ma_zt">个人资料管理</span> >>  咨询详细页</div>
</div>
<form name="form1_msg" id="form1_msg" method="post" action="index.php?r=user/message/SaveAnswerMessage&id=<?php echo $questions->ID;?>">
  <div class="ma_lysb_ma">
  <div class="bolck10"></div>
  <div class="ydy_a" style="text-align:left;">
		<div class="ydy_bk">
			<div class="ydy_dbk" >
			<div class="xinjia">问题咨询区</div>
                        <div class="xinj">[<?php echo $pnames[$questions->oaskuser->pnameid]?>-<?php echo $cnames[$questions->oaskuser->cnameid]?>-]提问时间：<?php echo  $questions->AddDate?></div>
			</div>
			
		  <div class="ydy_xbmr">
			<div class="ydy_xk" style="font-size:13px; font-weight:bold;"><?php echo $questions->Title ?></div>
			<div>    <?php echo $questions->Content ?>   </div>
			<div class="ydy_xbk"><a href="#">13767086131</a> 	<a href="#">【咨询我】</a> <a href="#">申请此位置</a> 	</div>
			<div class="bolck10"></div>
			<div class="ydy_xk"></div>
			<div class="bolck10"></div>
			<div style="height:35px;">
		   <div class="xyynr">
                       <?php
                       if (empty ($arrprv['id']))
                           {
                           echo "<li>没有了</li>";
                           }
                           else
                            {
                              echo "<li>下一条：<a href='".url('user/message/view',array('id'=>$arrprv['id'],'class'=>$_GET['class']))."'> " . $arrprv['Title'] ."</a></li>";
                            }
                       ?>
                     

                   </div>
			<div class="xyynr">
                                 <?php
                       if (empty ($arrnext['id']))
                           {
                           echo "<li>没有了</li>";
                           }
                           else
                            {
                              echo "<li>上一条：<a href='".url('user/message/view',array('id'=>$arrnext['id'],'class'=>$_GET['class']))."'> " .  $arrnext['Title'] ."</a></li>";
                            }
                       ?>


                        </div>
			</div>
			</div>

		</div>
	</div>

	<div class="ydy_a">
	    <?//如果不是律师，隐藏回复窗口
       if(UserTool::user()->getUserClassID()!=1)
               {
       ?>
		<div class="ydy_bk" style=" text-align:left;">
			<div class="ydy_dbk">问题咨询区</div>
   
		  <div class="ydy_xbmr">
		    <textarea name="Content" cols="" rows="" class="ydy_bk2"></textarea>
            <input name="FatherID" type="hidden" size="5" value="<?php echo $questions->ID?>">
           <input name="SenderID" type="hidden" size="5" value="<?php echo $questions->oaskuser->ID?>">
		  </div>

		<div class="bolck10"></div>
      
		</div>
		<div class="bolck10"></div>
		<div class="bolck10"></div>
		<div style="text-align:center;"><input type="image"  src="/images/user/xk_03.gif" border="0" /><a href="javascript:void(0)" onclick="document.getElementById('form1_msg').reset()" ><img src="/images/user/xk_04.gif" /></a></div>
		   <div class="bolck10"></div>
		                 <?
               }
       ?>
		   <div class="bolck10"></div>
		   <div class="ydy_a" style="text-align:left;">
		<div class="ydy_bk">
			<div class="ydy_dbk">问题回复区</div>
				 <?php
 foreach($questions_answer as $k=>$v){
 ?>
		    <div class="ydy_xbmr">
			<div class="ydy_xk" style="font-size:13px; font-weight:bold;"><?php echo (empty ($v->oaskuser->TrueName))?"暂无姓名":$v->oaskuser->TrueName?>回复</div>
			<div>    <?php echo  $v->Content ?> <br/>
        <br/> 
			回复时间： <?php echo $v->ReplyDate?>     </div>

			<div class="bolck10"></div>
			<div style="border-bottom:1px #ecebeb solid;"></div>
			<div class="bolck10"></div>
		  </div>
		        <?php
 }

?>

		</div>
	</div>
	</div>
	
	
  </div>

  <div><img  src="/images/user/lbnr_09.gif" /></div>
  </form>
</div>


