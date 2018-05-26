<?php
	require('load_db.php');

	if (isset($_POST)) {
		$rb = "";
		$id = 0;
		foreach ($_POST as $key => $value) {
	  		$rb = $value;
	  	}

	  	$stmt = $db->prepare('SELECT name, description, type, brand, id FROM root_beers WHERE name=:name');
		$stmt->execute(array(':name' => $rb));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($rows as $row) {
			echo "Name: " . $row['name'] . "\n\nDescription: " . $row['description'] . "\n\nType: " . $row['type']
			. "\n\nBrand: " . $row['brand'];
			$id = $row['id'];
		}
		echo "id = $id";

		$stmt2 = $db->prepare('SELECT "text", "timestamp" FROM comments WHERE root_beer_id=:id');
		$stmt2->execute(array(':id' => $id));
		$comment_rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);

		foreach ($comment_rows as $row) {
			echo "Comments:\n\nTime: " . $row['timestamp'] . "\n\nComment: " . $row['text'];
		}
	}
	else {
		echo "POST not set..";
	}
 ?>