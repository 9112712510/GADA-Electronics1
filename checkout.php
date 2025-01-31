<?php

include('functions/userfunctions.php');
include('authencticate.php');

$cartItems = getCartItems();

if(mysqli_num_rows($cartItems) == 0)
{
  header('Location: index.php');
}

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
          <a class="navbar-brand" href="index.html" id="logo"><span id="span1">E</span>Lectronic <span>Shop</span></a>
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
    <div class="text-white">
      <a href="index.php" class="text-white">
        Home /
      </a>
      <a href="checkout.php" class="text-white">
        Checkout
      </a>
    </div>
  </div>
</div>


<div class="py-5">
  <div class="container">
    <div class="card">
     <div class="card-body shadow">
    <form action="functions/placeorder.php" method="POST">
     <div class="row">
        <div class="col-md-7">
           <h5>Basic Details</h5>
           <hr>
           <div class="row">
             <div class="col-md-6 mb-3">
                <label class="fw-bold">Name</label>
                <input type="text" name="name" id="name" required placeholder="Enter your full name" class="form-control">
                <small class="text-danger name"></small>
             </div>
             <div class="col-md-6 mb-3">
                <label class="fw-bold">E-mail</label>
                <input type="email" name="email" id="email" required placeholder="Enter your email" class="form-control">
                <small class="text-danger email"></small>
             </div>
             <div class="col-md-6 mb-3">
                <label class="fw-bold">Phone</label>
                <input type="text" name="phone" id="phone" required placeholder="Enter your Phone number" class="form-control">
                <small class="text-danger phone"></small>
             </div>
             <div class="col-md-6 mb-3">
                <label class="fw-bold">Pin Code`</label>
                <input type="text" name="pincode" id="pincode" required placeholder="Enter your full name" class="form-control">
                <small class="text-danger pincode"></small>
             </div>
             <div class="col-md-12 mb-3">
                <label class="fw-bold">Address</label>
                <textarea name="address" id="address" required class="form-control" rows="5" ></textarea>
                <small class="text-danger address"></small>
             </div>
           </div>
        </div>
      
      <div class="col-md-5">
        <h5>Order Details</h5>
        <hr>
        <?php $items = getCartItems();
        $totalPrice = 0;
        foreach ($items as $citem){

          ?>
          <div class="mb-1 border">
             <div class="row align-items-center">
              <div class="col-md-2">
                <img src="uploads/<?= $citem['image'] ?>" alt="image" width="60px">
              </div>
              <div class="col-md-5">
                <label><?= $citem['name'] ?></label>
              </div>
              <div class="col-md-3">
                <label><?= $citem['selling_price'] ?></label>
              </div>
              <div class="col-md-2">
                <label><?= $citem['prod_qty'] ?></label>
              </div>
             </div>
            </div>
          <?php
          $totalPrice += $citem['selling_price']  * $citem['prod_qty'];
        }
        ?>
        <hr>
        <h5>Total Price : <span class="float-end fw-bold"> <?= $totalPrice ?></span></h5>
        <div class="">
          <input type="hidden" name="payment_mode" value="COD">
            <button type="submit" name="placeOrderBtn" class="btn btn-success w-100">Confirm and Place order</button>
            <div id="paypal-button-container" class="mt-3"></div>
        </div>
      </div>
     </div>
     </form>
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
          Designed by <a href="#">Dy coders</a>
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
<script src="https://www.paypal.com/sdk/js?client-id=AR8r7gG7ziqueUx6d1itwOT6jUVphvly7awyjPPdLjwGNZO1TN6uGZOpUCSPDHDLDxgDB-v5SDpVCOF-&currency=USD"></script>

<script>

  
  paypal.Buttons({

    onClick(){


      var name = $('#name').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var pincode = $('#pincode').val();
      var address = $('#address').val();

  
      if(name.length == 0)
      {
        $('.name').text("*This field is required");
        
      }else{
        $('.name').text("");
      }
      if(email.length == 0)
      {
        $('.email').text("*This field is required");
       
      }
      else{
        $('.email').text("");
      }
      if(phone.length == 0)
      {
        $('.phone').text("*This field is required");
        
      }else{
        $('.phone').text("");
      }
      if(pincode.length == 0)
      {
        $('.pincode').text("*This field is required");
        
      }else{
        $('.pincode').text("");
      }
      if(address.length == 0)
      {
        $('.address').text("*This field is required");
        
      }else{
        $('.address').text("");
      }

      if(name.length == 0 || email.length == 0 || phone.length == 0 || pincode.length == 0 || address.length == 0)
      {
        return false;
      }
    },

    createOrder: (data, actions) => {

      return actions.order.create({
        purchase_units: [{
          amount: {
            value:'<?= $totalPrice ?>'
          }
        }]
      });
    },

    onApprove: (data,actions)=> {
      return actions.order.capture().then(function(orderData){
       // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
        const transaction = orderData.purchase_units[0].payments.captures[0];
       // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`)


       var name = $('#name').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var pincode = $('#pincode').val();
      var address = $('#address').val();
 
       var data = {

        'name' : name,
        'email' : email,
        'phone' : phone,
        'pincode' : pincode,
        'address' : address,
        'payment_mode' : "paid by paypal",
        'payment_id' : transaction.id,
        'placeOrderBtn' :true
       };
  



       $.ajax({
        method: "POST",
       url: "functions/placeorder.php",
       data: data,
       success: function (response){
            if(response == 201)
            {
              alertify.success('Order Placed successfully');
              //actions.redirect('my-orders.php');
              window.location.href = 'my-orders.php';
            }
            else{
              console.log(response);
            }
       }
       });
      });
    }
  }).render('#paypal-button-container');
</script>
</body>
</html>