<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "resta";

// Create a connection to the database
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

/*Define the CREATE TABLE query
$main = "CREATE TABLE IF NOT EXISTS `reserve` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(255) NOT NULL,
    `people` int(11) NOT NULL,
    `time` int(11) NOT NULL,
    `date` date NOT NULL,
    `phone` varchar(20) NOT NULL,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
)"; 

// Execute the CREATE TABLE query
if (mysqli_query($con, $main)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($con);
} */

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs to prevent SQL injection
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $people = intval($_POST['people']);
    $time = intval($_POST['time']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    // Create the INSERT query
    $sql = "INSERT INTO `reserve` (`name`, `email`, `people`, `time`, `date`, `phone`) VALUES ('$name', '$email', $people, $time, '$date', '$phone')";

    // Execute the INSERT query
    if (mysqli_query($con, $sql)) {
        echo "Data submitted successfully";
    } else {
        echo "Query failed: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>
