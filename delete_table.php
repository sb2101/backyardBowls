<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "resta";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the table_id is provided via POST request
if (isset($_POST['table_id'])) {
    $table_id = mysqli_real_escape_string($conn, $_POST['table_id']);

    // Perform the table deletion
    $sql = "DELETE FROM tables WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $table_id);
        if (mysqli_stmt_execute($stmt)) {
            $response = array("success" => true);
            echo json_encode($response);
        } else {
            $response = array("success" => false);
            echo json_encode($response);
        }
        mysqli_stmt_close($stmt);
    } else {
        $response = array("success" => false);
        echo json_encode($response);
    }
}

mysqli_close($conn);
?>
