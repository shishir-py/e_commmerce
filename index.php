<?php

session_start();

include("includes/header.php");  ?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="./assets/css//custom2.css"  />


<!-- header -->
<!-- Carousel wrapper -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" >
      <img src="./uploads//crousall-1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Never Settle</h5>
        <p>
On 'never settling' OnePlus has a motto — “Never Settle” — which is about getting maximum value for your money. An excellent product that you don't pay through the nose</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./uploads//crousal-2 9rt.webp" class="d-block w-100 rounded" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Never Settle</h5>
        <p>
On 'never settling' OnePlus has a motto — “Never Settle” — which is about getting maximum value for your money. An excellent product that you don't pay through the nose</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./uploads/crousal-3.webp" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Never Settle</h5>
        <p>
On 'never settling' OnePlus has a motto — “Never Settle” — which is about getting maximum value for your money. An excellent product that you don't pay through the nose</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel wrapper -->  
   
      
<!-- end of header -->

    <!-- collection -->
    <section id = "collection" class = "py-5">
        <div class = "container">
            <div class = "title text-center">
                <h2 class = "position-relative d-inline-block">Our-Collections</h2>
            </div>
        
          <div class="row">            
            <?php
            $categories =getAllActive("catagories");
            if(mysqli_num_rows($categories)>0)
            {
                foreach($categories as $item)
                {
                    ?>
                    <div class="col-md-3 mb-2">
                        <a href="products.php?category=<?= $item['slug']; ?>">                        
                            <div class="card shadow">
                                <div class="card-body">
                                    <img src="uploads/<?= $item['image']; ?>" alt="category image" class="w-100">
                                    <h4 class="text-center"><?= $item['name']; ?></h4>
                                </div>
                            </div>
                        </a>
                    </div>                        
                    <?php
                }
            }
            else
            {
                echo " No Category Available";
            }
            ?>
          </div>
      </div>
        </div>
    </section>
    <!-- end of collection -->

    <!-- special products -->
    <div class="py-5">
  <div class="container ">
            <div class = "title text-center">
                <h2 class = "position-relative d-inline-block">Trending Products</h2>
            </div>
    <div class="row" > 
    <div class="col-md-12">         
          
          <div class="row">          
            <?php
            $products =getTproduct('Trending');
            
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
           
    <!-- end of special products -->

    <!-- about us -->
    <section id = "about" class = "py-5">
        <div class = "container">
            <div class = "row gy-lg-5 align-items-center">
                <div class = "col-lg-6 order-lg-1 text-center text-lg-start">
                    <div class = "title pt-3 pb-5">
                        <h2 class = "position-relative d-inline-block ms-4">About Us</h2>
                    </div>
                    <p class = "lead text-muted">
On 'never settling' OnePlus has a motto — “Never Settle” — which is about getting maximum value for your money.
 An excellent product that you don't pay through the nose
 Glass front (Gorilla Glass Victus), glass back (Gorilla Glass 5), aluminum frame
SIM	Single SIM (Nano-SIM) or Dual SIM (Nano-SIM, dual stand-by)
 	IP68 dust/water resistant - T-Mobile only (not for use underwater, liquid damage is not covered under warranty)</p>
                </div>
                <div class = "col-lg-6 order-lg-0">
                    <img src = "./uploads//t-1.webp" alt = "" class = "img-fluid float-start">
                </div>
            </div>
        </div>
    </section>
    <!-- end of about us -->


    <!-- newsletter -->
    <!-- <section id = "newsletter" class = "py-5">
        <div class = "container">
            <div class = "d-flex flex-column align-items-center justify-content-center">
                <div class = "title text-center pt-3 pb-5">
                    <h2 class = "position-relative d-inline-block ms-4">Newsletter Subscription</h2>
                </div>

                <p class = "text-center text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus rem officia accusantium maiores quisquam dolorum?</p>
                <div class = "input-group mb-3 mt-3">
                    <input type = "text" class = "form-control" placeholder="Enter Your Email ...">
                    <button class = "btn btn-primary" type = "submit">Subscribe</button>
                </div>
            </div>
        </div>
    </section> -->
    <!-- end of newsletter -->




 

    <!-- footer -->
    <footer class = "bg-dark py-5">
        <div class = "container">
            <div class = "row text-white g-4">
                

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light">Links</h5>
                    <ul class = "list-unstyled">
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Home
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Collection
                            </a>
                        </li>
                        
                    </ul>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light mb-3">Contact Us</h5>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-map-marked-alt"></i>
                        </span>
                        <span class = "fw-light">
                            Devinagar,Butwal, Rupendehi, Nepal
                        </span>
                    </div>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-envelope"></i>
                        </span>
                        <span class = "fw-light">
                            support@gmail.com
                        </span>
                    </div>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-phone-alt"></i>
                        </span>
                        <span class = "fw-light">
                            +coming soon...
                        </span>
                    </div>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light mb-3">Follow Us</h5>
                    <div>
                        <ul class = "list-unstyled d-flex">
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end of footer -->




    <!-- jquery -->
    <script src = "js/jquery-3.6.0.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src = "bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src = "js/script.js"></script>

    <div class="row">
      <div class="col-md-12">
          <?php
              if (isset($_SESSION['message']))
              {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong></strong> <?= $_SESSION['message']; ?>.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION['message']);
              }
          ?>
          
        
      </div>
    </div>
  </div>
 </div>

<?php include("includes/footer.php");  ?>