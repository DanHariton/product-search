<?php

namespace app\components\repositories;

use app\models\LocalDbDriver;
use app\models\LocalDbException;
use Throwable;
use Yii;
use yii\db\Connection;

class ProductLocalRepository implements LocalDbDriver
{
    /**
     * @throws LocalDbException
     */
    public function findProductById(string $id): array
    {
        $connection = $this->getConnection();

        try {
            return $connection
                ->createCommand('SELECT * FROM product WHERE id = :id')
                ->bindParam(':id', $id)
                ->queryOne();
        } catch (Throwable $throwable) {
            throw new LocalDbException('Product is not found');
        }
    }

    private function getConnection(): Connection
    {
        return Yii::$app->db;
    }
}