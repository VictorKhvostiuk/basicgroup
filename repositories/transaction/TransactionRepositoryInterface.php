<?php

namespace app\repositories\transaction;

use app\models\entity\Transaction\TransactionInterface;

/**
 * Interface TransactionRepositoryInterface
 * @package app\repositories\transaction
 */
interface TransactionRepositoryInterface
{
    /**
     * @param TransactionInterface $transaction
     * @return bool
     */
    public function save(TransactionInterface $transaction);

    /**
     * @return array
     * @throws \yii\db\Exception
     */
    public function findUserTransactions();
}