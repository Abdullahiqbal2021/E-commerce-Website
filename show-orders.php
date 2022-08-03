<?php
session_start();
include 'conn.php';
$id = $_GET['id'];
// GETIING ORDER DETAILS
$selectQuery1 = "SELECT * From cart where user_id=$id";
$query1 = mysqli_query($con, $selectQuery1);

// GETTING TOTAL PRICE
$selectQuery2 = "SELECT SUM(cart_price) as total from cart";
$query2 = mysqli_query($con, $selectQuery2);
while ($result2 = mysqli_fetch_assoc($query2)) {
  $total = $result2['total'];

    // customer details
    $selectQuery5 = "SELECT * From order_reciever where login_id= $id";
    $query5 = mysqli_query($con, $selectQuery5);
    $result5 = mysqli_fetch_array($query5);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Offline bootstrap link -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Font Awesomne/all.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>

<body>

    <div class="container-fluid">
      <div class="ordered-items d-flex flex-wrap">
        <?php
        while ($result1 = mysqli_fetch_array($query1)) {
        ?>
          <div class="order-item mx-2 my-1 ">
            <img style="width: 100px;" src="<?php echo $result1['cart_photo'] ?>" alt="">
            <h6 class="text-center"><?php echo $result1['cart_name'] ?></h6>
            <p><b>Price: </b> <?php echo $result1['cart_price'] ?></p>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="p-2 d-flex align-items-center">
        <h5>Total: </h5>
        <p class="mb-1 mt-0 ms-1"><?php echo $total ?></p>
      </div>


  <hr>
    <div class="customer-details py-1">
      <h4 class="text-center py-1">Customer Details</h4>
        <div class="d-flex align-items-baseline">
          <h6 class="me-1">Customer name:</h6>
          <p class="my-0"><?php echo $result5['username'] ?></p>
        </div>
        <div class="col-auto d-flex">
          <h6 class="me-1">Customer Mobile:</h6>
          <p class="m-0"><?php echo $result5['mobile'] ?></p>
        </div>
      <p><b>Customer Email: </b><?php echo $result5['email'] ?></p>
      <h5>Customer address</h5>
      <div><?php echo $result5['address'] ?></div>
    </div>
    </div>
    </div>
</body>

</html>