<div class="selecttypebox" style="display: none;left:260px;">
		<div class="parentitembox">
			分类：
			<?php 
				foreach($this->parents as $v){
					echo '<span><a href="'.$v['ID'].'" text ="'.$v['topic'].'">'.$v['topic'].'</a></span>';
				}
			?>
		</div>
		<input type="hidden" name="father" id="father" value="<?php echo $this->parents[0]['ID']?>" text="<?php echo $this->parents[0]['topic']?>" />
		<div class="subitembox">
			<?php 
				foreach($this->son as $kk=>$vv){
					echo '<span><a href="'.$vv['ID'].'" text="'.$v['topic'].'">'.$vv['topic'].'</a></span>';		
				}
			?>
		</div>
		<input type="hidden" name="son" id="son" value="" text="" />	
</div>
	<div class="messagebox" style="display: none">
		<div class="co"></div>
		<p class="tith">问题分类</p>
		<p class="tith2">问题的分类，优先根据咨询标题的关键词自动匹配，要更加精确，同时加上人工修改</p>
	</div>
	<div class="seltype"><img src="/images/seltype.gif" width="91" height="30" /></div>
	<input name="category"  id="category" type="text" class="input_3" readonly="readonly"/>


<script>
$(function(){
	$("div.seltype > img").bind('click',function(){
		$('div.selecttypebox').toggle();
	});


	$("div.parentitembox a").bind('click',function(){
		var url = '<?php  echo url("{$this->controller->id}/category");?>';
		$('#father').val($(this).attr('href'));
		$('#father').attr('text',$(this).attr('text'));
		$('#son').val('');
		$('#son').attr('text','');
		
		$.get(url,{id:$(this).attr('href')},function(data){
			$('div.subitembox').html(data);
		})
		return false;
	});

	$("div.subitembox a").live('click',function(){
		var uri = $(this).attr('href');
		if(uri.indexOf('/') != -1)uri = uri.substring(uri.lastIndexOf('/') +1);
		$('#son').val(uri);
		$('#son').attr('text',$(this).attr('text'));
		$('#category').val($('#father').attr('text')+','+$('#son').attr('text'));
		$('div.selecttypebox').hide();
		return false;
		
	});
	
});
</script>