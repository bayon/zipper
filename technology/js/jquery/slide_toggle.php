<!DOCTYPE html>
<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
			$(document).ready(function() {
				$("#flip").click(function() {
					$("#panel").slideToggle("slow");
				});
			});
		</script>

		<style>
			#panel, #flip {
				padding: 5px;
				text-align: center;
				background-color: #e5eecc;
				border: solid 1px #c3c3c3;
			}
			#panel {
				padding: 50px;
				display: none;
			}
		</style>
	</head>
	<body>

		<div id="flip">
			Click to slide the panel down or up
		</div>
		<div id="panel">
			Hello world!
		</div>

	</body>
</html>