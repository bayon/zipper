<?php
include_once ("Strategy.php");
?>
<script>
	function Defense() {
	}

	//prototype properties

	//inheritence
	Defense.prototype = new Strategy();
	Defense.prototype.constructor = Defense;

	//prototype methods
	Defense.prototype.adhereStrategyToActor = function(actor) {
		alert("adhereStrategyToActor " + actor + ":DEFENSE");
	}
</script>
