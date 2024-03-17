<?php
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
} else {c:\Users\miner\OneDrive\Documents\SIT\Web Sys\Lab09\process_register.php
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
        echo "<h4>Login successful!</h4>";
        echo "<p>Welcome back, $fname $lname!</p>";
        echo '<a href="index.php"><button style="background-color: green; color: white;">Return to Home</button></a>';
    } else {
        // User authentication failed
        echo "<h4>Oops!</h4>";
        echo "<h4>The following input errors were detected:</h4>";
        echo "<p>$errorMsg</p>";
        echo '<a href="login.php"><button style="background-color: yellow; color: white;">Return to Login</button></a>';
    }
} else {
    echo "<h4>Oops!</h4>";
    echo "<h4>The following input errors were detected:</h4>";
    echo "<p>$errorMsg</p>";
    echo '<a href="login.php"><button style="background-color: yellow; color: white;">Return to Login</button></a>';
}

// Helper function to authenticate the login.
function authenticateUser()
{
    global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;

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
            $stmt = $conn->prepare("SELECT * FROM world_of_pets_members WHERE email=?");
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
                // Check if the password matches:
                if (!password_verify($_POST["password"], $pwd_hashed))
                {
                    // Don't be too specific with the error message - hackers don't
                    // need to know which one they got right or wrong. :)
                    $errorMsg = "Email not found or password doesn't match...";
                    $success = false;
                }
            }
            else
            {
                $errorMsg = "Email not found or password doesn't match...";
                $success = false;
            }
            $stmt->close();
        }
        $conn->close();
    }
}
?>
