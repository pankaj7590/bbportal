<?php
namespace common\models\enums;

class Level{
	const TALUKA = 1;
	const DISTRICT = 2;
	const STATE = 3;
	const ZONE = 4;
	
	public static $label = [
		self::TALUKA => 'Taluka',
		self::DISTRICT => 'District',
		self::STATE => 'State',
		self::ZONE => 'Zone',
	];
}
?>