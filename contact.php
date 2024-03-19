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
   <h3>contact us</h3>
   <p><a href="home.php">Home </a> <span> / Contact Us</span></p>
</div>

<section class="contact">

   <div class="row">

      <div class="image">
         <img src="images/contact-img.svg" alt="">
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