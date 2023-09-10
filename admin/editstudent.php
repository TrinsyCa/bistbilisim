<?php
session_start();
ob_start();
include("connection.php");
include("linkfunc.php");
if (!isset($_SESSION["giris"])) {
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
    @$id = @$_GET["id"];
    $usercheck = $db->prepare("SELECT username FROM students WHERE id = ?");
    $usercheck->execute([$id]);
    $userchecking = $usercheck->fetchAll(PDO::FETCH_ASSOC);
    @$old_username = $userchecking[0]["username"];
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli | Bist Bilişim</title>

    <link rel="shortcut icon" href="../img/logo/BIST_Icon.png">

</head>

<body>
    <div class="wrapper">
        <?php include_once 'sidebar.php'; ?>
        <link rel="stylesheet" href="students.css">
        <div class="content">
            <div class="title">
                <h1>Öğrenci Düzenle</h1>
                <div style="display:flex; align-items:center; gap: 10px;">
                    <a href="students.php"><i class="fa-solid fa-users"></i>&nbsp; Öğrenciler</a>
                    <i onmouseover="help_over();" onmouseout="help_out();" class="fa-solid fa-circle-question question"></i>
                    <div id="question-box">
                        <p>Resim Formatları</p>
                        <p><?php echo htmlspecialchars('PNG , JPEG , WEBP'); ?></p>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                        $id = $_GET["id"];
                        $vericek = $db->prepare("SELECT * FROM students WHERE id = ?");
                        $vericek->execute([$id]);
                        $veri = $vericek->fetch(PDO::FETCH_ASSOC);
                        $oldimg = "../img/students/".$veri["img"];
                        
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
                            if($veri["img"] || $veri["img"] == "default-student.png")
                            {
                                $resim = $veri["img"];
                            }
                            else
                            {
                                if(!file_exists($oldimg))
                                {
                                    die("Dosya Bulunmuyor");
                                }
                                $imgsil = unlink($oldimg);
                                $resim = "default-student.png";
                            }
                        }
                        else if($type != "image/jpeg" && $type != "image/png" && $type != "image/webp" && $link != ".jpg")
                        {
                           echo "Yalnızca JPEG , PNG , WEBP formatında olabilir !";
                           exit();
                        }
                        move_uploaded_file($tmp_name, "$klasor/$resim");
                    
                        @$id = $_GET["id"];
                        @$name_surname = $_POST["name_surname"];
                        @$username = $_POST["username"];
                        @$pass = $_POST["pass"];
                        @$domain = $_POST["domain"];
                        @$class = $_POST["class"];
                        @$social = $_POST["social"];
                        @$language = $_POST["language"];
                        @$about = $_POST["about"];

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
                            if(strlen(trim((@$username))) > 30)
                            {
                               echo '<p class="alert alert-danger">Kullanıcı En Fazla 30 karakter Olabilir !</p>';
                            }
                          	if(empty(trim(@name_surname)))
                            {
                                echo '<p class="alert alert-danger">Ad Soyad Boş Bırakılamaz</p>';
                            }
                            if(strlen(trim(@$pass)) <= 5)
                            {
                                echo '<p class="alert alert-danger">Şifre En Az 6 Karakter Olabilir !</p>';
                            }
                            else
                            {
                                if(empty(trim(@$name_surname)) || empty(trim(@$pass)))
                                {
                                    header("Refresh:2; url=editstudent.php?id=$id");
                                }
                        
                                else
                                {
                                    $guncelle = $db->prepare("UPDATE students SET name_surname = ? , username = ? , pass = ? , domain = ? , class = ? , img = ? , social = ? , about = ? , language = ? WHERE id = ?");
                                    $guncelle->execute([@$name_surname, @$username, @$pass, @$domain, @$class ,  @$resim , @$social , @$about , @$language , @$id]);
                        
                                    header("Refresh:0; url=students.php");
                                }
                            }
                        }
                    }

                    if (@$_GET) {
                        $id = $_GET["id"];
                        if($id == 0)
                        {
                            echo 'Sayfa Kurucusunun Bilgilerini Değiştiremezsiniz !';
                            header("Refresh:3; url=students.php");
                        }
                        else
                        {
                            $vericek = $db->prepare("SELECT * FROM students WHERE id = ?");
                            $vericek->execute([$id]);
                            $veri = $vericek->fetch(PDO::FETCH_ASSOC);

                            if($veri)
                            {
                                echo '
                                <form action=""method="post" enctype="multipart/form-data" style="user-select:none; padding-bottom: 15px;">
                                    <strong>Ad Soyad : </strong>
                                    <input type="text" value="'.$veri["name_surname"].'" maxlength="30" name="name_surname" class="form-control">
                                    <br>
                                    <strong>Kullanıcı Adı : </strong>
                                    <input type="text" value="'.$veri["username"].'" maxlength="30" name="username" class="form-control">
                                    <br>
                                    <strong>Şifre : </strong>
                                    <input type="text" value="'.$veri["pass"].'" maxlength="50" name="pass" class="form-control">
                                    <br>
                                    <strong>Domain : </strong>
                                    <input type="text" value="'.$veri["domain"].'" maxlength="150" name="domain" class="form-control">
                                    <br>
                                    <strong>Resim : </strong>
                                    <input type="file" name="yukle_resim" class="form-control" accept="image/*">
                                    <br>
                                    <strong>Sosyal Medya : </strong>
                                    <input type="text" value="'.$veri["social"].'" maxlength="150" name="social" class="form-control">
                                    <br>
                                    <strong>Programlama Dilleri (Her Dil Arasına Virgül "," Ekleyiniz) : </strong>
                                    <input type="text" value="'.$veri["language"].'" maxlength="150" name="language" class="form-control">
                                    <br>
                                    <strong>Hakkında : </strong>
                                    <textarea cols="20" rows="4" maxlength="350" name="about" class="form-control" id="subject">'.@$about.'</textarea>
                                    <br>
                                    <input type="text" name="class" value="'.$veri["class"].'" id="class" class="form-control" style="user-select:none; display:none; pointer-events:none;">
                                    <div style="display:flex; justify-content: space-between; align-items:center; position:relative;">
                                        <div class="btn-group dropend class">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="classemote" data-bs-toggle="dropdown" aria-expanded="false">
                                                '.$veri["class"].'
                                            </button>
                                            
                                            <ul class="dropdown-menu dropdown-menu-dark add-student-class">';
                                                $vericlasses = $db->prepare("SELECT * FROM classes ORDER BY class DESC");
                                                $vericlasses->execute();
                                                $classes = $vericlasses->fetchAll(PDO::FETCH_ASSOC);

                                                foreach($classes as $row) {
                                                    echo '<li>
                                                            <a onclick="changeFilter(\''.$row["class"].'\');" class="dropdown-item">'.$row["class"].'</a>
                                                            </li>';
                                                }
                                            echo '</ul>
                                        </div>
                                        <script>
                                            function changeFilter(filterValue)
                                            {
                                                var ke = document.getElementById("classemote");
                                                var k = document.getElementById("class");
                                                
                                                ke.innerHTML = filterValue;
                                                k.value = filterValue;
                                            }
                                        
                                        </script>
                                    <div>
                                    <input type="submit" value="Güncelle" class="btn btn-outline-primary">
                                </form>
                                ';
                            }
                            else
                            {
                                echo 'ID : '.$id.' Numaralı Bir Öğrenci Bulunamadı...';
                                header("Refresh:3; url=students.php");
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.querySelector("nav").classList.remove("bg-primary");
   document.querySelector(".menus").classList.remove("bg-primary");

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