<?php

require 'otpfunction.php';

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

        //   $servername="localhost";
        //   $username="root";
        //   $database="auth_login";
        //   $password="";
          
        //   $conn=mysqli_connect($servername, $username, $password, $database);

        require 'dbconnect.php';


    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $username=test_input($_POST['name']);
        $user_password=test_input($_POST['password']);
        $user_email=test_input($_POST['email']);

        if($username==''||$user_password==''||$user_email==''){
            echo '<div class="alert alert-danger" role="alert">
                Please fill all the Entries!
                </div>
                ';
            }

        else{

            $existtable="SELECT * FROM `signup` where email='$user_email'";
            $result=mysqli_query($conn,$existtable);
            $no_of_exist_rows= mysqli_num_rows($result);

            if($no_of_exist_rows>0){
                echo '<div class="alert alert-danger" role="alert">
                Email is already exist please try another email!
                </div>
                ';
                
            }

            else{

                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $user_password;
                $_SESSION['email'] = $user_email;

                $otp_genrate=rand(10000,99999);

                if(sendotp($_SESSION['email'],$otp_genrate)){
                    $temp = $_SESSION['email'];
                    $query=mysqli_query($conn,"insert into otptable(email,otp) values('$temp',$otp_genrate)");

      //               $name = $_FILES['profilepic']['name'];
      // $tmp_name = $_FILES['profilepic']['tmp_name'];
      // $ext = pathinfo($_FILES['profilepic']['name'], PATHINFO_EXTENSION);

      // echo $name." ".$tmp_name;
                    // echo "<script type='text/javascript'> document.location ='email_verification.php'; </script>";
                    header("location:verification_page.php");
                }
                else{
                echo "<script>alert('Please check your E-mail address!');</script>";
                }






                // $sql="INSERT INTO `signup` (`name`, `email`,`password`) VALUES ('$username', '$user_email', '$user_password')";
                //     $result=mysqli_query($conn,$sql);
                //     echo '<div class="alert alert-info" role="alert">
                //                                 Success fully Signup!
                //                         </div>';
                //                         header("location:login.php");

            }
        }

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

  <nav class="navbar navbar-expand-lg bg-body-tertiary" >
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MG Tech</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">Login</a>
        </li>

      </ul>

    </div>
  </div>
</nav>



        <div class= "container"  style = "width:65rem; margin-top:2rem">
        <form action = '<?php htmlspecialchars($_SERVER["PHP_SELF"])?>' method = "post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Enter Name here</label>
                <input type="text" name = "name" class="form-control" id="" aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name = "password" class="form-control" id="exampleInputPassword1">
            </div>
            <!-- <div class="mb-3">
                <label for="formFileSm" class="form-label">Choose your profile picture</label>
                <input class="form-control form-control-sm" name="profilepic" id="formFileSm" accept=".png , .jpg" type="file">
             </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>