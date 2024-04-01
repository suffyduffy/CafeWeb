<!DOCTYPE html>
<html lang="en">
<head>
<?php
   include "inc/head.inc.php";
?>
    <style>
    body {
        background-image: url('images/background_6.png');
        background-size: cover;
        background-repeat: no-repeat;
        margin: 0; /* Ensure there's no default margin */
    }
</style>
</head>
<body>
<?php
   include "inc/header.inc.php";
?>
<main>
<section class="about">
    <div class="row">
        <div class="content">
            <h1 style="text-align: center; font-size: 40px; color: black;">Registration Successful</h1>
            <p style="text-align: center; font-size: 36px; color: black;">Thank you for joining us!</p>
            <a href="login.php" class="btn" style="text-align: center; font-size: 28px;">Log In</a>
        </div>
    </div>
</section>
</main>

    <?php 
        include "inc/footer.inc.php"; 
    ?>
    <div class="loader">
   <img src="images/loader.gif" alt="">
</div>
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>