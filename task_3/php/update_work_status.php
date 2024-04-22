<?php
require 'dbconnect.php';
// echo json_encode("hello");
// $sql = "SELECT * from `services` WHERE `status`='unseen'";
$id = $_GET['id'];
$sql = "UPDATE `services` SET `status`='seen' WHERE `id`=$id";

$result = mysqli_query($conn,$sql);

// $count = mysqli_num_rows($result);
if($result){
    echo json_encode("success");
}
else{

    echo json_encode("unsuccess");
}



?>