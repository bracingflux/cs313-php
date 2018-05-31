<?php 
  $courseId = htmlspecialchars($_POST["courseId"]);
  $date = htmlspecialchars($_POST["date"]);
  $content = htmlspecialchars($_POST["content"]);

  echo "$courseId $date $content<br>";
?>