<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Test 5 - Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Age</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($queries as $result) : ?>
                <tr>
                    <td><?= Html::encode($result['customer_name']) ?></td>
                    <td><?= Html::encode($result['age']) ?></td>
                    <td><?= Html::encode($result['country_name']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<code><?= __FILE__ ?></code>