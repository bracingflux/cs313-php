<?php
	session_start();
	if (isset($_SESSION['hats'])) {
		$hats = $_SESSION['hats'];
		foreach ($_POST as $key => $value) {
			$position = array_search($value, $hats);
			unset($hats[$position]);			
		}
		$_SESSION['hats'] = $hats;
		foreach ($hats as $hat) {
			echo "$hat ";			
		}
	}
	else {
		echo "Session not started..";			
	}
		
?>