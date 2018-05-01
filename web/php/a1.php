<!DOCTYPE html>
<html lang="en-US">
<head>
<style>
	div {
		border: 3px solid black;
		height: 20px;
	}
</style>
</head>
<body>
	<?php

  for ($x = 1; $x <= 10; $x++) {
  	echo "<div id=\"$x\"</div>";
  }

?>
</body>
</html>