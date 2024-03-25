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

<div class="heading">
   <h3>about us</h3>
   <p><a href="home.php">Home </a> <span> / About</span></p>
</div>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/Icons/Cafeimage.jpeg" alt="restaurant">
      </div>

      <div class="content">
         <h3>About Us</h3>
         <p>
            Welcome to CoffeeCat, a charming haven for coffee lovers and food enthusiasts! Nestled in the heart of NYP, our café was born from the collective passion and innovative spirit of four students from the Singapore Institute of Technology. 
            Our menu, crafted with meticulous care and a dash of creativity, from aromatic coffees brewed to perfection to mouth-watering pastries and wholesome meals. 
            Each item is a testament to our dedication to offering an exceptional dining experience, even on the go. 
            At CoffeeCat, we believe in the power of good food and great coffee to brighten your day, and we're excited to share our passion with you, one takeaway at a time.
         </p>
         <a href="menu.php" class="btn">our menu</a>
      </div>
   </div>
</section>

<!-- about section ends -->

<!-- steps section starts  -->

<section class="steps">

   <h1 class="title">Steps to taste our food!</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/Icons/Choose Order.png" alt="chooseorder">
         <h3>Choose order</h3>
         <p>Add to cart</p>
      </div>

      <div class="box">
         <img src="images/Icons/OrderConfirmation.png" alt="orderconfirm">
         <h3>Confirm your Order</h3>
         <p>Checkout</p>
      </div>

      <div class="box">
         <img src="images/Icons/Delivery.png" alt="delivery">
         <h3>Fast delivery</h3>
         <p>Wait and enjoy the food</p>
      </div>

   </div>

</section>

<!-- steps section ends -->

<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="title">customer's reviews</h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/Icons/Guyprofile.png" alt="guyprofile">
            <p>I like the food alot its great</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Harry Styles</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/Icons/Guy2profile.png" alt="guy2profile">
            <p>This store really provides real quality food</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>James Cook</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/Icons/Girlprofile.png" alt="girlprofile">
            <p>Amazing choices of drinks and food to takeaway</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Lisa</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/Icons/Guy2profile.png" alt="guy2profile">
            <p>Very quick delivery service</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Steve jobs</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/Icons/Guyprofile.png" alt="guyprofile">
            <p>I would always love ordering the pizzas here</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Elon Musk</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/Icons/Girlprofile.png" alt="girlprofile">
            <p>I love the cheesecake</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Sally</h3>
         </div>

      </div>

      <div class="swiper-pagination"></div>

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

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>


</body>
</html>