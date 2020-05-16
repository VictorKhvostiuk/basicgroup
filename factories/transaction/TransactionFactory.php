<?php

namespace app\factories\transaction;


use app\models\entity\Transaction\Transaction;
use app\models\entity\Transaction\TransactionInterface;

class TransactionFactory implements TransactionFactoryInterface
{
    /**
     * @param array $params
     * @return TransactionInterface
     */
    public function create(array $params =[])
    {
        $params['user_from_id'] = $_SESSION['userId'];
        $params['date_done'] = date("Y-m-d H:i:s");
        $transaction = new Transaction($params);
        return $transaction;
    }
}