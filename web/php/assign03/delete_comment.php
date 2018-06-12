<?php  
	if (isset($_POST)) {
		$id = $_POST['comment'];
		echo "This is the comment id: $id";		
	}
	else {
		echo "Post not set.";
	}
?>