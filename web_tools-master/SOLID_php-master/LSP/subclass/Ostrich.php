<?php
include_once ("../superclass/Bird.php");

class Ostrich extends Bird {

	public function __construct() {
		$this -> name = "Ostrich";
	}


	//@override
	public function fly() {
		echo("<br>...I'll just walk, thanks...." . $this -> name . "");
	}

}
?>