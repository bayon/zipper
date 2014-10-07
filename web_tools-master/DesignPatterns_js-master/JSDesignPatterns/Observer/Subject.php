<?php // php has to be called at least once
include_once ("ObserverList.php");
include_once ("Observer.php");
/*
 * Since Javascript doesn't exactly have sub-class objects, 
 * prototype is a useful workaround to make a "base class" object 
 * of certain functions that act as objects.
 * 
 * 
 * 
 *    L E F T   O F F   H E R E   (trying to understand the "Observer" example and Object.prototype.
 * 
 */
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
		}
	};

</script>