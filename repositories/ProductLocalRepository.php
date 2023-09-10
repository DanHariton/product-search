<?php

namespace repositories;

use app\models\LocalDbDriver;
use Yii;
use yii\db\Connection;

class ProductLocalRepository implements LocalDbDriver
{
    public function findProductById(string $id): array
    {
        $connection = self::getConnection();
    }

    private function getConnection(): Connection
    {
        return Yii::$app->db;
    }
}