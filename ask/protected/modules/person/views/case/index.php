<!--right-->
	<div class="right">
		 <?php
                //个人站导航面包屑
                 $this->widget('Personnalnav',array('provinceid'=>$this->module->user->prov->pNameID,'cnameid'=>$this->module->user->city->cnameID,'lslink'=>$this->module->user->TrueName));
                ?>
		<!--一对一咨询--><!--咨询列表-->
		<div class="borderdark margin_top_10">
			<div class="chead">
				<div class="f_l">成功案例</div>
				<div class="<?php if(!app()->user->isGuest && app()->user->name == $this->module->user->name){?>rebutton<?php } ?> f_r margin_right_7">
	<?php if(!app()->user->isGuest && app()->user->name == $this->module->user->name){?>			
	<a href="<?php echo url('person/case/addarticle',array('name'=>$this->module->user->name,'id'=>$this->module->user->ID,'height'=>480,'width'=>750));?>" class="thickbox" title="添加案例">
	添加</a>
	<?php }?>
	</div>
			</div>
			<div class="listbox">
					<ul>
					<?php foreach ($articles as $k=>$v){?>
					<li>
						<div class="f_l"><a href="<?php echo url('person/case/showarticle',array('aid'=>$v->id,'name'=>$this->module->user->name,'id'=>$this->module->user->ID));?>"><?php echo $v->title;?></a></div>
						<div class="<?php if(!app()->user->isGuest && app()->user->name == $this->module->user->name){?>rebutton2<?php }?> f_l margin_right_7">
						<?php if(!app()->user->isGuest && app()->user->name == $this->module->user->name){?>
						<a href="<?php echo url('person/case/editarticle',array('aid'=>$v->id,'name'=>$this->module->user->name,'id'=>$this->module->user->ID,'height'=>480,'width'=>750));?>" class="thickbox" title="修改案例">
						修改</a>
						<?php }?>
						</div>
						<div class="<?php if(!app()->user->isGuest && app()->user->name == $this->module->user->name){?>rebutton3<?php }?> f_l margin_right_7">
						<?php if(!app()->user->isGuest && app()->user->name == $this->module->user->name){?>
						<a href="<?php echo url('person/case/delarticle',array('name'=>$this->module->user->name,'id'=>$this->module->user->ID,'aid'=>$v->id));?>" 
						onclick="if(confirm('确定要删除?')){ return true;}else{return false;}">删除
						</a>
						<?php }?>
						</div>
					</li>
					<?php }?>
				</ul>
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