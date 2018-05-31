<?php 
	require("db_connect.php");

  if (isset($db)) {
    $query = 'SELECT id, name, "number" FROM course';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);    
  }
  else {
    echo "Database variable not set<br>";
  }
  
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
   <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
   <title></title> 
</head>
<body>
  <h1>Courses</h1>

  <ul>
    <?php 
        foreach ($rows as $row) {
          $id = $row["id"];
          $name = $row["name"];
          $number = $row["number"];  
          echo"<a href='courseDetails.php?course_id=$id'><li>$number - $name</li></a>";
        }
     ?>
  </ul>

</body>
</html>