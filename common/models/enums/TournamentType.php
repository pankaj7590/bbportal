<?php
namespace common\models\enums;

class TournamentType{
	const MEN_OPEN = 0;
	const WOMEN_OPEN = 1;
	const BOYS_UNDER_18 = 2;
	const GIRLS_UNDER_18 = 3;
	const BOYS_UNDER_16 = 4;
	const GIRLS_UNDER_16 = 5;
	const BOYS_UNDER_14 = 6;
	const GIRLS_UNDER_14 = 7;
	
	public static $label = [
		self::MEN_OPEN => 'Mens\' Open',
		self::WOMEN_OPEN => 'Womens\' Open',
		self::BOYS_UNDER_18 => 'Boys\' Under 18',
		self::GIRLS_UNDER_18 => 'Girls\' Under 18',
		self::BOYS_UNDER_16 => 'Boys\' Under 16',
		self::GIRLS_UNDER_16 => 'Girls\' Under 16',
		self::BOYS_UNDER_14 => 'Boys\' Under 14',
		self::GIRLS_UNDER_14 => 'Girls\' Under 14',
	];
}
?>