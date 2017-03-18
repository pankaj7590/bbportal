<?php

use yii\db\Migration;

class m170311_090047_alter_table_user_add_column_unique_id_and_profile_pic extends Migration
{
    public function up()
    {
		$this->addColumn('user', 'unique_id', 'varchar(255) after id');
		$this->addColumn('user', 'profile_pic', 'integer after name');
		
		$this->addForeignKey('fk_user_media', 'user', 'profile_pic', 'media', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170311_090047_alter_table_user_add_column_unique_id_and_profile_pic cannot be reverted.\n";

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
