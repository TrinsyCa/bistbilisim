<?php
   session_start();
   if(!isset($_SESSION["giris"]))
   {
      if(isset($_SESSION["student"]))
      {
         header("Refresh: 0; url=../student/admin/".$_SESSION["username"]);
      }
      header("Refresh:0 url=login.php");
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
        .documents
        {
            display:flex;
            gap:15px;
        }
        .contentBx
        {
            width:200px;
            height:200px;
            position:relative;
        }
        .contentBx img
        {
            width:100%;
            height:100%;
            object-fit:cover;
            object-position:center;
        }
        .contentBx .fa-trash
        {
            width:100%;
            height:100%;
            position:absolute;
            top:10%;
            left:0;
            display:flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
            color:red;
            background:transparent;
            opacity:0;
            transform:translateY(20px);
            transition:0.4s;
            font-size:36px;
        }
        .profile
        {
            overflow:hidden;
            border-radius:50%;
        }
        .banner 
        {
            width:450px;
            border-radius:20px;
            overflow:hidden;
        }
        .contentBx:hover .fa-trash
        {
            background:rgba(255,0,0,0.4);
            opacity:1;
            top:-10%;
        }
        .cv .fa-file-arrow-down
        {
            color:#0D6EFD;
        }
        .cv
        {
            width:200px;
            height:200px;
            font-size: 62px;
            border-radius:50%;
            overflow:hidden;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .cv:hover .fa-trash
        {
            height:100px;
            top:40%;
        }
        .contentBx .fa-eye
        {
            width:100%;
            height:100%;
            position:absolute;
            top:-20%;
            left:0;
            display:flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
            color:#0D6EFD;
            background:rgba(13, 110, 253, 0.4);
            opacity:0;
            transform:translateY(20px);
            transition:0.4s;
            font-size:36px;
        }
        .contentBx:hover .fa-eye
        {
            opacity:1;
            top:-10%;
            height:100px;
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
            <h1>Eski Dökümanlar</h1>
            <div style="display:flex; align-items:center; gap:10px;">
                <?php
                    if(@$_SESSION["role"] === "Yönetici" || @$_SESSION["role"] === "rooter")
                    {
                       echo '<a href="" onclick="sildocuments();"><i class="fa-solid fa-broom"></i>&nbsp; Temizle</a>';
                    }
                ?>
                <i onmouseover="help_over();" onmouseout="help_out();" class="fa-solid fa-circle-question question"></i>
                <div id="question-box">
                    <p>Eski Dökümanlar</p>
                    <p><?php echo htmlspecialchars('Öğrencilerin Kullanmadığı Eski Dosyalar Burada Bulunur'); ?></p>
                    <hr>
                </div>
            </div>
       </div>
       <div class="row">
            <div class="documents">
            <?php
                include("connection.php");
                include("linkfunc.php");
                if(isset($_SESSION["giris"]))
                {
                    if(@$_SESSION["role"] === "Moderatör")
                    {
                        echo 'Buraya Giriş Yetkiniz Bulunmamakta..';
                    }
                    else if(@$_SESSION["role"] === "Yönetici" || @$_SESSION["role"] === "rooter")
                    {
                        $veri = $db->prepare("SELECT * FROM documents ORDER BY id DESC");
                        $veri->execute();
                        $islem = $veri->fetchAll(PDO::FETCH_ASSOC);

                        if($islem)
                        {
                            foreach ($islem as $row) {
                                if ($row["source"] == "profile") {
                                    echo '<div class="profile contentBx">
                                          <i class="fa-solid fa-trash" onclick="sildocument(' . $row["id"] . ', \'' . $row["source"] . '\', \'' . $row["doc"] . '\');"></i>
                                          <img src="../img/students/' . $row["doc"] . '">
                                          </div>';
                                }
                                if ($row["source"] == "banner") {
                                    echo '<div class="banner contentBx">
                                          <i class="fa-solid fa-trash" onclick="sildocument(' . $row["id"] . ', \'' . $row["source"] . '\', \'' . $row["doc"] . '\');"></i>
                                          <img src="../img/students/banners/' . $row["doc"] . '">
                                          </div>';
                                }
                                if ($row["source"] == "cv") {
                                    echo '<div class="cv contentBx">
                                          <i class="fa-solid fa-eye" onclick="window.open(\'../img/students/cv/'.$row["doc"].'\')"></i>
                                          
                                          <i class="fa-solid fa-trash" onclick="sildocument(' . $row["id"] . ', \'' . $row["source"] . '\', \'' . $row["doc"] . '\');"></i>
                                          <i class="fa-solid fa-file-arrow-down"></i>
                                          </div>';
                                }
                            }                            
                        }
                    }
                }
            ?>
            </div>
       </div>
   </div>
</div>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   var documents = document.getElementById("documents");

   documents.classList.add("active-menu");

   function sildocument(sutunId,source,sutunName) {

    if(source == "profile")
    { sourceTxt = "Profil Fotoğrafını"; }
    if(source == "banner")
    { sourceTxt = "Banner Fotoğrafını"; }
    if(source == "cv")
    { sourceTxt = "CV'yi"; }

      if (confirm('Bu '+ sourceTxt+ '' + " Silmek İstediğinize Emin Misiniz?")) {
         $.post("cmd/sildocument.php", { sutunId: sutunId , sutunName: sutunName , source: source })
            .done(function(response) {
               if (response === "Sütun başarıyla silindi") {
                  $("tr[data-sutunId='" + sutunId + "']").remove();
               }
               console.log(response);

               location.reload();
            })
            .fail(function() {
               console.log("Sütün silinirken bir hata oluştu");
            });
      }
   }

   function sildocuments() {
    if (confirm("Eski Dökümanları Silmek İstediğinize Emin Misiniz?")) {
        if (confirm("Bütün Eski Dökümanlar Silinecek Onaylıyor Musunuz?")) {
            $.post("cmd/sildocuments.php", { sil: 1 })
                .done(function(response) {
                    console.log(response);
                    location.reload();
                })
                .fail(function() {
                    console.log("Dökümanlar silinirken bir hata oluştu");
                });
            }
        }
    }
</script>
</body>
</html>