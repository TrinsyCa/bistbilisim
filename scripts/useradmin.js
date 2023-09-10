function submitClearBanner() {
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "");

    var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "clear_banner");
    input.setAttribute("value", "1");

    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
 }

 function submitClearCV() {
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", "");

    var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "clear_cv");
    input.setAttribute("value", "1");

    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
 }
 function handleKeyPress(event) {
  const textarea = document.getElementById("about");
  if (event.keyCode === 13 && event.target !== textarea) {
    event.preventDefault();
    document.getElementsByName("main_button")[0].click();
  }
}

const textarea = document.getElementById("about");
textarea.addEventListener("keydown", handleKeyPress);

 // Input alanlarından herhangi birine Enter tuşuna basıldığında handleKeyPress işlevini çağırmak için
 var inputFields = document.querySelectorAll("input, textarea");
 for (var i = 0; i < inputFields.length; i++) {
    inputFields[i].addEventListener("keypress", handleKeyPress);
 }

 function submitClearCV() {
    document.getElementById("clear_cv_form").submit();
 }
    var contentElement = document.querySelector('.content');
var isScrolling = false;

window.addEventListener("wheel", function(event) {
 event.preventDefault(); // Sayfa kaydırmasını engelle
 
 if (!isScrolling) {
    isScrolling = true;

    if (event.deltaY < 0) {
       // Scroll yukarı doğru
       contentElement.scrollTo(0, 0); // İçeriğin en tepesine git
    } else if (event.deltaY > 0) {
       // Scroll aşağı doğru
       contentElement.scrollTo(0, contentElement.scrollHeight); // İçeriğin en altına git
    }

    setTimeout(function() {
       isScrolling = false;
    }, 250);
 }
});

    function closeShadow() {
       document.getElementById("closePıc").style.transition = "4s";
       document.getElementById("closePıc").style.transform = "scale(0)";
       document.getElementById("closePıc").style.opacity = "0";
    }


$('input[name="yukle_resim"]').on('change', function(){
readURL(this, $('.file-wrapper'));  //Change the image
});

$('.close-btn').on('click', function(){ //Unset the image
 let file = $('input[name="yukle_resim"]');
 $('.file-wrapper').css('background-image', 'unset');
 $('.file-wrapper').removeClass('file-set');
 file.replaceWith( file = file.clone( true ) );
});

//FILE
function readURL(input, obj){
if(input.files && input.files[0]){
  var reader = new FileReader();
  reader.onload = function(e){
    obj.css('background-image', 'url('+e.target.result+')');
    obj.addClass('file-set');
  }
  reader.readAsDataURL(input.files[0]);
}
};

  function validateForm() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("new_password").value;
  var confirmPassword = document.getElementById("confirm_password").value;

  if (username.length < 3 || username.length > 30) {
      document.getElementById("username_error").innerHTML = "Kullanıcı Adı En Az 3, En Fazla 30 Karakter Olabilir";
      return false;
  }

  if (password.length < 6) {
      document.getElementById("password_error").innerHTML = "Şifre En Az 6 Karakter Olmalıdır.";
      return false;
  }

  if (password != confirmPassword) {
      document.getElementById("confirm_password_error").innerHTML = "Şifreler Eşleşmiyor.";
      return false;
  }

  return true;
}