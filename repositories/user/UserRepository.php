<?php

namespace app\repositories\user;

use app\models\entity\User\User;
use app\models\entity\User\UserInterface;

/**
 * Class UserRepository
 * @package app\repositories\user
 */
class UserRepository implements UserRepositoryInterface
{
     /**
     * @param string $name
     * @return mixed|\yii\db\ActiveRecord|null
     */
    public function findByUserName(string $name)
    {
        return User::find()->where(['name' => $name])->one();
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function save(UserInterface $user)
    {
        return $user->save();
    }

    /**
     * @return UserInterface[]|null
     */
    public function findAll()
    {
        return User::find()->all();
    }

    /**
     * @param int $id
     * @return array|\yii\db\ActiveRecord|null
     */
    public function findByUserId(int $id)
    {
        return User::find()->where(['id' => $id])->one();
    }
}