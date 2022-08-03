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
  <title>admin</title>
</head>
<?php
// product section
include 'conn.php';
if (isset($_SESSION['ADMIN_LOGON'])) {

  // getting product
  $selectQuery = "SELECT * From product";
  $query = mysqli_query($con, $selectQuery);

  // Getting registered users
  $selectQuery2 = "SELECT * From sign_up";
  $query2 = mysqli_query($con, $selectQuery2);

  // Order section
  $selectQuery3 = "SELECT * From cart";
  $query3 = mysqli_query($con, $selectQuery3);

  // $result3 = mysqli_fetch_array($query3);
  if (!$query3) {
?>
    <script>
      alert("Something went wrong while gettig data")
    </script>
  <?php
  }
  // customer details
  $selectQuery5 = "SELECT * From order_reciever";
  $query5 = mysqli_query($con, $selectQuery5);
  $result5 = mysqli_fetch_array($query5);
  // password change 
  $selectQuery6  = "SELECT * From admin_login";
  $query6 = mysqli_query($con, $selectQuery6);
  $result6 = mysqli_fetch_array($query6);

  if (!$query5) {
  ?>
    <script>
      alert("Something went wrong while gettig data")
    </script>
  <?php
  }
  // customer details
  // Order section

  // Total section

  $selectQuery4 = "SELECT SUM(cart_price) as total from cart";

  $query4 = mysqli_query($con, $selectQuery4);
  while ($result4 = mysqli_fetch_assoc($query4)) {
    $total = $result4['total'];
  }

  // Total section
  ?>


  <body>
    <div class="container-fluid p-0">
      <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap  shadow py-2 px-1 pe-5">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Admin Page</a>
        <div>
          <li class="nav-item dropdown d-flex pe-3 ">
            <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
            <ul class="dropdown-menu " aria-labelledby="dropdown04">
              <li><a class="dropdown-item" href="admin-password-change.php?id=<?php echo $result6['id'] ?>">Change Password</a></li>
              <li><a class="dropdown-item" href="#">Edit Admins</a></li>
              <hr>
              <li><a class="dropdown-item" href="admin-logout.php">Log out</a></li>
            </ul>
          </li>
        </div>
      </header>


      <div class="container-fluid ">
        <div class="row">
          <div class="col-md-2 col-3">
            <ul class="nav nav-pills flex-column my-2 " id="myTab" role="tablist">
              <li><b class="text-info">Dashboard</b></li>
              <li class="nav-item" role="presentation">
                <button class="nav-link " id="home-tab" data-bs-toggle="pill" data-bs-target="#users" type="button" role="tab" aria-controls="home" aria-selected="true">All Users</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link active " id="profile-tab" data-bs-toggle="pill" data-bs-target="#products" type="button" role="tab" aria-controls="profile" aria-selected="false">Products</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link " id="profile-tab" data-bs-toggle="pill" data-bs-target="#order" type="button" role="tab" aria-controls="profile" aria-selected="false">Orders</button>
              </li>

            </ul>
          </div>


          <div class="col-md-10 col-9">
            <div class="row pt-1 d-flex justify-content-between" >
              <div class=" col-md-2 col-12">
                <h3 class="text-center">Dashbord</h3>
              </div>
              <div class="col-md-6 col-12 d-flex justify-content-end">
                <input class="w-100" type="text" placeholder="Search by Name" id="search-input" onkeydown="search()" onkeyup="tableSearch()">
              </div>
              <div class="col-md-3 col-12 d-flex justify-content-end ">
                <a href="product.php" class="w-100"><button class="btn btn-outline-primary w-100">Add new products</button></a>
              </div>
            </div>
            <hr>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade  " id="users" role="tabpanel" aria-labelledby="home-tab">
                <h2>Registered Users</h2>
                <table class="table table-responsive table-hover table-striped table-bordered">
                  <thead class="table-dark">
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($result2 = mysqli_fetch_assoc($query2)) {
                      ?>
                      <tr>
                        <td>
                          <?php echo $result2['id'] ?>
                        </td>
                        <td>
                          <?php echo $result2['username'] ?>
                        </td>
                        <td>
                          <?php echo $result2['mobile'] ?>
                        </td>
                        <td>
                          <?php echo $result2['email'] ?>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>

              <!-- Product -->
              <div class="tab-pane fade active show " id="products" role="tabpanel" aria-labelledby="profile-tab">

                <h2> Products</h2>
                <!-- <input class="w-100" type="text" placeholder="Search by Name" id="search-input-product" onkeydown="search()"> -->
                <?php
                while ($result = mysqli_fetch_assoc($query)) {
                ?>
                  <div class="row product-items">
                    <div class="col-sm-3 col-md-2  col-12">
                      <img src="<?php echo $result['product_photo'] ?>" class="w-100" alt="">
                      <hr>
                      <p class="my-1"><b>Product id: </b>
                        <?php echo $result['id'] ?>
                      </p>

                    </div>
                    <div class=" col-sm-9 col-md-10 col-12">
                      <p class="my-1 prod-name"><b>Product Name: </b>
                        <?php echo $result['product_name'] ?>
                      </p>
                      <p class="my-1"><b>Product Price: </b>
                        <?php echo $result['product_price'] ?>
                      </p>
                      <p class="my-1"><b>Remaining qty: </b> 40 pcs</p>
                      <p class="my-1"><b>Short Description: </b>
                        <?php echo $result['short_desc'] ?>
                      </p>
                      <h5>Description</h5>
                      <p class="my-1">
                        <?php echo $result['description'] ?>
                      </p>

                      <a href="update-product.php?id=<?php echo $result['id'] ?>">
                        <button class="btn btn-primary">Edit</button>
                      </a>
                      <a href="delete-product.php?id=<?php echo $result['id'] ?>">
                        <button class="btn btn-danger">Delete</button>
                      </a>
                    </div>
                    <hr class="my-3">
                  </div>
                <?php
                }
                ?>

              </div>
              <!-- Product -->


              <!-- order -->

              <div class="tab-pane fade   " id="order" role="tabpanel" aria-labelledby="order-tab">

                <div class="container-fluid p-0">
                  <h2>order </h2>
                  <table class="table table-responsive table-hover table-striped table-bordered">
                    <thead class="table-dark">
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Order</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($result5 = mysqli_fetch_array($query5)) {
                      ?>
                        <tr>
                          <td><?php echo $result5['login_id'] ?> </td>
                          <td><?php echo $result5['login_name'] ?> </td>
                          <td><?php echo $result5['login_mobile'] ?> </td>
                          <td><a href="show-orders.php?id=<?php echo $result5['login_id'] ?>" class="btn btn-info">Check Order</a> </td>
                        </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>

                ?>
              </div>

              <!-- order -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
<?php
} else {
  $_SESSION['ADMIN_LOGIN_ERROR'] = "You are not logged in.";
  header('location:admin-login.php');
}
?>


<script src="javascript/bootstrap.bundle.min.js"></script>
<script src="javascript/javascript.js"></script>
</html>