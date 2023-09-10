<?php
   include("connection.php");
   include("linkfunc.php");

   session_start();
   if(!isset($_SESSION["giris"]))
   {
      header("HTTP/1.0 404 Not Found");
      include($_SERVER['DOCUMENT_ROOT'] . "/bistbilisim.com/404.html");
      return;
   }
   if(@$_SESSION["role"] === "Moderatör")
                     {
                        echo 'Buraya Giriş Yetkiniz Bulunmamakta..';
                     }
                     else if(@$_SESSION["role"] === "Yönetici" || @$_SESSION["role"] === "rooter")
                     {
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
      #passbox
      {
         background:transparent;
         border:none;
      }
      #passbox:hover
      {
         text-decoration : underline;
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
   <link rel="stylesheet" href="students.css">
   <div class="content">
      <div class="title">
         <h1>Öğrenci Ekle</h1>
         <div style="display:flex; align-items:center; gap: 10px;">
            <a href="students.php"><i class="fa-solid fa-users"></i>&nbsp; Öğrenciler</a>
            <i onmouseover="help_over();" onmouseout="help_out();" class="fa-solid fa-circle-question question"></i>
            <div id="question-box">
                <p>Resim Formatları</p>
                <p><?php echo htmlspecialchars('PNG , JPEG , WEBP'); ?></p>
                <hr>
                <p>Maksimum Ad Soyad</p>
                <p><?php echo htmlspecialchars('[30 Karakter]'); ?></p>
            </div>
         </div>
      </div>
      <div class="row">
      <div class="col-lg-12">
            <?php
               if(@$_POST)
               {
                  $klasor = "../img/students/";
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
                    $resim = "default-student.png";
                  }
                  else if($type != "image/jpeg" && $type != "image/png" && $type != "image/webp" && $link != ".jpg")
                  {
                     echo "Yalnızca JPEG , PNG , WEBP formatında olabilir !";
                     header("Refresh:2; url=addstudent.php");
                     exit();
                  }
                  move_uploaded_file($tmp_name, "$klasor/$resim");

                  @$name_surname = htmlspecialchars(@$_POST["name_surname"]);
                  @$domain = strtolower(htmlspecialchars(@$_POST["domain"]));
                  @$pass = "";
                  $uzunluk = 6;
                  @$class = htmlspecialchars(@$_POST["class"]);
                  @$userexp = explode(".",@$domain);
                  @$username = @$userexp[0];
                  $veriuser = $db->prepare("SELECT * FROM students WHERE username = ?");
                  $veriuser->execute([$username]);
                  $user = $veriuser->fetchAll(PDO::FETCH_ASSOC);
                  
                  if($user && $user["username"] != "")
                  {
                     echo '<p class="alert alert-danger">Bu Kullanıcı Zaten Bulunuyor ! Lütfen <a href="editstudent.php?id='.$user[0]["id"].'">'.$user[0]["username"].'</a>\'in kullanıcı adını değiştirin.</p>';
                  }
                  else
                  {
                     if(empty(trim(@$name_surname)) || empty(trim(@$class)))
                     {
                        echo '<p class="alert alert-warning">Lütfen Ad Soyad ve Sınıfı Boş Bırakmayınız..</p>';
                        header("Refresh:1; url=addstudent.php");
                     }
                     else
                     {
                        //şifre oluşturma
                        $uzunluk = 6;
                        $karakterler = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

                        for ($i = 0; $i < $uzunluk; $i++) {
                           $rastgeleIndex = rand(0, strlen($karakterler) - 1);
                           @$pass .= $karakterler[$rastgeleIndex];
                        }

                        $veriekle = $db->prepare("INSERT INTO students SET name_surname = ? , domain = ? , img = ? , class = ? , username = ? , pass = ?");
                        $veriekle -> execute([
                           @$name_surname,
                           @$domain,
                           @$resim,
                           @$class,
                           @$username,
                           @$pass
                        ]);
                        if($veriekle)
                        {
                           echo '<p class="alert alert-success">
                              Öğrenci Başarıyla Eklendi
                              <br>
                              <button id="passbox" onclick="copy(\''.@$name_surname.'\', \''.@$username.'\', \''.@$pass.'\');">Bilgileri Kopyala</button>
                           </p>';
                        }
                        else
                        {
                           echo '<p class="alert alert-danger">Öğrenci Ekleme İle İlgili Bir Sorun Oluştu</p>';
                           header("Refresh:3; url=./");
                        }
                     }
                  }
               }
            ?>
            <form action=""method="post" enctype="multipart/form-data" style="user-select:none; padding-bottom: 15px;">
               <strong>Ad Soyad : </strong>
               <input type="text" maxlength="30" name="name_surname" class="form-control">
               <br>
               <strong>Domain : </strong>
               <input type="text" maxlength="150" name="domain" class="form-control">
               <br>
               <strong>Resim : </strong>
               <input type="file" name="yukle_resim" class="form-control" accept="image/*">
               <br>
               <?php
                  if(isset($_GET["class"])) 
                  {
                     $classdb = $db->prepare("SELECT * FROM classes WHERE class = ?");
                     $classdb->execute([$_GET["class"]]);
                     $myClass = $classdb->fetchAll(PDO::FETCH_ASSOC);

                     if($myClass)
                     {
                        $myValue = $_GET["class"];
                     }
                     else
                     {
                        header("location:addstudent.php");
                     }
                  }
                  else
                  {
                     $myValue = "";
                  }
               ?>
               <input type="text" name="class" id="class" class="form-control" style="user-select:none; display:none; pointer-events:none;" value="<?php echo $myValue; ?>">
                  <div style="display:flex; justify-content: space-between; align-items:center; position:relative;">
                  <div class="btn-group dropend class">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="classemote" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-grip"></i>&nbsp; Sınıf
                     </button>
                     
                     <ul class="dropdown-menu dropdown-menu-dark add-student-class">
                        <?php
                           $vericlasses = $db->prepare("SELECT *, 
                           SUBSTRING_INDEX(class, '/', 1) AS class_number, 
                           SUBSTRING_INDEX(class, '/', -1) AS class_name 
                           FROM classes 
                           ORDER BY (class = 'Mezun') ASC, 
                                    class_number DESC, 
                                    class_name ASC");
                           $vericlasses->execute();
                           $classes = $vericlasses->fetchAll(PDO::FETCH_ASSOC);

                           foreach($classes as $row) {
                              echo '<li>
                                       <a onclick="changeFilter(\''.$row["class"].'\');" class="dropdown-item">'.$row["class"].'</a>
                                    </li>';
                           }
                        ?>
                     </ul>
                  </div>
                  <script>
                     function changeFilter(filterValue) {
                     var ke = document.getElementById("classemote");
                     var k = document.getElementById("class");

                     ke.innerHTML = filterValue;
                     k.value = filterValue;

                     // Tıklama işlemi gerçekleştirildiğinde sayfanın get değerini güncelle
                     var currentURL = new URL(window.location.href);
                     currentURL.searchParams.set('class', filterValue);
                     history.pushState({}, '', currentURL);
                  }

                  var initialClass = document.getElementById("class").value;
                  if (initialClass === "") {
                     document.getElementById("classemote").innerHTML = '<i class="fa-solid fa-grip"></i>&nbsp; Sınıf';
                  } else {
                     changeFilter(initialClass);
                  }
                  </script>

                  <div>
               </div>
               <input type="submit" value="Ekle" class="btn btn-outline-primary">
            </form>
         </div>
      </div>
   </div>
</div>
<script>
   document.querySelector("nav").classList.remove("bg-primary");
   document.querySelector(".menus").classList.remove("bg-primary");

   function copy(name, username, password)
   {
      var text = 'https://bistbilisim.com/admin/\n\n'+ name + '\nKullanıcı Adı: ' + username + '\nŞifre: ' + password;
   
      navigator.clipboard.writeText(text)
         .then(function() {
               alert("Bilgiler panoya kopyalandı");
         })
         .catch(function(error) {
               console.error("Bilgiler kopyalanamadı: ", error);
         });
   }

   document.addEventListener('keydown', function(event) 
        {
            if (event.key === 'Escape') {
                window.location.href = 'students.php';
            }
        });

   var students = document.getElementById("students");

   students.classList.add("active-menu");
</script>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
</body>
</html>
<?php } ?>