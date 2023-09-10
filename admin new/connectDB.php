<?php

$servername= "localhost";
$username = "id21240594_root";
$password = "Password@123";
$dbname = "id21240594_restaurant";

$tname = "rest";



$conn = new mysqli($servername,$username,$password);



$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$result = $conn->query($sql);



$conn = new mysqli($servername,$username,$password,$dbname);

$main = "CREATE TABLE IF NOT EXISTS  `$dbname`.`$tname` ( `id` INT(5) NOT NULL AUTO_INCREMENT,
 `Date` VARCHAR(10) NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `time` VARCHAR(10) NOT NULL,
 PRIMARY KEY (`id`))";

$orders = "CREATE TABLE IF NOT EXISTS `restaurant`.`orders` (
  id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  items VARCHAR(255) NOT NULL,
  total_price DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (id)
);";

$result = $conn->query($orders);

?>

