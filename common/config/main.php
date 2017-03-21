<?php
use kartik\mpdf\Pdf;

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
