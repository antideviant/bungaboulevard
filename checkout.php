<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{
// Code for Product deletion from  cart  
if(isset($_GET['del']))
{
$wid=intval($_GET['del']);
$query=mysqli_query($con,"delete from cart where id='$wid'");
 echo "<script>alert('Product deleted from cart.');</script>";
echo "<script type='text/javascript'> document.location ='checkout.php'; </script>";
}
// For Address Insertion
if(isset($_POST['submit'])){
$uid=$_SESSION['id'];    
//Getting Post Values
$baddress=$_POST['baddress'];
$bcity=$_POST['bcity'];
$bstate=$_POST['bstate'];
$bpincode=$_POST['bpincode'];
$bcountry=$_POST['bcountry'];
$saddress=$_POST['saddress'];
$scity=$_POST['scity'];
$sstate=$_POST['sstate'];
$spincode=$_POST['spincode'];
$scountry=$_POST['scountry'];

$sql=mysqli_query($con,"insert into addresses(userId,billingAddress,biilingCity,billingState,billingPincode,billingCountry,shippingAddress,shippingCity,shippingState,shippingPincode,shippingCountry) values('$uid','$baddress','$bcity','$bstate','$bpincode','$bcountry','$saddress','$scity','$sstate','$spincode','$scountry')");
if($sql)
{
    echo "<script>alert('You Address added successfully');</script>";
    echo "<script type='text/javascript'> document.location ='checkout.php'; </script>";
}
else{
echo "<script>alert('Something went wrong. Please try again.');</script>";
    echo "<script type='text/javascript'> document.location ='checkout.php'; </script>";
}
}
//For Proceeding Payment
if(isset($_POST['proceedpayment'])){
 $address=$_POST['selectedaddress'];  
 $gtotal=$_POST['grandtotal']; 
 $_SESSION['address']=$address;
 $_SESSION['gtotal']=$gtotal;
   echo "<script type='text/javascript'> document.location ='payment.php'; </script>";   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BungaBoulevard | Checkout</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/bblogo.png" />
    <!-- Custom icons-->
    <link href="css/custom-icons.css" rel="stylesheet" />
    <!-- Core theme CSS -->
    <link href="css/styles.css" rel="stylesheet" />
    <script src="js/jquery.min.js"></script>

    <style type="text/css">
        /* Add this CSS to reduce the space */
        section.py-5 {
            margin-top: -6rem;
            padding-top: 0;
        }

        .btn2 {
            color: #fff;
            background-color: #cf8d88;
            border-color: #cf8d88;
        }

        .btn2:hover,
        .btn2:active {
            color: #fff;
            background-color: #654321;
            border-color: #cf8d88;
        }
    </style>

</head>
<style type="text/css"></style>

<body>
    <?php include_once('includes/header.php');?>

    <!-- Header-->
    <?php include_once('includes/header.php');?>
    <header class="py-4">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder" style="color: #cf8d88;">Checkout</h1>
        </div>
    </header>
<style>

/*table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px; 
            text-align: center;
        }

        th {
            background-color: #ff9b94; 
        }
*/

</style>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4  mt-5">
                    <div class="table-responsive">
                    <div class="col-md-12 search-table-col" style="width: 1250px;text-align: left;"><span class="counter pull-right"></span>
                    <div class="table-responsive table table-hover table-bordered results">
                        <table class="table table-hover table-bordered">
                        <h4 class="mb-4">My Cart</h4>
                        <table class="table">
                            <tr>
                                <thead>
                                    <th id="trs-hd-1" class="col-lg-1"
                                        style="border: 1px solid #ddd; padding: 8px;text-align: center; background: #ff9b94; width: 15%; text-align:center;">Product</th>
                                    <th id="trs-hd-2" class="col-lg-2"
                                        style="border: 1px solid #ddd; padding: 8px;text-align: center; background: #ff9b94; width: 25%; text-align:center;">Product Name</th>
                                    <th id="trs-hd-4" class="col-lg-2"
                                        style="border: 1px solid #ddd; padding: 8px;text-align: center; background: #ff9b94; width: 20%; text-align:center;">Product Price</th>
                                    <th id="trs-hd-5" class="col-lg-3"
                                        style="border: 1px solid #ddd; padding: 8px;text-align: center; background: #ff9b94; width: 10%; text-align:center;">Quantity</th>
                                    <th id="trs-hd-6" class="col-lg-2"
                                        style="border: 1px solid #ddd; padding: 8px;text-align: center; background: #ff9b94; width: 20%; text-align:center;">Total Amount</th>
                                    <th id="trs-hd-7" class="col-lg-2"
                                        style="border: 1px solid #ddd; padding: 8px;text-align: center; background: #ff9b94; width: 10%; text-align:center;">Action</th>
                                </thead>
                            </tr>
                            <tbody>
                                <?php
$uid=$_SESSION['id'];
$ret=mysqli_query($con,"select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,cart.productId as pid,cart.id as cartid,products.productPriceBeforeDiscount,cart.productQty from cart join products on products.id=cart.productId where cart.userId='$uid'");
$num=mysqli_num_rows($ret);
    if($num>0)
    {
while ($row=mysqli_fetch_array($ret)) {

?>

                                <tr>
                                    <td class="col-md-2" style="border: 1px solid #ddd; padding: 8px;text-align: center; width: 15%; text-align:center;"><img
                                            src="admin/productimages/<?php echo htmlentities($row['pimage']);?>"
                                            alt="<?php echo htmlentities($row['pname']);?>" width="100" height="140">
                                    </td>
                                    <td style="border: 1px solid #ddd; padding: 8px;text-align: center; width: 25%; text-align:center;">
                                        <a href="product-details.php?pid=<?php echo htmlentities($pd=$row['pid']);?>"
                                            style="color: hotpink;"><?php echo htmlentities($row['pname']);?></a>
                                    </td>
                                    <td style="border: 1px solid #ddd; padding: 8px;text-align: center; width: 20%; text-align:center;">
                                        <span class="text-decoration-line-through">RM
                                            <?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
                                        <span>RM <?php echo htmlentities($row['pprice']);?></span>
                                    </td>
                                    <td style="border: 1px solid #ddd; padding: 8px;text-align: center; width: 10%; text-align:center;">
                                        <?php echo htmlentities($row['productQty']);?></td>
                                    <td style="border: 1px solid #ddd; padding: 8px;text-align: center; width: 20%; text-align:center;">RM
                                        <?php echo htmlentities($totalamount=$row['productQty']*$row['pprice']);?>.00</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;text-align: center; width: 10%; text-align:center;">
                                        <a href="my-cart.php?del=<?php echo htmlentities($row['cartid']);?>"
                                            onClick="return confirm('Are you sure you want to delete?')"
                                            class="btn-upper btn btn-danger">Delete</a>
                                    </td>
                                </tr>

                                <?php $grantotal+=$totalamount;
            } ?>
                
                                <tr>
                                    <th colspan="4">Grand Total</th>
                                    <th style="width: 10%; text-align:center;">RM <?php echo $grantotal;?>.00</th>
                                </tr>

                                <?php } else{  
    echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>"; } ?>
                            </tbody>
                        </table>
                        </div>
                        <br>
                        <h5>Already Listed Addresses</h5>
                        <?php 
    $uid=$_SESSION['id'];
    $query=mysqli_query($con,"select * from addresses where userId='$uid'");
    $count=mysqli_num_rows($query);
    if($count==0):
    echo "<font color='red'>No addresses Found.</font>";
    else:
    ?>
                        <form method="post">
                            <input type="hidden" name="grandtotal" value="<?php echo $grantotal; ?>">
                            <div class="row">
                                <div class="col-6">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="4">
                                                    <h5>Billing Address</h5>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <thead>
                                                <th>#</th>
                                                <th width="250">Adresss</th>
                                                <th width="90">City</th>
                                                <th width="85">State</th>
                                                <th width="10">Postcode</th>
                                                <th width="10">Country</th>
                                            </thead>
                                        </tr>
                                    </table>

                                </div>
                                <div class="col-6">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="4">
                                                    <h5>Shipping Address</h5>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <thead>
                                                <th width="280">Adresss</th>
                                                <th width="120">City</th>
                                                <th width="70">State</th>
                                                <th width="100">Postcode</th>
                                                <th width="100">Country</th>
                                            </thead>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Fecthing Values-->
                            <?php while ($result=mysqli_fetch_array($query)) { ?>
                            <div class="row">
                                <div class="col-6">
                                    <table class="table">

                                        <tbody>

                                            <tr>
                                                <td><input type="radio" name="selectedaddress"
                                                        value="<?php echo $result['id'];?>" required></td>
                                                <td width="250"><?php echo $result['billingAddress'];?></td>
                                                <td><?php echo $result['biilingCity'];?></td>
                                                <td><?php echo $result['billingState'];?></td>
                                                <td><?php echo $result['billingPincode'];?></td>
                                                <td><?php echo $result['billingCountry'];?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="col-6">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td width="250"><?php echo $result['shippingAddress'];?></td>
                                                <td><?php echo $result['shippingCity'];?></td>
                                                <td><?php echo $result['shippingState'];?></td>
                                                <td><?php echo $result['shippingPincode'];?></td>
                                                <td><?php echo $result['shippingCountry'];?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <?php } endif; ?>
                            <div align="right">
                                <button class="btn-upper btn btn-primary btn2" type="submit"
                                    name="proceedpayment">Proceed for
                                    Payment</button>
                            </div>
                        </form>
                        <hr />

                        <form method="post" name="address">
                            <div class="row">
                                <!--Billing Addresss --->
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-9" align="center">
                                            <h5>New Billing Address</h5><br />
                                        </div>
                                        <small style="color:white">New Shipping Address</small>
                                        <hr />
                                    </div>
                                    <div class="row">
                                        <div class="col-3">Address</div>
                                        <div class="col-6"><input type="text" name="baddress" id="baddress"
                                                class="form-control" required></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-3">City</div>
                                        <div class="col-6"><input type="text" name="bcity" id="bcity"
                                                class="form-control" required>
                                        </div>

                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-3">State</div>
                                        <div class="col-6"><input type="text" name="bstate" id="bstate"
                                                class="form-control" required></div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-3">Postcode</div>
                                        <div class="col-6"><input type="text" name="bpincode" id="bpincode"
                                                pattern="[0-9]+" title="only numbers" maxlength="6" class="form-control"
                                                required></div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-3">Country</div>
                                        <div class="col-6"><input type="text" name="bcountry" id="bcountry"
                                                class="form-control" required></div>
                                    </div>
                                </div>
                                <!--Shipping Addresss --->
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-9" align="center">
                                            <h5>New Shipping Address</h5>
                                            <input type="checkbox" name="adcheck" value="1" />
                                            <small>Shipping Adress same as billing Address</small>
                                        </div>
                                        <small style="color:white">New Shipping Address</small>
                                        <hr />
                                    </div>
                                    <div class="row">
                                        <div class="col-3">Address</div>
                                        <div class="col-6"><input type="text" name="saddress" id="saddress"
                                                class="form-control" required></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-3">City</div>
                                        <div class="col-6"><input type="text" name="scity" id="scity"
                                                class="form-control" required>
                                        </div>

                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-3">State</div>
                                        <div class="col-6"><input type="text" name="sstate" id="sstate"
                                                class="form-control" required></div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-3">Postcode</div>
                                        <div class="col-6"><input type="text" name="spincode" id="spincode"
                                                pattern="[0-9]+" title="only numbers" maxlength="6" class="form-control"
                                                required></div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-3">Country</div>
                                        <div class="col-6"><input type="text" name="scountry" id="scountry"
                                                class="form-control" required></div>
                                    </div>


                                </div>
                                <div class="row mt-3">
                                    <div class="col-5">&nbsp;</div>
                                    <div class="col-6"><input type="submit" name="submit" id="submit"
                                            class="btn btn-primary btn2" value="Add" required></div>
                                </div>

                            </div>
                        </form>
                </div>
            </div>
    </section>
    <!-- Footer-->
    <?php include_once('includes/footer.php'); ?>
    <!-- Custom core JS-->
    <script src="js/custom.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('input[type="checkbox"]').click(function () {
                if ($(this).prop("checked") == true) {
                    $('#saddress').val($('#baddress').val());
                    $('#scity').val($('#bcity').val());
                    $('#sstate').val($('#bstate').val());
                    $('#spincode').val($('#bpincode').val());
                    $('#scountry').val($('#bcountry').val());
                }

            });
        });
    </script>
</body>

</html>
<?php } ?>