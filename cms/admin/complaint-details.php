
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['aid'])==0)
    {   
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Citizen Connect|| Complaints Details</title>
   

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    
 <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>   

</head>
<body class="">
	<?php include('include/sidebar.php');?>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<?php include('include/header.php');?>

<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Complaints Details</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="all-complaint.php">Complaints Details</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
          
            <!-- [ form-element ] start -->
            <div class="col-sm-12">
                <div class="card">
                 
                    <div class="card-body">
                        <h5>View Complaints Details</h5>
                        <hr>
                       
                      <div class="row">
                            <div class="col-xl-12">
                <div class="card">
                   
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                      
                                </thead>
                                <tbody>
                                   <?php $st='closed';
                                   $cid=$_GET['cid'];
                                   
                                   $query=mysqli_query($con,"select * from services where id=$cid");
while($row=mysqli_fetch_array($query))
{

?>                                  
                                        <tr>
                                            <td><b>Notification ID</b></td>
                                            <td><?php echo htmlentities($row['id']);?></td>
                                            <td><b>Service Name</b></td>
                                            <td> <?php echo htmlentities($row['service_name']);?></td>
                                            <td><b>Reg Date</b></td>
                                            <td><?php echo htmlentities($row['created_at']);?>
                                            </td>
                                        </tr>

<tr>
                                            <td><b>Service Type </b></td>
                                            <td><?php echo htmlentities($row['service_type']);?></td>
                                            <td><b>Email</b></td>
                                            <td> <?php echo htmlentities($row['email']);?></td>
                                            <td><b>Contact Number</b></td>
                                            <td><?php echo htmlentities($row['contact']);?>
                                            </td>
                                        </tr>
<tr>
                                            <td><b>Last Updated At </b></td>
                                            <td><?php echo htmlentities($row['updated_at']);?></td>
                                            <td ><b>Message</b></td>
                                            <td colspan="3"> <?php echo htmlentities($row['message']);?></td>
                                            
                                        </tr>


                                            </tr>


<tr>
<td><b>Final Status</b></td>
                                            
                              <td colspan="5"> <?php $status=$row['status'];
                                                if($status=='unseen'): 
                                                    $quer2y=mysqli_query($con,"update services set status = 'seen' where id=$cid");?>
                                                <span class="badge badge-danger">Not Processed Yet</span>
                                            <?php elseif($status=='pending'):?>
                                             <span class="badge badge-warning">In Process</span>
                                             <?php elseif($status=='seen'):?>
                                             <span class="badge badge-warning">Seen</span>
                                         <?php elseif($status=='resolved'):?>
                                             <span class="badge badge-dark">Closed</span>
                                         <?php endif;?></td>
                                            
                                        </tr>
                                        <hr>




<?php $ret=mysqli_query($con,"select * from services where id=$cid");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count): ?>

    <?php 
while($rw=mysqli_fetch_array($ret))
{
?>
<?php $cnt=$cnt+1; } endif; ?>





<tr>
                                           
                                            
                                            <td> 
                                            <?php if($row['status']=="closed"){

                                                } else {?>
<a href="javascript:void(0);" onClick="popUpWindow('updatecomplaint.php?cid=<?php echo htmlentities($row['id']);?>');" title="Update order">
                                             <button type="button" class="btn btn-primary">Take Action</button></td>
                                            </a><?php } ?></td>

                                            
                                        </tr>
                                        <?php  } ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                           
                        </div>
                   
                    </div>
                </div>
          
            </div>
            <!-- [ form-element ] end -->
        </div>
        <!-- [ Main Content ] end -->

    </div>
</section>


    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>




</body>

</html>
<?php } ?>