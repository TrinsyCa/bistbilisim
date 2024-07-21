<?php
   $host = "localhost";
   $dbname = "bistbilisim";
   $charset = "utf8";
   $port = "3307";
   $root = "root";
   $password = "";

   try {
      $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=$charset;", $root , $password);
   } catch (PDOExeption $error) {
      echo $error->getMessage();
   }
?>