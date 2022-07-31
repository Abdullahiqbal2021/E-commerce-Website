<?php
session_start();
include 'conn.php';
unset($_SESSION['ADMIN_LOGON']);
$_SESSION['ADMIN_LOGIN_ERROR']="You are not logged in.";
header('location:admin-login.php');
?>