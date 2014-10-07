<?php // php has to be called at least once ?>
<script>
	// The Observer
	function Observer(name) {
		var observerName = name;
		var receivedMsg;
		// maybe keep an array of saved messages...
		this.update = function(context) {
			alert("update function inside Observer");
			receivedMsg = context;
		};
		
		this.remember = function(){
			alert("I am "+ observerName +" and I remember the following message:"+ receivedMsg);
		};
		
	}
</script>