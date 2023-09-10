<?php
   if(!isset($_SESSION["giris"]))
   {
      header("HTTP/1.0 404 Not Found");
      include($_SERVER['DOCUMENT_ROOT'] . "/bistbilisim.com/404.html");
      return;
   }
?>
<head>
    <!--Google Fonts-->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
   <!--Google Fonts-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

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


   <style>
      *
      {
         margin:0;
         padding:0;
         box-sizing:border-box;
         font-family: 'Nunito', sans-serif;
      }
      .us
      {
         user-select: text;
      }
      .menu
      {
         width:100%;
         height:100vh;
         overflow:hidden;
         position:fixed;
         z-index: 10;
         user-select:none;
         pointer-events:none;
      }
      nav
      {
         width:100%;
         height:50px;
         background:var(--bs-primary);
         display:flex;
         align-items:center;
         justify-content:space-between;
         padding-left:80px;
         box-shadow: 0 0 10px black;
      }
      nav img
      {
         height:92%;
      }
      .nav-menu
      {
         display:flex;
         height:100%;
         position:relative;
      }
      .nav-menu a
      {
         color:white;
         text-decoration:none;
         display:flex;
         align-items:center;
         padding: 5px 15px;
         transition:0.25s;
         pointer-events:auto;
      }
      .nav-menu a:hover
      {
         background:white;
         color: var(--bs-primary);
      }
      .menus
      {
         width: 250px;
         height:100%;
         background:var(--bs-primary);
         position:relative;
      }
      .menus::after
      {
        content:'';
        display:block;
        position:absolute;
        top:0; right: -25px;
        width: 25px;
        height:25px;
        background:transparent;
        border-radius: 50%;
        box-shadow:  -10px -10px 0 var(--bs-primary);
        pointer-events:none;
      }
      .menus a
      {
         color:white;
         text-decoration:none;
         width:100%;
         display:flex;
         justify-content:center;
         padding: 15px 0;
         border-bottom: 2px solid white;
         transition:0.25s;
         position:relative;
         pointer-events:auto;
      }
      .menus a:nth-child(2)
      {
        border-top: 2px solid white;
      }
      .menus a:hover
      {
         background: white;
         color:var(--bs-primary);
      }
      .menus h1
      {
        color: white;
        text-align:center;
        padding:10px 0;
        font-size: 32px;
      }
      body
      {
         overflow:hidden;
      }
      ::-webkit-scrollbar {
         width: 0.5em;
      }
      ::-webkit-scrollbar-thumb {
         background-color: var(--bs-primary);
         border-radius:15px;
      }
      .content
      {
        position:absolute;
        top:0;
        left: 0;
        padding-left:270px;
        padding-right: 10px;
        padding-top: 70px;
        padding-bottom: 20px;
        width:100%;
        height:100%;
        overflow-y:scroll;
        overflow-x:hidden;
      }
      .menus .active-menu
      {
        background:white;
        color:var(--bs-primary);
        position:relative;
      }
      .menus a::after
      {
        content:'';
        width: 5px;
        height: 112%;
        position:absolute;
        right:0;
        top:-5px;
        background: var(--bs-primary);
      }
      .menus a::before
      {
        content:'';
        width: 5px;
        height: 112%;
        position:absolute;
        left:0;
        top:-5px;
        background: var(--bs-primary);
      }
      .user
      {
         font-size: 22px;
         color:white;
         position:relative;
         display:flex;
         align-items:center;
         margin-right: 10px;
      }
      .title
      {
         display:flex;
         align-items:center;
         justify-content:space-between;
         position:relative;
         user-select:none;
      }
      .title a
      {
         border: 3px solid var(--bs-primary);
         padding: 4px 8px;
         border-radius:15px;
         text-decoration:none;
         transition: 0.25s;
      }
      .title a:hover
      {
         background: var(--bs-primary);
         color: white;
      }
      .title .question
      {
         border-radius: 15px;
         font-size: 24px;
         color: var(--bs-primary);
         position:relative;
      }
      .title #question-box
      {
         position:absolute;
         top: 15px;
         right:5px;
         opacity:0;
         background: #0d6dfdcc;
         color: rgba(255,255,255,0.8);
         font-size:16px;
         transition: 0.3s;
         padding: 10px 14px;
         border-radius:15px;
         min-width: 350px;
         max-width:720px;
         max-height:660px;
         user-select:none;
         font-weight:bold;
         pointer-events:none;
         z-index: 999999999;
      }
      .title #question-box hr
      {
         margin:7px 0;
      }
      .title #question-box p
      {
         color:white;
         padding:0;
         margin:0;
      }
      .title #question-box p:nth-child(2)
      {
         color:rgba(255,255,255,0.7);
         font-weight:normal;
      }
      table
      {
         user-select:none;
         border-radius:15px;
         overflow:hidden;
      }
      .table-primary .table-content:hover
      {
         --bs-table-bg:rgb(230, 240, 255);
      }
      table input[type="password"]
      {
         background:transparent;
         border:none;
         pointer-events:none;
         user-select:none;
         text-align:center;
         color:rgba(0,0,0,0.5);
      }
      .table img
      {
         width:140px;
         height:85px;
         border-radius: 15px;
         object-fit:cover;
         object-position:center;
         transition:0.2s;
         font-size:40px;
      }
      .table .pp
      {
         width:85px;
         border-radius:50%;
      }
      .table .banner
      {
         width: 170px;
      }
      .table .pp:active,.table .banner:active
      {
         scale:1.07;
      }
      .table-primary .table-content:hover img
      {
         opacity:0.8;
      }
    </style>
</head>
    <div class="menu">
      <nav class="bg-primary">
         <img src="../img/logo/BIST_Logo_Beyaz.png" alt="Bist Bilişim">
         <div class="nav-menu">
            <div class="user">
               <i class="fa-solid fa-user"></i>&nbsp; <?php echo $_SESSION["isim"]; ?>
            </div>
            <a href="../" target="_blank"><i class="fa-solid fa-desktop"></i>&nbsp; Siteye Git</a>
            <a href="index.php?sayfa=logout"><i class="fa-solid fa-power-off"></i>&nbsp; Çıkış Yap</a>
         </div>
      </nav>
      <div class="menus bg-primary">
        <h1>Bist Bilişim</h1>
        <a href="./" id="mainpage">Anasayfa</a>
        <a href="news.php" id="news">Haberler</a>
        <a href="students.php" id="students">Öğrenciler</a>
        <a href="teachers.php" id="teachers">Öğretmenler</a>
        <a href="contact.php" id="contact">İletişim</a>
        <a href="slider.php" id="slider">Slider Yönetimi</a>
        <a href="gallery.php" id="gallery">Galeri</a>
        <a href="classes.php" id="classes">Sınıflar</a>
        <a href="documents.php" id="documents">Dökümanlar</a>
        <a href="history.php" id="history">Geçmiş</a>
        <a href="admins.php" id="admins">Yöneticiler</a>
      </div>
   </div>
   <script>
      function help_over()
      {
         document.getElementById('question-box').style.opacity = '1';
         document.getElementById('question-box').style.top = '25px';
         document.getElementById('question-box').style.right = '11px';
      }
      function help_out()
      {
         document.getElementById('question-box').style.opacity = '0';
         document.getElementById('question-box').style.top = '15px';
         document.getElementById('question-box').style.right = '0';
      }
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>