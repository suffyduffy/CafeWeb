<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        /* Add border styling to the button */
        .btn-order {
            border: 2px solid #333; /* Change border color and width as desired */
            padding: 10px 20px; /* Adjust padding as needed */
            background-color: #fff; /* Button background color */
            color: #333; /* Button text color */
            font-size: 16px; /* Adjust font size as needed */
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s; /* Smooth transition for hover effect */
        }

        /* Add hover effect */
        .btn-order:hover {
            background-color: #333; /* Change background color on hover */
            color: #fff; /* Change text color on hover */
            border-color: #333; /* Change border color on hover */
        }

        /* Add zoom effect to product images */
        .food-thumbnail {
            transition: transform 0.3s ease-in-out; /* Smooth transition for zoom effect */
        }

        .food-thumbnail:hover {
            transform: scale(3.3); /* Zoom in by 10% on hover */
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
        }

        .food-product:hover {
            box-shadow: 0 6px 30px rgba(255,0,0,0.7); /* Changes the shadow on hover */
        }
    </style>
</head>
<body>
<?php
    session_start(); // Start the session at the beginning
    include "inc/head.inc.php";
    $config = parse_ini_file('/var/www/private/db-config.ini');
    if (!$config) {
        $errorMsg = "Failed to read database config file.";
        $success = false;
    } else {
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
            // Fetch food products from the database
            $sql = "SELECT foodName, foodPrice FROM foodItems";
            $result = $conn->query($sql);
        }
        $conn->close();
    }

    include "inc/header.inc.php";

    // Check if the user is logged in
    if (!isset($_SESSION['fname'])) {
        $loggedIn = false;
        $dialogMessage = "You must be logged in to add items to cart.";
    } else {
        $loggedIn = true;
        $dialogMessage = "Item added to cart.";
    }
?>
<div class="heading">
    <h3>Our Menu</h3>
    <p><a href="home.php">Home </a> <span> / Menu</span></p>
</div>

<section class="products">

    <h1 class="title">All Menu</h1>

    <div class="box-container">
        <?php
        // Check if there are any products fetched from the database
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $foodName = $row["foodName"];
                $foodPrice = $row["foodPrice"];
        ?>
                <form action="add_cart.php" method="post" class="food-container">
                    <input type="hidden" name="foodName" value="<?= $foodName ?>">
                    <input type="hidden" name="foodPrice" value="<?= $foodPrice ?>">
                    <article class="food-product">
                        <h3 style="text-align: center; font-size: 20px; color: #333;"><?= $foodName ?></h3>
                        <p style="text-align: center; font-size: 16px; color: #666;">Price: $<?= $foodPrice ?></p>
                        <figure>
                            <img src="images/Food/<?= $foodName ?>.png" alt="<?= $foodName ?>" class="food-thumbnail" width="200" height="200"/>
                        </figure>
                        <?php if ($loggedIn) { ?>
                            <button type="submit" class="btn-order" onclick="showDialog('<?= $dialogMessage ?>')">Add To Cart</button>
                        <?php } else { ?>
                            <button type="button" class="btn-order" onclick="showDialog('<?= $dialogMessage ?>')">Add To Cart</button>
                        <?php } ?>
                    </article>
                </form>
        <?php
            }
        } else {
            echo "No products found.";
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

<!-- JavaScript function to show dialog message -->
<script>
    function showDialog(message) {
        alert(message);
    }
</script>

</body>
</html>
