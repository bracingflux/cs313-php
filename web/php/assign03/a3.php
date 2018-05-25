<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Database Query</title>	
</head>
<body>
	<p>Hello! This is a database query page!</p>
	<?php 
		$dbUrl = getenv('HEROKU_POSTGRESQL_AMBER_URL');		
		if (empty($dbUrl)) {
			echo "it's empty";
			$dbUrl = "postgres://hmufjxaoraveoi:8004b598443a41c86155a553beab2246b64842706de2c90402b37824e1889767@ec2-23-23-130-158.compute-1.amazonaws.com:5432/d7llnf8glafh95";
		}
		$dbopts = parse_url($dbUrl);		
		$dbHost = $dbopts["host"];
		$dbPort = $dbopts["port"];
		$dbUser = $dbopts["user"];
		$dbPassword = $dbopts["pass"];
		$dbName = ltrim($dbopts["path"],'/');
		echo "<p>Working..</p>";

		print "<p>pgsql:host=$mHost;port=$mPort;dbname=$dbName User: $mUser Pass: $mPass</p>\n\n";
		try
		{
			// $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

     		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);			
			echo "<p>db set</p>";
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			foreach ($db->query('SELECT name, description FROM rb_test') as $row) {
				echo "Root Beer name: " . $row['name'];
				// echo "Description: " . $row['description'];
				echo "<br>";
			}
			echo "<p>Items should have printed</p>";
		}
		catch(PDOException $ex) {
			echo "<p>Error: " . $ex->getMessage() . "</p><br>";
			die();
		}

		
		
	?>
</body>
</html>