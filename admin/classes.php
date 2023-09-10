<?php
   include("connection.php");
   session_start();
   if(!isset($_SESSION["giris"]))
   {
      header("Refresh: 0; url=login.php");
      return;
   }
   $myclass = "";
   if($_GET)
   {
      $myclass = $_GET["class"];
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
         .do-btn
         {
            padding: 0 5px;
            border-radius: 8px;
            color:white;
            border:0;
         }
         .trash-btn
         {
            background:red;
         }
         .form-control
         {
            max-width: 50px;
            text-align:center;
         }
         strong
         {
            pointer-events:none;
            user-select:none;
            font-size:26px;
            padding:0;
            margin:0;
            padding:0 8px;
         }
         .btn
         {
            margin-left:10px;
         }
         .alert
         {
            position:fixed;
            margin-left:auto;
            margin-right: 15px;
            height: 37px;
            display:flex;
            align-items:center;
         }
         .add-btn
         {
            background:#0079FF;
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
         <?php
            if($myclass == "Mezun")
            {
               echo '<h1>'.$myclass.' Öğrenciler | Kullanıcı Bilgileri</h1>
                     <div style="display:flex; gap: 5px;">
                     <a href="classes.php">Sınıflar</a>';
            }
            else if($myclass)
            {
               echo '<h1>'.$myclass.' Öğrencileri | Kullanıcı Bilgileri</h1>
                     <div style="display:flex; gap: 5px;">
                     <a href="classes.php">Sınıflar</a>';
            }
            else
            {
               echo '<h1>Sınıflar</h1>';
            }
            if(isset($_POST["addClass"]))
            {
               $class_no = $_POST["title"];
               $class_name = $_POST["text"];
               $class_add = $class_no."/".$class_name;
               $class_add = strtoupper($class_add);

               $veri = $db->prepare("SELECT * FROM classes WHERE class = ?");
               $veri->execute([$class_add]);
               $existingClass = $veri->fetch(PDO::FETCH_ASSOC);

               if($existingClass)
               {
                  echo '<p class="alert alert-warning">'.$class_add.' Sınıfı Zaten Bulunuyor!</p>';
                  header("Refresh:1; url=classes.php");
               }
               else
               {
                  $veri = $db->prepare("INSERT INTO classes SET class = ?");
                  $veri->execute([$class_add]);

                  if($veri)
                  {
                     echo '<p class="alert alert-success">'.$class_add.' Sınıfı Eklendi</p>';
                     header("Refresh:1; url=classes.php");
                  }
                  else
                  {
                     echo '<p class="alert alert-danger">Sınıf Eklenirken Bir Hata Oluştu</p>';
                     header("Refresh:1; url=classes.php");
                  }
               }
            }

            if($myclass)
            {
               $vericlasses = $db->prepare("SELECT * FROM classes WHERE class = ?");
               $vericlasses->execute([$myclass]);
               $vericlassCount = $vericlasses->fetchAll(PDO::FETCH_ASSOC);
               foreach ($vericlassCount as $row) {
               
                     $veristudents = $db->prepare("SELECT COUNT(*) AS total FROM students WHERE class = ?");
                     $veristudents->execute([$row["class"]]);
                     $studentsCount = $veristudents->fetch(PDO::FETCH_ASSOC)['total'];

                     echo '<strong>'.$studentsCount.' Kullanıcı</strong>
                              </div>';
               }
            }
            else
            {
               echo '<form action="" method="post" style="position:relative; user-select:none; padding-bottom: 15px; display:flex; align-items:center;">
                        <input type="text" maxlength="2" name="title" class="form-control" oninput="moveToNextInput(this, "text")">
                        <br>
                        <strong>/</strong>
                        <input type="text" maxlength="2" name="text" class="form-control">
                        <br>
                        <input type="submit" name="addClass" value="Sınıf Ekle" class="btn btn-outline-primary">
                     </form>';
            }
         ?>

      </div>
      <div class="row">
         <table class="table table-primary">
            <thead>
               <tr>
                  <?php
                     if($myclass)
                     {
                        echo '<th scope="col">Adı Soyadı</th>
                        <th scope="col" style="text-align:center;">Kullanıcı Adı</th>
                        <th scope="col" style="text-align:center;">Şifre</th>
                        <th scope="col" style="text-align:end; padding-right: 20px; width:120px;">Kullanıcı Sil</th>';
                     }
                     else
                     {
                        echo '<th scope="col">Sınıf</th>
                        <th scope="col" style="text-align:center;">Öğrenci Sayısı</th>
                        <th scope="col" style="text-align:end; padding-right: 20px; width:200px;">Öğrenci Ekle / Sınıf Sil</th>';
                     }
                  ?>
               </tr>
            </thead>
            <tbody>
               <?php
                  include("connection.php");
                  include("linkfunc.php");
                  if(isset($_SESSION["giris"]))
                  {
                     if($myclass)
                     {
                        $veriuser = $db->prepare("SELECT * FROM students WHERE class = ?");
                        $veriuser->execute([$myclass]);
                        $users = $veriuser->fetchAll(PDO::FETCH_ASSOC);

                        foreach($users as $row)
                        {
                           echo '<tr style="cursor:pointer" onclick="copyToClipboard(\''.@$row["name_surname"].'\', \''.@$row["username"].'\', \''.$row["pass"].'\');">
                                 <th>'.@$row["name_surname"].'</th>
                                 <th style="text-align:center;">'.@$row["username"].'</th>
                                 <td style="text-align:center;"><input type="password" value="'.$row["pass"].'"></td>
                                 <td style="text-align:end; width:120px; display:flex; justify-content:center; gap: 5px;">';
                                    if(@$class != "Mezun")
                                    {
                                          echo '<button class="do-btn trash-btn" onclick="sil('.$row["id"].', \''.$row["name_surname"].'\' , \''.$row["img"].'\')"><i class="fa-solid fa-trash"></i></button>';
                                    }
                                 echo '</td>
                              </tr>';
                        }
                     }
                     else
                     {
                        $vericlasses = $db->prepare("SELECT *, 
                            SUBSTRING_INDEX(class, '/', 1) AS class_number, 
                            SUBSTRING_INDEX(class, '/', -1) AS class_name 
                            FROM classes 
                            ORDER BY (class = 'Mezun') ASC, 
                                     class_number DESC, 
                                     class_name ASC");
                        $vericlasses->execute();
                        $islemclasses = $vericlasses->fetchAll(PDO::FETCH_ASSOC);
                     
                        foreach ($islemclasses as $row) {
                              @$class = $row["class"];
                        
                              $veristudents = $db->prepare("SELECT COUNT(*) AS total FROM students WHERE class = ?");
                              $veristudents->execute([$class]);
                              $studentsCount = $veristudents->fetch(PDO::FETCH_ASSOC)['total'];
                        
                              echo '<tr style="cursor:pointer" onclick="liststudents(\''.@$class.'\');">
                                 <th>'.@$class.'</th>
                                 <td style="text-align:center;">'.@$studentsCount.'</td>
                                 <td style="text-align:end; width:200px; display:flex; justify-content:center; gap: 5px;">
                                    <a href="addstudent.php?class='.@$class.'" class="do-btn add-btn"><i class="fa-solid fa-plus"></i></a>';
                                    if(@$class != "Mezun")
                                    {
                                       echo '<button class="do-btn trash-btn" onclick="silclass('.$row["id"].', \''.@$class.'\' , \''.@$studentsCount.'\')"><i class="fa-solid fa-trash"></i></button>';
                                    }
                                 echo '</td>
                              </tr>';
                        }
                     }
                  }
               ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<script>
   function liststudents(openclass)
   {
      window.location.href = "classes.php?class=" + openclass;
   }

   function silclass(sutunId, name, studentsCount) {
      event.stopPropagation();
   if (confirm('"' + name + '" Sınıfı Silmek İstediğinize Emin Misiniz?')) {
      if (confirm('Bu İşlemi Yaparsanız"' + name + '" Sınıfında Bulunan '+ studentsCount +' Öğrenci Silinecek !')) {
         var confirmMessage = 'Sınıf Başarıyla Silindi.';

         $.post("cmd/silclass.php", { sutunId: sutunId, name : name })
            .done(function(response) {
               if (response === "Sütun başarıyla silindi") {
                  $("tr[data-sutunId='" + sutunId + "']").remove();
                  $("tr[data-sutunId='" + name + "']").remove();
               } else {
                  confirmMessage = 'Sütun silinirken bir hata oluştu.';
               }
               console.log(response);
               alert(confirmMessage);
               location.reload();
            })
            .fail(function() {
               console.log("Sütün silinirken bir hata oluştu");
               alert(confirmMessage);
            });
         }
      }
   }

   function sil(sutunId, name, sutunName) {
      event.stopPropagation();
   if (confirm('"' + name + '" Öğrencisini silmek istediğinize emin misiniz?')) {
         var confirmMessage = 'Öğrenci başarıyla silindi.';

         $.post("cmd/silstudent.php", { sutunId: sutunId, sutunName: sutunName })
            .done(function(response) {
               if (response === "Sütun başarıyla silindi") {
                  $("tr[data-sutunId='" + sutunId + "']").remove();
                  $("tr[data-sutunId='" + sutunName + "']").remove();
               } else {
                  confirmMessage = 'Sütun silinirken bir hata oluştu.';
               }
               console.log(response);
               alert(confirmMessage);
               location.reload();
            })
            .fail(function() {
               console.log("Sütün silinirken bir hata oluştu");
               alert(confirmMessage);
            });
      }
   }

   function copyToClipboard(name, username, password)
   {
      event.stopPropagation();

      var text = name + '\nKullanıcı Adı: ' + username + '\nŞifre: ' + password;
   
      navigator.clipboard.writeText(text)
         .then(function() {
               alert("Bilgiler panoya kopyalandı");
         })
         .catch(function(error) {
               console.error("Bilgiler kopyalanamadı: ", error);
         });
   }

   var classes = document.getElementById("classes");

   classes.classList.add("active-menu");
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>