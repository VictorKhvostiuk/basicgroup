<?php

namespace app\repositories\user;

use app\models\entity\User\UserInterface;

/**
 * Interface UserRepositoryInterface
 * @package app\repositories\user
 */
interface UserRepositoryInterface
{
    /**
     * @param string $name
     * @return mixed|\yii\db\ActiveRecord|null
     */
    public function findByUserName(string $name);

    /**
     * @param UserInterface $user
     * @return mixed
     */
    public function save(UserInterface $user);

    /**
     * @return UserInterface[]|null
     */
    public function findAll();

    /**
     * @param int $id
     * @return array|\yii\db\ActiveRecord|null
     */
    public function findByUserId(int $id);

}