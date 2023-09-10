const preloader = document.getElementById('preloader');
const loader = document.getElementById('loader');
const menubtn = document.getElementById('MenuBtn');
const menu = document.getElementById('menu');

function delay(time) {
   return new Promise(resolve => setTimeout(resolve, time));
 }
window.addEventListener('DOMContentLoaded' , function()
{
   fieldsTitle.style.opacity = '1';
   fieldsRow.style.scale = '0.97';
   fieldsRow.style.opacity = '1';
   preloader.style.opacity = '1';
   document.querySelector('.us').style.userSelect = 'none';
})
window.addEventListener('load', function()
{
   fieldsTitle.style.opacity = '0';
   fieldsRow.style.scale = '0';
   fieldsRow.style.opacity = '0';
   preloader.style.transition = '1s';
   loader.style.scale = '12';
   preloader.style.opacity = '0';
   preloader.style.zIndex = '-1';
   document.querySelector('html').style.overflowY = 'scroll';
   document.querySelector('html').style.pointerEvents = 'all';
   document.querySelector('.us').style.userSelect = 'text';
   menu.style.display = 'flex';
})
function showMenu()
{
   menu.style.left = '0';
   document.querySelector('html').style.overflowY = 'hidden';
}
function hideMenu()
{
   menu.style.left = '100%';
   document.querySelector('html').style.overflowY = 'scroll';
}

const nav = document.querySelector('nav');
const translate = document.querySelector('.translate');
const headertxt = document.querySelector('.header-txt');
const studentcol = document.querySelector('.swip-slider');
const studentsBg = document.querySelector('.students-detail .bg-img');
const stBtn = document.querySelector('.students-detail .btn a');
const stTitle = document.querySelector('.students-detail .title h2');
const fieldsRow = document.querySelector('.fields .fields-row');
const fieldsTitle = document.querySelector('.fields h2');
const galleryTitle = document.querySelector('.gallery h2');
const teachersTitle = document.querySelector('.teachers h2');
const vision = document.querySelector('.vision-col');
const visionimg = document.querySelector('.vision-detail .school img');
const contentTxt = document.getElementById('content-txt-wrapper');

window.addEventListener('scroll' , () =>
{
   if(window.innerWidth >= 1180)
   {
      if(window.pageYOffset > 1450 /*&& window.pageYOffset < 1500*/)
      {
         fieldsTitle.style.opacity = '1';
         fieldsRow.style.scale = '0.97';
         fieldsRow.style.opacity = '1';
      }
      else
      {
         fieldsTitle.style.opacity = '0';
         fieldsRow.style.scale = '0';
         fieldsRow.style.opacity = '0';
      }
      if(window.pageYOffset > 750)
      {
         headertxt.style.paddingTop = '4%';
      }
      if(window.pageYOffset < 750)
      {
         headertxt.style.paddingTop = '0';
      }
      if(window.pageYOffset > 2500)
      {
         studentcol.style.opacity = '1';
         studentcol.style.scale = '1.0';
         stBtn.style.opacity = '1';
         stBtn.style.scale = '1.0';
         studentsBg.style.opacity = '1';
         studentsBg.style.top = '50%';
      }
      else
      {
         studentcol.style.opacity = '0';
         studentcol.style.scale = '0.4';
         stBtn.style.opacity = '0';
         stBtn.style.scale = '0.1';
         studentsBg.style.opacity = '0';
         studentsBg.style.top = '140%';
      }
      if(window.pageYOffset > 2000)
      {
         stTitle.style.opacity = '1';
         stTitle.style.scale = '1';
      }
      else
      {
         stTitle.style.opacity = '0';
         stTitle.style.scale = '0';
      }
      if(window.pageYOffset > 3850)
      {
         vision.style.height = '100%';
         vision.style.padding = '20px 0';
         visionimg.style.height = '285px';
      }
      else
      {
         vision.style.height = '0';
         vision.style.padding = '0';
         visionimg.style.height = '0';
      }
      if(window.pageYOffset > 4300)
      {
         teachersTitle.style.opacity = '1';
         teachersTitle.style.scale = '1';
      }
      else
      {
         teachersTitle.style.opacity = '0';
         teachersTitle.style.scale = '0';
      }
   }
   else
   {
         fieldsTitle.style.opacity = '1';
         fieldsRow.style.scale = '0.97';
         fieldsRow.style.opacity = '1';
         headertxt.style.paddingTop = '4%';
         studentcol.style.opacity = '1';
         studentcol.style.scale = '1.0';
         stBtn.style.opacity = '1';
         stBtn.style.scale = '1.0';
         studentsBg.style.opacity = '1';
         studentsBg.style.top = '50%';
         stTitle.style.opacity = '1';
         stTitle.style.scale = '1';
         vision.style.height = '100%';
         vision.style.padding = '20px 0';
         visionimg.style.height = '200px';
         visionimg.style.width = '100%';
         teachersTitle.style.opacity = '1';
         teachersTitle.style.scale = '1';
   }
   nav.classList.toggle('nav-anim',window.scrollY > 900);
});
var deger = false;
function vismis()
{
   if(window.innerWidth >= 1250)
   {
      if(deger == false)
      {
         contentTxt.style.transform = 'translate(-50%,-73.5%)';
         deger = true;
      }
      else if(deger == true)
      {
         contentTxt.style.transform = 'translate(-50%,-22%)';
         deger = false;
      }
   }
   else
   {
      if(deger == false)
      {
         contentTxt.style.transform = 'translate(-98%,0)';
         deger = true;
      }
      else if(deger == true)
      {
         contentTxt.style.transform = 'translate(-44%,0)';
         deger = false;
      }
   }
}