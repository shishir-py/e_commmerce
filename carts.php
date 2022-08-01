<?php
include("includes/header.php"); 
 ?>
  <div class="py-3 bg-primary">
    <div class="container">        
        <h6 class="text-white">
            <a href="index.php" class="text-white" >
                Home
            </a>
            <a href="cart.php"  class="text-white">
                /Cart
            </a>
        </h6> 
    </div>
 </div>
 <?php $items =getCartItems();

                if (is_array($items) || is_object($items))
                {
                    foreach($items as $item)
                    {
                        ?>
                            <section class="h-100 product_data" style="background-color: #eee;">
                            <div class="container h-100 py-5">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-10">

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>          
                                    </div>
                                    <div class="card rounded-3 mb-4">
                                    <div class="card-body p-4">
                                        <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img
                                            src="uploads/<?= $item['image'] ?>"
                                            class="img-fluid rounded-3" alt="Product Image">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <p class="lead fw-normal mb-2"><?= $item['name'] ?></p>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <button class="input-group-text minus-btn">-</button>
                                            <input type="text" class="form-control text-center input-qty bg-white" value="<?= $item['prod_qty'] ?>" disabled>
                                            <button class="input-group-text plus-btn">+</button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h5 class="mb-0">Rs. <?= $item['selling_price'] ?></h5>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="card">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-warning btn-block btn-lg w-100">Proceed to Pay</button>
                                    </div>
                                    </div>

                                </div>
                                </div>
                            </div>
                            </section>

                        <?php

                    }

                }else
                {
                    echo "Unfortunately, an error occured.";

                }

            ?>


<?php include("includes/footer.php");  ?>