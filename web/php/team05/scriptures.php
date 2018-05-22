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
         $dbUrl = "postgres://hmufjxaoraveoi:8004b598443a41c86155a553beab2246b64842706de2c90402b37824e1889767@ec2-23-23-130-158.compute-1.amazonaws.com:5432/d7llnf8glafh95";
      }
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
      try
      {

         $db = new PDO("pgsql:host=$mHost;port=$mPort;dbname=$dbName", $mUser, $mPass);
         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         foreach ($db->query('SELECT book, chapter, verse, content FROM scripture') as $row) {
            echo "<p><strong>" . $row['book'] . " " . $row['chapter'] . ":" . $row['verse'] . "<strong> - \"" . $row['content'] . "\"</p><br>";
         }
      }
      catch(PDOException $ex) {
         echo "<p>Error: " . $ex->getMessage() . "</p><br>";
         die();
      }

      
      
   ?>
</body>
</html>