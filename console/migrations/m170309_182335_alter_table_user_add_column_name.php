<?php

use yii\db\Migration;

class m170309_182335_alter_table_user_add_column_name extends Migration
{
    public function safeUp()
    {
		$this->addColumn('user', 'name', 'varchar(155) after username');
		$this->update('user',['name' => 'Super Admin'], ['id' => 1]);
    }

    public function safeDown()
    {
    }
}
