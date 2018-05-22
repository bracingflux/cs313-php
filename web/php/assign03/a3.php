<?php 
	
	$dbUrl = getenv('postgres://hmufjxaoraveoi:8004b598443a41c86155a553beab2246b64842706de2c90402b37824e1889767@ec2-23-23-130-158.compute-1.amazonaws.com:5432/d7llnf8glafh95');

	$dbopts = parse_url($dbUrl);

	$dbHost = $dbopts["ec2-23-23-130-158.compute-1.amazonaws.com"];
	$dbPort = $dbopts["5432"];
	$dbUser = $dbopts["hmufjxaoraveoi"];
	$dbPassword = $dbopts["8004b598443a41c86155a553beab2246b64842706de2c90402b37824e1889767"];
	$dbName = ltrim($dbopts["d7llnf8glafh95"],'/');

	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>