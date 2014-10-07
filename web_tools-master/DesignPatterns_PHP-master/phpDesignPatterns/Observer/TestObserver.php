<?php

include_once ('PatternSubject.php');
include_once ('PatternObserver.php');

define('BR', '<' . 'BR' . '>');

echo 'BEGIN TESTING OBSERVER PATTERN' . BR;
echo BR;

$patternGossiper = new PatternSubject();
$patternGossipFan = new PatternObserver();
$patternGossiper -> attach($patternGossipFan);

$patternGossiper -> updateFavorites('abstract factory, decorator, visitor');

$patternGossiper -> updateFavorites('abstract factory, observer, decorator');
$patternGossiper -> detach($patternGossipFan);

$patternGossiper -> updateFavorites('abstract factory, observer, paisley');

echo BR . BR;
echo 'END TESTING OBSERVER PATTERN' . BR;
?>