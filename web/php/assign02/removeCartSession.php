<?php
	session_start();
	if (isset($_SESSION['hats'])) {
		$hats = $_SESSION['hats'];
		foreach ($_POST as $key => $value) {
			array_push($hats, $value);
		}
		$_SESSION['hats'] = $hats;
		foreach ($hats as $hat) {
			echo "$hat ";			
		}
	}
	else {
		$hats = Array();

		foreach ($_POST as $key => $value) {
				array_push($hats, $value);
			}

		$_SESSION['hats'] = $hats;	
	}
		
?>