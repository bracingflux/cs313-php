<?php 
	if (isset($_POST)) {

		foreach ($_POST as $key => $value) {
	  		echo "<h1>Key: $key Value: $value<h1>";
	  	}
	}
	else {
		echo "POST not set..";
	}
 ?>