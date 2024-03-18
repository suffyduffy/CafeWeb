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

   <form action="process_login.php" method="post">
      <h3>Login Now</h3>
      <input type="email" name="email" required placeholder="Enter your email" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">

      <input type="password" name="password" required placeholder="Enter your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">

      <input type="submit" value="login now" name="submit" class="btn">

      <p>Don't have an account? <a href="register.php">Register now</a></p>
   </form>

</section>
<?php
   include "inc/footer.inc.php";
?>