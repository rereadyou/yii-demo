<?php

return array(
    // 网站名称
    'sitename' =>'abd',
	//js,css文件 
	'resourceBaseUrl' => '/',
	
	'UID' =>'souask[UID]',	//用户的ID
	'UNM' =>'souask[UNM]',	//用户名
	'UPW' =>'souask[UPW]',	//密码
	'UJF' =>'souask[UJF]',	//用户的Score
	'UTY' =>'souask[UTY]',	//userClassID
	'STR' =>'souask[STR]',	//isStar
	
	'userpic'=>'http://img.9ask.cn',
	'certpic'=>'http://127.0.0.1/newyii/askyii/'
);

function md5_16($psw){
	return substr(md5($psw),8,16);
}