<?php 
	if (isset($_POST)) {

		foreach ($_POST as $key => $value) {
	  		echo "$value";
	  	}
	}
	else {
		echo "POST not set..";
	}
 ?>