<?php

include_once ("AbstractObserver.php");
include_once ("Subject.php");

class Observer extends AbstractObserver {

	public function __construct() {
	}

	public function update(AbstractSubject $a_subject) {
		$a_subject -> getNewTopic();
		echo("<br>" . $a_subject -> getNewTopic());
	}

}

?>