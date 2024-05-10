<?php
include('include/config.php');
include('otpfunction.php');
error_reporting(0);
if(isset($_POST['submit']))
{
	session_start();


    $otp = $_POST['otp'];
	$fullname= $_SESSION['fullname'];
	$email = $_SESSION['email'];
	$password= $_SESSION['password'];
	$contactno=$_SESSION['contactno'];
	$status=$_SESSION['status'];
	// $otp_genrate=rand(10000,99999);

    $result =mysqli_query($con,"SELECT * FROM otptable WHERE email='$email' AND otp = $otp");
    $count=mysqli_num_rows($result);
if($count>0)
{
// echo "<span style='color:red'> Email already exists .</span>";
// echo "<script>$('#submit').prop('disabled',true);</script>";
	$query=mysqli_query($con,"insert into admin(fullName,email,password,mobilenumber) values('$fullname','$email','$password','$contactno')");
	
	echo "<script>alert('Registration successfull. Now You can login');</script>";
    // session_unset();
    // session_destroy();
	header('location:manage-users.php');
} 

else{

	echo "<script>alert('OTP is not valid');</script>";
}
	// if(sendotp($_SESSION['email'],$otp_genrate)){
	// 	$temp = $_SESSION['email'];
	// 	$query=mysqli_query($con,"insert into otptable(email,otp) values('$temp',$otp_genrate)");
	// 	echo "<script type='text/javascript'> document.location ='email_verification.php'; </script>";
	// }
	// else{
	// echo "<script>alert('Please check your E-mail address!');</script>";
	// }

	// $query=mysqli_query($con,"insert into users(fullName,userEmail,password,contactNo,status) values('$fullname','$email','$password','$contactno','$status')");
	
	// echo "<script>alert('Registration successfull. Now You can login');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Citizen Connect | User Regsitrations</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- <script>
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
</script> -->
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content text-center">
				<h4>Citizen Connect  <hr /><span style="color:#fff;">E-mail Verification</span></h4>
				<hr />
		<div class="card borderless">
			<div class="row align-items-center ">
				<div class="col-md-12">
					<form method="post">
						
					<div class="card-body">
				
				

						<div class="form-group mb-3">
							
							<input type="password" class="form-control" placeholder="Enter OTP here" required="required" name="otp"><br >
						</div>
						<button class="btn btn-block btn-primary mb-4"  type="submit" name="submit">Register</button>
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
