<?php
	session_start();
	require('load_db.php');

	if (isset($_POST)) {
		foreach ($_POST as $key => $value) {
			echo "Key $key Value: $value";
		}
	}
	else {
		echo "POST not set..";
	}
 ?>