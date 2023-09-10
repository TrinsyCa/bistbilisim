<?php
   include("../connection.php");

   if (isset($_POST["sutunId"]) && isset($_POST["sutunName"]))
   {
      $sutunId = $_POST["sutunId"];
   
      $sil = $db->prepare("DELETE FROM gallery WHERE id = ?");
      $sil->execute([$sutunId]);
   
      if ($sil) {
         echo "Sütun başarıyla silindi";
      } else {
         echo "Sütun silinirken bir hata oluştu";
      }


      $sutunName = "../../img/pictures/".$_POST["sutunName"];
      if(!file_exists($sutunName))
      {
         die("Dosya Bulunmuyor");
      }
      $imgsil = unlink($sutunName);
      if($imgsil)
      {
         echo "Dosya silindi";
      }
      else
      {
         echo "Dosya ile ilgili bir hata oluştu";
      }
   }
   else
   {
      header("Refresh:0; url=../");
   }
?>