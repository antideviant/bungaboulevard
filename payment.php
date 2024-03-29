<?php session_start();
include_once('includes/config.php');
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{
if($_SESSION['address']==0):
    echo "<script type='text/javascript'> document.location ='checkout.php'; </script>";
endif;    

//Order details
if(isset($_POST['submit']))
{
$orderno= mt_rand(100000000,999999999);
$userid=$_SESSION['id'];
$address=$_SESSION['address'];
$totalamount=$_SESSION['gtotal'];
$txntype=$_POST['paymenttype'];
$txnno=$_POST['txnnumber'];
$query=mysqli_query($con,"insert into orders(orderNumber,userId,addressId,totalAmount,txnType,txnNumber) values('$orderno','$userid','$address','$totalamount','$txntype','$txnno')");
if($query)
{

$sql="insert into ordersdetails (userId,productId,quantity) select userID,productId,productQty from cart where userID='$userid';";
$sql.="update ordersdetails set orderNumber='$orderno' where userId='$userid' and orderNumber is null;";
$sql.="delete from  cart where userID='$userid'";
$result = mysqli_multi_query($con, $sql);
if ($query) {
unset($_SESSION['address']);
unset($_SESSION['gtotal']);    
echo '<script>alert("Your order successfully placed. Order number is "+"'.$orderno.'")</script>';
    echo "<script type='text/javascript'> document.location ='my-orders.php'; </script>";
} } else{
echo "<script>alert('Something went wrong. Please try again');</script>";
    echo "<script type='text/javascript'> document.location ='payment.php'; </script>";
} }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BungaBoulevard | Payment Gateaway</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/bblogo.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/jquery.min.js"></script>

        <style type="text/css">
            header.py-5 {
                margin-top: -10px;
                margin-bottom: -30px;
            }
            /* Add this CSS to reduce the space */
            section.py-5 {
                margin-top: -4rem;
                padding-top: 0;
            }

            .btn2 {
                color: #fff;
                background-color:  #cf8d88; 
                border-color: #cf8d88;
            }

            .btn2:hover , .btn2:active {
                color: #fff;
                background-color: #654321; 
                border-color: #cf8d88;
            }
        </style>

    </head>
<style type="text/css"></style>
    <body>
        
<?php include_once('includes/header.php');?>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-6">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 col-xl-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h2 class="text-dark mb-4" style="text-align: center; font-color:pink;"><strong><span style="color: #A52A2A;">Payment</span></strong></h2>
                                    </div>
                                    <form method="post" name="signup">
                                        <div class="mb-3">
                                            <label class="form-label">Total Payment</label>
                                            <input input type="text" name="totalamount" value="RM <?php echo $_SESSION['gtotal'];?>" class="form-control" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Payment Type</label>
                                            <select class="form-control" name="paymenttype" id="paymenttype" required>
                                                <option value="">Select</option>
                                                <option value="e-Wallet">E-Wallet</option>
                                                <option value="Internet Banking">Internet Banking</option>
                                                <option value="Debit/Credit Card">Debit/Credit Card</option>
                                                <option value="Cash on Delivery">Cash on Delivery (COD)</option>
                                            </select>
                                        </div>
                                        <div class="mb-3" id="txnno">
                                            <div class="col-4">Transaction Number</div>
                                            <div class="col4"><input type="text" name="txnnumber" id="txnnumber" class="form-control" maxlength="50"></div>
                                        </div>
                                        <br>
                                        <input type="submit" name="submit" id="submit" class="btn btn-primary d-block btn-user w-100" value="Submit" style="background: #cf8d88; border-color: #000000;" required>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Footer-->
   <?php include_once('includes/footer.php'); ?>
        <!-- Custom core JS-->
        <script src="js/custom.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
<script type="text/javascript">

  //For report file
  $('#txnno').hide();
  $(document).ready(function(){
  $('#paymenttype').change(function(){
  if($('#paymenttype').val()=='Cash on Delivery')
  {
  $('#txnno').hide();
  } else if($('#paymenttype').val()==''){
      $('#txnno').hide();
  } else{
    $('#txnno').show();
  jQuery("#txnnumber").prop('required',true);  
  }
})}) 
</script>
<?php } ?>

<style type="text/css">
    .pink-text {
        color: brown;
    }
</style>
