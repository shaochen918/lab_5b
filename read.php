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

// Create an instance of the Database class and get the connection
$database = new Database();
$db = $database->getConnection();

// Create an instance of the User class
$user = new User($db);
$result = $user->getUsers();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container p-4 bg-white rounded shadow mt-4">
        <h1 class="text-center mb-4">User List</h1>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Matric</th>
                <th scope="col">Name</th>
                <th scope="col">Level</th>
                <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($result->num_rows > 0) {
                        // Fetch each row from the result set
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row["matric"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["role"]; ?></td>
                                <td><a href="update_form.php?matric=<?php echo $row["matric"]; ?>">Update</a></td>
                                <td><a href="delete.php?matric=<?php echo $row["matric"]; ?>">Delete</a></td>

                            </tr>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='3'>No users found</td></tr>";
                    }
                    // Close connection
                    $db->close();
                ?>
            </tbody>
        </table>
    </div>
    
        
    </table>
    <!-- Add Bootstrap JS and Popper.js (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>