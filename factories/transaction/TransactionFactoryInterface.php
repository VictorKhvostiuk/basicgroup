<?php

namespace app\factories\transaction;

/**
 * Interface TransactionFactoryInterface
 * @package app\factories\transaction
 */
interface TransactionFactoryInterface
{
    /**
     * @param array $params
     * @return TransactionInterface
     */
    public function create(array $params =[]);
}