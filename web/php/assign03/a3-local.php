<!DOCTYPE html>
<html lang="en-US">
<head>	
</head>
<body>
	<?php 
		try
		{
		  $user = 'postgres';
		  $password = 'Linus98!';
		  $db = new PDO('pgsql:host=localhost;dbname=rb', $user, $password);

		  // this line makes PDO give us an exception when there are problems,
		  // and can be very helpful in debugging! (But you would likely want
		  // to disable it for production environments.)
		  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $ex)
		{
		  echo 'Error!: ' . $ex->getMessage() . " nope..";
		  die();
		}
		
	?>
</body>
</html>