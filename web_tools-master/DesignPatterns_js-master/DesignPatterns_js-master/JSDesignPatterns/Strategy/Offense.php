<?php
include_once ("Strategy.php");
?>
<script>
	function Offense() {
	}

	//prototype properties

	//inheritence
	Offense.prototype = new Strategy();
	Offense.prototype.constructor = Offense;

	//prototype methods
	Offense.prototype.adhereStrategyToActor = function(actor) {
		alert("adhereStrategyToActor " + actor + ":OFFENSE");
	}
</script>