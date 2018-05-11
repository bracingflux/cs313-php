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
  <title>View Cart</title>   
</head>
<body>
	<?php require('navbar-02.php');
		require('hatsFile.php');		
	 ?>

	<div class="container-fluid" style="margin-top:80px">
	  <h3>Your Cart</h3>	  
	  <div class="totalItems" id="checkoutItems">
		  <?php
		  if (isset($_SESSION['hats'])) {
			$hatsCart = $_SESSION['hats'];
			$hatsConfirm;
			$numItems = count($hatsCart);
			$totalPrice = 0.0;						
			if ($numItems > 0) {
				foreach ($hats as $hat) {
					$counts = array_count_values($hatsCart);		  		
					$name2 = trim(preg_replace('/\s\s+/', ' ', $hat->name));					
					if (in_array($name2, $hatsCart)) {
						$totalPurchased = $counts[$name2];
						$hatsConfirm["$name2"] = $totalPurchased;
						echo "<div class='shared'><div class='quantity'><button onclick=\"removeFromCart('$name2')\" class=\"removeCart\">Remove</button><br><span id='quan'>Quantity: $totalPurchased</span></div>
						<p class='itemHat'>Name: $hat->name<br> Description: $hat->description<br> Price: $$hat->price</p></div>";
						$totalPrice = $totalPrice + ((float)$hat->price * $totalPurchased);
					}						  		
				}
				echo "<p id='priceNum'>Total Price: <b>$$totalPrice</b><br></p><div class=\"center\"><a href=\"checkout-02.php\"><button class=\"checkoutButton\">Continue to Checkout</button></a></div>";				
				$_SESSION["totalPrice"] = $totalPrice;
				$_SESSION["hatsConfirm"] = $hatsConfirm;
			}
			else {
				echo "<p id='emptyCart'><em>Cart is empty</em></p>";
			} 
					  	
		  }
		  else {
			echo "<p id='emptyCart'><em>Cart is empty</em></p>";
		  }		  
		  
		   ?>
	   </div>
	</div>
</body>
</html>