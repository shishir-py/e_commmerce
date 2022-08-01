<?php

 include("includes/header.php");
 if(isset($_GET['category'])){
    
 $category_slug =$_GET['category'];
 $category_data=getSlugActive("catagories", $category_slug);
 $category = mysqli_fetch_array($category_data);
 $c_id = $category['id'];
 ?>
 <div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
        <a href="index.php" class="text-white">Home</a>
        /<a href="index.php" class="text-white">Collections</a>/<?=  $category['name']; ?></h6>
    </div>
 </div>
 <div class="py-5">
  <div class="container ">
    <div class="row" > 
    <div class="col-md-12">         
          <h1><?=  $category['name']; ?></h1><hr>
          <div class="row">          
            <?php
            $products =getProdByCategory($c_id);
            
            if(mysqli_num_rows($products)>0)
            {
                foreach($products as $item)
                {
                    ?>
                        <div class="col-md-3 mb-2">
                            <a href="product_view.php?product=<?= $item['id']; ?>">                        
                                <div class="card shadow bg-light">
                                    <div class="card-body">
                                        <img src="uploads/<?= $item['image']; ?>" alt="category image" class="w-100">
                                        <h5 class="card-title text-center"><?= $item['name']; ?></h5> 
                                        <p class="small text-danger"><s>RS. <?= $item['original_price']; ?></s></p>
                                        <div class="d-flex justify-content-between mb-3">
                                            <h5 class="mb-0 text-success fw-bold">RS. <?= $item['selling_price']; ?></h5>
                                            <a href="product_view.php?product=<?= $item['id']; ?>" class="btn btn-secondary btn-lg btn-sm active"><i class="bi bi-eye-fill"></i>view</a>                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>        
                    <?php
                }
            }
            else
            {
                echo " No products Available";
            }
            ?>
  </div>
 </div>

<?php

}
include("includes/footer.php");  ?>