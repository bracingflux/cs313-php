<!DOCTYPE html>
<html lang="en-US">
<head>	
</head>
<body>
	<p>Hello!</p>
	<?php 
		$dbUrl = getenv('DATABASE_URL');

		$dbopts = parse_url($dbUrl);

		$dbHost = $dbopts["ec2-23-23-130-158.compute-1.amazonaws.com"];
		$dbPort = $dbopts["5432"];
		$dbUser = $dbopts["hmufjxaoraveoi"];
		$dbPassword = $dbopts["8004b598443a41c86155a553beab2246b64842706de2c90402b37824e1889767"];
		$dbName = ltrim($dbopts["path"],'/');
		echo "<p>Working..</p>";
		try
		{
			// $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

			echo "<p>db set</p>";
			$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			foreach ($db->query('SELECT name, description FROM root_beers') as $row) {
				echo "Root Beer name: " . $row['name'];
				echo "Description: " . $row['description'];
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