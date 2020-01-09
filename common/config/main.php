<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [

            'class' => 'yii\web\UrlManager',

            'enablePrettyUrl' => true,

            'showScriptName' => false,

            'rules'=> [

                ['class'=>'yii\rest\UrlRule',

                    'controller' => 'user',

                    'pluralize' => 'false',

				     //'extraPatterns' => ['GET hello' => 'hello',]
				 ],
            ],
        ],
    ],
];
