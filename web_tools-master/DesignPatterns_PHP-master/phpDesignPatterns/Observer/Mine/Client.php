<?php
 
include_once("Observer.php");
include_once("Subject.php");

$subject = new Subject();
$observer = new Observer();

$subject->attach($observer);

$subject->changeTopic("asdf,factory,strategy,monkeys");

$subject->changeTopic("fleas in the tea room");

?>