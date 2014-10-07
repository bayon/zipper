<?php
include_once ("Singleton.php");

class sharedSingleton extends Singleton {

}

$sharedUtility = Singleton::getInstance();
var_dump($sharedUtility === Singleton::getInstance());
// bool(true)
echo($sharedUtility -> getString());
$anotherSharedUtility = sharedSingleton::getInstance();
var_dump($anotherSharedUtility === Singleton::getInstance());
// bool(false)

var_dump($anotherSharedUtility === sharedSingleton::getInstance());
// bool(true)
$sharedUtility -> setString("fooNation");
echo($sharedUtility -> getString());
?>