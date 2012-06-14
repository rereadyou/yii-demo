<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$dbConfig = require(dirname(__FILE__) . DS . 'dbconfig.php');
$db2Config = require(dirname(__FILE__) . DS . 'db2config.php');
$db3Config = require(dirname(__FILE__) . DS . 'db3config.php');
$params = require(dirname(__FILE__) . DS . 'params.php');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
	'charset' => 'utf-8',
    'language' => 'zh_CN',
	'defaultController'=>'ask',

	'onBeginRequest' => 'AskTool::appBeginRequest', 
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.*',
		'application.widget.*'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
	
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
		),
		'user' =>array(
			'layout' => 'main',
		),
		'person'=>array(
			'layout'=>'main',
		)
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
 
		'urlManager'=>array(
			'urlFormat'=>'path',
			  'showScriptName' => FALSE,
        		'urlSuffix' => '',

                        'rules'=>array(
                                 '/<_a:(all|hot|recommend|solved|nosolved|highscore|noanswer)>/<page>'=>'ask/list<_a>','/<_a:(all|hot|recommend|solved|nosolved|highscore|noanswer)>'=>'ask/list<_a>',//全部最新咨询
                                '/catalog_<cname>/<_a:(all|hot|recommend|solved|nosolved|highscore|noanswer)>/<page:\d+>'=>'ask/categorylist<_a>','/catalog_<cname>/<_a:(all|hot|recommend|solved|nosolved|highscore|noanswer)>'=>'ask/categorylist<_a>',//类别列表页
                                '/<area>/<_a:(all|hot|recommend|solved|nosolved|highscore|noanswer)>/<page:\d+>'=>'ask/arealist<_a>','/<area>/<_a:(all|hot|recommend|solved|nosolved|highscore|noanswer)>'=>'ask/arealist<_a>',//地区列表页
                                 //咨询最终页
                                '/question/2011/<id>.html'=>'zixun/show',
				 'ask.php'=>'zixun/publish',
                                 //咨询发布页
                             
                               
                              //'user/<controller:\w+>/<action:\w+>'=>'user/<controller>/<action>',
                              // '<controller:\w+>/<action:\w+>/<page>'=>'<controller>/<action>',
                                  
				//'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				//'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				//'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'db' => array(
		    'class' => 'CDbConnection',
			'connectionString' => $dbConfig['connectionString'],
		    'username' => $dbConfig['username'],
		    'password' => $dbConfig['password'],
		    'charset' => $dbConfig['charset'],
		    'persistent' => $dbConfig['persistent'],
			'emulatePrepare' => false, 
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
		      'schemaCachingDuration' => 600,    // metadata 缓存超时时间(s)
		),
		'db2' => array(
		    'class' => 'CDbConnection',
			'connectionString' => $db2Config['connectionString'],
		    'username' => $db2Config['username'],
		    'password' => $db2Config['password'],
		    'charset' => $db2Config['charset'],
		    'persistent' => $db2Config['persistent'],
			'emulatePrepare' => false, 
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
		    'schemaCachingDuration' => 3600,    // metadata 缓存超时时间(s)
		),
		'db3' => array(
		    'class' => 'CDbConnection',
			'connectionString' => $db3Config['connectionString'],
		    'username' => $db3Config['username'],
		    'password' => $db3Config['password'],
		    'charset' => $db3Config['charset'],
		    'persistent' => $db3Config['persistent'],
			'emulatePrepare' => false, 
			'enableProfiling'=>true,
			'enableParamLogging'=>true,
		    'schemaCachingDuration' => 3600,    // metadata 缓存超时时间(s)
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
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
			
				/*array(
				'class'=>'CWebLogRoute',
				  //'levels'=>'trace, info, error, warning',
                'levels'=>'trace,info',
				'categories' => 'system.db.*',
				//'showInFireBug' => true, 将在firebug中显示日志
				),*
				/*
				array(
				'class'=>'CProfileLogRoute',
				'levels'=>'error, warning',
				),
				*/
				
			),
		),
		'mailer' => array(
			'class' => 'application.extensions.mailer.EMailer',
	        'pathViews' => 'application.views.email',
	        'pathLayouts' => 'application.views.email.layouts',
		  
	        'CharSet' => 'UTF-8',
			'SMTPAuth' => TRUE,
			'Host' => 'mail.9ask.cn',
			'Username' => 'souask',
		  	'Password' => 'souask',
			'realname' => '中顾法律网',
	   ),
	   //消息提示组件
		'msg' => array(
	   		'class' => 'application.extensions.Msg',
	   ),		
		
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => $params,
);
