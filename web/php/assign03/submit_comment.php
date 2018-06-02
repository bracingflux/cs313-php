<?php
	session_start();
	require('load_db.php');

	if (isset($_POST)) {
		$comment = htmlspecialchars($_POST["comment1"]);
		$root_beer_id = htmlspecialchars($_POST["rbId"]);
		$user_id = htmlspecialchars($_POST["userId"]);

		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone('America/Denver')); //first argument "must" be a string
		$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
		$timestamp = $dt->format('d.m.Y, H:i:s');
		try {
			$query = "INSERT INTO comments (text, timestamp, user_id, root_beer_id) VALUES (:text, :timestamp, :user_id, :root_beer_id)";
			$statement = $db->prepare($query);
			$statement->bindValue(":text", $comment, PDO::PARAM_STR);
			$statement->bindValue(":timestamp", $timstamp, PDO::PARAM_STR);
			$statement->bindValue(":user_id", $user_id, PDO::PARAM_INT);
			$statement->bindValue(":root_beer_id", $root_beer_id, PDO::PARAM_INT);		
			$statement->execute();
			echo "Comment submitted!";	
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