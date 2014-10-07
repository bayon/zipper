<?php

?>
<script>
	alert("SOLID: js : LSP");
	//Use inheritence for the substitution, NOT extends.

	function Bird() {
	}

	Bird.prototype.fly = function() {
		alert('hello Im a bird');
	};

	function Crow() {
		// @super
		Bird.call(this);
	};
	Crow.prototype = new Bird();
	Crow.prototype.constructor = Crow;
	//@override
	Crow.prototype.fly = function() {
		alert('...as the crow flies.');
	};
	
	function Ostrich() {
        // @super
        Bird.call(this);
    };
    Ostrich.prototype = new Bird();
    Ostrich.prototype.constructor = Ostrich;
    //@override
    Ostrich.prototype.fly = function() {
        alert('...as the ostrich...flies?');
    };

	// USAGE///////////////////////////////////////
	var crow = new Crow();
	var ostrich = new Ostrich();
    
    /////  SUBSTITUTION
    var arrayOfBirds = [crow,ostrich];
    
    for(x in arrayOfBirds){
       var thisBird = arrayOfBirds[x];
       thisBird.fly();
    }
    
    
    

</script>