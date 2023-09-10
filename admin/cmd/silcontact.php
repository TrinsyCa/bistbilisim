<?php
   include("../connection.php");

   if (isset($_POST["sutunId"])) {
      $sutunId = $_POST["sutunId"];
   
      // Sütunu veritabanından silme işlemini gerçekleştir
      $sil = $db->prepare("DELETE FROM contact WHERE id = ?");
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