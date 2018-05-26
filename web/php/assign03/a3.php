<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/a3.css">
	<script type="text/javascript" src="../../javascript/a3.js"></script>
	<title>Root Beer Revelry</title>	
</head>
<body>
	<?php $rb = ""; ?>
	<a href="https://www.facebook.com/Root-Beer-Revelry-181821778540286/" target="_blank" class="fa fa-facebook" id="shadow"></a>
	<a href="https://twitter.com/rootbeerrevelry?lang=en" class="fa fa-twitter" target="_blank" id="shadow"></a>
	<div id="banner">
		<img src="../../photos/revelry.jpg" class="center" alt="Root Beer Revelry banner">
		<p class="def">
			rev·el·ry \'re-vəl-rē\ • n. pl. rev·el·ries • Boisterous merrymaking.
		</p>
	</div>

	<div id="dialog-form" title="Create new user">
	  <p class="validateTips">All form fields are required.</p>
	  <p id="loaded_rb"></p>	    
	</div>

	<?php
	require('load_db.php');

	foreach ($db->query('SELECT name FROM root_beers') as $row) {
		echo "<div class='rbItem'><img src=\"../../photos/rbs/" . $row['name'] . ".png\" id='rbPhoto' alt='" . $row['name'] . "'>";
		echo "<p id='rbName'>" . $row['name'] ."</p>";
		echo "<form class='rbForm'>";
		echo "<button type='submit' class='create-user'>Create new user</button>";
		echo "<input type='text' class='hidden1' name='rb' value='" . $row['name'] . "'></div>";
		echo "</form>";		
	}		
	?>
</body>
</html>