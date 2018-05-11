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
  <title>Checkout</title>   
</head>
<body>
	<?php require('navbar-checkout.php'); ?>

	<div class="container-fluid" style="margin-top:80px">
		<p id="info">Please enter the following information:</p>	
		<form action="" id="checkoutForm" method="post" onsubmit="return validate()">
			<p class="instruction">First and last name:</p>
			<input class="right" type="text" id="username1" name="username" onblur="checkName()">
			<p id="invalName" class="invalid">First and last must be letters only.</p>			
			<p class="instruction">Address:</p>
			<input class="right" type="text" id="address1" name="address" onblur="checkAddress()">
			<p id="invalAddress" class="invalid">Address must be at least 3 characters long.</p>			
			<p class="instruction">City:</p>
			<input class="right" type="text" id="city1" name="city" onblur="checkCity()">
			<p id="invalCity" class="invalid">City must be letters only.</p>						
			<p class="instruction">State:</p>
			<input class="right" type="text" id="state1" name="state" onblur="checkState()">
			<p id="invalState" class="invalid">State must be letters only</p>
			<p class="instruction">Zip:</p>
			<input class="right" type="text" id="zip1" name="zip" onblur="checkZip()">
			<p id="invalZip" class="invalid">Zip code must be at least 5 numbers.</p>
			<div class="center1">
				<button class="checkoutButton">Confirm</button>
			</div>
		</form>
		<?php		
			if(isset($_SESSION["totalPrice"])) {
				$totalPrice = $_SESSION["totalPrice"];
				// echo "<p class='totalPrice'>Total Price: <b>$$totalPrice</b></p>";
			}
			else {
				echo "<p>Session variable not set</p>";
			}
		?>
	</div>
</body>
</html>