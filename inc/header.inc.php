<header class="header">
   <section class="flex">
      <a href="home.php" class="logo"><img src="images/Icons/CafeLogo3.png" alt="Cat WebCafe Logo" width="100" height="100"></a>
      <nav class="navbar">
        <?php
            // Determine active page
            $current_page = basename($_SERVER['PHP_SELF']);
            $menu_active = $current_page == 'menu.php' ? 'active' : '';
            $about_active = $current_page == 'about.php' ? 'active' : '';
            $contact_active = $current_page == 'contact.php' ? 'active' : '';
            $orders_active = $current_page == 'orders.php' ? 'active' : '';
            $cart_active = $current_page == 'cart.php' ? 'active' : '';
        ?>
        <a href="menu.php" class="<?= $menu_active ?>">Menu</a>
        <a href="about.php" class="<?= $about_active ?>">About Us</a>
        <a href="contact.php" class="<?= $contact_active ?>">Contact Us</a>
        <a href="cart.php" class="<?= $cart_active ?>">Cart</a>
        <a href="orders.php" class="<?= $orders_active ?>">Orders</a>
      </nav>

      <div class="icons">
         <?php
            // Check if the user is logged in
            if (isset($_SESSION['fname'])) {
               // Display the user's name over the user icon
               echo '<a href="update_profile.php" class="user-btn"><div class="user-name">' . $_SESSION['fname'] . '</div></a>';
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

<style>
/* Navigation link styles */
.navbar a {
   padding: 10px 15px; /* Adjust padding as needed */
   transition: background-color 0.3s, color 0.3s; /* Smooth transition for hover effect */
   color: white; /* Default text color, change as needed */
   text-decoration: none; /* Remove underline from links */
}

/* Hover effect for navigation links */
.navbar a:hover {
   background-color: black; /* Highlight color on hover */
   color: white; /* Text color on hover, change if needed */
   border-radius: 5px; /* Rounded corners for the highlight, optional */
}

/* Active link styles */
.active {
   background-color: black; /* Optional: if you want to highlight the active item with background color as well */
   color: white; /* Active item text color, change if needed */
}
</style>