<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class ProductController extends Controller
{
    public function actionDetail(string $id)
    {
        $test = Yii::$app->db->createCommand('SELECT * FROM product;')->queryAll();
        dump($test);
        die();
    }
}