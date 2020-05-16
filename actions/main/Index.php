<?php

namespace app\actions\main;


use app\factories\user\UserFactoryInterface;
use app\repositories\user\UserRepositoryInterface;
use app\services\TransactionService\TransactionServiceInterface;
use yii\base\Action;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Class Index
 * @package app\actions\main
 */
class Index extends Action
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    /**
     * @var UserFactoryInterface
     */
    private $userFactory;
    /**
     * @var TransactionServiceInterface
     */
    private $transactionService;

    /**
     * Index constructor.
     * @param $id
     * @param Controller $controller
     * @param UserRepositoryInterface $userRepository
     * @param UserFactoryInterface $userFactory
     * @param TransactionServiceInterface $transactionService
     * @param array $config
     */
    public function __construct
    (
        $id,
        Controller $controller,
        UserRepositoryInterface $userRepository,
        UserFactoryInterface $userFactory,
        TransactionServiceInterface $transactionService,
        array $config = []
    )
    {
        parent::__construct($id, $controller, $config);
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
        $this->transactionService = $transactionService;
    }

    public function run()
    {
        $errors = '';
        if(!isset($_SESSION['userId'])) {
            return $this->controller->redirect(Url::to('login'));
        }
        $user = $this->userRepository->findByUserId($_SESSION['userId']);
        if(\Yii::$app->request->post()){
            $name = \Yii::$app->request->post()['name'];
            $amount = \Yii::$app->request->post()['amount'];
            $userToSend = $this->userRepository->findByUserName($name);
            if(!$userToSend || $userToSend->getId() == $_SESSION['userId']) {
                $errors = 'you may send only to existing users!';
                return $this->renderMainView($user, $errors);
            }
            if($user->getBalance() - $amount < -1000) {
                $errors = 'your balance can\'t be lower than -1000!';
                return $this->renderMainView($user, $errors);
            }
            $this->transactionService->doTransaction($userToSend, $amount);
            $user = $this->userRepository->findByUserId($_SESSION['userId']);
//            return $this->renderMainView($user, $errors);
        }
        return $this->renderMainView($user, $errors);
    }

    /**
     * @param $user
     * @param $errors
     */
    private function renderMainView($user, $errors)
    {
        return $this->controller->render('main', [
            'user' => $user,
            'errors' => $errors,
        ]);
    }
}