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
                $select_all = "SELECT * FROM orders WHERE member_id = ?";
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
    <div class="heading">
        <h3>Orders</h3>
        <p><a href="home.php">Home </a> <span> / Orders</span></p>
    </div>

    <section class="products">
        <h1 class="title">Order History</h1>
        <div class="box-container">
            <?php
            if ($select_result->num_rows > 0) {
                while ($row = $select_result->fetch_assoc()) {
                    $foodOrder = $row["foodOrder"];
                    $totalPrice = $row["totalPrice"];
                    $orderDate = $row["orderDate"];
                    ?>
                <div class="food-product">
                        <h2 style="text-align: center; font-size: 32px; color: #333;">Order Details</h2>
                        <p style="text-align: center; font-size: 28px; color: #666;">Order On: <?= $orderDate ?></p>
                        <h3 style="text-align: center; font-size: 28px; color: #666;">Total Price: $<?= $totalPrice ?></h3>
                        <ul style="list-style-type: none; padding: 0; text-align: center;">
                            <?php
                            // Split the line-separated string into an array
                            $foodNamesArray = explode("\n", $foodOrder);
                            foreach ($foodNamesArray as $foodName) {
                                echo '<li style="font-size: 24px; color: #333;">' . $foodName . '</li>';
                            }
                            ?>
                        </ul>
                </div>
                <?php
                }
            } else {
                echo "No order made.";
            }
            ?>
        </div>
    </section>
    </main>
    <?php
    include "inc/footer.inc.php";
    ?>
        <div class="loader">
        <img src="images/loader.gif" alt="">
    </div>
</body>
<script src="js/script.js"></script>
<style>
    .food-product {
        border: 1px solid #333;
        background-color: var(--white);
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: box-shadow 0.3s ease-in-out;
        box-sizing: border-box;
        border-radius: 8px;

        background-image: url('images/Icons/menu_background.jpg'); /* Add your image path here */
        background-size: cover; /* This will make sure that your background covers the entire element */
        background-position: center; /* This will center your background image */

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center; /* This will center the text elements */
    }

    .food-product:hover {
        box-shadow: 0 6px 30px rgba(255,0,0,0.7); /* Changes the shadow on hover */
        }
</style>
</html>