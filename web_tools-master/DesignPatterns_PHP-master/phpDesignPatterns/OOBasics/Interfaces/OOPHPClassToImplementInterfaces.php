<?php

//this class "extends" OOPHPInterfaceOne and OOPHPInterfaceTwo.
//Unlike abstracts, of which only one can be extended,
//  a class can implement multiple interfaces.

include_once ('OOPHPInterfaceOne.php');
include_once ('OOPHPInterfaceTwo.php');

class OOPHPClassToImplementInterfaces
implements OOPHPInterfaceOne, OOPHPInterfaceTwo {

	private $instanceNameOne;

	//OOPHPInterfaceOne  DELEGATE METHODS
	public function getNameOne() {
		return $this -> instanceNameOne;
	}
	public function setNameOne($nameIn) {
		$this -> instanceNameOne = $nameIn;
	}

	//OOPHPInterfaceTwo  DELEGATE METHODS
	public function getNameTwo() {
		return $this -> instanceNameTwo;
	}
	public function setNameTwo($nameIn) {
		$this -> instanceNameTwo = $nameIn;
	}

}
?>