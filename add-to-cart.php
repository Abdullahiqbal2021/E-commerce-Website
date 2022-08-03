<?php
session_start();
include 'conn.php';
$id = $_GET['id'];

$selectQuery = "SELECT * From product where id=$id";
$query = mysqli_query($con, $selectQuery);
$result = mysqli_fetch_assoc($query);

$photo = $result['product_photo'];
$name = $result['product_name'];
$price = $result['product_price'];
$getuser = $_SESSION['USER_ID'];


$insertquery = "INSERT INTO cart(`cart_photo`, `cart_name`, `cart_price`, `user_id`) VALUES ('$photo','$name','$price','$getuser')";

$query1 = mysqli_query($con, $insertquery);
if ($query1) {
  $_SESSION['CART-MSG'] = "Added to cart";

header('location:index.php');
}
