<?php
    session_start();
    ob_start();

    include("admin/connection.php");
    @$username = @$_GET["username"];
    @$veri = $db->prepare("SELECT * FROM students WHERE username = ?");
    @$veri->execute([$username]);
    $islem = $veri->fetchAll(PDO::FETCH_ASSOC);
    foreach($islem as $row)
    {
        @$id = $row["id"];
        @$name_surname = $row["name_surname"];
        @$username = $row["username"];
        @$pass = $row["pass"];
        @$img = $row["img"];
        @$banner = $row["banner"];
        @$cv = $row["cv"];
        @$domain = $row["domain"];
        @$social = $row["social"];
        @$email = $row["email"];
        @$class = $row["class"];
        @$about = html_entity_decode($row["about"]);
        @$language = $row["language"];
    }

    if(!$islem)
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title translate="no"><?php if($islem) echo $name_surname.' (@'.$username.') | Bist Bilişim'; ?></title>
    <link rel="shortcut icon" href="../img/logo/BIST_Icon.png">
    <link rel="stylesheet" href="../css/user.css">

        <!--Google Fonts-->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
   <!--Google Fonts-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

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
                  <a class="menu-link" href="../teachers/">Öğretmenler</a>
               </li>
               <li>
                  <a class="menu-link" href="../gallery/">Galeri</a>
               </li>
               <li>
                  <a class="menu-link" href="../contact/">İletişim</a>
               </li>
               <?php
                  @$username = @$_GET["username"];
                  if(@$_SESSION["student"] == true && @$_SESSION["username"] == @$username)
                  {
                    echo'<li>
                           <a class="menu-link" href="admin/'.@$username.'"><i class="fa-solid fa-gear"></i> Ayarlar</a>
                      </li>';
                      echo'<li>
                              <a class="menu-link" href="../logout.php"><i class="fa-solid fa-power-off"></i></a>
                           </li>';
                  }
               ?>
            </ul>
         </div>
      </div>
   </nav>
    <div class="wrapper">
        <div class="content"
        <?php
            if(@$about == false && @$language == false)
            {
               echo 'style="height:220px;">
               <style>
               @keyframes contentanim
               {
                  0%
                  {
                     top: 30%;
                     opacity: 0;
                  }
                  100%
                  {
                     top: 45%;
                     opacity: 1;
                  }
               }
               </style>';
            }
            else
            {
               echo '>';
            }
            if(@$banner)
            {
               echo '<img class="content-banner" src="../img/students/banners/'.@$banner.'">
               <div class="content-banner-transition"></div>';
            }
        ?>
            
            <div class="details">
               <div class="student" translate="no">
                  <?php
                     if(@$img !== "default-student.png")
                     {
                        echo '<img class="bannerLogo" id="closePıc" src="../img/students/'.@$img.'">';
                     }
                  ?>
                  <img 
                  <?php
                     if(@$img === "default-student.png")
                     {
                        echo 'style="filter: invert(0.5) brightness(200%);"';
                     }
                  ?> 
                  id="closePıc" src="../img/students/<?php echo @$img; ?>">
                  <?php
                     if(@$id == 0)
                     {
                        echo '<div class="verify">
                                 <img src="../img/tools/verify.png">
                                 <div class="verify-about">
                                    <p>Sayfanın Yaratıcısı</p>
                                 </div>
                              </div>';
                     }
                  ?>
                  <div class="student-info">
                     <div class="title">
                        
                        <h1><?php echo @$name_surname; ?></h1>
                        <h2>@<?php echo @$username; ?></h2>
                        <?php
                           if(@$class === "Mezun")
                           {
                              echo '<span style="background-color: rgba(255, 255, 255, 0.25); box-shadow: 30px -30px 0 30px rgba(255, 255, 255, 0.25);">'.@$class.'</span>
                              <style>
                              .title span
                              {
                                 top: -22px;
                                 right:-58px;
                              }
                              @media (max-width:1585px)
                              {
                                 .title span
                                 {
                                    top: -16px;
                                    right: -52px;
                                 }
                              }
                              </style>';
                           }
                           else
                           {
                              echo '<span>' . htmlspecialchars($class) . '</span>';
                           }
                        ?>
                        <div class="links" id="links">
                           <?php
                              if(@$domain)
                              {
                                 if(strpos($domain,".") !== false)
                                 {
                                    echo '<a target="_blank" href="https://'.@$domain.'"><g translate="yes">İnternet Sitesi</g></a>';
                                 }
                              }
                              if(@$social)
                              {
                                 if(strpos($social,".") !== false)
                                 {
                                    if(strpos($social,"https://") !== false)
                                    {
                                       $social = explode("https://",$social);
                                       $social = $social[1];
                                    }
                                    if(strpos($social,"www.") === false)
                                    {
                                       @$social = "www.".@$social;
                                    }
                                    $socialcut = explode("." , $social);
                                    echo '<a target="_blank" href="https://'.@$social.'"><g translate="yes">'.$socialcut[1].'</g></a>';
                                 }
                              }
                              if(@$email)
                              {
                                 if(strpos($email,".") !== false && strpos($email,"@") !== false)
                                 {
                                    echo '<a target="_blank" href="mailto:'.@$email.'"><g translate="yes">E-Mail</g></a>';
                                 }
                              }
                              if(@$cv) {
                                 echo '<a class="mycv" target="_blank" href="../img/students/cv/'.$cv.'"><g translate="no">CV</g></a>';
                              }                              
                           ?>
                        </div>
                     </div>
                     <div class="other">
                        <div class="about">
                           <?php
                              if(@$about)
                              {
                                 echo '<h4 translate="yes">Hakkımda</h4>';

                                 $aboutWithLinks = preg_replace('/(https?:\/\/[^\s]+)/', '{{link:$1}}', $about);
                                 $aboutWithLinks = preg_replace('/(^|\s)(www\.[^\s]+)/', '$1{{link:https://$2}}', $aboutWithLinks);

                                 $aboutWithSpecialChars = htmlspecialchars($aboutWithLinks, ENT_NOQUOTES, 'UTF-8');

                                 $aboutWithLinks = preg_replace('/{{link:(.*?)}}/', '<a href="$1" target="_blank">$1</a>', $aboutWithSpecialChars);

                                 echo '<p class="us">' . nl2br($aboutWithLinks) . '</p>';
                              }
                           ?>
                        </div>
                        <?php
                           if(@$language)
                           {
                              //computer
                              echo '<div class="language" id="language">';
                              if(strpos($language,",") !== false)
                              {
                                 $cutlanguage = explode(",",$language);
                                 foreach($cutlanguage  as $lan)
                                 {
                                    $txtlan = $lan;
                                    if ($lan[0] === " ") {
                                       $lan = substr($lan, 1);
                                   }
                                   $encodedLan = urlencode($lan);
                                   echo '<a href="https://www.google.com/search?q='.$encodedLan.'" target="_blank">'.$txtlan.'</a>';
                                 }
                              }
                              else
                              {
                                 $encodedLan = urlencode($language);
                                 echo '<a href="https://www.google.com/search?q='.$encodedLan.'" target="_blank">'.$language.'</a>';
                              }
                              echo '</div>';

                              //mobile
                              echo '<div class="languagemenu" id="languagemenu">
                                       <button onclick="showlanguage();"><i class="fa-solid fa-code"></i></button>
                                    </div>';
                           }
                        ?>
                     </div>
                  </div>
               </div>
            </div>
        </div>
    </div>
   <?php
      if(@$id != 0)
      {
         echo '<footer>
                  <p class="trinsyca"><g>Created by </g><a href="TrinsyCa">TrinsyCa </a></p> <!-- Signature : Ömer İslamoğlu ~ https://trinsyca.com -->
               </footer>';
      }
   ?>



    <script src="../scripts/page.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../scripts/user.js"></script>
</body>
</html>