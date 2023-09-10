<?php
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
         .table a
         {
            color: var(--bs-primary);
            text-decoration:none;
         }
         .table td input[type="password"]
         {
            background: transparent;
            border:0;
            pointer-events:none;
            text-align:center;
         }
         .do-btn
         {
            padding: 0 5px;
            border-radius: 8px;
            color:white;
            border:0;
         }
         .edit-btn
         {
            background:#0079FF;
         }
         .trash-btn
         {
            background:red;
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
         <h1>Yöneticiler</h1>
         <a href="adduser.php"><i class="fa-solid fa-plus"></i>&nbsp; Yönetici Ekle</a>
      </div>
      <div class="row">
         <table class="table table-primary">
            <thead>
               <tr>
                  <th scope="col">Kullanıcı Adı</th>
                  <th scope="col" style="text-align:center;">Ad Soyad</th>
                  <th scope="col" style="text-align:center;">Şifre</th>
                  <th scope="col" style="text-align:center;">Sil / Düzenle</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  include("connection.php");
                  include("linkfunc.php");
                  if(isset($_SESSION["giris"]))
                  {
                     $veri = $db->prepare("SELECT * FROM admin ORDER BY id DESC");
                     $veri->execute();
                     $islem = $veri->fetchAll(PDO::FETCH_ASSOC);
                  
                     foreach($islem as $row)
                     {
                        if($row["isim"] == null)
                        {
                           $row["isim"] = '<i style="color:grey;" class="fa-solid fa-question"></i>';
                        }
                        if($row["adsoyad"] == null)
                        {
                           $row["adsoyad"] = '<i style="color:grey;" class="fa-solid fa-question"></i>';
                        }
                        if($row["sifre"] == null)
                        {
                           $row["sifre"] = '<i style="color:grey;" class="fa-solid fa-question"></i>';
                        }
                        echo '<tr>
                                    <th><a>'.kisalt($row["isim"], 55).'</a></th>
                                    <td style="text-align:center;"><a>'.kisalt($row["adsoyad"], 55).'</a></td>
                                    <td style="text-align:center;"><input type="password" value="'.kisalt($row["sifre"] , 25).'"></td>
                                    <td style="text-align:center;">
                                       <button class="do-btn edit-btn" onclick="duzenle('.$row["id"].')"><i class="fa-solid fa-pen-to-square"></i></button>
                                       <button class="do-btn trash-btn" onclick="sil('.$row["id"].', \''.$row["isim"].'\' , \''.kisalt($row["isim"], 50).'\')"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                              </tr>';
                     }
                  }
               ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<script>
   function duzenle(id)
   {
      window.location.href = 'admin.php?id=' + id;
   }

   function sil(sutunId,haber_baslik,haber_baslik_short) {
         // Silmek istediğine emin misin sorusunu göster
         if (confirm('"'+ haber_baslik_short+ '"' + " Kullanıcısını silmek istediğinize emin misiniz?")) {
            // AJAX isteği gönder
            $.post("cmd/siluser.php", { sutunId: sutunId })
               .done(function(response) {
                  // Silme işlemi başarılı olduğunda sütunu tablodan kaldır
                  if (response === "Sütun başarıyla silindi") {
                     // Sütunu hedefleyen seçiciyi kullanarak satırı kaldır
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

   var admin = document.getElementById("admins");

   admin.classList.add("active-menu");
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>