<?php
return [
	'name' => 'BB Portal',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
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
    ],
	'timeZone' => 'Asia/Kolkata',
];
