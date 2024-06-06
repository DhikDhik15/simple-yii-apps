<?php

namespace app\models;

use yii\base\Model;

class Downwards extends Model
{
    public $number;

    public function rules()
    {
        return [
            [['number'], 'required'],
            [['number'], 'integer', 'min' => 1],
        ];
    }
}
