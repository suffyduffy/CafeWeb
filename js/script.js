let navbar = document.querySelector('.header .flex .navbar');
let profile = document.querySelector('.header .flex .profile');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   profile.classList.remove('active');
   navbar.classList.remove('active');
}

function loader(){
   document.querySelector('.loader').style.display = 'none';
}

function fadeOut(){
   setInterval(loader, 2000);
}

document.addEventListener("DOMContentLoaded", function() {
   var mySwiper = new Swiper('.swiper-container', {
       direction: 'horizontal',
       loop: true,
       pagination: {
           el: '.swiper-pagination',
       },
       navigation: {
           nextEl: '.swiper-button-next',
           prevEl: '.swiper-button-prev',
       },
       scrollbar: {
           el: '.swiper-scrollbar',
       },
   });
});

// window.onload = () => {
//    fadeOut();
 
// var mySwiper = new Swiper('.swiper-container', {
//    // Optional parameters
//    direction: 'horizontal',
//    loop: true,
 
//    // If we need pagination
//    pagination: {
//      el: '.swiper-pagination',
//    },
 
//    // Navigation arrows
//    navigation: {
//      nextEl: '.swiper-button-next',
//      prevEl: '.swiper-button-prev',
//    },
 
//    // And if we need scrollbar
//    scrollbar: {
//      el: '.swiper-scrollbar',
//    },
//  });
 
// }

window.onload = fadeOut;