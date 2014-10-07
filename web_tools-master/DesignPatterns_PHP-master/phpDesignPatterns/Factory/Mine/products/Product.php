<?php

class Product
{
    private $item;
    private $vehicle_model;

    public function __construct($item, $model)
    {
        	echo("<br>unidentified product");
        $this->item = "unidentified";
        $this->vehicle_model = $model;
    }

    public function get_item_and_model()
    {
        return $this->item . ' ' . $this->vehicle_model;
    }
}
?>