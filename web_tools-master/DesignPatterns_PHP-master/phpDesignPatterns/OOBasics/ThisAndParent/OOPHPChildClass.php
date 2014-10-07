<?php

//OOPHPClass - a simple OO PHP Class which extends OOPHPParentClass

include_once ('OOPHPParentClass.php');

class OOPHPChildClass extends OOPHPParentClass {
	//@override 
	public function getColor() {
		return 'BLUE';
	}
	//access the super
	public function getParentColor() {
		return parent::getColor();
	}

}
?>