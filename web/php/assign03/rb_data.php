<?php
	session_start();
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
			echo "<p>Name: " . $row['name'] . "\n\nDescription: " . $row['description'] . "\n\nType: " . $row['type']
			. "\n\nBrand: " . $row['brand'] . "</p>";
			$id = $row['id'];
		}

		$stmt = $db->prepare('SELECT c.text, c.timestamp, u.display_name FROM comments c INNER JOIN root_beers rb ON c.root_beer_id = rb.id INNER JOIN users u ON c.user_id = u.id WHERE rb.id =:id');
		$stmt->execute(array(':id' => $id));
		$comment_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($comment_rows) > 0) {
			echo "<p>Comments:\n</p>";
			if (isset($_SESSION["userId"])) {
				echo "<form>
						<textarea name='comment' placeholder='Enter your comment here'></textarea><br>
						<button type='submit' class='comment_submit' name='Send Comment'>Send Comment</button>
					  </form>";
			}
		}

		foreach ($comment_rows as $row) {			
			$time = strtotime($row['timestamp']);			
			echo  "<div class='container_message'><p>\"" . $row['text'] . "\" <span class='time-right'>" . date("m-d-Y h:i A", $time) . "</span>" . "\n\n-" . $row['display_name'] . "\n\n</p></div>";
		}
	}
	else {
		echo "POST not set..";
	}
 ?>