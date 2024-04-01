<!DOCTYPE html>
<html lang="en">
<head>
<?php    
   session_start(); // Start the session at the beginning
   include "inc/head.inc.php";
?>
<style>
    body {
        background-image: url('images/background_6.png');
        background-size: cover;
        background-repeat: no-repeat;
        margin: 0; /* Ensure there's no default margin */
    }

    .video-section {
         max-width: none;
         padding: 0;
         width: 100%;
         position: relative; /* Relative positioning for the video-section */
    }

      .video-container {
      width: 100%;
      height: 100vh; /* This will make the video fill the entire height of the viewport */
      overflow: hidden; /* Prevents any overflow from being visible */
      position: relative; /* Needed for absolute positioning of the child video */
      margin: 0; /* Resets any default margins */
      padding: 0; /* Resets any default padding */
   }

   #background-video {
      width: 100%;
      height: 100vh;
      object-fit: cover; /* This will cover the entire area of the container */
      position: absolute;
      top: 0;
      left: 0;
   }

   .video-overlay-text {
    font-family: 'Baskerville', serif; /* Use the same font family as the navigation bar */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2; /* This will make it overlay on top of the video */
    /* Add other styling such as color, size as required */
}
</style>
</head>
      <body>
      <?php
         include "inc/header.inc.php";
      ?>
      <main>
      <section class="video-section">
         <div class="video-container"> 
            <video autoplay loop muted playsinline id="background-video">
               <source src="images/intro edit.mp4" type="video/mp4">
               <source src="images/intro edit.webm" type="video/webm"> <!-- Add a WebM format as a fallback -->
               Your browser does not support the video tag.
            </video>
            <div class="video-overlay-text">
               <h3>
                  <img src="images/Icons/CafeLogo4.png" alt="Cat WebCafe Logo" width="100" height="100">
               </h3>
               <h3>
                  Welcome to COFFEE CATZ 
               </h3>
            </div>
         </div>
      </section>
<section class="home" id="next-section" style="color: beige;">
   <div class="swiper home-slider">
      <div class="swiper-wrapper">
         <div class="swiper-slide slide">
            <div class="content">
               <span>Popular!</span>
               <h3>Beef lasagna</h3>
               <a href="menu.php" class="btn">Menu</a>
            </div>
            <div class="image">
               <img src="images/Food/Beef Lasagna.png" alt="Lasagnaaa">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <span>Order Online Now</span>
               <h3>Hawaiian Pizza</h3>
               <a href="menu.php" class="btn">Menu</a>
            </div>
            <div class="image">
               <img src="images/Food/Hawaiian Pizza.png" alt="Hawaiian Pizza">
            </div>
         </div>
      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<section class="category" style="color: beige;">

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
         <img src="images/Icons/desserts.png" alt="Seasonal">
         <h3>Desserts</h3>
      </a>

   </div>

</section>
</main>
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