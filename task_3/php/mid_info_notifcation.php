<?php
require 'dbconnect.php';

$sql = "SELECT * from `services` WHERE `status`='unseen'";

$result = mysqli_query($conn,$sql);

// $output = [];

while($row = mysqli_fetch_assoc($result)){

    $output[] = array($row['id'],$row['service_type'],$row['name'],$row['contact'],$row['service_name'],$row['email'],$row['message'],$row['created_at']);

}

// $count = mysqli_num_rows($result);

echo json_encode($output);



?>