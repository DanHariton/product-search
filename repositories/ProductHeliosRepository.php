<?php

namespace repositories;

use app\models\HeliosDbDriver;
use Yii;
use yii\db\Connection;

class ProductHeliosRepository implements HeliosDbDriver
{
    public function getProduct(string $id): array
    {
        $connection = self::getConnection();

    }

    private function getConnection(): Connection
    {
        return Yii::$app->dbMsSql;
    }
}