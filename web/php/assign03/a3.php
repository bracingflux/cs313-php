<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../../css/a3.css">
	<title>Database Query</title>	
</head>
<body>
	<div style="border-bottom: 5px solid #c3a2a2; padding-bottom: .5%; border-radius: 5px;">
		<img src="../../photos/revelry.jpg" class="center" alt="Root Beer Revelry banner" style="height: 7.5%; width: 39.62%;">
		<p class="def" style="margin-left: 52%;">
			rev·el·ry \'re-vəl-rē\<br> n. pl. rev·el·ries<br> Boisterous merrymaking.
		</p>
	</div>
	
	<?php
	require('load_db.php');

	foreach ($db->query('SELECT name FROM rb_test') as $row) {
		echo "<div class='rb_item'><p class='white'>" . $row['name'] ."</p></div>";
	}		
	?>
</body>
</html>