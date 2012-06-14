<!--内容-->
<div class="neir">
    <div class="neir_z"><img src="/css/paihangbang/images/zuij.gif" />您的位置：中顾法律网 > 律师咨询 > 咨询排行</div>
    <div class="neir_yb">
        <form id="form1" name="form1" method="post" action="<?php echo url('paihangbang/area')?>">

            <input type="text" name="search" id="search" style=" height:22px; line-height:24px; width: 110px " />
            <input type="submit" name="button" id="button" value="进入其他城市" />
            请填写地级市或直辖市，如上海、广东、深圳
        </form>
    </div>
</div>
<div class="bolck8"></div>
<div class="man">
    <div class="manz_z">
        <div><img src="/css/paihangbang/images/pah_03.gif" /></div>
        <div class="manz_d">
            <div class="manz_ds">
                <div class="bolck10"></div>
                <div class="bolck10"></div>
                <ul>
                    <li class="zt_c"><img src="/css/paihangbang/images/uij_03.gif" width="9" height="9" /> 地区排行榜</li>
                    <li><img src="/css/paihangbang/images/uij_07.gif" /></li>
                    <div class="bolck10"></div>
                    <li class="zt_d_a"><a href="<?php echo url('paihangbang/area',array('cnameid'=>$_COOKIE['cnameid']))?>"  >律师回复排行榜</a></li>
                    <li class="zt_d"><a href="<?php echo url('paihangbang/area',array('cnameid'=>$_COOKIE['cnameid'],'fenleiid'=>11))?>"  >专长回复排行榜</a></li>
                    <li class="zt_c"> <img src="/css/paihangbang/images/uij_03.gif" width="9" height="9" /> 专长排行榜</li>
                    <li><img src="/css/paihangbang/images/uij_07.gif" /></li>
                    <div class="bolck10"></div>
                    <li class="zt_d"><img src="/css/paihangbang/images/uij_11.gif" width="4" height="8" />热点专长排行榜</li>
                    <li class="zt_ds"><a href="<?php echo url('paihangbang/area',array('cnameid'=>$_COOKIE['cnameid'],'fenleiid'=>11))?>"  >婚姻家庭</a></li>
                    <li class="zt_ds"><a href="<?php echo url('paihangbang/area',array('cnameid'=>$_COOKIE['cnameid'],'fenleiid'=>35))?>"  >刑事辩护</a></li>
                    <li class="zt_ds"><a href="<?php echo url('paihangbang/area',array('cnameid'=>$_COOKIE['cnameid'],'fenleiid'=>22))?>"  >交通事故</a></li>
                    <li class="zt_ds"><a href="<?php echo url('paihangbang/area',array('cnameid'=>$_COOKIE['cnameid'],'fenleiid'=>24))?>"  >房产纠纷</a></li>
                    <li class="zt_ds"><a href="<?php echo url('paihangbang/area',array('cnameid'=>$_COOKIE['cnameid'],'fenleiid'=>16))?>"  >劳动纠纷</a></li>
                    <li class="zt_ds"><a href="<?php echo url('paihangbang/area',array('cnameid'=>$_COOKIE['cnameid'],'fenleiid'=>17))?>"  >损害赔偿</a></li>
                    <li class="zt_ds"><a href="<?php echo url('paihangbang/area',array('cnameid'=>$_COOKIE['cnameid'],'fenleiid'=>20))?>"  >债权债务</a></li>
                    <li class="zt_ds"><a href="<?php echo url('paihangbang/area',array('cnameid'=>$_COOKIE['cnameid'],'fenleiid'=>15))?>"  >合同纠纷</a></li>
                    <li class="zt_ds"><a href="<?php echo url('paihangbang/area',array('cnameid'=>$_COOKIE['cnameid'],'fenleiid'=>19))?>"  >拆迁安置</a></li>
                    <li class="zt_ds"><a href="<?php echo url('paihangbang/area',array('cnameid'=>$_COOKIE['cnameid'],'fenleiid'=>54))?>"  >公司法务</a></li>
                    <li class="zt_ds"><a href="<?php echo url('paihangbang/area',array('cnameid'=>$_COOKIE['cnameid'],'fenleiid'=>25))?>"  >知识产权</a></li>

                    <li class="zt_d"><img src="/css/paihangbang/images/uij_11.gif" width="4" height="8" /><a href="<?php echo url('paihangbang/zhuanchang',array('fenleiid'=>11))?>"  > 全国专长排行榜</a></li>
                    <li class="zt_c"><img src="/css/paihangbang/images/uij_03.gif" width="9" height="9" /><a href="<?php echo url('paihangbang/area')?>"  > 全国律师排行榜</a></li>
                    <li class="zt_c"><img src="/css/paihangbang/images/uij_03.gif" width="9" height="9" /> <a href="<?php echo url('paihangbang/jifen')?>"  >全国积分排行榜</a></li>
                    <li><img src="/css/paihangbang/images/uij_07.gif" /></li>
                    <div class="bolck10"></div>
                </ul>
            </div>
            <div><img src="/css/paihangbang/images/pah_16.gif" /></div>
        </div>
    </div>
    <div class="zmsn">
        <div class="btn_tj"><img src="/css/paihangbang/images/z_j.gif" width="196" height="40" /></div>
        <div class="hxed_a"></div>
        <div class="bolck10"></div>
        <div class="manz_yo">

            <div class="kon"></div>
            <div class="zyu">
                <div><img src="/css/paihangbang/images/pah_11.gif" /></div>
                <div class="zyu_a">
                    <div class="dsh">
                        <div class="shuj">数量排行</div>
                        <div class="diq"><?php echo $cnameArr[$cnameid]; ?></div>
                        <div class="diqsl">统计上周数据，每周系统数据自动更新</div>
                    </div>
                    <div class="dshd">
                        <div class="dshd">
                            <div class="dshd_cd">
                                <div class="bolck10"></div>
                                <div style="text-align:left; line-height:25px; font-size:13px; font-weight:bold; padding-left:5px;">按回复咨询数量排行</div>
                                <div style="float:left;"><img src="/css/paihangbang/images/annishuzi_15.gif" /></div>
                                <div class=" ph_c2">
                                    <ul>
                                        <?php foreach ($city_reply2 as $v) {
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
                                <div style="float:left;"><img src="/css/paihangbang/images/annishuzi_15.gif" /></div>
                                <div class=" ph_c2">
                                    <ul>
                                        <?php
                                        if($city_best2) {
                                            foreach ($city_best2 as $vv) {
                                                echo "<li>
												<div class='q1'>$vv[truename]律师</div>
												<div class='q2'>".$pnameArr[$vv['pname']].$cnameArr[$vv['cname']]."</div>
												<div class='q3'>$vv[jifen]分</div>
											</li>";
                                            }
                                        }

                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="dshd_cdd">
                                <div class="bolck10"></div>
                                <div style="text-align:left; line-height:25px; font-size:13px; font-weight:bold; padding-left:5px;">按回复获好评数量排行</div>
                                <div style="float:left;"><img src="/css/paihangbang/images/annishuzi_15.gif" /></div>
                                <div class=" ph_c2">
                                    <ul>
<?php foreach ($city_comment2 as $v) {
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
                        </div>
                    </div>
                </div>
                <div><img src="/css/paihangbang/images/pah_14.gif" /></div>
                <div class="bolck10"></div>
                <div class="zyu">
                    <div><img src="/css/paihangbang/images/pah_11.gif" /></div>
                    <div class="zyu_a">
                        <div class="dsh">
                            <div class="shuj">数量排行</div>
                            <div class="diq"><?php echo $pnameArr[$pnameid]; ?></div>
                            <div class="diqsl">统计上周数据，每周系统数据自动更新</div>
                        </div>
                        <div class="dshd">
                            <div class="dshd">
                                <div class="dshd_cd">
                                    <div class="bolck10"></div>
                                    <div style="text-align:left; line-height:25px; font-size:13px; font-weight:bold; padding-left:5px;">按回复咨询数量排行</div>
                                    <div style="float:left;"><img src="/css/paihangbang/images/annishuzi_15.gif" /></div>
                                    <div class="ph_c2">
                                        <ul>
<?php foreach ($prov_reply as $v) {
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
                                    <div style="float:left;"><img src="/css/paihangbang/images/annishuzi_15.gif" /></div>
                                    <div class=" ph_c2">
                                        <ul>
<?php foreach ($prov_best as $v) {
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
                                    <div style="float:left;"><img src="/css/paihangbang/images/annishuzi_15.gif" /></div>
                                    <div class=" ph_c2">
                                        <ul>
<?php foreach ($prov_comment as $v) {
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
                            </div>
                        </div>
                    </div>
                    <div><img src="/css/paihangbang/images/pah_14.gif" /></div>
                    <div class="bolck10"></div>

                </div>
            </div>
        </div>
    </div>
    <div class="bolck10"></div>
    <div class="bolck10"></div>
    <div class="manz_yo">
        <div class="kon">
            <div style=" float:left; font-weight:bold; color:#fff; line-height:35px; *line-height:30px; padding-left:350px;">热点专长:</div>
            <div class="zd"> <a href="#" target="_blank">婚姻家庭</a> 刑事辩护  合同纠纷 债权债务 公司法务<br />
                劳动纠纷 房产律师 医疗纠纷 损害赔偿 交通事故 </div>
        </div>
        <div class="btn_tj_x"><img src="/css/paihangbang/images/auij.gif" width="196" height="42" /></div>
        <div class="zyu">
            <div><img src="/css/paihangbang/images/pah_11.gif" /></div>
            <div class="zyu_a">
                <div class="dsh">
                    <div class="shuj"></div>
                    <div class="diq"></div>
                    <div class="diqsl">统计上周数据，每周系统数据自动更新</div>
                </div>
<?php
                $i = 0;
                $j = 0;
                foreach ($paihangbang as $fenleiid=>$data) {
                    $fenlei = $data[$fenleiid];
                    $fenleiName = $fenlei['topic'];
                    if ($i % 2 == 0) {
                        $city_reply = $data['city_reply'];
                        $city_bests = $data['city_best'];
                        $city_comment = $data['city_comment'];
                    }
                    ?>
                    <?php
                    if ($i %2 == 0) {
                        $strstr = "<div class='bjtup' id='list{$j}1' onmouseover=\"setTab('list$j', 1, 4);\">".$cnameArr[$cnameid]."$fenleiName</div>
                        			<div class='bjdsd' id='list{$j}2' onmouseover=\"setTab('list$j', 2, 4);loadContent('list$j', 2, $nums, $pnameid, 0, $fenleiid);\">".$pnameArr[$pnameid]."$fenleiName</div>";
                    }else {
                        $strstr .= "<div class='bjdsd' id='list{$j}3' onmouseover=\"setTab('list$j', 3, 4);loadContent('list$j', 3, $nums, 0, $cnameid, $fenleiid);\">".$cnameArr[$cnameid]."$fenleiName</div>
                        			<div class='bjdsd' id='list{$j}4' onmouseover=\"setTab('list$j', 4, 4);loadContent('list$j', 4, $nums, $pnameid, 0, $fenleiid);\">".$pnameArr[$pnameid]."$fenleiName</div>";

                        ?>
                <div class="bolck10"></div>
                <div class="bolck10"></div>
                <div class="dshtp">
        <?php echo $strstr; ?>
                </div>
                <div class="hxed_s"></div>
                <div class="bolck10"></div>

                <div class="dshd">
                    <div class="dshd"  id="con_list<?php echo $j; ?>_1">
                        <div class="dshd_cd">
                            <div class="bolck10"></div>
                            <div style="text-align:left; line-height:25px; font-size:13px; font-weight:bold; padding-left:5px;">按回复咨询数量排行</div>
                            <div style="float:left;"><img src="/css/paihangbang/images/annishuzi_23.gif" width="18" height="124" /></div>
                            <div class=" ph_c2">
                                <ul>
        <?php foreach ($city_reply as $v) {
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
        <?php
        if ($city_bests)
            {
        foreach ($city_bests as $vvv) {
                                                echo "<li>
													<div class='q1'>$vvv[truename]律师</div>
													<div class='q2'>".$pnameArr[$vvv['pname']].$cnameArr[$vvv['cname']]."</div>
													<div class='q3'>$vvv[jifen]分</div>
												</li>";
                                            }
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
        <?php foreach ($city_comment as $v) {
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
                    </div>
                </div>
                <div class="dshd" id="con_list<?php echo $j; ?>_2" style="display: none; height:173px;"></div>
                <div class="dshd" id="con_list<?php echo $j; ?>_3" style="display: none; height:173px;"></div>
                <div class="dshd" id="con_list<?php echo $j; ?>_4" style="display: none; height:173px;"></div>

        <?php
                        $j += 1;
                    }
                    $i += 1;
                    ?>
                    <?php } ?>

            </div>
            <div><img src="/css/paihangbang/images/pah_14.gif" /></div>
            <div class="bolck10"></div>
            <div class="zyu">
                <div><img src="/css/paihangbang/images/pah_11.gif" /></div>
                <div class="zyu_a">
                    <div class="dsh">
                        <div class="shuj">数量排行</div>
                        <div class="diq"><?php echo $_COOKIE['name']?></div>
                        <div class="diqsl">统计上周数据，每周系统数据自动更新</div>
                    </div>
                    <div class="bolck10"></div>
                    <div class="bolck10"></div>
                    <div class="dshtp">
                        <div class="bjtup" onMouseOver="changearea(1)" id="arar_menu1"><?php echo $_COOKIE['name']?>全部专长</div>
                        <div class="bjdsd" onMouseOver="changearea(2)" id="arar_menu2"><?php echo $_COOKIE['pname']?>全部专长</div>
                    </div>
                    <div class="hxed_s"></div>
                    <div class="bolck10"></div>
                    <div class="dshd" id="area_place1">
                        <div class="placeName bg"  >
                            <h3><a href="sortlist.asp?cid=3" >民事类法律问题</a></h3>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>11,'cnameid'=>$_COOKIE['cnameid']))?>" >婚姻家庭</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>12,'cnameid'=>$_COOKIE['cnameid']))?>" >遗产继承</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>13,'cnameid'=>$_COOKIE['cnameid']))?>" >消费维权</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>14,'cnameid'=>$_COOKIE['cnameid']))?>" >抵押担保</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>15,'cnameid'=>$_COOKIE['cnameid']))?>" >合同纠纷</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>16,'cnameid'=>$_COOKIE['cnameid']))?>" >劳动纠纷</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>17,'cnameid'=>$_COOKIE['cnameid']))?>" >人身损害</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>18,'cnameid'=>$_COOKIE['cnameid']))?>" >保险理赔</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>19,'cnameid'=>$_COOKIE['cnameid']))?>" >拆迁安置</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>20,'cnameid'=>$_COOKIE['cnameid']))?>" >债权债务</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>21,'cnameid'=>$_COOKIE['cnameid']))?>" >医疗纠纷</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>22,'cnameid'=>$_COOKIE['cnameid']))?>" >交通事故</a>
                        </div>
                        <div class="placeName">
                            <h3><a href="sortlist.asp?cid=4" >经济类法律问题</a></h3>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>23,'cnameid'=>$_COOKIE['cnameid']))?>" >工程建筑</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>24,'cnameid'=>$_COOKIE['cnameid']))?>" >房产纠纷</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>25,'cnameid'=>$_COOKIE['cnameid']))?>" >知识产权</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>26,'cnameid'=>$_COOKIE['cnameid']))?>" >合伙加盟</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>27,'cnameid'=>$_COOKIE['cnameid']))?>" >个人独资</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>28,'cnameid'=>$_COOKIE['cnameid']))?>" >金融证券</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>29,'cnameid'=>$_COOKIE['cnameid']))?>" >银行保险</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>30,'cnameid'=>$_COOKIE['cnameid']))?>" >不当竞争</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>31,'cnameid'=>$_COOKIE['cnameid']))?>" >经济仲裁</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>32,'cnameid'=>$_COOKIE['cnameid']))?>" >网络法律</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>33,'cnameid'=>$_COOKIE['cnameid']))?>" >招标投标</a>
                        </div>
                        <div class="placeName bg">
                            <h3><a href="sortlist.asp?cid=7" >刑事行政法类法律问题</a></h3>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>34,'cnameid'=>$_COOKIE['cnameid']))?>" >取保候审</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>35,'cnameid'=>$_COOKIE['cnameid']))?>" >刑事辩护</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>36,'cnameid'=>$_COOKIE['cnameid']))?>" >刑事自诉</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>37,'cnameid'=>$_COOKIE['cnameid']))?>" >行政复议</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>38,'cnameid'=>$_COOKIE['cnameid']))?>" >行政诉讼</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>39,'cnameid'=>$_COOKIE['cnameid']))?>" >国家赔偿</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>40,'cnameid'=>$_COOKIE['cnameid']))?>" >工商税务</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>41,'cnameid'=>$_COOKIE['cnameid']))?>" >海关商检</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>42,'cnameid'=>$_COOKIE['cnameid']))?>" >公安国安</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>66,'cnameid'=>$_COOKIE['cnameid']))?>" >财税</a>
                        </div>
                        <div class="placeName">
                            <h3><a href="sortlist.asp?cid=8" >涉外法律类法律问题</a></h3>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>43,'cnameid'=>$_COOKIE['cnameid']))?>" >海事海商</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>44,'cnameid'=>$_COOKIE['cnameid']))?>" >国际贸易</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>45,'cnameid'=>$_COOKIE['cnameid']))?>" >招商引资</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>46,'cnameid'=>$_COOKIE['cnameid']))?>" >外商投资</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>47,'cnameid'=>$_COOKIE['cnameid']))?>" >合资合作</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>48,'cnameid'=>$_COOKIE['cnameid']))?>" >WTO事务</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>49,'cnameid'=>$_COOKIE['cnameid']))?>" >倾销补贴</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>50,'cnameid'=>$_COOKIE['cnameid']))?>" >涉外仲裁</a>
                        </div>
                        <div class="placeName bg">
                            <h3><a href="sortlist.asp?cid=9" >公司专项法律类法律问题</a></h3>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>51,'cnameid'=>$_COOKIE['cnameid']))?>gsbg/" >公司并购</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>52,'cnameid'=>$_COOKIE['cnameid']))?>gfzr/" >股份转让</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>53,'cnameid'=>$_COOKIE['cnameid']))?>qygz/" >企业改制</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>54,'cnameid'=>$_COOKIE['cnameid']))?>gsqs/" >公司清算</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>55,'cnameid'=>$_COOKIE['cnameid']))?>pcjs/" >破产解散</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>56,'cnameid'=>$_COOKIE['cnameid']))?>zcpm/" >资产拍卖</a>
                        </div>
                        <div class="placeName">
                            <h3><a href="sortlist.asp?cid=10" >其他非讼法律类法律问题</a></h3>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>57,'cnameid'=>$_COOKIE['cnameid']))?>gscx/" >工商查询</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>58,'cnameid'=>$_COOKIE['cnameid']))?>zxdc/" >资信调查</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>59,'cnameid'=>$_COOKIE['cnameid']))?>htsc/" >合同审查</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>60,'cnameid'=>$_COOKIE['cnameid']))?>tjtp/" >调解谈判</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>61,'cnameid'=>$_COOKIE['cnameid']))?>cngw/" >常年顾问</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>62,'cnameid'=>$_COOKIE['cnameid']))?>srls/" >私人律师</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>63,'cnameid'=>$_COOKIE['cnameid']))?>wsdl/" >文书代理</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>64,'cnameid'=>$_COOKIE['cnameid']))?>ymlx/" >移民留学</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>15,'cnameid'=>$_COOKIE['cnameid']))?>szzs/" >商帐追收</a>
                        </div>

                    </div>
                    <div class="dshd" id="area_place2" style="display:none" >
                        <!--省份开始-->
                        <div class="placeName bg" >
                            <h3><a href="sortlist.asp?cid=3" >民事类法律问题</a></h3>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>11,'pnameid'=>$_COOKIE['pnameid']))?>" >婚姻家庭</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>12,'pnameid'=>$_COOKIE['pnameid']))?>" >遗产继承</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>13,'pnameid'=>$_COOKIE['pnameid']))?>" >消费维权</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>14,'pnameid'=>$_COOKIE['pnameid']))?>" >抵押担保</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>15,'pnameid'=>$_COOKIE['pnameid']))?>" >合同纠纷</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>16,'pnameid'=>$_COOKIE['pnameid']))?>" >劳动纠纷</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>17,'pnameid'=>$_COOKIE['pnameid']))?>" >人身损害</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>18,'pnameid'=>$_COOKIE['pnameid']))?>" >保险理赔</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>19,'pnameid'=>$_COOKIE['pnameid']))?>" >拆迁安置</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>20,'pnameid'=>$_COOKIE['pnameid']))?>" >债权债务</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>21,'pnameid'=>$_COOKIE['pnameid']))?>" >医疗纠纷</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>22,'pnameid'=>$_COOKIE['pnameid']))?>" >交通事故</a>
                        </div>
                        <div class="placeName">
                            <h3><a href="sortlist.asp?cid=4" >经济类法律问题</a></h3>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>23,'pnameid'=>$_COOKIE['pnameid']))?>" >工程建筑</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>24,'pnameid'=>$_COOKIE['pnameid']))?>" >房产纠纷</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>25,'pnameid'=>$_COOKIE['pnameid']))?>" >知识产权</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>26,'pnameid'=>$_COOKIE['pnameid']))?>" >合伙加盟</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>27,'pnameid'=>$_COOKIE['pnameid']))?>" >个人独资</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>28,'pnameid'=>$_COOKIE['pnameid']))?>" >金融证券</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>29,'pnameid'=>$_COOKIE['pnameid']))?>" >银行保险</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>30,'pnameid'=>$_COOKIE['pnameid']))?>" >不当竞争</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>31,'pnameid'=>$_COOKIE['pnameid']))?>" >经济仲裁</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>32,'pnameid'=>$_COOKIE['pnameid']))?>" >网络法律</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>33,'pnameid'=>$_COOKIE['pnameid']))?>" >招标投标</a>
                        </div>
                        <div class="placeName bg">
                            <h3><a href="sortlist.asp?cid=7" >刑事行政法类法律问题</a></h3>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>34,'pnameid'=>$_COOKIE['pnameid']))?>" >取保候审</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>35,'pnameid'=>$_COOKIE['pnameid']))?>" >刑事辩护</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>36,'pnameid'=>$_COOKIE['pnameid']))?>" >刑事自诉</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>37,'pnameid'=>$_COOKIE['pnameid']))?>" >行政复议</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>38,'pnameid'=>$_COOKIE['pnameid']))?>" >行政诉讼</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>39,'pnameid'=>$_COOKIE['pnameid']))?>" >国家赔偿</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>40,'pnameid'=>$_COOKIE['pnameid']))?>" >工商税务</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>41,'pnameid'=>$_COOKIE['pnameid']))?>" >海关商检</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>42,'pnameid'=>$_COOKIE['pnameid']))?>" >公安国安</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>66,'pnameid'=>$_COOKIE['pnameid']))?>" >财税</a>
                        </div>
                        <div class="placeName">
                            <h3><a href="sortlist.asp?cid=8" >涉外法律类法律问题</a></h3>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>43,'pnameid'=>$_COOKIE['pnameid']))?>" >海事海商</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>44,'pnameid'=>$_COOKIE['pnameid']))?>" >国际贸易</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>45,'pnameid'=>$_COOKIE['pnameid']))?>" >招商引资</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>46,'pnameid'=>$_COOKIE['pnameid']))?>" >外商投资</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>47,'pnameid'=>$_COOKIE['pnameid']))?>" >合资合作</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>48,'pnameid'=>$_COOKIE['pnameid']))?>" >WTO事务</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>49,'pnameid'=>$_COOKIE['pnameid']))?>" >倾销补贴</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>50,'pnameid'=>$_COOKIE['pnameid']))?>" >涉外仲裁</a>
                        </div>
                        <div class="placeName bg">
                            <h3><a href="sortlist.asp?cid=9" >公司专项法律类法律问题</a></h3>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>51,'pnameid'=>$_COOKIE['pnameid']))?>" >公司并购</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>52,'pnameid'=>$_COOKIE['pnameid']))?>" >股份转让</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>53,'pnameid'=>$_COOKIE['pnameid']))?>" >企业改制</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>54,'pnameid'=>$_COOKIE['pnameid']))?>" >公司清算</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>55,'pnameid'=>$_COOKIE['pnameid']))?>" >破产解散</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>56,'pnameid'=>$_COOKIE['pnameid']))?>" >资产拍卖</a>
                        </div>
                        <div class="placeName">
                            <h3><a href="sortlist.asp?cid=10" >其他非讼法律类法律问题</a></h3>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>57,'pnameid'=>$_COOKIE['pnameid']))?>" >工商查询</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>58,'pnameid'=>$_COOKIE['pnameid']))?>" >资信调查</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>59,'pnameid'=>$_COOKIE['pnameid']))?>" >合同审查</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>60,'pnameid'=>$_COOKIE['pnameid']))?>" >调解谈判</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>61,'pnameid'=>$_COOKIE['pnameid']))?>" >常年顾问</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>62,'pnameid'=>$_COOKIE['pnameid']))?>" >私人律师</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>63,'pnameid'=>$_COOKIE['pnameid']))?>" >文书代理</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>64,'pnameid'=>$_COOKIE['pnameid']))?>" >移民留学</a>
                            <a href="<?php echo url('paihangbang/area',array('fenleiid'=>15,'pnameid'=>$_COOKIE['pnameid']))?>" >商帐追收</a>
                        </div>

                        <!--省份结束-->
                    </div>
                </div>
                <div><img src="/css/paihangbang/images/pah_14.gif" /></div>
                <div class="bolck10"></div>


            </div>
        </div>
    </div>

</div>




<div id='divmessage'></div>
<script type="text/javascript">
    function hiddenall()
    {
        for(i=1;i<=2;i++)
        {
            document.getElementById('area_place'+i).style.display='none';
            document.getElementById('arar_menu'+i).className='bjdsd';
        }
    }
    function changearea(i)
    {   hiddenall();
        document.getElementById('area_place'+i).style.display='';
        document.getElementById('arar_menu'+i).className='bjtup';
    }
    function setTab(name,cursel,n){
        for(i=1;i<=n;i++){
            var menu=document.getElementById(name+i);
            var con=document.getElementById("con_"+name+"_"+i);
            menu.className=i==cursel?"bjtup":"bjdsd";
            con.style.display=i==cursel?"block":"none";
        }
    }

    function loadContent(name, i, nums, pnameid, cnameid, fenleiid){
        var uri = "/index.php/paihangbang/zcndareajson";
        var id = "con_"+name+"_"+i;
        $("#"+id).html("加载中...");
        $("#"+id).load(uri, {nums: nums, pnameid: pnameid, cnameid: cnameid, fenleiid: fenleiid});
    }
</script>
