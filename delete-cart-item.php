<?php

include 'conn.php';


$ids = $_GET['cart_id'];

$deletequery = "delete from cart where cart_id=$ids";
$query4 = mysqli_query($con, $deletequery);

if ($query4) {
  header('location:cart.php');
} else {
?>
  <script>
    alert("Not deleted")
  </script>
<?php
}

?>