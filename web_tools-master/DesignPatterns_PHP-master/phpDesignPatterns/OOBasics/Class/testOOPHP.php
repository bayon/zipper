<?php

include_once ('OOPHPClass.php');

define('BR', '<' . 'BR' . '>');

echo 'TESTING OOPHPClass' . BR;
echo BR;

echo 'test 1 - create a class' . BR;
$classOne = new OOPHPClass();
echo 'default name: ' . $classOne -> getName();
echo BR;
$classOne -> setName("Harold");
echo 'name after set: ' . $classOne -> getName();
echo BR . BR;

echo 'test 2 - create another class' . BR;
$classTwo = new OOPHPClass();
$classTwo -> setName("Wilma");
echo $classTwo -> getName();
echo BR . BR;

echo 'test 3 - show both classes' . BR;
echo 'Class One Name: ' . $classOne -> getName();
echo BR;
echo 'Class Two Name: ' . $classTwo -> getName();
echo BR . BR;

echo 'END TESTING OOPHPClass' . BR;
?>