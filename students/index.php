<?php
   include("../admin/connection.php");
   session_start();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Öğrenciler - Bist Bilişim | Borsa İstanbul MTAL</title>
   <link rel="stylesheet" href="../css/students.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

   <!--Google Fonts-->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
   <!--Google Fonts-->

   <!-- Google tag (gtag.js) -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11208761348">
   </script>
   <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'AW-11208761348');
   </script>

   <!-- Event snippet for Sayfa görüntüleme conversion page -->
<script>
   gtag('event', 'conversion', {'send_to': 'AW-11208761348/aGvTCMKgt6gYEITA4OAp'});
 </script>
 

   <link rel="shortcut icon" href="../img/logo/BIST_Icon.png">
</head>
<body>
   <div id="preloader">
      <div id="loader">
      <img src="../img/logo/BIST_Icon.png">
      <span style="--i:1;"></span>
      <span style="--i:2;"></span>
      <span style="--i:3;"></span>
      <span style="--i:4;"></span>
      <span style="--i:5;"></span>
      <span style="--i:6;"></span>
      <span style="--i:7;"></span>
      <span style="--i:8;"></span>
      <span style="--i:9;"></span>
      <span style="--i:10;"></span>
      <span style="--i:11;"></span>
      <span style="--i:12;"></span>
      <span style="--i:13;"></span>
      <span style="--i:14;"></span>
      <span style="--i:15;"></span>
      <span style="--i:16;"></span>
      <span style="--i:17;"></span>
      <span style="--i:18;"></span>
      <span style="--i:19;"></span>
      <span style="--i:20;"></span>
      </div>
   </div>
   <nav>
         <div class="nav-wrapper">
            <a href="/">
               <img src="../img/logo/BIST_Logo_Beyaz.png">
            </a>
            <i class="fa fa-bars" id="MenuBtn" aria-hidden="true" onclick="showMenu()"></i>
            <div class="menu" id="menu">
               <ul>
                  <li class="hider">
                     <i class="fa fa-times" onclick="hideMenu()" aria-hidden="true"></i>
                  </li>
                  <li>
                     <a class="menu-link" href="../">Anasayfa</a>
                  </li>
                  <li>
                     <a class="menu-link" href="../news/">Haberler</a>
                  </li>
                  <li>
                     <a class="menu-link" href="../students/">Öğrenciler</a>
                  </li>
                  <li>
                     <a class="menu-link" href="../teachers/">Öğretmenler</a>
                  </li>
                  <li>
                     <a class="menu-link" href="../gallery/">Galeri</a>
                  </li>
                  <li>
                     <a class="menu-link" href="../contact/">İletişim</a>
                  </li>
                  <?php
                     if(@$_SESSION["student"])
                     {
                        echo '<li>
                                 <a class="menu-link" href="../student/'.$_SESSION["username"].'"><i class="fa-solid fa-user"></i></a>
                              </li>';
                     }
                     else if(@$_SESSION["giris"])
                     {
                        echo '<li>
                                 <a class="menu-link" href="../admin/students.php">Yönet</a>
                              </li>';
                     }
                  ?>
               </ul>
            </div>
         </div>
      </nav>
   <div class="wrapper">
      <div class="content-border">
         <div class="content">
            <div class="classes">
               <div class="class all active" data-filter="student">
                  <h3><span>Tümü</span></h3>
               </div>
               <?php
                  $vericlasses = $db->prepare("SELECT *,
                  SUBSTRING_INDEX(class, '/', 1) AS sort_number,
                  SUBSTRING_INDEX(class, '/', -1) AS sort_letter
                  FROM classes
                  ORDER BY (class = 'Mezun') ASC,
                           sort_number DESC,
                           sort_letter ASC");

                  $vericlasses->execute();
                  $classes = $vericlasses->fetchAll(PDO::FETCH_ASSOC);

                  foreach($classes as $row)
                  {
                     $veristudents = $db->prepare("SELECT COUNT(*) AS total FROM students WHERE class = ?");
                     $veristudents->execute([$row["class"]]);
                     $studentsCount = $veristudents->fetch(PDO::FETCH_ASSOC)['total'];
                     
                     if($studentsCount >= 1)
                     {
                        if(strpos($row["class"], "/") !== false)
                        {
                           $cutclass = explode("/", $row["class"]);
                           $cutclass = $cutclass[0] . $cutclass[1];
                        }
                        else
                        {
                           $cutclass = $row["class"];
                        }
                        echo '<div class="class" data-filter="'.$cutclass.'">
                                 <h3>'.$row["class"].'</h3>
                              </div>';
                     }
                  }
               ?>
            </div>
            <div class="students-bg">
               <div class="students">
                  <div class="students-wrapper">
                     <div class="students-col">
                        <?php
                           $veri = $db->prepare("SELECT *, 
                           SUBSTRING_INDEX(class, '/', 1) AS class_number, 
                           SUBSTRING_INDEX(class, '/', -1) AS class_name 
                           FROM students
                           ORDER BY (id != 0) ASC, 
                                    RAND()");
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
                                       <a';
                                          if($row["username"])
                                          {
                                            echo ' href="../student/'.$row["username"].'"';
                                          }
                                             echo'><div class="student-card">
                                                <div class="student-nav">
                                                   <div class="student-banner">';
                                                      if($row["banner"])
                                                      {
                                                         echo '<img src="../img/students/banners/'.$row["banner"].'">';
                                                      }
                                                      else
                                                      {
                                                         echo '<img src="../img/tools/purple-space.jpg">';
                                                      }
                                                   echo'<div class="student-banner-bg"></div>
                                                   </div>
                                                   <div class="student-img">
                                                      <img src="../img/students/'.$row["img"].'">
                                                   </div>
                                                </div>
                                                <div class="student-inf">
                                                   <h3 id="name-surname">'.$row["name_surname"].'</h3>
                                                </div>';
                                                if($row["username"])
                                                {
                                                  echo '<p>@'.$row["username"].'</p>';
                                                }
                                                echo '<span>'.$row["class"].'</span>';
                                                if($row["username"])
                                                {
                                                  echo '<button>Profile Git</button>';
                                                }
                                             echo'</div>
                                          </a>
                                       </div>
                                    </div>';
                           }
                        ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <footer>
         <p class="bist"><g translate="no">© Borsa İstanbul Başakşehir MTAL </g> | Bilişim Teknolojileri Bölümü</p>
         <p class="trinsyca"><g>Created by </g><a href="TrinsyCa">TrinsyCa </a></p> <!--imza : Ömer İslamoğlu-->
      </footer>
   </div>
   <script
   src="https://code.jquery.com/jquery-3.6.4.js"
   integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
   crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
   <script src="../scripts/page.js"></script>
   <script>
      $(document).ready(function() {
         $('.class').click(function() {
            const value = $(this).attr('data-filter');
            $('.student').not('.'+value).hide('1000');
            $('.student').filter('.'+value).show('1000');
         })
         $('.class').click(function()
         {
            $(this).addClass('active').siblings().removeClass('active');
         })
      });
   </script>
</body>
</html>