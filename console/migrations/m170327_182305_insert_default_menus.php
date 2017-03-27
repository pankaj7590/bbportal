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
		$menu = Menu::find()->select('id')->asArray();
		$this->insert("menu",[
			"name" => 'Create Association',
			'parent' => $menu->where(['name' => 'Association'])->one(),
			"route" => '/association/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Association',
			'parent' => $menu->where(['name' => 'Association'])->one(),
			"route" => '/association/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Match',
			'parent' => $menu->where(['name' => 'Match'])->one(),
			"route" => '/match/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Matches',
			'parent' => $menu->where(['name' => 'Match'])->one(),
			"route" => '/match/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Player',
			'parent' => $menu->where(['name' => 'Player'])->one(),
			"route" => '/player/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Players',
			'parent' => $menu->where(['name' => 'Player'])->one(),
			"route" => '/player/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Pool',
			'parent' => $menu->where(['name' => 'Pool'])->one(),
			"route" => '/pool/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Pools',
			'parent' => $menu->where(['name' => 'Pool'])->one(),
			"route" => '/pool/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Team',
			'parent' => $menu->where(['name' => 'Team'])->one(),
			"route" => '/team/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Teams',
			'parent' => $menu->where(['name' => 'Team'])->one(),
			"route" => '/team/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Tournament',
			'parent' => $menu->where(['name' => 'Tournament'])->one(),
			"route" => '/tournament/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Tournaments',
			'parent' => $menu->where(['name' => 'Tournament'])->one(),
			"route" => '/tournament/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create User',
			'parent' => $menu->where(['name' => 'User'])->one(),
			"route" => '/user/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Users',
			'parent' => $menu->where(['name' => 'User'])->one(),
			"route" => '/user/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Assignment',
			'parent' => $menu->where(['name' => 'User Settings'])->one(),
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Menu',
			'parent' => $menu->where(['name' => 'User Settings'])->one(),
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Permission',
			'parent' => $menu->where(['name' => 'User Settings'])->one(),
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Role',
			'parent' => $menu->where(['name' => 'User Settings'])->one(),
			"route" => '/#',
		]);
		$this->insert("menu",[
			"name" => 'Route',
			'parent' => $menu->where(['name' => 'User Settings'])->one(),
			"route" => '/#',
		]);
		
		$this->insert("menu",[
			"name" => 'Manage Assignments',
			'parent' => $menu->where(['name' => 'Assignment'])->one(),
			"route" => '/admin/assignment/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Menu',
			'parent' => $menu->where(['name' => 'Menu'])->one(),
			"route" => '/admin/menu/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Menus',
			'parent' => $menu->where(['name' => 'Menu'])->one(),
			"route" => '/admin/menu/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Permission',
			'parent' => $menu->where(['name' => 'Permission'])->one(),
			"route" => '/admin/permission/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Permissions',
			'parent' => $menu->where(['name' => 'Permission'])->one(),
			"route" => '/admin/permission/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Role',
			'parent' => $menu->where(['name' => 'Role'])->one(),
			"route" => '/admin/role/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Roles',
			'parent' => $menu->where(['name' => 'Role'])->one(),
			"route" => '/admin/role/index',
		]);
		
		$this->insert("menu",[
			"name" => 'Create Route',
			'parent' => $menu->where(['name' => 'Route'])->one(),
			"route" => '/admin/route/create',
		]);
		$this->insert("menu",[
			"name" => 'Manage Routes',
			'parent' => $menu->where(['name' => 'Route'])->one(),
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
