<?php

namespace app\models;

use yii\db\Query;
use yii\db\Expression;
use yii\db\ActiveRecord;

class Customers extends ActiveRecord
{
    public static function tableName()
    {
        return 'customers';
    }

    public function detailCustomers()
    {
        $query = (new Query())
            ->select([
                'customer_name' => new Expression("CONCAT(first_name, ' ', last_name)"),
                'age',
                'country_name' => new Expression("
        CASE
            WHEN country = 'USA' THEN 'United States'
            WHEN country = 'UK' THEN 'United Kingdom'
            WHEN country = 'UAE' THEN 'United Arab Emirates'
            ELSE country
        END
    "),
            ])
            ->from('customers')
            ->orderBy(['age' => SORT_DESC]);

        // Eksekusi query dan dapatkan hasil
        return $query->all();
    }
}
