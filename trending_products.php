<?php

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
</head>
<body>
<div class="container" id="product-cards">
      <h1 class="text-center">PRODUCTS</h1>
      <div class="row" style="margin-top: 30px;">
<?php


$trendingProducts = getAllTrending();

if(mysqli_num_rows($trendingProducts) > 0)
{
  foreach ($trendingProducts as $item)
  {
    ?>
    <div class="col-md-3 py-3 py-md-0">
    <a href="product-view.php?product=<?= $item['slug']; ?>">
    <div class="card">
      <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
      <div class="card-body">
        <h3 class="text-center"><?= $item['name']; ?></h3>
        <p class="text-center">Lorem ipsum dolor sit amet.</p>
        <div class="star text-center">
          <i class="fa-solid fa-star checked"></i>
          <i class="fa-solid fa-star checked"></i>
          <i class="fa-solid fa-star checked"></i>
          <i class="fa-solid fa-star checked"></i>
          <i class="fa-solid fa-star checked"></i>
        </div>
        <h2>Rs <?= $item['original_price'];?> <span><li class="fa-solid fa-cart-shopping"></li></span></h2>
      </div>
    </div>
    </a>
  </div>

  <?php
  }
}




    ?>
    <!-- product cards -->

</body>
</html>