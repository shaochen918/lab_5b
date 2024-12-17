<?php
include 'Database.php';
include 'User.php';
include 'navbar.php';

// Check if the user is logged in, if not redirect them to the login page
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to login page
    header("Location: login.php");
    exit;
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the matric value from the GET request
    $matric = $_GET['matric'];

    // Process the update using the matric value
    // For example, you can fetch the user data using the matric value and display it in a form for updating
    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $userDetails = $user->getUser($matric);

    $db->close();

    // Display the update form with the fetched user data
    // Example:
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update User</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
            <div class="container p-4 bg-white rounded shadow mt-4">
                <h1 class="text-center mb-4">Update User</h1>
                <form action="update.php" method="post">
                    <div class="mb-3">
                        <label for="matric" class="form-label">Matric:</label>
                        <input type="text" name="matric" id="matric" class="form-control" value="<?php echo $userDetails['matric']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $userDetails['name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Access Level:</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="">Please select</option>
                            <option value="lecturer" <?php if ($userDetails['role'] == 'lecturer')
                                echo "selected" ?>>Lecturer</option>
                                <option value="student" <?php if ($userDetails['role'] == 'student')
                                echo "selected" ?>>Student</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="Update" value="Update" class="btn btn-primary w-100">
                    </div>
                    <div class="mb-3">
                        <a href="read.php" class="btn btn-secondary w-100">Cancel</a>
                    </div>
                    </form>
            </div>
            <!-- Add Bootstrap JS and Popper.js (optional) -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
        </body>

        </html>
    <?php
}
?>