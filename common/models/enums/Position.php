<?php
namespace common\models\enums;

class Position{
	const RIGHT_FRONT = 0;
	const LEFT_FRONT = 1;
	const CENTER = 2;
	const RIGHT_BACK = 3;
	const LEFT_BACK = 4;
	
	public static $label = [
		self::RIGHT_FRONT => 'Right Front',
		self::RIGHT_BACK => 'Right Back',
		self::CENTER => 'Center',
		self::LEFT_BACK => 'Left Back',
		self::LEFT_FRONT => 'Left Front',
	];
}
?>