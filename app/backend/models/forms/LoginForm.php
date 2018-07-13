<?php
/**
 * Created by PhpStorm.
 * User: bigdrop
 * Date: 11.09.17
 * Time: 11:01
 */

namespace backend\models\forms;

use backend\models\User;

/**
 * Class LoginForm
 *
 * @package backend\models\forms
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
