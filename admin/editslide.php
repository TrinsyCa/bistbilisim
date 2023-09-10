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
    $vericek = $db->prepare("SELECT * FROM slider WHERE id = ?");
    $vericek->execute([$id]);
    $veri = $vericek->fetch(PDO::FETCH_ASSOC);
    $oldimg = "../img/slider/".$veri["img"];

    $klasor = "../img/slider/";
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
        if($veri["img"])
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
        }
    }
    else if($type != "image/jpeg" && $type != "image/png" && $type != "image/webp" && $link != ".jpg")
    {
       echo "Yalnızca JPEG , PNG , WEBP formatında olabilir !";
       exit();
    }
    move_uploaded_file($tmp_name, "$klasor/$resim");

    $id = $_GET["id"];
    $title = $_POST["title"];
    $text = $_POST["text"];

    if(empty(trim(@$resim)))
    {
        header("Refresh:0; url=editslide.php?id="+$id);
    }

    $guncelle = $db->prepare("UPDATE slider SET title = ?, text = ? , img = ? WHERE id = ?");
    $guncelle->execute([$title, $text, $resim , $id]);

    header("Location: slider.php");
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
        <div class="content">
            <div class="title">
                <h1>Slide Düzenle</h1>
                <div style="display:flex; align-items:center; gap: 10px;">
                    <a href="news.php"><i class="fa-solid fa-newspaper"></i>&nbsp; Haberler</a>
                    <i onmouseover="help_over();" onmouseout="help_out();" class="fa-solid fa-circle-question question"></i>
                    <div id="question-box">
                        <p>Resim Formatları</p>
                        <p><?php echo htmlspecialchars('PNG , JPEG , WEBP'); ?></p>
                        <hr>
                        <p>Maksimum Başlık Uzunluğu</p>
                        <p><?php echo htmlspecialchars('[100 Karakter]'); ?></p>
                        <hr>
                        <p>Maksimum Yazı Uzunluğu</p>
                        <p><?php echo htmlspecialchars('[100 Karakter]'); ?></p>
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
                        $vericek = $db->prepare("SELECT * FROM slider WHERE id = ?");
                        $vericek->execute([$id]);
                        $veri = $vericek->fetch(PDO::FETCH_ASSOC);

                        echo '
                        <form method="post" enctype="multipart/form-data" style="user-select:none; padding-bottom: 15px;">
                            <strong>Başlık : </strong>
                            <input type="text" maxlength="110" name="title" class="form-control" value="' . $veri["title"] . '">
                            <br>
                            <strong>Yazı : </strong>
                            <input type="text" maxlength="125" name="text" class="form-control" value="' . $veri["text"] . '">
                            <br>
                            <strong>Resim : </strong>
                            <input type="file" name="yukle_resim" class="form-control" accept="image/*">
                            <br>
                            <div style="display:flex; justify-content:end;">
                                <input type="submit" value="Güncelle" class="btn btn-outline-primary">
                            </div>
                        </form>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
   var slider = document.getElementById("slider");

   slider.classList.add("active-menu");
</script>
    <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
</body>

</html>
