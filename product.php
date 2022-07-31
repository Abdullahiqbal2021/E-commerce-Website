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
  <form action="" method="POST" class="d-flex flex-column w-75 mx-auto" enctype="multipart/form-data">
    <h3 class="text-center">Add new product</h3>
    <input type="file" name="product_photo" class="form-control">
    <input type="text" name="product_name" placeholder="Enter name of product">
    <input type="number" name="product_price" placeholder="Enter price of product">
    <textarea name="short_desc" id="" cols="30" rows="3" placeholder="Enter short description about product"></textarea>

    <textarea name="description" id="" cols="30" rows="5" placeholder="Enter detailed description about product"></textarea>

    <input class="btn btn-outline-primary" type="submit" name="submit" value="Submit" id="submit">
  </form>
</body>
<script src="javascript/bootstrap.bundle.min.js"></script>

</html>
<?php
include 'conn.php';

if (isset($_POST['submit'])) {
  $photo = $_FILES['product_photo'];
  $name = $_POST['product_name'];
  $price = $_POST['product_price'];
  $short_desc = $_POST['short_desc'];
  $description = $_POST['description'];

  $filename = $photo['name'];
  $filepath = $photo['tmp_name'];
  $fileerror = $photo['error'];

  if ($fileerror == 0) {
    $destfile = 'images/' . $filename;
    // echo $destfile;
    move_uploaded_file($filepath, $destfile);
  }

  if ($name !== "" && $price !== "" && $short_desc !== "" && $filename !== "" && $description !== "") {


    $insertquery = "INSERT INTO product(`product_photo`, `product_name`, `product_price`, `short_desc`,`description`) VALUES ('$destfile','$name','$price','$short_desc','$description')";


    $query = mysqli_query($con, $insertquery);

    if ($query) {
?>
      <!-- <script>
    alert("inserted")
     </script>   -->
    <?php
      header('location:admin.php');
    } else {
    ?>

      <script>
        alert("Not inserted")
      </script>
    <?php
    }
  } else {
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      All the fields must be filled.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
      <!-- <script>
        alert("All the fields must be filled.")
      </script>   -->
<?php
  }
}

?>