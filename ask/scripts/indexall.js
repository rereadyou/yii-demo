// JavaScript Document
		function setTab(name,cursel,n){
		for(i=1;i<=n;i++){
		var menu=document.getElementById(name+i);
		var con=document.getElementById("con_"+name+"_"+i);
		menu.className=i==cursel?"hover":"";
		con.style.display=i==cursel?"block":"none";
		}
		}
		//-->

function submiturl()
{

var p=document.getElementById("Region").value;


 
 if (p=="1")
 {
 document.getElementById("form1").action="http://bj.9ask.cn/lvshi/index.asp";
 document.getElementById("form1").submit();
 }
 else
 {
 document.getElementById("form1").action="http://www.9ask.cn/search/findindex.asp";
 document.getElementById("form1").submit();
 }
}


function changeselect(selvalue,tform){
 
Citys = new Array();
Citys[0] =new Array("东城区","1","1");

Citys[1] =new Array("西城区","1","2");

Citys[2] =new Array("崇文区","1","3");

Citys[3] =new Array("宣武区","1","4");

Citys[4] =new Array("朝阳区","1","5");

Citys[5] =new Array("丰台区","1","6");

Citys[6] =new Array("延庆县","1","7");

Citys[7] =new Array("海淀区","1","8");

Citys[8] =new Array("密云县","1","9");

Citys[9] =new Array("房山区","1","10");

Citys[10] =new Array("通州区","1","11");

Citys[11] =new Array("顺义区","1","12");

Citys[12] =new Array("昌平区","1","13");

Citys[13] =new Array("大兴区","1","14");

Citys[14] =new Array("平谷区","1","15");

Citys[15] =new Array("怀柔区","1","16");

Citys[16] =new Array("石景山","1","17");

Citys[17] =new Array("门头沟","1","19");

Citys[18] =new Array("其他","1","20");

Citys[19] =new Array("黄浦区","2","21");

Citys[20] =new Array("青浦区","2","22");

Citys[21] =new Array("崇明县","2","23");

Citys[22] =new Array("上海市属","2","24");

Citys[23] =new Array("卢湾区","2","25");

Citys[24] =new Array("徐汇区","2","26");

Citys[25] =new Array("长宁区","2","27");

Citys[26] =new Array("静安区","2","28");

Citys[27] =new Array("普陀区","2","29");

Citys[28] =new Array("闸北区","2","30");

Citys[29] =new Array("虹口区","2","31");

Citys[30] =new Array("杨浦区","2","32");

Citys[31] =new Array("闵行区","2","33");

Citys[32] =new Array("宝山区","2","34");

Citys[33] =new Array("嘉定区","2","35");

Citys[34] =new Array("浦东新区","2","36");

Citys[35] =new Array("上海市属","2","37");

Citys[36] =new Array("金山区","2","38");

Citys[37] =new Array("松江区","2","39");

Citys[38] =new Array("南汇区","2","40");

Citys[39] =new Array("奉贤区","2","41");

Citys[40] =new Array("其他","2","42");

Citys[41] =new Array("天津","3","43");

Citys[42] =new Array("其他","3","44");

Citys[43] =new Array("万州区","4","45");

Citys[44] =new Array("涪陵区","4","46");

Citys[45] =new Array("渝中区","4","47");

Citys[46] =new Array("大渡口","4","48");

Citys[47] =new Array("江北区","4","49");

Citys[48] =new Array("沙坪坝","4","50");

Citys[49] =new Array("九龙坡","4","51");

Citys[50] =new Array("南岸区","4","52");

Citys[51] =new Array("北碚区","4","53");

Citys[52] =new Array("万盛区","4","54");

Citys[53] =new Array("双桥区","4","55");

Citys[54] =new Array("渝北区","4","57");

Citys[55] =new Array("巴南区","4","58");

Citys[56] =new Array("江津","4","82");

Citys[57] =new Array("合川","4","83");

Citys[58] =new Array("永川","4","84");

Citys[59] =new Array("南川","4","85");

Citys[60] =new Array("济南","5","86");

Citys[61] =new Array("青岛","5","87");

Citys[62] =new Array("日照","5","88");

Citys[63] =new Array("东营","5","89");

Citys[64] =new Array("潍坊","5","90");

Citys[65] =new Array("泰安","5","91");

Citys[66] =new Array("淄博","5","92");

Citys[67] =new Array("烟台","5","93");

Citys[68] =new Array("威海","5","94");

Citys[69] =new Array("济宁","5","96");

Citys[70] =new Array("滨州","5","97");

Citys[71] =new Array("临沂","5","98");

Citys[72] =new Array("德州","5","99");

Citys[73] =new Array("菏泽","5","100");

Citys[74] =new Array("枣庄","5","101");

Citys[75] =new Array("其它","5","102");

Citys[76] =new Array("广州","6","103");

Citys[77] =new Array("深圳","6","104");

Citys[78] =new Array("佛山","6","105");

Citys[79] =new Array("中山","6","106");

Citys[80] =new Array("江门","6","107");

Citys[81] =new Array("惠州","6","108");

Citys[82] =new Array("东莞","6","109");

Citys[83] =new Array("汕头","6","110");

Citys[84] =new Array("湛江","6","111");

Citys[85] =new Array("茂名","6","112");

Citys[86] =new Array("肇庆","6","113");

Citys[87] =new Array("韶关","6","114");

Citys[88] =new Array("阳江","6","115");

Citys[89] =new Array("珠海","6","116");

Citys[90] =new Array("其它","6","117");

Citys[91] =new Array("武汉","7","118");

Citys[92] =new Array("襄樊","7","119");

Citys[93] =new Array("宜昌","7","120");

Citys[94] =new Array("荆州","7","121");

Citys[95] =new Array("黄石","7","122");

Citys[96] =new Array("荆门","7","123");

Citys[97] =new Array("十堰","7","124");

Citys[98] =new Array("潜江","7","125");

Citys[99] =new Array("仙桃","7","126");

Citys[100] =new Array("咸宁","7","127");

Citys[101] =new Array("长沙","8","128");

Citys[102] =new Array("株州","8","129");

Citys[103] =new Array("岳阳","8","130");

Citys[104] =new Array("常德","8","131");

Citys[105] =new Array("湘潭","8","132");

Citys[106] =new Array("娄底","8","133");

Citys[107] =new Array("怀化","8","134");

Citys[108] =new Array("永州","8","135");

Citys[109] =new Array("衡阳","8","136");

Citys[110] =new Array("邵阳","8","137");

Citys[111] =new Array("郴州","8","138");

Citys[112] =new Array("益阳","8","139");

Citys[113] =new Array("张家界","8","140");

Citys[114] =new Array("吉首","8","141");

Citys[115] =new Array("其它","8","142");

Citys[116] =new Array("杭州","9","143");

Citys[117] =new Array("嘉兴","9","145");

Citys[118] =new Array("温州","9","146");

Citys[119] =new Array("义乌","9","147");

Citys[120] =new Array("宁波","9","148");

Citys[121] =new Array("湖州","9","149");

Citys[122] =new Array("绍兴","9","150");

Citys[123] =new Array("台州","9","151");

Citys[124] =new Array("丽水","9","152");

Citys[125] =new Array("金华","9","153");

Citys[126] =new Array("衢州","9","154");

Citys[127] =new Array("舟山","9","155");

Citys[128] =new Array("其它","9","156");

Citys[129] =new Array("南京","10","157");

Citys[130] =new Array("无锡","10","158");

Citys[131] =new Array("镇江","10","159");

Citys[132] =new Array("南通","10","160");

Citys[133] =new Array("扬州","10","161");

Citys[134] =new Array("盐城","10","162");

Citys[135] =new Array("徐州","10","163");

Citys[136] =new Array("淮安","10","164");

Citys[137] =new Array("连云港","10","165");

Citys[138] =new Array("常州","10","166");

Citys[139] =new Array("泰州","10","167");

Citys[140] =new Array("苏州","10","168");

Citys[141] =new Array("其它","10","169");

Citys[142] =new Array("成都","11","170");

Citys[143] =new Array("泸州","11","171");

Citys[144] =new Array("德阳","11","172");

Citys[145] =new Array("乐山","11","173");

Citys[146] =new Array("绵阳","11","174");

Citys[147] =new Array("宜宾","11","175");

Citys[148] =new Array("自贡","11","176");

Citys[149] =new Array("攀枝花","11","177");

Citys[150] =new Array("内江","11","178");

Citys[151] =new Array("南充","11","179");

Citys[152] =new Array("其它","11","180");

Citys[153] =new Array("石家庄","12","181");

Citys[154] =new Array("邯郸","12","182");

Citys[155] =new Array("秦皇岛","12","184");

Citys[156] =new Array("唐山","12","185");

Citys[157] =new Array("沧州","12","187");

Citys[158] =new Array("廊坊","12","188");

Citys[159] =new Array("保定","12","189");

Citys[160] =new Array("张家口","12","190");

Citys[161] =new Array("邢台","12","191");

Citys[162] =new Array("衡水","12","192");

Citys[163] =new Array("承德","12","193");

Citys[164] =new Array("其它","12","194");

Citys[165] =new Array("福州","13","195");

Citys[166] =new Array("泉州","13","196");

Citys[167] =new Array("三明","13","197");

Citys[168] =new Array("漳州","13","198");

Citys[169] =new Array("南平","13","199");

Citys[170] =new Array("宁德","13","200");

Citys[171] =new Array("龙岩","13","202");

Citys[172] =new Array("莆田","13","203");

Citys[173] =new Array("厦门","13","204");

Citys[174] =new Array("其它","13","205");

Citys[175] =new Array("沈阳","14","206");

Citys[176] =new Array("大连","14","207");

Citys[177] =new Array("金州","14","208");

Citys[178] =new Array("瓦房店","14","209");

Citys[179] =new Array("庄河","14","210");

Citys[180] =new Array("阜新","14","211");

Citys[181] =new Array("辽阳","14","213");

Citys[182] =new Array("丹东","14","214");

Citys[183] =new Array("营口","14","215");

Citys[184] =new Array("盘锦","14","216");

Citys[185] =new Array("抚顺","14","218");

Citys[186] =new Array("本溪","14","219");

Citys[187] =new Array("鞍山","14","220");

Citys[188] =new Array("锦州","14","221");

Citys[189] =new Array("葫芦岛","14","222");

Citys[190] =new Array("铁岭","14","223");

Citys[191] =new Array("朝阳","14","224");

Citys[192] =new Array("其它","14","225");

Citys[193] =new Array("合肥","15","226");

Citys[194] =new Array("芜湖","15","227");

Citys[195] =new Array("蚌埠","15","228");

Citys[196] =new Array("巢湖","15","230");

Citys[197] =new Array("滁州","15","231");

Citys[198] =new Array("淮南","15","232");

Citys[199] =new Array("安庆","15","233");

Citys[200] =new Array("池州","15","234");

Citys[201] =new Array("宣城","15","235");

Citys[202] =new Array("马鞍山","15","236");

Citys[203] =new Array("黄山","15","237");

Citys[204] =new Array("铜陵","15","238");

Citys[205] =new Array("宿州","15","239");

Citys[206] =new Array("淮北","15","240");

Citys[207] =new Array("阜阳","15","241");

Citys[208] =new Array("其它","15","242");

Citys[209] =new Array("兰州","16","244");

Citys[210] =new Array("定西","16","245");

Citys[211] =new Array("平凉","16","246");

Citys[212] =new Array("武威","16","247");

Citys[213] =new Array("张掖","16","248");

Citys[214] =new Array("酒泉","16","249");

Citys[215] =new Array("天水","16","250");

Citys[216] =new Array("临夏","16","251");

Citys[217] =new Array("其它","16","252");

Citys[218] =new Array("南宁","17","253");

Citys[219] =new Array("桂林","17","254");

Citys[220] =new Array("柳州","17","255");

Citys[221] =new Array("梧州","17","256");

Citys[222] =new Array("玉林","17","257");

Citys[223] =new Array("钦州","17","258");

Citys[224] =new Array("北海","17","259");

Citys[225] =new Array("防城港","17","260");

Citys[226] =new Array("其它","17","261");

Citys[227] =new Array("海口","18","263");

Citys[228] =new Array("三亚","18","264");

Citys[229] =new Array("儋县","18","265");

Citys[230] =new Array("其它","18","266");

Citys[231] =new Array("贵阳","19","267");

Citys[232] =new Array("遵义","19","268");

Citys[233] =new Array("安顺","19","269");

Citys[234] =new Array("都匀","19","270");

Citys[235] =new Array("凯里","19","271");

Citys[236] =new Array("铜仁","19","272");

Citys[237] =new Array("毕节","19","273");

Citys[238] =new Array("六盘水","19","274");

Citys[239] =new Array("兴义","19","275");

Citys[240] =new Array("其它","19","276");

Citys[241] =new Array("哈尔滨","20","277");

Citys[242] =new Array("大庆","20","278");

Citys[243] =new Array("鸡西","20","280");

Citys[244] =new Array("齐齐哈尔","20","281");

Citys[245] =new Array("佳木斯","20","282");

Citys[246] =new Array("牡丹江","20","283");

Citys[247] =new Array("黑河","20","284");

Citys[248] =new Array("绥化","20","285");

Citys[249] =new Array("其它","20","286");

Citys[250] =new Array("呼和浩特","21","287");

Citys[251] =new Array("包头","21","288");

Citys[252] =new Array("乌海","21","289");

Citys[253] =new Array("集宁","21","290");

Citys[254] =new Array("通辽","21","291");

Citys[255] =new Array("赤峰","21","293");

Citys[256] =new Array("东胜","21","294");

Citys[257] =new Array("临河","21","295");

Citys[258] =new Array("锡林浩特","21","296");

Citys[259] =new Array("海拉尔","21","297");

Citys[260] =new Array("其它","21","298");

Citys[261] =new Array("南昌","22","299");

Citys[262] =new Array("九江","22","300");

Citys[263] =new Array("上饶","22","301");

Citys[264] =new Array("陵川","22","302");

Citys[265] =new Array("宜春","22","303");

Citys[266] =new Array("吉安","22","305");

Citys[267] =new Array("赣州","22","306");

Citys[268] =new Array("景德镇","22","307");

Citys[269] =new Array("萍乡","22","308");

Citys[270] =new Array("分宜","22","309");

Citys[271] =new Array("其它","22","310");

Citys[272] =new Array("长春","23","311");

Citys[273] =new Array("吉林","23","313");

Citys[274] =new Array("四平","23","314");

Citys[275] =new Array("延吉","23","315");

Citys[276] =new Array("松原","23","316");

Citys[277] =new Array("白山","23","317");

Citys[278] =new Array("通化","23","318");

Citys[279] =new Array("其它","23","319");

Citys[280] =new Array("银川","24","320");

Citys[281] =new Array("石嘴山","24","322");

Citys[282] =new Array("吴忠","24","323");

Citys[283] =new Array("固原","24","324");

Citys[284] =new Array("其它","24","325");

Citys[285] =new Array("西宁","25","326");

Citys[286] =new Array("平安","25","327");

Citys[287] =new Array("同仁","25","329");

Citys[288] =new Array("共和","25","330");

Citys[289] =new Array("德令哈","25","331");

Citys[290] =new Array("门源","25","332");

Citys[291] =new Array("格尔木","25","333");

Citys[292] =new Array("其它","25","334");

Citys[293] =new Array("太原","26","335");

Citys[294] =new Array("大同","26","336");

Citys[295] =new Array("阳泉","26","337");

Citys[296] =new Array("榆次","26","338");

Citys[297] =new Array("长治","26","339");

Citys[298] =new Array("晋城","26","340");

Citys[299] =new Array("临汾","26","341");

Citys[300] =new Array("吕梁","26","342");

Citys[301] =new Array("运城","26","343");

Citys[302] =new Array("忻州","26","344");

Citys[303] =new Array("其它","26","345");

Citys[304] =new Array("西安","27","346");

Citys[305] =new Array("咸阳","27","347");

Citys[306] =new Array("宝鸡","27","348");

Citys[307] =new Array("汉中","27","349");

Citys[308] =new Array("铜川","27","350");

Citys[309] =new Array("安康","27","351");

Citys[310] =new Array("商州","27","352");

Citys[311] =new Array("渭南","27","353");

Citys[312] =new Array("延安","27","354");

Citys[313] =new Array("其它","27","355");

Citys[314] =new Array("顺德","6","455");

Citys[315] =new Array("南海","6","456");

Citys[316] =new Array("乌鲁木齐","29","358");

Citys[317] =new Array("昌吉","29","359");

Citys[318] =new Array("伊宁","29","360");

Citys[319] =new Array("喀什","29","361");

Citys[320] =new Array("吐鲁番","29","362");

Citys[321] =new Array("其它","29","363");

Citys[322] =new Array("昆明","30","365");

Citys[323] =new Array("大理","30","366");

Citys[324] =new Array("曲靖","30","367");

Citys[325] =new Array("保山","30","368");

Citys[326] =new Array("玉溪","30","369");

Citys[327] =new Array("楚雄","30","370");

Citys[328] =new Array("思茅","30","371");

Citys[329] =new Array("其他","30","372");

Citys[330] =new Array("郑州","31","373");

Citys[331] =new Array("开封","31","374");

Citys[332] =new Array("洛阳","31","375");

Citys[333] =new Array("平顶山","31","376");

Citys[334] =new Array("安阳","31","377");

Citys[335] =new Array("鹤壁","31","378");

Citys[336] =new Array("新乡","31","379");

Citys[337] =new Array("焦作","31","380");

Citys[338] =new Array("济源","31","381");

Citys[339] =new Array("濮阳","31","382");

Citys[340] =new Array("许昌","31","383");

Citys[341] =new Array("漯河","31","384");

Citys[342] =new Array("三门峡","31","385");

Citys[343] =new Array("南阳","31","386");

Citys[344] =new Array("商丘","31","387");

Citys[345] =new Array("信阳","31","388");

Citys[346] =new Array("周口","31","389");

Citys[347] =new Array("驻马店","31","390");

Citys[348] =new Array("其他","31","391");

Citys[349] =new Array("其他","4","392");

Citys[350] =new Array("其他","7","393");

Citys[351] =new Array("和平区","3","394");

Citys[352] =new Array("河东区","3","396");

Citys[353] =new Array("河西区","3","397");

Citys[354] =new Array("南开区","3","398");

Citys[355] =new Array("河北区","3","399");

Citys[356] =new Array("红桥区","3","400");

Citys[357] =new Array("塘沽区","3","401");

Citys[358] =new Array("汉沽区","3","402");

Citys[359] =new Array("大港区","3","403");

Citys[360] =new Array("东丽区","3","404");

Citys[361] =new Array("西青区","3","405");

Citys[362] =new Array("津南区","3","406");

Citys[363] =new Array("北辰区","3","407");

Citys[364] =new Array("宁河县","3","408");

Citys[365] =new Array("武清县","3","409");

Citys[366] =new Array("静海县","3","410");

Citys[367] =new Array("宝坻县","3","411");

Citys[368] =new Array("蓟县","3","412");

Citys[369] =new Array("开发区","3","413");

Citys[370] =new Array("莱芜","5","414");

Citys[371] =new Array("聊城","5","415");

Citys[372] =new Array("石河子","29","416");

Citys[373] =new Array("瑞安","9","417");

Citys[374] =new Array("河源","6","418");

Citys[375] =new Array("库尔勒","29","419");

Citys[376] =new Array("眉山","11","420");

Citys[377] =new Array("乳山","5","421");

Citys[378] =new Array("常熟","10","422");

Citys[379] =new Array("清远","6","423");

Citys[380] =new Array("广安","11","424");

Citys[381] =new Array("宿迁","10","425");

Citys[382] =new Array("黄冈","7","426");

Citys[383] =new Array("亳州","15","427");

Citys[384] =new Array("昆山","10","428");

Citys[385] =new Array("百色","17","429");

Citys[386] =new Array("孝感","7","430");

Citys[387] =new Array("香港","32","431");

Citys[388] =new Array("阿克苏","29","433");

Citys[389] =new Array("余姚","9","434");

Citys[390] =new Array("海安","10","435");

Citys[391] =new Array("恩施","7","436");

Citys[392] =new Array("庆阳","16","437");

Citys[393] =new Array("辽源","23","438");

Citys[394] =new Array("金昌","16","439");

Citys[395] =new Array("白银","16","440");

Citys[396] =new Array("嘉峪关","16","441");

Citys[397] =new Array("甘南","16","442");

Citys[398] =new Array("陇南","16","443");

Citys[399] =new Array("海城","14","444");

Citys[400] =new Array("台湾","33","445");

Citys[401] =new Array("澳门","34","446");

Citys[402] =new Array("拉萨","28","447");

Citys[403] =new Array("日喀则","28","448");

Citys[404] =new Array("山南","28","449");

Citys[405] =new Array("昌都","28","450");

Citys[406] =new Array("那曲","28","451");

Citys[407] =new Array("阿里","28","452");

Citys[408] =new Array("林芝","28","453");

Citys[409] =new Array("鄂州","7","457");

Citys[410] =new Array("随州","7","458");

Citys[411] =new Array("天门","7","459");

Citys[412] =new Array("六安","15","461");

Citys[413] =new Array("黔东南州","19","462");

Citys[414] =new Array("黔南州","19","463");

Citys[415] =new Array("黔西南州","19","464");

Citys[416] =new Array("大兴安岭","20","465");

Citys[417] =new Array("鹤岗","20","466");

Citys[418] =new Array("伊春","20","467");

Citys[419] =new Array("七台河","20","468");

Citys[420] =new Array("双鸭山","20","469");

Citys[421] =new Array("乌兰浩特","21","470");

Citys[422] =new Array("满洲里","21","471");

Citys[423] =new Array("牙克石","21","472");

Citys[424] =new Array("抚州","22","473");

Citys[425] =new Array("鹰潭市","22","474");

Citys[426] =new Array("新余","22","475");

Citys[427] =new Array("白城","23","476");

Citys[428] =new Array("延边州","23","477");

Citys[429] =new Array("和田","29","478");

Citys[430] =new Array("克拉玛依","29","479");

Citys[431] =new Array("伊犁","29","480");

Citys[432] =new Array("达州","11","486");

Citys[433] =new Array("云浮","6","487");

Citys[434] =new Array("湘西","8","489");

Citys[435] =new Array("阿克苏","29","490");

Citys[436] =new Array("呼伦贝尔","21","491");

Citys[437] =new Array("巴中","11","492");

Citys[438] =new Array("遂宁","11","494");

Citys[439] =new Array("广元","11","496");

Citys[440] =new Array("昭通","30","498");

Citys[441] =new Array("巴音郭楞","29","500");

Citys[442] =new Array("榆林","27","501");

Citys[443] =new Array("靖江","10","502");

Citys[444] =new Array("哈密","29","481");

Citys[445] =new Array("鄂尔多斯","21","482");

Citys[446] =new Array("梅州","6","483");

Citys[447] =new Array("揭阳","6","484");

Citys[448] =new Array("潮州","6","485");

Citys[449] =new Array("阿坝","11","488");

Citys[450] =new Array("资阳","11","493");

Citys[451] =new Array("文山","30","499");
Citys[452] =new Array("德宏","30","504");
Citys[453] =new Array("即墨","5","508");
Citys[454] =new Array("万源","11","515");
Citys[455] =new Array("来宾","17","509");
tform.City.length = 0 ;
tform.City.options[tform.City.length] = new Option("选择城市","");
 for (i = 0 ;i <Citys.length;i++){
  if(Citys[i][1]==selvalue){
  tform.City.options[tform.City.length] = new Option(Citys[i][0],Citys[i][2]);
  }
 }
 }

 //通用选项卡样式内容变换
//使用帮助文档中用的JS***********************************************************
//省份分站弹出JS

function selCat2(name,obj,n)
{
	for(i=1;i<=n;i++)
	{
		eval("document.getElementById('"+name+i+"').className=''");
		//隐藏变换选项卡内容
		if(name == 'n' || name == 's'){}
		else{
			eval("document.getElementById('display_"+name+'_'+i+"').style.display='none'");
		}
	}
	//排行模块
	if(name == 'mt' || name == 'dt'){
		eval("document.getElementById('"+name+obj+"').className='colButton'");
	}
	//所有中间选项卡模块
	else{
		eval("document.getElementById('"+name+obj+"').className='colButtonOver'");
	}
	//显示变换选项卡内容
	if(name == 'n' || name == 's'){}
	else{
		eval("document.getElementById('display_"+name+'_'+obj+"').style.display=''");
	}
}
function DLLRegistered(strID)
{
		var o = null;
  	try {
			o = new ActiveXObject(strID);
		}catch(e){
			return false;
  	}
		if(o != null){
			o = null;
			return true;
		}else
			return false;
}
//使用帮助文档中用的JS***********************************************************

//全国各地分站切换用的JS*********************************************************
function popcity()
{
city=document.getElementById("citylayer");
if(city.style.display=="none"){
city.style.display="";
}

}

function hidecity()
{
city=document.getElementById("citylayer");
if(city.style.display==""){
city.style.display="none";
}

}
//全国各地分站切换用的JS*********************************************************


//导航下面的搜索*****************************************************************

function writeflashhtml( arg )
{
var parm = []
var _default_version = "8,0,24,0";
var _default_quality = "high";
var _default_align = "middle";
var _default_menu = "false";

for(i = 0; i < arguments.length; i ++)
{
parm[i] = arguments[i].split(' ').join('').split('=')
for (var j = parm[i].length-1; j > 1; j --){
parm[i][j-1]+="="+parm[i].pop();
}
switch (parm[i][0])
{
case '_version' : var _version = parm[i][1] ; break ;
case '_swf' : var _swf = parm[i][1] ; break ;
case '_base' : var _base = parm[i][1] ; break ;
case '_quality' : var _quality = parm[i][1] ; break ;
case '_loop' : var _loop = parm[i][1] ; break ;
case '_bgcolor' : var _bgcolor = parm[i][1] ; break ;
case '_wmode' : var _wmode = parm[i][1] ; break ;
case '_play' : var _play = parm[i][1] ; break ;
case '_menu' : var _menu = parm[i][1] ; break ;
case '_scale' : var _scale = parm[i][1] ; break ;
case '_salign' : var _salign = parm[i][1] ; break ;
case '_height' : var _height = parm[i][1] ; break ;
case '_width' : var _width = parm[i][1] ; break ;
case '_hspace' : var _hspace = parm[i][1] ; break ;
case '_vspace' : var _vspace = parm[i][1] ; break ;
case '_align' : var _align = parm[i][1] ; break ;
case '_class' : var _class = parm[i][1] ; break ;
case '_id' : var _id = parm[i][1] ; break ;
case '_name' : var _name = parm[i][1] ; break ;
case '_style' : var _style = parm[i][1] ; break ;
case '_declare' : var _declare = parm[i][1] ; break ;
case '_flashvars' : var _flashvars = parm[i][1] ; break ;
default :;
}
}
var thtml = ""
thtml += "<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=" + ((_version)?_version:_default_version) + "'"
if(_width) thtml += " width='" + _width + "'"
if(_height) thtml += " height='" + _height + "'"
if(_hspace) thtml += " hspace='" + _hspace + "'"
if(_vspace) thtml += " vspace='" + _vspace + "'"
if(_align) thtml += " align='" + _align + "'"
else thtml += " align='" + _default_align + "'"
if(_class) thtml += " class='" + _class + "'"
if(_id) thtml += " id='" + _id + "'"
if(_name) thtml += " name='" + _name + "'"
if(_style) thtml += " style='" + _style + "'"
if(_declare) thtml += " " + _declare
thtml += ">"
if(_swf) thtml += "<param name='movie' value='" + _swf + "'>"
if(_quality) thtml += "<param name='quality' value='" + _quality + "'>"
else thtml += "<param name='quality' value ='" + _default_quality + "'>"
if(_loop) thtml += "<param name='loop' value='" + _loop + "'>"
if(_bgcolor) thtml += "<param name='bgcolor' value='" + _bgcolor + "'>"
if(_play) thtml += "<param name='play' value='" + _play + "'>"
if(_menu) thtml += "<param name='menu' value='" + _menu + "'>"
else thtml += "<param name='menu' value='" + _default_menu + "'>"
if(_scale) thtml += "<param name='scale' value='" + _scale + "'>"
if(_salign) thtml += "<param name='salign' value='" + _salign + "'>"
if(_wmode) thtml += "<param name='wmode' value='" + _wmode + "'>"
if(_base) thtml += "<param name='base' value='" + _base + "'>"
if(_flashvars) thtml += "<param name='flashvars' value='" + _flashvars + "'>"
thtml += "<embed pluginspage='http://www.macromedia.com/go/getflashplayer'"
if(_width) thtml += " width='" + _width + "'"
if(_height) thtml += " height='" + _height + "'"
if(_hspace) thtml += " hspace='" + _hspace + "'"
if(_vspace) thtml += " vspace='" + _vspace + "'"
if(_align) thtml += " align='" + _align + "'"
else thtml += " align='" + _default_align + "'"
if(_class) thtml += " class='" + _class + "'"
if(_id) thtml += " id='" + _id + "'"
if(_name) thtml += " name='" + _name + "'"
if(_style) thtml += " style='" + _style + "'"
thtml += " type='application/x-shockwave-flash'"
if(_declare) thtml += " " + _declare
if(_swf) thtml += " src='" + _swf + "'"
if(_quality) thtml += " quality='" + _quality + "'"
else thtml += " quality='" + _default_quality + "'"
if(_loop) thtml += " loop='" + _loop + "'"
if(_bgcolor) thtml += " bgcolor='" + _bgcolor + "'"
if(_play) thtml += " play='" + _play + "'"
if(_menu) thtml += " menu='" + _menu + "'"
else thtml += " menu='" + _default_menu + "'"
if(_scale) thtml += " scale='" + _scale + "'"
if(_salign) thtml += " salign='" + _salign + "'"
if(_wmode) thtml += " wmode='" + _wmode + "'"
if(_base) thtml += " base='" + _base + "'"
if(_flashvars) thtml += " flashvars='" + _flashvars + "'"
thtml += "></embed>"
thtml += "</object>"
document.write(thtml)
}

//首页栏目选项卡切换js
function nTabs(thisObj,Num){
if(thisObj.className == "active")return;
var tabObj = thisObj.parentNode.id;
var tablist = document.getElementById(tabObj).getElementsByTagName("li");
for(i=0; i <tablist.length; i++)
{
if (i == Num)
{
   thisObj.className = "active";

      document.getElementById(tabObj+"_Content"+i).style.display = "block";
}else{
   if(tablist[i].className== "active"||tablist[i].className=="normal")
									 {
   tablist[i].className = "normal";
   document.getElementById(tabObj+"_Content"+i).style.display = "none";
									 }
}
}
}
function nTabs3(thisObj,Num)
{
 if(Num==1)
 {
  document.getElementById(thisObj+"_Content0").style.display ="none";
  document.getElementById(thisObj+"_Content1").style.display ="";
 }
 else
 { document.getElementById(thisObj+"_Content1").style.display ="none";
  document.getElementById(thisObj+"_Content0").style.display ="";
 }



}
function nTabs2(thisObj,Num){
if(thisObj.className == "Baract")return;
var tabObj = thisObj.parentNode.id;
var tablist = document.getElementById(tabObj).getElementsByTagName("li");
for(i=0; i <tablist.length; i++)
{
if (i == Num)
{
   thisObj.className = "Baract";
      document.getElementById(tabObj+"_Content"+i).style.display = "block";
	   document.getElementById(tabObj+"1_Content"+i).style.display = "block";
	    document.getElementById(tabObj+"2_Content"+i).style.display = "block";
		 document.getElementById(tabObj+"3_Content"+i).style.display = "block";
}else{
   tablist[i].className = "Barnor";
   document.getElementById(tabObj+"_Content"+i).style.display = "none";
     document.getElementById(tabObj+"1_Content"+i).style.display = "none";
	   document.getElementById(tabObj+"2_Content"+i).style.display = "none";
	     document.getElementById(tabObj+"3_Content"+i).style.display = "none";
}
}
}

  function URLEncode (clearString) {
  var output = '';
  var x = 0;
  clearString = clearString.toString();
  var regex = /(^[a-zA-Z0-9_.]*)/;
  while (x < clearString.length) {
    var match = regex.exec(clearString.substr(x));
    if (match != null && match.length > 1 && match[1] != '') {
    	output += match[1];
      x += match[1].length;
    } else {
      if (clearString[x] == ' ')
        output += '+';
      else {
        var charCode = clearString.charCodeAt(x);
        var hexVal = charCode.toString(16);
        output += '%' + ( hexVal.length < 2 ? '0' : '' ) + hexVal.toUpperCase();
      }
      x++;
    }
  }
  return output;
}




