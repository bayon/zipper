<?php
include_once("AbstractObserver.php");

abstract class AbstractSubject {
	abstract function attach(AbstractObserver $a_observer);	
	abstract function detach(AbstractObserver $a_observer);	
	abstract function notify();
}

?>