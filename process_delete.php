<?php
session_start();
$config = parse_ini_file('/var/www/private/db-config.ini');
if (!$config) {
    $errorMsg = "Failed to read database config file.";
    $success = false;
} else {
    // Get cartID from the form submission
    $cartID = $_POST['cartID']; // Ensure this is being correctly assigned

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
        // Prepare the SQL statement to delete the item from the cart by cartID
        $stmt = $conn->prepare("DELETE FROM cart WHERE cartID = ?");
        // Bind parameters (cartID)
        $stmt->bind_param("i", $cartID);

        // Execute the statement
        if ($stmt->execute()) {
            // If you want to redirect immediately, make sure there's no output before this
            header("Location: cart.php");
            exit(); // Ensure no further execution happens after a redirect
        } else {
            $errorMsg = "Error deleting item: " . $conn->error;
            $success = false;
            echo $errorMsg;
        }
        $stmt->close();
    }
    $conn->close();
}
?>

