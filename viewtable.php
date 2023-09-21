<?php
// Create a database connection
$hostname = "localhost";
$username = "root";
$password = "";
$database = "resta";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize a variable to store success messages
$successMessage = "";
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Tables List</title>
    <style>
        body {
            background-image: url('login_bgg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: whitesmoke;

        }

        .table-container {
            background-color: whitesmoke;
            width: 50%;
            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            /* Add a box shadow for a box-like appearance */
        }

        /* Styles for the "Add Table" modal and table list */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
            margin: 100px auto;
            padding: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;

        }

        th,
        td {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }

        /* Add some margin below the "Add Table" button */
        #openModalBtn {
            margin-bottom: 10px;
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
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">BackyardBowls</a></li>
                <li><a href="reservation-main.php">Reservation </a></li>

            </ul>
        </nav>
    </header>
    <div class="table-container">
        <h1>Table List</h1>
        <table>
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Table Number</th>
                    <th>Description</th>
                    <!-- <th>Actions</th> Add a new column for edit buttons -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Retrieve and display table data from the database
                $query = "SELECT * FROM tables";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        // echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['table_number']}</td>";
                        echo "<td>{$row['description']}</td>";
                        echo "</tr>";
                    }
                    mysqli_free_result($result);
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>