<?php
session_start();

$foodName = $_POST['foodName']; // Assuming you're receiving foodName from a form submission
$foodPrice = $_POST['foodPrice']; // Assuming you're receiving foodPrice from a form submission
$success = true;
$errorMsg = "";

if ($success) {
    // Call the function to save member data to the database
    saveToCart();
    header("Location: menu.php");
} else {
    echo "<h4>The following input errors were detected:</h4>";
    echo "<p>" . $errorMsg . "</p>";
    echo '<a href="register.php"><button style="background-color: red; color: white;">Return to Sign Up</button></a>';
}

// Helper function to write the member data to the database.
function saveToCart()
{
    global $foodName, $foodPrice, $errorMsg, $success;

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

                // Prepare the statement for inserting into cart table
                $stmt = $conn->prepare("INSERT INTO cart (member_id, foodName, foodPrice) VALUES (?, ?, ?)");
                // Bind parameters
                $stmt->bind_param("sss", $member_id, $foodName, $foodPrice); // Assuming foodName maps to foodID in the food product table
                // Execute the statement
                if (!$stmt->execute()) {
                    $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                    $success = false;
                    echo $errorMsg;
                }
                $stmt->close();
            } else {
                $errorMsg = "User not found.";
                $success = false;
                echo $errorMsg;
            }
        }
        $conn->close();
    }
}
?>