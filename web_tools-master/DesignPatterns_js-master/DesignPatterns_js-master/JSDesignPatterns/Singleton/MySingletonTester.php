<?php // php has to be called at least once
include_once ("MySingleton.php");
?>

<script>
	var SingletonTester = (function() {

		// options: an object containing configuration options for the singleton
		// e.g var options = { name: "test", pointX: 5};
		function Singleton(options) {

			// set options to the options supplied
			// or an empty object if none are provided
			options = options || {};

			// set some properties for our singleton
			this.name = "SingletonTester";

			this.pointX = options.pointX || 6;

			this.pointY = options.pointY || 10;

		}

		// our instance holder
		var instance;

		// an emulation of static variables and methods
		var _static = {

			name : "SingletonTester",

			// Method for getting an instance. It returns
			// a singleton instance of a singleton object
			getInstance : function(options) {
				if (instance === undefined) {
					instance = new Singleton(options);
				}

				return instance;

			}
		};

		return _static;

	})();

	var singletonTest = SingletonTester.getInstance({
		pointX : 5
	});

	// Log the output of pointX just to verify it is correct
	// Outputs: 5
	console.log(singletonTest.pointX);
	alert(singletonTest.pointX); 


/*
 some other code that was mentioned.

mySingleton.getInstance = function(){
if ( this._instance == null ) {
if ( isFoo() ) {
this._instance = new FooSingleton();
} else {
this._instance = new BasicSingleton();
}
}
return this._instance;
};

*/
</script>