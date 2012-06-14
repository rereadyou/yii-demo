<!--用户对律师的评价-->
		<div class="borderdark userdis margin_top_10">
			<div class="chead">用户对律师的评价</div>
			<ul>
				<?php foreach($bcontents as $v){?>
						<li>	
					<span class="lightgrey"><?php echo date('Y-m-d H:i:s',strtotime($v->BDatetime));?></span><br>
					<?php echo $v->BContent;?>
				</li>
				<?php }?>
			</ul>
		</div>