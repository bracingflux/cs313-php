<?php
  require("db_info.php");
  foreach ($_POST as $key => $value) {
     echo "key: $key value: $value<br>";
   }

   $book = $_POST['book'];
   $chapter = $_POST['chapter'];
   $verse = $_POST['verse'];
   $content = $_POST['content'];
   $topics = $_POST['topic'];

   $stmt = $db->prepare('INSERT INTO scripture (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)');
    $stmt->bindValue(':book', $book, PDO::PARAM_STR);
    $stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
    $stmt->bindValue(':verse', $verse, PDO::PARAM_INT);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->execute();
         // $stmt->execute(array(':book' => $book));
         $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

         foreach ($rows as $row) {
            echo "<p>";
          }

    $script_id = $db->query("SELECT id FROM scripture");
    $script = $script_id->fetch();
    $script = $script['id'];

    foreach ($topics as $topic) {      
       $stmt = $db->prepare('INSERT INTO topic_Script (topic_id, script_id) VALUES (:topic, :script)');
      $stmt->bindValue(':topic', $topic, PDO::PARAM_INT);
      $stmt->bindValue(':script', $script, PDO::PARAM_INT);
      $stmt->execute();
      }

      foreach ($db->query('SELECT book, chapter, verse, content, id FROM scripture') as $row) {
            $id = $row['id'];
            echo "<p><strong>" . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . "</strong> - \"" . $row['content'] . "\"</p><h2>Topic</h2>";
            foreach ($db->query("SELECT name FROM topic INNER JOIN topic_Script WHERE script_id = $id") as $row) {
              echo "<p>". $row['name'] . "</p>";
            }
         }
      } 
 ?>