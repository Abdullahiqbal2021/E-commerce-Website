<?php
include 'conn.php';

$selectQuery = "SELECT * From cart ";
$query = mysqli_query($con, $selectQuery);
$result = mysqli_fetch_assoc($query);

$photo = $result['cart_photo'];
$name = $result['cart_name'];
$price = $result['cart_price'];


$insertquery = "INSERT INTO order_items(`order_photo`, `order_name`, `order_price`) VALUES ('$photo','$name','$price')";

$query1 = mysqli_query($con, $insertquery);
if ($query1) {
header('location:index.php');
}


?>