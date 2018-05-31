<?php
  require("db_connect.php");

  foreach ($_GET as $var) {
    $courseId = htmlspecialchars($var);
    echo "$var<br>";
  }

  $name = "";

  if (isset($db)) {
    $query = 'SELECT name, "number" FROM course WHERE id=:id';
    $stmt = $db->prepare($query);
    $stmt->execute(array(':id' => $courseId));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        $name = $row["name"];
    }    
  }
  else {
    echo "Database variable not set<br>";
  }
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
   <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo "$name";  ?></title> 
</head>
<body>

</body>
</html>