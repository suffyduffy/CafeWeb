<header class="header">

   <section class="flex">
      <a href="home.php" class="logo"><img src="images/Icons/CafeLogo2.jpg" alt="Cat WebCafe Logo" width="100" height="100"></a>
      <nav class="navbar">
        <a href="menu.php">Menu</a>
        <a href="orders.php">Orders</a>
         <a href="about.php">About Us</a>
         <a href="contact.php">Contact Us</a>
         <a href="cart.php">Cart</a>

      </nav>

      <div class="icons">
         <?php
            // Check if the user is logged in
            if (isset($_SESSION['fname'])) {
               // Display the user's name over the user icon
               echo '<a href="" class="user-btn"><div class="user-name">' . $_SESSION['fname'] . '</div></a>';
               echo '<a href="logout.php"><i class="fa fa-sign-out"></i></a>';
            } else {
               // Display a login icon if the user is not logged in
               echo '<a href="login.php"><i class="fas fa-user"></i></a>';
            }
         ?>
         <div id="user-btn" class=""></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>
   </section>

</header>