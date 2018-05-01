<!DOCTYPE html>
<html lang="en-US">
<head>
<style>
	div {
		border: 1px solid black;
		height: 200px;
		width: 300px;
	}
</style>
</head>
<body>
	<?php

  for ($x = 1; $x <= 10; $x++) {
  	echo "<div id=\"$x\"<p>$x</p></div>";
  }

?>
</body>
</html>