<?php
$courseId = htmlspecialchars($_POST["course_id"]);
$date = htmlspecialchars($_POST["date"]);
$content = htmlspecialchars($_POST["content"]);
// echo "Course: $courseId\n";
// echo "date: $date\n";
// echo "content: $content\n";
require("db_connect.php");
// $db = get_db();
$query = "INSERT INTO note (course_id, content, date) VALUES (:courseId, :content, :date)";
$statement = $db->prepare($query);
$statement->bindValue(":courseId", $courseId, PDO::PARAM_INT);
$statement->bindValue(":content", $content, PDO::PARAM_STR);
$statement->bindValue(":date", $date, PDO::PARAM_STR);
$statement->execute();
header("Location: courseDetails.php?course_id=$courseId");
die();
?>