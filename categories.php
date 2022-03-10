<?php require ('includes/header.php');?>
<?php require ('includes/config.php');?>
<?php require ('includes/navbar.php');?>
<?php require ('includes/functions.php');?>
        <!-- Start Bradcaump area -->
<!-- Slider -->
<?php require('includes/carousel.php');?>
<!-- Slider End -->
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                    <select class="ht__select">
                                        <option>Default softing</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by newness</option>
                                    </select>
                                </div>
                                <?php 
                                    if(isset($_GET['id'])){
                                    $id = $_GET['id'];
                                    $query2 = mysqli_query($conn, "SELECT * FROM product WHERE categories_id=$id");
                                    while($row = mysqli_fetch_array($query2)){
                                ?>
                            </div>
                            <!-- Start Product View -->
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                            <!-- Start Single Product -->
                                            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                                <div class="category">
                                                    <div class="ht__cat__thumb">
                                                    <a href="product-details.php?id=<?php echo $row['id']?>">
                                                        <img src="<?php echo $row['image']; ?>"alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="fr__hover__info">
                                                        <ul class="product__action">
                                                            <!-- <li><a href="wishlist.php"><i class="icon-heart icons"></i></a></li>

                                                            <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li> -->

                                                            <li><a href="product-details.php?id=<?php echo $rpost['id']?>"><i class="icon-shuffle icons"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="fr__product__inner">
                                                        <h4><a href="product-details.php"><?php echo $row['name']; ?></a></h4>
                                                        <ul class="fr__pro__prize">
                                                            <!-- <li class="old__prize">$30.3</li> -->
                                                            <li>$ <?php echo $row['mrp']; ?></li>
                                                        </ul><br>
                                                        <button class="btn btn-default"><a href="product-details.php?id=<?php echo $row['id']?>">Product Details</button><br>
                                                    </div>
                                                </div>
                                                <hr>
                                                <?php }  }?>
                                            </div>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Area -->
        <!-- Start Footer Area -->
<?php require ('includes/footer.php');?>