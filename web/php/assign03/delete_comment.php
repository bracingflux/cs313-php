<?php 
	session_start();
	require('load_db.php');

	if (isset($_POST)) {
		$id = $_POST['comment'];
		try {
			$query = 'DELETE FROM comments WHERE id=:id';
			$statement = $db->prepare($query);
			$statement->bindValue(":id", $id);
			$statement->execute();
			echo "p$id";				
		}
		catch(Exception $ex) {
			echo "Failure";
		} 
			
	}
	else {
		echo "Post not set.";
	}
?>