<?php
// include('otpfunction.php');


error_reporting(0);
require 'dbconnect.php';
if($_SERVER['REQUEST_METHOD']=='POST')
{
	session_start();


    $otp = $_POST['otp'];
	$username= $_SESSION['username'];
	$user_password = $_SESSION['password'];
	$user_email= $_SESSION['email'];

    $result =mysqli_query($conn,"SELECT * FROM otptable WHERE email='$user_email' AND otp = $otp");
    $count=mysqli_num_rows($result);
if($count>0)
{


  echo $name."  ".$tmp_name;

                    $sql="INSERT INTO `signup` (`name`, `email`,`password`) VALUES ('$username', '$user_email', '$user_password')";
                    $result=mysqli_query($conn,$sql);
                    echo '<div class="alert alert-info" role="alert">
                                                Success fully Signup!
                                        </div>';
                                        // echo "<script>alert('Registration successfull. Now You can login');</script>";
                                        session_unset();
                                        session_destroy();
                                        header("location:login.php");


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


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
  <form method ="post" action = '<?php htmlspecialchars($_SERVER["PHP_SELF"])?>'>
  <!-- <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div> -->
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name = "otp" class="form-control" id="exampleInputPassword1">
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" name ="otp" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
  



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>