<?php  /* has to appear at least once */ ?>
<script>
alert("Example : Multiple Decorators");
// --- SUPER CLASS
function Icecream(){
	this.cost = function (){
		return 2.04;
	}; 
}
// --- DECORATORS
function NutsDecorator(icecream){
	var currentCost = icecream.cost();
	 
	icecream.cost = function(){
		return currentCost + .33;
	};
}

function HoneyDecorator(icecream){
	var v = (icecream.cost());
	icecream.cost = function (){
		return v + .25
	};

}


// USAGE
//instantiate the super class. call its method.
var icecreamOrder = new Icecream();
alert(icecreamOrder.cost());
//call the decorator function with the instatiated superclass as the parameter.
NutsDecorator(icecreamOrder);
alert(icecreamOrder.cost());

HoneyDecorator(icecreamOrder);
alert(icecreamOrder.cost());


//////--------- Add new functionality
alert("Example : Adding Accessors ");

function dessertItem(dessertType){
	this.type = "iceream" || dessertType;


}

var bannaSplit = new dessertItem();

alert(bannaSplit.type);// default is icecream
bannaSplit.setType = function(dessertType){
	this.type = dessertType;

};

bannaSplit.setType("banana splitiz");
alert(bannaSplit.type);//now with added accessor method
</script>