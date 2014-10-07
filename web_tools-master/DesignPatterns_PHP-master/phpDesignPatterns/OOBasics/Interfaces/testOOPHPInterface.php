<?php
include_once ('OOPHPClassToImplementInterfaces.php');

define('BR', '<' . 'BR' . '>');

echo 'BEGIN TESTING PHP INTERFACES' . BR;
echo BR;

echo 'test 1 - create a class which implements two interfaces' . BR;
$classOne = new OOPHPClassToImplementInterfaces();
echo BR;
$classOne -> setNameOne("Harold");
echo 'Name One: ' . $classOne -> getNameOne();

echo BR;
$classOne -> setNameTwo("Maude");
echo 'Name Two: ' . $classOne -> getNameTwo();
echo BR . BR;

echo 'END TESTING PHP INTERFACES' . BR;
?>