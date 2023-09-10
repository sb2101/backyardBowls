<?php
$servername= "localhost";
$username = "id21240594_root";
$password = "Password@123";
$dbname = "id21240594_restaurant";

$con = mysqli_connect($servername, $username, $password, $dbname);

if(!$con)
{
echo "not connected";
}
$main = "CREATE TABLE IF NOT EXISTS  `reserve` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(20) NOT NULL,
    `people` varchar(50) NOT NULL,
    `time` int(10) NOT NULL,
    `date` date NOT NULL,
    `phone` int(13) NOT NULL,
    `name` varchar(20) NOT NULL,
    PRIMARY KEY (`id`)
   )";
$result = $con->query($main);


$name  = $_POST['name'];
$email = $_POST['email'];
$people = $_POST['people'];
$time = $_POST['time'];
$date = $_POST['date'];
$phone = $_POST['phone'];

$sql = "INSERT INTO `reserve`(`name`, `email`, `people`, `time`, `date`, `phone`) VALUES ('$name','$email','$people','$time','$date','$phone')";

$result = mysqli_query($con, $sql);

if($result)
{
    echo "data submitted";
     
}
else
{
    echo "query failed....";
}
?>