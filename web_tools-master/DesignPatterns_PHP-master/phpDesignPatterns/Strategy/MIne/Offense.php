<?php
include_once ("Strategy.php");

class Offense extends Strategy {
	public function adhereStrategyToActor($actor) {
		echo("<br>Actor:" . $actor . " will be using Strategy: OFFENSE.");
	}

}
?>