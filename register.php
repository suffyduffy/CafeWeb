<!DOCTYPE html>
<html lang="en">
<head>
<?php
   include "inc/head.inc.php";
?>
</head>
<body>
<?php
   include "inc/header.inc.php";
?>
<section class="form-container">
   <form action="process_register.php" method="post">
      <h3>Register Now</h3>
    <input type="text" name="fname" placeholder="Enter your name" class="box" maxlength="50">

    <input type="text" name="lname" required placeholder="Enter your last name" class="box" maxlength="50">

    <input type="password" name="password" required placeholder="Enter your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">

    <input type="password" name="pwd_confirm" required placeholder="Confirm your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">

    <input type="text" name="address" required placeholder="Enter your address" class="box" maxlength="255">

    <input type="email" name="email" required placeholder="Enter your email" class="box" maxlength="255" oninput="this.value = this.value.replace(/\s/g, '')">

    <input type="submit" value="Register now" name="submit" class="btn">

    <p>Already have an account? <a href="login.php">Login Now</a></p>
</form>
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