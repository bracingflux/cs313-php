<?php
	session_start();
	require('load_db.php');

	if (isset($_POST)) {
		$comment = htmlspecialchars($_POST["comment1"]);
		$root_beer_id = htmlspecialchars($_POST["rbId"]);
		$user_id = htmlspecialchars($_POST["userId"]);

		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('America/Denver'));
		$dt->setTimestamp($timestamp);
		$timestamp = $dt->format('d.m.Y, H:i:s');
		try {
			$query = "INSERT INTO comments (text, timestamp, user_id, root_beer_id) VALUES (:text, :timestamp, :user_id, :root_beer_id)";
			$statement = $db->prepare($query);
			$statement->bindValue(":text", $comment, PDO::PARAM_STR);
			$statement->bindValue(":timestamp", $timestamp, PDO::PARAM_STR);
			$statement->bindValue(":user_id", $user_id, PDO::PARAM_INT);
			$statement->bindValue(":root_beer_id", $root_beer_id, PDO::PARAM_INT);		
			$statement->execute();
			// echo "Comment submitted! ";

			$newId = $db->lastInsertId();
			// echo $newId;
			$stmt = $db->prepare('SELECT c.text, c.timestamp, u.display_name, u.id FROM comments c INNER JOIN root_beers rb ON c.root_beer_id = rb.id 
				INNER JOIN users u ON c.user_id = u.id WHERE c.id =:id');
			$stmt->execute(array(':id' => $newId));
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $row) {			
				$time = strtotime($row['timestamp']);
				// if ($saved_id == $row['id']) {
				$time2 = $row['timestamp'];
				$query2 = 'SELECT id FROM comments WHERE timestamp =:ctime';
				$statement2 = $db->prepare($query2);
				$statement2->bindValue(":ctime", $time2);
				$statement2->execute();
				$row2 = $statement2->fetch();

				echo  "<div id='p" . $row2['id'] . "' class='container_message darker'><p>" . $row['text'] . "\n\n<span style='float: right;'>-" . $row['display_name'] . "</span><span class='time-left'>" . date("h:i A", $time) . "</span>" . "</p><p class='delComment'><form class='deleteComment'><button type='submit' class='w3-btn w3-red w3-small delBtn'><i class='material-icons'>delete</i></button>
					<input type='hidden' class='hidden1' name='comment' value=\"" . $row2['id'] . "\"></form></p></div>";

				// }
				// else {
				// 	echo  "<div class='container_message'><p>" . $row['text'] . "\n\n-" . $row['display_name'] . "<span class='time-right'>" . date("h:i A", $time) . "</span>" . "</p></div>";
				// }			
			}
			/*foreach ($rows as $row) {
					$time = strtotime($row['timestamp']);
					echo  "<div class='container_message darker'><p>" . $row['text'] . "\n\n<span style='float: right;'>-" . $row['display_name'] . "</span><span class='time-left'>" . date("h:i A", $time) . "</span>" . "</p></div>";
				}*/	
		}
		catch(Exception $ex) {
			echo "There was an error.";
			echo $ex->getMessage();
		}
		
		/*foreach ($_POST as $key => $value) {
			echo "Key $key Value: $value";
		}*/
	}
	else {
		echo "POST not set..";
	}
 ?>