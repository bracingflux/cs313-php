<?php
	require('load_db.php');

	if (isset($_POST)) {
		$username = htmlspecialchars($_POST["uname"]);
		$password = htmlspecialchars($_POST["psw"]);

		$stmt = $db->prepare('SELECT id, display_name FROM users WHERE username=:username AND password=:password');
		$stmt->execute(array(':username' => $username, ':password' => $password));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($rows) > 0) {
			foreach ($rows as $row) {
				echo "Welcome " . $row['displayname'] . "!";
			}
		}
		else {
			echo "-1";
		}
	}
	else {
		echo "POST not set..";
	}
 ?>