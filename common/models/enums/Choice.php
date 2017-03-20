<?php
namespace common\models\enums;

class Choice{
	const SERVICE = 0;
	const COURT = 1;
	
	public static $label = [
		self::SERVICE => 'Service',
		self::COURT => 'Court',
	];
}
?>