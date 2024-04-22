


<?php

session_start();
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }


          require 'dbconnect.php';



    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        // $username=test_input($_POST['name']);
        $user_password=test_input($_POST['password']);
        $user_re_enter_pass=test_input($_POST['email']);
        $user_email = $_SESSION['email'];

        if($user_password==''||$user_re_enter_pass==''){
            echo '<div class="alert alert-danger" role="alert">
                Please fill all the Entries!
                </div>
                ';
            }

        else{
            $existtable="update signup set password = $user_password where email = '$user_email'";
            // $existtable="SELECT * FROM `signup` where email='$user_email' && password='$user_password'";
            $result=mysqli_query($conn,$existtable);

            header("location:login.php");
            
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
  <body >


  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MG Tech</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="signup.php">Signup</a>
        </li>

      </ul>

    </div>
  </div>
</nav>


        <div class= "container " style = "width:65rem; margin-top:2rem; ">
        <form action = '<?php htmlspecialchars($_SERVER["PHP_SELF"])?>' method = "post">

            <!-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Enter Name here</label>
                <input type="text" name = "name" class="form-control" id="" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div> -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Enter new password here</label>
                <input type="password" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone .</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Re-Enter your password</label>
                <input type="password" name = "password" class="form-control" id="exampleInputPassword1">
                <div id="emailHelp" class="form-text">Forget your password <a href="forget_password.php"> click here</a></div>
            </div>
            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>