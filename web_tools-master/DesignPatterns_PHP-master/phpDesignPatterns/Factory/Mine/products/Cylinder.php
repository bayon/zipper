<?php

class Cylinder
{
    private $item;
    private $model;

    public function __construct($item, $model)
    {
        	echo("<br>cylinder");
        $this->item = $item;
        $this->model = $model;
    }

    public function get_item_and_model()
    {
        return $this->item . ' ' . $this->model;
    }
}
?>