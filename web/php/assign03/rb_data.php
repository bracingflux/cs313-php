<?php
	require('load_db.php');

	if (isset($_POST)) {
		$rb = "";
		foreach ($_POST as $key => $value) {
	  		$rb = $value;
	  	}

	  	$stmt = $db->prepare('SELECT name, description, type, brand FROM root_beers WHERE name=:name');
		$stmt->execute(array(':name' => $rb));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($rows as $row) {
			echo "Name: " . $row['name'] . "\nDescription: " . $row['description'] . "\nType: " . $row['type']
			. "\nBrand: " . $row['brand'];
		}
	}
	else {
		echo "POST not set..";
	}
 ?>