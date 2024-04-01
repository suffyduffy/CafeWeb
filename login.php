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
<section class="form-container">

   <form action="process_login.php" method="post">
      <h1 style="font-size: 40px;">Login Now</h1>
      <input type="email" name="email" required placeholder="Enter your email" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">

      <input type="password" name="password" required placeholder="Enter your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">

      <input type="submit" value="login now" name="submit" class="btn">

      <p>Don't have an account? <a href="register.php">Register now</a></p>
   </form>

</section>
</main>
<?php
   include "inc/footer.inc.php";
?>
</body>
</html>