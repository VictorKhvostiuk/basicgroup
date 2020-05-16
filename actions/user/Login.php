<?php

namespace app\actions\user;


use app\factories\user\UserFactoryInterface;
use app\models\entity\User\User;
use app\repositories\user\UserRepositoryInterface;
use app\services\AuthService\AuthServiceInterface;
use yii\base\Action;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Class Login
 * @package app\actions\user
 */
class Login extends Action
{
    /**
     * @var UserFactoryInterface
     */
    private $userFactory;
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    /**
     * @var AuthServiceInterface
     */
    private $authService;

    /**
     * Login constructor.
     * @param $id
     * @param Controller $controller
     * @param UserFactoryInterface $userFactory
     * @param UserRepositoryInterface $userRepository
     * @param AuthServiceInterface $authService
     * @param array $config
     */
    public function __construct
    (
        $id,
        Controller $controller,
        UserFactoryInterface $userFactory,
        UserRepositoryInterface $userRepository,
        AuthServiceInterface $authService,
        array $config = []
    )
    {
        parent::__construct($id, $controller, $config);
        $this->userFactory = $userFactory;
        $this->userRepository = $userRepository;
        $this->authService = $authService;
    }

    public function run()
    {
//        unset($_SESSION['userId']);
        $user = $this->userFactory->create();
        if ($user->load(\Yii::$app->request->post())) {
            $userExist = $this->userRepository->findByUserName($user->getName());
            if(!$userExist) {
                $this->userRepository->save($user);
            }
            $this->authService->login($userExist ? $userExist : $user);
            return $this->controller->redirect(Url::to('/'));
        }
        return $this->controller->render('login', ['model' => $user]);
    }
}