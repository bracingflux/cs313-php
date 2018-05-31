<?php
  require("db_connect.php");   
  $courseId = htmlspecialchars($_POST["courseId"]);
  $date = htmlspecialchars($_POST["date"]);
  $content = htmlspecialchars($_POST["content"]);

  echo "$courseId $date $content<br>";

  /*$query = "INSERT INTO note (course_id, content, date) VALUES (:courseId, :content, :date)";
  $stmt = $db->prepare($query);
  $stmt = bindValue(":courseId", $courseId, PDO:PARAM_INT);
  $stmt = bindValue(":content", $content, PDO:PARAM_STR);
  $stmt = bindValue(":date", $date, PDO:PARAM_STR);
  $stmt->execute();*/

  // echo "Note has been sent<br>";  
?>