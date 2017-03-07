<?php

use yii\db\Migration;

class m170307_191445_create_table_set_point extends Migration
{
    public function up()
    {
		$this->createTable('set_point', [
			'id' => $this->primaryKey(),
			'set_id' => $this->integer()->notNull(),
			'player_id' => $this->integer()->notNull(),
			'tournament_team_id' => $this->integer()->notNull(),
			'number' => $this->integer(),
			'type' => $this->smallInteger(),
			'status' => $this->smallInteger()->defaultValue(10),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);
		
		$this->addForeignKey('fk_set_point_set', 'set_point', 'set_id', 'set', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_set_point_player', 'set_point', 'player_id', 'player', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_set_point_tournament_team', 'set_point', 'tournament_team_id', 'tournament_team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_set_point_user_created_by', 'set_point', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_set_point_user_updated_by', 'set_point', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170307_191445_create_table_set_point cannot be reverted.\n";

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
