const preloader = document.getElementById('preloader');
const loader = document.getElementById('loader');

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
   delay(300).then(() => loader.style.scale = '12');
   delay(300).then(() => preloader.style.opacity = '0');
   delay(300).then(() => preloader.style.zIndex = '-1');
   delay(300).then(() => document.querySelector('body').style.overflowY = 'scroll');
   delay(600).then(() => document.querySelector('body').style.pointerEvents = 'all');
   document.querySelector('.us').style.userSelect = 'text';
   animateCircles();
})
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
   if(window.innerWidth >= 1250)
   {
      if(window.pageYOffset > 600 /*&& window.pageYOffset < 1500*/)
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
      if(window.pageYOffset > 900)
      {
         translate.style.background = 'rgba(0, 0, 0, 0.3)';
         translate.style.boxShadow = '0 0 5px 2px #000';
      }
      else if(window.pageYOffset < 900)
      {
         translate.style.background = 'transparent';
         translate.style.boxShadow = 'none';
      }
      if(window.pageYOffset > 750)
      {
         headertxt.style.paddingTop = '4%';
      }
      if(window.pageYOffset < 750)
      {
         headertxt.style.paddingTop = '0';
      }
      if(window.pageYOffset > 1550 /*&& window.pageYOffset < 2600*/)
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
      if(window.pageYOffset > 1100)
      {
         stTitle.style.opacity = '1';
         stTitle.style.scale = '1';
      }
      else
      {
         stTitle.style.opacity = '0';
         stTitle.style.scale = '0';
      }
      if(window.pageYOffset > 3000)
      {
         vision.style.height = '100%';
         vision.style.padding = '20px 0';
         visionimg.style.height = '285px';
      }
      else if(window.pageYOffset < 3000)
      {
         vision.style.height = '0';
         vision.style.padding = '0';
         visionimg.style.height = '0';
      }
      if(window.pageYOffset > 3600)
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
         translate.style.background = 'rgba(0, 0, 0, 0.3)';
         translate.style.boxShadow = '0 0 5px 2px #000';
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

const coords = { x: 0, y: 0 };
const circles = document.querySelectorAll(".circle");

const colors = [
  //"#ffb56b",
  //"#fdaf69",
  //"#f89d63",
  //"#f59761",
  //"#ef865e",
  //"#ec805d",
  //"#e36e5c",
  //"#df685c",
  //"#d5585c",
  //"#d1525c",
  //"#c5415d",
  //"#c03b5d",
  //"#b22c5e",
  //"#ac265e",
  //"#9c155f",
  //"#950f5f",
  //"#830060",
  //"#7c0060",
  //"#680060",
  //"#60005f",
  //"#48005f",
  //"#3d005e"
];

circles.forEach(function (circle, index) {
  circle.x = 0;
  circle.y = 0;
  circle.style.backgroundColor = colors[index % colors.length];
});

window.addEventListener("mousemove", function(e){
  coords.x = e.clientX;
  coords.y = e.clientY;
  
});

function animateCircles() {
  
  let x = coords.x;
  let y = coords.y;
  
  circles.forEach(function (circle, index) {
    circle.style.left = x - 12 + "px";
    circle.style.top = y - 12 + "px";
    
    circle.style.scale = (circles.length - index) / circles.length;
    
    circle.x = x;
    circle.y = y;

    const nextCircle = circles[index + 1] || circles[0];
    x += (nextCircle.x - x) * 0.25;
    y += (nextCircle.y - y) * 0.25;
  });
 
  requestAnimationFrame(animateCircles);
}