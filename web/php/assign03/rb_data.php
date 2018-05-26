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

		$stmt2 = $db->prepare('SELECT "text", "timestamp" FROM comments WHERE root_beer_id=:id');
		$stmt2->execute(array(':id' => $id));
		$comment_rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);
		echo "\n\nComments:\n\n";
		foreach ($comment_rows as $row) {
			$time = $row['timestamp'];
			$splitTime = split(' ', $time);
			$time = $splitTime[0] . " " . $splitTime[1];
			echo  "\"" . $row['text'] . "\" " . $time . "\n\n";
		}
	}
	else {
		echo "POST not set..";
	}
 ?>