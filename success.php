<!DOCTYPE html>
<html lang="en">
<head>
<?php
   include "inc/head.inc.php";
?>
    <style>
        body {
            background-image: url('images/background_1.png');
            background-size: cover;
            background-repeat: no-repeat;
        }
</style>
</head>
<body>
<?php
   include "inc/header.inc.php";
?>
<section class="about">
    <div class="row">
        <div class="content">
            <h3>Registration Successful</h3>
            <p>Thanks for joining us!</p>
            <a href="login.php" class="btn">Log In</a>
        </div>
    </div>
</section>

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