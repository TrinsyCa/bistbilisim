var key = 0; // Başlangıçta kapalı durumda

function showlanguage() {
   var language = document.getElementById("language");
   
   if (key == 0)
   {
      language.style.opacity = "1";
      language.style.transform = "translateX(-60px)";
      language.style.pointerEvents = "auto";
      key = 1;
   }
   else
   {
      language.style.opacity = "0";
      language.style.transform = "translateX(50px)";
      language.style.pointerEvents = "none";
      key = 0;
   }
}

function loadSize()
{
    var language = document.getElementById("language");

    var viewportWidth = window.innerWidth || document.documentElement.clientWidth;

    if(viewportWidth <= 700)
    {
        language.style.opacity = "0";
        language.style.transform = "translateX(50px)";
        key = 0;
    }
    else
    {
        language.style.opacity = "1";
        language.style.transform = "translateX(0)";
        key = 1;
    }
}

$(document).ready(function() {
    loadSize();
    window.addEventListener('resize', loadSize);
});