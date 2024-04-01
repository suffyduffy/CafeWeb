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
    <h3>Cart</h3>
    <p><a href="home.php">Home </a> <span> / Cart</span></p>
    </div>

    <section class="products">

    <h1 class="title">Checkout</h1>
    <div class="box-container">
    <?php
        $totalPrice = 0;
        $foodNames = []; // Array to store food names

        if ($select_result->num_rows > 0) {
            while ($row = $select_result->fetch_assoc()) {
                $foodName = $row["foodName"];
                $foodPrice = $row["foodPrice"];

                // Add each food name to the array
                $foodNames[] = $foodName;

                // Add each food price to the total
                $totalPrice += $foodPrice;
    ?>
            <div class="food-product">
                <h2 style="text-align: center; font-size: 24px; color: black;"><?= $foodName ?></h2>
                <p style="text-align: center; font-size: 20px; color: black;">Price: $<?= $foodPrice ?></p>
                <figure>
                    <img src="images/Food/<?= $foodName ?>.png" alt="<?= $foodName ?>" class="food-thumbnail" width="200" height="200"/>
                </figure>
                <form action="process_delete.php" method="post">
                    <input type="hidden" name="cartID" value="<?= $row['cartID'] ?>">
                    <input type="hidden" name="member_id" value="<?= $member_id ?>">
                    <input type="hidden" name="foodName" value="<?= $foodName ?>">
                    <button type="submit" name="delete" class="btn-delete">Delete</button>
                </form>
            </div>

        <?php
            }
            // Display the grand total after looping through all items
            echo '<div class="total-price-container">';
            echo '<div class="total-price" style="font-size: 32px; color: black;">Grand Total: $' . number_format($totalPrice, 2) . '</div>';
            echo '<form action="process_checkout.php" method="post">';
            echo '<input type="hidden" name="member_id" value="' . $member_id . '">';
            echo '<input type="hidden" name="foodNames" value="' . implode("\n", $foodNames) . '">'; 
            echo '<input type="hidden" name="totalPrice" value="' . $totalPrice . '">';
            echo '<button type="submit" name="checkout_all" class="btn-order">Checkout</button> ';
            echo '</form>';
            echo '</div>';
        } else {
            echo "No products in the cart.";
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
        .btn-order-container {
            display: flex;
            justify-content: center;
            margin-top: 20px; /* Adjust margin as needed */
        }
        /* Add border styling to the button */
        .btn-order {
            border: 2px solid #333; /* Change border color and width as desired */
            padding: 10px 20px; /* Adjust padding as needed */
            background-color: #fff; /* Button background color */
            color: #333; /* Button text color */
            font-size: 32px; /* Adjust font size as needed */
            font-weight: bold;
            margin: 2px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s; /* Smooth transition for hover effect */
        }

        /* Add hover effect */
        .btn-order:hover {
            background-color:#333; /* Change background color on hover */
            color: #fff; /* Change text color on hover */
            border-color: #ebece6; /* Change border color on hover */
        }
                /* Add border styling to the button */
        .btn-delete {
            border: 2px solid #333; /* Change border color and width as desired */
            padding: 10px 20px; /* Adjust padding as needed */
            background-color: #fff; /* Button background color */
            color: #333; /* Button text color */
            font-size: 18px; /* Adjust font size as needed */
            font-weight: bold;
            margin: 2px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s; /* Smooth transition for hover effect */
        }

        /* Add hover effect */
        .btn-delete:hover {
            background-color: #333; /* Change background color on hover */
            color: #fff; /* Change text color on hover */
            border-color: #333; /* Change border color on hover */
        }

        /* Add zoom effect to product images */
        .food-thumbnail {
            transition: transform 0.3s ease-in-out; /* Smooth transition for zoom effect */
        }

        .food-thumbnail:hover {
            transform: scale(1.3); /* Zoom in by 10% on hover */
        }

        /* Center align products */
        .box-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px; /* Adjust spacing between products */
            padding: 20px; /* Add padding around products */
        }

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
        .total-price-container {
            text-align: center;
            margin-top: 20px; /* Adjust margin as needed */
        }

        .total-price {
            font-size: 24px;
            color: #333;
            margin-top: 10px; /* Adjust margin as needed */
        }
    </style>
</html>