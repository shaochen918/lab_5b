<?php
session_start(); // Start the session

// Destroy the session and clear all session variables
session_unset();    // Unset all session variables
session_destroy();  // Destroy the session

// Redirect to login page
header("Location: login.php");
exit;
?>
