<?php

namespace app\components\repositories;

use app\models\HeliosDbDriver;
use app\models\HeliosDbException;
use Throwable;
use Yii;
use yii\db\Connection;

class ProductHeliosRepository implements HeliosDbDriver
{
    /**
     * @throws HeliosDbException
     */
    public function getProduct(string $id): array
    {
        $connection = $this->getConnection();

        try {
            return $connection
                ->createCommand('SELECT * FROM product WHERE id = :id')
                ->bindParam(':id', $id)
                ->queryOne();
        } catch (Throwable $throwable) {
            throw new HeliosDbException('Product is not found');
        }
    }

    private function getConnection(): Connection
    {
        return Yii::$app->dbMsSql;
    }
}