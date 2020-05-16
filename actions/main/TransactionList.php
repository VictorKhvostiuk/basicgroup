<?php

namespace app\actions\main;


use app\repositories\transaction\TransactionRepositoryInterface;
use yii\base\Action;
use yii\web\Controller;

/**
 * Class TransactionList
 * @package app\actions\main
 */
class TransactionList extends Action
{
    /**
     * @var TransactionRepositoryInterface
     */
    private $transactionRepository;

    /**
     * TransactionList constructor.
     * @param $id
     * @param Controller $controller
     * @param TransactionRepositoryInterface $transactionRepository
     * @param array $config
     */
    public function __construct
    (
        $id,
        Controller $controller,
        TransactionRepositoryInterface $transactionRepository,
        array $config = []
    )
    {
        parent::__construct($id, $controller, $config);
        $this->transactionRepository = $transactionRepository;
    }

    public function run()
    {
        if(!isset($_SESSION['userId'])) {
            return $this->controller->redirect(Url::to('login'));
        }
        $transactionList = $this->transactionRepository->findUserTransactions();
        return $this->controller->render('transaction-list',['transactionList' => $transactionList]);

    }
}