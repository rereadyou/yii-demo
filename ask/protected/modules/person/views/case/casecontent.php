<!--right-->
	<div class="right">
		 <?php
                //个人站导航面包屑
                 $this->widget('Personnalnav',array('provinceid'=>$this->module->user->prov->pNameID,'cnameid'=>$this->module->user->city->cnameID,'lslink'=>$this->module->user->TrueName));
                ?>
		<!--一对一咨询--><!--咨询列表-->
		<div class="borderdark margin_top_10">
			<div class="chead">
				<div class="f_l"><?php echo $model->title;?></div>
				
			</div>
			<div class="listbox">
					&nbsp;&nbsp;<?php echo $model->content;?>
			</div>
			<!--pager-->
			<div class="listfoot margin_top_10">
				<?php 
				$this->widget('CLinkPager',array('pages'=>$pages));
				?>
			</div>
		</div>
	</div>
	<div class="cboth"></div>
</div>