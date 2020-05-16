<?php

namespace app\actions\user;


use app\repositories\user\UserRepositoryInterface;
use yii\base\Action;
use yii\web\Controller;

/**
 * Class UserList
 * @package app\actions\user
 */
class UserList extends Action
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserList constructor.
     * @param $id
     * @param Controller $controller
     * @param UserRepositoryInterface $userRepository
     * @param array $config
     */
    public function __construct
    (
        $id,
        Controller $controller,
        UserRepositoryInterface $userRepository,
        array $config = []
    )
    {
        parent::__construct($id, $controller, $config);
        $this->userRepository = $userRepository;
    }

    public function run()
    {
        $userList = $this->userRepository->findAll();
        return $this->controller->render('user-list',['userList' => $userList]);
    }
}