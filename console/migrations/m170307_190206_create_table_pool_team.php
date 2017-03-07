<?php

use yii\db\Migration;

class m170307_190206_create_table_pool_team extends Migration
{
    public function up()
    {
		$this->createTable('pool_team', [
			'id' => $this->primaryKey(),
			'pool_id' => $this->integer()->notNull(),
			'team_id' => $this->integer()->notNull(),
			'status' => $this->smallInteger()->defaultValue(10),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);
		
		$this->addForeignKey('fk_pool_team_pool', 'pool_team', 'pool_id', 'pool', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_pool_team_team', 'pool_team', 'team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_pool_team_user_created_by', 'team_player', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_pool_team_user_updated_by', 'team_player', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170307_190206_create_table_pool_team cannot be reverted.\n";

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
