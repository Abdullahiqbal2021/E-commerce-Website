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
include 'conn.php';

if (isset($_POST['submit'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  if ($email !== "" && $password !== "") {
    $res = mysqli_query($con, "select * from admin_login where  email='$email' and password='$password' ");
    $check_user =  mysqli_num_rows($res);
    if ($check_user > 0) {

      $_SESSION['ADMIN_LOGON'] = "yes";
      header('location:admin.php');
    } else {
?>
      <div class="alert alert-danger alert-dismissible fade show position-absolute w-100 top-0" role="alert">
        invalid email or password.
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

<?php
  }
}
?>

<body class="bg-gray">
  <div class="container container-1 d-flex align-items-center justify-content-center">

    <form action="" class="d-flex flex-column sign-up  bg-white p-4  mx-auto" method="post">
      <p class="log-in">Admin Log In</p>
      <input type="email" placeholder="Enter your email(admin@gmail.com)" name="email">
      <input type="password" placeholder="Enter your password(admin1234)" name="password" required>
      <input class="btn btn-outline-primary" type="submit" value="Log In" name="submit" required>
    </form>

  </div>
</body>

<script src="javascript/bootstrap.bundle.min.js"></script>

</html>