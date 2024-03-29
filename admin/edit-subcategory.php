<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {
//For Update Sub-categories
if(isset($_POST['submit']))
{
    $category=$_POST['category'];
    $subcat=$_POST['subcategory'];
    $id=intval($_GET['id']);
$sql=mysqli_query($con,"update subcategory set categoryid='$category',subcategoryName='$subcat' where id='$id'");
echo "<script>alert('Sub-Category Updated successfully');</script>";
echo "<script>window.location.href='manage-subcategories.php'</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BungaBoulevard | Edit Sub Category</title>
        <link rel="icon" type="image/x-icon" href="assets\img\bblogo.png" />
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
                        <h1 class="mt-4"><strong>Edit Sub-Category</strong></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php" style="color: brown;">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Sub-Category</li>
                        </ol>


 <div class="container custom-container" style="padding: 5%; padding-top: 0; padding-bottom: 0;">
                       

                        <div class="login-box">
                            <!-- /.login-logo -->
                            <div class="card card-outline card-primary" style="height: 300px; margin: 10%; padding: 5%; border: 2px solid #c28163; border-radius: 10px; box-shadow: 0px 0px 5px #c28163;">
                       
                            <div class="card-body">

<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select category.id,category.categoryName,subcategory.subcategoryName from subcategory join category on category.id=subcategory.categoryid where subcategory.id='$id'");
while($row=mysqli_fetch_array($query))
{
?>  
                <form  method="post">                                
                <div class="row">
                <div class="col-3">Category Name</div>
                <div class="col-6">
                <select name="category" class="form-control" required>
                        <option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($catname=$row['categoryName']);?></option>
                                <?php $ret=mysqli_query($con,"select * from category");
                                while($result=mysqli_fetch_array($ret))
                                {
                                echo $cat=$result['categoryName'];
                                if($catname==$cat)
                                {continue;
                                }else{
                                ?>
                        <option value="<?php echo $result['id'];?>"><?php echo $result['categoryName'];?></option>
                        <?php } }?>
                </select>    
                </div>
                </div>

                <div class="row" style="margin-top:3%;">
                <div class="col-3">Sub-Category name</div>
                <div class="col-6">
                    <input type="text" value="<?php echo  htmlentities($row['subcategoryName']);?>"  name="subcategory" class="form-control" required></div>
                </div>
                <div class="row">
                          <div class="row mt-3">
                                    <div class="col-6">
                                        <button type="submit" name="submit" class="btn btn-info btn-block btn-lg btn1">Update</button>
                                   </div>
                         </div>

                </div>

                </form>
<?php } ?>
</div>
</div>
                            </div>
                        </div>
                    </div>
                </main>
          <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="js/custom.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php } ?>

 <style>

      .custom-container {
        margin-top: -80px; /* Adjust the value as needed */
        margin-bottom: -10px;
        margin-left: -180px; /* Add this line to move the container to the left */
        padding-bottom: 0; /* Add this line to remove the left padding */
        padding-right: 0; /* Add this line to remove the right padding */
    }

    .btn1 {
        margin-top: 20px;
        margin-left: 280px; /* Modify this value to adjust the left margin of the button */
        color: #fff;    
        background-color:  #b76e79;
        border-color: #b76e79;
    }

    .btn1:hover, .btn1:active {
        color: #b76e79;
        background-color: #fff;
        border-color: #b76e79;
    }
    </style>