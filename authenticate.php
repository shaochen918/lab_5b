<?php
session_start(); 
include 'Database.php';
include 'User.php';

if (isset($_POST['submit']) && ($_SERVER['REQUEST_METHOD'] == 'POST')) {
    // Create database connection
    $database = new Database();
    $db = $database->getConnection();

    // Sanitize inputs using mysqli_real_escape_string
    $matric = $db->real_escape_string($_POST['matric']);
    $password = $db->real_escape_string($_POST['password']);

    // Validate inputs
    if (!empty($matric) && !empty($password)) {
        $user = new User($db);
        $userDetails = $user->getUser($matric);

        // Check if user exists and verify password
        if ($userDetails && password_verify($password, $userDetails['password'])) {
            $_SESSION['logged_in'] = true; 
            $_SESSION['matric'] = $matric;
            header("Location: read.php");
            exit;
        } else {
            echo 'Login Failed<br>';
            echo 'Invalid username or password,try to <a href="login.php">login</a> again';
        }
    } else {
        echo 'Please fill in all required fields.';
    }
}