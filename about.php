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
         <img src="images/Icons/rest.png" alt="restaurant">
      </div>

      <div class="content">
         <h3>About Us</h3>
         <p>We are just a bunch of students LMAO</p>
         <a href="menu.php" class="btn">our menu</a>
      </div>
   </div>

</section>
<?php
   include "inc/footer.inc.php";
?>
<div class="loader">
   <img src="images/loader.gif" alt="">
</div>

<script src="js/script.js"></script>


</body>
</html>