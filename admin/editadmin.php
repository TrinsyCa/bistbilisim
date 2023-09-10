<?php
session_start();
ob_start();
if (!isset($_SESSION["giris"])) {
    header("HTTP/1.0 404 Not Found");
    include($_SERVER['DOCUMENT_ROOT'] . "/bistbilisim.com/404.html");
    return;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("connection.php");
    include("linkfunc.php");

    @$id = htmlspecialchars(@$_GET["id"]);
    @$isim = htmlspecialchars(@$_POST["isim"]);
    @$adsoyad = htmlspecialchars(@$_POST["adsoyad"]);
    @$sifre = htmlspecialchars(@$_POST["sifre"]);
    if(@$_SESSION["role"] === "rooter" || @$_SESSION["role"] === "Yönetici")
    {
        @$role = htmlspecialchars(@$_POST["role"]);
    }
    else
    {
        @$role = "Moderatör";
    }
    
    $guncelle = $db->prepare("UPDATE admin SET isim = ?, adsoyad = ?, sifre = ? , role = ? WHERE id = ?");
    $guncelle->execute([$isim, $adsoyad, $sifre , $role , $id]);

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
                <h1>Yönetici Düzenle</h1>
                <a href="admins.php"><i class="fa-solid fa-shield"></i>&nbsp; Yöneticiler</a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    include("connection.php");
                    include("linkfunc.php");

                    if (@$_GET) {
                        @$id = @$_GET["id"]; 
                        if(@$_SESSION["id"] == @$_GET["id"] || @$_SESSION["role"] === "rooter" || @$_SESSION["role"] === "Yönetici")
                        {
                           $vericek = $db->prepare("SELECT * FROM admin WHERE id = ?");
                           $vericek->execute([$id]);
                           $veri = $vericek->fetch(PDO::FETCH_ASSOC);

                            if(@$veri)
                            {
                                if(@$_SESSION["role"] === "rooter" || @$_SESSION["role"] === "Yönetici" || @$_SESSION["id"] === @$veri["id"] || @$_SESSION["id"] == 0)
                                {
                                    if(@$_SESSION["role"] != @$veri["role"] || @$_SESSION["id"] === @$veri["id"] || @$_SESSION["id"] == 0)
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
                                        <br>';
                                        if((@$_SESSION["role"] == "Yönetici" || @$_SESSION["role"] == "rooter") && @$_SESSION["id"] != $veri["id"] || @$_SESSION["id"] == 0)
                                        {
                                            echo '<input type="text" value="Moderatör" name="role" id="role" class="form-control" style="user-select:none; display:none; pointer-events:none; ">
                                            <div style="display:flex; justify-content: space-between; align-items:center; position:relative;">
                                            <div class="btn-group dropend role">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="roleemote" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa-solid fa-pen"></i>&nbsp; Moderatör
                                                    </button>
                                                    
                                                    <ul class="dropdown-menu dropdown-menu-dark">';
                                                        if(@$_SESSION["role"] == "Yönetici")
                                                    {
                                                        echo '
                                                        <li><a onclick="moderator();" class="dropdown-item"><i class="fa-solid fa-pen"></i>&nbsp; Moderatör</a></li>
                                                        <li><a onclick="administor();" class="dropdown-item"><i class="fa-solid fa-lock"></i>&nbsp; Yönetici</a></li>
                                                    ';
                                                    }
                                                    else if(@$_SESSION["role"] == "rooter")
                                                    {
                                                        echo '<li><a onclick="moderator();" class="dropdown-item"><i class="fa-solid fa-pen"></i>&nbsp; Moderatör</a></li>
                                                        <li><a onclick="administor();" class="dropdown-item"><i class="fa-solid fa-lock"></i>&nbsp; Yönetici</a></li>
                                                        <li><a onclick="rooter();" class="dropdown-item"><i class="fa-solid fa-shield"></i>&nbsp; Rooter</a></li>';
                                                    }
                                                echo '</ul>
                                                </div>
                                                <script>
                                                    ke = document.getElementById("roleemote");
                                                    k = document.getElementById("role");
                                
                                                    function moderator() { ke.innerHTML = \'<i class="fa-solid fa-pen"></i>&nbsp; Moderatör\'; k.value = "Moderatör"; }
                                                    function administor() { ke.innerHTML = \'<i class="fa-solid fa-lock"></i>&nbsp; Yönetici\'; k.value = "Yönetici"; }
                                                    function rooter() { ke.innerHTML = \'<i class="fa-solid fa-shield"></i>&nbsp; Rooter\'; k.value = "rooter"; }
                                                
                                                </script>';
                                        }
                                        echo '<div style="display:flex; justify-content: space-between; align-items:center; position:relative;">
                                        <span></span>
                                        <input type="submit" value="Güncelle" class="btn btn-outline-primary">
                                        </div>
                                        </form>';
                                    }
                                    else
                                    {
                                        echo 'Bu Kullanıcıyı Görüntülemeye Yetkiniz Yok !';
                                    }
                                }
                                else
                                {
                                    echo 'Bu Kullanıcıyı Görüntülemeye Yetkiniz Yok !';
                                }
                            }
                            else
                            {
                                echo "ID : ".$id." Numaralı Admin Bulunmuyor..";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
    <script>
        var admin = document.getElementById("admins");

admin.classList.add("active-menu");
    </script>
</body>

</html>
