<?php
   include("../admin/connection.php");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Öğretmenler - Bist Bilişim | Borsa İstanbul MTAL</title>
   <link rel="stylesheet" href="../css/teachers.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

   <!--Google Fonts-->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
   <!--Google Fonts-->

   <!-- Google tag (gtag.js) -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11208761348">
   </script>
   <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'AW-11208761348');
   </script>

   <!-- Event snippet for Sayfa görüntüleme conversion page -->
<script>
   gtag('event', 'conversion', {'send_to': 'AW-11208761348/aGvTCMKgt6gYEITA4OAp'});
 </script>
 
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
         <a href="../">
            <img src="../img/logo/BIST_Logo_Beyaz.png">
         </a>
         <i class="fa fa-bars" id="MenuBtn" aria-hidden="true" onclick="showMenu()"></i>
         <div class="menu" id="menu">
            <ul>
               <li class="hider">
                  <i class="fa fa-times" onclick="hideMenu()" aria-hidden="true"></i>
               </li>
               <li>
                  <!--Translate-->
                  <div class="translate">
                     <div id="google_translate_element"></div>
                  </div>
                  <script type="text/javascript">
                  function googleTranslateElementInit() {
                  new google.translate.TranslateElement({pageLanguage: 'tr', includedLanguages: 'tr,en,ru,es,ar,ko,zh-CN' ,layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                  }
                  </script>
                  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                  <!--Translate-->
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
                  <a class="menu-link" href="./">Öğretmenler</a>
               </li>
               <li>
                  <a class="menu-link" href="../gallery/">Galeri</a>
               </li>
               <li>
                  <a class="menu-link" href="../contact/">İletişim</a>
               </li>
               <?php
                  if(@$_SESSION["giris"])
               ?>
            </ul>
         </div>
      </div>
   </nav>
   <div class="wrapper">
      <div class="teachers">
         <h1>Öğretmenler</h1>
         <div class="teachers-col">
            <?php
               $veri = $db->prepare("SELECT * FROM teachers ORDER BY id ASC");
               $veri->execute();
               $teachers = $veri->fetchAll(PDO::FETCH_ASSOC);

               foreach ($teachers as $row) {
                  echo '<div class="teachers-detail" ';
                  if($row["social"])
                  {
                     echo 'onclick="window.open(\'' . $row["social"] . '\')" style="cursor:pointer;"';
                  }
                  echo'>
                            <div class="teachers-txt">
                                <img src="../img/teachers/' . $row["img"] . '">
                                <h3 translate="no">' . $row["name_surname"] . '</h3>
                                <div class="jobs us">';
              
                  if ($row["fields"]) {
                      $fields = explode(",", $row["fields"]);
                      $fields = array_reverse($fields);
                      $fields = array_slice($fields, 0, 3);
              
                      foreach ($fields as $field) {
                          echo '<p>' . trim($field) . '</p>';
                      }
                  }
              
                  echo '</div>
                        </div>
                        </div>';
              }
              
            ?>
         </div>
      </div>
      <footer>
         <div class="waves">
             <div class="wave" id="wave1"></div>
             <div class="wave" id="wave2"></div>
             <div class="wave" id="wave3"></div>
             <div class="wave" id="wave4"></div>
         </div>
         <div class="wrapper">
             <div class="social-icon">
                 <span><a href="https://www.instagram.com/bistbasaksehirbilisim/" target="_blank"><i class="fa-brands fa-instagram"></i></a></span>
                 <span><a href="tel:(0212) 488 00 64"><i class="fa-solid fa-phone"></i></a></span>
                 <span><a href="https://www.facebook.com/bistb.mtal/" target="_blank"><i class="fa-brands fa-facebook"></i></a></span>
             </div>
             <div class="menu">
                 <span>
                 <a href="../">Anasayfa</a>
                 <a href="../students/">Öğrenciler</a>
                 </span>
                 <span>
                 <a href="../contact/">İletişim</a>
                 <a href="../gallery/">Galeri</a>
                 </span>
                 <span><a href="./">Öğretmenler</a></span>
             </div>
             <p class="bist"><g translate="no">© Borsa İstanbul Başakşehir MTAL </g> | Bilişim Teknolojileri Bölümü</p>
             <p class="trinsyca" translate="no"><g>Created by </g><a href="../student/TrinsyCa">TrinsyCa </a></p> <!--imza : Ömer İslamoğlu-->
         </div>
     </footer>
   </div>
   <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
   <script src="../scripts/page.js"></script>
</body>
</html>