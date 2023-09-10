<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property int|null $id
 * @property string|null $name
 * @property int|null $price
 * @property string|null $description
 * @property string|null $vendor
 * @property string|null $color
 */
class Product extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id', 'price'], 'integer'],
            [['name', 'description', 'vendor'], 'string', 'max' => 256],
            [['color'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'description' => 'Description',
            'vendor' => 'Vendor',
            'color' => 'Color',
        ];
    }
}
