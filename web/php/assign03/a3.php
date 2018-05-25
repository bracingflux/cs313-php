<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../css/a3.css">
	<title>Root Beer Revelry</title>	
</head>
<body>
	<div id="banner">
		<img src="../../photos/revelry.jpg" class="center" alt="Root Beer Revelry banner">
		<p class="def">
			rev·el·ry \'re-vəl-rē\ • n. pl. rev·el·ries • Boisterous merrymaking.
		</p>
	</div>

	<?php
	require('load_db.php');

	foreach ($db->query('SELECT name FROM root_beers') as $row) {
		echo "<img src='../../photos/rbs/" . $row['name'] . " class='center' alt='" . $row['name'] . "'>";
		echo "<div class='rb_item'><p class='white'>" . $row['name'] ."</p></div>";
	}		
	?>
</body>
</html>