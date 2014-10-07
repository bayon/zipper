<?php
include_once ('Book.php');
include_once ('StrategyContext.php');

define('BR', '<' . 'BR' . '>');

echo 'BEGIN TESTING STRATEGY PATTERN' . BR;
echo BR;

$book = new Book('PHP for Cats', 'Larry Truett');

$strategyContextC = new StrategyContext('C');
$strategyContextE = new StrategyContext('E');
$strategyContextS = new StrategyContext('S');

echo 'test 1 - show name context C' . BR;
echo $strategyContextC -> showBookTitle($book);
echo BR . BR;

echo 'test 2 - show name context E' . BR;
echo $strategyContextE -> showBookTitle($book);
echo BR . BR;

echo 'test 3 - show name context S' . BR;
echo $strategyContextS -> showBookTitle($book);
echo BR . BR;

echo 'END TESTING STRATEGY PATTERN' . BR;

?>