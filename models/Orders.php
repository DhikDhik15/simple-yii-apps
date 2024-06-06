<?php

namespace app\models;

use yii\db\Expression;
use yii\db\ActiveRecord;
use app\models\Customers;

class Orders extends ActiveRecord
{
    public static function tableName()
    {
        return 'orders';
    }

    public function orderLists()
    {
        $query = Customers::find()
            ->select([
                'customer_name' => new Expression("CONCAT(first_name, ' ', last_name)"),
                'total_orders' => 'COUNT(orders.item)',
                'total_amount_orders' => 'SUM(orders.amount)',
            ])
            ->innerJoin('orders', 'customers.customer_id = orders.customer_id')
            ->groupBy(['customers.customer_id', 'first_name', 'last_name'])
            ->having(['>=', 'SUM(orders.amount)', 500]);

        // Eksekusi query dan dapatkan hasil
        return $query->asArray()->all();
    }
}
