<?php
  require("db_connect.php");

  foreach ($_GET as $var) {
    echo "$var<br>";
  }
?>