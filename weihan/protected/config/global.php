<?php
/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
 
/**
 * This is the shortcut to Yii::app()
 * @return CWebApplication
 */
function app()
{
    return Yii::app();
}
 
/**
 * This is the shortcut to Yii::app()->clientScript
 * @return CClientScript
 */
function cs()
{
    // You could also call the client script instance via Yii::app()->clientScript
    // But this is faster
    return Yii::app()->getClientScript();
}


/**
 * This is the shortcut to Yii::app()->cache
 * @return CCache 
 */
function cache()
{
    // You could also call the client script instance via Yii::app()->cache
    // But this is faster
    return Yii::app()->getCache();
}
 
/**
 * This is the shortcut to Yii::app()->user.
 * @return CWebUser
 */
function user() 
{
    return Yii::app()->getUser();
}

/**
 * @return CHttpRequest
 */
function request(){
	require Yii::app()->getRequest();
}

/**
 * This is the shortcut to Yii::app()->createUrl()
 */
function url($route,$params=array(),$ampersand='&')
{
    return Yii::app()->createUrl($route,$params,$ampersand);
}
 
/**
 * This is the shortcut to CHtml::encode
 */
function h($text)
{
    return htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset);
}
 
/**
 * This is the shortcut to CHtml::link()
 */
function l($text, $url = '#', $htmlOptions = array()) 
{
    return CHtml::link($text, $url, $htmlOptions);
}
 
/**
 * This is the shortcut to Yii::t() with default category = 'stay'
 */
function t($message, $category = 'stay', $params = array(), $source = null, $language = null) 
{
    return Yii::t($category, $message, $params, $source, $language);
}
 
/**
 * This is the shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function bu($url=null) 
{
    static $baseUrl;
    if ($baseUrl===null)
        $baseUrl=Yii::app()->getRequest()->getBaseUrl();
    return $url===null ? $baseUrl : $baseUrl.'/'.ltrim($url,'/');
}
 
/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::app()->params[$name].
 */
function param($name) 
{
    return Yii::app()->params[$name];
}


function resBu($url = null)
{
    static $resourceBaseUrl;
    if ($resourceBaseUrl === null)
        $resourceBaseUrl = rtrim(param('resourceBaseUrl'), '/') . '/';
    
    return $url === null ? $resourceBaseUrl : $resourceBaseUrl . ltrim($url, '/');
}
/**
 * 持久连接
 * Enter description here ...
 * @return CStatePersister
 */
function state(){
	return Yii::app()->statePersister;
}

/**
 * @return CHttpSession
 */
function session(){
	return Yii::app()->session;
}

function scriptsPath($js_name){
	
		$basePath = Yii::app()->getBasePath();
		$scriptsPath = $basePath .DS. '..'. DS. 'scripts'. DS .$js_name;
		
		//发布目录下的js
		$scriptsPath = Yii::app()->assetManager->publish($scriptsPath);
		
	
	return $scriptsPath;
}

function cssPath($css_name){
	
		$basePath = Yii::app()->getBasePath();
		$cssPath = $basePath .DS. '..'. DS. 'css'. DS. $css_name;

		//发布目录下的css
		$cssPath = Yii::app()->assetManager->publish($cssPath);
		
	
	return $cssPath;
}

//---------------------------------------------------------------------------------------------------------------------->
//												华丽的分界线
//---------------------------------------------------------------------------------------------------------------------->
/**
 * 以下函数与yii不关联
 */

function ip()
{
	if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown'))
	{
		$ip = getenv('HTTP_CLIENT_IP');
	}
	elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown'))
	{
		$ip = getenv('HTTP_X_FORWARDED_FOR');
	}
	elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown'))
	{
		$ip = getenv('REMOTE_ADDR');
	}
	elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown'))
	{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return preg_match("/[\d\.]{7,15}/", $ip, $matches) ? $matches[0] : 'unknown';
}

//字符串截取类，默认编码是utf8
function  str_cut($string, $length, $dot = '...', $charset='utf-8') {
	$strlen = strlen($string);
	if($strlen <= $length) return $string;
	$string = str_replace(array('&nbsp;', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), array(' ', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), $string);
	$strcut = '';
	if(strtolower($charset) == 'utf-8') {
		$n = $tn = $noc = 0;
		while($n < $strlen) {
			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1;
				$n++;
				$noc++;
			} elseif(194 <= $t && $t <= 223) {
				$tn = 2;
				$n += 2;
				$noc += 2;
			} elseif(224 <= $t && $t < 239) {
				$tn = 3;
				$n += 3;
				$noc += 2;
			} elseif(240 <= $t && $t <= 247) {
				$tn = 4;
				$n += 4;
				$noc += 2;
			} elseif(248 <= $t && $t <= 251) {
				$tn = 5;
				$n += 5;
				$noc += 2;
			} elseif($t == 252 || $t == 253) {
				$tn = 6;
				$n += 6;
				$noc += 2;
			} else {
				$n++;
			}
			if($noc >= $length) break;
		}
		if($noc > $length) $n -= $tn;
		$strcut = substr($string, 0, $n);
	}
	else {
		$dotlen = strlen($dot);
		$maxi = $length - $dotlen - 1;
		for($i = 0; $i < $maxi; $i++) {
			$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		}
	}
	$strcut = str_replace(array('&', '"', "'", '<', '>'), array('&amp;', '&quot;', '&#039;', '&lt;', '&gt;'), $strcut);
	return $strcut;
}