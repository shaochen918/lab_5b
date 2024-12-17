<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Register Form Container -->
    <div class="container p-4 bg-white rounded shadow mt-4">
        <h1 class="text-center mb-4">Register Page</h1>
        <form action="insert.php" method="post">
            <div class="mb-3">
                <label for="matric" class="form-label">Matric:</label>
                <input type="text" name="matric" id="matric" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="">Please select</option>
                    <option value="lecturer">Lecturer</option>
                    <option value="student">Student</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" value="Register" class="btn btn-primary w-100">
            </div>

            <div class="mb-3">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <a href="read.php" class="btn btn-secondary w-100">Cancel</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-secondary w-100">Cancel</a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Add Bootstrap JS and Popper.js (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
