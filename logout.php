<?php
session_start(); // Start the session

// Unset or destroy session variables
unset($_SESSION['email']);
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION['address']);

// Destroy the session itself
session_destroy();

// Redirect the user to the login page
header("Location: home.php");
exit();
?>