<?php

//$container = new \yii\di\Container();


return [
    'definitions' => [
        \app\factories\user\UserFactoryInterface::class =>
            [
                'class' => \app\factories\user\UserFactory::class
            ],
        \app\repositories\user\UserRepositoryInterface::class =>
            [
                'class' => \app\repositories\user\UserRepository::class
            ],
        \app\services\AuthService\AuthServiceInterface::class =>
            [
                'class' => \app\services\AuthService\AuthService::class
            ],
        \app\factories\transaction\TransactionFactoryInterface::class =>
            [
                'class' => \app\factories\transaction\TransactionFactory::class
            ],
        \app\services\TransactionService\TransactionServiceInterface::class =>
            [
                'class' => \app\services\TransactionService\TransactionService::class
            ],
        \app\repositories\transaction\TransactionRepositoryInterface::class =>
            [
                'class' => \app\repositories\transaction\TransactionRepository::class
            ],

    ],
];
