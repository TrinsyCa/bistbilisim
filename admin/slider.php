<?php
   include("connection.php");
   include("linkfunc.php");
   session_start();
   if(!isset($_SESSION["giris"]))
   {
      header("Refresh: 0; url=login.php");
      return;
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
      form
      {
         display:flex;
         gap:10px;
      }
      .slider
      {
         display:flex;
         flex-wrap: wrap;
         gap: 14px;
         padding-bottom: 20px;
      }
      .slider .mypic
      {
         position:relative;
         width: 534px;
         height: 315px;
      }
      .slider a
      {
         position:relative;
      }
      .slider .mypic:hover button
      {
         transform:translate(-30%,30%);
         opacity:1;
         pointer-events:auto;
      }
      .slider .mypic button
      {
         position:absolute;
         right:0;
         transform:translate(-30%,10);
         width: 30px;
         height: 30px;
         border-radius: 8px;
         color:white;
         border:0;
         opacity: 0;
         pointer-events:none;
         transition: 0.3s;
         z-index: 9999999;
      }
      .slider .mypic .edit-btn
      {
         top:11%;
         background:#0079FF;
      }
      .slider .mypic .edit-btn:hover
      {
         background:#0A6EBD;
      }
      .slider .mypic .edit-btn:active
      {
         background:#5A96E3;
      }
      .slider .mypic .trash-btn
      {
         top:0;
         background:red;
      }
      .slider .mypic .trash-btn:hover
      {
         background: #ED2B2A;
      }
      .slider .mypic .trash-btn:active
      {
         background: #F15A59;
      }
      .slider .mypic img
      {
         width:100%;
         height:100%;
         object-fit:cover;
         object-position:center;
         border-radius: 10px;
         box-shadow: 0 0 5px black;
      }
    </style>
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
<div class="wrapper">
   <?php include_once 'sidebar.php'; ?>
   <div class="content">
      <div class="title">
         <h1>Slider Yönetimi</h1>
         <a href="addslide.php"><i class="fa-solid fa-plus"></i>&nbsp; Slide Ekle</a>
      </div>
      <div class="row">
         <div class="slider">
            <?php
               $resimdb = $db->prepare("SELECT * FROM slider ORDER BY id ASC");
               $resimdb->execute();
               $resimler = $resimdb->fetchAll(PDO::FETCH_ASSOC);
               foreach ($resimler as $row)
               {
                  echo '<div class="mypic">
                  <button class="do-btn trash-btn" onclick="sil('.$row["id"].', \''.kisalt($row["title"], 30).'\' , \''.$row["img"].'\')"><i class="fa-solid fa-trash"></i></button>
                  <button class="do-btn edit-btn" onclick="duzenle('.$row["id"].')"><i class="fa-solid fa-pen-to-square"></i></button>
                  <a target="_blank" onclick="duzenle('.$row["id"].')"><img src="../img/slider/'.$row["img"].'"></a>
                  </div>';
               }
            ?>
         </div>
      </div>
   </div>
</div>
<script>
    function sil(sutunId,slide_title,sutunName) {
      if (confirm('"'+ slide_title+ '"' + " Başlıklı slaytı silmek istediğinize emin misiniz?")) {
         $.post("cmd/silslide.php", { sutunId: sutunId , sutunName: sutunName })
            .done(function(response) {
               if (response === "Sütun başarıyla silindi") {
                  $("tr[data-sutunId='" + sutunId + "']").remove();
                  $("tr[data-sutunId='" + sutunName + "']").remove();
               }
               console.log(response);

               location.reload();
            })
            .fail(function() {
               console.log("Sütün silinirken bir hata oluştu");
            });
      }
   }

   function duzenle(id)
   {
      window.location.href = "editslide.php?id=" + id;
   }
   var slider = document.getElementById("slider");

   slider.classList.add("active-menu");
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
</body>
</html>