<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Test - Subset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-subset">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Masukkan array string biner, serta dua bilangan bulat m dan n:</p>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'strs')->textInput(['placeholder' => 'Contoh: 10,0001,111001,1,0']) ?>

        <?= $form->field($model, 'm')->textInput(['type' => 'number', 'min' => 0]) ?>

        <?= $form->field($model, 'n')->textInput(['type' => 'number', 'min' => 0]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>

    <?php ActiveForm::end(); ?>

    <p>Ukuran subkumpulan terbesar adalah: <?= Html::encode($maxSubsetSize) ?></p>
</div><code><?= __FILE__ ?></code>