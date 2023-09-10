<?php
  include("../admin/connection.php");

  $veri = $db->prepare("SELECT * FROM gallery ORDER BY id DESC");
  $veri->execute();
  $resim = $veri->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeri - Bist Bilişim | Borsa İstanbul MTAL</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="../css/gallery.css">

  <!--Google Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <!--Google Fonts-->

  <link rel="shortcut icon" href="../img/logo/BIST_Icon.png">

</head>

<body>
   <div id="preloader">
      <div id="loader">
      <img src="../img/logo/BIST_Icon.png">
      <span style="--i:1;"></span>
      <span style="--i:2;"></span>
      <span style="--i:3;"></span>
      <span style="--i:4;"></span>
      <span style="--i:5;"></span>
      <span style="--i:6;"></span>
      <span style="--i:7;"></span>
      <span style="--i:8;"></span>
      <span style="--i:9;"></span>
      <span style="--i:10;"></span>
      <span style="--i:11;"></span>
      <span style="--i:12;"></span>
      <span style="--i:13;"></span>
      <span style="--i:14;"></span>
      <span style="--i:15;"></span>
      <span style="--i:16;"></span>
      <span style="--i:17;"></span>
      <span style="--i:18;"></span>
      <span style="--i:19;"></span>
      <span style="--i:20;"></span>
      </div>
   </div>
   <nav>
      <div class="nav-wrapper">
         <a href="/">
            <img src="../img/logo/BIST_Logo_Beyaz.png">
         </a>
         <i class="fa fa-bars" id="MenuBtn" aria-hidden="true" onclick="showMenu()"></i>
         <div class="menu" id="menu">
            <ul>
               <li class="hider">
                  <i class="fa fa-times" onclick="hideMenu()" aria-hidden="true"></i>
               </li>
               <li>
                  <a class="menu-link" href="../">Anasayfa</a>
               </li>
               <li>
                  <a class="menu-link" href="../news/">Haberler</a>
               </li>
               <li>
                  <a class="menu-link" href="../students/">Öğrenciler</a>
               </li>
               <li>
                  <a class="menu-link" href="../teachers/">Öğretmenler</a>
               </li>
               <li>
                  <a class="menu-link" href="./">Galeri</a>
               </li>
               <li>
                  <a class="menu-link" href="../contact/">İletişim</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
   <div class="wrapper">
      <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
         <div class="swiper-wrapper">
           <?php
            foreach($resim as $row)
            {
              echo '<div class="swiper-slide">
              <div class="swiper-zoom-container">
                 <img src="../img/pictures/'.$row["name"].'" />
               </div>
             </div>';
            }
           ?>
         </div>
         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>
       </div>
       <div thumbsSlider="" class="swiper mySwiper">
        <div class="swiper-wrapper">
         <?php
          foreach($resim as $row)
          {
            echo '<div class="swiper-slide">
              <img src="../img/pictures/'.$row["name"].'" />
            </div>';
          }
         ?>
         </div>
       </div>
       <footer>
         <div class="txt">
            <p>© Borsa İstanbul Başakşehir MTAL Bilişim Teknolojileri Bölümü</p>
         </div>
         <p class="trinsyca" translate="no"><g>Created by </g><a href="../student/TrinsyCa">TrinsyCa </a></p> <!--imza : Ömer İslamoğlu-->
   </div>

  <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="../scripts/page.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 10,
      slidesPerView: 6,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
      effect: "coverflow",
      loop: true,
      spaceBetween: 10,
      zoom: true,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });
  </script>
</body>

</html>
