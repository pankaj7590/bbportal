<?php
namespace common\models\enums;

class Status{
	const ACTIVE = 10;
	const INACTIVE = 0;
	const DELETED = 5;
	
	public static $label = [
		self::ACTIVE => 'Active',
		self::INACTIVE => 'Inactive',
		self::DELETED => 'Deleted',
	];
}
?>