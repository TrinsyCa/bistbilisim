<?php
    include("admin/connection.php");
    include("admin/linkfunc.php");

    $link = $_GET["link"];
    $veri = $db->prepare("SELECT * FROM news WHERE link = ?");
    $veri->execute([$link]);
    $islem = $veri->fetchAll(PDO::FETCH_ASSOC);
    foreach($islem as $row)
    {
        $id = $row["id"];
        $baslik = $row["baslik"];
        $alt_baslik = $row["alt_baslik"];
        $metin = $row["metin"];
        $resim = $row["resim"];
        $kategori = $row["kategori"];
        $yazar = $row["yazar"];
        $tarih = $row["tarih"];
        $description = $row["description"];
        $keywords = $row["keywords"];
        $tiklanma = $row["tiklanma"];
    }
?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $baslik.' | Bist Bilişim | Borsa İstanbul MTAL'; ?></title>
    
    <link rel="shortcut icon" href="../../img/logo/BIST_Icon.png">
    <link rel="stylesheet" href="../../css/news.css">
    <link rel="stylesheet" href="../../css/p.css">

    <meta name="description" content="<?php echo $description; ?>">
   <meta name="keywords" content= "<?php echo $kategori.' , '.$keywords; ?>">
   <meta name="author" content= "<?php echo $yazar; ?>">
   <meta property="og:site_name" content="Bist Bilişim | Borsa İstanbul MTAL">
   <meta property="og:url" content=".<?php echo 'bistbilisim.com/p/'.$link; ?>">
   <meta property="og:type" content="article">
   <meta property="article:section" content="Haberler | Bist Bilişim | Borsa İstanbul MTAL">
   <meta http-equiv="refresh" content="300">

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
<div id="alertBox" class="alert alert-dark" role="alert"></div>
    <style>
        .alert
        {
            position:fixed;
            top:60%;
            left:50%;
            transform:translate(-55%,-50%);
            background: #1a1d209a;
            color:white;
            border-color:black;
            opacity:0;
            user-select:none;
            pointer-events:none;
            transition: 0.35s;
            z-index: 1000;
        }
    </style>
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
              <a class="menu-link" href="../../students/">Öğrenciler</a>
              <a class="menu-link" href="../../teachers/">Öğretmenler</a>
              <a class="menu-link" href="../../gallery/">Galeri</a>
              <a class="menu-link" href="../../contact/">İletişim</a>
           </div>
        </div>
     </nav>
     
    <div class="wrap">
    <div class="wrapper">
        <div class="container">
            <div class="row us">
                <section class="t_box">
                    <div style="display:flex; justify-content: space-between; align-items:center; margin-top: 3px;">
                        <div style="display:flex; gap: 10px;">
                            <?php echo '<p>Kategori : '.$kategori.'</p>'; ?>
                            <p>|</p>
                            <?php echo '<p>Yazar : '.$yazar.'</p>'; ?>
                        </div>
                        <?php echo '<p>Tarih : '.$tarih.'</p>'; ?>
                    </div>
                    <?php echo '<h1>'.$baslik.'</h1>'; ?>
                    <?php echo '<h2>'.$alt_baslik.'</h2>'; ?>
                    <?php echo '<div class="kapak-border"><img src="../../img/news/'.$resim.'" class="kapak"></div>'; ?>
                </section>
                <section>
                    <div style="display:flex; justify-content:space-between; padding-top:10px;">
                        <article style="width: 70%;">
                        <?php
                            $m_keywords = explode(" , ",$keywords);
                            foreach($m_keywords as $keyword)
                            {
                                if(stripos($metin,$keyword) !== false)
                                {
                                    $metin = str_ireplace($keyword,"<b> ".$keyword." </b>",$metin);
                                }
                            }
                            echo '<p class="metin">'.$metin.'</p>';
                        ?>
                        <div class="links">
                        <div class="author-date-link">
                            <div>
                                <?php
                                    if($row["kategori"] == "Web Programlama")
                                    { echo '<p>Kategori : <a href="../web" target="_blank"><b>'.$kategori.'</b></a></p>'; }
                                    if($row["kategori"] == "Nesne Tabanlı Programlama")
                                    { echo '<p>Kategori : <a href="../ntp" target="_blank"><b>'.$kategori.'</b></a></p>'; }
                                    if($row["kategori"] == "Bilişim Teknolojileri Temelleri")
                                    { echo '<p>Kategori : <a href="../btt" target="_blank"><b>'.$kategori.'</b></a></p>'; }
                                    if($row["kategori"] == "Robotik Kodlama")
                                    { echo '<p>Kategori : <a href="../robotik" target="_blank"><b>'.$kategori.'</b></a></p>'; }
                                    if($row["kategori"] == "Genel")
                                    { echo '<p>Kategori : <a href="../genel" target="_blank"><b>'.$kategori.'</b></a></p>'; }
                                    if($row["kategori"] == "Grafik ve Canlandırma")
                                    { echo '<p>Kategori : <a href="../grafik" target="_blank"><b>'.$kategori.'</b></a></p>'; }
                                    if($row["kategori"] == "Siber Güvenlik")
                                    { echo '<p>Kategori : <a href="../siber" target="_blank"><b>'.$kategori.'</b></a></p>'; }
                                    if($row["kategori"] == "Duyuru")
                                    { echo '<p>Kategori : <a href="../duyuru" target="_blank"><b>'.$kategori.'</b></a></p>'; }
                                ?>
                                <?php echo '<p>Yazar : '.$yazar.'</p>'; ?>
                                <?php echo '<p>Tarih : '.$tarih.'</p>'; ?>
                            </div>
                            <button onclick="kopyala();" alt="Kopyala" class="paylas"><i class="fa-solid fa-link"></i></button>
                        </div>
                    </div>
                        </article>
                        <aside style="display:flex; flex-direction:column; gap: 10px; width:370px; align-items:center;">
                            <div>
                                <?php
                                    $veri = $db->prepare("SELECT * FROM news ORDER BY id DESC");
                                    $veri->execute();
                                    $l_news = $veri->fetchAll(PDO::FETCH_ASSOC);
                                    echo empty($l_news[1]["id"]) ? "" : "<h3>Son Haberler</h3>";
                                    $counter = 0;
                                    $counterf = 3;
                                    foreach($l_news as $row)
                                    {
                                        $nowlink = $row["link"];
                                        if($link == $nowlink)
                                        {
                                            $counterf = 4;
                                        }
                                        if($counter >= $counterf)
                                        {
                                            break;
                                        }
                                        if($link != $nowlink)
                                        {
                                            echo '<a href="'.$row["link"].'" class="card mb-2">
                                                    <div style="display:flex; align-items:center; max-width: 100%; height:100%;">
                                                        <div class="col-md-4 my-card-img">
                                                            <img src="../../img/news/'.$row["resim"].'" style="height:100%; width:100%; object-fit:cover; pointer-events:none; user-select:none;" class="img-fluid rounded-start">
                                                        </div>
                                                        <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title" style="font-size: 18px; color:black; height:35px;">'.kisalt($row["baslik"] , 36).'</h5>
                                                            <p class="card-text" style="color:black; height:30px; font-size:14px; padding-top: 5px;">'.kisalt($row["metin"] , 60).'</p>
                                                            <p class="card-text card-date"><small class="text-body-secondary">・'.$row["yazar"].'</small></p>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </a>';
                                        }
                                        $counter++;
                                    }
                                ?>
                                <?php
                                    $veri = $db->prepare("SELECT * FROM news WHERE kategori = ? ORDER BY id DESC");
                                    $veri->execute([$kategori]);
                                    $islem = $veri->fetchAll(PDO::FETCH_ASSOC);
                                    echo empty($islem[1]["id"]) ? "" : "<h4>".$kategori."</h4>";
                                    $counter = 0;
                                    $counterf = 3;
                                    foreach($islem as $row)
                                    {
                                        $nowlink = $row["link"];
                                        if($link == $nowlink)
                                        {
                                            $counterf = 4;
                                        }
                                        if($counter >= $counterf)
                                        {
                                            break;
                                        }
                                        if($link != $nowlink)
                                        {
                                            echo '<a href="'.$row["link"].'" class="card mb-2">
                                                    <div style="display:flex; align-items:center; max-width: 100%; height:100%;">
                                                        <div class="col-md-4 my-card-img">
                                                            <img src="../../img/news/'.$row["resim"].'" style="height:100%; width:100%; object-fit:cover; pointer-events:none; user-select:none;" class="img-fluid rounded-start">
                                                        </div>
                                                        <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title" style="font-size: 18px; color:black; height:35px;">'.kisalt($row["baslik"] , 48).'</h5>
                                                            <p class="card-text" style="color:black; height:30px; font-size:14px; padding-top: 5px;">'.kisalt($row["metin"] , 65).'</p>
                                                            <p class="card-text card-date"><small class="text-body-secondary">・'.$row["yazar"].'</small></p>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </a>';
                                        }
                                        $counter++;
                                    }
                                ?>
                                <style>
                                    .my-card-img { width: 35%; height:100%; transition:0.25s; }
                                    .card:hover .my-card-img { width: 100%;}
                                </style>
                            </div>
                            <div class="details" id="details">
                            <div class="info" id="info">
                                <div class="keys_title"><p class="keys">Anahtar Kelimeler</p></div>
                                <?php
                                    echo '<h1>'.$kategori.'</h1>';
                                    $keys = explode(" , ",$keywords);
                                    foreach($keys  as $keyword)
                                    {
                                        echo '<h1>'.$keyword.'</h1>';
                                    }
                                ?>
                            </div>
                                </aside>
                        </div>
                    </div>
                </section>
                </div>
            </div>
        </div>
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
              <a href="../../">Anasayfa</a>
              <a href="../">Haberler</a>
              <a href="../../students/">Öğrenciler</a>
              </span>
              <span>
              <a href="../../contact/">İletişim</a>
              <a href="../../teachers/">Öğretmenler</a>
              <a href="../../gallery/">Galeri</a>
              </span>
          </div>
          <p class="bist"><g translate="no">© Borsa İstanbul Başakşehir MTAL </g> | Bilişim Teknolojileri Bölümü</p>
          <p class="trinsyca"><a href="https://trinsyca.bistbilisim.com/" target="_blank">TrinsyCa </a> <g> Tarafından Oluşturuldu</g></p> <!--imza : Ömer İslamoğlu-->
      </div>
  </footer>
    <?php echo '<img class="bg-img" src="../../img/news/'.$resim.'">'; ?>
    <script>
        function delay(time) 
       {
          return new Promise(resolve => setTimeout(resolve, time));
       }
       function kopyala()
       {
          var sayfaLinki = window.location.href;
          navigator.clipboard.writeText(sayfaLinki)
          .then(function() {
             alert("Sayfa Linki Kopyalandı");
          })
          .catch(function() {
             alert("Sayfa Linki Kopyalanamadı");
          });
          var alert = document.getElementById("alertBox");
          alert.innerHTML = "Link Kopyalandı";
          alert.style.opacity = "1";
          alert.style.top = "50%";
          delay(1300).then(() => alert.style.opacity = "0");
          delay(1300).then(() => alert.style.top = "60%");
       }


        const nav = document.querySelector('nav');
        const sticky_ads = document.getElementById('sticky_ads');
        const kutu = document.getElementById('info');
        const details = document.getElementById('details');
        

        window.addEventListener('scroll' , () =>
        {
            nav.classList.toggle('nav-anim',window.scrollY > 20);
        });

        if (kutu.scrollHeight > 320) {
            details.classList.add('show-after');
        } else {
            details.classList.remove('show-after');
        }
        kutu.addEventListener('scroll', function() {
        if (kutu.scrollTop + kutu.clientHeight === kutu.scrollHeight) {
            details.classList.add('scroll-bottom');
        } else {
            details.classList.remove('scroll-bottom');
        }
        });
    </script>
    <script src="../../scripts/page.js"></script>
    <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>
</html>