<?php

namespace app\services\TransactionService;


use app\factories\transaction\TransactionFactoryInterface;
use app\models\entity\User\UserInterface;
use app\repositories\transaction\TransactionRepositoryInterface;
use app\repositories\user\UserRepositoryInterface;

/**
 * Class TransactionService
 * @package app\services\TransactionService
 */
class TransactionService implements TransactionServiceInterface
{
    /**
     * @var TransactionFactoryInterface
     */
    private $transactionFactory;
    /**
     * @var TransactionRepositoryInterface
     */
    private $transactionRepository;
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * TransactionService constructor.
     * @param TransactionFactoryInterface $transactionFactory
     * @param TransactionRepositoryInterface $transactionRepository
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(TransactionFactoryInterface $transactionFactory, TransactionRepositoryInterface $transactionRepository, UserRepositoryInterface $userRepository)
    {
        $this->transactionFactory = $transactionFactory;
        $this->transactionRepository = $transactionRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserInterface $userSendTo
     * @param float $amount
     */
    public function doTransaction(UserInterface $userSendTo, float $amount)
    {
        $params = [
            'user_to_id' => $userSendTo->getId(),
            'amount' => $amount,
        ];
        $transaction = $this->transactionFactory->create($params);
        if($transaction) {
            $this->transactionRepository->save($transaction);
            $userSendFrom = $this->userRepository->findByUserId($_SESSION['userId']);
            $this->calculateUserSendFromAmounts($userSendFrom,$amount);
            $this->calculateUserSendToAmounts($userSendTo,$amount);
        }
    }

    /**
     * @param UserInterface $user
     * @param float $amount
     */
    private function calculateUserSendFromAmounts(UserInterface $user, float $amount)
    {
        $user->setBalance($user->getBalance() - $amount);
        $this->userRepository->save($user);
    }

    /**
     * @param UserInterface $user
     * @param float $amount
     */
    private function calculateUserSendToAmounts(UserInterface $user, float $amount)
    {
        $user->setBalance($user->getBalance() + $amount);
        $this->userRepository->save($user);
    }
}