<!DOCTYPE html>
<html lang="en">
<head>
<?php
   session_start();
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
   <form action="process_update.php" method="post">
      <h1 style="text-align: center; font-size: 40px; color: black;">Update Profile</h1>
      <input type="hidden" name="session_name" value="<?php echo $_SESSION['fname']; ?>">
      <input type="text" name="fname" required placeholder="Enter your first name" class="box" maxlength="50">

      <input type="text" name="lname" required placeholder="Enter your last name" class="box" maxlength="50">

      <input type="password" name="password" required placeholder="Change password" class="box" minlength="8" oninput="this.value = this.value.replace(/\s/g, '')">

      <input type="password" name="pwd_confirm" required placeholder="Confirm password" class="box" minlength="8" oninput="this.value = this.value.replace(/\s/g, '')">

      <input type="text" name="address" required placeholder="Update address" class="box" maxlength="255">

      <input type="email" name="email" required placeholder="Update email" class="box" maxlength="50">

      <input type="submit" value="Update" name="submit" class="btn">
   </form>
</section>
</main>

<?php
   include "inc/footer.inc.php"; // Include your footer section here
?>
</body>
</html>
