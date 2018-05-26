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

	<!-- <div class="rbItem">
			<img id="rbPhoto" src="../../photos/rbs/Abita Root Beer.png" alt="Abita Root Beer">
			<p id="rbName">Abita Root Beer</p>
	</div> -->
	
	<form id="rbForm">
		<button type="submit" id="create-user">Create new user</button>
		<input type="text" class="hidden1" name="rb" value='<?php echo "Abita Root Beer"; ?>'>
	</form>

	<div id="dialog-form" title="Create new user">
	  <p class="validateTips">All form fields are required.</p>
	  <form>
	    <fieldset>
	      <label for="name">Name</label>
	      <input type="text" name="name" id="name" value="Jane Smith" class="text ui-widget-content ui-corner-all">
	      <label for="email">Email</label>
	      <input type="text" name="email" id="email" value="jane@smith.com" class="text ui-widget-content ui-corner-all">
	      <label for="password">Password</label>
	      <input type="password" name="password" id="password" value="xxxxxxx" class="text ui-widget-content ui-corner-all">
	 
	      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
	    </fieldset>
	  </form>
	  <?php 
	  	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  		$count = count($_POST);
	  		print_r($_POST . " count: $count");
	  		foreach ($_POST as $key => $value) {
	  			echo "<h1>Key: $key Value: $value<h1>";
	  		}
	  	}
	  	else {
	  		echo "Not set";
	  	}
	  	/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  		foreach ($_POST as $key => $value) {
	  			echo "<h1>Key: $key Value: $value<h1>";
	  		}
	  		$root_beer = $_POST["rb"];
	  		echo "<h1>$root_beer</h1>";
	  	}*/
	   ?>
	</div>

	<?php
	require('load_db.php');

	foreach ($db->query('SELECT name FROM root_beers') as $row) {
		echo "<div class='rbItem'><img src=\"../../photos/rbs/" . $row['name'] . ".png\" id='rbPhoto' alt='" . $row['name'] . "'>";
		echo "<p id='rbName'>" . $row['name'] ."</p></div>";		
	}		
	?>
</body>
</html>