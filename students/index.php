<?php
   include("../admin/connection.php");
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
   <div class="wrapper">
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
                     <a class="menu-link" href="./">Anasayfa</a>
                  </li>
                  <li>
                     <a class="menu-link" href="news/">Haberler</a>
                  </li>
                  <li>
                     <a class="menu-link" href="students/">Öğrenciler</a>
                  </li>
                  <li>
                     <a class="menu-link" href="teachers/">Öğretmenler</a>
                  </li>
                  <li>
                     <a class="menu-link" href="gallery/">Galeri</a>
                  </li>
                  <li>
                     <a class="menu-link" href="contact/">İletişim</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
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
                           ORDER BY (class = 'Mezun') ASC, 
                                    class_number DESC, 
                                    class_name ASC");
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
                        ?>
                        <!-- #region 11B Öğrencileri-->
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://trinsyca.bistbilisim.com/" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/Omer_Islamoglu.jpg">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Ömer İslamoğlu</h3>
                                       <p>trinsyca.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://quarder.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/Quarder.jpg">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Emre Çiçek</h3>
                                       <p>quarder.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://yebusa.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Yusuf Buğra Bulur</h3>
                                       <p>yebusa.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://saraserg.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Semih Aras Ergurum</h3>
                                       <p>saraserg.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://omertarik.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Ömer Tarık Dilaver</h3>
                                       <p>omertarik.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://erayk.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Eray</h3>
                                       <p>erayk.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://eanil.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Erdal Anıl Alkan</h3>
                                       <p>enail.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://ahmetn.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Ahmet Nejder Özer</h3>
                                       <p>ahmetn.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://aenes.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Ali Enes</h3>
                                       <p>aenes.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://mda.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Mehmet Deniz Ay</h3>
                                       <p>mda.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://saydeniz.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Sefa Aydeniz</h3>
                                       <p>saydeniz.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://mohamad.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Mohamad Sawan</h3>
                                       <p>mohamad.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://menestkn.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Muhammed Enes Aytekin</h3>
                                       <p>menestkn.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://hkt.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Muhammet Hüseyin Kurt</h3>
                                       <p>hkt.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://ozyilmaz.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Barış Özyılmaz</h3>
                                       <p>ozyilmaz.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://mtalha.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Muhammed Talha Topuz</h3>
                                       <p>mtalha.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://insane.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Nidanur Karahalil</h3>
                                       <p>insane.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://ihsangokturk.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>İhsan Muhammet Göktürk</h3>
                                       <p>ihsangokturk.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://ebubekir.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Ebubekir Sur</h3>
                                       <p>ebubekir.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://damlamubin.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Damla Mübin</h3>
                                       <p>damlamubin.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://esmanurkusku.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Esmanur Kuşku</h3>
                                       <p>esmanurkusku.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://saidaydan.bistbilisim.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Said Aydan</h3>
                                       <p>saidaydan.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <!-- Almamış Olanlar 
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://oislamoglu.bistbilisim.com/" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Yusuf Kırdar</h3>
                                       <p>oislamoglu.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://oislamoglu.bistbilisim.com/" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Esma Gedikoğlu</h3>
                                       <p>oislamoglu.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11B">
                           <div class="student-border">
                              <a href="https://oislamoglu.bistbilisim.com/" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>İbrahim Çakır</h3>
                                       <p>oislamoglu.bistbilisim.com</p>
                                       <span>11/B</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        -->
                        <!-- #endregion 11B Öğrencileri-->
                        <!-- #region 11AB Öğrencileri-->
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://bilal1453.turksupp.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Bilal Karadeniz</h3>
                                       <p>bilal1453.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://efecanacar.turksupp.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Efecan Acar</h3>
                                       <p>efecanacar.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://emirtuna.turksupp.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Emir Tuna Çelik</h3>
                                       <p>emirtuna.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://erenyilmaz.turksupp.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Muhammed Eren Yılmaz</h3>
                                       <p>erenyilmaz.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://ggramark.turksupp.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Ege Gültepe</h3>
                                       <p>ggramark.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://itsmusa.turksupp.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Muhammed Musa Aydeniz</h3>
                                       <p>itsmusa.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://mcsknyy.turksupp.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Muhammed Ali Coşkun</h3>
                                       <p>mcsknyy.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://ozanbarin.turksupp.com/" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Mustafa Ozan Barın</h3>
                                       <p>ozanbarin.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://saruhanhalit.turksupp.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Fahri Halit Saruhan</h3>
                                       <p>saruhanhalit.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://semihk.turksupp.com" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Semih Burhanettin Karga</h3>
                                       <p>semihk.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://yasirt.turksupp.com/" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Yasir Tapar</h3>
                                       <p>yasirt.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://yusuf.turksupp.com/" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Yusuf Evni</h3>
                                       <p>yusuf.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://yusufefe.turksupp.com/" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Yusuf Efe Çetintaş</h3>
                                       <p>yusufefe.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://yusufkapkiner.turksupp.com/" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Yusuf Kapkiner</h3>
                                       <p>yusufkapkiner.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://alparslan.turksupp.com/" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Mehmet Alp Arslan</h3>
                                       <p>alparslan.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://bugra.turksupp.com/" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Özgür Buğra Arslan</h3>
                                       <p>bugra.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <div class="student 11AB">
                           <div class="student-border">
                              <a href="https://bartu.turksupp.com/" target="_blank">
                                 <div class="student-card">
                                    <div class="student-nav">
                                       <div class="student-banner">
                                          <img src="../img/tools/purple-space.jpg">
                                          <div class="student-banner-bg"></div>
                                       </div>
                                       <div class="student-img">
                                          <img src="../img/Users/default-user.png">
                                       </div>
                                    </div>
                                    <div class="student-inf">
                                       <h3>Bartu Şentürk</h3>
                                       <p>bartu.turksupp.com</p>
                                       <span>11/AB</span>
                                       <button>İnternet Sitesi</button>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        <!-- #endregion 11AB Öğrencileri-->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <footer>
         <p class="bist"><g translate="no">© Borsa İstanbul Başakşehir MTAL </g> | Bilişim Teknolojileri Bölümü</p>
         <p class="trinsyca"><a href="https://trinsyca.bistbilisim.com/" target="_blank">TrinsyCa </a> <g> Tarafından Oluşturuldu</g></p> <!--imza : Ömer İslamoğlu-->   
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
      })
   </script>
</body>
</html>