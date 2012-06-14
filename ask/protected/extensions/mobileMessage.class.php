<?php
/*
 * 发送短信类，
 *  $mm = new MobileMessage();
	$mm->send('13928783309,13800008888','你好短信内容');
 */
class MobileMessage{
	//账号
	private $uid = 'bjsw';
	//密码
	private $pwd = 'an2010yuan9';
	//默认的方式
	private $default_method = 'POST';
	//编码
	private $charset = 'GB2312';
	//操作系统
	private $os = '';

	private $base_url = 'http://service.winic.org:8009/sys_port/gateway/?';

	/*
	 * 发送短信，
	 * $mobiles 可以是字符串，也可以数组
	 * $msg 会自动进行转码
	 * $uid,$pwd默认使用类设定的，用户也可以自定义
	 */
	public function send($mobiles, $msg, $uid = '', $pwd = ''){
		empty($uid) && $uid = $this->uid;
		empty($pwd) && $pwd = $this->pwd;
		$msg = $this->iconvMsg($msg);
		$os = $this->getServerOS();
		is_array($mobiles) && $mobiles = implode(',', $mobiles);

		if ($os == 'windows'){
			return $this->send_windows($mobiles, $msg, $uid, $pwd);
		}else {
			return $this->send_linux($mobiles, $msg, $uid, $pwd);
		}
	}
	//获取服务器操作系统
	function getServerOS(){
		if (substr(PHP_OS, 0, 3) == 'WIN' || (isset($_ENV['OS']) && strstr($_ENV['OS'], 'indow'))){
			return 'windows';
		}
		return 'linux';
	}

	function send_linux($mobiles, $msg, $uid, $pwd){
		$sdata = 'id='.urlencode($uid).'&pwd='.urlencode($pwd).'&to='.urlencode($mobiles).'&content='.urlencode($msg).'&time=';

		if ($this->default_method == 'POST'){
			return $this->send_linux_post($sdata);
		}else {
			return $this->send_linux_get($sdata);
		}
	}

	function send_linux_post($sdata){
		$rurl = $this->base_url . $sdata;
		curl_init();
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL,$rurl);
		$result = curl_exec($ch);
		$ret = file($result);
		return $ret;
	}
	function send_linux_get($sdata){
		$rurl = $this->base_url . $sdata;
		$ret = file($rurl);
		return $ret;
	}

	function send_windows($mobiles, $msg, $uid, $pwd){
//		$sdata = "id=$uid&pwd=$pwd&to=$mobiles&content=$msg&time=";
		$sdata = 'id='.urlencode($uid).'&pwd='.urlencode($pwd).'&to='.urlencode($mobiles).'&content='.urlencode($msg).'&time=';

		if ($this->default_method == 'POST'){
			return $this->send_windows_post($sdata);
		}else {
			return $this->send_windows_get($sdata);
		}
	}

	function send_windows_post($sdata){
//		echo $this->base_url.$sdata;
		$xhr=new COM("MSXML2.XMLHTTP");
		$xhr->open("POST",$this->base_url,false);
		$xhr->setRequestHeader("Content-type:", "text/xml;charset=$this->charset");
		$xhr->setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		$xhr->send($sdata);
		return $xhr->responseText;
	}
	function send_windows_get($sdata){
		$sendurl = $this->base_url . $sdata;
		$xhr=new COM("MSXML2.XMLHTTP");
		$xhr->open("GET",$sendurl,false);
		$xhr->send();
		return $xhr->responseText;
	}

	//如果传入的是utf8 的字符串，而需要发送的是gbk的，则进行转码
	function iconvMsg($msg){
		if (stripos($this->charset, 'GB') > -1)
			$this->is_utf8($msg) && $msg = iconv("utf-8","gb2312",$msg);
		return $msg;
	}
	//验证字符串是否是utf8编码
	function is_utf8($word)
	{
		if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$word) == true)
		{
			return true;
		}else{     
			return false;
		}

	}
}
?>