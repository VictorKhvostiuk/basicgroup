<?php

namespace app\factories\user;

use app\models\entity\User\User;
use app\models\entity\User\UserInterface;

/**
 * Interface UserFactoryInterface
 * @package app\factories\user
 */
interface UserFactoryInterface
{
    /**
     * @param array $params
     * @return UserInterface
     */
    public function create(array $params =[]);
}