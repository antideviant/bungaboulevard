<?php session_start();
error_reporting(0);
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BungaBoulevard | Sales Report</title>
        <link rel="icon" type="image/x-icon" href="assets\img\bblogo.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><strong>Sales Report</strong></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php" style="color: brown;">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sales Report</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Sales Report
                            </div>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post">                                
<div class="row">
<div class="col-2">From Date</div>
<div class="col-4"><input type="date"  name="fromdate" class="form-control" required></div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">To Date</div>
<div class="col-4"><input type="date"  name="todate" class="form-control" required></div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-6" align="center"><button type="submit" name="submit" class="btn btn-primary" style="background-color: brown; border-color:brown;">Submit</button></div>
</div>

</form>
                            </div>
                        </div>
                    </div>
<?php if (isset($_POST['submit'])) { 
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
?>

<div class="card-body">
<h4 align="center" style="color:brown;"><i>Sales Report From <?php echo $fdate;?> to <?php echo $tdate;?></i></h4>
<hr />
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Total Amount </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Total Amount </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php $query=mysqli_query($con,"SELECT sum(totalAmount) as totalamount,month(orderDate) as ordermonth,year(orderDate) as orderyear
    FROM `orders` where orderDate between '$fdate' and '$tdate' group by ordermonth,orderyear");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>  

                                <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['ordermonth']."-".$row['orderyear']);?></td>
                                            <td>RM<?php echo htmlentities($tamount=$row['totalamount']);?></td>
                                        </tr>
                                        <?php
$gamount+=$tamount;
                                         $cnt=$cnt+1; } ?>
                                       <tr>
                                           <th colspan="2">Grand Total</th>
                                           <th>RM<?php echo $gamount; ?></th>
                                       </tr>

                                    </tbody>
                                </table>
                            </div>
<?php } ?>

                </main>
          <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="js/custom.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
