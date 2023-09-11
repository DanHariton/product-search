<?php

namespace app\components\services;

use Yii;
use yii\base\Component;

class CacheManager extends Component
{
    private string $cacheDuration;

    public function __construct(array $config = [])
    {
        $this->cacheDuration = $_ENV['CACHE_DURATION'];

        parent::__construct($config);
    }

    public function addData(string $key, array $data): void
    {
        Yii::$app->cache->set($key, $data, $this->cacheDuration);
    }

    public function getData(string $key)
    {
        return Yii::$app->cache->get($key);
    }
}