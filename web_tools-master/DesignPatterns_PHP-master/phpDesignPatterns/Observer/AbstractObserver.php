<?php

include_once ('AbstractSubject.php');

abstract class AbstractObserver {

	abstract function update(AbstractSubject $subject_in);
	
}
?>