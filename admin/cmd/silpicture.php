<?php
   include("../connection.php");

   session_start();
if(!isset($_SESSION["giris"]))
{
   header("HTTP/1.0 404 Not Found");
   include($_SERVER['DOCUMENT_ROOT'] . "/bistbilisim.com/404.html");
   return;
}
else
{
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
      header("HTTP/1.0 404 Not Found");
   include($_SERVER['DOCUMENT_ROOT'] . "/bistbilisim.com/404.html");
   return;
   }
}
?>