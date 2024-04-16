<?php
require 'dbconnect.php';
// echo json_encode("hello");
$sql = "SELECT * from `services` WHERE `status`='unseen'";

$result = mysqli_query($conn,$sql);

$count = mysqli_num_rows($result);

echo json_encode($count);




?>