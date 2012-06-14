<style>
#marquee1 {width:560px; height:90px;overflow:hidden;}
#marquee1 ul li {float:left;padding:0px 0px;}
#marquee1 ul li img {display:block;}
.jieshao{height:auto;}
</style>
<!--right-->
	<div class="right">
		      <?php
                //个人站导航面包屑
                 $this->widget('Personnalnav',array('provinceid'=>$this->module->user->prov->pNameID,'cnameid'=>$this->module->user->city->cnameID,'lslink'=>$this->module->user->TrueName));
                ?>
		<!--介绍-->
		<div class="borderdark  jieshao">
			<div class="jshead margin_left_7 t_right padding_right_5">
			<?php if(!app()->user->isGuest && app()->user->name == $this->module->user->name){?>
			
			<?php }?>
			</div>
			<div class="lstext margin_left_7">
				&nbsp;&nbsp;
				<?php 
					echo $this->module->user->jianjie;
				?>
			</div>
		</div>
		
		
	</div>
	<div class="cboth"></div>
</div>
<!--温馨提示-->
<div class="cwidth borderdark padding_10 altt margin_top_10">
	赵小赵律师提供“婚姻家庭、房产纠纷，民事纠纷、工程建筑”等法律服务。<br />
	如果您有问题可以点此咨询<a href="#" class="rlink">赵小赵律师</a>，赵小赵律师会给您的法律咨询提供解答！<br />
	您也可以拨打赵小赵律师的电话进行法律咨询，<span class="ftred ft14 ftb">13899955455</span>，咨询时说明来自<a href="http://www.9ask.cn" class="rlink">中顾法律网</a>效果更好。
</div>
