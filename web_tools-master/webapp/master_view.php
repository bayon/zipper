<div id="master_view">
	<div id="navigation">
		<?php
		include_once ('master_navigation.php');
		echo($master_navigation);
		?>
	</div>
	<div id ="page_data">
		<?php
		if (isset($_POST['page_data'])) {
			echo($_POST['page_data']);
		} else {
			include_once ('views/welcome/welcome.php');
			echo($view);
		}
		?>
	</div>
</div>
