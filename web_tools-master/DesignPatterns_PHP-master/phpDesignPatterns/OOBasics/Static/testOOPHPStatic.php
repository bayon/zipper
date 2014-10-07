<?php

include_once ('OOPHPStatic.php');

define('BR', '<' . 'BR' . '>');

echo 'TESTING OOPHPStatic' . BR;
echo BR;

echo 'test 1 - show the static var directly' . BR;
echo 'red: ' . OOPHPStatic::$red;
echo BR . BR;

echo 'test 2 - show the static var using a class instance' . BR;
$classOne = new OOPHPStatic();
echo 'red: ' . $classOne -> getStaticVarRed();
echo BR . BR;

echo 'test 3 - show the static var using a static function' . BR;
echo 'red: ' . OOPHPStatic::staticGetStaticVarRed();
echo BR . BR;

echo 'END TESTING OOPHPStatic' . BR;
?>