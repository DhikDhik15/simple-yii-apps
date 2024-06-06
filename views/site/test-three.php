<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Test 3 - Position Rabits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rabbit-checker">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Enter the positions and velocities of the rabbits:</p>

    <div class="rabbit-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'position1')->textInput() ?>
        <?= $form->field($model, 'velocity1')->textInput() ?>
        <?= $form->field($model, 'position2')->textInput() ?>
        <?= $form->field($model, 'velocity2')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Check', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

    <?php if ($result != null) : ?>
        <h2>Result => <?= Html::encode($result) ?></h2>
    <?php endif; ?>

</div>
<code><?= __FILE__ ?></code>