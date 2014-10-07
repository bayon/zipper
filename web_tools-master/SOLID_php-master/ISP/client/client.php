<?php
echo("SOLID: ISP : Interface Segregation Principle");
include_once ("../objects/Manager.php");
include_once ("../objects/Worker.php");
include_once ("../objects/Robot.php");

$worker = new Worker();
$robot = new Robot();

$manager = Manager::withWorker($worker);
$manager -> manageWorker();

$managerOfRobot = Manager::withRobot($robot);
$managerOfRobot -> manageRobot();
?>