<?php
echo("<br>LSP: Liskov Substitution Principle<br>");

include_once ("../superclass/Bird.php");
include_once ("../subclass/Crow.php");
include_once ("../subclass/Ostrich.php");

$crow = new Crow();
$ostrich = new Ostrich();

$array = array($crow, $ostrich);

foreach ($array as $bird) {

	$bird -> fly();
}
?>