<!DOCTYPE html>
<html lang="en-US">
<head>	
</head>
<body>
	<?php 
		$dbUrl = getenv('DATABASE_URL');
		if (empty($dbUrl)) {
			 $dbUrl = "postgres://postgres:Linus98!@localhost:5432/postgres";
		}
		echo "$dbUrl<br>";
		// $dbopts = parse_url($dbUrl);

		// print "<p>$dbUrl</p>\n\n";
		$dbHost = "localhost";
		$dbPort = "5432";
		$dbName = "postgres";
		$dbUser = "postgres";
		$dbPassword = "Linus98!";

		try {
		 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
		}
		catch (PDOException $ex) {
			print("<p>error:" . $ex->getMessage() . "</p><br>");
			die();
		}
		/*try
		{
		  $user = 'postgres';
		  $password = 'Linus98!';
		  $db = new PDO('pgsql:host=localhost;dbname=rb', $user, $password);

		  // this line makes PDO give us an exception when there are problems,
		  // and can be very helpful in debugging! (But you would likely want
		  // to disable it for production environments.)
		  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $ex)
		{
		  echo 'Error!: ' . $ex->getMessage() . " nope..";
		  die();
		}*/
		
	?>
</body>
</html>