<?php
// silhistory.php

include("../connection.php");

if (isset($_POST['sil']) && $_POST['sil'] == 1) {
    // Tabloyu silme işlemini gerçekleştir
    $sil = $db->prepare("DELETE FROM history");
    $sil->execute();

    if ($sil) {
        echo "Tablo başarıyla silindi";
    } else {
        echo "Tablo silinirken bir hata oluştu";
    }
} else {
    header("HTTP/1.0 404 Not Found");
    include($_SERVER['DOCUMENT_ROOT'] . "/bistbilisim.com/404.html");
    return;
}
?>