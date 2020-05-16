<?php

namespace app\repositories\transaction;

use app\models\entity\Transaction\TransactionInterface;

/**
 * Class TransactionRepository
 * @package app\repositories\transaction
 */
class TransactionRepository implements TransactionRepositoryInterface
{
    /**
     * @param TransactionInterface $transaction
     * @return bool
     */
    public function save(TransactionInterface $transaction)
    {
        return $transaction->save();
    }

    /**
     * @return array
     * @throws \yii\db\Exception
     */
    public function findUserTransactions()
    {
        $connection = \Yii::$app->getDb();
        $command = $connection->createCommand("
            select t.id as 'id', uf.name as 'userFromName', ut.name as 'userToName', t.amount as 'amount', t.date_done as 'date_done' 
            from transaction t
            left join user uf on (uf.id = t.user_from_id)
            left join user ut on (ut.id = t.user_to_id)
            where t.user_to_id = :user or t.user_from_id = :user
            ",
            [
                ':user' => $_SESSION['userId'],
            ]);
        $result = $command->queryAll();
        return $result;
    }
}