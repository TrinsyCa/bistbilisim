<?php
   session_start();
   if(!isset($_SESSION["giris"]))
   {
      header("HTTP/1.0 404 Not Found");
      include($_SERVER['DOCUMENT_ROOT'] . "/bistbilisim.com/404.html");
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

    <link rel="shortcut icon" href="img/logo/BIST_Icon.png">

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
         <h1>Slide Ekle</h1>
         <div style="display:flex; align-items:center; gap: 10px;">
            <a href="slider.php"><i class="fa-solid fa-images"></i>&nbsp; Slider Yönetimi</a>
            <i onmouseover="help_over();" onmouseout="help_out();" class="fa-solid fa-circle-question question"></i>
            <div id="question-box">
                <p>Resim Formatları</p>
                <p><?php echo htmlspecialchars('PNG , JPEG , WEBP'); ?></p>
                <hr>
                <p>Maksimum Başlık Uzunluğu</p>
                <p><?php echo htmlspecialchars('[100 Karakter]'); ?></p>
                <hr>
                <p>Maksimum Yazı Uzunluğu</p>
                <p><?php echo htmlspecialchars('[100 Karakter]'); ?></p>
            </div>
         </div>
      </div>
      <div class="row">
      <div class="col-lg-12">
            <?php
            include("connection.php");
            include("linkfunc.php");
               if(@$_POST)
               {
                  $klasor = "../img/slider/";
                  $tmp_name = $_FILES["yukle_resim"]["tmp_name"];
                  $name = $_FILES["yukle_resim"]["name"];
                  $size = $_FILES["yukle_resim"]["size"];
                  $type = $_FILES["yukle_resim"]["type"];
                  $link = substr($name , -4 , 4);
                  $random1 = rand(1000000000000000000 , 5000000000000000000);
                  $random2 = rand(1000000000000000000 , 5000000000000000000);
                  $random3 = rand(1000000000000000000 , 5000000000000000000);
                  $random4 = rand(1000000000000000000 , 5000000000000000000);
                  $random5 = rand(1000000000000000000 , 5000000000000000000);
                  $randoms = $random1.$random2.$random3.$random4.$random5;
                  $resim = $randoms.$link;
                  if(strlen($name) == 0)
                  {
                     echo "Lütfen Bir Dosya Seçin";
                     header("Refresh:1; url=addslide.php");
                     exit();
                  }
                  if($type != "image/jpeg" && $type != "image/png" && $type != "image/webp" && $link != ".jpg")
                  {
                     echo "Yalnızca JPEG , PNG , WEBP formatında olabilir !";
                     header("Refresh:2; url=addslide.php");
                     exit();
                  }
                  move_uploaded_file($tmp_name, "$klasor/$resim");

                  @$title = htmlspecialchars(@$_POST["title"]);
                  @$text = htmlspecialchars(@$_POST["text"]);
                  @$button = htmlspecialchars(@$_POST["button"]);

                  if(empty(@$resim))
                  {
                     echo '<p class="alert alert-warning">Lütfen Resim Ekleyiniz..</p>';
                     header("Refresh:1; url=addslide.php");
                  }
                  else
                  {
                     $veriekle = $db->prepare("INSERT INTO slider SET title = ? , text = ? , button = ? , img = ?");
                     $veriekle -> execute([
                        @$title,
                        @$text,
                        @$button,
                        @$resim
                     ]);
                     if($veriekle)
                     {
                        echo '<p class="alert alert-success">Slide Başarıyla Eklendi</p>';
                        header("Refresh: 2; url=slider.php");
                     }
                     else
                     {
                        echo '<p class="alert alert-danger">Slide İle İlgili Bir Sorun Oluştu</p>';
                        header("Refresh:3; url=./");
                     }
                  }
               }
            ?>
            <form action=""method="post" enctype="multipart/form-data" style="user-select:none; padding-bottom: 15px;">
               <strong>Başlık : </strong>
               <input type="text" maxlength="110" name="title" class="form-control">
               <br>
               <strong>Yazı : </strong>
               <input type="text" maxlength="125" name="text" class="form-control">
               <br>
               <strong>Detay Buton Linki : </strong>
               <input type="text" maxlength="2048" name="button" class="form-control">
               <br>
               <strong>Resim : </strong>
               <input type="file" name="yukle_resim" class="form-control" accept="image/*">
               <br>
               <div style="display:flex; align-items:center; justify-content:space-between">
               <span></span>
               <input type="submit" value="Paylaş" class="btn btn-outline-primary">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script>
document.addEventListener('keydown', function(event) 
        {
            if (event.key === 'Escape') {
                window.location.href = 'news.php';
            }
        });

   var slider = document.getElementById("slider");

   slider.classList.add("active-menu");
</script>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
</body>
</html>