<?php



?>
<script>
//EXAMPLE 1/////////////////////////////////////
	var array = {
		0 : 4,
		1 : 0.5,
		2 : 0.35,
		3 : 5
	};

	var min = Infinity, max = -Infinity, x;
	for (x in array) {
		if (array[x] < min)
			min = array[x];
		if (array[x] > max)
			max = array[x];
	}
	alert("min:" + min);
	alert("max:" + max);
	
//EXAMPLE 2/////////////////////////////////////
	var persons = [{
		Name : "John",
		Age : 12
	}, {
		Name : "Joe",
		Age : 5
	}];
	var min = Math.min.apply(null, persons.map(function(a) {
	    
		return a.Age;
	})), max = Math.max.apply(null, persons.map(function(a) {
		return a.Age;
	}))
	alert('min:'+min);
	alert('max:'+max);




 
</script>