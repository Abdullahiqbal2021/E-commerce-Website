<?php
session_start();
include 'conn.php';
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
unset($_SESSION['USER_EMAIL']);
unset($_SESSION['USER_MOBILE']);
unset($_SESSION['order_msg']);
header('location:login.php');
?>