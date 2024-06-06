<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Test 2 - Sorting';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="number-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="number-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'number')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <code><?= __FILE__ ?></code>
</div>