<?php

include('functions/userfunctions.php');
include('authencticate.php');


if(isset($_GET['t']))
{
    $tracking_no = $_GET['t'];

    $orderData = checkTrackingNoValid($tracking_no);
    if(mysqli_num_rows($orderData) <0)
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

    <!-- top navbar -->
    <div class="top-navbar">
        <p>WELCOME TO OUR SHOP</p>
        <div class="icons">
            <a href="login.php"><img src="./images/register.png" alt="" width="18px">Login</a>
            <a href="regis.php"><img src="./images/register.png" alt="" width="18px">Register</a>
        </div>
    </div>
    <!-- top navbar -->

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php" id="logo"><span id="span1">E</span>Lectronic <span>Shop</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><img src="./images/menu.png" alt="" width="30px"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index1.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Product</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="categories.php">Collections</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cart.php">Cart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
              </li>
              <?php
              if(isset($_SESSION['auth'])){
                ?>
                 <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
                <?php

              }
              else{

              }

              ?>
            </ul>
            <form class="d-flex" id="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

<div class="py-3 bg-primary">
  <div class="container">
    <h6 class="text-white">
      <a href="index.php" class="text-white">
        Home /
      </a>
      <a href="my-orders.php" class="text-white">
        My orders /
      </a>
      <a href="#" class="text-white">
        View orders
      </a>
    </h6>
  </div>
</div>


<div class="py-5">
  <div class="container">
    <div class="">
     <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-primary">
            <span class="text-white fs-4">View Order</span>
            <a href="my-orders.php" class="btn btn-warning float-end"><i class="fa fa-reply"></i> Back</a>
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

              $userId = $_SESSION['auth_user']['user_id'];

              $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.* FROM orders o, order_items oi, products p WHERE o.user_id='$userId' AND oi.order_id=o.id AND p.id=oi.prod_id AND o.tracking_no='$tracking_no' ";

              $order_query_run = mysqli_query($conn, $order_query);

              if(mysqli_num_rows($order_query_run) > 0)
              {
                foreach ($order_query_run as $item)
                 {
                   ?>
                    <tr>
                      <td class="align-middle">
                        <img src="uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
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
              <div class="border p-1 mb-3">
                <?php
                
                if($data['status'] == 0)
                {
                  echo "Under Process";
                }else if($data['status'] == 1)
                {
                  echo "completed";
                }else if($data['status'] == 2)
                {
                  echo "Cancelled";
                }
                
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
  </div>
</div>
</div>


<!-- footer-->
<footer id="footer">
      <div class="footer-top">
        <div class="container">
          <div class="row">

            <div class="col-lg-3 col-md-6 footer-contact">
              <h3>Electronic Shop</h3>
              <p>
                Mumbai <br>
                Pune <br>
                Dehli <br>
              </p>
              <strong>Phone:</strong> +000000000000000 <br>
              <strong>Email:</strong> electronicshop@.com <br>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Usefull Links</h4>
             <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policey</a></li>
             </ul>
            </div>



           

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Services</h4>

             <ul>
              <li><a href="#">PS 5</a></li>
              <li><a href="#">Computer</a></li>
              <li><a href="#">Gaming Laptop</a></li>
              <li><a href="#">Mobile Phone</a></li>
              <li><a href="#">Gaming Gadget</a></li>
             </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Social Networks</h4>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, quibusdam.</p>

              <div class="socail-links mt-3">
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-skype"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
              </div>
            
            </div>

          </div>
        </div>
      </div>
      <hr>
      <div class="container py-4">
        <div class="copyright">
          &copy; Copyright <strong><span>Electronic Shop</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="#">Dycoders</a>
        </div>
      </div>
    </footer>
    <!-- footer -->







    <a href="#" class="arrow"><i><img src="./images/arrow.png" alt=""></i></a>













    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>


<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

<script>


alertify.set('notifier','position', 'top-right');
  <?php
      if(isset($_SESSION['message']))
    { 
      
      ?>
         alertify.success('<?= $_SESSION['message'] ?>');
        <?php 
        unset($_SESSION['message']);
    }
  
  ?>
</script>
<script src="assets/js/custom.js"></script>
</body>
</html>