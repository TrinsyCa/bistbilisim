const preloader = document.getElementById('preloader');
const loader = document.getElementById('loader');
const menubtn = document.getElementById('MenuBtn');
const menu = document.getElementById('menu');

function delay(time) {
   return new Promise(resolve => setTimeout(resolve, time));
 }
window.addEventListener('load', function()
{
   preloader.style.transition = '1s';
   loader.style.scale = '12';
   preloader.style.opacity = '0';
   preloader.style.zIndex = '-1';
   document.querySelector('body').style.overflowY = 'auto';
   document.querySelector('body').style.pointerEvents = 'all';
   document.querySelector('html').style.overflowY = 'auto';
   document.querySelector('html').style.pointerEvents = 'all';
})
function showMenu()
{
   menu.style.left = '0';
   document.querySelector('html').style.overflowY = 'hidden';
}
function hideMenu()
{
   menu.style.left = '100%';
   document.querySelector('html').style.overflowY = 'auto';
}