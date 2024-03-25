<!DOCTYPE html>
<html lang="en">
<head>
<?php
session_start(); // Start the session at the beginning
include "inc/head.inc.php";

// Check if session user is set
if (!isset($_SESSION['fname'])) {
    header("Location: login.php"); // Redirect to login page if session user is not set
    exit();
}

// Include database configuration
$config = parse_ini_file('/var/www/private/db-config.ini');
if (!$config) {
    $errorMsg = "Failed to read database config file.";
    $success = false;
} else {
    // Create a database connection
    $conn = new mysqli(
        $config['servername'],
        $config['username'],
        $config['password'],
        $config['dbname']
    );
    // Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {
        // Get userID from database using fname (assuming fname is unique)
        $fname = $_SESSION['fname']; // Assuming you store fname in session
        $sql = "SELECT member_id FROM cafe_members WHERE fname = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $fname);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $member_id = $row['member_id'];

            // Select items from cart belonging to the logged-in user
            $select_all = "SELECT * FROM cart WHERE member_id = ?";
            $stmt_select = $conn->prepare($select_all);
            $stmt_select->bind_param("i", $member_id);
            $stmt_select->execute();
            $select_result = $stmt_select->get_result();
            $stmt_select->close();
        } else {
            $errorMsg = "User not found.";
            $success = false;
            echo $errorMsg;
        }
    }
    $conn->close();
}
?>
</head>
<body>
<?php
include "inc/header.inc.php";
?>
<div class="heading">
   <h3>Cart</h3>
   <p><a href="home.php">Home </a> <span> / Cart</span></p>
</div>

<section class="products">

   <h1 class="title">Checkout</h1>

   <div class="box-container">
      <?php
      if ($select_result->num_rows > 0) {
         while ($row = $select_result->fetch_assoc()) {
            $foodName = $row["foodName"];
            $foodPrice = $row["foodPrice"];
      ?>
        <div class="food-product">
            <form action="process_delete.php" method="post" class="food-form">
                <input type="hidden" name="cartID" value="<?= $cartID ?>">
                <input type="hidden" name="member_id" value="<?= $member_id ?>">
                <input type="hidden" name="foodName" value="<?= $foodName ?>">
                <article class="food-product">
                    <h1><?= $foodName ?></h1>
                    <p>Price: $<?= $foodPrice ?></p>
                    <figure>
                        <img src="images/Food/<?= $foodName ?>.png" alt="<?= $foodName ?>" class="food-thumbnail" width="200" height="200"/>
                    </figure>
                    <button type="submit" name="add_to_order" class="btn-order">Add to Order</button>
                    <button type="submit" name="delete" class="btn-delete">Delete Item</button>
                </article>
            </form>
        </div>
      <?php
    }
} else {
    echo "No products in the cart.";
}
?>
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
