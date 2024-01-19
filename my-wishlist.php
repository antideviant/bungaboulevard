<?php session_start();
error_reporting(0);
include_once('includes/config.php');
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{
// Code forProduct deletion from  wishlist  
if(isset($_GET['del']))
{
$wid=intval($_GET['del']);
$query=mysqli_query($con,"delete from wishlist where id='$wid'");
 echo "<script>alert('Product deleted from wishlist.');</script>";
echo "<script type='text/javascript'> document.location ='my-wishlist.php'; </script>";

}

//Move the product from wishlist to car
if($_GET['id']){
 $wid=$_GET['id'] ;
$sql="insert into cart(userID,productId,productQty) select userId,productId,'1' from wishlist where id='$wid';";
$sql.="delete from  wishlist where id='$wid'";
$result = mysqli_multi_query($con, $sql);
if ($result) {
     echo "<script>alert('Product moved into the cart');</script>";
     echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
 }}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BungaBoulevard | My Wishlist</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/bblogo.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/jquery.min.js"></script>
    </head>
            <script>
function emailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-email-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<style type="text/css"></style>
    <body>
    <?php include_once('includes/header.php');?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-12 col-xl-9">
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
                                        <h2 style="text-align: center; color:#c28163;"><i><?php echo htmlentities($result['name']);?>'s Wishlist</i></h2>
                                        <br>
                                        <?php } ?>
                                        <div class="col-md-12 search-table-col" style="width: 870px;text-align: left;"><span class="counter pull-right"></span>
                                            <div class="table-responsive table table-hover table-bordered results">
                                                <table class="table table-hover table-bordered">
                                                    <thead class="bill-header cs">
                                                        <tr>
                                                            <th id="trs-hd-1" class="col-lg-1" style="background: #ff9b94; width: 10%; text-align:center;">Product</th>
                                                            <th id="trs-hd-2" class="col-lg-2" style="background: #ff9b94; width: 15%; text-align:center;">Product Name</th>
                                                            <th id="trs-hd-3" class="col-lg-3" style="background: #ff9b94; width: 20%; text-align:center;">Price</th>
                                                            <th id="trs-hd-4" class="col-lg-4" style="background: #ff9b94; width: 10%; text-align:center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $uid=$_SESSION['id'];
                                                            $ret=mysqli_query($con,"select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,wishlist.productId as pid,wishlist.id as wid,products.productPriceBeforeDiscount from wishlist join products on products.id=wishlist.productId where wishlist.userId='$uid'");
                                                            $num=mysqli_num_rows($ret);
                                                                if($num>0)
                                                                {
                                                            while ($row=mysqli_fetch_array($ret)) {
                                                        ?>
                                                        <tr>
                                                            <td class="col-md-2" style="width: 10%; text-align:center;"><img src="admin/productimages/<?php echo htmlentities($row['pimage']);?>" alt="<?php echo htmlentities($row['pname']);?>" width="100" height="130"></td>
                                                            <td class="col-md-6" style="width: 15%; text-align:center;">
                                                                <div class="product-name"><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['pid']);?>"><?php echo htmlentities($row['pname']);?></a></div>
                                                            </td>
                                                            <td style="width: 20%; text-align:center;">
                                                                <span class="text-decoration-line-through">RM<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span><br>
                                                                <span>RM<?php echo htmlentities($row['pprice']);?></span>
                                                            </td>
                                                            <td style="width: 20%; text-align:center;">
                                                                <a href="my-wishlist.php?action=movetocart&id=<?php echo $row['wid']; ?>" class="btn-upper btn btn-primary btn1">Add to Cart</a>
                                                                <a href="my-wishlist.php?del=<?php echo htmlentities($row['wid']);?>" onClick="return confirm('Are you sure you want to delete?')" class="btn-upper btn btn-danger">Delete</a>
                                                            </td>
                                                        </tr>
                                                        <?php } } else{ ?>
                                                        <tr>
                                                            <td colspan="4" style="font-size: 18px; font-weight:bold ">Your Wishlist is Empty</td>
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
        margin-bottom: -80px;
    }

    .btn1 {
        color: #fff;
        background-color:  #c28163;
        border-color: #c28163;
    }

    .btn1:hover , .btn1:active {
        color: #c28163;
        background-color: #fff;
        border-color: #c28163;
    }
    </style>
</html>
<?php } ?>
