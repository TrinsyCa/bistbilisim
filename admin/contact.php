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
            cursor: pointer;
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
         .showTr
         {
            cursor:pointer;
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
         <h1>İletişim</h1>
      </div>
      <div class="row">
         <table class="table table-primary">
            <thead>
               <tr>
                  <th scope="col">Ad Soyad</th>
                  <th scope="col" style="text-align:center;">E-Mail</th>
                  <th scope="col" style="text-align:center;">Tel</th>
                  <th scope="col" style="text-align:center;">Tarih</th>
                  <th scope="col" style="text-align:center;">Görüntüle / Sil</th>
               </tr>
            </thead>
            <tbody>
               <?php
                  include("connection.php");
                  include("linkfunc.php");
                  if(isset($_SESSION["giris"]))
                  {
                     $veri = $db->prepare("SELECT * FROM contact ORDER BY id DESC");
                     $veri->execute();
                     $islem = $veri->fetchAll(PDO::FETCH_ASSOC);
                  
                     foreach($islem as $row)
                     {
                        if($row["name"] == null)
                        {
                           $row["name"] = '<i style="color:grey;" class="fa-solid fa-question"></i>';
                        }
                        if($row["email"] == null)
                        {
                           $row["email"] = '<i style="color:grey;" class="fa-solid fa-question"></i>';
                        }
                        if($row["tel"] == null)
                        {
                           $row["tel"] = '<i style="color:grey;" class="fa-solid fa-question"></i>';
                        }
                        echo '<script> var id ="'.$row["id"].'"</script>';
                        echo '<tr class="table-content showTr" onclick="show('.$row["id"].')">
                                    <th><a onclick="show('.$row["id"].')">'.kisalt($row["name"], 30).'</a></th>
                                    <td style="text-align:center;"><a onclick="show('.$row["id"].')">'.kisalt($row["email"], 50).'</a></td>
                                    <td style="text-align:center;"><a onclick="show('.$row["id"].')">'.$row["tel"].'</a></td>
                                    <td style="text-align:center;"><a onclick="show('.$row["id"].')">'.$row["tarih"].'</a></td>
                                    <td style="text-align:center;">
                                       <button class="do-btn edit-btn" onclick="show('.$row["id"].')"><i class="fa-solid fa-eye"></i></button>
                                       <button class="do-btn trash-btn" onclick="sil('.$row["id"].', \''.$row["name"].'\' , \''.kisalt($row["name"], 30).'\')"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                              </tr>';
                              echo '<div id="messageshow_'.$row["id"].'" class="msgshow">
                                       <h1>'.$row["name"].'</h1>
                                       <span>E-Mail : '.$row["email"].'</span>
                                       <span>Telefon : '.$row["tel"].'</span>
                                       <span>Telefon : '.$row["tarih"].'</span>
                                       <p>'.$row["message"].'</p>
                                       <button id="btn_'.$row["id"].'" onclick="cmessage('.$row["id"].');">Kapat</button>
                                    </div>
                                    <style>
                                    .msgshow {
                                       position: fixed;
                                       top: 20%;
                                       bottom: 0;
                                       left: 255px;
                                       height: 94%;
                                       width: 86.7%;
                                       padding-top: 12px;
                                       opacity: 0;
                                       transition: 0.5s;
                                       z-index: 999;
                                       pointer-events: none;
                                       backdrop-filter: blur(8px);
                                       background: rgba(255,255,255,0.5);
                                    }
                                       .msgshow span
                                       {
                                          color:rgba(0,0,0,0.6);
                                          display:block;
                                       }
                                       .msgshow p
                                       {
                                          margin-top: 15px;
                                          min-height:80%;
                                          overflow-y:scroll;
                                          font-size: 20px;
                                       }
                                       .msgshow button
                                       {
                                          border-radius: 50px;
                                          padding: 4px 10px;
                                          background: #d0d0d0;
                                          border:none;
                                          position:absolute;
                                          bottom:1.5%;
                                          font-size: 16px;
                                          transition:0.3s;
                                       }
                                       .msgshow button:hover
                                       {
                                          background: #c0c0c0;
                                       }
                                       .msgshow #btn
                                       {
                                          display:none;
                                       }
                                    </style>';
                     }
                  }
               ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<script>
   function show(id) {
  const messageshow = document.getElementById("messageshow_" + id);
  const btn = document.getElementById("btn_" + id);
  if (messageshow) {
    messageshow.style.opacity = "1";
    messageshow.style.top = "6%";
    btn.style.display = "block";
    messageshow.style.pointerEvents = "auto"; // Kutucuğun tıklama olaylarını etkinleştir
  }
}

function cmessage(id) {
  const messageshow = document.getElementById("messageshow_" + id);
  const btn = document.getElementById("btn_" + id);
  if (messageshow) {
    messageshow.style.top = "20%";
    messageshow.style.opacity = "0";
    btn.style.display = "none";
    messageshow.style.pointerEvents = "none";
  }
}

document.addEventListener('keydown', function(event) 
        {
            if (event.key === 'Escape') {
                cmessage(id);
            }
        });

   function sil(sutunId,name,name_short) {
      event.stopPropagation();
         // Silmek istediğine emin misin sorusunu göster
         if (confirm('"'+ name_short+ '"' + " Adlı kişinin mesajını silmek istediğinize emin misiniz?")) {
            // AJAX isteği gönder
            $.post("cmd/silcontact.php", { sutunId: sutunId })
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

   var iletisim = document.getElementById("contact");

   iletisim.classList.add("active-menu");
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>