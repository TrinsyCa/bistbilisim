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
         .table a,.table input
         {
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
         }
         .table input
         {
            width:85%;
         }
         .table td button
         {
            margin-top:30px;
         }
         .table .his
         {
            text-align:center;
            background:#CFE2FF;
            outline:none;
            border:none;
         }
         .table-primary .table-content:hover .his
         {
            background:rgb(230, 240, 255);
         }
         .table-primary .table-content .fa-file-arrow-down
         {
            color: rgba(13, 110, 253, 1);
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
         <h1>Geçmiş</h1>
         <?php
            if(@$_SESSION["role"] === "Yönetici" || @$_SESSION["role"] === "rooter")
            {
               echo '<a href="" onclick="silhistory();"><i class="fa-solid fa-broom"></i>&nbsp; Temizle</a>';
            }
         ?>
      </div>
      <div class="row">
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
                        echo '<table class="table table-primary">
                        <thead>
                           <tr>
                              <th scope="col" style="text-align:center;">Profil</th>
                              <th scope="col" style="text-align:center;">Banner</th>
                              <th scope="col" style="text-align:center;">Döküman</th>
                              <th scope="col" style="text-align:center; width:1px;">ID</th>
                              <th scope="col" style="text-align:center;">Kullanıcı Adı</th>
                              <th scope="col" style="text-align:center;">Şifre</th>
                              <th scope="col" style="text-align:center;">Ad Soyad</th>
                              <th scope="col" style="text-align:center;">Domain</th>
                              <th scope="col" style="text-align:center;">Sınıf</th>
                              <th scope="col" style="text-align:center;">Hakkında</th>
                              <th scope="col" style="text-align:center;">Sosyal Medya</th>
                              <th scope="col" style="text-align:center;">Diller</th>
                              <th scope="col" style="text-align:end; padding-right: 90px;">Tarih</th>
                              <th scope="col" style="text-align:end; padding-right: 15px;">Sil/Düzenle</th>
                           </tr>
                        </thead>
                        <tbody>';

                        $veri = $db->prepare("SELECT * FROM history ORDER BY id DESC");
                        $veri->execute();
                        $islem = $veri->fetchAll(PDO::FETCH_ASSOC);
                        foreach($islem as $row)
                        {
                           if($row["user_id"] == null && $row["user_id"] != 0)
                           {
                              $row["user_id"] = '❌';
                           }
                           if($row["username"] == null)
                           {
                              $row["username"] = '❌';
                           }
                           if($row["pass"] == null)
                           {
                              $row["pass"] = '❌';
                           }
                           if($row["name_surname"] == null)
                           {
                              $row["name_surname"] = '❌';
                           }
                           if($row["domain"] == null)
                           {
                              $row["domain"] = '❌';
                           }
                           if($row["class"] == null)
                           {
                              $row["class"] = '❌';
                           }
                           if($row["img"] == null)
                           {
                              $row["img"] = '../../tools/danger-icon.png';
                           }
                           if($row["banner"] == null)
                           {
                              $row["banner"] = '../../tools/danger-icon.png';
                           }
                           if($row["cv"] == null)
                           {
                              $havecv = '>❌';
                           }
                           if($row["cv"] == true)
                           {
                              $havecv = 'class="fa-solid fa-file-arrow-down"';
                           }
                           if($row["about"] == null)
                           {
                              $row["about"] = '❌';
                           }
                           if($row["social"] == null)
                           {
                              $row["social"] = '❌';
                           }
                           if($row["language"] == null)
                           {
                              $row["language"] = '❌';
                           }
                           if($row["date"] == null)
                           {
                              $row["date"] = '❌';
                           }
                           echo '<tr class="table-content">
                              <th style="width:85px;"><img class="pp" alt="❌" src="../img/students/'.$row["img"].'" '; if($row["img"] != "default-student.png") { echo 'onclick="window.open(\'../img/students/'.$row["img"].'\')"'; } else { echo 'style="filter: invert(0.5) brightness(165%);"'; }
                              echo '></th>
                              <th style="width:140px;"><img class="banner" src="../img/students/banners/'.$row["banner"].'" '; if($row["banner"] != "../../tools/danger-icon.png") { echo 'onclick="window.open(\'../img/students/banners/'.$row["banner"].'\')"'; }
                              echo '></th>
                              <th style="text-align:center;"><a '.$havecv; if($row["cv"]) { echo 'href="../img/students/cv/'.$row["cv"].'" target="_blank">'; }
                              echo '</a></th>
                              <th style="text-align:center;"><a>'.$row["user_id"].'</a></th>
                              <th style="text-align:center; width: 150px;"><input type="text" class="his" value="'.$row["username"].'" readonly></th>
                              <td style="text-align:center;"><input type="text" class="his" value="'.$row["pass"].'" readonly></td>
                              <td style="text-align:center;"><input type="text" class="his" value="'.$row["name_surname"].'" readonly></td>
                              <td style="text-align:center;"><input type="text" class="his" value="'.$row["domain"].'" readonly></td>
                              <td style="text-align:center; width:5px;"><input type="text" class="his" value="'.$row["class"].'" readonly></td>
                              <td style="text-align:center;"><input type="text" class="his" value="'.$row["about"].'" readonly></td>
                              <td style="text-align:center;"><input type="text" class="his" value="'.$row["social"].'" readonly></td>
                              <td style="text-align:center; width: 150px;"><input type="text" class="his" value="'.$row["language"].'" readonly></td>
                              <td style="text-align:end; width:181px; user-select:text;"><a>'.$row["date"].'</a></td>
                              <td style="text-align:end; padding-right:13px; width:0;">
                                 <button class="do-btn edit-btn" onclick="profile(\''.$row["username"].'\')"><i class="fa-solid fa-eye"></i></button>
                                 <button class="do-btn edit-btn" onclick="duzenle('.$row["user_id"].')"><i class="fa-solid fa-pen-to-square"></i></button>
                                 <button class="do-btn trash-btn" onclick="sil('.$row["id"].', \''.kisalt($row["username"], 30).'\' , \''.$row["img"].'\')"><i class="fa-solid fa-trash"></i></button>
                              </td>
                           </tr>';
                        }
                        echo '</tbody>
                        </table>';
                     }
                  }
               ?>
      </div>
   </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script>
   
   function profile(user)
   {
      window.open('../student/' + user);
   }

   function duzenle(id)
   {
      window.location.href = 'editstudent.php?id=' + id;
   }

   function sil(sutunId,user,sutunName) {
      if (confirm('"'+ user+ '"' + " Adlı Kullanıcının Bu Geçmiş Bilgisini Silmek İstediğinize Emin Misiniz?")) {
         $.post("cmd/siluserhistory.php", { sutunId: sutunId , sutunName: sutunName })
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

   function silhistory() {
    if (confirm("Geçmiş Bilgilerini Silmek İstediğinize Emin Misiniz?")) {
        if (confirm("Bütün Geçmiş Bilgileri Silinecek Onaylıyor Musunuz?")) {
            $.post("cmd/silhistory.php", { sil: 1 })
                .done(function(response) {
                    console.log(response);
                    location.reload();
                })
                .fail(function() {
                    console.log("Geçmiş silinirken bir hata oluştu");
                });
        }
    }
}


   var gecmis = document.getElementById("history");

   gecmis.classList.add("active-menu");
</script>
</body>
</html>