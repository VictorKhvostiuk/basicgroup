<?php

namespace app\models\entity\User;

/**
 * Interface UserInterface
 * @package app\models\entity\User
 */
interface UserInterface
{
    /**
     * @return string|null
     */
    public function getName();

    /**
     * @return float
     */
    public function getBalance();

    /**
     * @param float $balance
     */
    public function setBalance(float $balance);
}