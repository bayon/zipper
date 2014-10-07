<?php
include_once ("Icecream.php");
include_once ("IcecreamDecorator.php");
include_once ("NutsDecorator.php");

$icecream = new Icecream("Design Patterns");

$decorator = new IcecreamDecorator($icecream);
$nutsDecorator = new NutsDecorator($decorator);

echo $decorator -> showTitle();
$nutsDecorator -> exclaimTitle();
echo $decorator -> showTitle();
?>