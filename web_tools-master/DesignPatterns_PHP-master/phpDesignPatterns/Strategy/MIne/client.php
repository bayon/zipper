<?php
include_once ("StrategyContext.php");
include_once ("Strategy.php");
include_once ("Offense.php");
include_once ("Defense.php");

$actor1 = "Barcelona";
$actor2 = "Real Madrid";

$strategyContext = new StrategyContext();

$offense = new Offense();
$strategyContext -> setStrategy($offense);
$strategyContext -> selectStrategyForActor($actor1);

$defense = new Defense();
$strategyContext -> setStrategy($defense);
$strategyContext -> selectStrategyForActor($actor2);
?>