<?php

use yii\db\Migration;

class m170307_183755_create_table_association_user extends Migration
{
    public function up()
    {
		$this->createTable('association_user', [
			'id' => $this->primaryKey(),
			'association_id' => $this->integer()->notNull(),
			'user_id' => $this->integer()->notNull(),
			'status' => $this->smallInteger()->defaultValue(10),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);
		
		$this->addForeignKey('fk_association_user_association', 'association_user', 'association_id', 'association', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_association_user_user', 'association_user', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_association_user_user_created_by', 'association_user', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_association_user_user_updated_by', 'association_user', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170307_183755_create_table_association_user cannot be reverted.\n";

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
