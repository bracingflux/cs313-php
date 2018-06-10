<?php
	session_start();
	require('load_db.php');

	if (isset($_POST)) {
		$username = htmlspecialchars($_POST["uname"]);
		$password = htmlspecialchars($_POST["psw"]);

		try {
			$query = 'SELECT id, display_name, password FROM users WHERE username=:username';
			$statement = $db->prepare($query);
			$statement->bindValue(":username", $username, PDO::PARAM_STR);
			$statement->execute();
			$row = $statement->fetch();

			if (password_verify($password, $row['password'])) {
		       $_SESSION["userId"] = $row['id'];
		       echo $row['username'];								
		       	// header("Location: welcome.php");			
			}
			else {
				echo "Invalid credentials -1";
			}
		}
		catch(Exception $ex) {
			echo "Failure to connect to database.";
		}
		   die();

		/*$stmt = $db->prepare('SELECT id, display_name FROM users WHERE username=:username AND password=:password');
		$stmt->execute(array(':username' => $username, ':password' => $password));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if (count($rows) > 0) {
			foreach ($rows as $row) {
				echo $row['display_name'];
				$_SESSION["userId"] = $row['id'];
			}
		}
		else {
			echo "-1";
		}*/
	}
	else {
		echo "POST not set..";
	}
 ?>