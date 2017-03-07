<?php

use yii\db\Migration;

class m170307_191012_create_table_set extends Migration
{
    public function up()
    {
		$this->createTable('set', [
			'id' => $this->primaryKey(),
			'uniqueid' => $this->string(),
			'match_id' => $this->integer()->notNull(),
			'number' => $this->integer(),
			'first_team_points' => $this->integer()->defaultValue(0),
			'second_team_points' => $this->integer()->defaultValue(0),
			'winning_team_id' => $this->integer(),
			'status' => $this->smallInteger()->defaultValue(10),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);
		
		$this->addForeignKey('fk_set_match', 'set', 'match_id', 'match', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_set_tournament_team_winning', 'set', 'winning_team_id', 'tournament_team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_set_user_created_by', 'set', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_set_user_updated_by', 'set', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170307_191012_create_table_set cannot be reverted.\n";

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
