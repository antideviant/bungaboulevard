<?php session_start();
include_once('includes/config.php');
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{

// Code for Product deletion from  cart  
if(isset($_GET['del']))
{
$wid=intval($_GET['del']);
$query=mysqli_query($con,"delete from cart where id='$wid'");
 echo "<script>alert('Product deleted from cart.');</script>";
echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BungaBoulevard | My Cart</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/bblogo.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
        <link rel="stylesheet" href="assets/css/Table-With-Search-search-table.css">
        <link rel="stylesheet" href="assets/css/Table-With-Search.css">
        <script src="js/jquery.min.js"></script>
    </head>
    <style type="text/css"></style>
    <style>
    .btn1 {
        color: #fff;
        background-color:  #c28163;
        border-color: #c28163;
    }

    .btn1:hover , .btn1:active {
        color: #fff;
        background-color: #5C4033;
        border-color: #c28163;
    }

    .btn2 {
        color: #fff;
        background-color:  #FF9899; 
        border-color: #cf8d88;
    }

    .btn2:hover , .btn2:active {
        color: #fff;
        background-color: #cf8d88; 
        border-color: #cf8d88;
    }

    .btn3 {
        color: #fff;
        background-color:  #AA4A44; 
        border-color: #AA4A44;
    }

    .btn3:hover , .btn3:active {
        color: #fff;
        background-color: #D2042D; 
        border-color: #AA4A44;
    }
</style>
    <body>
        <?php include_once('includes/header.php');?>    
        <!-- Section-->
        <section class="py-5" style="margin-top: -50px;">
            <div class="container px-4  mt-5" >
                <div class="col-md-12 search-table-col" style="width: 1250px;text-align: left;"><span class="counter pull-right"></span>
                    <div class="table-responsive table table-hover table-bordered results">
                        <table class="table table-hover table-bordered">
                            <h1><strong><i>My Cart</i></strong></h1><br>
                            <thead class="bill-header cs">
                                <tr>
                                    <th id="trs-hd-1" class="col-lg-1" style="background: #ff9b94; width: 15%; text-align:center;">Product</th>
                                    <th id="trs-hd-2" class="col-lg-2" style="background: #ff9b94; width: 25%; text-align:center;">Product Name</th>
                                    <th id="trs-hd-3" class="col-lg-3" style="background: #ff9b94; width: 10%; text-align:center;">Product Size</th>
                                    <th id="trs-hd-4" class="col-lg-2" style="background: #ff9b94; width: 20%; text-align:center;">Product Price</th>
                                    <th id="trs-hd-5" class="col-lg-3" style="background: #ff9b94; width: 10%; text-align:center;">Quantity</th>
                                    <th id="trs-hd-6" class="col-lg-2" style="background: #ff9b94; width: 20%; text-align:center;">Total Amount</th>
                                    <th id="trs-hd-7" class="col-lg-2" style="background: #ff9b94; width: 10%; text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $uid=$_SESSION['id'];
                            $ret = mysqli_query($con, "SELECT products.productName AS pname, products.productImage1 AS pimage, products.productPrice AS pprice, cart.productId AS pid, cart.id AS cartid,cart.productSize AS proisz,products.productPriceBeforeDiscount, cart.productQty 
                                                    FROM cart 
                                                    JOIN products ON products.id = cart.productId 
                                                    WHERE cart.userId = '$uid'");
                            $num=mysqli_num_rows($ret);
                                if($num>0)
                                {
                            while ($row=mysqli_fetch_array($ret)) {

                            ?>
                                <tr>
                                    <td class="col-md-2" style="width: 15%; text-align:center;"><img src="admin/productimages/<?php echo htmlentities($row['pimage']);?>" alt="<?php echo htmlentities($row['pname']);?>" width="100" height="130"></td>
                                    <td style="width: 25%; text-align:center;">
                                        <a href="product-details.php?pid=<?php echo htmlentities($pd=$row['pid']);?>"><?php echo htmlentities($row['pname']);?></a>
                                    </td>
                                    <td style="width: 10%; text-align:center;">
                                        <span><?php echo htmlentities($row['proisz']);?></span>
                                    </td>
                                    <td style="width: 20%; text-align:center;">
                                        <span class="text-decoration-line-through">RM<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span><br>
                                        <span>RM<?php echo htmlentities($row['pprice']);?></span> 
                                    </td>
                                    <td style="width: 10%; text-align:center;"><?php echo htmlentities($row['productQty']);?></td>
                                    <td style="width: 20%; text-align:center;">RM<?php echo htmlentities($row['productQty']*$row['pprice']);?>.00</td>
                                    <td style="width: 10%; text-align:center;">
                                        <a href="my-cart.php?del=<?php echo htmlentities($row['cartid']);?>" onClick="return confirm('Are you sure you want to delete?')" class="btn-upper btn btn3">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="7" style="text-align:right;"><a href="shop-categories.php" class="btn-upper btn btn1">Continue Shopping</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" style="text-align:right;"><a href="checkout.php" class="btn-upper btn btn2">Proceed for Checkout</a>
                                    </td>
                                </tr>
                                <?php } else{ ?>
                                <tr>
                                    <td colspan="7" style="font-size: 18px; font-weight:bold ">Your Cart is Empty.&nbsp;<a href="shop-categories.php" class="btn-upper btn btn1">Continue Shopping</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/Table-With-Search-search-table.js"></script>
    </body>
</html>
<?php } ?>