<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Test - Fizz Buzz';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-fizz-buzz">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'input')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Check', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); 
    ?>

    <p>Hasil dari FizzBuzz:</p>

    <ul>
        <?php foreach ($result as $item): ?>
            <li><?= Html::encode($item) ?></li>
        <?php endforeach; ?>
    </ul>
</div><code><?= __FILE__ ?></code>