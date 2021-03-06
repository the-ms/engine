<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'engine',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'cookieValidationKeyValue',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => array(
                '<module:module>/<controller:admin>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',

                '<module:module>/<controller:admin>/<action:\w+>' => '<module>/<controller>/<action>',
                '<module:module>/<action:\w+>/<id:\d+>' => '<module>/default/<action>',

                '<module:module>/<controller:admin>' => '<module>/<controller>',
                '<module:module>/<action:\w+>' => '<module>/default/<action>',

                '<action:login|logout>' => 'site/<action>',
            ),
        ],
    ],
    'modules' => [
        'module' => [
            'class' => 'app\modules\module\Module',
        ],
    ],
    'aliases' => [
        '@drmonty' => dirname(__DIR__) . '\vendor\drmonty',
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
