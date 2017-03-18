<?php

use yii\db\Migration;

class m170316_185147_alter_table_tournament_team_add_foreign_keys_to_created_by_updated_by extends Migration
{
    public function up()
    {
		$this->addForeignKey('fk_tournament_team_user_created_by', 'tournament_team', 'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_tournament_team_user_updated_by', 'tournament_team', 'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        echo "m170316_185147_alter_table_tournament_team_add_foreign_keys_to_created_by_updated_by cannot be reverted.\n";

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
