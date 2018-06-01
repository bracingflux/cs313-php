<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>	
	<script type="text/javascript" src="../../javascript/a3.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/a3.css">
	<title>Root Beer Revelry</title>	
</head>
<body>

	<a href="https://www.facebook.com/Root-Beer-Revelry-181821778540286/" target="_blank" class="fa fa-facebook" id="shadow"></a>
	<a href="https://twitter.com/rootbeerrevelry?lang=en" class="fa fa-twitter" target="_blank" id="shadow"></a>	
	<div id="banner">
		<img src="../../photos/revelry.jpg" class="center" alt="Root Beer Revelry banner">
		<button class="log-click" onclick="document.getElementById('id01').style.display='block'">Login</button>						
		<p class="def">rev·el·ry \'re-vəl-rē\ • n. pl. rev·el·ries • Boisterous merrymaking.</p>

	</div>

	<div id="dialog-form" title="Soda Info">
		<div class="loader"></div>
		<p id="loaded_rb"></p>	    
	</div>



	<div id="id01" class="modal">
	  <form class="modal-content animate" action="/action_page.php">
	    <div class="imgcontainer">
	      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
	    </div>

	    <div class="container">
	      <label for="uname"><b>Username</b></label>
	      <input type="text" placeholder="Enter Username" name="uname" required>
	      <label for="psw"><b>Password</b></label>
	      <input type="password" placeholder="Enter Password" name="psw" required>	        
	      <button type="submit" class="login">Login</button>	      
	    </div>

	    <div class="container" id="cont-1">
	      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
	    </div>
	  </form>
	</div>




	<?php
	require('load_db.php');

	foreach ($db->query('SELECT name FROM root_beers') as $row) {
		echo "<div class='rbItem'><img src=\"../../photos/rbs/" . $row['name'] . ".png\" id='rbPhoto' alt='" . $row['name'] . "'>";
		echo "<p id='rbName'>" . $row['name'] ."</p>";
		echo "<form class='rbForm'>";
		echo "<button type='submit' class='view_rb'>More info</button>";
		echo "<input type='hidden' class='hidden1' name='rb' value=\"" . $row['name'] . "\"></form></div>";
	}		
	?>
</body>
</html>