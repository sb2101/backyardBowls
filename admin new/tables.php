<?php
session_start();
include('admin-header.php');
include('connectDB.php');

// Retrieve reservations
$sql = "SELECT * FROM reserve";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .content-box {
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

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="content-box">
    <?php
    if ($result->num_rows > 0) {
        echo "<h1>Reservations</h1>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Email</th><th>People</th><th>Time</th><th>Date</th><th>Phone</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['people'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td> <form action='admin.php' method='post'>
            <a href='delete-tables.php?id=".$id."' class='btn btn-success rounded'>Approve</a>
            <a href='delete-tables.php?id=".$id."' class='btn btn-danger rounded'>Reject</a>
        </form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No reservations found.";
    }
    ?>
</div>

</body>
</html>
