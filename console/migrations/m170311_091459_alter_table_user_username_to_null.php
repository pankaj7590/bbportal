<?php

use yii\db\Migration;

class m170311_091459_alter_table_user_username_to_null extends Migration
{
    public function up()
    {
		$this->alterColumn('user','username', 'varchar(255)');
    }

    public function down()
    {
        echo "m170311_091459_alter_table_user_username_to_null cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
