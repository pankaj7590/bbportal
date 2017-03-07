<?php

use yii\db\Migration;

class m170307_184849_create_table_team extends Migration
{
    public function up()
    {
		$this->createTable('team', [
			'id' => $this->primaryKey(),
			'unique_id' => $this->string()->notNull(),
			'name' => $this->string()->notNull(),
			'association_id' => $this->integer(),
			'level' => $this->smallInteger(),
			'status' => $this->smallInteger()->defaultValue(10),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);
		
		$this->addForeignKey('fk_team_association', 'team', 'association_id', 'association', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_team_user_created_by', 'team', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_team_user_updated_by', 'team', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170307_184849_create_table_team cannot be reverted.\n";

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
