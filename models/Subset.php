<?php

namespace app\models;

use yii\base\Model;

class Subset extends Model
{
    public $strs;
    public $m;
    public $n;

    public function rules()
    {
        return [
            [['strs', 'm', 'n'], 'required'],
            [['m', 'n'], 'integer', 'min' => 0],
            ['strs', 'match', 'pattern' => '/^[01,]+$/', 'message' => 'Hanya diperbolehkan angka 0, 1, dan koma.']
        ];
    }
}