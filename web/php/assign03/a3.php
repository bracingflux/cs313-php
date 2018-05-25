<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<link rel="stylesheet" type="text/css" href="../../css/a3.css">
	<title>Root Beer Revelry</title>	
</head>
<body>
	<a href="https://www.facebook.com/Root-Beer-Revelry-181821778540286/" target="_blank" class="fa fa-facebook" id="shadow"></a>
	<a href="https://twitter.com/rootbeerrevelry?lang=en" class="fa fa-twitter" target="_blank" id="shadow"></a>
	<div id="banner">
		<img src="../../photos/revelry.jpg" class="center" alt="Root Beer Revelry banner">
		<p class="def">
			rev·el·ry \'re-vəl-rē\ • n. pl. rev·el·ries • Boisterous merrymaking.
		</p>
	</div>

	<!-- <div class="rbItem">
			<img id="rbPhoto" src="../../photos/rbs/Abita Root Beer.png" alt="Abita Root Beer">
			<p id="rbName">Abita Root Beer</p>
	</div> -->

	<?php
	require('load_db.php');

	foreach ($db->query('SELECT name FROM root_beers') as $row) {
		echo "<div class='rbItem'><img src=\"../../photos/rbs/" . $row['name'] . ".png\" id='rbPhoto' alt='" . $row['name'] . "'>";
		echo "<p id='rbName'>" . $row['name'] ."</p></div>";		
	}		
	?>
</body>
</html>

<!-- foreach ($db->query('SELECT name FROM root_beers') as $row) {
		echo "<div class='row'><div class='rb_photo'><img src=\"../../photos/rbs/" . $row['name'] . ".png\" class='center' alt='" . $row['name'] . "'></div>";
		echo "<div class='rb_item'><p class='white'>" . $row['name'] ."</p></div></div>";		
	} -->