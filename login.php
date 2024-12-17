<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Add Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

    <div class="container p-4 bg-white rounded shadow">
        <h1 class="text-center mb-4">Login Page</h1>
        <form action="authenticate.php" method="post">
            <div class="mb-3">
                <label for="matric" class="form-label">Matric:</label>
                <input type="text" name="matric" id="matric" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary w-100">
            </div>
        </form>
        <div class="mt-3 text-center">
            <a href="register_form.php">Register</a> here if you have not.
        </div>
    </div>

    <!-- Add Bootstrap JS and Popper.js for certain components (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>
