<?php

namespace app\controllers;


use app\actions\main\Index;
use app\actions\main\TransactionList;
use yii\web\Controller;

class MainController extends Controller
{
    public function actions()
    {
        return [
            'index' => Index::class,
            'transaction-list' => TransactionList::class,
        ];
    }
}