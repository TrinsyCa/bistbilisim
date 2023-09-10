<?php
session_start();
ob_start();
if (!isset($_SESSION["giris"])) {
    hheader("HTTP/1.0 404 Not Found");
    include($_SERVER['DOCUMENT_ROOT'] . "/bistbilisim.com/404.html");
    return;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    include("connection.php");
    include("linkfunc.php");

    $id = $_GET["id"];
    $vericek = $db->prepare("SELECT * FROM teachers WHERE id = ?");
    $vericek->execute([$id]);
    $veri = $vericek->fetch(PDO::FETCH_ASSOC);
    $oldimg = "../img/teachers/".$veri["img"];

    $klasor = "../img/teachers/";
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
        if($veri["img"] || $veri["img"] == "default-teacher.png")
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
            $resim = "default-teacher.png";
        }
    }
    else if($type != "image/jpeg" && $type != "image/png" && $type != "image/webp" && $link != ".jpg")
    {
       echo "Yalnızca JPEG , PNG , WEBP formatında olabilir !";
       exit();
    }
    move_uploaded_file($tmp_name, "$klasor/$resim");

    $id = $_GET["id"];
    $name_surname = $_POST["name_surname"];
    $fields = $_POST["fields"];
    $social = $_POST["social"];

    if(empty(trim(@$name_surname)))
    {
       header("Refresh:0; url=editteacher.php?id=$id");
    }

    else
    {
        $guncelle = $db->prepare("UPDATE teachers SET name_surname = ?, fields = ? , social = ? , img = ? WHERE id = ?");
    $guncelle->execute([$name_surname, $fields , $social , $resim , $id]);

    header("Location: teachers.php");
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

    <style>
        .author_href {
            font-size: 22px;
            color: #ADB5BD;
            text-decoration: none;
            transition: 0.35s;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php include_once 'sidebar.php'; ?>
        <div class="content">
            <div class="title">
                <h1>Öğretmen Düzenle</h1>
                <div style="display:flex; align-items:center; gap: 10px;">
                    <a href="teachers.php"><i class="fa-solid fa-chalkboard-user"></i>&nbsp; Öğretmenler</a>
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
                        $vericek = $db->prepare("SELECT * FROM teachers WHERE id = ?");
                        $vericek->execute([$id]);
                        $veri = $vericek->fetch(PDO::FETCH_ASSOC);

                        if($veri)
                        {
                            echo '
                        <form action=""method="post" enctype="multipart/form-data" style="user-select:none; padding-bottom: 15px;">
                            <strong>Ad Soyad : </strong>
                            <input type="text" value="'.$veri["name_surname"].'" maxlength="18" name="name_surname" class="form-control">
                            <br>
                            <strong>Çalıştığı Alanlar ( , ) : </strong>
                            <input type="text" value="'.$veri["fields"].'" maxlength="150" name="fields" class="form-control">
                            <br>
                            <strong>Sosyal Medya Hesabi (LinkedIn Önerilir) : </strong>
                            <input type="text" value="'.$veri["social"].'" maxlength="150" name="social" class="form-control">
                            <br>
                            <strong>Resim : </strong>
                            <input type="file" name="yukle_resim" class="form-control" accept="image/*">
                            <br>
                            <div style="display:flex; justify-content:space-between">
                                <div></div>
                                <div style="display:flex; gap: 8px;">
                                    <a href="teachers.php" class="btn btn-outline-primary">İptal</a>
                                    <input type="submit" name="duzenle" value="Güncelle" class="btn btn-outline-primary">
                                </div>
                            </div>
                        </form>
                        ';
                        }
                        else
                        {
                            echo 'ID : '.$id.' Numaralı Bir Öğretmen Bulunamadı...';
                            header("Refresh:3; url=teachers.php");
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
        var confirmation = confirm("Bilgileri değiştirmek istediğinizden emin misiniz?");
        if (!confirmation) {
            event.preventDefault();
        }
        });

        document.addEventListener('keydown', function(event) 
        {
            if (event.key === 'Escape') {
                window.location.href = 'teachers.php';
            }
        });

   var teachers = document.getElementById("teachers");

   teachers.classList.add("active-menu");
</script>
    <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
</body>

</html>
