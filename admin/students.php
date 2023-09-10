<?php
   include("connection.php");
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
      .student-border:hover .btns button
      {
         transform:translate(-45%,45%);
         opacity:1;
         pointer-events:auto;
      }
      .btns button
      {
         position:absolute;
         right:0;
         transform:translate(-45%,15%);
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
      .btns .edit-btn
      {
         top:9.5%;
         background:#0079FF;
      }
      .btns .edit-btn:hover
      {
         background:#0A6EBD;
      }
      .btns .edit-btn:active
      {
         background:#5A96E3;
      }
      .btns .trash-btn
      {
         top:0;
         background:red;
      }
      .btns .trash-btn:hover
      {
         background: #ED2B2A;
      }
      .btns .trash-btn:active
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
   <link rel="stylesheet" href="students.css">
   <div class="content">
      <div class="title">
            <?php
                  $veristudents = $db->prepare("SELECT COUNT(*) AS total FROM students");
                  $veristudents->execute();
                  $studentsCount = $veristudents->fetch(PDO::FETCH_ASSOC)['total'];

                  echo '<h1>Öğrenciler | Toplam : <strong>'.$studentsCount.' Kişi</strong></h1>';
            ?>
            <div style="display:flex; align-items:center; gap: 10px;">
               <div id="class-settings">
                  <input type="text" id="myclass" style="display:none;">
                  <a onclick="upclass();" style="margin-left: 10px;"><i class="fas fa-chevron-up"></i>&nbsp; Sınıfı Yükselt</a>
               </div>
               <input type="text" name="class" id="class" class="form-control" style="user-select:none; display:none; pointer-events:none;">
                  <div style="display:flex; justify-content: space-between; align-items:center; position:relative;">
                     <div class="btn-group dropdown-center class">
                           <button class="btn btn-secondary dropdown-toggle" type="button" id="classemote" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa-solid fa-grip"></i>&nbsp; Tümü
                           </button>
                           
                           <ul class="dropdown-menu dropdown-menu-dark">
                              <li><a onclick="changeFilter('<i class=\'fa-solid fa-grip\'></i>&nbsp; Tümü ',''); closeSettings();" class="dropdown-item" data-filter="student"><i class="fa-solid fa-grip"></i>&nbsp; <p>Tümü</p></a></li>
                              <?php
                                 $vericlasses = $db->prepare("SELECT *, 
                                 SUBSTRING_INDEX(class, '/', 1) AS sort_number, 
                                 SUBSTRING_INDEX(class, '/', -1) AS sort_letter 
                                 FROM classes 
                                 ORDER BY (class = 'Mezun') DESC, 
                                          sort_number DESC, 
                                          sort_letter ASC");
                                 $vericlasses->execute();
                                 $classes = $vericlasses->fetchAll(PDO::FETCH_ASSOC);

                                 foreach ($classes as $row) {
                                    $veristudents = $db->prepare("SELECT COUNT(*) AS total FROM students WHERE class = ?");
                                    $veristudents->execute([$row["class"]]);
                                    $studentsCount = $veristudents->fetch(PDO::FETCH_ASSOC)['total'];

                                    if($studentsCount >= 1)
                                    {
                                       if (strpos($row["class"], "/") !== false) {
                                          $cutclass = explode("/", $row["class"]);
                                          $cutclass = $cutclass[0] . $cutclass[1];
                                       }
                                       else
                                       {
                                          $cutclass = $row["class"];
                                       }
                                       $closeSettings = "";
                                       if($row["class"] == "Mezun")
                                       {
                                          $closeSettings = "closeSettings();";
                                       }
                                 
                                       echo '<li>
                                                <a onclick="changeFilter(\'<i class=&quot;fa-solid fa-users&quot;></i>&nbsp; '.$row["class"].'\',\''.$row["class"].'\'); '.$closeSettings.'" class="dropdown-item" data-filter="'.$cutclass.'"><i class="fa-solid fa-users"></i>&nbsp; 
                                                   <p>'.$row["class"].'</p>
                                                </a>
                                             </li>';
                                    }
                                }
                              ?>
                           </ul>
                     </div>
                     <script>
                           function changeFilter(filterValue,value)
                           {
                              var ke = document.getElementById("classemote");
                              var k = document.getElementById("class");
                              var myclass = document.getElementById("myclass");
                              var cs = document.getElementById("class-settings");

                              cs.style.opacity = "1";
                              cs.style.right = "17.1%";
                              cs.style.pointerEvents = "auto";
                              ke.innerHTML = filterValue;
                              k.value = value;
                              if(value != '')
                              {
                                 myclass.value = value;
                              }
                              else
                              {
                                 myclass.value = '';
                              }
                           }
                           function closeSettings()
                           {
                              var cs = document.getElementById("class-settings");

                              cs.style.opacity = "0";
                              cs.style.right = "8%";
                              cs.style.pointerEvents = "none";
                           }
                     </script>
                  <div>
               </div>
               <a href="addstudent.php" style="margin-left: 10px;"><i class="fa-solid fa-plus"></i>&nbsp; Öğrenci Ekle</a>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="students">
            <?php
               include("connection.php");
               include("linkfunc.php");

               if(isset($_SESSION["giris"]))
               {
                  $veri = $db->prepare("SELECT * FROM students ORDER BY (id = 0) DESC, class DESC");
                  $veri->execute();
                  $students = $veri->fetchAll(PDO::FETCH_ASSOC);

                  foreach($students as $row)
                  {
                     if(strpos($row["class"], "/") !== false)
                     {
                        $class = explode("/",$row["class"]);
                        $class = $class[0].$class[1];
                     }
                     else
                     {
                        $class = "Mezun";
                     }
                     echo '<div class="student '.$class.'">
                              <div class="student-border">
                                 <div class="btns">
                                    <button class="do-btn trash-btn" onclick="sil('.$row["id"].', \''.kisalt($row["name_surname"], 30).'\' , \''.$row["img"].'\')"><i class="fa-solid fa-trash"></i></button>
                                    <button class="do-btn edit-btn" onclick="duzenle('.$row["id"].')"><i class="fa-solid fa-pen-to-square"></i></button>
                                 </div>
                                 <a '; 
                                 if(strpos($row["domain"],".") !== false)
                                 {
                                    echo 'href="https://'.$row["domain"].'"';
                                 }
                                 echo 'target="_blank">
                                    <div class="student-card">
                                       <div class="student-nav">
                                          <div class="student-banner">
                                             <img src="../img/tools/purple-space.jpg">
                                             <div class="student-banner-bg"></div>
                                          </div>
                                          <div class="student-img">
                                             <img src="../img/students/'.$row["img"].'">
                                          </div>
                                       </div>
                                       <div class="student-inf">
                                          <h3>'.$row["name_surname"].'</h3>
                                          <p>'.$row["domain"].'</p>
                                          <span>'.$row["class"].'</span>
                                          <button>WEBSITE</button>
                                       </div>
                                    </div>
                                 </a>
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
   document.querySelector("nav").classList.remove("bg-primary");
   document.querySelector(".menus").classList.remove("bg-primary");

   function upclass() {
   var upclass = document.getElementById("myclass").value;
   if (confirm('"'+ upclass+ '"' + " Sınıfındaki öğrencileri yükseltmek istediğinize emin misiniz?")) {
      $.post("cmd/upclass.php", { class: upclass })
         .done(function(response) {
            if (response === "Sınıftakiler Yükseltildi") {
               window.location.reload();
            }
            console.log(response);
         })
         .fail(function() {
            console.log("Sınıf Yükseltilirken Bir Hata Oluştu");
         });
   }
}

function downclass() {
   var downclass = document.getElementById("myclass").value;
   if (confirm('"'+ downclass+ '"' + " Sınıfındaki öğrencileri düşürmek istediğinize emin misiniz?")) {
      $.post("cmd/downclass.php", { class: downclass })
         .done(function(response) {
            if (response === "Sınıftakiler Düşürüldü") {
               window.location.reload();
            }
            console.log(response);
         })
         .fail(function() {
            console.log("Sınıf Düşürülürken Bir Hata Oluştu");
         });
   }
}


   function sil(sutunId,slide_title,sutunName) {
      if (confirm('"'+ slide_title+ '"' + " Adlı öğrenciyi silmek istediğinize emin misiniz?")) {
         $.post("cmd/silstudent.php", { sutunId: sutunId , sutunName: sutunName })
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
      window.location.href = "editstudent.php?id=" + id;
   }

   var ogrenciler = document.getElementById("students");

   ogrenciler.classList.add("active-menu");
</script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
<script>
      $(document).ready(function() {
         $('.dropdown-item').click(function() {
            const value = $(this).attr('data-filter');
            $('.student').not('.'+value).hide('1000');
            $('.student').filter('.'+value).show('1000');
         })
      })
   </script>
</body>
</html>