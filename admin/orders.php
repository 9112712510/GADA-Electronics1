<?php

include('includes/hearder.php');
include('../middleware/adminMiddleware.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Shop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <!-- fonts links -->

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
</head>
<body>

   
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                   <h4 class="text-white"> Orders
                    <a href="order-history.php" class="btn btn-warning float-end">Order History</a>
                   </h4>
                </div>
                <div class="card-body" id="">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>User</th>
              <th>Tracking No</th>
              <th>Price</th>
              <th>Date</th>
              <th>View</th>
            </tr>
          </thead>
            <tbody>
            <?php
          $orders = getAllOrders();

          if(mysqli_num_rows($orders) > 0)
          {
            foreach($orders as $item){
              ?>
                  <tr>
                    <td><?= $item['id']; ?></td>
                    <td><?= $item['name']; ?></td>
                    <td><?= $item['tracking_no']; ?></td>
                    <td><?= $item['total_price']; ?></td>
                    <td><?= $item['created_at']; ?></td>
                    <td>
                       <a href="view-orders.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View details</a>
                    </td>
                  </tr>
              <?php
            }
          }else{
            ?>
                 <tr>
                    <td colspan="5">No orders yet</td>
                   
                  </tr>

           <?php
          }
        ?>
            </tbody>
        </table>
      </div>
     </div>
    </div>
  </div>
</div>



</body>
</html>