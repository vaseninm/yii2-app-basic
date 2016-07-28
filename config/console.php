<?php

$common = require(__DIR__ . '/common.php');
$localCommon = file_exists(__DIR__ . '/local.common.php') ? require(__DIR__ . '/local.common.php') : [];
$local = file_exists(__DIR__ . '/local.console.php') ? require(__DIR__ . '/local.console.php') : [];

$config = [
    'controllerNamespace' => 'app\commands',
    'components' => [
    ],
    'params' => [],
];

if (YII_ENV_DEV) {
    
}

return \yii\helpers\ArrayHelper::merge(
    $common, \yii\helpers\ArrayHelper::merge(
        $config, \yii\helpers\ArrayHelper::merge(
            $localCommon, $local
        )
    )
);
