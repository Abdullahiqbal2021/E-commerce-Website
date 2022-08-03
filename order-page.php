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
include 'conn.php';
  // customer details
  $selectQuery5 = "SELECT * From order_reciever";
  $query5 = mysqli_query($con, $selectQuery5);
  

    // Order section
    $selectQuery3 = "SELECT * From cart";
    $query3 = mysqli_query($con, $selectQuery3);
?>
<body>

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
                    while($result5 = mysqli_fetch_array($query5)){
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

</body>

</html>