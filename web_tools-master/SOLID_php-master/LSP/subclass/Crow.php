<?php
include_once ("../superclass/Bird.php");

class Crow extends Bird {

	public function __construct() {
		$this -> name = "Crow";
	}


	//@override
	public function fly() {
		echo("<br>...as the crow flies...." . $this -> name . "");
	}

}
?>