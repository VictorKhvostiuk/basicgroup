<?php

namespace app\controllers;

use app\actions\user\Login;
use app\actions\user\Logout;
use app\actions\user\UserList;
use Yii;
use yii\web\Controller;
use app\actions\user\Test;

class UserController extends Controller
{
    public function actions()
    {
        return [
            'user-list' => UserList::class,
            'login' => Login::class,
            'logout' => Logout::class,
        ];
    }
}