<?php

$common = require(__DIR__ . '/common.php');
$localCommon = file_exists(__DIR__ . '/local.common.php') ? require(__DIR__ . '/local.common.php') : [];
$local = file_exists(__DIR__ . '/local.web.php') ? require(__DIR__ . '/local.web.php') : [];

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => [],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];
}

return \yii\helpers\ArrayHelper::merge(
    $common, \yii\helpers\ArrayHelper::merge(
        $config, \yii\helpers\ArrayHelper::merge(
            $localCommon, $local
        )
    )
);