<!--right-->
	<div class="right">
		      <?php
                //个人站导航面包屑
                 $this->widget('Personnalnav',array('provinceid'=>$this->module->user->prov->pNameID,'cnameid'=>$this->module->user->city->cnameID,'lslink'=>$this->module->user->TrueName));
                ?>
		<!--一对一咨询-->
		<div class="borderdark margin_top_10">
			<div class="chead">咨询列表</div>
			<div class="listhead">
				<ul>
					<li class="over">我回复过的公开咨询</li>
					<li><a href="<?php echo url("ask/listall/jinan");?>" target="_blank">本地公开咨询</a></li>
					<li><a href="<?php echo url("ask/listall/jinan");?>" target="_blank">全国公开咨询</a></a></li>
				</ul>
			</div>
			<table border="0" cellpadding="0" cellspacing="1" class="listtable2">
					<thead>
						<tr>
								<td width="52%" class="ititle">标题</td>
								<td width="8%" class="readcount">阅读数</td>
								<td width="15%" class="pointers">回答数</td>
								<td width="12%" class="times">状态</td>
								<td width="13%" class="times">提问时间</td>
						</tr>
					</thead>
					<tbody>
					<?php 
						foreach($mys as $k=>$v){
					?>
						<tr>
							<td><a  target="_blank" href="<?php echo url("zixun/show",array('id'=>$v->question->ID));?>"><?php echo $v->question->title;?></a><img src="/images_2/xs.jpg" width="13" height="14" />
							<span class="ftred ft14"><?php echo $v->question->shang;?></span></td>
							<td align="center"><?php echo $v->question->views;?></td>
							<td align="center"><?php echo $v->question->replys;?></td>
							<td align="center"><span class="st1"><?php echo AskTool::QuestionState($v->question->jie);?></span></td>
							<td align="center"><?php echo date('Y-m-d',strtotime($v->question->BDatetime)) ;?></td>
						</tr>
					<?php 
						}?>		
					</tbody>
			</table>
		</div>
		<!--pager-->
		<div class="listfoot margin_top_10">
			<?php 
			$this->widget('CLinkPager',array('pages'=>$pages));
			?>
		</div>
	</div>
	<div class="cboth"></div>
</div>