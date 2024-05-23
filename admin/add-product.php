<?php



 include('includes/hearder.php');
 include('../middleware/adminMiddleware.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add product</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                      <div class="row">
                      <div class="col-md-12">
                            <label class="mb-0">Select category</label>
                            <select name="category_id" class="form-select mb-2" >
                              <option selected>Select category</option>
                             
                                <?php
                                $categories = getAll("categories");

                                if(mysqli_num_rows($categories)>0)
                                {
                                   foreach($categories as $item)
                                     {
                                       ?>
                                         <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                        <?php
                                     }
                                }     
                                else
                                {
                                    echo "No Category available";
                                }

                                ?>
                              
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="mb-0">Name</label>
                            <input type="text" name="name" placeholder="Enter Catagory name" class="form-control mb-2" required>    
                        </div>
                        <div class="col-md-6">
                            <label class="mb-0">slug</label>
                            <input type="text" name="slug" placeholder="Enter Slug" class="form-control mb-2" required>
                        </div>
                        <div class="col-md-12">
                             <label class="mb-0">Small Description</label>
                            <textarea rows="3" name="small_description" placeholder="Enter Small Description" class="form-control mb-2" required></textarea>
                        </div>
                        <div class="col-md-12">
                             <label class="mb-0">Description</label>
                            <textarea rows="3" name="description" placeholder="Enter Description" class="form-control mb-2" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="mb-0">Original Price</label>
                            <input type="text" name="original_price" placeholder="Enter Original Price" class="form-control mb-2" required>    
                        </div>
                        <div class="col-md-6">
                            <label class="mb-0">Selling Price</label>
                            <input type="text" name="selling_price" placeholder="EnterSelling Price" class="form-control mb-2" required>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-0">Upload Image</label>
                            <input type="file" name="image"  class="form-control mb-2" required>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <label class="mb-0">Quantity</label>
                            <input type="number" name="qty" placeholder="Enter Quantity" class="form-control mb-2" required>
                        </div>

                        <div class="col-md-3">
                            <label class="mb-0">Status</label><br>
                            <input type="checkbox" name="status" >
                        </div>
                        <div class="col-md-3">
                            <label class="mb-0">Trending</label><br>
                            <input type="checkbox" name="trending" >
                        </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-0">Meta Title</label>
                            <input type="text" name="meta_title" placeholder="Enter Meta title" class="form-control mb-2" required>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-0">Meta Description</label>
                            <textarea rows="3" name="meta__description" placeholder="Enter Meta Description" class="form-control mb-2" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-0">Meta Keyword</label>
                            <textarea rows="3" name="meta_keywords" placeholder="Enter Meta Keywords" class="form-control mb-2" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                        </div>
                     
                    </form>
                </div>
            </div>
        </div>
 
    </div>
</div>
<?php
 include('includes/footer.php')
?>


 

 