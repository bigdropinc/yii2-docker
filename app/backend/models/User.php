<?php
/**
 * Created by PhpStorm.
 * User: bigdrop
 * Date: 11.09.17
 * Time: 11:02
 */

namespace backend\models;

/**
 * Class User
 *
 * @package backend\models
 */
class User extends \common\models\User
{
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS['ACTIVE'], 'role' => self::ROLE['ADMIN']]);
    }
}
