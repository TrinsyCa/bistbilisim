<?php
   session_start();
   if(!isset($_SESSION["giris"]))
   {
      header("HTTP/1.0 404 Not Found");
      include($_SERVER['DOCUMENT_ROOT'] . "/bistbilisim.com/404.html");
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
         .openTab
         {
            cursor:pointer;
         }
         .table td
         {
            position:relative;
         }
         .table th
         {
            position:relative;
         }
         .table th a
         {
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
         }
         .table td a
         {
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
         }
         .table td button
         {
            margin-top:30px;
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
         <h1>Haberler</h1>
         <a href="addnews.php"><i class="fa-solid fa-plus"></i>&nbsp; Haber Ekle</a>
      </div>
      <div class="row">
         <table class="table table-primary">
            <thead>
               <tr>
                  <th scope="col" style="text-align:center;">Kapak Resmi</th>
                  <th scope="col" style="text-align:center;">Başlık</th>
                  <th scope="col" style="text-align:center;">Alt Başlık</th>
                  <th scope="col" style="text-align:center;">Kategori</th>
                  <th scope="col" style="text-align:center;">Tıklanma</th>
                  <th scope="col" style="text-align:center;">Yazar</th>
                  <th scope="col" style="text-align:end; padding-right: 70px;">Tarih</th>
                  <th scope="col" style="text-align:center;">Sil/Düzenle</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  include("connection.php");
                  include("linkfunc.php");
                  if(isset($_SESSION["giris"]))
                  {
                     $veri = $db->prepare("SELECT * FROM news ORDER BY id DESC");
                     $veri->execute();
                     $islem = $veri->fetchAll(PDO::FETCH_ASSOC);
                  
                     foreach($islem as $row)
                     {
                        if($row["baslik"] == null)
                        {
                           $row["baslik"] = '<i style="color:grey;" class="fa-solid fa-question"></i>';
                        }
                        if($row["kategori"] == null)
                        {
                           $row["kategori"] = '<i style="color:grey;" class="fa-solid fa-question"></i>';
                        }
                        if($row["tarih"] == null)
                        {
                           $row["tarih"] = '<i style="color:grey;" class="fa-solid fa-question"></i>';
                        }
                        echo '<tr class="table-content openTab" onclick="window.open(\'../news/p/'.$row["link"].'\', \'_blank\')">
                                    <th style="width:140px;"><img src="../img/news/'.$row["resim"].'"></th>
                                    <th style="text-align:center;"><a>'.kisalt($row["baslik"], 20).'</a></th>
                                    <td style="text-align:center;"><a>'.kisalt($row["alt_baslik"], 25).'</a></td>
                                    <td style="text-align:center;"><a>'.kisalt($row["kategori"] , 25).'</a></td>
                                    <td style="text-align:center;"><a>'.kisalt($row["tiklanma"] , 10).'</a></td>
                                    <td style="text-align:center;"><a>'.kisalt($row["yazar"] , 30).'</a></td>
                                    <td style="text-align:end;"><a>'.$row["tarih"].'</a></td>
                                    <td style="text-align:center;">
                                       <button class="do-btn edit-btn" onclick="duzenle('.$row["id"].')"><i class="fa-solid fa-pen-to-square"></i></button>
                                       <button class="do-btn trash-btn" onclick="sil('.$row["id"].', \''.kisalt($row["baslik"], 30).'\' , \''.$row["resim"].'\')"><i class="fa-solid fa-trash"></i></button>
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
      event.stopPropagation();
      window.location.href = 'editnews.php?id=' + id;
   }

   function sil(sutunId,haber_baslik_short,sutunName) {
      event.stopPropagation();
      if (confirm('"'+ haber_baslik_short+ '"' + " Adlı Bloğu silmek istediğinize emin misiniz?")) {
         $.post("cmd/silnews.php", { sutunId: sutunId , sutunName: sutunName })
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

   var haberler = document.getElementById("news");

   haberler.classList.add("active-menu");
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>