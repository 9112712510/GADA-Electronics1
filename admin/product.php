<?php
session_start();
error_reporting(0);
ini_set('display_errors',0);

 include('includes/hearder.php');
 include('../middleware/adminMiddleware.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h4> Products</h4>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                             $products = getAll("products");

                             if(mysqli_num_rows($products) > 0)
                             {
                               foreach($products as $item)
                               {
                                ?>
                                <tr>
                                  <td><?= $item['id']; ?></td>
                                  <td><?= $item['name']; ?></td>
                                  <td>
                                    <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>"></td>
                                  <td>
                                    
                                  <?= $item['status'] == '0'? "visible":"hidden" ?>
                                
                                </td>
                                <td>
                                    <a href="edit-product.php?id=<?= $item['id']; ?>" class=" btn btn-primary">Edit</a>
                                   
                                </td>
                                <td>
                                      <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['id']; ?>">Delete</button>
                                </td>
                                </tr>
                                <?php
                               }
                             }
                             else
                             {
                                echo "No record found";
                             }
                            ?>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
 include('includes/footer.php')
?>