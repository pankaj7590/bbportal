<?php
use kartik\mpdf\Pdf;

return [
	'name' => 'BB Portal',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=salokhedb.cz5clg6acpou.ap-southeast-1.rds.amazonaws.com;dbname=bbportal',
            'username' => 'salokheaws',
            'password' => 'sal0kh3aw5',
            'charset' => 'utf8',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'assetManager' => [
			'bundles' => [
				'dmstr\web\AdminLteAsset' => [
					'skin' => 'skin-yellow-light',
				],
			],
		],
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
		'pdf' => [
			'class' => Pdf::classname(),
			'mode' => Pdf::MODE_CORE, 
			'format' => Pdf::FORMAT_A4,
			'orientation' => Pdf::ORIENT_LANDSCAPE,
			'destination' => Pdf::DEST_BROWSER,
		]
    ],
	'timeZone' => 'Asia/Kolkata',
];
