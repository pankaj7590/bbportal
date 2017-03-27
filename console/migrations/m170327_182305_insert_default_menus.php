<?php

use yii\db\Migration;

class m170327_182305_insert_default_menus extends Migration
{
    public function safeUp()
    {
		//create menus
		$this->insert("menu",[
			"name" => 'Association',
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Match',
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Player',
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Pool',
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Team',
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Tournament',
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'User',
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'User Settings',
			"route" => '/#',
		]);
		
		//create submenus
		$this->insert("menu",[
			"name" => 'Create Association',
			'parent' => 'Association',
			"route" => '/association/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Association',
			'parent' => 'Association',
			"route" => '/association/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Match',
			'parent' => 'Match',
			"route" => '/match/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Matches',
			'parent' => 'Match',
			"route" => '/match/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Player',
			'parent' => 'Player',
			"route" => '/player/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Players',
			'parent' => 'Player',
			"route" => '/player/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Pool',
			'parent' => 'Pool',
			"route" => '/pool/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Pools',
			'parent' => 'Pool',
			"route" => '/pool/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Team',
			'parent' => 'Team',
			"route" => '/team/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Teams',
			'parent' => 'Team',
			"route" => '/team/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Tournament',
			'parent' => 'Tournament',
			"route" => '/tournament/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Tournaments',
			'parent' => 'Tournament',
			"route" => '/tournament/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create User',
			'parent' => 'User',
			"route" => '/user/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Users',
			'parent' => 'User',
			"route" => '/user/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Assignment',
			'parent' => 'User Settings',
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Menu',
			'parent' => 'User Settings',
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Permission',
			'parent' => 'User Settings',
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Role',
			'parent' => 'User Settings',
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Route',
			'parent' => 'User Settings',
			"route" => '/#',
		]);
		
		$this->insert("menu",[
			"name" => 'Manage Assignments',
			'parent' => 'Assignment',
			"route" => '/admin/assignment/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Menu',
			'parent' => 'Menu',
			"route" => '/admin/menu/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Menus',
			'parent' => 'Menu',
			"route" => '/admin/menu/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Permission',
			'parent' => 'Permission',
			"route" => '/admin/permission/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Permissions',
			'parent' => 'Permission',
			"route" => '/admin/permission/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Role',
			'parent' => 'Role',
			"route" => '/admin/role/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Roles',
			'parent' => 'Role',
			"route" => '/admin/role/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Route',
			'parent' => 'Route',
			"route" => '/admin/route/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Routes',
			'parent' => 'Route',
			"route" => '/admin/route/index',
		]);
		
		//create roles
		$this->insert('auth_item', [
			'name' => 'Super Admin',
			'type' => 1,
			'created_at' => time(),
			'updated_at' => time(),
		]);
		$this->insert('auth_item', [
			'name' => 'Admin',
			'type' => 1,
			'created_at' => time(),
			'updated_at' => time(),
		]);
		
		//assign routes to roles
		$this->insert('auth_item_child', [
			'parent' => 'Super Admin',
			'child' => '/*',
		]);
		$this->insert('auth_item_child', [
			'parent' => 'Admin',
			'child' => '/association-player/*',
		]);
		$this->insert('auth_item_child', [
			'parent' => 'Admin',
			'child' => '/association-user/*',
		]);
		$this->insert('auth_item_child', [
			'parent' => 'Admin',
			'child' => '/association/update',
		]);
		$this->insert('auth_item_child', [
			'parent' => 'Admin',
			'child' => '/association/view',
		]);
		$this->insert('auth_item_child', [
			'parent' => 'Admin',
			'child' => '/player/*',
		]);
		$this->insert('auth_item_child', [
			'parent' => 'Admin',
			'child' => '/site/*',
		]);
		$this->insert('auth_item_child', [
			'parent' => 'Admin',
			'child' => '/team-player/*',
		]);
		$this->insert('auth_item_child', [
			'parent' => 'Admin',
			'child' => '/team/*',
		]);
    }

    public function safeDown()
    {
    }
}
