<?php
include_once ("Strategy.php");

class StrategyContext {
	private $strategy;

	public function selectStrategyForActor($actor) {
		$this -> strategy -> adhereStrategyToActor($actor);
	}

	public function getStrategy() {
		return $this -> strategy;
	}

	public function setStrategy($strategy) {
		$this -> strategy = $strategy;
	}

}
?>