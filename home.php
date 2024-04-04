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
      .home-section {
            max-width: none;
            padding: 0;
            width: 100%;
            position: relative; /* Relative positioning for the video-section */
      }
      .category {
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

      .visually-hidden {
      position: absolute;
      width: 1px;
      height: 1px;
      margin: -1px;
      padding: 0;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      white-space: nowrap; /* added to ensure the text does not wrap */
      border-width: 0;
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

      .home .btn {
         background-color: #E7BEBB; /* Beige background */
         color: #333; /* Dark text color for contrast */
      }

      .box-container {
      display: flex;
      justify-content: space-around; /* Adjusts space distribution */
      align-items: center;
      flex-wrap: nowrap; /* Ensures the boxes stay in a single row */
      width: 100%; /* Ensure the container spans the full width */
      box-sizing: border-box; /* Ensures padding and borders are included in the width */
      }

      .box {
         flex: 1; /* Flex grow to distribute space */
         text-align: center;
         margin: 0 10px; /* Adds space between the boxes */
         transition: background-color 0.3s; /* Smooth transition for hover effect */
      }

      .box:hover {
         background-color: gray; /* Replace #desiredColor with the color you want */
         outline: none; /* Removes outline */
      }

      .box:hover img {
         opacity: 1; /* Keep the image fully visible */
      }

      .box h2 {
         color: black; /* or any dark color you prefer */
         font-size: 28px;
         margin: 0; /* Removes default margin */
      }

      /* Ensure that the hover effect does not change the image */
      .category .box:hover img {
         background-color: transparent; /* Keep the image background transparent */
         outline: none; /* Remove outline */
      }

      /* Reset any default padding or margins that might cause layout issues */
      .category .box a {
         display: block; /* Makes the link fill the area of `.box` */
         padding: 0;
         margin: 0;
      }
   </style>
</head>
<body>
   <?php include "inc/header.inc.php"; ?>
      <main>
         <h1 class="visually-hidden">COFFEE CATZ</h1>
         
         <div class="video-section">
            <div class="video-container">
               <h2 class="visually-hidden">Video Background Section</h2> 
               <video autoplay loop muted playsinline id="background-video">
                  <source src="images/intro_edit.mp4" type="video/mp4">
                  <source src="images/intro.mp4" type="video/webm">
                  Your browser does not support the video tag.
               </video>
            <div class="video-overlay-text">
               <h3>
                  <img src="images/Icons/CafeLogo4.png" alt="Cat WebCafe Logo" width="100" height="100">
               </h3>
               <h4>
                  Welcome to COFFEE CATZ 
               </h4>
            </div>
         </div>
   </div>
   <div class="home">
      <h2 class="visually-hidden">Home Section Slider</h2>
      <div class="swiper home-slider">
         <div class="swiper-wrapper">
            <div class="swiper-slide slide">
               <div class="content">
                  <span>Popular!</span>
                  <h3>Home Brewed Coffee</h3>
                  <a href="menu.php" class="btn">Menu</a>
               </div>
               <div class="image">
                  <img src="images/Food/Home_Brewed_Coffee.png" alt="coffee">
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="content">
                  <span>Order Online Now</span>
                  <h3>Hawaiian Pizza</h3>
                  <a href="menu.php" class="btn">Menu</a>
               </div>
               <div class="image">
                  <img src="images/Food/Hawaiian_Pizza.png" alt="Hawaiian Pizza">
               </div>
            </div>
         </div>

         <div class="swiper-pagination"></div>

      </div>

   </div>

   <div class="category">
      <h2 class="visually-hidden">Food Category</h2>
      <div class="box-container">

         <a href="menu.php" class="box">
            <img src="images/Food/Hawaiian_Pizza.png" alt="Pizza" style="filter: none;">
            <h2>Pizzas</h2>
         </a>
      
         <a href="menu.php" class="box">
            <img src="images/Food/Beef_Burger.png" alt="Burger" style="filter: none;">
            <h2>Main</h2>
         </a>
      
         <a href="menu.php" class="box">
            <img src="images/Food/HomeMade_Orange_Juice.png" alt="OJuice" style="filter: none;">
            <h2>Beverages</h2>
         </a>
      
         <a href="menu.php" class="box">
            <img src="images/Food/Raspberry_Cheesecake.png" alt="Cheesecake" style="filter: none;">
            <h2>Desserts</h2>
         </a>

      </div>
   </div>

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