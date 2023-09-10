<?php
include('connectDB.php');

$idToDelete = $_GET['id'];

$sql = "DELETE FROM `restaurant`.`reserve` WHERE `reserve`.`id` = $idToDelete";

if ($conn->query($sql) === TRUE) {
    echo "<script>
    alert('Success');
    window.history.back();
</script>";
}

$conn->close();
?>
