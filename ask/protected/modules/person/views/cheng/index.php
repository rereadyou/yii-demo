<!--right-->
	<div class="right">
		 <?php
                //个人站导航面包屑
                 $this->widget('Personnalnav',array('provinceid'=>$this->module->user->prov->pNameID,'cnameid'=>$this->module->user->city->cnameID,'lslink'=>$this->module->user->TrueName));
                ?>
		<div class="cxpoint">
			第<?php echo AskTool::num2char($get_yearnum) ;?>年&nbsp;诚信指数：<?php echo $get_jifen ;?>
		</div>
		<!--身份认证-->
		<div class="sfrz margin_top_10">
				<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="datatable">
						<tr>
								<td width="600"><table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr class="datatable">
												<td width="13%" class="ftb">律师姓名：</td>
												<td width="33%"><?php echo $this->module->user->TrueName;?></td>
												<td width="14%" class="ftb">所在地区：</td>
												<td width="40%"><?php echo $this->module->user->prov->pname;?> <?php echo $this->module->user->city->cname;?></td>
										</tr>
										<tr class="datatable">
												<td class="ftb">执业证号：</td>
												<td><?php echo $this->module->user->Code;?></td>
												<td class="ftb">执业机构：</td>
												<td><?php echo $this->module->user->work->WorkName;?></td>
										</tr>
										<tr class="datatable">
												<td class="ftb">联系电话：</td>
												<td><?php echo $this->module->user->Phone;?></td>
												<td class="ftb">手机：</td>
												<td><?php echo $this->module->user->mobile;?></td>
										</tr>
										<tr class="datatable">
												<td class="ftb">电子邮件：</td>
												<td><?php echo $this->module->user->email;?></td>
												<td class="ftb">联系地址：</td>
												<td><?php echo $this->module->user->Address;?></td>
										</tr>
										</table></td>
						</tr>
						<tr>
								<td height="28"><table width="600" border="0" cellspacing="0" cellpadding="0">
										<tr>
												<td width="232"><img src="/images_2/cda.gif" width="144" height="25" /></td>
                                                                                                <td width="358"><a href="http://www.9ask.cn/usersite/user_pass.asp?userid=<?php echo $this->module->user->ID; ?>" target="_blank" class="rlink">查看证书</a></td>
										</tr>
								</table></td>
								</tr>
						<tr>
								<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
												<td width="24%" class="ftb">诚信律师身份认证：</td>
												<td width="16%" class="ftb ftred"><?php echo $get_score;?>分</td>
												<td width="60%">经过<?php echo $allprov[$this->module->user->pnameid]?>律师协会认证</td>
										</tr>
										<tr>
												<td class="ftb">诚信律法通年限：</td>
												<td class="ftb ftred"><?php echo $get_yearnum?>年</td>
												<td>使用诚信律法通已达<?php echo $get_yearnum?>年</td>
										</tr>
										<tr>
												<td class="ftb">用户评价：</td>
												<td class="ftb ftred"><?php echo $get_usercomment?>分</td>
												<td>最佳回复：<?php echo $get_bestanswersnum?>个</td>
										</tr>
										<tr>
												<td class="ftb">资质证书：</td>
												<td class="ftb ftred"><?php echo $get_certscore?>分</td>
                                                                                                <td><a href="http://www.9ask.cn/usersite/zizhi.asp?type=1&userid=<?php echo $this->module->user->ID; ?>" target="_blank">资格证书</a><?php echo $get_certpic[1];?>张，<a href="http://www.9ask.cn/usersite/zizhi.asp?type=2&userid=<?php echo $this->module->user->ID; ?>" target="_blank">学历证书</a><?php echo $get_certpic[2];?>张，<a href="http://www.9ask.cn/usersite/zizhi.asp?type=3&userid=<?php echo $this->module->user->ID; ?>" target="_blank">荣誉证书</a><?php echo $get_certpic[3];?>张，<a href="http://www.9ask.cn/usersite/zizhi.asp?type=4&userid=<?php echo $this->module->user->ID; ?>" target="_blank">其它</a><?php echo $get_certpic[4];?>张</td>
										</tr>
										<tr>
												<td class="ftb">诚信值（总分）：</td>
												<td class="ftb ftred"><?php echo $get_jifen?>分</td>
												<td>&nbsp;</td>
										</tr>
								</table></td>
						</tr>
						</table>
		</div>
		<!--用户评价-->
		<?php 
			$this->widget('vipping',array('name'=>$this->module->user->name,'id'=>$this->module->user->ID));
		?>
		<div class="borderdark userdis margin_top_10">
			<div class="chead">用户对律师的评价</div>
			<ul>
			<?php 
				foreach ($mys as $k=>$v){
			?>
				<li>	
					<span class="lightgrey"><?php echo $v->sendtime;?></span><br>
					<?php echo CHtml::link($v->title,url("zixun/show",array('id'=>$v->ID)),array('target'=>'_blank'));?>
				</li>
			<?php 
				}
			?>	
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