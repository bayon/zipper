<?php // php has to be called at least once
include_once ("ObserverList.php");
include_once ("Observer.php");
?>
<script>
	function Subject() {
		this.observers = new ObserverList();
	}

	Subject.prototype.addObserver = function(observer) {
		this.observers.add(observer);
	};

	Subject.prototype.removeObserver = function(observer) {
		this.observers.removeAt(this.observers.indexOf(observer, 0));
	};

	Subject.prototype.notify = function(context) {
		var observerCount = this.observers.count();
		for (var i = 0; i < observerCount; i++) {
			this.observers.get(i).update(context);
			alert("...notify context:"+context);
		}
	};

</script>