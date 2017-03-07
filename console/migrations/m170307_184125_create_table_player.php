<?php

use yii\db\Migration;

class m170307_184125_create_table_player extends Migration
{
    public function up()
    {
		$this->createTable('player', [
			'id' => $this->primaryKey(),
			'unique_id' => $this->string()->notNull(),
			'name' => $this->string()->notNull(),
			'position' => $this->smallInteger(),
			'birth_date' => $this->integer(),
			'gender' => $this->smallInteger(),
			'seeding' => $this->integer(),
			'status' => $this->smallInteger()->defaultValue(10),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);
		
		$this->addForeignKey('fk_player_user_created_by', 'player', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_player_user_updated_by', 'player', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170307_184125_create_table_player cannot be reverted.\n";

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
