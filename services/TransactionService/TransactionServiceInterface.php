<?php

namespace app\services\TransactionService;

use app\models\entity\User\UserInterface;

/**
 * Interface TransactionServiceInterface
 * @package app\services\TransactionService
 */
interface TransactionServiceInterface
{
    /**
     * @param UserInterface $userSendTo
     * @param float $amount
     */
    public function doTransaction(UserInterface $userSendTo, float $amount);
}