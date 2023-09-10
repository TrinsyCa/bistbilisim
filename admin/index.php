<?php
   session_start();
   if(!isset($_SESSION["giris"]))
   {
      if(isset($_SESSION["student"]))
      {
         header("Refresh: 0; url=../students/admin/".$_SESSION["username"]);
      }
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
         <h1>Hoşgeldin <?php echo $_SESSION["isim"]; ?></h1>
      </div>
   </div>
</div>
<script>
   var mainpage = document.getElementById("mainpage");

   mainpage.classList.add("active-menu");
</script>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
</body>
</html>