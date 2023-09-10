<?php
session_start();
include('connectDB.php');

$login_table = "CREATE TABLE IF NOT EXISTS  `$dbname`.`admin_details` ( `id` INT(5) NOT NULL AUTO_INCREMENT,
 `Date` VARCHAR(10) NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `username` VARCHAR(10) NOT NULL,
 `password` VARCHAR(25) NOT NULL,
 PRIMARY KEY (`id`))";
 $result = mysqli_query($conn, $login_table);

if (isset($_SESSION['username'])) {
     echo "<script>window.location.href='admin.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `admin_details` WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {

        $_SESSION['username'] = $username;
       echo "<script>window.location.href='admin.php';</script>";
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>
    
    <?php
    if (isset($error_message)) {
        echo "<p>$error_message</p>";
    }
    ?>

    <form action="admin-login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
