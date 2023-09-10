<?php 
   ob_start();
   session_start();
   include("connection.php");
   if(isset($_SESSION["giris"]))
   {
      header("Refresh: 0; url=./");
      return;
   }
   if(isset($_SESSION["student"]))
   {
      header("Refresh: 0; url=../students/admin/".$_SESSION["username"]);
      return;
   }
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Girişi</title>

    <link rel="shortcut icon" href="../img/logo/BIST_Icon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

   <link rel="stylesheet" href="login.css">
</head>
<body>
<section>

<!--#region Boxs-->
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<!-- #endregion -->

<div class="signin">
   <div class="content">
      <h2><a href="../">Bist Bilişim</a></h2>
      <form class="form" method="post">
         <div class="inputBx">
            <input type="text" name="kullanici" id="subject" required>
            <i>Kullanıcı Adı</i>
         </div>
         <div class="inputBx">
            <input type="password" id="subject" name="sifre" required>
            <i>Şifre</i>
         </div>
         <div class="inputBx">
            <div class="submitselection"></div>
            <input type="submit" value="GÖNDER">
         </div>
         <?php
               if(@$_POST)
               {
                  @$kadi=trim(htmlspecialchars(@$_POST["kullanici"]));
                  @$sifre=(htmlspecialchars(@$_POST["sifre"]));
                  if(!@$kadi || !@$sifre)
                  {
                     echo "<p class='alert alert-danger' style='text-align:center; padding:7px; width:335px; margin:auto;'>Kullanıcı Adı veya Şifre Boş Bırakılamaz</p>";
                     header("Refresh:1; url=login.php");
                  }
                  else
                  {
                     @$uye = $db->prepare("select * from admin where isim=? and sifre=?");
                     @$uye->execute(array(mb_strtolower($kadi),mb_strtolower($sifre)));
                     @$a=$uye->fetch(PDO::FETCH_ASSOC);
                     @$y=$uye->rowCount();

                     if($y)
                     {
                        @$_SESSION["giris"] = "true";
                        @$_SESSION["id"] = @$a["id"];
                        @$_SESSION["isim"] = @$a["isim"];
                        @$_SESSION["adsoyad"] = @$a["adsoyad"];
                        @$_SESSION["sifre"] = @$a["sifre"];
                        @$_SESSION["god_mode"] = @$a["god_mode"];
                        echo "<p class='alert alert-info' style='text-align:center; padding:7px; width:335px; margin:auto;'>Giriş Başarılı</p>";
                        header("Refresh: 1; url=./");
                        exit;
                     }
                        @$uye = $db->prepare("select * from students where username=? and pass=?");
                        @$uye->execute(array(mb_strtolower($kadi),mb_strtolower($sifre)));
                        @$a=$uye->fetch(PDO::FETCH_ASSOC);
                        @$y=$uye->rowCount();

                        if($y)
                        {
                           @$_SESSION["student"] = "true";
                           @$_SESSION["username"] = @$a["username"];
                           echo "<p class='alert alert-info' style='text-align:center; padding:7px; width:335px; margin:auto;'>Giriş Başarılı</p>";
                           header("Refresh: 1; url=../students/admin/".@$_SESSION["username"]);
                           exit;
                        }
                     else
                     {
                        echo "<p class='alert alert-warning' style='text-align:center; padding:7px; width:335px; margin:auto;'>Kullanıcı Adı veya Şifre Hatalı</p>";
                        header("Refresh: 1; url=login.php");
                     }
                  }
               }
            ?>
      </form>
   </div>
</div>
</section>
</body>
</html>