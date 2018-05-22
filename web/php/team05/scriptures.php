<!DOCTYPE html>
<html lang="en-US">
<head>
   <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Scripture Resources</title> 
</head>
<body>
   <h1>Scripture Resources</h1>
   <?php 
      $dbUrl = getenv('DATABASE_URL');    
      if (empty($dbUrl)) {
         echo "it's empty";
         $dbUrl = "postgres://hmufjxaoraveoi:8004b598443a41c86155a553beab2246b64842706de2c90402b37824e1889767@ec2-23-23-130-158.compute-1.amazonaws.com:5432/d7llnf8glafh95";
      }
      echo "dbUrl: $dbUrl";
      $dbopts = parse_url($dbUrl);

      $mHost = "ec2-23-23-130-158.compute-1.amazonaws.com";
      $mPort = "5432";
      $mUser = "hmufjxaoraveoi";
      $mPass = "8004b598443a41c86155a553beab2246b64842706de2c90402b37824e1889767";

      $dbHost = $dbopts["ec2-23-23-130-158.compute-1.amazonaws.com"];
      $dbPort = $dbopts["5432"];
      $dbUser = $dbopts["hmufjxaoraveoi"];
      $dbPassword = $dbopts["8004b598443a41c86155a553beab2246b64842706de2c90402b37824e1889767"];
      $dbName = ltrim($dbopts["path"],'/');
      echo "<p>Working..</p>";
      print "<p>pgsql:host=$mHost;port=$mPort;dbname=$dbName User: $mUser Pass: $mPass</p>\n\n";
      try
      {
         // $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

         $db = new PDO("pgsql:host=$mHost;port=$mPort;dbname=$dbName", $mUser, $mPass);
         // echo "<p>db set</p>";
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         foreach ($db->query('SELECT book, chapter, verse, content FROM scripture') as $row) {
            echo "<p>" . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . " - \"" . $row['content'] . "\"</p><br>";
         }
         echo "<p>Items should have printed</p>";
      }
      catch(PDOException $ex) {
         echo "<p>Error: " . $ex->getMessage() . "</p><br>";
         die();
      }

      
      
   ?>
</body>
</html>