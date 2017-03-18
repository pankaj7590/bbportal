<?php

use yii\db\Migration;

class m170307_185551_create_table_tournament_team extends Migration
{
    public function up()
    {
		$this->createTable('tournament_team', [
			'id' => $this->primaryKey(),
			'tournament_id' => $this->integer()->notNull(),
			'team_id' => $this->integer()->notNull(),
			'fees_paid' => $this->smallInteger()->defaultValue(0),
			'status' => $this->smallInteger()->defaultValue(10),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);
		
		$this->addForeignKey('fk_tournament_team_tournament', 'tournament_team', 'tournament_id', 'tournament', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_tournament_team_team', 'tournament_team', 'team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_tournament_team_user_created_by', 'tournament_team', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_tournamen_team_user_updated_by', 'tournament_team', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170307_185551_create_table_tournament_team cannot be reverted.\n";

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
