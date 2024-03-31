<!DOCTYPE html>
<html lang="en">
<head>
<?php
        include "inc/head.inc.php";
    ?>
</head>
<body>
<?php 
session_start(); 
// Initialize variables 
$success = true; 
$errorMsg = ""; 
 
// Validate POST data 
if (!isset($_POST['member_id']) || !isset($_POST['totalPrice']) || !isset($_POST['foodNames'])) { 
    $errorMsg = "Missing required fields."; 
    $success = false; 
} else { 
    $member_id = $_POST['member_id'];
    $foodNames = $_POST['foodNames']; 
    $totalPrice = $_POST['totalPrice'];

 
    // Proceed with the checkout if successful 
    if ($success) { 
        checkout($member_id, $foodNames, $totalPrice); // Pass variables to the function 
        if ($success) { 
            header("Location: orders.php"); 
            exit(); // Stop script execution after redirection 
        } else { 
            echo "<h4>Error:</h4><p>" . $errorMsg . "</p>"; 
        } 
    } 
} 
 
// Define the checkout function 
function checkout($member_id, $foodNames, $totalPrice) 
{ 
    global $errorMsg, $success; 
 
    // Include database configuration 
    $config = parse_ini_file('/var/www/private/db-config.ini'); 
    if (!$config) { 
        $errorMsg = "Failed to read database config file."; 
        $success = false; 
        return; 
    } 
 
    // Create a database connection 
    $conn = new mysqli( 
        $config['servername'], 
        $config['username'], 
        $config['password'], 
        $config['dbname'] 
    ); 
 
    if ($conn->connect_error) { 
        $errorMsg = "Connection failed: " . $conn->connect_error; 
        $success = false; 
        return; 
    } 
 
    // Insert order for the user 
    $insert_order = "INSERT INTO orders (member_id, foodOrder, totalPrice, orderDate) VALUES (?, ?, ?, NOW())"; 
    $stmt_insert = $conn->prepare($insert_order); 
    $stmt_insert->bind_param("isd", $member_id, $foodNames, $totalPrice); 
    if (!$stmt_insert->execute()) { 
        $errorMsg = "Error inserting into orders table: " . $conn->error; 
        $success = false; 
    }  else { 
        // Clear the cart 
        $delete_cart = "DELETE FROM cart WHERE member_id = ?"; 
        $stmt_delete = $conn->prepare($delete_cart); 
        $stmt_delete->bind_param("i", $member_id); 
        if (!$stmt_delete->execute()) { 
            $errorMsg = "Error deleting from cart table: " . $conn->error; 
            $success = false; // Update success status on delete error 
        } 
    } 
 
    // Close the statement and connection 
    $stmt_insert->close(); 
    $conn->close(); 
} 
 
?>
</body>
</html>