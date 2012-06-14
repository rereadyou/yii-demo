                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <div class="dshd_cd">
                            <div class="bolck10"></div>
                            <div style="text-align:left; line-height:25px; font-size:13px; font-weight:bold; padding-left:5px;">按回复咨询数量排行</div>
                            <div style="float:left;"><img src="/css/paihangbang/images/annishuzi_23.gif" width="18" height="124" /></div>
                            <div class=" ph_c2">
							<ul>
								<?php foreach ($pc_reply as $v){
									echo "<li>
											<div class='q1'>$v[truename]律师</div>
											<div class='q2'>".$pnameArr[$v['pname']].$cnameArr[$v['cname']]."</div>
											<div class='q3'>$v[jifen]分</div>
										</li>"; 
								}
								
								?>
							</ul>
						</div>
                            </div>
                            <div class="dshd_cd">
                            <div class="bolck10"></div>
                            <div style="text-align:left; line-height:25px; font-size:13px; font-weight:bold; padding-left:5px;">按回复被采纳数量排行</div>
                            <div style="float:left;"><img src="/css/paihangbang/images/annishuzi_23.gif" width="18" height="124" /></div>
                            <div class="ph_c2">
							<ul>
								<?php foreach ($pc_best as $v){
									echo "<li>
											<div class='q1'>$v[truename]律师</div>
											<div class='q2'>".$pnameArr[$v['pname']].$cnameArr[$v['cname']]."</div>
											<div class='q3'>$v[jifen]分</div>
										</li>"; 
								}
								
								?>
							</ul>
						</div>
                            </div>
                            <div class="dshd_cdd">
                            <div class="bolck10"></div>
                            <div style="text-align:left; line-height:25px; font-size:13px; font-weight:bold; padding-left:5px;">按回复获好评数量排行</div>
                            <div style="float:left;"><img src="/css/paihangbang/images/annishuzi_23.gif" width="18" height="124" /></div>
                            <div class=" ph_c2">
							<ul>
								<?php foreach ($pc_comment as $v){
									echo "<li>
											<div class='q1'>$v[truename]律师</div>
											<div class='q2'>".$pnameArr[$v['pname']].$cnameArr[$v['cname']]."</div>
											<div class='q3'>$v[jifen]分</div>
										</li>"; 
								}
								
								?>
							</ul>
							</div>
	                      </div>
          
                   
                   