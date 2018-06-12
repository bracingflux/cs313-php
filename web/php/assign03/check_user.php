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
		       echo $row['display_name'];								
			}
			else {
				echo "Invalid credentials -1";
			}
		}
		catch(Exception $ex) {
			echo "Failure to connect to database.";
		}
		   die();
		
	}
	else {
		echo "POST not set..";
	}
 ?>