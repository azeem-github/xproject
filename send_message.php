<?php include ('includes/config.php');
include ('includes/functions.php');

$name=get_safe_value($conn,$_POST['name']);
$email=get_safe_value($conn,$_POST['email']);
$mobile=get_safe_value($conn,$_POST['mobile']);
$message=get_safe_value($conn,$_POST['message']);
$submitted_on=date('Y-m-d h:i:s');
mysqli_query($conn,"INSERT INTO contact_us(name,email,mobile,message,submitted_on)VALUES('$name','$email','$mobile','$message','$submitted_on')");
echo "Thank You";
?>