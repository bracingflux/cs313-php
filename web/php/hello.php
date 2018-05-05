<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link href="https://fonts.googleapis.com/css?family=Galindo" rel="stylesheet">
  	<link rel="stylesheet" type="text/css" href="../css/a1.css">
	<?php $file = "home"; ?>
	<script type="text/javascript" src="../javascript/a1.js" ></script>
	<title>Eli Andrew Home Page</title>
</head>

<body>
	<?php require('navbar.php');  ?>
	<div id="allPhotos">
		<div class="personalPhoto">
			<img id="the-gal" src="../photos/the-gal.JPG" alt="the gal">
			<div class="border">
				<p>That's my gal!</p>
			</div>
		</div>
		<div class="photoItems">
			<img src="../photos/byui.svg" alt="byui" class="photos1">
			<img src="../photos/greaterThan.png" alt="greater than sign" class="photos1">
			<img src="../photos/byu.svg" alt="byu" class="photos1">
		</div>
		<div class="packers">
			<a href="http://www.packers.com/"> <img class="packPhoto" src="../photos/packers.jpg" align="Green Bay Packers"></a>
			<div class="border">
				<p>My favorite team (and also the best)</p>
			</div>
		</div>
	</div>
</body>
</html>