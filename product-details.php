<?php session_start();?>
<?php require ('includes/header.php');?>
<?php require ('includes/navbar.php');?>
<?php require ('includes/config.php');?>
<?php require ('includes/functions.php');?>
<?php
    $post_id=$_GET['id'];
    $postQuery= "SELECT * FROM product WHERE id=$post_id";
    $runPQ=mysqli_query($conn,$postQuery);
    $row=mysqli_fetch_assoc($runPQ);

    if(isset($_POST['addCart']))
{
	 $_SESSION['prodId'] = $_POST['id'];
	echo "<script>window.location.href='cart.php';</script>";
}
if (isset($_POST['prodId']) && $_POST['prodId']!=""){
	$prodId = $_POST['prodId'];
	$result = mysqli_query($conn,"SELECT * FROM product WHERE id='$prodId'");
	$row = mysqli_fetch_assoc($result);
	$name = $row['name'];
	$short_description = $row['short_description'];
	$mrp = $row['mrp'];
	
	
	$cartArray = array(
		$prodId=>array(
		'name'=>$name,
		'short_description'=>$short_description,
		'mrp'=>$mrp,
		'quantity'=>1)
	);
	
	 }
?> 
        <div class="body__overlay"></div>
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                        <img src="<?php echo $row['image'];?>" alt="product images" >
                                        </div>
                                    </div>                                    
                                </div>
                                <br>
                                <form action="cart.php" method="POST">
                                <button type="submit" name="addCart" class="fv-btn" style="width:100%;">Add to Cart</button><br>
                                </form>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?php echo $row['name'];?></h2>
                                <ul  class="pro__prize">
                                    <!-- <li class="old__prize">$82.5</li> -->
                                    <li>$.<?php echo $row['mrp'];?></li>
                                </ul>
                                    <!-- <li class="old__prize">$82.5</li> -->
                                <p class="pro__info"><?php echo  $row['short_description'];?></p>                                
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <p><span>Availability:</span> In Stock</p>
                                    </div>
                                    <!-- <div class="sin__desc">
                                        <p><span>Quantity:</span>
                                            <select style="text-align:center">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            </select>
                                        </p>
                                    </div> -->
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#"><?php echo getCategory($conn,$row['categories_id'])?></a></li>
                                        </ul>
                                    </div>                                    
                                    <br>                                  
                                    </div>                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                            <div class="pro__tab__content__inner">
                                    <h4 class="ht__pro__title">Description</h4>
                                    <p><?php echo $row['short_description'];?></p>
                            </div>
                            <hr>
                            <br>
                            <!-- End Single Content -->
                            <?php //} ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
        <!-- Start Product Area -->
        <section class="htc__product__area--2 pb--100 product-details-res">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Collection You Might Like</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                       
                        </div>
                    </div>
                </div>
                <?php
                    $pquery = "SELECT * FROM product WHERE categories_id={$row['categories_id']} ORDER BY id DESC";
                    $prun = mysqli_query($conn,$pquery);
                    while($rpost=mysqli_fetch_assoc($prun)){
                        if($rpost['id']==$post_id){
                            continue;
                        }
                ?>  
                <div class="container">
                    <div class="row">
                        <div class="col">
                        <!-- Start Single Product -->
                            <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                    <a href="product-details.php?id=<?php echo $rpost['id']?>">
                                            <img src="<?php echo $rpost['image'];?>" alt="product images">
                                        </a>
                                    </div>
                                    <hr>
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <!-- <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="cart.php"><i class="icon-handbag icons"></i></a></li> -->

                                            <li><a href="product-details.php?id=<?php echo $rpost['id']?>"><i class="icon-shuffle icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.html"><?php echo $rpost['name'];?> </a></h4>
                                        <ul class="fr__pro__prize">
                                            <!-- <li class="old__prize">$30.3</li> -->
                                            <li>$<?php echo $rpost['mrp']?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- End Single Product -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->
        <!-- End Banner Area -->
        <!-- Start Footer Area -->
<?php require ('includes/footer.php');?>
