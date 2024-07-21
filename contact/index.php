<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <link rel="stylesheet" href="../css/contact.css">

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


   <title>İletişim - Bist Bilişim | Borsa İstanbul MTALa</title>
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
         <a href="../">
            <img src="../img/logo/BIST_Logo_Beyaz.png">
         </a>
         <i class="fa fa-bars" id="MenuBtn" aria-hidden="true" onclick="showMenu()"></i>
         <div class="menu" id="menu">
            <ul>
               <li class="hider">
                  <i class="fa fa-times" onclick="hideMenu()" aria-hidden="true"></i>
               </li>
               <li>
                  <!--Translate-->
                  <div class="translate">
                     <div id="google_translate_element"></div>
                  </div>
                  <script type="text/javascript">
                  function googleTranslateElementInit() {
                  new google.translate.TranslateElement({pageLanguage: 'tr', includedLanguages: 'tr,en,ru,es,ar,ko,zh-CN' ,layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                  }
                  </script>
                  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                  <!--Translate-->
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
                  <a class="menu-link" href="../teachers">Öğretmenler</a>
               </li>
               <li>
                  <a class="menu-link" href="../gallery">Galeri</a>
               </li>
               <li>
                  <a class="menu-link" href="./">İletişim</a>
               </li>
               <?php
                  if(@$_SESSION["giris"])
               ?>
            </ul>
         </div>
      </div>
   </nav>
	<div class="container">
		<div class="contact-box">
			<div class="left">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3007.182899248681!2d28.80338021253807!3d41.0868502712202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caaf7a760e39a9%3A0x699a7f51c35cd31b!2sBorsa%20%C4%B0stanbul%20Ba%C5%9Fak%C5%9Fehir%20Mesleki%20ve%20Teknik%20Anadolu%20Lisesi!5e0!3m2!1str!2str!4v1683047974776!5m2!1str!2str" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
			<div class="right">
				<h1>İletişim</h1>
            <?php
                  include("../admin/connection.php");
                  include("../admin/linkfunc.php");
                  if(@$_POST)
                  {
                     @$name = htmlspecialchars(@$_POST["name"]);
                     @$email = htmlspecialchars(@$_POST["email"]);
                     @$tel = htmlspecialchars(@$_POST["tel"]);
                     @$message = htmlspecialchars(@$_POST["message"]);
   
                     if(empty(@$name) || empty(@$email) || empty(@$tel) || empty(@$message))
                     {
                        echo '<p class="alert alert-warning">Lütfen Boş Bırakmayınız..</p>';
                        header("Refresh:2; url=./");
                     }
                     else
                     {
                        $veriekle = $db->prepare("INSERT INTO contact SET name = ? , email = ? , tel = ? , message = ?");
                        $veriekle -> execute([
                           @$name,
                           @$email,
                           @$tel,
                           @$message,
                        ]);
                        if($veriekle)
                        {
                           echo '<p class="alert alert-success">Mesajınız Gönderildi</p>';
                           header("Refresh: 2; url=./");
                        }
                        else
                        {
                           echo '<p class="alert alert-danger">Mesajınız İle İlgili Bir Sorun Oluştu</p>';
                           header("Refresh:3; url=./");
                        }
                     }
                  }
               ?>
				<form action="" method="post">
               <input type="text" name="name" class="field" placeholder="Ad Soyad">
				   <input type="email" name="email" class="field" placeholder="E-Mail">
				   <input onkeydown="phoneNumberFormatter();" id="phone-number" name="tel" class="field" placeholder="Telefon">
				   <textarea placeholder="Mesajınız" name="message" class="field"></textarea>
				   <input type="submit" value="Gönder" class="btn btn-outline-primary">
            </form>
			</div>
		</div>
	</div>
   <footer>
      <p class="bist"><g translate="no">© Borsa İstanbul Başakşehir MTAL </g> | Bilişim Teknolojileri Bölümü</p>
      <p class="trinsyca" translate="no"><g>Created by </g><a href="../student/TrinsyCa">TrinsyCa </a></p> <!-- Signature : Ömer İslamoğlu ~ https://trinsyca.com -->
   </footer>
   <!-- JavaScript -->
   <script>
      function formatPhoneNumber(value)
      {
         if(!value) return value;
         const phoneNumber = value.replace(/[^\d]/g, '');
         const phoneNumberLength = phoneNumber.length;
         if(phoneNumberLength < 4) return phoneNumber;
         if(phoneNumberLength < 7)
         {
            return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3)}`;
         }
         return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(
            3,
            6,
         )}-${phoneNumber.slice(6, 9)}`;
      }
      function phoneNumberFormatter()
      {
         const inputField = document.getElementById('phone-number');
         const formattedInputValue = formatPhoneNumber(inputField.value);
         inputField.value = formattedInputValue;
      }
   </script>
   <script src="https://kit.fontawesome.com/b40b33d160.js" crossorigin="anonymous"></script>
   <script src="../scripts/page.js"></script>
</body>
</html>