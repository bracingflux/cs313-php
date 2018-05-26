<?php 
	if (isset($_POST)) {

		foreach ($_POST as $key => $value) {
	  		echo "<h1>Key: $key Value: $value<h1>";
	  	}
	  	echo "hi";
	}
	else {
		echo "POST not set..";
	}
 ?>