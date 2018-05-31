<?php 
	require("db_connect.php");

  if (isset($db)) {
    $query = 'SELECT id, name, "number" FROM course';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($rows);
  }
  else {
    echo "Database not set<br>";
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
    <li><p>Course 1</p></li>
    <li><p>Course 2</p></li>
    <li><p>Course 3</p></li>
    <li><p>Course 4</p></li>
  </ul>

</body>
</html>