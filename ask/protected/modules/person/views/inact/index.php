<!--right-->
	<div class="right">
		      <?php
                //个人站导航面包屑
                 $this->widget('Personnalnav',array('provinceid'=>$this->module->user->prov->pNameID,'cnameid'=>$this->module->user->city->cnameID,'lslink'=>$this->module->user->TrueName));
                ?>
		<!--身份认证--><!--用户评价-->
		<?php 
			$this->widget('vipping',array('name'=>$this->module->user->name,'id'=>$this->module->user->ID));
		?>
		<!--提示信息-->
		<div class="altblue margin_top_10">
			您还需要赚取5624积分，便可进入"积分风云榜"行列。<a href="http://www.9ask.cn/souask/help.asp#如何获得积分" target="_blank"><img src="/images_2/zjf.gif" width="87" height="23" /></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.9ask.cn/souask/help.asp#如何获得积分" target="_blank">如何赚取积分？</a>
		</div>
		<!--排行榜-->
		<div class="right margin_top_10">
			<div class="borderdark pwidth f_l">
				<div class="chead">本周回复数量排行榜</div>
				<ul>
				 <?php foreach ($city_reply as $k=>$v) {?>
					<li>
						<div class="n1"><?php echo $k+1; ?></div>
						<div class="n2"><?php echo $v[truename];?>律师</div>
						<div class="n3"><?php echo $cnameArr[$v['cname']];?></div>
						<div class="n4"><?php echo $v[jifen];?></div>
					</li>
					<?php } ?>
				</ul>	
				<div class="m0"><a href="http://ask.9ask.cn/paihangbang/area/cnameid/<?php echo $_COOKIE['cnameid']?>" target="_blank">查看更多律师回复数量>></a></div>
			</div>
			<div class="borderdark pwidth f_r">
				<div class="chead">本周采纳数量排行榜</div>
				<ul>
					 <?php foreach ($city_best as $k=>$v) {?>
					<li>
						<div class="n1"><?php echo $k+1; ?></div>
						<div class="n2"><?php echo $v[truename];?>律师</div>
						<div class="n3"><?php echo $cnameArr[$v['cname']];?></div>
						<div class="n4"><?php echo $v[jifen];?></div>
					</li>
					<?php } ?>
					
				</ul>
				<div class="m0"><a href="http://ask.9ask.cn/paihangbang/area" target="_blank">查看更多律师采纳数量>></a></div>
			</div>
		</div>
		<div class="right margin_top_10">
			<div class="borderdark pwidth f_l">
				<div class="chead">本周好评数量排行榜</div>
				<ul>
					 <?php foreach ($city_comment as $k=>$v) {?>
					<li>
						<div class="n1"><?php echo $k+1; ?></div>
						<div class="n2"><?php echo $v[truename];?>律师</div>
						<div class="n3"><?php echo $cnameArr[$v['cname']];?></div>
						<div class="n4"><?php echo $v[jifen];?></div>
					</li>
					<?php } ?>
				</ul>
				<div class="m0"><a href="http://ask.9ask.cn/paihangbang/jifen" target="_blank">查看更多律师好评数量>></a></div>
			</div>
			<div class="borderdark pwidth2 f_r">
				<div class="chead">网站公告</div>
				<ul>
                                    <?php
                                    //$gonggao
                                foreach ($gonggao as $k=>$v) {
                                 echo "<li><a href='http://www.9ask.cn/souask/gonggao.asp?id={$v->ID}' target=_blank >{$v->title}</a></li>";

                                }
                                    ?>
					 
				</ul>
			</div>
		</div>
	</div>
	<div class="cboth"></div>
</div>