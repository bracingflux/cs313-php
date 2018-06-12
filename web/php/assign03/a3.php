<?php  
	session_start();	
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    


	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<!-- <script type="text/javascript" src="../../javascript/a3.js"></script> -->
	<link rel="stylesheet" type="text/css" href="../../css/a3.css">
	<title>Root Beer Revelry</title>	
</head>
<body>
<!-- <span style="float: right; /*width: 9%; */background: orange; margin: 0; padding: 0;">
	<a href="https://www.facebook.com/Root-Beer-Revelry-181821778540286/" target="_blank" class="fa fa-facebook" id="shadow"></a>
	<a href="https://twitter.com/rootbeerrevelry?lang=en" class="fa fa-twitter" target="_blank" id="shadow"></a>
</span> -->

	<div id="banner">	
		<img src="../../photos/revelry.jpg" class="center" alt="Root Beer Revelry banner">

		<p id="current_user">
		<?php
			require('load_db.php');
			require('resources.php');

			if (isset($_SESSION["userId"])) {
				$stmt = $db->prepare('SELECT display_name FROM users WHERE id=:id');
				$stmt->execute(array(':id' => $_SESSION["userId"]));
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);				
				foreach ($rows as $row) {
					echo $row['display_name'];
				}
			}			  
		?>			
		</p>	
		<button class="log-click" onclick="document.getElementById('id01').style.display='block'">Login</button>						
		<p class="def">rev·el·ry \'re-vəl-rē\ • n. pl. rev·el·ries • Boisterous merrymaking.</p>
		<span style="/*float: right; *//*width: 13%;*/ background: orange; display: inline; float: left; /*margin: 0 .5% 0 30%; */"> <!-- padding: 0 0 30px 0; -->
			<a href="https://www.facebook.com/Root-Beer-Revelry-181821778540286/" target="_blank" class="fa fa-facebook" id="shadow"></a>
			<a href="https://twitter.com/rootbeerrevelry?lang=en" class="fa fa-twitter" target="_blank" id="shadow"></a>
		</span>


	</div>

	<div id="dialog-form" title="Soda Info">
		<div class="loader"></div>
		<div id="loaded_rb"></div>	    
	</div>


	<!-- sign-in window -->
	<div id="id01" class="modal">
	  <form class="modal-content animate" id="login_form">
	    <div class="imgcontainer">
	      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
	    </div>

	    <div class="container">
	      <label for="uname"><b>Username</b></label>
	      <input type="text" class="input1" placeholder="Enter Username" name="uname" required>
	      <label for="psw"><b>Password</b></label>
	      <input type="password" class="input1" placeholder="Enter Password" name="psw" required>	        
	      <button type="submit" class="login">Login</button>	      
	    </div>

	    <div class="container" id="cont-1">
	      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
	      <button type="button" name="signUp" onclick="showSignUp()" id="registerbtn" class='cancelbtn'>Sign Up</button> <!-- document.getElementById('id01').style.display='none' -->	      
	    </div>	    
	  </form>
	</div>

	<!-- sign-up window -->	
	<div id="id02" class="modal">
	  <form class="modal-content animate" id="signup_form">
	    <div class="imgcontainer">
	      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
	    </div>

	    <div class="container">
	      <label for="username"><b>Username</b></label>
	      <input type="text" class="input1" placeholder="Enter Username" name="username" required>
	      <label for="password"><b>Password</b></label>
	      <input type="password" class="input1" placeholder="Enter Password" id="pass1" name="password" required>
	      <label for="verify_password"><b>Verifty Password</b></label>
	      <input type="password" class="input1" placeholder="Verify Password" id="pass2" onblur="verifyPassword()" name="verifty_password" required>
	      <label class="hidden1" id="passVerify"><b>Passwords do not match!</b></label>
	      <label for="dName"><b>Display Name</b></label>
	      <input type="text" class="input1" placeholder="Enter Display Name" name="displayName" required>	        
	      <button type="submit" class="login">Sign Up</button>	      
	    </div>

	    <div class="container" id="cont-1">
	      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
	      <button type="button" name="signUp" onclick="showSignIn()" id="registerbtn" class='cancelbtn'>Sign In</button>	      
	    </div>	    
	  </form>
	</div>



	<!-- <form class='commentSubmit'><textarea name='comment' class='comment_box' placeholder='Enter your comment here'></textarea><button type='submit'>Send Comment</button></form>; -->
	

		<!-- <p><button class="w3-btn w3-red w3-small"><i class="material-icons">delete</i></button></p> -->

	<?php	

	foreach ($db->query('SELECT name FROM root_beers') as $row) {
		echo "<div class='rbItem'><img src=\"../../photos/rbs/" . $row['name'] . ".png\" id='rbPhoto' alt='" . $row['name'] . "'>";
		echo "<p id='rbName'>" . $row['name'] ."</p>";
		echo "<form class='rbForm'>";
		echo "<button type='submit' class='view_rb'>More info</button>";
		echo "<input type='hidden' class='hidden1' name='rb' value=\"" . $row['name'] . "\"></form></div>";
	}		
	?>
</body>
</html>