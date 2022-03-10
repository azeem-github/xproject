<?php session_start();?>
<?php require ('includes/header.php');?>
<?php require ('includes/navbar.php');?>
<?php require ('includes/config.php');?>
<div class="body__overlay"></div>
        <!-- End Offset Wrapper -->
        <!-- Start Slider Area -->
        <?php 
        $sql = "SELECT * FROM sliders";
        $slider = mysqli_query($conn,$sql);
        ?>
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <?php
                while($carousel = mysqli_fetch_assoc($slider)){
                ?>
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>collection 2018</h2>
                                        <h1><?php echo $carousel['tag_line']?></h1>
                                        <div class="cr__btn">
                                            <a href="cart.php">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="<?php echo $carousel['images']?>" alt="slider images">
                                </div>
                            </div>                            
                        </div>
                    </div>                    
                </div>        
                <?php } ?>        
            </div>
        </div>
        <!-- End Slider Area -->
        <!-- Start Category Area -->
        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--4 text-center">
                            <h2 class="title__line">Collection</h2>
                            <p>Be exclusive, Be easy, Be yourself.</p>
                        </div>
                    </div>
                    <?php 
                    if(isset($_GET['search'])){
                        $keyword = $_GET['search'];
                        $sql = "SELECT * FROM product WHERE name LIKE '%$keyword%'";
                    }else{
                        $sql = "SELECT * FROM product";
                    }               
                $category = mysqli_query($conn,$sql);
                while ($product = mysqli_fetch_assoc($category)){
                    ?>
                </div>                
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product-details.php?id=<?php echo $product['id']?>">
                                            <img src="<?php echo $product['image'];?>" alt="product images" >
                                        </a>
                                    </div>
                                    <hr>   
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                           <li><a href="cart.php"><i class="icon-handbag icons"></i></a></li>
                                            <li>
                                            <a href="product-details.php?id=<?php echo $product['id']?>">    
                                            <i class="icon-shuffle icons"></i></a></li>
                                        </ul>
                                    </div>  
                                    <div class="fr__product__inner">
                                        <h4><?php echo $product['name']?></h4>
                                        <ul class="fr__pro__prize">
                                            <li><p>$<?php echo $product['mrp'];?></p></li>
                                        </ul>
                                    </div>                                  
                                </div>                                                              
                            </div>
                            <?php } ?>
                            <!-- End Single Category -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->

<?php require ('includes/footer.php');?>
        