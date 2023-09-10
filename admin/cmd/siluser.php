<?php
   include("../connection.php");

   if (isset($_POST["sutunId"])) {
      $sutunId = $_POST["sutunId"];
   
      $sil = $db->prepare("DELETE FROM admin WHERE id = ?");
      $sil->execute([$sutunId]);
   
      if ($sil) {
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