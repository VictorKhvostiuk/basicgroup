<?php

namespace app\models\activeRecord\User;


use yii\db\ActiveRecord;

/**
 * Class UserActiveRecord
 * @package app\models\activeRecord\User
 */
class UserActiveRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
//            ['balance'],
        ];
    }
}