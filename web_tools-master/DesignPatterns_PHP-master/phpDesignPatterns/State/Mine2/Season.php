<?php
include_once ("SeasonContext.php");


class Season {

	private $seasonContext = null;
	private $seasonName;
	
	public function __construct($context) {
		$this -> seasonContext = $context;
	}

	public function changeTheStateInContext($context) {
		$this -> seasonContext = $context;
	}
}
?>