<?php

namespace app\factories\user;

use app\models\entity\User\User;
use app\models\entity\User\UserInterface;

/**
 * Class UserFactory
 * @package app\factories\user
 */
class UserFactory implements UserFactoryInterface
{
    /**
     * @param array $params
     * @return UserInterface
     */
    public function create(array $params =[])
    {
        $user = new User($params);
        return $user;
    }
}