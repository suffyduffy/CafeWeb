<!DOCTYPE html>
<html lang="en">
<head>
<?php    
   session_start(); // Start the session at the beginning
   include "inc/head.inc.php";
?>
</head>
<body>
<?php
    include "inc/header.inc.php";
?>
   <section class="video">
    <div class="video-container">
        <iframe src="https://www.youtube.com/embed/aTC_RNYtEb0?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&mute=1&playlist=aTC_RNYtEb0" frameborder="0" allow="autoplay; fullscreen"></iframe>
    </div>
   </section>
<section class="home" id="next-section">
   <div class="swiper home-slider">
      <div class="swiper-wrapper">
         <div class="swiper-slide slide">
            <div class="content">
               <span>Popular!</span>
               <h3>Beef lasagna</h3>
               <a href="menu.php" class="btn">Menu</a>
            </div>
            <div class="image">
               <img src="images/Food/Lasagna.jpg" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>Order Online Now</span>
               <h3>Pepperoni Pizza</h3>
               <a href="menu.php" class="btn">Menu</a>
            </div>
            <div class="image">
               <img src="images/Food/pizza.jpg" alt="">
            </div>
         </div>
      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<section class="category">

   <h1 class="title">Food Category</h1>

   <div class="box-container">

      <a href="menu.php" class="box">
         <img src="images/Icons/apps.png" alt="Apps">
         <h3>Appetisers</h3>
      </a>
   
      <a href="menu.php" class="box">
         <img src="images/Icons/mainD.png" alt="Entre">
         <h3>Main</h3>
      </a>
   
      <a href="menu.php" class="box">
         <img src="images/Icons/drinks.png" alt="Drinks">
         <h3>Beverages</h3>
      </a>
   
      <a href="menu.php" class="box">
         <img src="images/Icons/desserts.png" alt="Desserts">
         <h3>Desserts</h3>
      </a>

   </div>

</section>
<?php
   include "inc/footer.inc.php";
?>
<div class="loader">
   <img src="images/loader.gif" alt="">
</div>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   grabCursor:true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script>

</body>
</html>