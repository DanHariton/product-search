<?php

namespace app\components\services;

use Yii;
use yii\base\Component;

class ProductRequestsLogger extends Component
{
    private $file;

    private array $logs;

    public function __construct(array $config = [])
    {
        $this->file = Yii::getAlias('@cntProductRequests');

        parent::__construct($config);
    }

    public function log(string $id)
    {
        $this->getLogs();
        $this->incrementCount($id);
    }

    public function getLogs()
    {
        return $this->logs = json_decode(file_get_contents($this->file));
    }

    private function incrementCount(string $id)
    {
        $found = false;
        foreach ($this->logs as $product)
        {
            if ($product->id == $id) {
                $product->cntRequests+=1;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $this->logs[] = [
                'id' => $id,
                'cntRequests' => 1
            ];
        }

        $this->save();
    }

    private function save()
    {
        file_put_contents($this->file, json_encode($this->logs));
    }
}