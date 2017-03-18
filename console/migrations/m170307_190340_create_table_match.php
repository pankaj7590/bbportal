<?php

use yii\db\Migration;

class m170307_190340_create_table_match extends Migration
{
    public function up()
    {
		$this->createTable('match', [
			'id' => $this->primaryKey(),
			'unique_id' => $this->string(),
			'round' => $this->integer(),
			'tournament_id' => $this->integer(),
			'pool_id' => $this->integer(),
			'first_team_id' => $this->integer()->notNull(),
			'second_team_id' => $this->integer()->notNull(),
			'toss_winning_team_id' => $this->integer(),
			'choice' => $this->smallInteger(),
			'refree_name' => $this->string(),
			'scorer_name' => $this->string(),
			'winning_team_id' => $this->integer(),
			'status' => $this->smallInteger()->defaultValue(10),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);
		
		$this->addForeignKey('fk_match_tournament', 'match', 'tournament_id', 'tournament', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_match_pool', 'match', 'pool_id', 'pool', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_match_tournament_team_first', 'match', 'first_team_id', 'tournament_team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_match_tournament_team_second', 'match', 'second_team_id', 'tournament_team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_match_tournament_team_toss_winning', 'match', 'toss_winning_team_id', 'tournament_team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_match_tournament_team_winning', 'match', 'winning_team_id', 'tournament_team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_match_user_created_by', 'team_player', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_match_user_updated_by', 'team_player', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170307_190340_create_table_match cannot be reverted.\n";

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
