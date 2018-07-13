<?php
return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/main.php'),
    require(__DIR__ . '/main-local.php'),
    require(__DIR__ . '/test.php'),
    [
        'components' => [
            'db' => [
                'class'    => 'yii\db\Connection',
                'dsn'      => 'mysql:host=mysql_test;dbname=example_project_test',
                'username' => 'example_project_test',
                'password' => 'example_project_test',
                'charset'  => 'utf8',
            ],
        ],
    ]
);
