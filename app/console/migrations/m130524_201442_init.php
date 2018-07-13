<?php

use common\models\User;
use console\models\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $this->createTable(User::tableName(), [
            'id'                   => $this->primaryKey(),
            'username'             => $this->string()->notNull()->unique(),
            'auth_key'             => $this->string(32)->notNull(),
            'password_hash'        => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email'                => $this->string()->notNull()->unique(),
            'role'                 => $this->smallInteger()->notNull()->defaultValue(User::ROLE['CUSTOMER']),
            'status'               => $this->smallInteger()->notNull()->defaultValue(User::STATUS['ACTIVE']),
            'created_at'           => $this->integer()->notNull(),
            'updated_at'           => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable(User::tableName());
    }
}
