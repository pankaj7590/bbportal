<?php

use yii\db\Migration;
use mdm\admin\models\Menu;

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
		$menu = Menu::findOne(['name' => 'Association']);
		$this->insert("menu",[
			"name" => 'Create Association',
			'parent' => $menu->id,
			"route" => '/association/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Association',
			'parent' => $menu->id,
			"route" => '/association/index',
		]);
		
		$menu = Menu::findOne(['name' => 'Match']);
		$this->insert("menu",[
			"name" => 'Create Match',
			'parent' => $menu->id,
			"route" => '/match/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Matches',
			'parent' => $menu->id,
			"route" => '/match/index',
		]);
		
		$menu = Menu::findOne(['name' => 'Player']);
		$this->insert("menu",[
			"name" => 'Create Player',
			'parent' => $menu->id,
			"route" => '/player/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Players',
			'parent' => $menu->id,
			"route" => '/player/index',
		]);
		
		$menu = Menu::findOne(['name' => 'Pool']);
		$this->insert("menu",[
			"name" => 'Create Pool',
			'parent' => $menu->id,
			"route" => '/pool/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Pools',
			'parent' => $menu->id,
			"route" => '/pool/index',
		]);
		
		$menu = Menu::findOne(['name' => 'Team']);
		$this->insert("menu",[
			"name" => 'Create Team',
			'parent' => $menu->id,
			"route" => '/team/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Teams',
			'parent' => $menu->id,
			"route" => '/team/index',
		]);
		
		$menu = Menu::findOne(['name' => 'Tournament']);
		$this->insert("menu",[
			"name" => 'Create Tournament',
			'parent' => $menu->id,
			"route" => '/tournament/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Tournaments',
			'parent' => $menu->id,
			"route" => '/tournament/index',
		]);
		
		$menu = Menu::findOne(['name' => 'User']);
		$this->insert("menu",[
			"name" => 'Create User',
			'parent' => $menu->id,
			"route" => '/user/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Users',
			'parent' => $menu->id,
			"route" => '/user/index',
		]);
		
		$menu = Menu::findOne(['name' => 'User Settings']);
		$this->insert("menu",[
			"name" => 'Assignment',
			'parent' => $menu->id,
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Menu',
			'parent' => $menu->id,
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Permission',
			'parent' => $menu->id,
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Role',
			'parent' => $menu->id,
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Route',
			'parent' => $menu->id,
			"route" => '/#',
		]);
		
		$menu = Menu::findOne(['name' => 'Assignment']);
		$this->insert("menu",[
			"name" => 'Manage Assignments',
			'parent' => $menu->id,
			"route" => '/admin/assignment/index',
		]);
		
		$menu = Menu::findOne(['name' => 'Menu']);
		$this->insert("menu",[
			"name" => 'Create Menu',
			'parent' => $menu->id,
			"route" => '/admin/menu/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Menus',
			'parent' => $menu->id,
			"route" => '/admin/menu/index',
		]);
		
		$menu = Menu::findOne(['name' => 'Permission']);
		$this->insert("menu",[
			"name" => 'Create Permission',
			'parent' => $menu->id,
			"route" => '/admin/permission/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Permissions',
			'parent' => $menu->id,
			"route" => '/admin/permission/index',
		]);
		
		$menu = Menu::findOne(['name' => 'Role']);
		$this->insert("menu",[
			"name" => 'Create Role',
			'parent' => $menu->id,
			"route" => '/admin/role/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Roles',
			'parent' => $menu->id,
			"route" => '/admin/role/index',
		]);
		
		$menu = Menu::findOne(['name' => 'Route']);
		$this->insert("menu",[
			"name" => 'Create Route',
			'parent' => $menu->id,
			"route" => '/admin/route/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Routes',
			'parent' => $menu->id,
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
