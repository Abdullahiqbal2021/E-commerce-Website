<?php

include 'conn.php';


$id = $_GET['id'];

$deletequery = "delete from product where id=$id";
$query = mysqli_query($con, $deletequery);

if ($query) {
  header('location:admin.php');

} else {
  ?>
  <script>
    alert("Not deleted")
  </script>  
  <?php
}


?>