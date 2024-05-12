<?php
include('../include/config.php');

$input = file_get_contents('php://input');
$decode = json_decode($input, true);

$notification_id = (int)$decode['notification_id'];
$status = $decode['status'];


$sql=mysqli_query($con,"update services set status='$status' where id=$notification_id");

if($sql){
    echo json_encode(True);
}

else{
    echo json_encode(FALSE);
}




?>