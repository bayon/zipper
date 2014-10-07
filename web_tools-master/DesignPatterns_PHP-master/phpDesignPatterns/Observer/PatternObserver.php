<?php

include_once ('AbstractObserver.php');
include_once ('PatternSubject.php');
define('BR', '<' . 'BR' . '>');

class PatternObserver extends AbstractObserver {

	public function __construct() {
	}

	public function update(AbstractSubject $subject) {
		echo BR . BR;
		echo '*IN PATTERN OBSERVER - NEW PATTERN GOSSIP ALERT*' . BR;
		echo ' new favorite patterns: ' . $subject -> getFavorites() . BR;
		echo '*IN PATTERN OBSERVER - PATTERN GOSSIP ALERT OVER*' . BR;
	}

}
?>