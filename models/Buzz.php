<?php

namespace app\models;

use yii\base\Model;

class Buzz extends Model
{
    public $input;

    public function rules()
    {
        return [
            [['input'], 'integer'],
        ];
    }
}