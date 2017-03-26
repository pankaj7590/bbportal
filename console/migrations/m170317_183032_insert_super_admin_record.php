<?php

use yii\db\Migration;
use common\models\User;

class m170308_183032_insert_super_admin_record extends Migration
{
    public function safeUp()
    {
        $user = new User();
        $user->username = 'admin';
        $user->name = 'Pankaj';
        $user->email = 'pankajs7590@gmail.com';
        $user->mobile = '8956617443';
        $user->designation = 'super admin';
        $user->setPassword('admin123@');
        $user->generateAuthKey();
		$user->save(false);
    }

    public function safeDown()
    {
    }
}