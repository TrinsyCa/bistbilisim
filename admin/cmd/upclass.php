<?php
include("../connection.php");

if (isset($_POST["class"])) {
    $class = $_POST["class"];

    $classdb = $db->prepare("SELECT * FROM students WHERE class = ?");
    $classdb->execute([$class]);
    $classRows = $classdb->fetchAll();

    if ($classRows) {
        $updateQuery = $db->prepare("UPDATE students SET class = CONCAT(CAST(SUBSTRING_INDEX(class, '/', 1) + 1 AS CHAR), '/', SUBSTRING_INDEX(class, '/', -1)) WHERE class = ?");
        $updateQuery->execute([$class]);
    
        $updateQueryFinal = $db->prepare("UPDATE students SET class = CONCAT('Mezun', SUBSTRING_INDEX(class, '/', -1)) WHERE class = CONCAT('13/', SUBSTRING_INDEX(class, '/', -1))");
        $updateQueryFinal->execute();
    
        echo "Sınıftakiler Yükseltildi";
    }
    
    else {
        echo "Sınıf Bağlantısında Bir Sorun Oluştu";
    }
}
else {
    header("Refresh:0; url=../");
}
?>