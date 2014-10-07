<?php
//OOPHPClass - a simple OO PHP Class

class OOPHPClass {

	//this is a private variable, and can only be accessed by this class
	private $instanceName;

	//a constructor is called when an "instance" of a class is created
	function __construct() {
		$this -> instanceName = 'default';
	}

	public function getName() {
		return $this -> instanceName;
	}

	//the this-> part referers to the variable specific to one instance
	public function setName($nameIn) {
		$this -> instanceName = $nameIn;
	}

}
?>