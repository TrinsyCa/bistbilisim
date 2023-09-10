<?php
   include("connection.php");
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

    <link rel="shortcut icon" href="../img/logo/BIST_Icon.png">
    <style>
      form
      {
         display:flex;
         gap:10px;
      }
      .gallery
      {
         display:flex;
         flex-wrap: wrap;
         gap: 14px;
      }
      .gallery .mypic
      {
         position:relative;
         width: 1920px;
         height: 400px;
      }
      .gallery a
      {
         position:relative;
      }
      .gallery .mypic:hover button
      {
         transform:translate(-30%,30%);
         opacity:1;
         pointer-events:auto;
      }
      .gallery .mypic button
      {
         position:absolute;
         top:0; right:0;
         transform:translate(-30%,10);
         padding: 2px 7px;
         border-radius: 8px;
         color:white;
         border:0;
         background:red;
         opacity: 0;
         pointer-events:none;
         transition: 0.3s;
         z-index: 9999999;
      }
      .gallery .mypic button:hover
      {
         background: #ED2B2A;
      }
      .gallery .mypic button:active
      {
         background: #F15A59;
      }
      .gallery .mypic img
      {
         width:100%;
         height:100%;
         object-fit:cover;
         object-position:center;
         border-radius: 10px;
         box-shadow: 0 0 5px black;
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
         <h1>Haberler Slider</h1>
         <div style="display:flex; align-items:center; gap: 10px;">
         <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="yukle_resim" class="form-control" accept="image/*" onchange="selectedPic();" style="width: 100px;">
            <input type="submit" value="Yükle" class="form-control" id="resimyukle" name="resimyukle" style="width:100px; display:none;">
         </form>
         <a href="slider.php"><i class="fa-solid fa-house"></i>&nbsp; Anasayfa Slider Yönetimi</a>
            <i onmouseover="help_over();" onmouseout="help_out();" class="fa-solid fa-circle-question question"></i>
            <div id="question-box">
                <p>Önerilen Resim Boyutu</p>
                <p><?php echo htmlspecialchars('[1920x400]'); ?></p>
                <hr>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="gallery">
         <?php
            if(isset($_POST["resimyukle"]))
            {
               $klasor = "../img/news/slider/";
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
               $resimad = $randoms.$link;
               if(strlen($name) == 0)
               {
                  echo "Lütfen Bir Dosya Seçin";
                  header("Refresh:1; url=news_slider.php");
                  exit();
               }
               if($type != "image/jpeg" && $type != "image/png" && $link != ".jpg")
               {
                  echo "Yalnızca JPEG veya PNG formatında olabilir !";
                  header("Refresh:2; url=news_slider.php");
                  exit();
               }
               move_uploaded_file($tmp_name, "$klasor/$resimad");
               $resimekle = $db->prepare("INSERT INTO news_slider SET name = ?");
               $resimekle->execute([$resimad]);
               header("Refresh: 0; url=news_slider.php");
            }

            $resimdb = $db->prepare("SELECT * FROM news_slider ORDER BY id DESC");
            $resimdb->execute();
            $resimler = $resimdb->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resimler as $row)
            {
               echo '<div class="mypic">
               <button onclick="sil('.$row["id"].', \''.$row["name"].'\');"><i class="fa-solid fa-trash"></i></button>
               <a target="_blank" href="../img/news/slider/'.$row["name"].'"><img src="../img/news/slider/'.$row["name"].'"></a>
               </div>';
            }
         ?>
         </div>
      </div>
   </div>
</div>
<script>
   function sil(sutunId , sutunName) {
      if (confirm("Bu resmi silmek istediğinize emin misiniz?")) {
         $.post("cmd/silnews_slider.php", { sutunId: sutunId , sutunName: sutunName})
            .done(function(response) {
               if (response === "Sütun başarıyla silindi") {
                  $("tr[data-sutunId='" + sutunId + "']").remove();
                  $("tr[data-sutunId='" + sutunName + "']").remove();
               }
               console.log(response);

               location.reload();
            })
            .fail(function() {
               console.log("Sütün silinirken bir hata oluştu");
            });
      }
   }

   function selectedPic()
   {
      var resim = document.getElementById('resimyukle');
      resim.style.display = "block";
   }

   var slider = document.getElementById("slider");

   slider.classList.add("active-menu");
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
</body>
</html>