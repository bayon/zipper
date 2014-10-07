<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html >
	<!-- <html manifest="appcache.appcache"> -->
	<head>
		<meta charset="UTF-8">
		<title>webTool:  </title>
		<link rel="stylesheet" type="text/css" href="css.css">

		<!-- <nprTable> -->
		<script src="tableX.js"></script>
		<script src="tableFormattedData.js"></script>
		<link rel="stylesheet" type="text/css" href="tableX.css">
		<!-- </nprTable> -->

		<!-- <navigation> -->
		<script src="ajaxer.js"></script>
		<script src="navigation.js"></script>
		<link rel="stylesheet" type="text/css" href="navigation.css">
		<!-- </navigation>-->

	 

	 

		<!-- <rwd> -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<link rel="stylesheet" type="text/css" href="rwd.css">
		<!-- </rwd> -->

	</head>

	<body onload ="initPage()">
		<div id="page">
			<div id ="section_main">
				 
				<!-- <navigation> -->
				<div id="navigation">
					<button class="navigationButton" type="button" onclick="menu1()">
						Who
					</button>
					<button  class="navigationButton" type="button" onclick="menu2()">
						What
					</button>
					<button  class="navigationButton" type="button" onclick="menu3()">
						Where
					</button>

				</div>

				<div id="content">
					<div id="menu1" class="menu_item"></div>

					<div id="menu2"  class="menu_item"></div>

					<div id="menu3"  class="menu_item"></div>

					<!-- AUXILIARY VIEWS -->
					<!-- <table> -->
					<div id="tableXContainer" ></div>
					<!-- <geocode> -->
					<div id="map-canvas2" ></div>

				</div>
				<!--</navigation>-->
			</div>
		</div>
	</body>
</html>
  
<script>
	function initPage() {
		hideAllMenus();
		//codeAddress(addressElementId);
	}
</script>

<script>
	// <tableX>
	function TableFactory() {
	}


	TableFactory.prototype = new Factory();
	TableFactory.prototype.Class = TableX;

	var tableFactory = new TableFactory();
	var myTable = tableFactory.createClass({
		ClassType : "TableX",
		tableData : myArray,
		tableHeader : "one"
	});
	document.getElementById('tableXContainer').innerHTML = myTable.tableHTML;

	// DELEGATE METHODS:
	function rowSelectedAtIndex(tr) {
		var index = tr.rowIndex - 1;
		// -1 because data array starts at 0 and table index at 1.
		var personSelected = myArray[index];
		alert(personSelected.name + ": " + personSelected.id);

	}

</script>

