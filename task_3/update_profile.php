<?php
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

          require 'php/dbconnect.php';


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

            session_start();

            $id =  $_SESSION['id'];

             // $sql="INSERT INTO `signup` (`name`, `email`,`password`) VALUES ('$username', '$user_email', '$user_password')";
             $sql="UPDATE `signup` SET `name`='$username', `email`='$user_email',`password`='$user_password' WHERE id = $id";
             $result=mysqli_query($conn,$sql);
             echo '<div class="alert alert-info" role="alert">
                                         Success fully update the profile|
                                 </div>';
        }

        }



?>

<?php



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
        <div class= "container">
        <form action = '<?php htmlspecialchars($_SERVER["PHP_SELF"])?>' method = "post">

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