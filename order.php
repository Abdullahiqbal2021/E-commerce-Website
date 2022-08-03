<?php
session_start()
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
<?php
// connection File
include 'conn.php';

// Getting total of product prices
$selectQuery1 = "SELECT SUM(cart_price) as total from cart";
$query1 = mysqli_query($con, $selectQuery1);
while ($result1 = mysqli_fetch_assoc($query1)) {
  $total = $result1['total'];
}
?>

<body>
  <div class="container-fluid ">
    <form action="" method="POST" class="w-75 mx-auto ">
      <h3 class="text-center">Enter your details</h3>
      <input name="username" class="form-control my-1" type="text" placeholder="Enter receiver's name">
      <input name="mobile" class="form-control my-1" type="number" placeholder="Enter receiver's number">
      <input name="email" class="form-control my-1" type="email" placeholder="Enter receiver's email">
      <textarea name="address" class="form-control my-1" placeholder="Enter receiver's address" id="" cols="30" rows="3"></textarea>
      <input type="submit" name="submit" value="Order" class="btn btn-outline-info w-100">
    </form>
  </div>

  <!-- footer -->
  <footer class="mt-2 py-3 bg-dark ">
    <div class="d-flex justify-content-center py-2">
      <a href="#">
        <i class="fa-brands mx-2 text-white fa-facebook-f "></i>
      </a>
      <a href="#">
        <i class="fa-brands mx-2 text-white fa-twitter"></i>
      </a>
      <a href="#">
        <i class="fa-brands mx-2 text-white fa-instagram"></i>
      </a>
    </div>
    <p class="text-center text-white my-0">Copyright &copy; all right reserved</p>
  </footer>
  <!-- footer -->
</body>
<!-- Bootstrap Javasript -->
<script src="javascript/bootstrap.bundle.min.js"></script>

</html>
<?php

// getting cart items
$selectQuery2 = "SELECT * From cart";
$query2 = mysqli_query($con, $selectQuery2);
$result2 = mysqli_fetch_assoc($query2);

if (isset($_POST['submit'])) {
  $name = $_POST['username'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $mobile = $_POST['mobile'];
  $order_photo =  $result2['cart_photo'];
  $order_name =  $result2['cart_name'];
  $order_price =  $result2['cart_price'];
  $login_name = $_SESSION['USER_NAME'];
  $login_id = $_SESSION['USER_ID'];
  $login_mobile = $_SESSION['USER_MOBILE'];
  $login_email = $_SESSION['USER_EMAIL'];
  if ($name !== "" && $email !== "" && $address !== "" && $mobile !== "" && $order_photo !== "") {

    // Inserting the  Customer details
    $insertquery3 =  "INSERT INTO order_reciever(`username`, `email`, `address`, `mobile`,`login_name`,`login_id`,`login_mobile`,`login_email`) VALUES ('$name','$email','$address','$mobile','$login_name','$login_id','$login_mobile','$login_email')";
    $query3 = mysqli_query($con, $insertquery3);


    if ($query3 && $query2) {
      $_SESSION['Display_order'] = "yes";
      $_SESSION['order_msg'] = "Ordered successfully";
?>

    <?php

      header('location:index.php');
    } else {
    ?>
      <div class="alert alert-danger alert-dismissible fade show position-absolute w-100 top-0" role="alert">
        Not registered
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <!-- <script>
          alert("Not inserted")
        </script> -->
    <?php
    }
  } else {
    ?>
    <div class="alert alert-danger alert-dismissible fade show position-absolute w-100 top-0" role="alert">
      All the fields must be filled.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
  }
}
?>