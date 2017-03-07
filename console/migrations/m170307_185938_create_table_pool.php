<?php

use yii\db\Migration;

class m170307_185938_create_table_pool extends Migration
{
    public function up()
    {
		$this->createTable('pool', [
			'id' => $this->primaryKey(),
			'tournament_id' => $this->integer(),
			'name' => $this->string(),
			'status' => $this->smallInteger()->defaultValue(10),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);
		
		$this->addForeignKey('fk_pool_tournament', 'pool', 'tournament_id', 'tournament', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_pool_user_created_by', 'pool', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_pool_user_updated_by', 'pool', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170307_185938_create_table_pool cannot be reverted.\n";

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
