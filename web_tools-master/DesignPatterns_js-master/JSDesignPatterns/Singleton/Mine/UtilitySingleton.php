<?php // php has to be called at least once ?>

<script>
	var UtilitySingleton = (function() {
		// configuration options:
		function Singleton(options) {
			// options OR empty
			options = options || {};
			this.name = options.name || "SharedUtility";
			this.pointX = options.pointX || 6;
			this.pointY = options.pointY || 10;
		}
		// instance holder
		var instance;
		// an emulation of static variables and methods
		var _static = {
			name : "UtilitySingleton",
			// return a singleton instance
			getInstance : function(options) {
				if (instance === undefined) {
					instance = new Singleton(options);
				}
				return instance;
			}
		};

		return _static;

	})();

</script>