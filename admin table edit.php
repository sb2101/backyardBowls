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

// Handle form submissions
if (isset($_POST['add_table'])) {
    // Handle adding a new table
    $table_number = mysqli_real_escape_string($conn, $_POST['table_number']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Input validation
    if (!is_numeric($table_number) || $table_number <= 0 || empty($description)) {
        echo "Invalid input. Please check the table number and description.";
    } else {
        // Prepared statement for inserting data
        $sql = "INSERT INTO tables (table_number, `description`) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "is", $table_number, $description);
            if (mysqli_stmt_execute($stmt)) {
                $successMessage = "Table created successfully!";
            } else {
                echo "Error: " . mysqli_stmt_error($stmt);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

if (isset($_POST['update_table'])) {
    $table_id = mysqli_real_escape_string($conn, $_POST['table_id']);
    $table_number = mysqli_real_escape_string($conn, $_POST['table_number']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Input validation
    if (!is_numeric($table_number) || $table_number <= 0 || empty($description)) {
        echo "Invalid input. Please check the table number and description.";
    } else {
        // Prepared statement for updating data
        $sql = "UPDATE tables SET table_number=?, description=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "isi", $table_number, $description, $table_id);
            if (mysqli_stmt_execute($stmt)) {
                $successMessage = "Table updated successfully!";
            } else {
                echo "Error: " . mysqli_stmt_error($stmt);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Tables Admin</title>
    <style>
        body {
            background-image: url('login_bg.jpg');
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


        /* Style for the modal background overlay */
        /* .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            Semi-transparent background
            z-index: 1;
        }

        Style for the modal container
        .modal {
            display: none;
            position: fixed;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            z-index: 2;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background-color: rgba(0, 0, 0, 0.7);
        }

        Style for the modal content
        .modal-content {
            background-color: #fff;
            text-align: center;
        } */

        /* Style for the close button */
        .close-modal-btn {
            display: inline-block;
            background-color: #ccc;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        /* Style for the close button */
        .close-edit-modal-btn {
            display: inline-block;
            background-color: #ccc;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        /* Style for the form elements */
        form {
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 4px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }


        /* Styles for the "Add Table" modal and table list  */
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
            border-radius: 10px;
            width: 300px;
            margin: 90px auto;
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
            /* position:absolute;  */
            /* top: 10px;  */
            /* right: 10px; */
            padding: 5px;
            margin: 10px;
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
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="admin_dashboard.php">Reservation List</a></li>
            <li>Table List</li>
            <li><a href="login.php" class="logout-button">Logout</a></li>

        </ul>
    </nav>

    <!-- Button to open the "Add Table" modal -->
    <button id="openModalBtn">+ Create Table</button>

    <!-- "Add Table" Modal -->
    <div id="addTableModal" class="modal">
        <div class="modal-content">
            <h1>Add Table</h1>
            <br>
            <form method="post">
                <label for="table_number">Table No:</label>
                <input type="number" name="table_number" required>
                <br> <br>
                <label for="description">Description:</label>
                <input type="text" name="description" required>
                <br> <br>
                <input type="submit" name="add_table" value="Add Table">
                <br> <br>
            </form>

            <button id="closeModalBtn">Close</button>

        </div>
    </div>

    <!-- Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <h1>Edit Table</h1>
            <form method="post">
                <input type="hidden" name="table_id" id="editTableId" value="">
                <label for="table_number">Table No:</label>
                <input type="number" name="table_number" id="editTableNumber" required>
                <br>
                <label for="description">Description:</label>
                <input type="text" name="description" id="editDescription" required>
                <br>
                <input type="submit" name="update_table" value="Update Table">
                <br>
            </form>

            <button id="closeEditModalBtn">Close</button>

        </div>
    </div>


    <!-- Display success message in JavaScript alert -->
    <?php
    if (!empty($successMessage)) {
        echo "<script>alert('$successMessage');</script>";
    }
    ?>

    <div class="table-container">
        <h1>Table Data</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Table Number</th>
                    <th>Description</th>
                    <th>Actions</th> <!-- Add a new column for edit buttons -->
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
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['table_number']}</td>";
                        echo "<td>{$row['description']}</td>";
                        // Add an "Edit" button with a link to the edit page, passing the table ID
                        echo "<td>
                    <button class=\"edit-button\" data-id=\"{$row['id']}\" data-table-number=\"{$row['table_number']}\" data-description=\"{$row['description']}\">Edit</button>
                    <button class=\"delete-button\" data-id=\"{$row['id']}\">Delete</button>
                    </td>";
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
    <script>
        // JavaScript to handle modal behavior
        const openModalBtn = document.getElementById("openModalBtn");
        const closeModalBtn = document.getElementById("closeModalBtn");
        const addTableModal = document.getElementById("addTableModal");

        // Add an event listener for the Edit buttons
        const editButtons = document.querySelectorAll(".edit-button");
        editButtons.forEach((button) => {
            button.addEventListener("click", () => {
                openEditModal(button);
            });
        });

        openModalBtn.addEventListener("click", () => {
            addTableModal.style.display = "block";
        });

        closeModalBtn.addEventListener("click", () => {
            addTableModal.style.display = "none";
        });

        // Function to open the modal and populate form fields
        function openEditModal(button) {
            var modal = document.getElementById("editModal");
            modal.style.display = "block";

            // Retrieve data from the button's data attributes
            var tableNumberField = document.getElementById("editTableNumber");
            var descriptionField = document.getElementById("editDescription");
            var tableIdField = document.getElementById("editTableId");

            tableNumberField.value = button.getAttribute("data-table-number");
            descriptionField.value = button.getAttribute("data-description");
            tableIdField.value = button.getAttribute("data-id");
        }

        // Function to close the "Edit Table" modal
        const closeEditModalBtn = document.getElementById("closeEditModalBtn");
        closeEditModalBtn.addEventListener("click", () => {
            const editModal = document.getElementById("editModal");
            editModal.style.display = "none";
        });

        // Function to delete the table
        function deleteTable(button) {
            const tableId = button.getAttribute("data-id");

            // You can use JavaScript to confirm the delete action
            if (confirm("Are you sure you want to delete this table?")) {
                // Send an AJAX request to delete the table
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "delete_table.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Handle the response from the server
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            // Reload the page or update the table as needed
                            location.reload(); // Reloading the page for simplicity
                        } else {
                            alert("Failed to delete the table. Please try again.");
                        }
                    }
                };

                xhr.send("table_id=" + tableId);
            }
        }
    </script>
    <?php
    // Display success message if provided in the query parameter
    if (isset($_GET['success'])) {
        $successMessage = $_GET['success'];
        echo "<div style='color: green;'>$successMessage</div>";
    }
    ?>
</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>