<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$dbConfig = require_once dirname(__FILE__). DS. 'dbconfig.php' ;
$dbConfig2 = require_once dirname(__FILE__). DS. 'dbconfig2.php' ;
$params = require_once dirname(__FILE__). DS. 'params.php' ;

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'weihan',
	'charset' => 'utf-8',
	'language' => 'zh_CN',
	//默认控制器
	'defaultController'=>'site',	

// 	'catchAllRequest'=>array('site/all'),	//所有的请求转发到一个地方(网站打不开，或者维护程序时使用)
	
	//Raised right BEFORE the application processes the request.
// 	'onBeginRequest' => 'AskTool::appBeginRequest',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		//加载扩展，widget	
		'application.extensions.*',
		'application.extensions.giix-components.*',
		'application.widget.*',
			
			'application.extensions.sharding.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
				
			'generatorPaths' => array(
					//不是原始的giix，又添加了yii-generator-collection这个扩展
					'ext.giix-core', // giix generators
// 					'ext.gtc', // 
			),
		),

		//登陆退出，用户管理等demo
		'user'=>array(
			
		),	
			
		//demo模块
		'demo'=>array(
			'layout'=>'main',	
		),
		
			
		//读写分离分表 模块
		'sharding'=>array(
			'layout'=>'main',
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			//多个分站，
// 			'identityCookie'=>array('domain'=>'.test.com'),
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => $dbConfig['connectionString'],
			'emulatePrepare' => $dbConfig['emulatePrepare'],
			'username' => $dbConfig['username'],
			'password' => $dbConfig['password'],
			'charset' => $dbConfig['charset'],
				
			'schemaCachingDuration' => 3600,	//cache table metadata 
			'enableProfiling'=>true,			//记录sql语句执行时间
			'enableParamLogging'=>true,			//日志的bind的参数后边跟数的值
		),
			
		'readDb'=>array(
			'class' => 'CDbConnection',
			'connectionString' => $dbConfig2['connectionString'],
			'emulatePrepare' => $dbConfig2['emulatePrepare'],
			'username' => $dbConfig2['username'],
			'password' => $dbConfig2['password'],
			'charset' => $dbConfig2['charset'],
	
			'schemaCachingDuration' => 3600,	//cache table metadata
			'enableProfiling'=>true,			//记录sql语句执行时间
			'enableParamLogging'=>true,			//日志的bind的参数后边跟数的值
		),
		'writeDb'=>array(
			'class' => 'CDbConnection',
			'connectionString' => $dbConfig2['connectionString'],
			'emulatePrepare' => $dbConfig2['emulatePrepare'],
			'username' => $dbConfig2['username'],
			'password' => $dbConfig2['password'],
			'charset' => $dbConfig2['charset'],
	
			'schemaCachingDuration' => 3600,	//cache table metadata
			'enableProfiling'=>true,			//记录sql语句执行时间
			'enableParamLogging'=>true,			//日志的bind的参数后边跟数的值
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),

		'cache' => array(
				'class' => 'CFileCache',
				'directoryLevel' => 2,
		),
		
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
			
				array(
					'class'=>'CWebLogRoute',
					'levels'=>'trace, info, error, warning',
// 					'filter'=>'CLogFilter',			//记录$_GET,$_SESSION等信息
// 					'categories' => 'system.db.*',	//只显示数据库日志
// 					'showInFireBug' => true, 		//将在firebug(chrome的console)中显示日志
				),
				
				array(
					'class'=>'CProfileLogRoute',
					'levels'=>'trace, error, warning',
				),
				
			),
		),
			
		//合并js与css文件	
		'clientScript' => array(
			'class' => 'ext.eclientScript.EClientScript',
			//合并js文件
			'combineScriptFiles' => true, // By default this is set to false, set this to true if you'd like to combine the script files
			//合并css文件
			'combineCssFiles' => true, // By default this is set to false, set this to true if you'd like to combine the css files
			//压缩js文件
			'optimizeScriptFiles' => !YII_DEBUG,	// @since: 1.1
			//压缩css文件
			'optimizeCssFiles' => true,	// @since: 1.1
		),
			
		'mailer' => array(
			'class' => 'application.extensions.mailer.EMailer',
			'pathViews' => 'application.views.email',
			'pathLayouts' => 'application.views.email.layouts',
	
			'CharSet' => 'UTF-8',
			'SMTPAuth' => TRUE,
			'Host' => 'smtp.126.com',
			'Username' => 'chi-na@126.com',
			'Password' => '',
			'realname' => '微寒',
		),
		//消息提示组件
		'msg' => array(
			'class' => 'application.extensions.Msg',
		),
			
		//文件文件夹操作扩展，用法参考readme
		'file'=>array(
				'class'=>'application.extensions.file.CFile',
		),
		
		//图片缩略图，参考readme
		'phpThumb'=>array(
				'class'=>'ext.phpThumb.EPhpThumb',
// 				'options'=>array(optional phpThumb specific options are added here)
		),
			
	
		'request'=>array(
		// 		'enableCsrfValidation'=>true,	//防止post跨站攻击，这时候生成表单要用CHtml::form(),其会写一段代码在cookie中
		// 		'enableCookieValidation'=>true,	//防止Cookie攻击，同时生成与得到cookie是要用 CHttpCookie
		),
			
			
		//sharding
		
	),

	
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>$params,
);