<?php
use common\models\UserSearch;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
			'controllerMap' => [
				'assignment' => [
					'class' => 'mdm\admin\controllers\AssignmentController',
					/* 'userClassName' => 'app\models\User', */
					'idField' => 'id',
					'usernameField' => 'username',
					'fullnameField' => 'name',
					'extraColumns' => [
						[
							'attribute' => 'name',
							'label' => 'Name',
							'value' => function($model, $key, $index, $column) {
								return $model->name;
							},
						],
						[
							'attribute' => 'email',
							'label' => 'Email',
							'value' => function($model, $key, $index, $column) {
								return $model->email;
							},
						],
						[
							'attribute' => 'mobile',
							'label' => 'Mobile',
							'value' => function($model, $key, $index, $column) {
								return $model->mobile;
							},
						],
					],
					'searchClass' => 'common\models\UserSearch'
				],
			],
        ]
	],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => false,
            'rules' => [
				'' => 'site/index'
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
        ]
    ],
    'params' => $params,
];
