<?php  
	if (isset($_POST)) {
		foreach ($_POST as $key => $value) {
			echo "$key $value<br>";
		}
	}
	else {
		echo "Post not set.";
	}
?>