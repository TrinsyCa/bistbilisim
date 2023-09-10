<?php
    session_start();
    if(!isset($_SESSION["student"]))
    {
        header("Refresh:0; url=../../");
        return;
    }

    include("admin/connection.php");

    $username = $_GET["username"];
    $veri = $db->prepare("SELECT * FROM students WHERE username = ?");
    $veri->execute([$username]);
    $islem = $veri->fetchAll(PDO::FETCH_ASSOC);
    if(!$islem)
    {
        echo '<title>Kullanıcı Bulunamadı | Bist Bilişim</title>';
        header("Refresh:1; url=../../");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if($islem) echo $username.' | Bist Bilişim'; ?></title>
    <link rel="shortcut icon" href="../../img/logo/BIST_Icon.png">
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
    <a href="user.php?sayfa=logout">Çıkış Yap</a>
</body>
</html>