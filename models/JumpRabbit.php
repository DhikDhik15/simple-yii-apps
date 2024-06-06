<?php

namespace app\models;

use yii\base\Model;

class JumpRabbit extends Model
{
    public $position1;
    public $velocity1;
    public $position2;
    public $velocity2;

    public function rules()
    {
        return [
            [['position1', 'velocity1', 'position2', 'velocity2'], 'required'],
            [['position1', 'velocity1', 'position2', 'velocity2'], 'integer'],
        ];
    }
}
