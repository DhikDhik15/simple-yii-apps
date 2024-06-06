<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Test 4 - Order Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Total Orders</th>
                <th>Total Amount Orders</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($queries as $result) : ?>
                <tr>
                    <td><?= Html::encode($result['customer_name']) ?></td>
                    <td><?= Html::encode($result['total_orders']) ?></td>
                    <td><?= Html::encode($result['total_amount_orders']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<code><?= __FILE__ ?></code>