<?php require ('includes/header.php');?>
<?php require ('includes/config.php');?>
<?php require ('includes/navbar.php');?>
<?php
        session_start();
        if(isset($_SESSION['email']))
        {
        header('Location: index.php');
        } 
        else
        {                
      
        }

		  $erroremail = '';

        $email = '';
        $pass = '';

        if(isset($_POST['login']))
        {
        $email = trim($_POST['email']);
        $pass  =  trim($_POST['password']);

        $query1 = "SELECT * FROM users WHERE email = '$email' and password = '$pass'";
        $check1 = mysqli_query($conn,$query1);
        $info1 = mysqli_fetch_assoc($check1);
        $num_row1 = mysqli_num_rows($check1);
        if($num_row1 == 0)
        {
        ?>
        <div style="color:red";><h5 style="text-align:center;"><?php $erroremail .= "Email Or Password Invalid";?></div>
        <?php }
        else
        {
        // start session and show in admin dashboard
        $_SESSION['email'] = $email;
        echo "<script>alert('Welcome $email')</script>";
        echo "<script>window.open('index.php','_self')</script>";

        }
        }
        ?>
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Login</h2>
									<span style ="color:red"><b><?php echo $erroremail; ?></b></span>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="contact-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="email" id="email" placeholder="Your Email*" style="width:100%" required>
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="password" id="password"  placeholder="Your Password*" style="width:100%" required>
										</div>										
									</div>									
									<div class="contact-btn">
									<button type="submit" name="login" class="fv-btn">Login</button>
									</div>
								</form>
								<div class="form-output">
									<p class="form-messege"></p>
								</div>
							</div>
						</div> 
                
				</div>
				
				<?php

$errorname = '';
$erroremail = '';
$errorpassword = '';

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$password = $_POST['password'];

if(empty($name)){
	$errorname .= "Name Is Required";
}
if(empty($email)){
	$erroremail .= "Email Is Required";
}
if(empty($mobile)){
	$errormobile .= "Mobile is Required";
}
if(empty($password)){
	$errorpassword .= "Password is Required";
}

if($email != ''){
	$sql = "SELECT * FROM users WHERE email = '$email'";
	$search = mysqli_query($conn, $sql);
	$rows = mysqli_num_rows($search);

	if($rows > 0 ){
		$erroremail .= "Email Already Exists";

	}
	else{
		$sql = "INSERT INTO users (name, email,mobile, password)VALUES('$name', '$email','$mobile', '$password')";
		$result = mysqli_query($conn, $sql);
		if($result === TRUE){
			echo "Successfully";
			echo "Login Now";
		}
	}

}
}

?>
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Register</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="contact-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
										<input type="text" name="name" placeholder="Your Name" style="width:100%"/>
										</div>
										<span style ="color:red"><b><?php echo $errorname; ?></b></span>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
										<input type="email" name="email" placeholder="Your Email" style="width:100%"/>
										</div>	
										<span style ="color:red"><b><?php echo $erroremail; ?></b></span>									
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
										<input type="tel" name="mobile" placeholder="Your Mobile"style="width:100%"/>
										</div>	
										<span style ="color:red"><b><?php echo $errormobile; ?></span>									
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
										<input type="password" name="password" placeholder="Your Password" style="width:100%"/>
										</div>	
										<span style ="color:red"><?php echo $errorpassword; ?></span>									
									</div>
									
									 <div class="contact-btn">
									 <button type="submit" name="submit" class="fv-btn">Register</button>
                                </div>
								</form>
								<div class="form-output register_msg">
									<p class="form-messege field_error"></p>
								</div>
							</div>
						</div> 
                
				</div>
					
            </div>
        </section>
        <!-- End Contact Area -->
        <!-- End Banner Area -->
        <!-- Start Footer Area -->
<?php require ('includes/footer.php');?>