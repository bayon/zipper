<?php
include_once ("Strategy.php");

class Defense extends Strategy {
	public function adhereStrategyToActor($actor) {
		echo("<br>Actor:" . $actor . " will be using Strategy: DEFENSE.");
	}

}
?>