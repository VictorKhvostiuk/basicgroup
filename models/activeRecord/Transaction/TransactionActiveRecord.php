<?php

namespace app\models\activeRecord\Transaction;


use yii\db\ActiveRecord;

/**
 * Class TransactionActiveRecord
 * @package app\models\activeRecord\Transaction
 */
class TransactionActiveRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'transaction';
    }

    public function rules()
    {
        return [
            [['user_from_id', 'user_to_id', 'amount', 'date_done'], 'required'],
        ];
    }
}