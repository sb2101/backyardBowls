<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "resta"; // Change this to your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update the reservation status
if (isset($_POST['update_status'])) {
    $reservation_id = $_POST['reservation_id'];
    $new_status = $_POST['new_status'];

    // Ensure $new_status is one of the allowed values
    $allowed_statuses = ['pending', 'confirmed', 'arrived', 'no show', 'cancelled'];
    if (!in_array($new_status, $allowed_statuses)) {
        echo "Invalid status selected.";
    } else {
        // Update the reservation status in the database
        $update_sql = "UPDATE reserve SET status = '$new_status' WHERE id = $reservation_id";
        if ($conn->query($update_sql) === TRUE) {
            echo "<script>alert('Reservation status updated successfully.');</script>";
        } else {
            echo "Error updating reservation status: " . $conn->error;
        }
    }
}
// Retrieve reservations
$sql = "SELECT * FROM reserve";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-image: url('login_bg.jpg');
            /* Path to your background image */
            background-size: cover;
            /* Cover the entire viewport */
            background-repeat: no-repeat;
            /* Prevent repeating the background image */
            background-attachment: fixed;
            /* Fixed background scrolling with the page */
        }

        .content-box {
            background-color: whitesmoke;
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        /* Reset some default styles */
        body,
        h1,
        ul,
        li {
            margin: 0;
            padding: 0;
        }

        /* Apply styles to header */
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: relavtive;
        }

        /* Style navigation menu */
        nav ul {
            list-style-type: none;
            background-color: #444;
            text-align: center;
            padding: 10px;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        /* Style links on hover */
        nav ul li a:hover {
            color: #00bcd4;
        }

        nav ul li :hover {
            color: #00bcd4;
        }

        /* Style logout button */
        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        /* Responsive styles */
        @media screen and (max-width: 600px) {
            .content-box {
                margin: 10px;
                padding: 10px;
            }

            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 6px;
            }

            nav ul li {
                margin-right: 10px;
            }

            .logout-button {
                top: 10px;
                right: 10px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li>Reservation List</li>
            <li><a href="admin table edit.php">Table List</a></li>
            <li><a href="login.php" class="logout-button">Logout</a></li>

        </ul>
    </nav>

    <div class="content-box">
        <?php
        if ($result->num_rows > 0) {
            echo "<h1>Reservations</h1>";
            echo "<table>";
            echo "<tr><th>Id</th><th>Name</th><th>Email</th><th>People</th><th>Time</th><th>Date</th><th>Phone</th><th>Status</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['people'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>";
                echo "<form method='POST' action=''>";
                echo "<input type='hidden' name='reservation_id' value='" . $row['id'] . "'>";
                echo "<select name='new_status'>";
                echo "<option value='pending' " . ($row['status'] == 'pending' ? 'selected' : '') . ">Pending</option>";
                echo "<option value='confirmed' " . ($row['status'] == 'confirmed' ? 'selected' : '') . ">Confirmed</option>";
                echo "<option value='arrived' " . ($row['status'] == 'arrived' ? 'selected' : '') . ">Arrived</option>";
                echo "<option value='no show' " . ($row['status'] == 'no show' ? 'selected' : '') . ">No Show</option>";
                echo "<option value='cancelled' " . ($row['status'] == 'cancelled' ? 'selected' : '') . ">Cancelled</option>";
                echo "</select>";
                echo "<button type='submit' name='update_status'>Update</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No reservations found.";
        }
        ?>
    </div>
    <script>
        <?php
        if (isset($_POST['update_status']) && $conn->query($update_sql) === TRUE) {
            echo "setTimeout(function() {
            window.location.href = window.location.href; // Reload the page
        }, 1000);"; // Redirect after 1 second
        }
        ?>
    </script>
</body>

</html>