<?php
return array(
	'connectionString' => 'mysql:host=localhost;dbname=yii',
	'emulatePrepare' => true,		//有利于提高mysql的速度， 但是对mssql来说会报错
	'username' => 'root',
	'password' => '1',
	'charset' => 'utf8',
// 	'tablePrefix' => 'tbl_',
	'persistent' => false,
);