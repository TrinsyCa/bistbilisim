const nav = document.querySelector('nav');
    const blue_line = document.getElementById("sticky_blue_line");
    const wrapper = document.querySelector(".wrapper");
    //const sticky_ads = document.getElementById('sticky_ads');
    

    window.addEventListener('scroll' , () =>
    {
        /*if(window.pageYOffset > 200)
        {
            sticky_ads.style.position = "fixed";
            sticky_ads.style.top = "23%";
        }
        else
        {
            sticky_ads.style.position = "absolute";
            sticky_ads.style.top = "";
            sticky_ads.style.transform = "";
        }*/
        if(window.pageYOffset > 390)
        {
            nav.style.display = "none";
            blue_line.style.position = "fixed";
            blue_line.style.top = "0";
            wrapper.style.paddingTop = "80px";
        }
        else
        {
            nav.style.display = "block";
            blue_line.style.position = "relative";
            blue_line.style.top = "41%";
            wrapper.style.paddingTop = "0";
        }
    });
    
    window.addEventListener('load' , () =>
    {
        var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      centeredSlides: true,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
    });





    function loadContent() {
      var viewportWidth = window.innerWidth || document.documentElement.clientWidth;

      if (viewportWidth < 1400)
      {
          loadMobileContent();
      }
      else
      {
          loadDesktopContent();
      }
  }

  function loadMobileContent() {
      $.ajax({
          url: 'device/mobile.php',
          success: function(data) {
              $('#news').html(data);
          }
      });
  }

  function loadDesktopContent() {
      $.ajax({
          url: 'device/desktop.php',
          success: function(data) {
              $('#news').html(data);
          }
      });
  }

  $(document).ready(function() {
      loadContent();
      window.addEventListener('resize', loadContent);
  });