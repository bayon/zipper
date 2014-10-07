<?php session_start();
//
//$_SESSION['estimate_items'] = array("item"=>"thing1","cost"=>"0");
if(isset($_POST)){
	echo("<pre>");print_r($_POST);echo("</pre>");
	if(isset($_POST['estimation'])){
		$_SESSION['current_estimate'] = $_POST['estimation'];
	}
	if(isset($_POST['item'])){
		
		$_SESSION['estimate_items'] = array_push($_SESSION['estimate_items'],$_POST['item']);
		
		echo("estimation items:".$_SESSION['estimate_items']);
	}
	
	echo("current estimation:".$_SESSION['current_estimate']);
	
}
?>
<html>
	<head>
		
	</head>
	
	<style>
	html{
		
	}
	body{
		background-color:#fff;
		color:#000;
	}
		.div_std {
			float: left;
			width: 90%;
			margin-left: 5%;
			margin-right: 5%;
			margin-top: 20px;
			border: solid 1px #cccccc;
		}
		label {
			float: left;
			width: 100%;
		}
		select {
			float: left;
			width: 100%;
		}
		input {
			float: left;
			width: 100%;
		}
	</style>
	 <?php 
	 $items = array( array("item" => "4x4x8 post", "cost" => 10), array("item" => "6ft picket", "cost" => 2.40), array("item" => "2x4x8", "cost" => 2.55));
	$tasks = array( array("task" => "dig post hole", "min" => 15), array("task" => "attach picket", "min" => 3), array("task" => "attach 2x4", "min" => 4));
	$estimations = array( array("description" => "50ft wooden fence", "items" => "arrayOfItems", "tasks" => "arrayOfTasks"));
	$estimate_items = array(array("item"=>"hammer","cost"=>"0"));
	if (!isset($_SESSION['items'])) {
		$_SESSION['items'] = $items;
	}
	if (!isset($_SESSION['tasks'])) {
		$_SESSION['tasks'] = $tasks;
	}
	if (!isset($_SESSION['estimations'])) {
		$_SESSION['estimations'] = $estimations;
		$_SESSION['estimate_items'] =$estimate_items ;
	}
	 ?>
	<script>
		function ratePerMinute(dollarsPerHour) {
			return dollarsPerHour / 60;
		}

		function init() {
			var perHr = document.getElementById('rate_per_hour').value;
			var perMin = ratePerMinute(perHr);
			document.getElementById("rate_per_minute").value = perMin;
		}
</script>
	
	<body onload="init()">
		<div class="div_std">
			<form id='estimator' name='estimator' method='post' action='<?=$_SERVER['PHP_SELF'];?>'
			<label>rate per hour</label>
			<input type="text" id="rate_per_hour" name="rate_per_hour" value="30" />
			<label>rate per minute</label>
			<input type="text" id="rate_per_minute" name="rate_per_minute" value="" />
			
			  <label>estimations</label>
			  <select id="estimation" name="estimation">
			 	<?php foreach($estimations as $estimation){ ?>
			 		<option><?=$estimation["description"] . " "  ; ?></option>
			 	<?php } ?>
			 </select>
			<input type='submit' name='method' value='select estimation'/>
			</form>
			<div>
				<form id='add_item' name='add_item' method='post' action='<?=$_SERVER['PHP_SELF'];?>'
				 <label>items</label>
			 <select id="item" name="item">
			 	<?php foreach($items as $item){ ?>
			 		<option><?=$item["item"] . "&nbsp;$" . $item["cost"]; ?></option>
			 	<?php } ?>
			 </select>
			 <input type='hidden' name='method' value='add_item'/>
			 <input type='submit' name='add' value='+'/>
			 </form>
			 
			 <label>tasks</label>
			  <select id="tasks" name="tasks">
			 	<?php foreach($tasks as $task){ ?>
			 		<option><?=$task["task"] . "&nbsp;min:" . $task["min"]; ?></option>
			 	<?php } ?>
			 </select>
			</div>
		</div>
	</body>
</html>

 