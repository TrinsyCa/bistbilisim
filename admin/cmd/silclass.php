<?php
   include("../connection.php");

   if (isset($_POST["sutunId"])) {
      $sutunId = $_POST["sutunId"];
      $name = $_POST["name"];

      $silStudents = $db->prepare("DELETE FROM students WHERE class = ?");
      $silStudents->execute([$name]);
   
      $sil = $db->prepare("DELETE FROM classes WHERE id = ?");
      $sil->execute([$sutunId]);
   
      if ($sil && $silStudents)
      {
         echo "Sütun başarıyla silindi";
      } else {
         echo "Sütun silinirken bir hata oluştu";
      }
   }
   else
   {
      header("Refresh:0; url=../");
   }
?>