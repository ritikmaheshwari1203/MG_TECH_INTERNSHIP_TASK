<?php
include('../include/config.php');


$sql=mysqli_query($con,"select * from services");
$num_rows = mysqli_num_rows($sql);

while($row=mysqli_fetch_array($sql)){
    $output[]= '[START]'.$row['message'].'[END]';
}


echo json_encode(array($output,$num_rows));


?>