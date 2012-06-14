<style>
#marquee1 {width:560px; height:90px;overflow:hidden;}
#marquee1 ul li {float:left;padding:0px 0px;}
#marquee1 ul li img {display:block;}
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
			<a href="<?php echo url('person/vipedit/EditJianjie',array('name'=>$this->module->user->name,'id'=>$this->module->user->ID,'height'=>520,'width'=>750));?>" class="thickbox" title="我的专长">
			<img src="/images_2/rep.gif"/>
			</a>
			<?php
                        }


                           ?>
                            <a href="<?php echo url('person/default/jianjie',array('name'=>$this->module->user->name));?>" class="e16">[查看详细介绍]</a>
                            <?
                          
                        ?>
			</div>
                    <div class="lstext margin_left_7"  style="height:250px; overflow: hidden">
				&nbsp;&nbsp;
				<?php 
					echo AskTool:: $this->module->user->jianjie ;
				?>
			</div>
			<!--<div class="margin_top_14 t_right"><a href="<?php echo url('person/default/jianjie',array('name'=>$this->module->user->name));?>" class="e16">[查看详细介绍]</a></div>
                    -->
		</div>
		<!--荣誉-->
		<div class="credit borderdark margin_top_10">
			<div class="last" id="goL"></div>
			<div class="next" id="goR"></div>
			<div class="chead">
				<div class="f_l">荣誉及证书</div>
				<div class="f_r margin_right_7">
			<?php if(!app()->user->isGuest && app()->user->name == $this->module->user->name){?>	
			<a href="<?php echo url('person/vipedit/Editphoto',array('name'=>$this->module->user->name,'id'=>$this->module->user->ID,'height'=>420,'width'=>750));?>" class="thickbox" title="我的专长">
			<img src="/images_2/rep.gif"/>
			</a>
			<?php }?>	
				</div>
			</div>
			<div class="rbody">
				<div  id="marquee1">
				<ul>
					<?php foreach($certs as $v){?>
					<li><img src="<?php echo param('certpic').'/'.$v->Certpic;?>" width="130" height="90" /></li>
					<?php }?>
				</ul>
				</div>
			</div>
		</div>
		<!--咨询列表-->
		<div class="borderdark list margin_top_10">
			<div class="chead">咨询列表</div>
			<div class="listhead">
				<ul>
					<li class="over ca">公开解答的问题</li>
					<li class="cb">一对一解答的问题</li>
				</ul>
			</div>
			<div class="ca listbox">
				<ul>
					
					<?php foreach ($public as $v){?>
					<li>
						<span  class="ftred">[问题]</span><?php echo $v->question->title;?><br />
						[我的回复]<?php echo $v->content;?>
					</li>
					<?php }?>


				</ul>
			</div>
			
			<div class="cb listbox" style="display:none;">
				<ul>
					<?php  foreach ($ones as $k=>$v){?>
					<li>
						<span  class="ftred">[问题]</span><?php echo $v->selfq->Title;?><br />
						[我的回复]<?php echo $v->Content;?>。
					</li>
					<?php }?>
				</ul>
			</div>
		</div>
		<!--向律师在线咨询-->
		<div class="borderdark askb margin_top_10">
			<div class="chead">向律师进行在线法律咨询</div>
			<form id="form" action="<?php echo url('person/one/index',array('name'=>$this->module->user->name));?>" method="post">
			<div class="fmbox">
				<div class="line">
					<div class="f_l"><span>咨询标题：</span></div>
					<div class="f_l"><input name="title" type="text"  class="f1 borderdark"/></div>
					<div class="cboth"></div>
				</div>
				<div class="line">
					<div class="f_l"><span>咨询内容：</span></div>
					<div class="f_l"><textarea name="content" cols="" rows="" class="f2 borderdark"></textarea></div>
					<div class="cboth"></div>
				</div>
				<div class="line">
					<div class="f_l"><span>联系电话：</span></div>
					<div class="f_l"><input name="phone" type="text" class="f3 borderdark"/>（请填写真实联系方式，可免费得到专业人员的解答）</div>
					<div class="cboth"></div>
				</div>
				<div class="line">
					<div class="f_l ftwhite">事件标题：</div>
					<div class="f_l">
					 <a href="#" onclick="$('#form').submit();return false;"><img src="/images_2/b1.jpg" width="83" height="27" /></a>
                                         <a  href="#" onclick="document.getElementById('form').reset();return false"><img src="/images_2/b2.jpg" width="83" height="27" /></a></div>
					<div class="cboth"></div>
				</div>
			</div>
			</form>
		</div>
		
	</div>
	<div class="cboth"></div>
</div>
<!--温馨提示-->
<div class="cwidth borderdark padding_10 altt margin_top_10">
	<?php 
		$arr = explode(',', $this->module->user->Specaility);
		$class= AskTool::OaskClass_GetClass();
	?>
	<?php echo  $this->module->user->name;?>律师提供“<?php echo $class[$arr[0]].'、'.$class[$arr[1]].'、'.$class[$arr[2]].'、'.$class[$arr[3]];?>”等法律服务。<br />
	如果您有问题可以点此咨询<a href="#" class="rlink"><?php echo  $this->module->user->name;?>律师</a>，<?php echo  $this->module->user->name;?>律师会给您的法律咨询提供解答！<br />
	您也可以拨打<?php echo  $this->module->user->name;?>律师的电话进行法律咨询，<span class="ftred ft14 ftb"><?php echo  $this->module->user->Phone;?></span>，咨询时说明来自<a href="http://www.9ask.cn" class="rlink">中顾法律网</a>。
</div>
<?php cs()->registerScriptFile(resBu('scripts/marquee.js'), CClientScript::POS_END);?>
<script>
$(function(){
	$('#marquee1').kxbdSuperMarquee({
		distance:145,
		time:3,
		btnGo:{left:'#goL',right:'#goR'},
		direction:'left'
	});
	
	$('li.ca').bind('click',function(){
			$(this).addClass('over');
			$('li.cb').removeClass('over');
			$('div.ca').show();
			$('div.cb').hide();
		});
	
	$('li.cb').bind('click',function(){
			$(this).addClass('over');
			$('li.ca').removeClass('over');
			$('div.cb').show();
			$('div.ca').hide();
	});
});

</script>