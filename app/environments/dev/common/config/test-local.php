<?php
return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/main.php'),
    require(__DIR__ . '/main-local.php'),
    require(__DIR__ . '/test.php'),
    [
        'components' => [
            'db' => [
                'class' => 'yii\db\Connection',
                'dsn' => 'mysql:host=mysql;dbname=example_project_dev',
                'username' => 'example_project_dev',
                'password' => 'example_project_dev',
                'charset' => 'utf8',
            ],
        ],
    ]
);
