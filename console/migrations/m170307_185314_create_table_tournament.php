<?php

use yii\db\Migration;

class m170307_185314_create_table_tournament extends Migration
{
    public function up()
    {
		$this->createTable('tournament', [
			'id' => $this->primaryKey(),
			'unique_id' => $this->string()->notNull(),
			'name' => $this->string()->notNull(),
			'level' => $this->smallInteger(),
			'type' => $this->smallInteger(),
			'venue' => $this->string(),
			'start_date' => $this->integer(),
			'end_date' => $this->integer(),
			'reporting_time' => $this->integer(),
			'fees' => $this->float(),
			'status' => $this->smallInteger()->defaultValue(10),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);
		
		$this->addForeignKey('fk_tournament_user_created_by', 'tournament', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_tournament_user_updated_by', 'tournament', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170307_185314_create_table_tournament cannot be reverted.\n";

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
