
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
    <title>Citizen Connect|| All Complaints</title>
   

    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'> -->
 <!-- <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>    -->

<style>
        

/* .pagination {
margin: 0;
} */

.pagination li:hover{
cursor: pointer;
}

.header_wrap {
padding:30px 0;
}
.num_rows {
width: 20%;
float:left;
}
.tb_search{
width: 20%;
/* float:right; */
}
.pagination-container {
width: 70%;
float:left;
}

.rows_count {
width: 20%;
float:right;
text-align:right;
color: #999;
}
    </style>

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
                            <h5 class="m-b-10">Manage Notification</h5>
                        </div>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="all-complaint.php">All Notification</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="header_wrap" style="display:flex;justify-content:space-between;">
            <div class="num_rows">

                <div class="form-group"> <!--		Show Numbers Of Rows 		-->
                    <select class="form-control" name="state" id="maxRows">

                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="70">70</option>
                        <option value="100">100</option>
                        <option value="5000">Show ALL Rows</option>
                    </select>

                </div>
            </div>
            <div class="tb_search">
                <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Search.."
                    class="form-control">
            </div>
        </div>

        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
          
            <!-- [ form-element ] start -->
            <div class="col-sm-12">
                <div class="card">
                 
                    <div class="card-body">
                        <h5>View All Notification</h5>
                        <hr>
                       
                      <div class="row">
                            <div class="col-xl-12">
                <div class="card">
                   
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-id">
                                <thead>
                                        <tr><th>S.No</th>
											<th>Service Name</th>
											<th>Service Type</th>
											<th>Creted At</th>
											<th>Status</th>
											<th></th>
										</tr>
                                </thead>
                                <tbody>
                                    <?php 

$query=mysqli_query($con,"select * from services");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>  
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['service_name']);?></td>
                                            <td><?php echo htmlentities($row['service_type']);?></td>
                                            <td> <?php echo htmlentities($row['created_at']);?></td>
                                           <td>
                                                <?php $status=$row['status'];
                                                if($status==''): ?>
                                                <span class="badge badge-danger">Not Processed Yet</span>
                                            <?php elseif($status=='seen'):?>
                                             <span class="badge badge-warning">Seen</span>
                                         <?php elseif($status=='unseen'):?>
                                             <span class="badge badge-danger">unseen</span>
                                             <?php elseif($status=='resolved'):?>
                                             <span class="badge badge-dark">closed</span>
                                             <?php elseif($status=='pending'):?>
                                             <span class="badge badge-success">in process</span>
                                         <?php endif;?>
</td>
                                           

<td>   <a href="complaint-details.php?cid=<?php echo htmlentities($row['id']);?>" class="btn btn-primary"> View Details</a> 
											</td>

                                        </td>
                                            

                                        </tr>
                                        <?php $cnt=$cnt+1; } ?>
                                   
                                </tbody>
                            </table>
                            
                            <!-- <div class='pagination-container'> -->
            <nav aria-label="Page navigation example" >
                <ul class="pagination">
                    <!--	Here the JS Function Will Add the Rows -->
                </ul>
            </nav>
        <!-- </div> -->


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
<!-- <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script> -->
<!-- <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script> -->
<script src="script.js"></script>
</html>
<?php } ?>