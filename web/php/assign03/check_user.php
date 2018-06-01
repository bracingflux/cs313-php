<?php
	require('load_db.php');

	if (isset($_POST)) {
		foreach ($_POST as $key => $value) {
			echo "Key: $key Value: $value<br>";
		}
	}
	else {
		echo "POST not set..";
	}
 ?>