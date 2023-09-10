<?php
session_start();
if (!isset($_SESSION["giris"])) {
    header("Refresh: 0; url=login.php");
    return;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("connection.php");
    include("linkfunc.php");

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

    if(empty(trim(@$name_surname)) || empty(trim(@$class)))
    {
       header("Refresh:0; url=editstudent.php?id=$id");
    }

    else
    {
        $guncelle = $db->prepare("UPDATE students SET name_surname = ? , username = ? , pass = ? , domain = ? , class = ? , img = ? WHERE id = ?");
        $guncelle->execute([@$name_surname, @$username, @$pass, @$domain, @$class ,  @$resim , @$id]);

        header("Location: students.php");
    }
    exit;
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
                        <p>Alanları Eklerken Aralara ( , ) Koyunuz</p>
                        <p><?php echo htmlspecialchars('[Web Programlama , Robotik Kodlama]'); ?></p>
                        <hr>
                        <p>Maksimum İlk 3 Alan Gözükecektir</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    include("connection.php");
                    include("linkfunc.php");

                    if (@$_GET) {
                        $id = $_GET["id"];
                        $vericek = $db->prepare("SELECT * FROM students WHERE id = ?");
                        $vericek->execute([$id]);
                        $veri = $vericek->fetch(PDO::FETCH_ASSOC);

                        echo '
                        <form action=""method="post" enctype="multipart/form-data" style="user-select:none; padding-bottom: 15px;">
                            <strong>Ad Soyad : </strong>
                            <input type="text" value="'.$veri["name_surname"].'" maxlength="18" name="name_surname" class="form-control">
                            <br>
                            <strong>Kullanıcı Adı : </strong>
                            <input type="text" value="'.$veri["username"].'" maxlength="30" name="username" class="form-control">
                            <br>
                            <strong>Şifre : </strong>
                            <input type="text" value="'.$veri["pass"].'" maxlength="30" name="pass" class="form-control">
                            <br>
                            <strong>Domain : </strong>
                            <input type="text" value="'.$veri["domain"].'" maxlength="150" name="domain" class="form-control">
                            <br>
                            <strong>Resim : </strong>
                            <input type="file" name="yukle_resim" class="form-control" accept="image/*">
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
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.querySelector("nav").classList.remove("bg-primary");
   document.querySelector(".menus").classList.remove("bg-primary");

   var students = document.getElementById("students");

   students.classList.add("active-menu");
</script>
    <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
</body>

</html>