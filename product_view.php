<?php

// include("functions/userfunctions.php"); 
include("includes/header.php");
if(isset($_GET['product']))
{

    $products_slug=$_GET['product'];
    $products_data =getIDActive("products", $products_slug);
    $product = mysqli_fetch_array($products_data);
    if($product)
    {
        ?>
            <div class="py-3 bg-primary">
                <div class="container">
                    <h6 class="text-white">
                       <a href="categories.php" class="text-white">
                            Home/
                       </a>
                       <a href="categories.php" class="text-white">
                            Collections/
                       </a>
                       <a href="categories.php" class="text-white">
                       <?= $product['name']; ?>
                       </a>
                    </h6>
                </div>
            </div>
            <div class="bg-light py-4">
                <div class="container product_data mt-3">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="shadow">
                                <img src="uploads/<?= $product['image'] ?>" alt="product image" class="w-100" >
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="fw-bold" ><?= $product['name'] ?>
                                <span class="float-end text-danger" ><?php if($product['trending']){ echo"Trending"; } ?></span>
                            </h4>
                            <hr>
                            <p><?= $product['small_description'] ?></p>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                   <h4> <span class="text-success fw-bold" > Rs.<?= $product['selling_price'] ?></span></h4>
                                </div>
                                <div class="col-md-6">
                                  <h5> Rs. <S class="text-danger" > <?= $product['original_price'] ?></S></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group mb-3" style="width: 130px;" >
                                        <button class="input-group-text minus-btn">-</button>
                                        <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled>
                                        <button class="input-group-text plus-btn">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <button class="btn btn-primary px-4 addToCartBtn"  value="<?= $product['id'] ?>"> <i class="fa fa-shopping-cart me-2"></i> Add to Cart</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-danger px-4"> <i class="fa fa-heart me-2"></i> Add to Wishlist</button>
                                </div>
                            </div>
                            <hr>

                            <h6> Description:</h6>
                            <p><?= $product['description'] ?></p>
        
        
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
    else
    {
        echo " No data Available";
    }
}
else
{
    echo " No details Available";
}
include("includes/footer.php");  ?>

