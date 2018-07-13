<?php
/**
 * Created by PhpStorm.
 * User: bigdrop
 * Date: 11.09.17
 * Time: 11:11
 */

namespace frontend\models;

use common\models\User;

/**
 * Class LoginForm
 *
 * @package frontend\models
 */
class LoginForm extends \common\models\LoginForm
{
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
