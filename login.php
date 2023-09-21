<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define your admin username and password
    $adminUsername = "admin";
    $adminPassword = "admin123"; // Change this to your actual password
    
    // Retrieve the submitted username and password from the form
    $submittedUsername = $_POST["username"];
    $submittedPassword = $_POST["password"];
    
    // Check if the submitted credentials match the admin credentials
    if ($submittedUsername === $adminUsername && $submittedPassword === $adminPassword) {
        // Authentication successful; redirect to the admin dashboard
        header("Location: admin_dashboard.php"); // Change to the actual admin dashboard page
        exit;
    } else {
        // Authentication failed; display an error message
        echo "Invalid username or password. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            background-image: url('login_bgg.jpg'); /* Replace with the actual path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        /* Other CSS styles for your login form can go here */
        /* For example, you can style the form container */
        .login-container {
            background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background to make the form stand out */
            padding: 30px;
            border-radius: 20px;
            width: 300px;
            margin: 0 auto; /* Center the form horizontally */
            margin-top: 100px; /* Adjust the top margin to center the form vertically */
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Add a link for "Back to the website" at the top right corner -->
    <button type="submit" style="position: absolute; top: 10px; right: 10px;">
        <a href="index.html">Website</a>
</button>
<div class="login-container">
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
