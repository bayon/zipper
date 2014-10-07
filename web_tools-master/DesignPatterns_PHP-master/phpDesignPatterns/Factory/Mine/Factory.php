<?php
include_once("products/Product.php");
include_once("products/Gear.php");
include_once("products/Cylinder.php");

class Factory
{
    public static function create($item, $model)
    {
		if($item == "gear"){
			return new Gear($item, $model);
		}else if($item == "cylinder"){
			return new Cylinder($item, $model);
		}else{
			 return new Product($item, $model);
		}	
    }
}

?>