<?php

use yii\db\Migration;

class m170307_184539_create_table_association_player extends Migration
{
    public function up()
    {
		$this->createTable('association_player', [
			'id' => $this->primaryKey(),
			'association_id' => $this->integer()->notNull(),
			'player_id' => $this->integer()->notNull(),
			'status' => $this->smallInteger()->defaultValue(10),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);
		
		$this->addForeignKey('fk_association_player_association', 'association_player', 'association_id', 'association', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_association_player_player', 'association_player', 'player_id', 'player', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_association_player_user_created_by', 'association_player', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_association_player_user_updated_by', 'association_player', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170307_184539_create_table_association_player cannot be reverted.\n";

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
