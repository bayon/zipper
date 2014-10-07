<?php

//OOPHPAbstractClass - a simple OO PHP Abstract Class
//  this defines two functions, getName() and setName($nameIn)
//  which any class extending this must have
// so essentially the same as a java interface, or an iOS protocol

abstract class OOPHPAbstractClass {

	abstract public function getName();

	abstract public function setName($nameIn);

}
?>