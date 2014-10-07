<?php
include_once ("StrategyContext.php");
include_once ("Strategy.php");
include_once ("Offense.php");
include_once ("Defense.php");

?>

<script>
	alert("Design Patern: Strategy");
	var actor1 = "Barcelona";
	var actor2 = "Real Madrid";
	
	var strategyContext = new StrategyContext();
	
	var offense = new Offense();
	strategyContext.setStrategy(offense);
	strategyContext.selectStrategyForActor(actor1);
	
	var defense = new Defense();
	strategyContext.setStrategy(defense);
	strategyContext.selectStrategyForActor(actor2);
	
	
</script>