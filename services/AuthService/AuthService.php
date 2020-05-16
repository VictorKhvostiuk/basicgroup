<?php

namespace app\services\AuthService;

use app\models\entity\User\UserInterface;
use Yii;

/**
 * Class AuthService
 * @package app\services\AuthService
 */
class AuthService implements AuthServiceInterface
{
    /**
     * @param UserInterface $user
     * @return bool
     */
    public function login(UserInterface $user)
    {
        if ($user->validate()) {
            Yii::$app->user->login($user, 3600*24*30);
            $_SESSION['userId'] = \Yii::$app->getUser()->getId();
            return true;
        }
        return false;
    }

    /**
     * @return void
     */
    public function logout()
    {
        unset($_SESSION['userId']);
    }
}