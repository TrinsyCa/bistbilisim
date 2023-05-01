const preloader = document.getElementById('preloader');
const loader = document.getElementById('loader');

function delay(time) {
   return new Promise(resolve => setTimeout(resolve, time));
 }
window.addEventListener('load', function()
{
   preloader.style.transition = '1s';
   delay(300).then(() => loader.style.scale = '12');
   delay(300).then(() => preloader.style.opacity = '0');
   delay(300).then(() => preloader.style.zIndex = '-1');
   delay(300).then(() => document.querySelector('body').style.overflowY = 'scroll');
   delay(600).then(() => document.querySelector('body').style.pointerEvents = 'all');
})