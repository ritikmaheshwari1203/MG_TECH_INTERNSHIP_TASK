<?php
include('include/config.php');
include('otpfunction.php');

function generateRandomPassword($length = 10) {
    // Characters to include in the password
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_+=';

    // Length of the character list
    $charLength = strlen($chars);

    // Initialize the password variable
    $password = '';

    // Generate random characters until the password length is reached
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[rand(0, $charLength - 1)];
    }

    return $password;
}
error_reporting(0);
if(isset($_POST['submit']))
{
	session_start();
	
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	// password_hash($_POST['password'], PASSWORD_ARGON2I, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);

	// $_SESSION['password']=md5($_POST['password']);
	// $password=password_hash($_POST['password'], PASSWORD_ARGON2I);
	$contactno=$_POST['contactno'];
	// $_SESSION['status']=1;
	$randomPassword = generateRandomPassword(12);
	
	if(sendotp($email,$randomPassword,$fullname)){
		// $temp = $_SESSION['email'];
		$password=password_hash($randomPassword, PASSWORD_ARGON2I);
		$query=mysqli_query($con,"insert into admin(fullName,email,password,mobilenumber) values('$fullname','$email','$password','$contactno')");
		// echo "in if";
		// header('location:email_verification.php');
		// echo "<script type='text/javascript'> document.location ='email_verification.php'; </script>";
		header('location:manage-users.php');
		echo "<script>alert('Registration successfull. Now You can login');</script>";
	}
	else{
	echo "<script>alert('Please check your E-mail address!');</script>";
	}

	// $query=mysqli_query($con,"insert into users(fullName,userEmail,password,contactNo,status) values('$fullname','$email','$password','$contactno','$status')");
	
}

else{
	// echo "in else";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Citizen Connect | User Regsitrations</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
				<h4>Citizen Connect  <hr /><span style="color:#fff;"> User Registration</span></h4>
				<hr />
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<form method="post">
						
					<div class="card-body">
				
				
						<div class="form-group mb-3">
							
							<input type="text" class="form-control" placeholder="Full Name" name="fullname" required="required" autofocus>
						</div>
						<div class="form-group mb-4">
							
							<input type="email" class="form-control" placeholder="Email ID" id="email" onBlur="userAvailability()" name="email" required="required">
		             <span id="user-availability-status1" style="font-size:12px;"></span>
						</div>
						<div class="form-group mb-3">
							
							<input type="text" class="form-control" maxlength="10" name="contactno" placeholder="Contact no" required="required" autofocus>
						</div>
						<!-- <div class="form-group mb-3">
							
							<input type="password" class="form-control" placeholder="Password" required="required" name="password"><br >
						</div> -->
						<button class="btn btn-block btn-primary mb-4"  type="submit" name="submit">Register User</button>
						<hr>
						
					</div></form>
					 <i class="fa fa-home" aria-hidden="true"><a class="" href="../index.php">
		                    Back Home
		                </a></i>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>



</body>

</html>
