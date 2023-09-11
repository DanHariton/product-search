<?php

namespace app\controllers;

use app\models\HeliosDbException;
use app\models\LocalDbException;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class ProductController extends Controller
{
    /**
     * @throws HeliosDbException
     * @throws LocalDbException
     */
    public function actionDetail(string $id)
    {
        $response = Yii::$app->response;
        $response->format = Response::FORMAT_JSON;
        $response->data = Yii::$app->productProvider->getProduct($id);
        Yii::$app->productRequestsLogger->log($id);

        return $response;
    }
}