<?php
  require("db_connect.php");

  foreach ($_GET as $var) {
    $courseId = htmlspecialchars($var);
    echo "$var<br>";
  }

  if (isset($db)) {
    $query = 'SELECT name, "number" FROM course WHERE id=:id';
    $stmt = $db->prepare($query);
    $stmt->execute(array(':id' => $courseId));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);    
  }
  else {
    echo "Database variable not set<br>";
  }
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
   <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo "$row['name']";  ?></title> 
</head>
<body>

</body>
</html>