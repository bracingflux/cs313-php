<?php
  require("db_info.php");
  foreach ($_POST as $key => $value) {
     echo "key: $key value: $value<br>";
   }

   $book = $_POST['book'];
   $chapter = $_POST['chapter'];
   $verse = $_POST['verse'];
   $content = $_POST['content'];

   echo "VARIABLES SET: $book $chapter $verse $content <br>";

   $stmt = $db->prepare('INSERT INTO scripture (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)');
    $stmt->bindValue(':book', $book, PDO::PARAM_STR);
    $stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
    $stmt->bindValue(':verse', $verse, PDO::PARAM_INT);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->execute();
         // $stmt->execute(array(':book' => $book));
         $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

         echo "Before<br>";
         foreach ($rows as $row) {
            echo "Row: $row<br>";
          }
          echo "After<br>"; 

   // $stmt = $db->prepare('INSERT INTO scripture (book, chapter, verse, content) VALUES (book, chapter, verse, content) WHERE book=:book AND chapter=:chapter AND verse=:verse AND content=:content');
 ?>