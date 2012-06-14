<?php
/**
 * ipdata.class.php IP检测函数库
 *
 * @copyright			中顾网
 * @license				周泉
 * @lastmodify			2011-03-10
 */

class IPData
{
	private $tinyipfile;
	private $fullipfile;
	// 城市名称
	public  $city;

	function __construct()
	{
		// IP库文件的地址配置
		$DATA_DIR = yii::getPathOfAlias('application') . '/data';
		$this->tinyipfile = $DATA_DIR . '/ipdata/tinyipdata.dat';
		$this->fullipfile = $DATA_DIR . '/ipdata/wry.dat';
	}
	
	/**
	 *  根据IP地址获得省份或城市名称
	 *  @return Array('isCity'=>1,'name'=>'济南');
	 *  周泉，2011.03.18 
	 *
	 */
	function get_ip_position( $ip='' ) {

		$cityArr = Array('东城','西城','崇文','宣武','朝阳','丰台','延庆','海淀','密云','房山','通州','顺义','昌平','大兴',
		'平谷','怀柔','石景山','门头沟','黄浦','青浦','崇明','上海','卢湾','徐汇','长宁','静安','普陀','闸北','虹口',
		'杨浦','闵行','宝山','嘉定','浦东','金山','松江','南汇','奉贤','天津','万州','涪陵','渝中','大渡口','江北',
		'沙坪坝','九龙坡','南岸','北碚','万盛','双桥','渝北','巴南','江津','合川','永川','南川','济南','青岛','日照',
		'东营','潍坊','泰安','淄博','烟台','威海','济宁','滨州','临沂','德州','菏泽','枣庄','广州','深圳','佛山','中山',
		'江门','惠州','东莞','汕头','湛江','茂名','肇庆','韶关','阳江','珠海','武汉','襄樊','宜昌','荆州','黄石','荆门',
		'十堰','潜江','仙桃','咸宁','长沙','株州','岳阳','常德','湘潭','娄底','怀化','永州','衡阳','邵阳','郴州','益阳',
		'张家界','吉首','杭州','嘉兴','温州','义乌','宁波','湖州','绍兴','台州','丽水','金华','衢州','舟山','南京','无锡',
		'镇江','南通','扬州','盐城','徐州','淮安','连云港','常州','泰州','苏州','成都','泸州','德阳','乐山','绵阳','宜宾',
		'自贡','攀枝花','内江','南充','石家庄','邯郸','秦皇岛','唐山','沧州','廊坊','保定','张家口','邢台','衡水','承德',
		'福州','泉州','三明','漳州','南平','宁德','龙岩','莆田','厦门','沈阳','大连','金州','瓦房店','庄河','阜新','辽阳',
		'丹东','营口','盘锦','抚顺','本溪','鞍山','锦州','葫芦岛','铁岭','朝阳','合肥','芜湖','蚌埠','巢湖','滁州','淮南',
		'安庆','池州','宣城','马鞍山','黄山','铜陵','宿州','淮北','阜阳','兰州','定西','平凉','武威','张掖','酒泉','天水',
		'临夏','南宁','桂林','柳州','梧州','玉林','钦州','北海','防城港','海口','三亚','儋县','贵阳','遵义','安顺','都匀',
		'凯里','铜仁','毕节','六盘水','兴义','哈尔滨','大庆','鸡西','齐齐哈尔','佳木斯','牡丹江','黑河','绥化','呼和浩特',
		'包头','乌海','集宁','通辽','赤峰','东胜','临河','锡林浩特','海拉尔','南昌','九江','上饶','陵川','宜春','吉安',
		'赣州','景德镇','萍乡','分宜','长春','吉林','四平','延吉','松原','白山','通化','银川','石嘴山','吴忠','固原','西宁',
		'平安','同仁','共和','德令哈','门源','格尔木','太原','大同','阳泉','榆次','长治','晋城','临汾','吕梁','运城','忻州',
		'西安','咸阳','宝鸡','汉中','铜川','安康','商州','渭南','延安','乌鲁木齐','昌吉','伊宁','喀什','吐鲁番','昆明',
		'大理','曲靖','保山','玉溪','楚雄','思茅','郑州','开封','洛阳','平顶山','安阳','鹤壁','新乡','焦作','济源','濮阳',
		'许昌','漯河','三门峡','南阳','商丘','信阳','周口','驻马店','和平','河东','河西','南开','河北','红桥','塘沽','汉沽',
		'大港','东丽','西青','津南','北辰','宁河','武清','静海','宝坻','蓟县','开发','莱芜','聊城','石河子','瑞安','河源',
		'库尔勒','眉山','乳山','常熟','清远','广安','宿迁','黄冈','亳州','昆山','百色','孝感','香港','阿克苏','余姚','海安',
		'恩施','庆阳','辽源','金昌','白银','嘉峪关','甘南','陇南','海城','台湾','澳门','拉萨','日喀则','山南','昌都','那曲',
		'阿里','林芝','顺德','南海','鄂州','随州','天门','六安','黔东南州','黔南州','黔西南州','大兴安岭','鹤岗','伊春',
		'七台河','双鸭山','乌兰浩特','满洲里','牙克石','抚州','鹰潭市','新余','白城','延边州','和田','克拉玛依','伊犁',
		'哈密','鄂尔多斯','梅州','揭阳','潮州','达州','云浮','阿坝','湘西','呼伦贝尔','巴中','资阳','遂宁','广元','昭通',
		'文山','巴音郭楞','榆林','靖江','长寿','德宏','张家港','即墨','来宾','商洛','万源');

		$provArr = Array(	'北京','上海','天津','重庆','山东','广东','湖北','湖南','浙江','江苏','四川','河北','福建',
		'辽宁','安徽','甘肃','广西','海南','贵州','黑龙江','内蒙古','江西','吉林','宁夏','青海','山西','陕西',
		'西藏','新疆','云南','河南','香港','台湾','澳门');

		if ($ip == '') { $ip = $this->ip(); }
		$pos = $this->convertip($ip);

		foreach($cityArr as $k) {
			if (false===strpos($pos,$k)) {
				continue; 
			} else {
	      		return array('isCity'=>true,'name'=>$k);
	    	}
			//return '';
		}
		foreach($provArr as $k) {
			if (false===strpos($pos,$k)) {
				continue; 
			} else {
	      		return array('isCity'=>false,'name'=>$k);
	    	}
			//return '';
		}
		return array('isCity'=>false,'name'=>'北京');
	}

	/**
	 *  根据IP地址获得省份名称
	 *  周泉，2010.12.11 
	 *
	 */
	function get_prov_name( $ip='' ) {

		$array = Array(	'北京','上海','天津','重庆','山东','广东','湖北','湖南','浙江','江苏','四川','河北','福建',
		'辽宁','安徽','甘肃','广西','海南','贵州','黑龙江','内蒙古','江西','吉林','宁夏','青海','山西','陕西',
		'西藏','新疆','云南','河南','香港','台湾','澳门');

		if ($ip == '') { $ip = $this->ip(); }
		$pos = $this->convertip($ip);
		
		foreach($array as $k) {
			if (false===strpos($pos,$k)) {
				continue; 
			} else {
	      		return $k;
	    	}
			return '';
		}
	}

	/**
	 *  根据IP地址获得城市名称
	 *  周泉，2011.03.11 
	 *
	 */
	function get_city_name( $ip='' ) {

		$array = Array('东城','西城','崇文','宣武','朝阳','丰台','延庆','海淀','密云','房山','通州','顺义','昌平','大兴',
		'平谷','怀柔','石景山','门头沟','黄浦','青浦','崇明','上海','卢湾','徐汇','长宁','静安','普陀','闸北','虹口',
		'杨浦','闵行','宝山','嘉定','浦东','金山','松江','南汇','奉贤','天津','万州','涪陵','渝中','大渡口','江北',
		'沙坪坝','九龙坡','南岸','北碚','万盛','双桥','渝北','巴南','江津','合川','永川','南川','济南','青岛','日照',
		'东营','潍坊','泰安','淄博','烟台','威海','济宁','滨州','临沂','德州','菏泽','枣庄','广州','深圳','佛山','中山',
		'江门','惠州','东莞','汕头','湛江','茂名','肇庆','韶关','阳江','珠海','武汉','襄樊','宜昌','荆州','黄石','荆门',
		'十堰','潜江','仙桃','咸宁','长沙','株州','岳阳','常德','湘潭','娄底','怀化','永州','衡阳','邵阳','郴州','益阳',
		'张家界','吉首','杭州','嘉兴','温州','义乌','宁波','湖州','绍兴','台州','丽水','金华','衢州','舟山','南京','无锡',
		'镇江','南通','扬州','盐城','徐州','淮安','连云港','常州','泰州','苏州','成都','泸州','德阳','乐山','绵阳','宜宾',
		'自贡','攀枝花','内江','南充','石家庄','邯郸','秦皇岛','唐山','沧州','廊坊','保定','张家口','邢台','衡水','承德',
		'福州','泉州','三明','漳州','南平','宁德','龙岩','莆田','厦门','沈阳','大连','金州','瓦房店','庄河','阜新','辽阳',
		'丹东','营口','盘锦','抚顺','本溪','鞍山','锦州','葫芦岛','铁岭','朝阳','合肥','芜湖','蚌埠','巢湖','滁州','淮南',
		'安庆','池州','宣城','马鞍山','黄山','铜陵','宿州','淮北','阜阳','兰州','定西','平凉','武威','张掖','酒泉','天水',
		'临夏','南宁','桂林','柳州','梧州','玉林','钦州','北海','防城港','海口','三亚','儋县','贵阳','遵义','安顺','都匀',
		'凯里','铜仁','毕节','六盘水','兴义','哈尔滨','大庆','鸡西','齐齐哈尔','佳木斯','牡丹江','黑河','绥化','呼和浩特',
		'包头','乌海','集宁','通辽','赤峰','东胜','临河','锡林浩特','海拉尔','南昌','九江','上饶','陵川','宜春','吉安',
		'赣州','景德镇','萍乡','分宜','长春','吉林','四平','延吉','松原','白山','通化','银川','石嘴山','吴忠','固原','西宁',
		'平安','同仁','共和','德令哈','门源','格尔木','太原','大同','阳泉','榆次','长治','晋城','临汾','吕梁','运城','忻州',
		'西安','咸阳','宝鸡','汉中','铜川','安康','商州','渭南','延安','乌鲁木齐','昌吉','伊宁','喀什','吐鲁番','昆明',
		'大理','曲靖','保山','玉溪','楚雄','思茅','郑州','开封','洛阳','平顶山','安阳','鹤壁','新乡','焦作','济源','濮阳',
		'许昌','漯河','三门峡','南阳','商丘','信阳','周口','驻马店','和平','河东','河西','南开','河北','红桥','塘沽','汉沽',
		'大港','东丽','西青','津南','北辰','宁河','武清','静海','宝坻','蓟县','开发','莱芜','聊城','石河子','瑞安','河源',
		'库尔勒','眉山','乳山','常熟','清远','广安','宿迁','黄冈','亳州','昆山','百色','孝感','香港','阿克苏','余姚','海安',
		'恩施','庆阳','辽源','金昌','白银','嘉峪关','甘南','陇南','海城','台湾','澳门','拉萨','日喀则','山南','昌都','那曲',
		'阿里','林芝','顺德','南海','鄂州','随州','天门','六安','黔东南州','黔南州','黔西南州','大兴安岭','鹤岗','伊春',
		'七台河','双鸭山','乌兰浩特','满洲里','牙克石','抚州','鹰潭市','新余','白城','延边州','和田','克拉玛依','伊犁',
		'哈密','鄂尔多斯','梅州','揭阳','潮州','达州','云浮','阿坝','湘西','呼伦贝尔','巴中','资阳','遂宁','广元','昭通',
		'文山','巴音郭楞','榆林','靖江','长寿','德宏','张家港','即墨','来宾','商洛','万源');
		if ($ip == '') { $ip = $this->ip(); }
		$pos = $this->convertip($ip);
		foreach($array as $k) {
			if (false===strpos($pos,$k)) {
				continue;
			} else {
				return $k;
			}
			return '';
		}
	}

	/**
	 * 获取请求ip
	 *
	 * @return ip地址
	 */
	function ip() {
		if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
			$ip = getenv('HTTP_CLIENT_IP');
		} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
			$ip = getenv('REMOTE_ADDR');
		} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';
	}
	
	/**
	 *  IP 解析函数，源自 DISCUZ 论坛，misc.func.php
	 * 
	 *  调用下面两个函数具体处理。周泉
	 *  修改：默认使用纯真版 IP 库，增加数据转码。 
	 */
	function convertip($ip) {
	
		$return = '';
	
		if(preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/", $ip)) {
			$iparray = explode('.', $ip);
	
			if($iparray[0] == 10 || $iparray[0] == 127 || ($iparray[0] == 192 && $iparray[1] == 168) || ($iparray[0] == 172 && ($iparray[1] >= 16 && $iparray[1] <= 31))) {
				$return = '- LAN';
			} elseif($iparray[0] > 255 || $iparray[1] > 255 || $iparray[2] > 255 || $iparray[3] > 255) {
				$return = '- Invalid IP Address';
			} else {
				$tinyipfile = $this->tinyipfile;
				$fullipfile = $this->fullipfile;
				if(@file_exists($fullipfile)) {
					$code = 'gbk';
					$return = $this->convertip_full($ip, $fullipfile);
					$return = mb_convert_encoding($return, "UTF-8", "GBK");
				} elseif(@file_exists($tinyipfile)) {
					$code = 'utf-8';
					$return = $this->convertip_tiny($ip, $tinyipfile);
				}
			}
		}
		return $return;
	}
	
	function convertip_tiny($ip, $ipdatafile) {
	
		static $fp = NULL, $offset = array(), $index = NULL;
	
		$ipdot = explode('.', $ip);
		$ip    = pack('N', ip2long($ip));
	
		$ipdot[0] = (int)$ipdot[0];
		$ipdot[1] = (int)$ipdot[1];
	
		if($fp === NULL && $fp = @fopen($ipdatafile, 'rb')) {
			$offset = unpack('Nlen', fread($fp, 4));
			$index  = fread($fp, $offset['len'] - 4);
		} elseif($fp == FALSE) {
			return  '- Invalid IP data file';
		}
	
		$length = $offset['len'] - 1028;
		$start  = unpack('Vlen', $index[$ipdot[0] * 4] . $index[$ipdot[0] * 4 + 1] . $index[$ipdot[0] * 4 + 2] . $index[$ipdot[0] * 4 + 3]);
	
		for ($start = $start['len'] * 8 + 1024; $start < $length; $start += 8) {
	
			if ($index{$start} . $index{$start + 1} . $index{$start + 2} . $index{$start + 3} >= $ip) {
				$index_offset = unpack('Vlen', $index{$start + 4} . $index{$start + 5} . $index{$start + 6} . "\x0");
				$index_length = unpack('Clen', $index{$start + 7});
				break;
			}
		}
	
		fseek($fp, $offset['len'] + $index_offset['len'] - 1024);
		if($index_length['len']) {
			return '- '.fread($fp, $index_length['len']);
		} else {
			return '- Unknown';
		}
	
	}
	
	function convertip_full($ip, $ipdatafile) {
	
		if(!$fd = @fopen($ipdatafile, 'rb')) {
			return '- Invalid IP data file';
		}
	
		$ip = explode('.', $ip);
		$ipNum = $ip[0] * 16777216 + $ip[1] * 65536 + $ip[2] * 256 + $ip[3];
	
		if(!($DataBegin = fread($fd, 4)) || !($DataEnd = fread($fd, 4)) ) return;
		@$ipbegin = implode('', unpack('L', $DataBegin));
		if($ipbegin < 0) $ipbegin += pow(2, 32);
		@$ipend = implode('', unpack('L', $DataEnd));
		if($ipend < 0) $ipend += pow(2, 32);
		$ipAllNum = ($ipend - $ipbegin) / 7 + 1;
	
		$BeginNum = $ip2num = $ip1num = 0;
		$ipAddr1 = $ipAddr2 = '';
		$EndNum = $ipAllNum;
		while($ip1num > $ipNum || $ip2num < $ipNum) {
			$Middle= intval(($EndNum + $BeginNum) / 2);
	
			fseek($fd, $ipbegin + 7 * $Middle);
			$ipData1 = fread($fd, 4);
			if(strlen($ipData1) < 4) {
				fclose($fd);
				return '- System Error';
			}
			$ip1num = implode('', unpack('L', $ipData1));
			if($ip1num < 0) $ip1num += pow(2, 32);
	
			if($ip1num > $ipNum) {
				$EndNum = $Middle;
				continue;
			}
	
			$DataSeek = fread($fd, 3);
			if(strlen($DataSeek) < 3) {
				fclose($fd);
				return '- System Error';
			}
			$DataSeek = implode('', unpack('L', $DataSeek.chr(0)));
			fseek($fd, $DataSeek);
			$ipData2 = fread($fd, 4);
			if(strlen($ipData2) < 4) {
				fclose($fd);
				return '- System Error';
			}
			$ip2num = implode('', unpack('L', $ipData2));
			if($ip2num < 0) $ip2num += pow(2, 32);
	
			if($ip2num < $ipNum) {
				if($Middle == $BeginNum) {
					fclose($fd);
					return '- Unknown';
				}
				$BeginNum = $Middle;
			}
		}
	
		$ipFlag = fread($fd, 1);
		if($ipFlag == chr(1)) {
			$ipSeek = fread($fd, 3);
			if(strlen($ipSeek) < 3) {
				fclose($fd);
				return '- System Error';
			}
			$ipSeek = implode('', unpack('L', $ipSeek.chr(0)));
			fseek($fd, $ipSeek);
			$ipFlag = fread($fd, 1);
		}
	
		if($ipFlag == chr(2)) {
			$AddrSeek = fread($fd, 3);
			if(strlen($AddrSeek) < 3) {
				fclose($fd);
				return '- System Error';
			}
			$ipFlag = fread($fd, 1);
			if($ipFlag == chr(2)) {
				$AddrSeek2 = fread($fd, 3);
				if(strlen($AddrSeek2) < 3) {
					fclose($fd);
					return '- System Error';
				}
				$AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));
				fseek($fd, $AddrSeek2);
			} else {
				fseek($fd, -1, SEEK_CUR);
			}
	
			while(($char = fread($fd, 1)) != chr(0))
			$ipAddr2 .= $char;
	
			$AddrSeek = implode('', unpack('L', $AddrSeek.chr(0)));
			fseek($fd, $AddrSeek);
	
			while(($char = fread($fd, 1)) != chr(0))
			$ipAddr1 .= $char;
		} else {
			fseek($fd, -1, SEEK_CUR);
			while(($char = fread($fd, 1)) != chr(0))
			$ipAddr1 .= $char;
	
			$ipFlag = fread($fd, 1);
			if($ipFlag == chr(2)) {
				$AddrSeek2 = fread($fd, 3);
				if(strlen($AddrSeek2) < 3) {
					fclose($fd);
					return '- System Error';
				}
				$AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));
				fseek($fd, $AddrSeek2);
			} else {
				fseek($fd, -1, SEEK_CUR);
			}
			while(($char = fread($fd, 1)) != chr(0))
			$ipAddr2 .= $char;
		}
		fclose($fd);
	
		if(preg_match('/http/i', $ipAddr2)) {
			$ipAddr2 = '';
		}
		$ipaddr = "$ipAddr1 $ipAddr2";
		$ipaddr = preg_replace('/CZ88\.NET/is', '', $ipaddr);
		$ipaddr = preg_replace('/^\s*/is', '', $ipaddr);
		$ipaddr = preg_replace('/\s*$/is', '', $ipaddr);
		if(preg_match('/http/i', $ipaddr) || $ipaddr == '') {
			$ipaddr = '- Unknown';
		}
	
		return '- '.$ipaddr;
	
	}

}
/*
header('Content-Type: text/html; charset=utf-8');
$test = new IPData();
echo $test->get_prov_name('222.173.27.114');
echo '<br /><br />';
echo $test->get_city_name('222.173.27.114');
*/
?>