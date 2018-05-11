<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../javascript/a2.js" ></script>
  <link rel="stylesheet" type="text/css" href="../../css/a2.css">
  <title>Browse Hats</title> 
</head>
<body>
	<?php require('navbar-02.php');
		require('hatsFile.php');		
	 ?>

	<div class="container-fluid" style="margin-top:80px">
	  <h3>Select Your Hat of Choice!</h3>	  
	  <div class="totalItems">	  
		  <?php 
		  	foreach ($hats as $hat) {
		  		$name2 = trim(preg_replace('/\s\s+/', ' ', $hat->name));
		  		echo "<div class='shared'><button id=\"$name2\" onclick=\"itemToCart('$name2')\" class=\"addCart\">Add to Cart</button><p class=\"itemHat\">Name: $hat->name<br> Description: $hat->description<br> Price: <b>$$hat->price</b></p></div>";
		  	}
		   ?>
	   </div>
	</div>
</body>
</html>