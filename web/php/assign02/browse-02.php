<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../css/a2.css"> 
</head>
<body>
	<!-- <p>This will be a future assignment. Thanks for stopping by.</p> -->
	<?php require('navbar-02.php');
		class Hat {
			public $name;
			public $price;
			public $description;
			public $photo;
		}

		$hats = Array();

		$file = fopen("hatsInfo.txt", "r");
		$count = 1;
		if ($file) {
			// echo "Start<br><br><br>";
			while (($line = fgets($file)) !== false) {
				$hat = new Hat();
				$hat->name = $line;

				if (($line = fgets($file)) !== false) {
					$hat->description = $line;
				}

				if (($line = fgets($file)) !== false) {
					$hat->price = $line;
				}

				array_push($hats, $hat);

				++$count;
			}
			fclose($file);
		}
		else {
			echo "Error while reading from hatsInfo.txt";
		} 
	 ?>

	<div class="container-fluid" style="margin-top:80px">
	<p class=""></p>
	  <h3>Select Your Hat of Choise!</h3>
	  <!-- <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
	  <h1>Scroll this page to see the effect</h1> -->
	  <div class="totalItems">
		  <?php 
		  	foreach ($hats as $hat) {
		  		echo "<div class=\"shared\"><button class=\"addCart\">Add to Cart</button><p class=\"itemHat\">Name: $hat->name<br> Description: $hat->description<br> Price: $$hat->price</p></div>";
		  	}
		   ?>
	   </div>
	</div>
</body>
</html>