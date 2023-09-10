<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . $_ENV['HELIOS_DB_HOST'] . ';dbname=' .$_ENV['HELIOS_DB_NAME'],
    'username' => $_ENV['HELIOS_DB_USER'],
    'password' => $_ENV['HELIOS_DB_PASSWORD'],
    'charset' => 'utf8',
];