<?php
class Bird {
	
	 private $name;

	 public function __construct() {
	 $this -> name = "Bird";
	 }
	 
	public function fly() {
		echo("fly method");
	}

	public function eat() {
		echo("eat method");
	}

}
?>