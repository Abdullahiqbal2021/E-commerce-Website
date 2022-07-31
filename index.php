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

if (isset($_SESSION['USER_LOGIN'])) {
  // Displaying Products
  $selectQuery = "SELECT * From product";
  $query = mysqli_query($con, $selectQuery);

?>

  <body>
    <?php
    if (isset($_SESSION['order_msg'])) {
    ?>
      <div class="alert alert-success alert-dismissible fade show position-absolute w-100 top-0 text-center" style="z-index: 1000;" role="alert">
        <?php
        echo $_SESSION['order_msg'];
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php
      unset($_SESSION['order_msg']);
    }
    ?>
    <div class="container-fluid p-0 position-relative">

      <nav class="navbar navbar-expand-sm navbar-expand nav-d navbar-dark bg-dark px-3 position-absolute top-0 w-100 ">
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

      <!-- Corousel -->
      <div id="myCarousel" class="carousel slide carousel-fade pt-md-0 pt-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">

          <div class="carousel-item active">
            <img src="images/Banner1.png" alt="">
          </div>

          <div class="carousel-item">
            <img src="images/Banner2.png" alt="">
          </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- Corousel -->

      <section class="container-fluid">
        <!-- New Arrival Product -->
        <h2>New Arrivals</h2>
        <div class="container-fluid p-0 d-flex flex-wrap align-items-center justify-content-center">
          <?php
          while ($result = mysqli_fetch_assoc($query)) {
          ?>
            <div class="product-inner px-2">
              <div class="product-item">
                <div class="overlay">
                  <a href="add-to-cart.php?id=<?php echo $result['id'] ?>">
                    <i class="fa fa-shop"></i>
                  </a>
                  <a href="product-details.php?id=<?php echo $result['id'] ?>">
                    <i class="fa fa-eye"></i>
                  </a>
                </div>
                <img src="<?php echo $result['product_photo'] ?>" alt="">
              </div>
              <hr>

              <div>
                <h5 class="text-center mx-auto "><?php echo $result['product_name'] ?></h5>
                <p class="short-desc text-center my-1"><?php echo $result['short_desc'] ?></p>
                <div class="row d-flex justify-content-between px-2">
                  <div class="col-auto text-secondary ">Price</div>
                  <div class="col-auto">Rs <?php echo $result['product_price'] ?></div>
                </div>
                <button class="btn btn-primary w-100 mt-1">Buy Now</button>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
        <!-- New Arrival Product -->
      </section>

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
    </div>
  </body>
  <!-- Bootstrap Javascript -->
  <script src="javascript/bootstrap.bundle.min.js"></script>

</html>
<?php } else {
  echo "You are no logged in.";
  header('location:login.php');
}
?>