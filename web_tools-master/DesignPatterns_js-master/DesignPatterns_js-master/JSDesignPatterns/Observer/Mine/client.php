<?php // php has to be called at least once
include_once ("Subject.php");
include_once ("Observer.php");
?>

<script>

	alert("DesignPattern: Observer");
	
	var subject = new Subject();

	var observer1 = new Observer("Jill");
	subject.addObserver(observer1);

	var observer2 = new Observer("Bobby");
	subject.addObserver(observer2);

	var message = "Observers 1 and 2 just entered the room.";
	subject.notify(message);
	subject.removeObserver(observer2);

	var newMessage = "Observer 2 left the room.";
	subject.notify(newMessage);
	
	
	subject.observers.get(0).remember();

</script>