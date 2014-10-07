<?php
////////INTERFACE//////////////////////////////////////
interface StoreInterface {

    function callWarehouse($location);
}

interface WarehouseInterface {

    function isClosest($location);

}

class ImplementorOfInterface implements StoreInterface , WarehouseInterface {
    //@override Store Methods
    public function callWarehouse($location) {
        $result = $this -> isClosest($location);
        return $result;
    }

    //@override Warehouse Methods
    function isClosest($location) {
        $warehouseE = new WarehouseE();
        $distanceE = $warehouseE -> distanceTo($location);

        $warehouseF = new WarehouseF();
        $distanceF = $warehouseF -> distanceTo($location);

        $warehouseG = new WarehouseG();
        $distanceG = $warehouseG -> distanceTo($location);

        $warehouses = array("warehouse e" => $distanceE, "warehouse f" => $distanceF, "warehouse g" => $distanceG);
        $closest = array_keys($warehouses, min($warehouses));
       
        return $closest[0];
        
    }

}

class Location {
    public $name;
    public $implementor;
    public function __construct($implementor, $name) {
        $this -> name = $name;
        $this -> implementor = $implementor;
    }

    public function whatIsTheClosestWarehouseToLocation($location) {
        echo("\nLocation object calls the Concrete Interface for stores and warehouses");
        $closest = $this -> implementor -> callWarehouse($location);
        echo("\n The closest is: '" . $closest . "'");
    }

}

class WarehouseE {
    public function distanceTo($location) {
        if ($location == "myStoreLocation") {
            $distance = 3.5;
        }
        if ($location == "target") {
            $distance = 1.7;
        }
        return $distance;
    }

}

class WarehouseF {
    public function distanceTo($location) {
        if ($location == "myStoreLocation") {
            $distance = 1.5;
        }
        if ($location == "target") {
            $distance = 4.7;
        }
        return $distance;
    }

}

class WarehouseG {
    public function distanceTo($location) {
        if ($location == "myStoreLocation") {
            $distance = 18.6;
        }
        if ($location == "target") {
            $distance = 23.7;
        }
        return $distance;
    }

}

$implementor = new ImplementorOfInterface();
$myStoreLocation = "myStoreLocation";
$target = "target";
$location = new Location($implementor,$target);
$location -> whatIsTheClosestWarehouseToLocation($location->name);
?>