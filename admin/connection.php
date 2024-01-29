<?php
   $host = "localhost";
   $dbname = "bistbili_db";
   $charset = "utf8";
   $root = "bistbili";
   $password = "9bozwibo";

   try {
      $db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;", $root , $password);
   } catch (PDOExeption $error) {
      echo $error->getMessage();
   }
?>