<?php
include("../connection.php");
session_start();
if(!isset($_SESSION["giris"]))
{
   header("HTTP/1.0 404 Not Found");
   include($_SERVER['DOCUMENT_ROOT'] . "/bistbilisim.com/404.html");
   return;
}
else
{
    if (isset($_POST["class"])) {
        $class = $_POST["class"];

        // Hedef sınıfta öğrencilerin olup olmadığını kontrol et
        $targetClass = (int)explode('/', $class)[0] + 1 . '/' . explode('/', $class)[1]; // Hedef sınıfın bir üst sınıfını al (örn: 11/B için 12/B)
        $targetClassQuery = $db->prepare("SELECT COUNT(*) AS count FROM students WHERE class = ?");
        $targetClassQuery->execute([$targetClass]);
        $targetClassResult = $targetClassQuery->fetch(PDO::FETCH_ASSOC);

        if ($targetClassResult['count'] > 0) {
            // Hedef sınıfta öğrenciler var, hata mesajı döndür
            echo "Lütfen Önce \"" . $targetClass . "\" Sınıfını Yükseltiniz.";
        } else {
            // Hedef sınıfta öğrenci yok, işlemi yap
            $updateQuery = $db->prepare("UPDATE students SET class = CONCAT(CAST(SUBSTRING_INDEX(class, '/', 1) + 1 AS CHAR), '/', SUBSTRING_INDEX(class, '/', -1)) WHERE class = ?");
            $updateQuery->execute([$class]);

            $updateQueryFinal = $db->prepare("UPDATE students SET class = CONCAT('Mezun', SUBSTRING_INDEX(class, '/', -1)) WHERE class = CONCAT('13/', SUBSTRING_INDEX(class, '/', -1))");
            $updateQueryFinal->execute();

            echo "Sınıftakiler Yükseltildi";
        }
    }
    else {
        header("HTTP/1.0 404 Not Found");
        include($_SERVER['DOCUMENT_ROOT'] . "/bistbilisim.com/404.html");
        return;
    }
}
?>
