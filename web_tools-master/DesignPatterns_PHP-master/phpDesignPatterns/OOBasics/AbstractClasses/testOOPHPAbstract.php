<?php

include_once ('OOPHPClassToExtendAnAbstract.php');

define('BR', '<' . 'BR' . '>');

echo 'BEGIN TESTING PHP ABSTRACT CLASSES' . BR;
echo BR;

echo 'test 1 - create a class which extends an abstract' . BR;
$classOne = new OOPHPClassToExtendAnAbstract();
echo BR;
$classOne -> setName("Harold");
echo $classOne -> getName();
echo BR . BR;

echo 'END TESTING PHP ABSTRACT CLASSES' . BR;
?>