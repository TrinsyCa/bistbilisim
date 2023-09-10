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
      .teachers-col
      {
         width: 1430px;
         display: flex;
         align-items: center;
         gap: 45px;
         flex-wrap: wrap;
         user-select:none;
         padding-bottom: 25px;
      }
      .teachers-detail
      {
         width: 290px;
         height: 340px;
         background-color: rgba(0, 0, 0, 0.10);
         cursor: default;
         transition: all 0.3s ease-in-out;
         border: 4px solid rgba(0, 0, 0, 0.03);
         border-radius: 18px;
         display: flex;
         align-items: end;
         justify-content: center;
         position: relative;
         padding: 15px 0;
         overflow:hidden;
         cursor:pointer;
      }
      .teachers-detail:hover
      {
         transform: translateY(-6px);
         box-shadow:0 6px 15px -8px black;
      }
      .teachers-detail img
      {
         height: 120px;
         width: 120px;
         object-fit: cover;
         border-radius: 60px;
         position: absolute;
         top: 3%;
         transition: all 0.25s ease-in-out;
         border: 3px solid transparent;
         background: #ebebeb;
      }
      .teachers-txt
      {
         text-align: center;
         display: flex;
         align-items: center;
         justify-content: center;
         flex-direction: column;
      }
      .teachers-txt h3
      {
         position: absolute;
         top: 45%;
         transition: all 0.25s ease-in-out;
         text-shadow: 0 0 2px black;
         text-transform: capitalize;
      }
      .jobs p
      {
         padding: 0;
         margin: 0;
         font-size: 16px;
         padding: 8px;
         width: 230px;
         border-top: 1px solid rgba(0, 0, 0, 0.2);
         text-transform: capitalize;
         color: rgba(0, 0, 0, 0.7);
      }
      .jobs p:nth-last-child(1)
      {
         border-bottom: 1px solid rgba(0, 0, 0, 0.2);
         padding-bottom: 8px;
         margin-bottom: 4px;
      }

      .teachers-detail:hover button
      {
         transform:translate(-30%,30%);
         opacity:1;
         pointer-events:auto;
      }
      .teachers-detail button
      {
         position:absolute;
         right:0;
         transform:translate(-30%,0);
         width: 30px;
         height: 30px;
         border-radius: 8px;
         color:white;
         border:0;
         opacity:0;
         pointer-events:none;
         transition: 0.3s;
         z-index: 9999999;
      }
      .teachers-detail .edit-btn
      {
         top:11%;
         background:#0079FF;
      }
      .teachers-detail .edit-btn:hover
      {
         background:#0A6EBD;
      }
      .teachers-detail .edit-btn:active
      {
         background:#5A96E3;
      }
      .teachers-detail .trash-btn
      {
         top:0;
         background:red;
      }
      .teachers-detail .trash-btn:hover
      {
         background: #ED2B2A;
      }
      .teachers-detail .trash-btn:active
      {
         background: #F15A59;
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
         <h1>Öğretmenler</h1>
         <a href="addteacher.php"><i class="fa-solid fa-plus"></i>&nbsp; Öğretmen Ekle</a>
      </div>
      <div class="row">
         <div class="teachers-col">
            <?php
               include("connection.php");
               include("linkfunc.php");

               if(isset($_SESSION["giris"]))
               {
                  $veri = $db->prepare("SELECT * FROM teachers ORDER BY id ASC");
                  $veri->execute();
                  $teachers = $veri->fetchAll(PDO::FETCH_ASSOC);

                  foreach($teachers as $row)
                  {
                     echo '<div class="teachers-detail" onclick="';
                        if($row["social"])
                        {
                           echo 'window.open(\'' . $row["social"] . '\', \'_blank\')';
                        }
                        else
                        {
                           echo 'duzenle('.$row["id"].');';
                        }
                     echo'">
                           <div class="btns">
                              <button class="do-btn trash-btn" onclick="sil('.$row["id"].', \''.kisalt($row["name_surname"], 30).'\' , \''.$row["img"].'\')"><i class="fa-solid fa-trash"></i></button>
                              <button class="do-btn edit-btn" onclick="duzenle('.$row["id"].')"><i class="fa-solid fa-pen-to-square"></i></button>
                           </div>
                              <div class="teachers-txt">
                                 <img src="../img/teachers/'.$row["img"].'">
                                 <h3>'.$row["name_surname"].'</h3>
                                 <div class="jobs us">';

                           if($row["fields"])
                           {
                              $fields = explode(",", $row["fields"]);
                              $fields = array_reverse($fields);
                              $fields = array_slice($fields,0,3);

                              foreach($fields as $field) {
                                 echo '<p>'.trim($field).'</p>';
                              }
                           }

                           echo '</div>
                              </div>
                           </div>';
                  }
               }
            ?>
         </div>
      </div>
   </div>
</div>
<script>
   function sil(sutunId,slide_title,sutunName) {
      event.stopPropagation();
      if (confirm('"'+ slide_title+ '"' + " Adlı öğretmeni silmek istediğinize emin misiniz?")) {
         $.post("cmd/silteacher.php", { sutunId: sutunId , sutunName: sutunName })
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
      event.stopPropagation();
      window.location.href = "editteacher.php?id=" + id;
   }

   var teachers = document.getElementById("teachers");

   teachers.classList.add("active-menu");
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
</body>
</html>