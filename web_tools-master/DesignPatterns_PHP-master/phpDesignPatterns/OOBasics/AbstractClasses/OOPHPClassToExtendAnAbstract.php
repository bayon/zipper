<?php
//this class "extends" OOPHPAbstractClass
include_once ('OOPHPAbstractClass.php');

class OOPHPClassToExtendAnAbstract extends OOPHPAbstractClass {

	private $instanceName;

	//OOPHPAbstractClass  DELEGATE METHODS
	public function getName() {
		return $this -> instanceName;
	}

	public function setName($nameIn) {
		$this -> instanceName = $nameIn;
	}

}
?>