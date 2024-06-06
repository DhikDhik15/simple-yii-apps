<?php

namespace app\components;


use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class Debug extends Component
{
    public function debug()
    {
        if (function_exists('dd')) {
            function dd(...$data)
            {
                foreach ($data as $value) {
                    echo '<pre>';
                    print_r($value);
                    echo '</pre>';
                    echo '<br>';
                }
                exit;
            }
        }
    }
}
