<?php

namespace app\services\AuthService;

use app\models\entity\User\UserInterface;

/**
 * Interface AuthServiceInterface
 * @package app\services\AuthService
 */
interface AuthServiceInterface
{
    /**
     * @param UserInterface $user
     * @return bool
     */
    public function login(UserInterface $user);

    /**
     * @return void
     */
    public function logout();
}