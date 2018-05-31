<?php
  require("db_connect.php");

  foreach ($_GET as $var) {
    $courseId = htmlspecialchars($var);
    // echo "$var<br>";
  }

  $name = "";

  if (isset($db)) {
    $query = 'SELECT name, "number" FROM course WHERE id=:id';
    $stmt = $db->prepare($query);
    // OR $stmt->bindValue(":id", $courseId, PDO:PARAM_INT);
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
  <?php 
    echo "<h1>Showing notes for " . $name . "</h1>";
   ?>
   <form action="insertNote.php" method="POST">
     <input type="date" name="date"><br>     
     <textarea name="content" placeholder="Enter note here"></textarea>
     <input type="hidden" value="<?php echo $courseId; ?>" name="courseId">
   </form>
</body>
</html>