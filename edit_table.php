<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "resta";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $table_id = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch the table data based on the ID
    $query = "SELECT * FROM tables WHERE id = $table_id";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        if (isset($_POST['update_table'])) {
            $table_id = mysqli_real_escape_string($conn, $_POST['table_id']);
            $table_number = mysqli_real_escape_string($conn, $_POST['table_number']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);

            // Perform the update operation
            // Perform the update operation
            $update_query = "UPDATE tables SET table_number = '$table_number', description = '$description' WHERE id = $table_id";

            if (mysqli_query($conn, $update_query)) {
                // JavaScript code to show the success message in a pop-up box
                echo "<script>";
                echo "alert('Table updated successfully');";
                echo "window.location.href = 'ad.php';";
                echo "</script>";
                exit();
            } else {
                echo "Error updating table: " . mysqli_error($conn);
            }
        }


        // Display an edit form with the existing data
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Edit Table</title>
        </head>
        <body>
            <h1>Edit Table</h1>
            <form method="post">
                <input type="hidden" name="table_id" value="<?php echo $row['id']; ?>">
                <label for="table_number">Table No:</label>
                <input type="number" name="table_number" value="<?php echo $row['table_number']; ?>" required>
                <br>
                <label for="description">Description:</label>
                <input type="text" name="description" value="<?php echo $row['description']; ?>" required>
                <br>
                <input type="submit" name="update_table" value="Update Table">
            </form>
        </body>
        </html>
        <?php

        // Handle form submission to update the table data
        if (isset($_POST['update_table'])) {
            $table_id = mysqli_real_escape_string($conn, $_POST['table_id']);
            $table_number = mysqli_real_escape_string($conn, $_POST['table_number']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);

            // Perform the update operation
            $update_query = "UPDATE tables SET table_number = '$table_number', description = '$description' WHERE id = $table_id";

            if (mysqli_query($conn, $update_query)) {
                header("Location: ad.php"); // Redirect to the table list after updating
                exit();
            } else {
                echo "Error updating table: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Table not found.";
    }

    mysqli_free_result($result);
} else {
    echo "Table ID not provided.";
}

mysqli_close($conn);
?>
