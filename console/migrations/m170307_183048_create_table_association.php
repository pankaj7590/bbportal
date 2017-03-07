<?php

use yii\db\Migration;

class m170307_183048_create_table_association extends Migration
{
    public function up()
    {
		$this->createTable('association', [
			'id' => $this->primaryKey(),
			'unique_id' => $this->string()->notNull(),
			'name' => $this->string()->notNull(),
			'level' => $this->smallInteger(),
			'seeding' => $this->integer(),
			'sport' => $this->smallInteger(),
			'status' => $this->smallInteger()->defaultValue(10),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);
		
		$this->addForeignKey('fk_association_user_created_by', 'association', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_association_user_updated_by', 'association', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    public function down()
    {
        echo "m170307_183048_create_table_association cannot be reverted.\n";

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
