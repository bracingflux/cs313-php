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
		<h3>Thank you for your purchase!</h3>
		<?php
			$address = "";
			$count = 0;
			$name = "";
			$totalPrice = 0.0;
			foreach ($_POST as $key => $value) {
				if ($count == 0) {
					$name = htmlspecialchars($value);
				}
				else if ($count == 2) {
					$address = $address . htmlspecialchars($value) . ", ";
				}
				else {
					$address = $address . htmlspecialchars($value) . " ";
				}
				++$count;
			 }
			 if(isset($_SESSION["totalPrice"])) {
				$totalPrice = $_SESSION["totalPrice"];
			}
			 echo "<p class='info'>$name<br>$address<br></p>"; 

			 $hatsConfirm = $_SESSION["hatsConfirm"];
			 echo "<p class='info'>";
			 foreach ($hatsConfirm as $key => $value) {
			 	echo "$key ($value)<br>";
			 }
			 echo "Total price: $$totalPrice</p>";
			 $_SESSION = array();			 
		 ?>
	</div>
</body>
</html>