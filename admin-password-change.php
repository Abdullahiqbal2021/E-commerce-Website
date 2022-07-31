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
echo $_SESSION['ADMIN_LOGIN_ERROR'];

$id = $_GET['id'];
$selectQuery = "SELECT * From admin_login where id = $id";
$query = mysqli_query($con, $selectQuery);
$result = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  if ($email !== "" && $password !== "") {
    $updateQuery = "UPDATE admin_login SET email='$email',password='$password' WHERE id ='$id'";

    $query = mysqli_query($con, $updateQuery);
    header('location:admin.php');
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
?>

<body class="bg-gray">
  <div class="container container-1 d-flex align-items-center justify-content-center">

    <form action="" class="d-flex flex-column sign-up  bg-white p-4  mx-auto" method="post">
      <p class="log-in">Admin Log In</p>
      <input  value="<?php echo $result['email'] ?>" type="email" placeholder="Enter your email" name="email">
      <input  value="<?php echo $result['password'] ?>" type="password" placeholder="Enter your password" name="password">
      <input class="btn btn-outline-primary" type="submit" value="Log In" name="submit">


    </form>

  </div>
</body>

<script src="javascript/bootstrap.bundle.min.js"></script>

</html>