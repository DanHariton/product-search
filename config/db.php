<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . $_ENV['LOCAL_DB_HOST'] . ';dbname=' . $_ENV['LOCAL_DB_NAME'],
    'username' => $_ENV['LOCAL_DB_USER'],
    'password' => $_ENV['LOCAL_DB_PASSWORD'],
    'charset' => 'utf8',
];