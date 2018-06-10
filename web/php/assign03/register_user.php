<?php
	session_start();
	require('load_db.php');

	if (isset($_POST)) {
		$username = htmlspecialchars($_POST["username"]);
		$password = htmlspecialchars($_POST["password"]);
		$hashPassword = password_hash($password, PASSWORD_DEFAULT);		
		$displayName = htmlspecialchars($_POST["displayName"]);
		// echo "1. $username";
		// echo " 2. $password";
		// echo " 3. $displayName";
		$isUser = false;		

		try {
			$stmt = $db->prepare('SELECT id, display_name FROM users WHERE username=:username AND password=:password');
			$stmt->execute(array(':username' => $username, ':password' => $password));
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			//this may fail before it can even do the count check
			if (count($rows) > 0) {
				foreach ($rows as $row) {
					$isUser = true;
					echo "User account already exists";				
				}
			}
		}
		catch(Exception $ex) {
			echo "User account already exists!";
			// $isUser = true;					
		}			
		if (!$isUser) {
			try {
				$query = "INSERT INTO users (username, password, display_name) VALUES (:username, :password, :display_name)";
				$statement = $db->prepare($query);
				$statement->bindValue(":username", $username, PDO::PARAM_STR);
				$statement->bindValue(":password", $hashPassword, PDO::PARAM_STR);
				$statement->bindValue(":display_name", $displayName, PDO::PARAM_STR);			
				$statement->execute();

				$_SESSION["userId"] = $db->lastInsertId(/*'users_id_seq'*/);
				echo "success!";
				// $_SESSION["userId"] = $userName;		
			}
			catch(Exception $ex) {
				echo $ex->getMessage();
			}
						
		}
	}
	else {
		echo "POST not set..";
	}
 ?>