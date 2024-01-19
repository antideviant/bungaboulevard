<?php session_start();
include_once('includes/config.php');
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BungaBoulevard | My Orders </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/bblogo.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/jquery.min.js"></script>
</head>
    <style type="text/css"></style>
    <body>
        <?php include_once('includes/header.php');?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-12 col-xl-10">
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 col-xl-12">
                                    <div class="p-5">
                                        <?php 
                                            $uid=$_SESSION['id'];
                                            $query=mysqli_query($con,"select * from users where id='$uid'");
                                            while($result=mysqli_fetch_array($query)){
                                        ?>
                                        <h2 style="text-align: center; color:#c28163;"><i><?php echo htmlentities($result['name']);?>'s Orders</i></h2>
                                        <br>
                                        <?php } ?>
                                        <div class="col-md-12 search-table-col" style="width: 980px;text-align: left;"><span class="counter pull-right"></span>
                                            <div class="table-responsive table table-hover table-bordered results">
                                                <table class="table table-hover table-bordered">
                                                    <thead class="bill-header cs">
                                                        <tr>
                                                            <th id="trs-hd-1" class="col-lg-1" style="background: #ff9b94; width: 10%; text-align:center;">#</th>
                                                            <th id="trs-hd-2" class="col-lg-2" style="background: #ff9b94; width: 15%; text-align:center;">Order Number</th>
                                                            <th id="trs-hd-3" class="col-lg-3" style="background: #ff9b94; width: 20%; text-align:center;">Order Date</th>
                                                            <th id="trs-hd-4" class="col-lg-2" style="background: #ff9b94; width: 20%;text-align:center;">Transaction Type</th>
                                                            <th id="trs-hd-5" class="col-lg-3" style="background: #ff9b94; width: 15%; text-align:center;">Total Amount</th>
                                                            <th id="trs-hd-6" class="col-lg-2" style="background: #ff9b94; width: 20%; text-align:center;">Order Status</th>
                                                            <th id="trs-hd-7" class="col-lg-2" style="background: #ff9b94; width: 20%; text-align:center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $uid=$_SESSION['id'];
                                                            $ret=mysqli_query($con,"select * from orders where userId='$uid'");
                                                            $num=mysqli_num_rows($ret);
                                                            $cnt=1;
                                                                if($num>0)
                                                                {
                                                            while ($row=mysqli_fetch_array($ret)) {
                                                        ?>
                                                        <tr>
                                                            <td style="text-align:center;"><?php echo htmlentities($cnt);?></td>
                                                            <td style="text-align:center;"><?php echo htmlentities($row['orderNumber']);?></td>
                                                            <td style="text-align:center;"><?php echo htmlentities($row['orderDate']);?></td>
                                                            <td style="text-align:center;"><?php echo htmlentities($row['txnType']);?></td>
                                                            <td style="text-align:center;">RM<?php echo htmlentities($row['totalAmount']);?></td>
                                                            <td style="text-align:center;">
                                                                <?php $ostatus=$row['orderStatus'];
                                                                if( $ostatus==''): echo "Not Processed Yet";
                                                                    else: echo $ostatus; endif;?><br />
                                                            </td>
                                                            <td style="text-align:center;"><a href="order-details.php?onumber=<?php echo htmlentities($row['orderNumber']);?>" class="btn btn-info btn-block btn1">Details</a></td>
                                                        </tr>
                                                        <?php $cnt++;}  } else{ ?>
                                                        <tr>
                                                            <td colspan="7" style="font-size: 18px; font-weight:bold ">Not Order Yet.&nbsp;
                                                            <a href="shop-categories.php" class="btn-upper btn btn-warning">Continue Shopping</a>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
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
            </div>
        </div>
        </section>
        <!-- Footer-->
        <?php include_once('includes/footer.php'); ?>
        <!-- Custom core JS-->
        <script src="js/custom.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    <style>
    .custom-container {
        margin-top: -90px; /* Adjust the value as needed */
        margin-bottom: -60px;
    }

    .btn1 {
        color: #fff;
        background-color:  #c28163; 
        border-color: #c28163;
    }

    .btn1:hover , .btn1:active {
        color: #fff;
        background-color: #654321; 
        border-color: #c28163;
    }
    </style>
</html>
<?php } ?>
