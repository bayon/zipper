<?php

?>
<script>
	
	/* /////////////////////  INTERFACE //////////////////////////// */
	alert("js: DIP INTERFACE");

	function StoreWarehouseInterface() {

	this.locationX = "nowhere";
	}

	StoreWarehouseInterface.prototype.callWarehouse = function(locationX) {
	locationX;
	alert('call warehouse' + locationX);
	var result = this.isClosest(locationX);

	//should return name of closest warehouse
	return result;
	};

	StoreWarehouseInterface.prototype.isClosest = function(locationX) {

	alert('isclosest ? : ' + locationX);

	var warehouseE = new WarehouseE();
	var distanceE = warehouseE.distanceTo(locationX);
	resultE = new Object();
	resultE.name = "Warehouse E";
	resultE.distance = distanceE;

	var warehouseF = new WarehouseF();
	var distanceF = warehouseF.distanceTo(locationX);
	resultF = new Object();
	resultF.name = "Warehouse F";
	resultF.distance = distanceF;

	var warehouseG = new WarehouseG();
	var distanceG = warehouseG.distanceTo(locationX);
	resultG = new Object();
	resultG.name = "Warehouse G";
	resultG.distance = distanceG;
	//create an associative array or dictionary of the distances and their warehouseNames

	alert("Warehouse E:"+ resultE.distance);
	alert("Warehouse F:"+ resultF.distance);
	alert("Warehouse G:"+ resultG.distance);

	/////////////////////////////////////
	//get the min
	var resultsArray = [{
	Name : resultE.name,
	Distance : resultE.distance
	}, {
	Name : resultF.name,
	Distance : resultF.distance
	}, {
	Name : resultG.name,
	Distance : resultG.distance
	}];

	var min = Math.min.apply(null, resultsArray.map(function(a) {

	return a.Distance;
	}))
	/*
	* , max = Math.max.apply(null, resultsArray.map(function(a) {
	return a.Distance;
	}))

	*/

	alert('min:' + min);
	//alert('max:' + max);
	//see who the min belongs to:
	if(min == resultE.distance){
	return resultE.name
	}
	if(min == resultF.distance){
	return resultF.name
	}
	if(min == resultG.distance){
	return resultG.name
	}

	//return the min
	return "Still Need to Know";
	/**/

	};

	//In javascript it appears that the interface and the implementor of that interface, are one and the same.
	//There are just a few additional components. 1) The "Object.prototype.can..." and the "condition checks".

	//Object.prototype.can
	StoreWarehouseInterface.prototype.can = function(methodName) {
	return (( typeof this[methodName]) == "function");
	};

	/////////////////////  END INTERFACE ////////////////////////////

	///////////////////// LOCATION ////////////////////////////
	function LocationX(implementor, locationName) {

	this.name = locationName;
	this.implementor = implementor;
	}

	//Location Properties:

	//Location Methods:
	LocationX.prototype.whatIsTheClosestWarehouseToLocation = function(locationX) {
	alert("Location object calls the Concrete Interface for stores and warehouses");

	var closest = "not using interface properly";
	//<<<<<<<<<<<<<<<<<<<     INTERFACE CONDITION CHECK:      >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	if (this.implementor.can("callWarehouse")) {
	closest = this.implementor.callWarehouse(locationX);
	}
	//<<<<<<<<<<<<<<<<<<<     INTERFACE CONDITION CHECK:      >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	//closest = this.implementor.callWarehouse(locationX);
	alert("The closest is..._____ " + closest);
	};

	///////////////////// WAREHOUSE E ////////////////////////////
	function WarehouseE() {
	this.name = "Warehouse E!";
	}
	//PROPERTIES:
	WarehouseE.prototype.name = '';
	//WAREHOUSE E Methods:
	WarehouseE.prototype.distanceTo = function(locationX) {
	var distance = 0;
	if (locationX == "target") {
	distance = 3.5;
	}
	if (locationX == "walmart") {
	distance = 7.2;
	}
	return distance;

	};
	///////////////////// WAREHOUSE F ////////////////////////////
	function WarehouseF() {
	this.name = "Warehouse F!";
	}
	//PROPERTIES:
	WarehouseF.prototype.name = '';
	//WAREHOUSE E Methods:
	WarehouseF.prototype.distanceTo = function(locationX) {
	var distance = 0;
	if (locationX == "target") {
	distance = 10.5;
	}
	if (locationX == "walmart") {
	distance = 2.2;
	}
	return distance;

	};
	///////////////////// WAREHOUSE G ////////////////////////////
	function WarehouseG() {
	this.name = "Warehouse G!";
	}
	//PROPERTIES:
	WarehouseG.prototype.name = '';
	//WAREHOUSE G Methods:
	WarehouseG.prototype.distanceTo = function(locationX) {
	var distance = 0;
	if (locationX == "target") {
	distance = 1.8;
	}
	if (locationX == "walmart") {
	distance = 11.3;
	}
	return distance;

	};

	/**/
	///////////////////// IMPLEMENTATION ////////////////////////////

	var implementor = new StoreWarehouseInterface();
	var walmart = "walmart";
	var target = "target";
	var locationName = walmart;
	var locationX = new LocationX(implementor, locationName);

	locationX.whatIsTheClosestWarehouseToLocation(locationX.name);

	/*
	//condition checks
	if (implementor.can("callWarehouse")) {
	//implementor.callWarehouse("6th Street");
	}

	if (implementor.can("isClosest")) {
	//implementor.isClosest("3rd Ave");
	}
	*/</script>
