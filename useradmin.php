<?php
    session_start();
    ob_start();
    include("admin/connection.php");
    @$username = @$_GET["username"];
    if(@$_SESSION["student"] == false || @$_SESSION["username"] != @$username)
    {
      header("Location: ../../admin/login.php");
      return;
    }
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
      @$about = $row["about"];
      @$language = $row["language"];

      @$old_info = array(
         "id" => $row["id"],
         "name_surname" => $row["name_surname"],
         "username" => $row["username"],
         "pass" => $row["pass"],
         "img" => $row["img"],
         "banner" => $row["banner"],
         "cv" => $row["cv"],
         "domain" => $row["domain"],
         "social" => $row["social"],
         "email" => $row["email"],
         "class" => $row["class"],
         "about" => $row["about"],
         "language" => $row["language"]
      );
    }

    if(!$islem)
    {
        echo '<title>Kullanıcı Bulunamadı | Bist Bilişim</title>';
        header("Refresh:1; url=../../");
    }
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if($islem) echo $username.' - Admin | Bist Bilişim'; ?></title>
    <link rel="shortcut icon" href="../../img/logo/BIST_Icon.png">
    <link rel="stylesheet" href="../../css/useradmin.css ">

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
         <a href="../../">
            <img src="../../img/logo/BIST_Logo_Beyaz.png">
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
                  <a class="menu-link" href="../../">Anasayfa</a>
               </li>
               <li>
                  <a class="menu-link" href="../../news/">Haberler</a>
               </li>
               <li>
                  <a class="menu-link" href="../../students/">Öğrenciler</a>
               </li>
               <li>
                  <a class="menu-link" href="../../teachers/">Öğretmenler</a>
               </li>
               <li>
                  <a class="menu-link" href="../../gallery/">Galeri</a>
               </li>
               <li>
                  <a class="menu-link" href="../../contact/">İletişim</a>
               </li>
              <li>
                    <a class="menu-link" href="../<?php echo @$username; ?>"><i class="fa-solid fa-user"></i> Profil</a>
               </li>
               <li>
                    <a class="menu-link" href="../../logout.php"><i class="fa-solid fa-power-off"></i></a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
    <div class="wrapper">
        <div class="content">
            <div class="title">
                <?php echo "<h1>".$_SESSION["username"]."</h1>"; ?>
            </div>
            <div class="details">
               <div class="student">
                  <form class="form" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
                     <?php
                        if(isset($_SESSION["student"]) && @$islem == true)
                        {
                           if(isset($_POST["clear_banner"]))
                           {
                              $upload = $db->prepare("UPDATE students SET banner = ? WHERE id = ?");
                              $upload->execute(["", $id]);   
                              if($upload)
                              {
                                 $documents = $db->prepare("INSERT INTO documents SET source = ? , doc = ?");
                                 $source = "banner";
                                 $documents->execute([$source,$old_info["banner"]]);

                                 header("Location: ../".$username."");
                              }
                              exit();
                           }
                           if(isset($_POST["clear_cv"]))
                           {
                              $upload = $db->prepare("UPDATE students SET cv = ? WHERE id = ?");
                              $upload->execute(["", $id]);   
                              if($upload)
                              {
                                 $documents = $db->prepare("INSERT INTO documents SET source = ? , doc = ?");
                                 $source = "cv";
                                 $documents->execute([$source,$old_info["cv"]]);

                                 header("Location: ../".$username."");
                              }
                              exit();
                           }
                           if(isset($_POST["main_button"]))
                           {
                              $vericek = $db->prepare("SELECT * FROM students WHERE username = ?");
                              $vericek->execute([$username]);
                              $veri = $vericek->fetch(PDO::FETCH_ASSOC);

                              $fileError = '<style>
                              .error-txt
                              {
                                 width:100%;
                                 text-align:center;
                                 display:flex;
                                 justify-content:center;
                              }
                              </style>
                              <script src="../../scripts/page.js"></script>'.header("Refresh:5; url=./".$username);                              
                              // Profile Pic
                              $klasor = "img/students/";
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
                              if (strlen($name) == 0) {
                                 if ($veri["img"] || $veri["img"] == "default-student.png") {
                                    $resim = $veri["img"];
                                 }
                              } else if (
                                 $type != "image/jpeg" && 
                                 $type != "image/png" && 
                                 $type != "image/webp" && 
                                 $link != ".jpg"
                              ) {
                                 echo "Yalnızca JPEG, PNG, WEBP formatında olabilir!";
                                 echo $fileError;
                                 exit();
                              }

                              // Dosya boyutu kontrolü (3 MB)
                              $maxFileSize = 3 * 1024 * 1024; // 3 MB = 3 * 1024 KB = 3 * 1024 * 1024 bayt
                              if ($size > $maxFileSize) {
                                 echo '<p class="error-txt">Profil Resmi Dosya Boyutu 3 MB\'dan Büyük Olamaz!';
                                 echo $fileError;
                                 exit();
                              }

                              move_uploaded_file($tmp_name, "$klasor/$resim");

                              // Banner Pic
                              $klasor = "img/students/banners/"; 
                              $tmp_name = $_FILES["yukle_banner"]["tmp_name"];
                              $bannername = $_FILES["yukle_banner"]["name"];
                              $size = $_FILES["yukle_banner"]["size"];
                              $type = $_FILES["yukle_banner"]["type"];
                              $link = substr($name , -4 , 4);
                              $random1 = rand(1000000000000000000 , 5000000000000000000);
                              $random2 = rand(1000000000000000000 , 5000000000000000000);
                              $random3 = rand(1000000000000000000 , 5000000000000000000);
                              $random4 = rand(1000000000000000000 , 5000000000000000000);
                              $random5 = rand(1000000000000000000 , 5000000000000000000);
                              $randoms = $random1.$random2.$random3.$random4.$random5;
                              $banner = $randoms.$link;
                              if (strlen($bannername) == 0) {
                                 if ($veri["banner"] || $veri["banner"] == "") {
                                    $banner = $veri["banner"];
                                 }
                              } else if (
                                 $type != "image/jpeg" && 
                                 $type != "image/png" && 
                                 $type != "image/webp" && 
                                 $link != ".jpg"
                              ) {
                                 echo "Yalnızca JPEG, PNG, WEBP formatında olabilir!";
                                 echo $fileError;
                                 exit();
                              }

                              // Dosya boyutu kontrolü (3 MB)
                              $maxFileSize = 3 * 1024 * 1024; // 3 MB = 3 * 1024 KB = 3 * 1024 * 1024 bayt
                              if ($size > $maxFileSize) {
                                 echo '<p class="error-txt">Banner Resmi Dosya Boyutu 3 MB\'dan Büyük Olamaz!';
                                 echo $fileError;
                                 exit();
                              }

                              move_uploaded_file($tmp_name, "$klasor/$banner");

                              // CV
                              $klasor = "img/students/cv/"; 
                              $tmp_name = $_FILES["yukle_cv"]["tmp_name"];
                              $cvname = $_FILES["yukle_cv"]["name"];
                              $size = $_FILES["yukle_cv"]["size"];
                              $type = $_FILES["yukle_cv"]["type"];
                              $link = substr($name , -4 , 4);
                              $random1 = rand(1000000000000000000 , 5000000000000000000);
                              $random2 = rand(1000000000000000000 , 5000000000000000000);
                              $random3 = rand(1000000000000000000 , 5000000000000000000);
                              $random4 = rand(1000000000000000000 , 5000000000000000000);
                              $random5 = rand(1000000000000000000 , 5000000000000000000);
                              $randoms = $random1.$random2.$random3.$random4.$random5;
                              $cv = $randoms.$link;
                              if (strlen($cvname) == 0) {
                                 if ($veri["cv"] || $veri["cv"] == "") {
                                    $cv = $veri["cv"];
                                 }
                              } else if (
                                 $type != "image/jpeg" && 
                                 $type != "image/png" && 
                                 $type != "image/webp" && 
                                 $type != "application/pdf" && 
                                 $type != "application/msword" && 
                                 $type != "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                              ) {
                                 echo "Yalnızca JPEG, PNG, WEBP, PDF veya DOC formatında olabilir!";
                                 echo $fileError;
                                 exit();
                              }

                              // Dosya boyutu kontrolü (2 MB)
                              $maxFileSize = 2 * 1024 * 1024; // 2 MB = 2 * 1024 KB = 2 * 1024 * 1024 bayt
                              if ($size > $maxFileSize) {
                                 echo '<p class="error-txt">CV Dosya Boyutu 2 MB\'dan Büyük Olamaz!';
                                 echo $fileError;
                                 exit();
                              }

                              move_uploaded_file($tmp_name, "$klasor/$cv");

                              @$old_username = @$username;
                              @$old_pass = @$pass;
                              @$username = @$_POST["kullanici"];
                              @$name_surname = @$_POST["name_surname"];
                              @$domain = @$_POST["domain"];
                              @$social = @$_POST["social"];
                              @$email = @$_POST["email"];
                              @$about = @$_POST["about"];
                              @$language = @$_POST["language"];
                              $veriuser = $db->prepare("SELECT username FROM students WHERE username = ?");
                              $veriuser->execute([$username]);
                              $user = $veriuser->fetchAll(PDO::FETCH_ASSOC);
                              foreach ($user as $row)
                              {
                                 $veristudents = $db->prepare("SELECT COUNT(*) AS total FROM students WHERE username = ?");
                                 $veristudents->execute([$row["username"]]);
                                 $studentsCount = $veristudents->fetch(PDO::FETCH_ASSOC)['total'];
                              }
                              
                              if($studentsCount > 0 && $user[0]["username"] != $old_username)
                              {
                                 echo '<p class="alert alert-danger"><a href="../'.$user[0]["username"].'" target="_blank">'.$user[0]["username"].'</a> Adlı Kullanıcı Zaten Bulunuyor !</p>';
                              }
                              else
                              {
                                 if(strpos(@$domain , ".") !== false)
                                 {
                                    if(strpos($domain , "https://") !== false)
                                    {
                                       @$domaincut = explode("https://",@$domain);
                                       @$domain = @$domaincut[1];
                                    }
                                    if (substr(@$domain, -1) === "/") {
                                       @$domain = rtrim(@$domain, "/");
                                    }
                                 }
                                 else
                                 {
                                    @$domain = false;
                                 }
                                 if(strlen(trim((@$username))) < 3)
                                 {
                                    echo '<p class="alert alert-danger">Kullanıcı Adı En Az 3 , En Fazla 30 karakter Olabilir !</p>';
                                 }
                                 @$new_password = $_POST["new_password"];
                                 @$confirm_password = $_POST["confirm_password"];
                                 
                                 if(!empty($new_password) || !empty($confirm_password))
                                 {
                                    if (strlen(@$new_password) < 6) {
                                       echo '<p class="alert alert-danger">Şifre en az 6 karakter olmalıdır !</p>';
                                    }
                                    else if ($new_password != $confirm_password) {
                                       echo '<p class="alert alert-danger">Şifreler eşleşmiyor !</p>';
                                    }
                                    else if(@$_SESSION["student"] === "true")
                                    {
                                       $upload = $db->prepare("UPDATE students SET username = ?, pass = ? , img = ? , banner = ? , cv = ? , name_surname = ?, domain = ? , social = ? , email = ? , about = ? , language = ? WHERE username = ?");
                                       $upload->execute([$username, $confirm_password, $resim , $banner , $cv , $name_surname, $domain, $social , $email , $about , $language ,  $old_username]);   
                                       if($upload)
                                       {
                                          @$_SESSION["username"] = @$username;
                                          @$_SESSION["pass"] = @$confirm_password;
                                          header("Location: ../".$username."");

                                          @$new_info = array(
                                             "id" => $id,
                                             "name_surname" => $name_surname,
                                             "username" => $username,
                                             "pass" => $confirm_password,
                                             "img" => $resim,
                                             "banner" => $banner,
                                             "cv" => $cv,
                                             "domain" => $domain,
                                             "social" => $social,
                                             "email" => $email,
                                             "class" => $class,
                                             "about" => $about,
                                             "language" => $language
                                          );

                                          if(@$id != 0 && $new_info != $old_info)
                                          { 
                                             $history = $db->prepare("INSERT INTO history (user_id, username, pass, img, banner , cv , name_surname, domain, class, about, social, email , language) VALUES (?,?,?,?, ?, ? , ?, ?, ?, ?, ?, ?, ?)");
                                             $history->execute([$id, $username, $confirm_password, $resim, $banner , $cv , $name_surname, $domain, $class, $about, $social, $email, $language]);
                                          }
                                          $documents = $db->prepare("INSERT INTO documents SET source = ? , doc = ?");
                                          if (strlen($name) > 0 && $old_info["img"] != "" && $old_info["img"] != "default-student.png")
                                          {
                                             $source = "profile";
                                             $documents->execute([$source,$old_info["img"]]);
                                          }
                                          if (strlen($bannername) > 0)
                                          {
                                             $source = "banner";
                                             $documents->execute([$source,$old_info["banner"]]);
                                          }
                                          if (strlen($cvname) > 0)
                                          {
                                             $source = "cv";
                                             $documents->execute([$source,$old_info["cv"]]);
                                          }
                                       }
                                       exit();
                                    }
                                    else
                                    {
                                       echo '<p class="alert alert-warning">Lütfen Çıkış Yapıp Tekrar Deneyin</p>';
                                    }
                                 }     
                                 else if(@$_SESSION["student"] === "true")
                                 {
                                    $upload = $db->prepare("UPDATE students SET username = ? , img = ? , banner = ? , cv = ? , name_surname = ?, domain = ? , social = ? , email = ? , about = ? , language = ? WHERE username = ?");
                                    $upload->execute([$username, $resim , $banner , $cv , $name_surname, $domain, $social , $email , $about , $language , $old_username]);   
                                    if($upload)
                                    {
                                       @$_SESSION["username"] = @$username;
                                       header("Location: ../".$username."");

                                       $new_info = array(
                                          "id" => $id,
                                          "name_surname" => $name_surname,
                                          "username" => $username,
                                          "pass" => $old_pass,
                                          "img" => $resim,
                                          "banner" => $banner,
                                          "cv" => $cv,
                                          "domain" => $domain,
                                          "social" => $social,
                                          "email" => $email,
                                          "class" => $class,
                                          "about" => $about,
                                          "language" => $language
                                       );

                                       if(@$id != 0 && $new_info != $old_info)
                                       { 
                                       $history = $db->prepare("INSERT INTO history (user_id, username, pass, img, banner , cv, name_surname, domain, class, about, social, email, language) VALUES (?,?,?,?, ?, ? , ?, ?, ?, ?, ?, ?, ?)");
                                       $history->execute([$id, $username,$old_pass, $resim, $banner , $cv , $name_surname, $domain, $class, $about, $social, $email, $language]);
                                       }
                                       $documents = $db->prepare("INSERT INTO documents SET source = ? , doc = ?");
                                       if (strlen($name) > 0 && $old_info["img"] != "" && $old_info["img"] != "default-student.png")
                                       {
                                          $source = "profile";
                                          $documents->execute([$source,$old_info["img"]]);
                                       }
                                       if (strlen($bannername) > 0 && $old_info["banner"] != "")
                                       {
                                          $source = "banner";
                                          $documents->execute([$source,$old_info["banner"]]);
                                       }
                                       if (strlen($cvname) > 0 && $old_info["cv"] != "")
                                       {
                                          $source = "cv";
                                          $documents->execute([$source,$old_info["cv"]]);
                                       }
                                    }
                                    exit();
                                 }
                                 else
                                 {
                                    echo '<p class="alert alert-warning">Lütfen Çıkış Yapıp Tekrar Deneyin</p>';
                                 }
                              }
                           }
                        }
                     ?>
                     <?php
                        if(@$img != "default-student.png")
                        {
                           echo '<img class="bannerLogo" id="closePıc" src="../../img/students/'.@$img.'">';
                        }
                     ?>
                     <img 
                     <?php
                        if(@$img == "default-student.png")
                        {
                           echo 'style="filter: invert(0.5) brightness(200%);"';
                        }
                     ?> 
                     id="closePıc" src="../../img/students/<?php echo @$img; ?>">
                     <div class="file-wrapper">
                        <input type="file" onchange="closeShadow();" name="yukle_resim" accept="image/*" />
                     </div>
                     <div class="inputs" id="inputs">
                        <div class="inputBx">
                           <input type="text" value="<?php echo @$username; ?>" maxlength="30" name="kullanici" id="subject" required>
                           <i>Kullanıcı Adı</i>
                        </div>
                        <div class="inputBx">
                           <input type="password" name="new_password" id="new_password">
                           <i>Yeni Şifre</i>
                        </div>
                        <div class="inputBx">
                           <input type="password" name="confirm_password" id="confirm_password">
                           <i>Yeni Şifreyi Onayla</i>
                        </div>
                        <div class="inputBx">
                           <input type="text" value="<?php echo @$name_surname; ?>" maxlength="18" name="name_surname" id="subject" required>
                           <i>Ad Soyad</i>
                        </div>
                        <div class="inputBx">
                           <input type="text" value="<?php echo @$domain; ?>" maxlength="250" name="domain" id="subject">
                           <i>İnternet Sitesi</i>
                        </div>
                        <div class="inputBx">
                           <input type="text" value="<?php echo @$social; ?>" maxlength="250" name="social" id="subject">
                           <i>Sosyal Medya</i>
                        </div>
                        <div class="inputBx">
                           <input type="text" value="<?php echo @$email; ?>" maxlength="255" name="email" id="subject">
                           <i>E-Mail</i>
                        </div>
                        <div class="inputBx">
                           <input type="text" value="<?php echo @$language; ?>" maxlength="500" name="language" id="subject">
                           <i>Programlama Dilleri (Her Dil Arasına Virgül "," Ekleyiniz)</i>
                        </div>
                        <div class="inputBx">
                           <textarea cols="30" rows="10" maxlength="350" name="about" id="about"><?php echo @$about; ?></textarea>
                           <i>Hakkımda</i>
                        </div>
                        <div class="inputBx">
                           <input type="file" class="form-control" name="yukle_banner" id="subject">
                           <i>Banner</i>
                           <button type="submit" name="clear_banner" class="btn"><i class="fa-solid fa-x"></i></button>
                        </div>
                        <div class="inputBx">
                           <input type="file" class="form-control" name="yukle_cv" id="subject">
                           <i>CV</i>
                           <button type="submit" name="clear_cv" class="btn"><i class="fa-solid fa-x"></i></button>
                        </div>
                        <div class="inputBx" style="cursor:not-allowed;">
                           <input type="class" value="<?php echo @$class; ?>" maxlength="5" name="class" id="subject" required>
                           <i>Sınıf</i>
                        </div>
                        <div class="inputBx">
                           <div class="submitselection"></div>
                           <input type="submit" name="main_button" value="Güncelle">
                        </div>
                     </div>
                  </form>
                  <form id="clear_banner_form" method="post">
      <input type="hidden" name="clear_banner" value="1">
   </form>
   <form id="clear_cv_form" method="post">
      <input type="hidden" name="clear_cv" value="1">
   </form>
               </div>
            </div>
        </div>
    </div>
   <footer>
      <p class="trinsyca"><g>Created by </g><a href="https://trinsyca.bistbilisim.com/" target="_blank">TrinsyCa </a></p> <!--imza : Ömer İslamoğlu-->
   </footer>



    <script src="../../scripts/page.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../../scripts/useradmin.js"></script>
</body>
</html>