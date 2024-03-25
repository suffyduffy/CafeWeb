<?php
session_start();
$config = parse_ini_file('/var/www/private/db-config.ini');
if (!$config) {
    $errorMsg = "Failed to read database config file.";
    $success = false;
} else {
    // Get cartID and member_id from the form submission
    $cartID = $_POST['cartID'];
    $member_id = $_POST['member_id'];
    $foodName = $_POST['foodName'];

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
        // Prepare the SQL statement to delete the item from the cart
        $stmt = $conn->prepare("DELETE FROM cart WHERE foodName = ? AND member_id = ?");
        // Bind parameters
        $stmt->bind_param("si", $foodName, $member_id);
        // Execute the statement
        if ($stmt->execute()) {
            echo "Item deleted successfully.";
            header("Location: cart.php");
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
