<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../css/a3.css">
	<title>Database Query</title>	
</head>
<body>
	<p>Hello! This is a database query page!</p>
	<?php
	require('load_db.php');

	foreach ($db->query('SELECT name FROM rb_test') as $row) {
		echo "<div class='rb_item'><p class='white'>" . $row['name'] ."</p></div>";
	}		
	?>
</body>
</html>