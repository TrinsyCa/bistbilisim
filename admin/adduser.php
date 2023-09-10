<?php
   session_start();
   if(!isset($_SESSION["giris"]))
   {
      header("Refresh: 0; url=login.php");
      return;
   }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli | Bist Bilişim</title>

    <link rel="shortcut icon" href="../img/logo/BIST_Icon.png">

    <style>
        .author_href
        {
            font-size:22px;
            color:#ADB5BD;
            text-decoration:none;
            transition:0.35s;
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
        }
    </style>
</head>
<body>
<?php 
   ob_start();
   @$sayfa = $_GET["sayfa"]; 	
   Switch($sayfa)
   {
      case "logout";	
      include("logout.php");	
      break;
   }
?>
<div class="wrapper">
   <?php include_once 'sidebar.php'; ?>
   <div class="content">
      <div class="title">
         <h1>Yönetici Ekle</h1>
         <a href="admins.php"><i class="fa-solid fa-newspaper"></i>&nbsp; Yöneticiler</a>
      </div>
      <div class="row">
      <div class="col-lg-12">
            <?php
            include("connection.php");
            include("linkfunc.php");
               if(@$_POST)
               {
                  @$isim = htmlspecialchars(@$_POST["isim"]);
                  @$adsoyad = htmlspecialchars(@$_POST["adsoyad"]);
                  @$sifre = htmlspecialchars(@$_POST["sifre"]);

                  if(empty(@$isim) || empty(@$adsoyad) || empty(@$sifre))
                  {
                     echo '<p class="alert alert-warning">Lütfen Boş Bırakmayınız..</p>';
                     header("Refresh:1; url=adduser.php");
                  }
                  else
                  {
                     $veriekle = $db->prepare("INSERT INTO admin SET isim = ? , adsoyad = ? , sifre = ?");
                     $veriekle -> execute([
                        @$isim,
                        @$adsoyad,
                        @$sifre,
                     ]);
                     if($veriekle)
                     {
                        echo '<p class="alert alert-success">Kullanıcı Başarıyla Eklendi</p>';
                        header("Refresh: 2; url=admins.php");
                     }
                     else
                     {
                        echo '<p class="alert alert-danger">Kullanıcı Ekleme İle İlgili Bir Sorun Oluştu</p>';
                        header("Refresh:3; url=adduser.php");
                     }
                  }
               }
            ?>
            <form method="post" style="user-select:none;">
                <strong>Kullanıcı Adı : </strong>
                <input type="text" name="isim" class="form-control">
                <br>
                <strong>Ad Soyad : </strong>
                <input type="text" name="adsoyad" class="form-control">
                <br>
                <strong>Şifre : </strong>
                <input type="text" name="sifre" class="form-control" >
                <br>
                <div style="display:flex; justify-content: space-between; align-items:center; position:relative;">
                  <span></span>
                  <input type="submit" value="Ekle" class="btn btn-outline-primary">
                </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script>
   var admin = document.getElementById("admins");

    admin.classList.add("active-menu");
</script>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
</body>
</html>