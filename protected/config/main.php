<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias( 'bootstrap', dirname( __FILE__ ).'/../extensions/bootstrap' );
Yii::setPathOfAlias( 'ext', dirname( __FILE__ ).'/../extensions' );
Yii::setPathOfAlias('charts', dirname( __FILE__ ).'/../../Charts');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname( __FILE__ ).DIRECTORY_SEPARATOR.'..',
	'name'=>'Application Discovery Portal',

	// preloading 'log' component
	'preload'=>array( 'log' ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'theme'=>'bootstrap',
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'secure',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array( '127.0.0.1', '::1' ),
			'generatorPaths'=>array(
				'bootstrap.gii',
			),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			//'allowAutoLogin'=>true,
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
		// 'db'=>array(
		//  'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		// ),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=ARP;',
			'emulatePrepare' => true,
			'enableParamLogging'=>true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
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
				),
			),
		),
		'bootstrap'=>array(
			'class'=>'bootstrap.components.Bootstrap',
		),
		'fusioncharts' => array(
			'class' => 'ext.fusioncharts.fusionCharts',
		),
		// 'fusioncharts' => array(
		// 	'class' => 'charts.FusionCharts',
		// ),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'vandhanaa.meenakshi@gmail.com',
	),
);
