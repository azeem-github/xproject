<?php session_start();?>
<?php require ('includes/config.php');?>
<?php //require ('functions.php');?>
<header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img src="images/logo/4.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                      <?php
                                       if(isset($_GET['addCart'])){
                                        $id = $_GET['id'];
                                       }
                                       $query = mysqli_query($conn, "SELECT * FROM categories");
							  
                                       while($rows = mysqli_fetch_array($query)){
                                       //   echo "<pre>"; print_r($rows); echo "</pre>"; 
                                           ?>
                                      <li><a href="categories.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['category'];?></a></li>                                     
                                      <?php } ?>
                                        <li><a href="contact.php">contact</a></li>
                                        </ul>                                   
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                                                                  <?php
                                       if(isset($_GET['addCart'])){
                                        $id = $_GET['id'];
                                       }
                                       $query = mysqli_query($conn, "SELECT * FROM categories");
							  
                                       while($rows = mysqli_fetch_array($query)){
                                       //   echo "<pre>"; print_r($rows); echo "</pre>"; 
                                           ?>
                                      <li><a href="categories.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['category'];?></a></li>                                     
                                      <?php } ?>
                                            <li><a href="contact.php">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <!-- <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div> -->
                                    <div class="header__account">
                                    <?php if(empty($_SESSION['email'])){ ?>
                                    <a href="login.php">Login/Register</a>
                                    <?php 
                                    }else{ ?>
                                        <a href="logout.php?log=1">Logout</a>
                                    <?php } ?>
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <!-- <a class="cart__menu" href="cart.php"><i class="icon-handbag icons"></i></a> -->
                                        <a href="cart.php"><i class="icon-handbag icons"></i></a>
                                        <a href="cart.php"><span class="htc__qua">0</
                                        span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form method="GET">
                                    <input placeholder="Search here... " name="search" type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>