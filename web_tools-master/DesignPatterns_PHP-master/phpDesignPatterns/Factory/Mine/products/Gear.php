<?php

class Gear
{
    private $item;
    private $model;

    public function __construct($item, $model)
    {
        	echo("<br>gear");
        $this->item = $item;
        $this->model = $model;
    }

    public function get_item_and_model()
    {
        return $this->item . ' ' . $this->model;
    }
}
?>