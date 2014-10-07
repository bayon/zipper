<?php

include_once ('Book.php');
include_once ('bookContext.php');

define('BR', '<' . 'BR' . '>');

echo 'BEGIN TESTING STATE PATTERN' . BR;
echo BR;

$book = new Book('PHP for Cats', 'Larry Truett');
;

$context = new bookContext($book);

echo 'test 1 - show name' . BR;
echo $context -> getBookTitle();
echo BR . BR;

echo 'test 2 - show name' . BR;
echo $context -> getBookTitle();
echo BR . BR;

echo 'test 3 - show name' . BR;
echo $context -> getBookTitle();
echo BR . BR;

echo 'test 4 - show name' . BR;
echo $context -> getBookTitle();
echo BR . BR;

echo 'END TESTING STATE PATTERN' . BR;
?>