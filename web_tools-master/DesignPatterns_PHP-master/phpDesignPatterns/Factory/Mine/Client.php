<?php
include_once("Factory.php");
// have the factory create the Automobile object
$product = Factory::create('gear', 'cyl-009813');

print_r($product->get_item_and_model()); // outputs "Ford Pinto"
?>