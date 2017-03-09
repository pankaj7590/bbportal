<?php

use yii\db\Migration;

class m170308_185155_create_table_media extends Migration
{
    public function up()
    {
		$this->createTable('media', [
			'id' => $this->primaryKey(),
			'media_type' => $this->smallInteger(),
			'alt' => $this->string(),
			'file_name' => $this->string(),
			'file_type' => $this->string(),
			'file_size' => $this->integer(),
			'created_at' => $this->integer(),
			'created_by' => $this->integer(),
		]);
		
		$this->addForeignKey('fk_media_user', 'media', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170308_185155_create_table_media cannot be reverted.\n";

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
