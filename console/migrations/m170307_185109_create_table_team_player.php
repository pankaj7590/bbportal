<?php

use yii\db\Migration;

class m170307_185109_create_table_team_player extends Migration
{
    public function up()
    {
		$this->createTable('team_player', [
			'id' => $this->primaryKey(),
			'team_id' => $this->integer()->notNull(),
			'player_id' => $this->integer()->notNull(),
			'status' => $this->smallInteger()->defaultValue(10),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);
		
		$this->addForeignKey('fk_team_player_team', 'team_player', 'team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_team_player_player', 'team_player', 'player_id', 'player', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_team_player_user_created_by', 'team_player', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_team_player_user_updated_by', 'team_player', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170307_185109_create_table_team_player cannot be reverted.\n";

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
