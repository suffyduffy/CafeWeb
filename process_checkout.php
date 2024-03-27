<?php
session_start();

if (!isset($_SESSION['fname'])) {
    header("Location: login.php");
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

            // Insert items into the Order table
            while ($row = $select_result->fetch_assoc()) {
                $foodName = $row["foodName"];
                $foodPrice = $row["foodPrice"];

                // Prepare and execute the SQL statement to insert into Order table
                $insert_order = "INSERT INTO Order (member_id, foodName, foodPrice) VALUES (?, ?, ?)";
                $stmt_insert = $conn->prepare($insert_order);
                $stmt_insert->bind_param("iss", $member_id, $foodName, $foodPrice);
                if ($stmt_insert->execute()) {
                    // Delete item from cart after successful insertion into Order table
                    $delete_cart_item = "DELETE FROM cart WHERE foodName = ? AND member_id = ?";
                    $stmt_delete = $conn->prepare($delete_cart_item);
                    $stmt_delete->bind_param("si", $foodName, $member_id);
                    $stmt_delete->execute();
                } else {
                    $errorMsg = "Error inserting into Order table: " . $conn->error;
                    $success = false;
                }
                $stmt_insert->close();
            }
            $stmt_select->close();

            // Redirect to orders.php after checkout
            header("Location: orders.php");
            exit();
        } else {
            $errorMsg = "User not found.";
            $success = false;
            echo $errorMsg;
        }
    }
    $conn->close();
}
?>
