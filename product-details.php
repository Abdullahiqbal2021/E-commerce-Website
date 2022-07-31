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

$id = $_GET['id'];
$selectQuery = "SELECT * From product where id=$id";

$query = mysqli_query($con, $selectQuery);

$result = mysqli_fetch_assoc($query);


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
  <div class="container pt-3">
    <div class="row">
      <div class=" col-md-4 col-5 ">
        <div class="detail-img-sec">
          <img src="<?php echo $result['product_photo'] ?>" alt="">
          <h3 class="text-center "><?php echo $result['product_name'] ?></h3>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 col-12">
            <a href="add-to-cart.php" class="btn btn-primary w-100 my-1">Add to cart</a href="add-to-cart.php">
          </div>
          <div class="col-lg-6 col-12">
            <button class="btn btn-info w-100 my-1">Add to wishlist</button>
          </div>
        </div>
      </div>
      <div class="col-md-8 col-7 pt-4">
        <p><b>Price: </b> <?php echo $result['product_price'] ?> pkr</p>
        <p><b>Rating: </b> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></p>
        <p><b>Short Description: </b> <?php echo $result['short_desc'] ?></p>
        <div class="row d-flex justify-content-center  text-center boarderd border-1 border-danger">
          <div class="col-4 d-flex flex-column align-items-center py-2 bg-success">
            <div>
              <i class="fa fa-check"></i>
            </div>
            1 year varenty
          </div>
          <div class="col-4 d-flex flex-column align-items-center py-2 bg-info">
            <div>
              <i class="fa fa-water"></i>
            </div>
            Water proof
          </div>
          <div class="col-4 d-flex flex-column align-items-center py-2 bg-danger">
            <div>

              <i class="fa fa-recycle"></i>
            </div>
            7 days exchange
          </div>
        </div>
        <div class="row pt-3 pb-1 d-flex align-items-center">
          <div class="col-auto">
            <h4>Colors:</h4>
          </div>
          <div class="col-auto">
            <span class="bg-danger colors"></span>
            <span class="bg-success colors"></span>
            <span class="bg-info colors"></span>
          </div>
        </div>
        <button class="btn btn-outline-primary w-100 mt-3">Buy Now</button>

      </div>
      <hr>
      <div class="row">
        <h3>Description:</h3>
        <p><?php echo $result['description'] ?></p>
      </div>
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

<script src="javascript/bootstrap.bundle.min.js"></script>


</html>