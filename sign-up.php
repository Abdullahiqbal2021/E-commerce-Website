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

<body class="bg-gray">
  <div class="container container-1 d-flex align-items-center justify-content-center">

    <form action="" class="d-flex flex-column sign-up  bg-white p-4  mx-auto" method="post">
      <p class="log-in">Sign Up</p>
      <input type="text" placeholder="Enter your name" name="username">
      <input type="email" placeholder="Enter your email" name="email">

      <input type="number" placeholder="Enter your Mobile number" name="mobile">
      <input type="password" placeholder="Create a strong password" name="password">
      <input class="btn btn-outline-primary" type="submit" value="Sign Up" name="submit">
      <hr>
      <p class="text-center">Go to <a class="text-decoration-none bg-info p-1 text-white mx-1" href="login.php">login</a> page.</p>
    </form>

  </div>
</body>

<script src="javascript/bootstrap.bundle.min.js"></script>

</html>

<?php

include 'conn.php';

if (isset($_POST['submit'])) {
  $name = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $mobile = $_POST['mobile'];

  $check_user =  mysqli_num_rows(mysqli_query($con, "select * from sign_up where  email='$email' "));
  if ($check_user > 0) {
?>
    <div class="alert alert-danger alert-dismissible fade show position-absolute w-100 top-0" role="alert">
      Email already registered.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <!-- <script>
      alert("already in use ")
    </script>   -->

    <?php
  } else {


    if ($name !== "" && $email !== "" && $password !== "" && $mobile !== "") {


      $insertquery = "INSERT INTO sign_up(`username`, `email`, `password`, `mobile`) VALUES ('$name','$email','$password','$mobile')";

      $query = mysqli_query($con, $insertquery);

      if ($query) {
    ?>
        <script>
          alert("inserted")
        </script>

      <?php
        header('location:login.php');
      } else {
      ?>
        <div class="alert alert-danger alert-dismissible fade show position-absolute w-100 top-0" role="alert">
          Not registered
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

      <?php
      }
    } else {
      ?>
      <div class="alert alert-danger alert-dismissible fade show position-absolute w-100 top-0" role="alert">
        All the fields must be filled.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <!-- <script>
        alert("field ")
      </script>  -->


<?php
    }
  }
}




?>