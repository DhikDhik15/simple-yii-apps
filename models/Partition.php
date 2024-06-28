<?php
namespace app\models;

use yii\base\Model;

class Partition extends Model
{
    public $nums;
    public $k;

    public function rules()
    {
        return [
            [['nums', 'k'], 'required'],
            ['nums', 'match', 'pattern' => '/^(\d+,)*\d+$/', 'message' => 'Masukkan angka yang dipisahkan dengan koma.'],
            ['k', 'integer', 'min' => 1]
        ];
    }
}
