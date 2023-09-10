<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: admin-login.php');
}
include('admin-header.php');
include('connectDB.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>
    <div class="container">
        <table class="table text-center">
            <thead>
                <tr>
                    <th colspan="4" class="h3">Orders</th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username | Email</th>
                    <th scope="col">Items</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $orders = "SELECT * FROM `restaurant`.`orders`";
                $result = mysqli_query($conn, $orders);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $username = $row['username'];
                        $email = $row['email'];
                        $items = json_decode($row['items'], true);
                        $total_price = $row['total_price'];
                ?>
                        <tr>
                            <td><?= $id ?></td>
                            <td><?= $username ?> | <?= $email ?></td>
                            <td>
                                <table>
                                    <?php
                                    foreach ($items[0] as $item) {
                                        $itemName = $item['Item_Name'];
                                        $quantity = $item['Quantity'];
                                    ?>
                                        <tr>
                                            <td><?= $itemName ?></td>
                                            <td><?= $quantity ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </td>
                            <td><?= $total_price ?></td>
                            <td>
                                <form action="admin.php" method="post">

                                <?php
                                echo '
                                <a href="delete-order.php?id='.$id.'" class="btn btn-success rounded">Approve</a>
                                <a href="delete-order.php?id='.$id.'" class="btn btn-danger rounded">Reject</a>
                            </form>';
                                ?>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>