<!DOCTYPE html>
<html lang="en-US">
<head>	
</head>
<body>
	<p>Hello!</p>
	<?php 
		$dbUrl = getenv('postgres://hmufjxaoraveoi:8004b598443a41c86155a553beab2246b64842706de2c90402b37824e1889767@ec2-23-23-130-158.compute-1.amazonaws.com:5432/d7llnf8glafh95');

		$dbopts = parse_url($dbUrl);

		$dbHost = $dbopts["ec2-23-23-130-158.compute-1.amazonaws.com"];
		$dbPort = $dbopts["5432"];
		$dbUser = $dbopts["hmufjxaoraveoi"];
		$dbPassword = $dbopts["8004b598443a41c86155a553beab2246b64842706de2c90402b37824e1889767"];
		$dbName = ltrim($dbopts["d7llnf8glafh95"],'/');
		echo "<p>Working..</p>";
		try
		{
			// $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
			$db = new PDO("pgsql:    ec2-23-23-130-158.compute-1.amazonaws.com;port=5432;dbname=    d7llnf8glafh95", "hmufjxaoraveoi", "8004b598443a41c86155a553beab2246b64842706de2c90402b37824e1889767");
			echo "<p>db set</p>";
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