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
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6708.111371444832!2d103.84431449069872!3d1.3765474444663477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da16e96db0a1ab%3A0x3d0be54fbbd6e1cd!2sSingapore%20Institute%20of%20Technology%20(SIT%40NYP)!5e0!3m2!1sen!2ssg!4v1710988482062!5m2!1sen!2ssg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   <div class="contact-info">
      <h3>Our Store</h3>
      <p><i class="fas fa-map-marker-alt"></i>172 Ang Mo Kio Ave 8, Singapore 567739</p>
      <p><i class="fas fa-phone"></i>Phone: +65 9888 8888</p>
      <p><i class="fas fa-envelope"></i>Email: Coffeecat@gmail.com</p>
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