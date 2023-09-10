<?php
    include("../../admin/connection.php");
    include("../../admin/linkfunc.php");

    try
    {
        $news = $db->query("SELECT * FROM news WHERE kategori = 'Duyuru' ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOExeption $error)
    {
        $news = 0;
    }
    if(!$news == 0)
    {
        $l_news = $news[0];
    }
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="bist mtal haberler">
    <meta name="description" content="Borsa İstanbul Mesleki ve Teknik Anadolu Lisesi Haberler">
    <meta name="description" content="Okul Haberleri">
    <meta name="description" content="Bist MTAL Bilişim">
    <meta name="description" content="Bist MTAL Bilişim Haberler">
    <meta name="keywords" content="bist mtal bilişim, bist mtal bilişim haberler, bist mtal bilişim güncel, bistbilişim">
    <meta name="author" content="Bist MTAL Bilişim">
    <meta name="author" content="Ömer İslamoğlu">
    <meta property="og:title" content="Bist Bilişim Haberler | Borsa İstanbul MTAL">
    <meta property="og:url" content="bistbilisim.com/news">
    <meta property="og:type" content="article">
    <meta property="article:section" content="Haberler - Bist Bilişim">
    <title>Duyuru Haberleri | Bist Bilişim | Borsa İstanbul MTAL</title>

    <link rel="shortcut icon" href="../../img/logo/BIST_Icon.png">
    <link rel="stylesheet" href="../../css/news.css">

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

</head>
<body>
    <div id="preloader">
        <div id="loader">
           <img src="../../img/logo/BIST_Icon.png">
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
           <a href="../../" class="logo_img">
              <img src="../../img/logo/BIST_Logo_Beyaz.png">
           </a>
           <div class="menu">
              <!--Translate-->
              <div class="translate">
                 <div id="google_translate_element"></div>
              </div>
              <hr class="vh_line">
              <script type="text/javascript">
              function googleTranslateElementInit() {
              new google.translate.TranslateElement({pageLanguage: 'tr', includedLanguages: 'tr,en,ru,es,ar,ko,zh-CN' ,layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
              }
              </script>
              <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
              <!--Translate-->
              <a class="menu-link" href="../../">Anasayfa</a>
              <a class="menu-link" href="../">Haberler</a>
              <a class="menu-link" href="../students/">Öğrenciler</a>
              <a class="menu-link" href="../teachers/">Öğretmenler</a>
              <a class="menu-link" href="../gallery/">Galeri</a>
              <a class="menu-link" href="../contact/">İletişim</a>
           </div>
        </div>
     </nav>
     <header class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide"><img src="../../img/Pictures/Bilisim_Teknolojileri_Laboratuvari.jpg"></div>
          <div class="swiper-slide">Slide 2</div>
          <div class="swiper-slide">Slide 3</div>
        </div>
        <div class="swiper-pagination"></div>
    </header>
    <div class="blue_line" id="sticky_blue_line">
        <a href="../"><i class="fa-solid fa-grip"></i> Tümü</a>
        <a href="../genel"><i class="fa-solid fa-newspaper"></i> Genel</a>
        <a href="../web"><i class="fa-solid fa-code"></i> Web</a>
        <a href="../grafik"><i class="fa-solid fa-images"></i> Grafik ve Canlandırma</a>
        <a href="../ntp"><i class="fa-solid fa-display"></i> NTP</a>
        <a href="../siber"><i class="fa-solid fa-shield"></i> Siber Güvenlik</a>
        <a href="../robotik"><i class="fa-solid fa-robot"></i> Robotik Kodlama</a>
        <a href="../btt"><i class="fa-solid fa-microchip"></i> BTT</a>
        <a href="./"><i class="fa-solid fa-bullhorn"></i> Duyuru</a>
    </div>
    <div class="wrapper">
        <!-- Reklamlar
        <div id="sticky_ads">
            <a href="" class="haber_href">
                <div class="ads left_add" id="size_160x600">
                    <p>SPONSOR ADS</p>
                </div>
            </a>
            <a href="" class="haber_href">
                <div class="ads right_add" id="size_160x600">
                    <p>SPONSOR ADS</p>
                </div>
            </a>
        </div>-->
        <div class="container">
        <div class="row">
                <div class="news">
                    <div class="news-2-side">
                        <a href="p/<?php echo $l_news["link"]; ?>" target="_blank" class="haber_href">
                            <div class="haber haber_long">
                                <div class="pic">
                                    <?php echo empty($l_news["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $l_news["resim"] . '">'; ?>
                                </div>
                                <?php echo empty($l_news["baslik"]) ? "<h3></h3>" : '<h3 class="full">'.kisalt($l_news["baslik"] , 90).'</h3>'; ?>
                            </div>
                        </a>
                        <div class="news">
                            <a href="p/<?php echo $news[1]["link"]; ?>" target="_blank" class="haber_href">
                                <div class="haber haber_short">
                                    <div class="pic">
                                        <?php echo empty($news[1]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[1]["resim"] . '">'; ?>
                                    </div>
                                    <?php echo empty($news[1]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[1]["baslik"] , 70).'</h3>'; ?>
                                </div>
                            </a>
                            <a href="p/<?php echo $news[2]["link"]; ?>" target="_blank" class="haber_href">
                                <div class="haber haber_short">
                                    <div class="pic">
                                        <?php echo empty($news[2]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[2]["resim"] . '">'; ?>
                                    </div>
                                    <?php echo empty($news[2]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[2]["baslik"] , 70).'</h3>'; ?>
                                </div>
                            </a>
                            <a href="p/<?php echo $news[3]["link"]; ?>" target="_blank" class="haber_href">
                                <div class="haber haber_short">
                                    <div class="pic">
                                        <?php echo empty($news[3]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[3]["resim"] . '">'; ?>
                                    </div>
                                    <?php echo empty($news[3]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[3]["baslik"] , 26).'</h3>'; ?>
                                </div>
                            </a>
                            <a href="p/<?php echo $news[4]["link"]; ?>" target="_blank" class="haber_href">
                                <div class="haber haber_short">
                                    <div class="pic">
                                        <?php echo empty($news[4]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[4]["resim"] . '">'; ?>
                                    </div>
                                    <?php echo empty($news[4]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[4]["baslik"] , 26).'</h3>'; ?>
                                </div>
                            </a>
                        </div>
                    </div>
                    <a href="p/<?php echo $news[5]["link"]; ?>" target="_blank" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                                <?php echo empty($news[5]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[5]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[5]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[5]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="p/<?php echo $news[6]["link"]; ?>" target="_blank" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                                <?php echo empty($news[6]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[6]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[6]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[6]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="p/<?php echo $news[7]["link"]; ?>" target="_blank" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                                <?php echo empty($news[7]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[7]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[7]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[7]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                                <?php echo empty($news[8]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[8]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[8]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[8]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                                <?php echo empty($news[9]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[9]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[9]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[9]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                                <?php echo empty($news[10]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[10]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[10]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[10]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href empty_news">
                        <div class="haber haber_short">
                        </div>
                    </a>
                    <div class="news-cube-side">
                        <a href="" class="haber_href">
                            <div class="haber haber_cube">
                                <div class="pic">
                                <?php echo empty($news[11]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[11]["resim"] . '">'; ?>
                                </div>
                                <?php echo empty($news[11]["baslik"]) ? "<h3></h3>" : '<h3 class="full">'.kisalt($news[11]["baslik"] , 90).'</h3>'; ?>
                            </div>
                        </a>
                        <div class="news">
                        <a href="" class="haber_href">
                                <div class="haber haber_short">
                                    <div class="pic">
                                        <?php echo empty($news[12]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[12]["resim"] . '">'; ?>
                                    </div>
                                    <?php echo empty($news[12]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[12]["baslik"] , 26).'</h3>'; ?>
                                </div>
                            </a>
                            <a href="" class="haber_href">
                                <div class="haber haber_short">
                                    <div class="pic">
                                    <?php echo empty($news[13]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[13]["resim"] . '">'; ?>
                                    </div>
                                    <?php echo empty($news[13]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[13]["baslik"] , 26).'</h3>'; ?>
                                </div>
                            </a>
                            <a href="" class="haber_href">
                                <div class="haber haber_short">
                                    <div class="pic">
                                        <?php echo empty($news[14]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[14]["resim"] . '">'; ?>
                                    </div>
                                    <?php echo empty($news[14]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[14]["baslik"] , 26).'</h3>'; ?>
                                </div>
                            </a>
                            <a href="" class="haber_href">
                                <div class="haber haber_short">
                                    <div class="pic">
                                    <?php echo empty($news[15]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[15]["resim"] . '">'; ?>
                                    </div>
                                    <?php echo empty($news[15]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[15]["baslik"] , 26).'</h3>'; ?>
                                </div>
                            </a>
                        </div>
                    </div>
                    <a href="" class="haber_href empty_news">
                        <div class="haber haber_short">
                        </div>
                    </a>
                    <a href="" class="haber_href empty_news">
                        <div class="haber haber_short">
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[16]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[16]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[16]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[16]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[17]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[17]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[17]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[17]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[18]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[18]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[18]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[18]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[19]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[19]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[19]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[19]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[20]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[20]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[20]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[20]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[21]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[21]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[21]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[21]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[22]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[22]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[22]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[22]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[23]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[23]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[23]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[23]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <div class="news-add-side">
                        <a href="" class="haber_href">
                            <div class="ads" id="size_300x600">
                                <div class="pic">
                                    <p><i class='fa-solid fa-x'></i></p>
                                </div>
                            </div>
                        </a>
                        <div class="news">
                            <div class="news-cube-side">
                                <a href="" class="haber_href">
                                    <div class="haber haber_cube">
                                        <div class="pic">
                                        <?php echo empty($news[24]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[24]["resim"] . '">'; ?>
                                        </div>
                                        <?php echo empty($news[24]["baslik"]) ? "<h3></h3>" : '<h3 class="full">'.kisalt($news[24]["baslik"] , 90).'</h3>'; ?>
                                    </div>
                                </a>
                            </div>
                            <div class="news-w305">
                                <a href="" class="haber_href">
                                    <div class="haber haber_short">
                                        <div class="pic">
                                        <?php echo empty($news[25]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[25]["resim"] . '">'; ?>
                                        </div>
                                        <?php echo empty($news[25]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[25]["baslik"] , 26).'</h3>'; ?>
                                    </div>
                                </a>
                                <a href="" class="haber_href">
                                    <div class="haber haber_short">
                                        <div class="pic">
                                        <?php echo empty($news[26]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[26]["resim"] . '">'; ?>
                                        </div>
                                        <?php echo empty($news[26]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[26]["baslik"] , 26).'</h3>'; ?>
                                    </div>
                                </a>
                                <a href="" class="haber_href">
                                    <div class="haber haber_short">
                                        <div class="pic">
                                        <?php echo empty($news[27]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[27]["resim"] . '">'; ?>
                                        </div>
                                        <?php echo empty($news[27]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[27]["baslik"] , 26).'</h3>'; ?>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[26]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[28]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[26]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[28]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[29]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[29]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[29]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[29]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[30]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[30]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[30]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[30]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[31]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[31]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[31]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[31]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[32]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[32]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[32]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[32]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[33]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[33]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[33]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[33]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[34]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[34]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[34]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[34]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[35]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[35]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[35]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[35]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[36]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[36]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[36]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[36]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[37]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[37]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[37]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[37]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[38]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[38]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[38]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[38]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[39]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[39]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[39]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[39]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[40]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[40]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[40]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[40]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[41]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[41]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[41]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[41]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[42]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[42]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[42]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[42]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[43]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[43]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[43]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[43]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[44]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[44]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[44]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[44]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[45]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[45]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[45]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[45]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[46]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[46]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[46]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[46]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                    <a href="" class="haber_href">
                        <div class="haber haber_short">
                            <div class="pic">
                            <?php echo empty($news[47]["resim"]) ? "<p><i class='fa-solid fa-x'></i></p>" : '<img src="../../img/news/' . $news[47]["resim"] . '">'; ?>
                            </div>
                            <?php echo empty($news[47]["baslik"]) ? "<h3 class='empty_title'></h3>" : '<h3>'.kisalt($news[47]["baslik"] , 26).'</h3>'; ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </div>
    <br><br>
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
              <a href="./">Haberler</a>
              <a href="students/">Öğrenciler</a>
              </span>
              <span>
              <a href="contact/">İletişim</a>
              <a href="teachers/">Öğretmenler</a>
              <a href="gallery/">Galeri</a>
              </span>
          </div>
          <p class="bist"><g translate="no">© Borsa İstanbul Başakşehir MTAL </g> | Bilişim Teknolojileri Bölümü</p>
          <p class="trinsyca"><a href="https://trinsyca.bistbilisim.com/" target="_blank">TrinsyCa </a> <g> Tarafından Oluşturuldu</g></p> <!--imza : Ömer İslamoğlu-->
      </div>
  </footer>
      <script src="../../scripts/page.js"></script>
      <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    const nav = document.querySelector('nav');
    const blue_line = document.getElementById("sticky_blue_line");
    //const sticky_ads = document.getElementById('sticky_ads');
    

    window.addEventListener('scroll' , () =>
    {
        nav.classList.toggle('nav-anim',window.scrollY > 50);
        /*if(window.pageYOffset > 200)
        {
            sticky_ads.style.position = "fixed";
            sticky_ads.style.top = "23%";
        }
        else
        {
            sticky_ads.style.position = "absolute";
            sticky_ads.style.top = "";
            sticky_ads.style.transform = "";
        }*/
        if(window.pageYOffset > 345)
        {
            nav.style.display = "none";
        }
        else
        {
            nav.style.display = "block";
        }
        if(window.pageYOffset > 365)
        {
            blue_line.style.position = "fixed";
            blue_line.style.top = "2.2%";
        }
        else
        {
            blue_line.style.position = "absolute";
            blue_line.style.top = "41%";
        }
    });
    

    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>
</body>
</html>