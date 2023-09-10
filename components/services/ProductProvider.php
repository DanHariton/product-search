<?php

namespace app\components\services;

use app\components\repositories\ProductHeliosRepository;
use app\components\repositories\ProductLocalRepository;
use app\models\HeliosDbException;
use app\models\LocalDbException;
use Yii;
use yii\base\Component;

class ProductProvider extends Component
{
    private ProductHeliosRepository $productHeliosRepository;

    private ProductLocalRepository $productLocalRepository;

    private bool $useLocalDb;

    public function __construct(ProductHeliosRepository $productHeliosRepository,
                                ProductLocalRepository $productLocalRepository)
    {
        $this->productHeliosRepository = $productHeliosRepository;
        $this->productLocalRepository = $productLocalRepository;
        $this->useLocalDb = $_ENV['USE_LOCAL_DB'];

        parent::__construct();
    }


    /**
     * @throws HeliosDbException
     * @throws LocalDbException
     */
    public function getProduct(string $id): array
    {
        $product = Yii::$app->cacheManager->getData($id);

        if (!$product) {
            if ($this->useLocalDb) {
                $product = $this->productLocalRepository->findProductById($id);
            } else {
                $product = $this->productHeliosRepository->getProduct($id);
            }

            Yii::$app->cacheManager->addData($id, $product);
        }

        return $product;
    }
}