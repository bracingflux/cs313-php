<?php
	session_start();
	require('load_db.php');
	require('resources.php');
	$saved_id = "";

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

		$stmt = $db->prepare('SELECT c.text, c.timestamp, u.display_name, u.id FROM comments c INNER JOIN root_beers rb ON c.root_beer_id = rb.id INNER JOIN users u ON c.user_id = u.id WHERE rb.id =:id');
		$stmt->execute(array(':id' => $id));
		$comment_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (isset($_SESSION["userId"])) {
			$saved_id = $_SESSION["userId"];
			echo "<form class='commentSubmit'>";
			echo "<textarea name='comment1' id='commentText' class='comment_box' placeholder='Enter your comment here'></textarea>";	      
			echo "<label class='hidden1' id='commentEmpty'><b>Comment is empty</b></label>";
			echo "<input type='hidden' name='rbId' value='" . $id . "'></input>";
			echo "<input type='hidden' name='userId' value='" . $saved_id . "'></input>";
			echo "<button class='sendComment' type='submit'>Send Comment</button>";
			echo "</form>";
		}

		if (count($comment_rows) > 0) {
			echo "<p>Comments:\n</p>";
			
			foreach ($comment_rows as $row) {			
				$time = strtotime($row['timestamp']);
				if ($saved_id == $row['id']) {
					$time2 = $row['timestamp'];
					$query2 = 'SELECT id FROM comments WHERE timestamp =:ctime';
					$statement2 = $db->prepare($query2);
					$statement2->bindValue(":ctime", $time2);
					$statement2->execute();
					$row2 = $statement2->fetch();

					echo  "<div id='p" . $row2['id'] . "' class='container_message darker'><p>" . $row['text'] . "\n\n<span style='float: right;'>-" . $row['display_name'] . "</span><span class='time-left'>" . date("h:i A", $time) . "</span>" . "</p><p class='delComment'><form class='deleteComment'><button type='submit' class='w3-btn w3-red w3-small delBtn'><i class='material-icons'>delete</i></button>
						<input type='hidden' class='hidden1' name='comment' value=\"" . $row2['id'] . "\"></form></p></div>";

				}
				else {
					echo  "<div class='container_message'><p>" . $row['text'] . "\n\n-" . $row['display_name'] . "<span class='time-right'>" . date("h:i A", $time) . "</span>" . "</p></div>";
				}			
			}			
		}

		
	}
	else {
		echo "POST not set..";
	}
 ?>

 <input type="hidden" name="">