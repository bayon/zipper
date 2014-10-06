<?php include('./../../../config.php'); ?>
<!DOCTYPE html>
<html>
<style>
	body{font-family:helvetica;}
		a{font-size:13px;margin-right:10px;}
		p{margin:0;font-size:13px;font-weight:bold;}
	</style>
	<body>
		<a href ="<?=BASE_URL;?>" >technology home</a>
		<br>
		<br>
		<h3>Angular</h3>
		<a href="http://www.w3schools.com/angular/angular_intro.asp" target="_blank" >Angular Tutorial W3Schools</a>

		<br></br>
		<a href="sample app/sample_app.html">sample application</a>
		<br><a href="examples/http.php">http</a>
		<br><a href="examples/SQL.php">sql</a>
		<br><a href="examples/controllers.php">controllers</a>
		<br><a href="examples/filters.php">filters</a>
		<br><a href="examples/dom.php">dom</a>
		<br><a href="examples/html_events.php">html_events</a>
		<br><a href="examples/modules/index.php">module</a>
		<br><a href="examples/forms.php">forms</a>
		<br><a href="examples/validation.php">validation</a>
		<br><a href="examples/bootstrap.php">bootstrap</a>
		<br><a href="examples/includes/index.php">includes</a>
		
		 
		 
		
		
		
	 <hr>
		<p>
			AngularJS Extends HTML
AngularJS extends HTML with ng-directives.

The ng-app directive defines an AngularJS application.

The ng-model directive binds the value of HTML controls (input, select, textarea) to application data.

The ng-bind directive binds application data to the HTML view.
		<br> </br>
			AngularJS starts automatically when the web page has loaded.

The ng-app directive tells AngularJS that the -div- element is the "owner" of an AngularJS application.

The ng-model directive binds the value of the input field to the application variable name.

The ng-bind directive binds the innerHTML of the -p- element to the application variable name.
		</p>
		<br> </br>
		<p>The ng-init directive initialize AngularJS application variables.</p>
		<p>You can use <span style="font-weight:bold;">data-ng-</span>, instead of ng-, if you want to make your page <span style="font-weight:bold;">HTML5 valid</span></p>
		 
		<script src="angular.min.js"></script>

	</body>
</html>