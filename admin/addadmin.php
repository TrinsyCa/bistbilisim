<?php
   session_start();
   if(!isset($_SESSION["giris"]))
   {
      header("HTTP/1.0 404 Not Found");
      include($_SERVER['DOCUMENT_ROOT'] . "/404.html");
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
         <a href="admins.php"><i class="fa-solid fa-shield"></i>&nbsp; Yöneticiler</a>
      </div>
      <div class="row">
      <div class="col-lg-12">
            <?php
            if(@$_SESSION["role"] === "Moderatör")
            {
               echo 'Buraya Giriş Yetkiniz Bulunmamakta..';
            }
            else if(@$_SESSION["role"] === "Yönetici" || @$_SESSION["role"] === "rooter")
            {
               include("connection.php");
            include("linkfunc.php");
               if(@$_POST)
               {
                  @$isim = htmlspecialchars(@$_POST["isim"]);
                  @$adsoyad = htmlspecialchars(@$_POST["adsoyad"]);
                  @$sifre = htmlspecialchars(@$_POST["sifre"]);
                  @$rol = htmlspecialchars(@$_POST["role"]);

                  if(empty(@$isim) || empty(@$adsoyad) || empty(@$sifre))
                  {
                     echo '<p class="alert alert-warning">Lütfen Boş Bırakmayınız..</p>';
                     header("Refresh:1; url=adduser.php");
                  }
                  else
                  {
                     $veriekle = $db->prepare("INSERT INTO admin SET isim = ? , adsoyad = ? , sifre = ? , role = ?");
                     $veriekle -> execute([
                        @$isim,
                        @$adsoyad,
                        @$sifre,
                        @$rol
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
                <input type="text" value="Moderatör" name="role" id="role" class="form-control" style="user-select:none; display:none; pointer-events:none; ">
               <div style="display:flex; justify-content: space-between; align-items:center; position:relative;">
                <div class="btn-group dropend role">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="roleemote" data-bs-toggle="dropdown" aria-expanded="false">
                           <i class="fa-solid fa-pen"></i>&nbsp; Moderatör
                        </button>
                        
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <?php
                              @$role = htmlspecialchars(@$_SESSION["role"]);
                              if(@$role)
                              {
                                 @$myrole = htmlspecialchars(@$role);
                                 if(@$myrole == htmlspecialchars(@$_SESSION["role"]))
                                 {
                                    if(@$myrole == "Yönetici")
                                    {
                                       echo '
                                       <li><a onclick="moderator();" class="dropdown-item"><i class="fa-solid fa-pen"></i>&nbsp; Moderatör</a></li>
                                       <li><a onclick="administor();" class="dropdown-item"><i class="fa-solid fa-lock"></i>&nbsp; Yönetici</a></li>
                                       ';
                                    }
                                    if(@$myrole == "rooter")
                                    {
                                       echo '
                                       <li><a onclick="moderator();" class="dropdown-item"><i class="fa-solid fa-pen"></i>&nbsp; Moderatör</a></li>
                                       <li><a onclick="administor();" class="dropdown-item"><i class="fa-solid fa-lock"></i>&nbsp; Yönetici</a></li>
                                       <li><a onclick="rooter();" class="dropdown-item"><i class="fa-solid fa-shield"></i>&nbsp; Rooter</a></li>
                                       ';
                                    }
                                 }
                              }
                            ?>
                        </ul>
                    </div>
                    <script>
                        ke = document.getElementById("roleemote");
                        k = document.getElementById("role");

                        function moderator() { ke.innerHTML = '<i class="fa-solid fa-pen"></i>&nbsp; Moderatör'; k.value = "Moderatör"; }
                        function administor() { ke.innerHTML = '<i class="fa-solid fa-lock"></i>&nbsp; Yönetici'; k.value = "Yönetici"; }
                        function rooter() { ke.innerHTML = '<i class="fa-solid fa-shield"></i>&nbsp; Rooter'; k.value = "rooter"; }
                    
                    </script>
                     <div style="display:flex; justify-content: space-between; align-items:center; position:relative;">
                     <span></span>
                     <input type="submit" value="Ekle" class="btn btn-outline-primary">
                  </div>
               </div>
            </form>
            <?php } ?>
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