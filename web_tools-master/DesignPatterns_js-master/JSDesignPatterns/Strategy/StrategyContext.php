<?php
include_once ("Strategy.php");
?>

<script>
	function StrategyContext() {
		//constructor
		this.strategy = '';
	}

	//PROTOTYPE PROPERTIES:
	StrategyContext.prototype.strategy = '';
	//PROTOTYPE METHODS:
	StrategyContext.prototype.selectStrategyForActor = function(actor) {
		this.strategy.adhereStrategyToActor(actor);
	};

	StrategyContext.prototype.getStrategy = function() {
		return this.strategy;
	};

	StrategyContext.prototype.setStrategy = function(strategy) {

		this.strategy = strategy;
	};

</script>