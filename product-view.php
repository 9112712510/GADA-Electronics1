<?php

include('functions/userfunctions.php');

if(isset($_GET['product']))
{
  $product_slug = $_GET['product'];
  $product_data = getSlugActive("products", $product_slug);
  $product = mysqli_fetch_array($product_data);


  if($product)
  {
    
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
        <a href="./admin/admin_login.php"><p>WELCOME TO OUR SHOP</p></a>
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
              if(isset($_SESSION['auth']))
              {
                ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                  <?= $_SESSION['auth_user']['full_name'];  ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="my-orders.php">view orders</a></li>
                    <li><a class="dropdown-item" href="#">Another Action</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                </li>
                <?php
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
        <a class="text-white" href="categories.php">
            Home/
        </a>
            <a class="text-white" href="categories.php">
            Collections/
            </a>
            <?= $product['name'];?></h6>
    </div>
</div>

<div class="bg-light py-4">
<div class="container product_data mt-3">
    <div class="row">
        <div class="col-md-4">
            <div class="shadow">
            <img src="uploads/<?= $product['image']; ?>" alt="product Image" class="w-100">
            </div>
        </div>
        <div class="col-md-8">
            <h4 class="fw-bold"><?= $product['name']; ?>
              <span class="float-end text-danger"><?php  if($product['trending']){ echo "Trending";} ?></span>
           </h4>
            <hr>
            <p><?= $product['small_description']; ?></p>
            <div class="row">


                <div class="col-md-6">
                    <h5>Rs <span class="text-success fw-bold"> <?= $product['selling_price'];?></span></h5>
                </div>
                <div class="col-md-6">
                    <h5>Rs <span class="text-danger"> <?= $product['original_price'];?> </span></h5>
                </div>
               
            </div>
      <?php
            if($product['qty'] > 0)
            {
              ?>
              <label class="badge bg-success">In stock</label>
              <?php
            }
            else{
              ?>
              <label class="badge bg-danger">Out of stock</label>
              <?php
            }
      ?>

            <div class="row">
               <div class="col-md-4">
                <div class="input-group mb-3"  style="width: 130px;">
                   <button class="input-group-text decrement-btn">-</button>
                   <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled >
                  <button class="input-group-text increment-btn">+</button>
                </div>
               </div>
            </div>
            
            <div class="row mt-3">
              <?php
                if($product['qty'] > 0){
                  ?>
                <div class="col-md-6">
                    <button class="btn btn-primary px-4 addToCartBtn" value="<?= $product['id'];?>"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                </div>
                <?php
                 }
                 ?>
                <div class="col-md-6">
                    <button class="btn btn-danger px-4"><i class="fa fa-heart me-2"></i>Add to Wishlist</button>
                </div>

            </div>

            <hr>
            <h6> Product Description:</h6>
            <p><?= $product['description']; ?></p>
        </div>
    </div>
</div>
</div>
<?php
  }
  else
  {
    echo "Product not found";
  }
}
else{
  echo "somthing went wrong";
}

?>



<!-- footer -->
<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <h3>Electronic Shop</h3>
          <p>
            Pune <br>
            Mumbai <br>
            Banglore <br>
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
</body>
</html>