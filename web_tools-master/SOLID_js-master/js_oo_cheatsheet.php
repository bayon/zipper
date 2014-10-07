<?php /**/ ?>

<script>
	/* ///////////////////// BASIC OBJECT //////////////////////////// */
	alert("js: Basic Object");
	function Person(gender) {
		this.gender = gender;
	}


	Person.prototype.gender = '';

	Person.prototype.sayHello = function() {
		alert('hello');
		alert(this.gender);
	};

	var person1 = new Person('Male');
	var person2 = new Person('Female');

	// call the Person sayHello method.
	person1.sayHello();
	// hello
</script>

<script>
	/* ///////////////////// BASIC EXTENDS //////////////////////////// */
	alert("js: Basic Extends");
	var extend = function(OBJ, extendsOBJ) {
		for (var property in extendsOBJ) {
			if (OBJ[property] && ( typeof (OBJ[property]) == 'object') && (OBJ[property].toString() == '[object Object]') && extendsOBJ[property])
				extend(OBJ[property], extendsOBJ[property]);
			else
				OBJ[property] = extendsOBJ[property];
		}
		return OBJ;
	}
	var child = {
		child : 'test'
	};

	var parent = {
		newFoo : function() {
			alert('hi how do you like the genes I gave you?');
		}
	};

	// the addition
	extend(child, parent);
	// extend it
	child.newFoo(); 
</script>

<script>
	/* ///////////////////// BASIC INHERITENCE //////////////////////////// */
	alert("js: Basic INHERITENCE");
	// define the Person Class
	function Person() {
	}


	Person.prototype.walk = function() {
		alert('I am walking!');
	};
	Person.prototype.sayHello = function() {
		alert('hello');
	};

	// define the Student class
	function Student() {
		// Call SUPER constuctor
		Person.call(this);
	};
	// inherit Person
	Student.prototype = new Person();
	// !!!!! correct the constructor pointer because it points to Person !!!!!
	Student.prototype.constructor = Student;
	//@override  replace the sayHello method
	Student.prototype.sayHello = function() {
		alert('hi, I am a student');
	};
	// add sayGoodBye method
	Student.prototype.sayGoodBye = function() {
		alert('goodBye');
	};

	// USAGE

	var student1 = new Student();
	student1.sayHello();
	student1.walk();
	student1.sayGoodBye();

	// check inheritance
	alert( student1 instanceof Person);
	// true
	alert( student1 instanceof Student);
	// true

	//Using Object.create the inheritance line would instead be:
	//Student.prototype = Object.create(Person.prototype);
</script>

<script>
	/* ///////////////////// BASIC INTERFACE //////////////////////////// */
	alert("js: Basic INTERFACE");
	Object.prototype.can = function(methodName) {
		return (( typeof this[methodName]) == "function");
	};

	if (someObject.can("quack")) {
		someObject.quack();
	}

</script>
<script>
    /* ///////////////////// BASIC INTERFACE //////////////////////////// */
    alert("js: Basic INTERFACE");
    
     function MyObject() {
    }

    MyObject.prototype.sayHello = function() {
        alert('hello');
    };

    var myObject = new MyObject();
  
// In javascript it appears that the interface and the implementor of that interface, are one and the same. 
//There are just a few additional components. 1) The "Object.prototype.can..." and the "condition checks".

     MyObject.prototype.can = function(methodName) {
        return (( typeof this[methodName]) == "function");
    };
    

    if (myObject.can("sayHello")) {
        myObject.sayHello();
    }
    if(myObject.can("sayHiYall")) {
        myObject.sayHiYall();
    }else{
        alert('myObject: you cant do that');
    }

</script>
