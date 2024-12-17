<?php
session_start();
include 'Database.php';
include 'User.php';

// Check if the user is logged in, if not redirect them to the login page
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to login page
    header("Location: login.php");
    exit;
}

// If logged in, show the protected content
echo "Welcome to the Dashboard! You are logged in as " . $_SESSION['matric'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the POST request
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $user->updateUser($matric, $name, $role);

    // Close the connection
    $db->close();
    header("Location: read.php");
    exit;
}