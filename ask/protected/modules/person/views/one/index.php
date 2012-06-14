<!--right-->
	<?php 
		if($_GET['success']){
			echo "<script>";
			echo "alert('发布成功')";
			echo "</script>";
		}
	?>
	<div class="right">
		      <?php
                //个人站导航面包屑
                 $this->widget('Personnalnav',array('provinceid'=>$this->module->user->prov->pNameID,'cnameid'=>$this->module->user->city->cnameID,'lslink'=>$this->module->user->TrueName));
                ?>
		<!--一对一咨询-->
		<?php $form=$this->beginWidget('CActiveForm',array('id'=>'form','action'=>url('person/one/insert',array('name'=>$this->module->user->name)))); ?>
		<div class="borderdark askb margin_top_10">
			<div class="chead">一对一咨询</div>
			<div class="fmbox">
				<div class="line lightgrey lineheight22">
					您可以向<span class="ftred"><?php echo $this->module->user->TrueName;?></span>一对一咨询，也可以电话咨询赵小赵律师，电话：<span class="ftred"><?php echo $this->module->user->mobile;?></span><br />
					(电话咨询免费，请说明来自中顾法律网，得到更仔细的回答。)
				</div>
				<div class="line">
					<div class="f_l">咨询标题：</div>
					<div class="f_l">
					 <?php echo $form->textField($model,'Title',array('class'=>'f1 ft12')); ?>
					
					</div>
					<div class="cboth"></div>
				</div>
				<div class="line">
					<div class="f_l">咨询内容：</div>
					<div class="f_l">
					<?php echo $form->textArea($model,'Content',array('class'=>'f2 ft12')); ?>
					</div>
					<div class="cboth"></div>
				</div>
				<div class="line">
					<div class="f_l">问题分类：</div>
					<div class="f_l">
						<?php 
							echo $form->dropDownList($model,'big_classid',CHtml::listData($parents, 'ID', 'topic'),array('size'=>10,'class'=>'ft12'));
						?>
						<?php 
							echo $form->dropDownList($model,'lit_classid',CHtml::listData($son, 'ID', 'topic'),array('size'=>10,'class'=>'ft12'));
						?>
					</div>
					<div class="cboth"></div>
				</div>
			<script>
				$(function(){
					$('#AskOne2Message_big_classid').change(function(){
								var url = "<?php echo url('person/one/category')?>";
								$.get(url,{id:$(this).val()},function(data){
									$('#AskOne2Message_lit_classid').html(data);
								});
							});
		
				});
			</script>	
				<div class="line">
					<div class="f_l">选择地区：</div>
					<div class="f_l">
						<?php $this->widget('modulearea',array('cnameid'=>$this->module->user->cnameid));?>
					</div>
					<div class="cboth"></div>
				</div>
				<div class="line">
					<div class="f_l">邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</div>
					<div class="f_l lineheight22">
					<input name="email" type="text"  class="f1 ft12" style="width:120px;"/>&nbsp;<span class="lightgrey">选填项</span>
					<br />
					<span class="lightgrey">请留下常用邮箱！</span>
					</div>
					<div class="cboth"></div>
				</div>
				<div class="line">
					<div class="f_l">电&nbsp;&nbsp;&nbsp;&nbsp;话：</div>
					<div class="f_l lineheight22">
					<input name="phone" type="text" value="<?php if($_POST['phone']) echo $_POST['phone'];?>" class="f1 ft12" style="width:120px;"/>&nbsp;<span class="lightgrey">选填项</span>
					<br />
					<span class="lightgrey">为了您的问题更好的解决，建议您留下真实联系方式！</span>
					</div>
					<div class="cboth"></div>
				</div>
				<div class="line">
					<div class="f_l">隐私设置：</div>
					<div class="f_l">
					<?php echo $form->checkBox($model,'baomi');?>
					&nbsp;<span class="lightgrey">保密咨询</span></div>
					<div class="cboth"></div>
				</div>
				<div class="line">
					<div class="f_l ftwhite">事件标题：</div>
					<div class="f_l">
					<input type="image" src="/images_2/b1.jpg" id="submit"/>
					
					<a  href="#" onclick="document.getElementById('form').reset();return false"><img src="/images_2/b2.jpg" width="83" height="27" /></a></div>
					<div class="cboth"></div>
				</div>
			</div>
		</div>
		<script>
$(function(){
	$('#submit').click(function(){
		var str = $('#AskOne2Message_Title').val() 
		var l = str.replace(/[^\x00-\xff]/g, 'xx').length
		if(l<4){
			alert('标题太短');
			return false;
		}


		var str = $('#AskOne2Message_Content').val() 
		var l = str.replace(/[^\x00-\xff]/g, 'xx').length
		if(l<10){
			alert('内容太短');
			return false;
		}
	});
	
});
</script>
		<?php $this->endWidget(); ?>
		<!--咨询列表-->
		<!--咨询列表-->
		<div class="borderdark list margin_top_10">
			<div class="chead">咨询列表</div>
			<div class="listhead">
				<ul>
					<li class="over ca">我回复过的咨询</li>
					<li class="cb">一对一咨询列表</li>
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
	</div>
	<div class="cboth"></div>
</div>
<script>
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
</script>