const nav = document.querySelector('nav');
const translate = document.querySelector('.translate');
const bar = document.querySelector('.VIpgJd-ZVi9od-ORHb');
window.addEventListener('scroll' , () =>
{
   if(window.pageYOffset > 900)
   {
      translate.style.background = 'rgba(0, 0, 0, 0.3)';
      translate.style.boxShadow = '0 0 5px 2px #000';
   }
   else
   {
      translate.style.background = 'transparent';
      translate.style.boxShadow = 'none';
   }
   nav.classList.toggle('nav-anim',window.scrollY > 900);
});