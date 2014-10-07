<?php

include_once ('OOPHPChildClass.php');

define('BR', '<' . 'BR' . '>');

echo 'TESTING OOPHPThisParent' . BR;
echo BR;

$childClass = new OOPHPChildClass();

echo 'test 1 - show the child color' . BR;
echo $childClass -> getColor();
echo BR . BR;

echo 'test 1 - show the parent color' . BR;
echo $childClass -> getParentColor();
echo BR . BR;

echo 'END TESTING OOPHPThisParent' . BR;
?>