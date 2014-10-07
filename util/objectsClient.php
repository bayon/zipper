<html>
	<head>
		<link rel="stylesheet" type="text/css" href="clientStyle.css">
		<link rel="stylesheet" type="text/css" href="UIObjects/InputObjects/inputObjects.css">
		<link rel="stylesheet" type="text/css" href="UIObjects/ContainerObjects/containerObjects.css">
		<link rel="stylesheet" type="text/css" href="UIObjects/LabelObjects/labelObjects.css">
	</head>
	<body>
		<?php
		include_once ('UIObjects/InputObjects/InputObjects.php');
		include_once ('UIObjects/ContainerObjects/ContainerObjects.php');
		include_once ('UIObjects/LabelObjects/LabelObjects.php');
		if (isset($_POST)) {
			echo("<pre>");
			print_r($_POST);
			echo("</pre>");
		}
		?>

		<?php $cssClassArray = array("redText", "italicText", "voo", "doo");
		echo("<form method='post' action='$_SERVER[PHP_SELF]' >");

		$label = new LabelObject("Input Text:");
		$gridCoordinates[0][0] = $label->make();
		
		$inputText = new InputText("firstname");//, $cssClassArray
		$gridCoordinates[0][1] = $inputText -> make();

		$label = new LabelObject("Textarea:");
		$gridCoordinates[1][0] = $label->make();
		$textarea = new TextArea("notes"); //, $cssClassArray
		$gridCoordinates[1][1] = $textarea -> make();

		$label = new LabelObject("Checkbox:");
		$gridCoordinates[2][0] = $label->make();
		$checkbox = new InputCheckbox("authorized", "Authorized"); //, $cssClassArray
		$gridCoordinates[2][1] = $checkbox -> make();

		$label = new LabelObject("Radio Group:");
		$gridCoordinates[3][0] = $label->make();
		$radio1 = new InputRadio("on_line", "on line", "on line", false);
		$gridCoordinates[3][1] = $radio1 -> make();
		$radio2 = new InputRadio("on_line", "off line", "off line", false);
		$gridCoordinates[3][1] .= $radio2 -> make();

		$label = new LabelObject("Select:");
		$gridCoordinates[4][0] = $label->make();
		$selectStart = new SelectStart("important_selection");
		$selectOptions = new SelectOptions( array("circuit", "network", "ip address"), $_POST['important_selection']);
		$gridCoordinates[4][1] = $selectStart -> make();
		$gridCoordinates[4][1] .= $selectOptions -> make();

		$label = new LabelObject("Submit Button:");
		$gridCoordinates[5][0] = $label->make();
		$submitButton = new SubmitButton('method', 'submitButton');
		$gridCoordinates[5][1] = $submitButton -> make();
		?>

		<?php
		$columnWidthPercentsArray = array(45, 45);
		$grid = new GridObject(6, 2, $gridCoordinates, $columnWidthPercentsArray);
		$grid -> make();
		?>
		<?php
		echo("<form method='post' action='$_SERVER[PHP_SELF]' >");
		$searchBox = new SearchBox("");
		$searchBox->make();
		?>
	</body>
</html>