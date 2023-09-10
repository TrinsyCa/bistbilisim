<?php
session_start();
ob_start();
if (!isset($_SESSION["giris"])) {
    header("Refresh: 0; url=login.php");
    return;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("connection.php");
    include("linkfunc.php");

    $id = $_GET["id"];
    $isim = $_POST["isim"];
    $adsoyad = $_POST["adsoyad"];
    $sifre = $_POST["sifre"];
    $god_mode = $_POST["god_mode"];
    
    $guncelle = $db->prepare("UPDATE admin SET isim = ?, adsoyad = ?, sifre = ? , god_mode = ? WHERE id = ?");
    $guncelle->execute([$isim, $adsoyad, $sifre , $god_mode , $id]);

    header("Location: admins.php");
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
                <h1>Yönetici</h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    include("connection.php");
                    include("linkfunc.php");

                    if (@$_GET) {
                        @$id = @$_GET["id"]; 
                        if(@$_SESSION["id"] == @$_GET["id"] || @$_SESSION["god_mode"] == 1)
                        {
                           $vericek = $db->prepare("SELECT * FROM admin WHERE id = ?");
                           $vericek->execute([$id]);
                           $veri = $vericek->fetch(PDO::FETCH_ASSOC);

                           if(@$_SESSION["god_mode"] == 1)
                           {
                            echo '
                           <form method="post" style="user-select:none;">
                              <strong>Kullanıcı Adı : </strong>
                              <input type="text" name="isim" class="form-control" value="' . $veri["isim"] . '">
                              <br>
                              <strong>Ad Soyad : </strong>
                              <input type="text" name="adsoyad" class="form-control" value="' . $veri["adsoyad"] . '">
                              <br>
                              <strong>Şifre : </strong>
                              <input type="text" name="sifre" class="form-control" value="' . $veri["sifre"] . '">
                              <br>
                              <div class="mb-3 form-check">
                                  <input type="checkbox" name="god_mode" id="god_mode" class="form-check-input" value="0" id="exampleCheck1">
                                  <label class="form-check-label" for="exampleCheck1">Yönetici Modu</label>
                                  <script>
                                    var godmode = document.getElementById("god_mode");

                                    if(godmode.checked)
                                    {
                                        godmode.value = "1";
                                    }
                                  </script>
                              </div>
                              <div style="display:flex; justify-content: space-between; align-items:center; position:relative;">
                                 <span></span>
                                 <input type="submit" value="Güncelle" class="btn btn-outline-primary">
                              </div>
                           </form>
                           ';
                           }
                           else
                           {
                            echo '
                           <form method="post" style="user-select:none;">
                              <strong>Kullanıcı Adı : </strong>
                              <input type="text" name="isim" class="form-control" value="' . $veri["isim"] . '">
                              <br>
                              <strong>Ad Soyad : </strong>
                              <input type="text" name="adsoyad" class="form-control" value="' . $veri["adsoyad"] . '">
                              <br>
                              <strong>Şifre : </strong>
                              <input type="text" name="sifre" class="form-control" value="' . $veri["sifre"] . '">
                              <br>
                              <div style="display:flex; justify-content: space-between; align-items:center; position:relative;">
                                 <span></span>
                                 <input type="submit" value="Güncelle" class="btn btn-outline-primary">
                              </div>
                           </form>
                           ';
                           }
                        }
                        else
                        {
                           echo 'Bunu Görüntülemeye Yetkiniz Yok !';
                           header("Refresh:1; url=admins.php");
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
</body>

</html>
