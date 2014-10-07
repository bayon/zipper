<?php

//OOPHPStatic - a simple OO PHP Class with
//                         a static variable and function

class OOPHPStatic {

	//a static variable,
	static $red = 'RED';

	public function getStaticVarRed() {
		return self::$red;
	}

	public static function staticGetStaticVarRed() {
		return self::$red;
	}

}
?>