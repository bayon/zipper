<?php
include_once ("AbstractSubject.php");
include_once ("Observer.php");

class Subject extends AbstractSubject {

	private $topic = NULL;
	private $observers = array();

	function __construct() {
	}

	function attach(AbstractObserver $a_observer) {
		$this -> observers[] = $a_observer;
	}

	function detach(AbstractObserver $a_observer) {
		foreach ($this->observers as $key => $val) {
			if($val == $a_observer){
				 unset($this->observers[$key]);
			}
		}
	}

	function notify() {
		foreach ($this->observers as $obs) {
			$obs -> update($this);
		}
	}

	function changeTopic($newTopic) {
		$this->topic =  $newTopic;
		$this->notify();
	}

	function getNewTopic() {
		return $this->topic;
	}

}
?>