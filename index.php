<?php
   include("admin/connection.php");
   include("admin/linkfunc.php");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Bist MTAL Bilişim | Borsa İstanbul Başakşehir Mesleki ve Teknik Anadolu Lisesi Bilişim Teknolojileri Bölümü.">
   <title>Bist Bilişim | Borsa İstanbul MTAL</title>
   <link rel="stylesheet" href="css/mainpage.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

   <!--Google Fonts-->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
   <!--Google Fonts-->

   <link rel="shortcut icon" href="img/logo/BIST_Icon.png">

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
 
</head>
<body>
   <div id="preloader">
      <div id="loader">
         <img src="img/logo/BIST_Icon.png">
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
            <img src="img/logo/BIST_Logo_Beyaz.png">
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
                  <a class="menu-link" href="./">Anasayfa</a>
               </li>
               <li>
                  <a class="menu-link" href="news/">Haberler</a>
               </li>
               <li>
                  <a class="menu-link" href="students/">Öğrenciler</a>
               </li>
               <li>
                  <a class="menu-link" href="teachers/">Öğretmenler</a>
               </li>
               <li>
                  <a class="menu-link" href="gallery/">Galeri</a>
               </li>
               <li>
                  <a class="menu-link" href="contact/">İletişim</a>
               </li>
               <?php
                  if(@$_SESSION["giris"])
               ?>
            </ul>
         </div>
      </div>
   </nav>
   <div class="sswiper SliderSwiper">
      <div class="swiper-wrapper">
        <?php
            $veri = $db->prepare("SELECT * FROM slider ORDER BY id ASC");
            $veri->execute();
            $slider = $veri->fetchAll(PDO::FETCH_ASSOC);

            foreach($slider as $row)
            {
               echo '<div class="swiper-slide">
                        <div class="swiper-slide-txt">';
                        if($row["title"])
                        {
                           echo '<h1>'.$row["title"].'</h1>';
                        }
                        if($row["text"])
                        {
                           echo '<p>'.$row["text"].'</p>';
                        }
                        if($row["button"])
                        {
                           echo '<a target="_blank" href="'.$row["button"].'" class="linkbutton">Detaylar</a>';
                        }
                     echo '</div>
                        <img src="img/slider/'.$row["img"].'" />
                     </div>';
            }
        ?>
      </div>
      <div class="swiper-button-next">
         <div class="button-bg"></div>
      </div>
      <div class="swiper-button-prev">
         <div class="button-bg"></div>
      </div>
      <div class="swiper-pagination"></div>
      <div class="autoplay-progress">
         <svg viewBox="0 0 48 48">
           <circle cx="24" cy="24" r="20"></circle>
         </svg>
         <span></span>
       </div>
    </div>
   <header>
      <div class="wrapper">
         <div class="wrapper-col">
            <div class="header-sticky">
               <div class="header-txt">
                  <h1>Borsa İstanbul Başakşehir Mesleki ve Teknik Anadolu Lisesi</h1>
                  <h1>Bilişim Teknolojileri Bölümü</h1>
               </div>
            </div>
            <section class="news">
               <h2>Son Haberler</h2>
               <div class="news-row">
                  <?php
                     $newsdb = $db->query("SELECT * FROM news ORDER BY id DESC LIMIT 4");
                     $newsdb->execute();
                     $news = $newsdb->fetchAll(PDO::FETCH_ASSOC);
                     if($news)
                     {
                        foreach($news as $row)
                        {

                           echo '<div class="news-col">
                                    <a href="news/p/'.$row["link"].'" target="_blank">
                                       <img src="img/news/'.$row["resim"].'">
                                       <div class="news-title">
                                          <h1>'.kisalt($row["baslik"] , 65).'</h1>
                                          <div class="news-detail-col">
                                             <div class="news-detail">
                                                <p>'.$row["yazar"].'</p>
                                                <p>'.$row["tarih"].'</p>
                                             </div>
                                          </div>
                                       </div>
                                    </a>
                                 </div>';
                        }
                     }
                     else
                     {
                        echo '<div style="text-align:center"><strong>Maalesef Şuanda Haber Bulunmuyor..</strong></div>';
                     }
                  ?>
               </div>
            </section>
            <section class="fields">
               <h2>Bölümümüzdeki Alanlar</h2>
               <div class="fields-row">
                   <div class="fields-col">
                       <img src="img/tools/siber-security.jpg" alt="Siber Güvenlik">
                       <a target="_blank" href="http://meslek.eba.gov.tr/indir.php?d=cEIzaHdweDE0bHRyOXpQTkt3NGoxSGNuaElOSmkzQVlnOUQwSzArc3pDaGVWTXZ4UVAzYkF4bmxRcmpvVGdYaQ==&da=aDBkYzVNSERxbGc1SUNJYmhJMk9MbHZ5VHJ1dkE1c1B0WlNYTUxYaEIwVT0=&iq=bDQxb29HUUdtS3RmSWRwSXlnZkVTVVlpVUVtWVpKZThndTF2anprYW9FcGxzMzZjMHdpK0xDZGdJYkZGREg4U3ZlWlhOcWdaalB2UFl6RnFMUkZ4Snc9PQ==">
                           <div class="layer">
                              <h3>Ağ ve Siber Güvenlik</h3>
                           </div>
                       </a>
                   </div>
                   <div class="fields-col">
                       <img src="img/tools/web-coding.jpg" alt="Web Coding">
                        <a target="_blank" href="http://meslek.eba.gov.tr/indir.php?d=MHRzRDVocVpqeHJpYmFyRHVIcHVPZTFoYmhVN1dZTmJPMUFPeXJPL3RiY1ZKTkhHWTZnL1VDaENqcjczYzZXbzBtNnVtRkxMV2hHZDBLMmZBcTlMSHc9PQ==&da=TC8zd1lKdjRybU1ZTmVuMU5tZk03ZTBIVjNlKzM5WkczbitUS2tvbFV3bHhUMFdhY2JlUmVqMmpHSzY1VjgvYQ==&iq=bDQxb29HUUdtS3RmSWRwSXlnZkVTYnVoVko5UjFjVTUxc3BLMmZ4K2VLTGlwdTRUUDBJcDVGRXdIbENXdHZIWENBOG5qZ2QxUGhodTZ1aXREVnhOanc9PQ==">
                           <div class="layer">
                              <h3>Web Programlama</h3>
                           </div>
                        </a>
                   </div>
               </div>
           </section>
         </div>
      </div>
   </header>
   <section class="students">
      <div class="students-detail">
         <div class="hexbg">
            <img src="img/tools/hexagon-bg.png" class="hexbg">
         </div>
         <div class="bg-img">
            <img src="img/tools/student-boy.png">
            <img src="img/tools/student-girl.png">
         </div>
         <div class="students-center">
            <div class="title">
               <h2>Öğrenciler</h2>
            </div>
            <div class="swip-slider">
               <div class="students-col swiper mySwiper">
                  <div class="swiper-wrapper">
                  <?php
                           $veri = $db->prepare("SELECT *, 
                           SUBSTRING_INDEX(class, '/', 1) AS class_number, 
                           SUBSTRING_INDEX(class, '/', -1) AS class_name 
                           FROM students
                           WHERE class != 'Mezun'
                           ORDER BY id = 0 DESC, RAND() LIMIT 20");
                           $veri->execute();
                           $students = $veri->fetchAll(PDO::FETCH_ASSOC);
            
                           foreach($students as $row)
                           {
                              if(strpos($row["class"], "/") !== false)
                              {
                                 $class = explode("/",$row["class"]);
                                 $class = $class[0].$class[1];
                              }
                              else
                              {
                                 $class = "Mezun";
                              }
                              echo '<div class="student swiper-slide '.$class.'">
                                       <div class="student-border">
                                       <a';
                                          if($row["username"])
                                          {
                                            echo ' href="../student/'.$row["username"].'"';
                                          }
                                             echo'><div class="student-card">
                                                <div class="student-nav">
                                                   <div class="student-banner">';
                                                      if($row["banner"])
                                                      {
                                                         echo '<img src="img/students/banners/'.$row["banner"].'">';
                                                      }
                                                      else
                                                      {
                                                         echo '<img src="img/tools/purple-space.jpg">';
                                                      }
                                                   echo'<div class="student-banner-bg"></div>
                                                   </div>
                                                   <div class="student-img">
                                                      <img src="img/students/'.$row["img"].'">
                                                   </div>
                                                </div>
                                                <div class="student-inf">
                                                   <h3 id="name-surname">'.$row["name_surname"].'</h3>
                                                </div>';
                                                if($row["username"])
                                                {
                                                  echo '<p>@'.$row["username"].'</p>';
                                                }
                                                echo '<span>'.$row["class"].'</span>';
                                                if($row["username"])
                                                {
                                                  echo '<button>Profile Git</button>';
                                                }
                                             echo'</div>
                                          </a>
                                       </div>
                                    </div>';
                           }
                        ?>
                  </div>
               </div>
               <div class="swiper-button-next swiper-navBtn"></div>
               <div class="swiper-button-prev swiper-navBtn"></div>
               <div class="swiper-pagination swiper-pagination1"></div>
               </div>
            <div class="btn">
               <a href="students/">Tüm Öğrenciler</a>
            </div>
         </div>
      </div>
   </section>
   <section class="media">
      <div class="media-col">
         <div class="media-detail">
            <section class="gallery">
               <h2>Galeri</h2>
               <div class="gallery-col">
                   <div class="gallery-pics">
                     <div class="gswiper GallerySwiper">
                        <div class="swiper-wrapper">
                           <?php
                              $gallery = $db->prepare("SELECT * FROM gallery ORDER BY id DESC LIMIT 10");
                              $gallery->execute();
                              $resimler = $gallery->fetchAll(PDO::FETCH_ASSOC);

                              foreach($resimler as $row)
                              {
                                    echo '<div class="swiper-slide">
                                             <img src="img/pictures/'.$row["name"].'" />
                                          </div>';
                              }
                           ?>
                        </div>
                        <div class="swiper-pagination swiper-pagination2"></div>
                      </div>
                   </div>
               </div>
               <div class="gallery-btn">
                  <div class="btn">
                     <a href="gallery/" class="linkbutton">Galeri</a>
                  </div>
               </div>
            </section>
            <section class="insta">
               <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/CmuOP2LrgX_/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/CmuOP2LrgX_/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">Bu gönderiyi Instagram&#39;da gör</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/CmuOP2LrgX_/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Borsa İstanbul Başakşehir MTAL-Bilişim Teknolojileri (@bistbasaksehirbilisim)&#39;in paylaştığı bir gönderi</a></p></div></blockquote> <script async src="//www.instagram.com/embed.js"></script>
            </section>
         </div>
      </div>
   </section>
   <section class="vision" name="vision">
      <div class="vision-col">
         <div class="vision-detail">
            <div class="school">
               <img src="img/tools/borsaist.png" onclick="vismis()">
            </div>
            <div class="content-txt">
               <div id="content-txt-wrapper">
                  <div class="us">
                     <h3>Vizyon</h3>
                     <p>Borsa İstanbul Başakşehir Mesleki ve Teknik Anadolu Lisesi olarak vizyonumuz; Mesleki ve Teknik Eğitimde dünya standartlarını yakalamış, bilim ve teknoloji ışığında yüksek nitelikli bir eğitim anlayışıyla kabul görmüş, tercih edilen ve tüm paydaşlarının parçası olmaktan gurur duyduğu bir eğitim kurumu olmaktır...</p>
                  </div>
                  <div class="us">
                     <h3>Misyon</h3>
                     <p>Borsa İstanbul Başakşehir Mesleki ve Teknik Anadolu Lisesi olarak misyonumuz; Sanayi ile işbirliği içinde, ülke ekonomisinin ve iş yaşamının ihtiyacı olan nitelikli işgücünü, çağdaş ve bilimsel temellere dayanan eğitim anlayışıyla birleştirerek, meslekî ve insanî değerlere sahip, özgüveni yüksek, kendini sürekli geliştiren bireyler olarak yetiştirmektir...</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="teachers">
      <h2>Öğretmenler</h2>
      <div class="teachers-row">
         <?php
            $veri = $db->prepare("SELECT * FROM teachers ORDER BY id ASC LIMIT 5");
            $veri->execute();
            $teachers = $veri->fetchAll(PDO::FETCH_ASSOC);

            if(@$teachers)
            {
               for($i = 0; $i < 5; $i++)
            {
               if($teachers[$i])
               {
                  if($i == 1 || $i == 3)
                  {
                     echo '<div class="teachers-col">
                        <div class="teachers-detail-r"'; 
                     if($teachers[$i]["social"])
                     {
                        echo 'onclick="window.open(\'' . $teachers[$i]["social"] . '\')" style="cursor:pointer;"';
                     }
                  echo '>
                  <img src="img/teachers/'.$teachers[$i]["img"].'">
                           <div class="teachers-txt us">
                              <h3 translate="no">'.$teachers[$i]["name_surname"].'</h3>
                              <p>| ';
                              $teacherField = $teachers[$i]["fields"];
                              if($teacherField)
                                 {
                                    $fields = explode(",", $teacherField);
                                    $fields = array_reverse($fields);
                                    $fields = array_slice($fields,0,3);
      
                                    foreach($fields as $field) {
                                       echo trim($field).' | ';
                                    }
                                 }
                              echo '</p>
                           </div>
                        </div>
                     </div>';
                  }
                  else
                  {
                     echo '<div class="teachers-col">
                        <div class="teachers-detail"'; 
                     if($teachers[$i]["social"])
                     {
                        echo 'onclick="window.open(\'' . $teachers[$i]["social"] . '\')" style="cursor:pointer;"';
                     }
                  echo '>
                           <div class="teachers-txt us">
                              <h3 translate="no">'.$teachers[$i]["name_surname"].'</h3>
                              <p>| ';
                              $teacherField = $teachers[$i]["fields"];
                              if($teacherField)
                                 {
                                    $fields = explode(",", $teacherField);
                                    $fields = array_reverse($fields);
                                    $fields = array_slice($fields,0,3);
      
                                    foreach($fields as $field) {
                                       echo trim($field).' | ';
                                    }
                                 }
                              echo '</p>
                           </div>
                           <img src="img/teachers/'.$teachers[$i]["img"].'">
                        </div>
                     </div>';
                  }
               }
            }
            }
         ?>
         <div class="btn">
            <a href="teachers/">Tüm Öğretmenler</a>
         </div>
      </div>
   </section>
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
              <a href="/">Anasayfa</a>
              <a href="news/">Haberler</a>
              <a href="students/">Öğrenciler</a>
              </span>
              <span>
              <a href="contact/">İletişim</a>
              <a href="teachers/">Öğretmenler</a>
              <a href="gallery/">Galeri</a>
              </span>
          </div>
          <p class="bist"><g translate="no">© Borsa İstanbul Başakşehir MTAL </g> Bilişim Teknolojileri Bölümü</p>
          <p class="trinsyca" translate="no"><g>Created by </g><a href="student/TrinsyCa">TrinsyCa </a></p> <!-- Signature : Ömer İslamoğlu ~ https://trinsyca.com -->
      </div>
  </footer>
   <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
   <script src="scripts/mainpage.js"></script>
   <script>
      function delay(time) {
   return new Promise(resolve => setTimeout(resolve, time));
   }
      window.addEventListener('load', function()
      {
         delay(300).then(() =>
               {
                  //Students Slider
            var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 25,
            loop: true,
            centerSlide: 'true',
            fade: 'true',
            pagination: {
               el: ".swiper-pagination1",
               clickable: true,
               dynamicBullets: true,
            },
            navigation: {
               nextEl: ".swiper-button-next",
               prevEl: ".swiper-button-prev",
            },
            });

            //Gallery Slider
            var swiper = new Swiper(".GallerySwiper", {
            effect: "cube",
            grabCursor: false,
            loop: 'true',
            cubeEffect: {
               shadow: true,
               slideShadows: true,
               shadowOffset: 20,
               shadowScale: 0.94,
            },
            autoplay: {
            delay: 3000,
            disableOnInteraction: false,
               },
            pagination: {
               el: ".swiper-pagination2",
            },
            });

            //Start Slider
            const progressCircle = document.querySelector(".autoplay-progress svg");
            const progressContent = document.querySelector(".autoplay-progress span");

            var swiper = new Swiper(".SliderSwiper", {
               effect: "creative",
               loop: 'true',
               creativeEffect: {
            prev: {
               shadow: true,
               translate: ["-20%", 0, -1],
            },
            next: {
               translate: ["100%", 0, 0],
            },
            },
               autoplay: {
               delay: 8000,
               disableOnInteraction: false,
                  },
               navigation: {
                  nextEl: ".swiper-button-next",
                  prevEl: ".swiper-button-prev",
               },
               pagination: {
                  el: ".swiper-pagination",
                  clickable: true,
               },
            });
         })
      })   
   </script>
</body>
</html>
