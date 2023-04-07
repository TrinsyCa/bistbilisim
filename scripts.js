const nav = document.querySelector('nav');
const translate = document.querySelector('.translate');
const headertxt = document.querySelector('.header-txt');
const studentcol = document.querySelector('.students-col');
const stBtn = document.querySelector('.students-detail .btn a');
const fieldsRow = document.querySelector('.fields .fields-row');
const stTitle = document.querySelector('.students-detail .title h2');
const fieldsTitle = document.querySelector('.fields h2');
const galleryTitle = document.querySelector('.gallery h2');
const teachersTitle = document.querySelector('.teachers h2');

window.addEventListener('scroll' , () =>
{
   if(window.pageYOffset > 400 && window.pageYOffset < 1500)
   {
      fieldsTitle.style.opacity = '1';
      fieldsRow.style.scale = '0.97';
      fieldsRow.style.opacity = '1';
   }
   else
   {
      fieldsTitle.style.opacity = '0';
      fieldsRow.style.scale = '0.4';
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
   if(window.pageYOffset > 800)
   {
      headertxt.style.paddingTop = '4%';
   }
   if(window.pageYOffset < 800)
   {
      headertxt.style.paddingTop = '0';
   }
   if(window.pageYOffset > 1500 && window.pageYOffset < 2500)
   {
      studentcol.style.opacity = '1';
      studentcol.style.scale = '1.0';
      stBtn.style.opacity = '1';
      stBtn.style.scale = '1.0';
   }
   else
   {
      studentcol.style.opacity = '0';
      studentcol.style.scale = '0.4';
      stBtn.style.opacity = '0';
      stBtn.style.scale = '0.1';
   }
   if(window.pageYOffset > 1200)
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
      teachersTitle.style.opacity = '1';
      teachersTitle.style.scale = '1';
   }
   nav.classList.toggle('nav-anim',window.scrollY > 900);
});