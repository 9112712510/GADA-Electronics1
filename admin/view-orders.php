<?php

include('includes/hearder.php');
include('../middleware/adminMiddleware.php');

if(isset($_GET['t']))
{
    $tracking_no = $_GET['t'];

    $orderData = checkTrackingNoValid($tracking_no);
    if(mysqli_num_rows($orderData) < 0)
    {
        ?>
         <h4>Something went wrong</h4>
        <?php
        die();
    }
}else{
    ?>
      <h4>Something went wrong</h4>
    <?php
    die();
}

$data = mysqli_fetch_array($orderData);
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
             <span class="text-white fs-4">View Order</span>
             <a href="orders.php" class="btn btn-warning float-end"><i class="fa fa-reply"></i> Back</a>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <h4>Delivery Details</h4>
                <hr>
                <div class="row">
                  <div class="col-md-12 mb-3">
                   <label class="fw-bold">Name</label>
                     <div class="border p-1">
                       <?= $data['name'];?>
                     </div>
                  </div>

                  <div class="col-md-12 mb-3">
                   <label class="fw-bold">Email</label>
                     <div class="border p-1">
                       <?= $data['email'];?>
                     </div>
                  </div>

                  <div class="col-md-12 mb-3">
                   <label class="fw-bold">Phone</label>
                     <div class="border p-1">
                       <?= $data['phone'];?>
                     </div>
                  </div>
                  <div class="col-md-12 mb-3">
                   <label class="fw-bold">Tracking No</label>
                     <div class="border p-1">
                       <?= $data['tracking_no'];?>
                     </div>
                  </div>

                  <div class="col-md-12 mb-3">
                   <label class="fw-bold">Address</label>
                     <div class="border p-1">
                       <?= $data['address'];?>
                     </div>
                  </div>

                  <div class="col-md-12 mb-3">
                   <label class="fw-bold">Pin Code</label>
                     <div class="border p-1">
                       <?= $data['pincode'];?>
                     </div>
                  </div>

               </div>
            </div>
            <div class="col-md-6">
              <h4>Order Details</h4>
              <hr>

              <table class="table">
                <thead>
                  <tr>
                    <th>product</th>
                    <th>price</th>
                    <th>Quantity</th>
                  </tr>
                </thead>
                <tbody>

              <?php

          

              $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.* FROM orders o, order_items oi, products p WHERE oi.order_id=o.id AND p.id=oi.prod_id AND o.tracking_no='$tracking_no' ";

              $order_query_run = mysqli_query($conn, $order_query);

              if(mysqli_num_rows($order_query_run) > 0)
              {
                foreach ($order_query_run as $item)
                 {
                   ?>
                    <tr>
                      <td class="align-middle">
                        <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                       <?= $item['name']; ?>
                      </td>
                      <td class="align-middle">
                        <?= $item['price']; ?>
                      </td>
                      <td class="align-middle">
                        <?= $item['orderqty']; ?>
                      </td>
                    </tr>
                   <?php
                 }
              }

              ?>
               </tbody>
              </table>

              <hr>
              <h5>Total Price : <span class="float-end fw-bold"><?= $data['total_price'];  ?></span></h5>
              <hr>
              <label class="fw-bold">Payment Mode</label>
              <div class="border p-1 mb-3">
               
                <?= $data['payment_mode'] ?>
              </div>
              <label class="fw-bold">Status</label>
              <div class="mb-3">
                <form action="code.php" method="POST">
                  <input type="hidden" name="tracking_no" value="<?= $data['tracking_no'] ?>">
                <select name="order_status" id="" class="form-select">
                  <option value="0" <?= $data['status'] == 0?"selected":""  ?>>Under Process</option>
                  <option value="1" <?= $data['status'] == 1?"selected":""  ?>>Completed</option>
                  <option value="2" <?= $data['status'] == 2?"selected":""  ?>>Cancelled</option>
                </select>
                <button type="submit" name="update-order-btn" class="btn btn-primary mt-2">Update Status</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>
  </div>






</body>
</html>
<?php
 include('includes/footer.php');
?>