<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "inc/head.inc.php";
    ?>
</head>
<body>
<?php
session_start(); // Start the session at the beginning
$email = $password = $errorMsg = "";
$success = true;

// Function to sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Validate email
if (empty($_POST["email"])) {
    $errorMsg .= "Email is required.<br>";
    $success = false;
} else {
    $email = sanitize_input($_POST["email"]);

    // Additional check to make sure email address is well-formed.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg .= "Invalid email format.<br>";
        $success = false;
    }
}

// Validate password
if (empty($_POST["password"])) {
    $errorMsg .= "Password is required.<br>";
    $success = false;
} else {
    $password = $_POST["password"];
}

if ($success) {
    // Call the function to authenticate the user
    authenticateUser();

    if ($success) {
        // User authentication successful
        $_SESSION['email'] = $email; // Store email in session
        $_SESSION['fname'] = $fname; // Store first name in session
        $_SESSION['lname'] = $lname; // Store last name in session
        $_SESSION['address'] = $address; // Store address in session

        echo "Login Successful";
        header("Location: home.php");
        exit();
    } else {
        // User authentication failed
        echo '<main>';
        echo '<section class="about">';
        echo '<div class="row">';
        echo '<div class="content">';
        echo '<h1 style="text-align: center; font-size: 40px; color: black;">Login failed, following errors detected</h1>';
        echo '<p style="text-align: center; font-size: 32px; color: black;">' . $errorMsg . '</p>';
        echo '<a href="login.php" class="btn" style="text-align: center; font-size: 28px;">Login Again</a>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
        echo '</main>';
        $_SESSION['login_error'] = $errorMsg;
    }
} else {
    echo '<main>';
    echo '<section class="about">';
    echo '<div class="row">';
    echo '<div class="content">';
    echo '<h1 style="text-align: center; font-size: 40px; color: black;">Login failed, following errors detected</h1>';
    echo '<p style="text-align: center; font-size: 32px; color: black;">' . $errorMsg . '</p>';
    echo '<a href="login.php" class="btn" style="text-align: center; font-size: 28px;">Login Again</a>';
    echo '</div>';
    echo '</div>';
    echo '</section>';
    echo '</main>';
    $_SESSION['login_error'] = $errorMsg;
    exit();
}

// Helper function to authenticate the login.
function authenticateUser()
{
    global $fname, $lname, $email, $pwd_hashed, $address, $errorMsg, $success;

    // Create database connection.
    $config = parse_ini_file('/var/www/private/db-config.ini');
    if (!$config)
    {
        $errorMsg = "Failed to read database config file.";
        $success = false;
    }
    else
    {
        $conn = new mysqli(
            $config['servername'],
            $config['username'],
            $config['password'],
            $config['dbname']
        );
        // Check connection
        if ($conn->connect_error)
        {
            $errorMsg = "Connection failed: " . $conn->connect_error;
            $success = false;
        }
        else
        {
            // Prepare the statement:
            $stmt = $conn->prepare("SELECT * FROM cafe_members WHERE email=?");
            // Bind & execute the query statement:
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0)
            {
                // Note that email field is unique, so should only have
                // one row in the result set.
                $row = $result->fetch_assoc();
                $fname = $row["fname"];
                $lname = $row["lname"];
                $pwd_hashed = $row["password"];
                $address = $row["address"];
                // Check if the password matches:
                if (!password_verify($_POST["password"], $pwd_hashed))
                {
                    // Don't be too specific with the error message - hackers don't
                    // need to know which one they got right or wrong. :)
                    $errorMsg = "User not found or password doesn't match";
                    $success = false;
                }
            }
            else
            {
                $errorMsg = "User not found or password doesn't match";
                $success = false;
            }
            $stmt->close();
        }
        $conn->close();
    }
}
?>
</body>
</html>