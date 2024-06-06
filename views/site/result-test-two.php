<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $results array */
/* @var $number integer */

$this->title = 'Result Sorting';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="number-result">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Input Number: <?= Html::encode($number) ?></p>

    <ul>
        <?php foreach ($results as $result): ?>
            <?= Html::encode($result) ?> </br>
        <?php endforeach; ?>
    </ul>

    <p><?= Html::a('Back', ['test-two'], ['class' => 'btn btn-primary']) ?></p>
</div>
