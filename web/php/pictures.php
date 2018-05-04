<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link href="https://fonts.googleapis.com/css?family=Galindo" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="../css/a1.css">
	<?php $file = "pictures"; ?>
	<script type="text/javascript" src="../javascript/a1.js" ></script>
	<title>Pictures</title>
</head>

<body>
	<?php require('navbar.php');  ?>
	
	<div class="container">
  <p class="adventure">Favorite Outdoor Adventures</p>
  <div class="slideshow">
	  <div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	      <li data-target="#myCarousel" data-slide-to="3"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner">

	      <div class="item active">
	        <img src="../photos/union_falls.jpg" alt="Union Falls">
	        <div class="carousel-caption">
	          <h3>Union Falls</h3>
	          <p>One of my favorite hikes in Yellowstone!</p>
	        </div>
	      </div>

	      <div class="item">
	        <img src="../photos/goldbug.jpg" alt="Goldbug hot springs">
	        <div class="carousel-caption">
	          <h3>Goldbug Hot Springs</h3>
	          <p>Arguably on of the best hot springs in Idaho!</p>
	        </div>
	      </div>
	    
	      <div class="item">
	        <img src="../photos/palicades.jpg" alt="Palicades">
	        <div class="carousel-caption">
	          <h3>The Palicades</h3>
	          <p>A great place to hike, camp, and explore.</p>
	        </div>
	      </div>

	      <div class="item">
	        <img src="../photos/cress_creek.jpg" alt="Cress Creek">
	        <div class="carousel-caption">
	          <h3>Cress Creek</h3>
	          <p>Very close to Rexburg and beautiful during fall.</p>
	        </div>
	      </div>
	  
	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right"></span>
	      <span class="sr-only">Next</span>
	    </a>
	  </div>
	</div>
</div>
	
</body>
</html>