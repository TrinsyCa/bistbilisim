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
      header("HTTP/1.0 404 Not Found");
   include($_SERVER['DOCUMENT_ROOT'] . "/bistbilisim.com/404.html");
   return;
   }
}
?>