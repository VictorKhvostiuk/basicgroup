<?php

namespace app\actions\user;


use app\services\AuthService\AuthServiceInterface;
use yii\base\Action;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Class Logout
 * @package app\actions\user
 */
class Logout extends Action
{
    /**
     * @var AuthServiceInterface
     */
    private $authService;

    /**
     * Logout constructor.
     * @param $id
     * @param Controller $controller
     * @param AuthServiceInterface $authService
     * @param array $config
     */
    public function __construct
    (
        $id,
        Controller $controller,
        AuthServiceInterface $authService,
        array $config = []
    )
    {
        parent::__construct($id, $controller, $config);
        $this->authService = $authService;
    }

    public function run()
    {
        $this->authService->logout();
        return $this->controller->redirect(Url::to('/'));
    }
}