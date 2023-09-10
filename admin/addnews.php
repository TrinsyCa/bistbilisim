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
         <h1>Haber Ekle</h1>
         <div style="display:flex; align-items:center; gap: 10px;">
            <a href="news.php"><i class="fa-solid fa-newspaper"></i>&nbsp; Haberler</a>
            <i onmouseover="help_over();" onmouseout="help_out();" class="fa-solid fa-circle-question question"></i>
            <div id="question-box">
                <p>Yazı , Kutu , Tweet Ortalama</p>
                <p><?php echo htmlspecialchars('<center>[Nesne]</center>'); ?></p>
                <hr>
                <p>Yazı Kısmına Resim Ekleme</p>
                <p><?php echo htmlspecialchars('<img src="[Resim Linki]">'); ?></p>
                <hr>
                <p>Anahtar Kelimeler Haberi Öne Çıkarır</p>
                <p><?php echo htmlspecialchars('"Yazılım , Bist MTAL , Robotik Kodlama"'); ?></p>
                <hr>
                <p>Maksimum Başlık Uzunluğu</p>
                <p><?php echo htmlspecialchars('[110 Karakter]'); ?></p>
                <hr>
                <p>Maksimum Alt Başlık Uzunluğu</p>
                <p><?php echo htmlspecialchars('[125 Karakter]'); ?></p>
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
                  $klasor = "../img/news/";
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
                     header("Refresh:1; url=addnews.php");
                     exit();
                  }
                  if($type != "image/jpeg" && $type != "image/png" && $type != "image/webp" && $link != ".jpg")
                  {
                     echo "Yalnızca JPEG , PNG , WEBP formatında olabilir !";
                     header("Refresh:2; url=addnews.php");
                     exit();
                  }
                  move_uploaded_file($tmp_name, "$klasor/$resim");

                  @$baslik = htmlspecialchars(@$_POST["baslik"]);
                  @$alt_baslik = htmlspecialchars(@$_POST["alt_baslik"]);
                  @$metin = @$_POST["metin"];
                  @$kategori = htmlspecialchars(@$_POST["kategori"]);
                  @$description = htmlspecialchars(@$_POST["description"]);
                  @$keywords = htmlspecialchars(@$_POST["keywords"]);
                  @$yazar = @$_SESSION["adsoyad"];

                  $link = permalink($baslik);

                  $veriLink = $db->prepare("SELECT COUNT(link) AS total FROM news WHERE link = ?");
                  $veriLink->execute([$link]);
                  $linkCounter = $veriLink->fetch(PDO::FETCH_ASSOC)['total'];

                  if ($linkCounter > 0) {
                     $counter = 1;
                     while ($linkCounter > 0) {
                        $linkCounter--;
                        $link = permalink($baslik) . "-" . $counter;
                        $veriLink->execute([$link]);
                        $linkCounter = $veriLink->fetch(PDO::FETCH_ASSOC)['total'];
                        $counter++;
                     }
                  }


                  if(empty(@$baslik) || empty(@$metin) || empty(@$resim) || empty(@$kategori))
                  {
                     echo '<p class="alert alert-warning">Lütfen Boş Bırakmayınız..</p>';
                     header("Refresh:1; url=addnews.php");
                  }
                  else
                  {
                     $veriekle = $db->prepare("INSERT INTO news SET baslik = ? , alt_baslik = ? , metin = ? , resim = ? , link = ?  , kategori = ? , description = ? , keywords = ? , yazar = ?");
                     $veriekle -> execute([
                        @$baslik,
                        @$alt_baslik,
                        @$metin,
                        @$resim,
                        @$link,
                        @$kategori,
                        @$description,
                        @$keywords,
                        @$yazar
                     ]);
                     if($veriekle)
                     {
                        echo '<p class="alert alert-success">Haber Ekleme Başarıyla Eklendi</p>';
                        header("Refresh: 2; url=news.php");
                     }
                     else
                     {
                        echo '<p class="alert alert-danger">Haber Ekleme İle İlgili Bir Sorun Oluştu</p>';
                        header("Refresh:3; url=./");
                     }
                  }
               }
            ?>
            <form action=""method="post" enctype="multipart/form-data" style="user-select:none; padding-bottom: 15px;">
               <strong>Başlık : </strong>
               <input type="text" maxlength="110" name="baslik" class="form-control">
               <br>
               <strong>Alt Başlık : </strong>
               <input type="text" maxlength="125" name="alt_baslik" class="form-control">
               <br>
               <strong>Yazı : </strong>
               <textarea name="metin" cols="30" rows="10" class="form-control"></textarea>
               <br>
               <strong>Kapak Resmi : </strong>
               <input type="file" name="yukle_resim" class="form-control" accept="image/*">
               <br>
               <strong>Haber Özeti : </strong>
               <input type="text" name="description" class="form-control">
               <br>
               <strong>Anahtar Kelimeler ( , ) : </strong>
               <input type="text" name="keywords" class="form-control">
               <br>
               <input type="text" name="kategori" id="kategori" class="form-control" style="user-select:none; display:none; pointer-events:none; ">
               <div style="display:flex; justify-content: space-between; align-items:center; position:relative;">
                <div class="btn-group dropend kategori">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="kategoriemote" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-grip"></i>&nbsp; Haber Kategorisi
                        </button>
                        
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a onclick="genel();" class="dropdown-item"><i class="fa-solid fa-newspaper"></i>&nbsp; Genel</a></li>
                            <li><a onclick="kodlama();" class="dropdown-item"><i class="fa-solid fa-code"></i>&nbsp; Web Programlama</a></li>
                            <li><a onclick="photoshop();" class="dropdown-item"><i class="fa-solid fa-images"></i>&nbsp; Grafik ve Canlandırma</a></li>
                            <li><a onclick="ntp();" class="dropdown-item"><i class="fa-solid fa-display"></i>&nbsp; Nesne Tabanlı Programlama</a></li>
                            <li><a onclick="siberg();" class="dropdown-item"><i class="fa-solid fa-shield"></i>&nbsp; Siber Güvenlik</a></li>
                            <li><a onclick="micro();" class="dropdown-item"><i class="fa-solid fa-robot"></i>&nbsp; Robotik Kodlama</a></li>
                            <li><a onclick="btt();" class="dropdown-item"><i class="fa-solid fa-microchip"></i>&nbsp; Bilişim Teknolojileri Temelleri</a</li>
                            <li><a onclick="duyuru();" class="dropdown-item"><i class="fa-solid fa-bullhorn"></i>&nbsp; Duyuru</a></li>
                        </ul>
                    </div>
                    <script>
                        ke = document.getElementById("kategoriemote");
                        k = document.getElementById("kategori");

                        function genel() { ke.innerHTML = '<i class="fa-solid fa-newspaper"></i>&nbsp; Genel'; k.value = "Genel"; }
                        function kodlama() { ke.innerHTML = '<i class="fa-solid fa-code"></i>&nbsp; Web Programlama'; k.value = "Web Programlama"; }
                        function photoshop() { ke.innerHTML = '<i class="fa-solid fa-images"></i>&nbsp; Grafik ve Canlandırma'; k.value = "Grafik ve Canlandırma"; }
                        function ntp() { ke.innerHTML = '<i class="fa-solid fa-display"></i>&nbsp; Nesne Tabanlı Programlama'; k.value = "Nesne Tabanlı Programlama"; }
                        function siberg() { ke.innerHTML = '<i class="fa-solid fa-shield"></i>&nbsp; Siber Güvenlik'; k.value = "Siber Güvenlik"; }
                        function micro() { ke.innerHTML = '<i class="fa-solid fa-robot"></i>&nbsp; Robotik Kodlama'; k.value = "Robotik Kodlama"; }
                        function btt() { ke.innerHTML = '<i class="fa-solid fa-microchip"></i>&nbsp; Bilişim Teknolojileri Temelleri'; k.value = "Bilişim Teknolojileri Temelleri"; }
                        function duyuru() { ke.innerHTML = '<i class="fa-solid fa-bullhorn"></i>&nbsp; Duyuru'; k.value = "Duyuru"; }
                    
                    </script>
                        <div><?php echo '<p class="author_href" target="_blank">Yazar : '.@$_SESSION["adsoyad"].'</p>'; ?></div>
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

   var haberler = document.getElementById("news");

    haberler.classList.add("active-menu");
</script>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
</body>
</html>