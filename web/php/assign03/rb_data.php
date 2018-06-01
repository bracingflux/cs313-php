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
/*
		$stmt2 = $db->prepare('SELECT "text", "timestamp" FROM comments WHERE root_beer_id=:id');
		$stmt2->execute(array(':id' => $id));
		$comment_rows = $stmt2->fetchAll(PDO::FETCH_ASSOC);
		echo "\n\nComments:\n\n";
		foreach ($comment_rows as $row) {
			$time = $row['timestamp'];
			$splitTime = explode(" ", $time);
			$time = $splitTime[0];
			echo  "\"" . $row['text'] . "\" " . $time . "\n\n";
		}*/

		$stmt = $db->prepare('SELECT c.text, c.timestamp, u.display_name FROM comments c INNER JOIN root_beers rb ON c.root_beer_id = rb.id INNER JOIN users u ON c.user_id = u.id WHERE rb.id =:id');
		$stmt->execute(array(':id' => $id));
		$comment_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($comment_rows) > 0) {
			echo "\n\nComments:\n\n";
		}

		foreach ($comment_rows as $row) {
			// $time = $row['timestamp'];
			$time = strtotime($row['timestamp']);
			// $splitTime = explode(" ", $time);
			// $time = $splitTime[0];
			echo  "\"" . $row['text'] . "\" " . date("m-d-Y", $time) . "\n\n-" . $row['display_name'] . "\n\n";
		}
	}
	else {
		echo "POST not set..";
	}
 ?>