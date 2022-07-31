<?php
session_start();
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
// Connection File
include 'conn.php';
$getuser = $_SESSION['USER_ID'];
// Gettinbg Cart Items
$selectQuery1 = "SELECT * From cart where user_id= $getuser";
$query2 = mysqli_query($con, $selectQuery1);

if (!$query2) {
?>
  <script>
    alert("Something went wrong while gettig data")
  </script>
<?php
}
?>

<body>
  <nav class="navbar navbar-expand-sm navbar-expand nav-d navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="index.php">MOBI SHOPI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse d-flex justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="cart.php" class="nav-link">Cart</a>
        </li>

        <li class="nav-item">
          <a href="log-out.php" class="nav-link">Log Out</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid p-0">
    <div class="">
      <h2 class="text-center">Your Cart</h2>
    </div>
    <table class="table table-responsive table-hover table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Pic</th>
          <th>Name</th>
          <th>Price</th>
          <th>Action</th>

        </tr>
      </thead>
      <!-- Display cart items -->
      <tbody>

        <?php
        while ($result1 = mysqli_fetch_assoc($query2)) {
        ?>

          <tr>
            <td><img style="width: 150px; height: ;" src="<?php echo $result1['cart_photo'] ?>" alt=""></td>
            <td><?php echo $result1['cart_name'] ?></td>
            <td><?php echo $result1['cart_price'] ?></td>
            <td><a href="delete-cart-item.php?cart_id=<?php echo $result1['cart_id'] ?>" class="btn btn-danger">Remove</a></td>
          </tr>

        <?php
        }
        ?>
      </tbody>
      <!-- Display cart items -->
    </table>
    <div class="d-flex justify-content-between py-1 px-2">
      <a class="btn btn-info" href="index.php">Continue Shopping</a>
      <a class="btn btn-info" href="checkout.php">Check Out</a>
    </div>

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
<!-- Bootstrap Javascript Link -->
<script src="javascript/bootstrap.bundle.min.js"></script>

</html>