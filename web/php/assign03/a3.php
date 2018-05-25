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

	<div class="rbItem">
		<div class="rbPhoto">
			<img src="../../photos/rbs/Abita Root Beer" alt="Abita Root Beer">
		</div>
		<div class="rbName">
			<p>Abita Root Beer</p>
		</div>
	</div>

	<?php
	require('load_db.php');

	foreach ($db->query('SELECT name FROM root_beers') as $row) {
		echo "<div class='row'><div class='rb_photo'><img src=\"../../photos/rbs/" . $row['name'] . ".png\" class='center' alt='" . $row['name'] . "'></div>";
		echo "<div class='rb_item'><p class='white'>" . $row['name'] ."</p></div></div>";		
	}		
	?>
</body>
</html>