<!--right-->
	<div class="right">
	       <?php
                //个人站导航面包屑
                 $this->widget('Personnalnav',array('provinceid'=>$this->module->user->prov->pNameID,'cnameid'=>$this->module->user->city->cnameID,'lslink'=>$this->module->user->TrueName));
                ?>
		<!--一对一咨询-->
		<div class="borderdark margin_top_10">
			<div class="chead">案源中心</div>
			<div class="padding_10 lineheight22 selarea">
					选择地区：
					<?php 
						foreach ($ps as $k=>$v){
							echo CHtml::link($v->pname,url('person/wt/index',array('pnameid'=>$v->pNameID,'name'=>$this->module->user->name)));
							echo '&nbsp;';   
						}
					?>
			</div>
			<table border="0" cellpadding="0" cellspacing="1" class="listtable">
					<thead>
							<tr>
									<td width="9%" class="ititle">地区</td>
									<td width="38%" class="ititle">案件委托标题</td>
									<td width="8%" class="readcount">涉案金额</td>
									<td width="9%" class="pointers">接洽状态</td>
									<td width="4%" class="answers">接洽</td>
									<td width="15%" class="times">发布时间</td>
									<td width="9%" class="times">我要接洽</td>
							</tr>
					</thead>
					<tbody>
					<?php foreach ($wts as $k=>$v){?>
							<tr>
									<td><?php echo $v->provice->pname;?></td>
									<td><?php echo CHtml::link($v->title);?></td>
									<td align="center"><?php echo $v->jine ? $v->jine : '未知';?></td>
									<td align="center">接洽中</td>
									<td align="center">5</td>
									<td align="center"><?php echo date('Y-m-d H:i',strtotime($v->addDate));?></td>
									<td align="center"><a  target="_blank" href="http://www.9ask.cn/entrust/<?php echo $v->wtID;?>">我要接洽</a></td>
							</tr>
					<?php 
					}
					?>		
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