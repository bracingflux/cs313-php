<?php 
	require('db_info.php');
	session_start();

	$userName = htmlspecialchars($_POST["uName"]);
	$password = htmlspecialchars($_POST["psw"]);
	// echo "Your stuff: $userName $password";

	

	$isIN = false;

	//echo $userName . " " . $password;
	try {
		$query = 'SELECT id, username, password FROM ta07_users WHERE username=:username';
		$statement = $db->prepare($query);
		$statement->bindValue(":username", $userName, PDO::PARAM_STR);
		$statement->execute();
		$row = $statement->fetch();

		var_dump($row);
		echo  "This is the password: " . $row["password"];

		if (password_verify($password, $row['password'])) {
			echo "<h1>Welcome " . $row['username'] . "!</h1>";
		}
		else {
			echo "Invalid credentials";
		}
	}
	catch(Exception $ex) {
		echo "Failure to connect to database.";
	}
	

	 /*foreach ($db->query('SELECT id, username, password FROM ta07_users WHERE password=:password AND username=:username') as $row) {
	    echo $row["username"] . " " . $row["password"];  
	   if ($userName == $row["username"] && $password == $row["password"])
	   {
	       $_SESSION["messageL"] = "You have an account already. Please login";
	       header("Location: login.php");
	       $isIN = true;
	       break;
	   }
	}*/

	   /*if(!$isIn)

	   {    
	       $query = "INSERT INTO ta07_users (username, password) VALUES (:username, :password)";
	       $statement = $db->prepare($query);
	       $statement->bindValue(":username", $userName, PDO::PARAM_STR);
	       $statement->bindValue(":password", $hashPassword, PDO::PARAM_STR);
	       $statement->execute();

	       $_SESSION["user_Name"] = $userName;


	       $_SESSION["id"] = $db->lastInsertId('ta07_users_id_seq');

	       // echo $_SESSION["id"];
	       header("Location: welcome.php");
	       echo "<h1>Done!</h1>";
	         break;
	   }*/
	   die();
?>