<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Test - Partition';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-subset">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Masukkan array angka dan jumlah subarray k:</p>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nums')->textInput(['placeholder' => 'Contoh: 7,2,5,10,8']) ?>

        <?= $form->field($model, 'k')->textInput(['type' => 'number', 'min' => 1]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

    <p>Jumlah terbesar minimum dari pembagian tersebut adalah: <?= Html::encode($result) ?></p>
</div><code><?= __FILE__ ?></code>