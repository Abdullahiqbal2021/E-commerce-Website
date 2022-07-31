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

// Getting product to update
$id = $_GET['id'];
$selectQuery = "SELECT * From product where id = $id";
$query = mysqli_query($con, $selectQuery);
$result = mysqli_fetch_assoc($query);

if (isset($_POST['submit'])) {
  $photo = $_FILES['product_photo'];
  $name = $_POST['product_name'];
  $price = $_POST['product_price'];
  $short_desc = $_POST['short_desc'];
  $description = $_POST['description'];

  if (empty($_FILES['product_photo']['name'])) {
    $destfile = $_POST['old_photo'];

?>
    <script>
      alert("empty")
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("Not empty")
    </script>
    <?php
    $file = $_FILES['product_photo'];

    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];

    if ($fileerror == 0) {
      $destfile = 'images/' . $filename;
      // echo $destfile;
      move_uploaded_file($filepath, $destfile);
    }
  }

  if ($name !== "" && $price !== "" && $short_desc !== "" && $filename !== "" && $description !== "") {
    // Updating Product
    $updateQuery = "UPDATE product SET product_photo='$destfile',product_name='$name',product_price='$price',short_desc='$short_desc',description='$description' WHERE id ='$id'";
    $query = mysqli_query($con, $updateQuery);

    if ($query) {
    ?>
      <script>
        alert("inserted")
      </script>
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
    <script>
      alert("All the fields must be filled.")
    </script>
<?php
  }
}

?>

<body>
  <form action="" method="POST" class="d-flex flex-column w-75 mx-auto" enctype="multipart/form-data">

    <h3 class="text-center">Add new product</h3>
    <div class="row">
      <div class="col-6">
        <input class="mx-auto form-control" type="file" name="product_photo">
      </div>
      <div class="col-6"><img style="width:150px ; height: 100px; " src="<?php echo $result['product_photo'] ?>" alt=""></div>
    </div>
    <input type="hidden" name="old_photo" value="<?php echo $result['product_photo'] ?>">

    <input required type="text" name="product_name" placeholder="Enter name of product" value="<?php echo $result['product_name'] ?>">

    <input required type="number" name="product_price" placeholder="Enter name of product" value="<?php echo $result['product_price'] ?>">

    <textarea name="short_desc" id="" cols="30" rows="3" placeholder="Enter short description about product"><?php echo $result['short_desc'] ?></textarea>

    <textarea name="description" id="" cols="30" rows="5" placeholder="Enter detailed description about product"><?php echo $result['description'] ?></textarea>

    <input class="btn btn-outline-primary" type="submit" name="submit" value="Submit" id="submit">
  </form>
</body>

</html>