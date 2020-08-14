<?php
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "bengkel1";
  // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection 
   if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
         }  
      $sql=$conn->query("SELECT * FROM menu");
      print_r($sql);

?>