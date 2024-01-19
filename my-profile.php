<?php session_start();
include_once('includes/config.php');
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{

//For updating User  Profile
if(isset($_POST['update']))
{
$name=$_POST['fullname'];
$uid=$_SESSION['id'];
$contactno=$_POST['contactnumber'];
$query=mysqli_query($con,"update users set name='$name',contactno='$contactno' where id='$uid'");
if($query)
{
    echo "<script>alert('Profile Updated successfully');</script>";
    echo "<script type='text/javascript'> document.location ='my-profile.php'; </script>";
}else{
echo "<script>alert('Something went wrong. Please try again.');</script>";
    echo "<script type='text/javascript'> document.location ='my-profile.php'; </script>";
} }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BungaBoulevard | My Profile </title>
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
                <div class="col-md-9 col-lg-12 col-xl-9">
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 col-xl-12">
                                    <div class="p-5" style="margin: 3%;">
                                        <?php 
                                            $uid=$_SESSION['id'];
                                            $query=mysqli_query($con,"select * from users where id='$uid'");
                                            while($result=mysqli_fetch_array($query)){
                                        ?>
                                        <h2 style="text-align: center; color:#c28163;"><i><?php echo htmlentities($result['name']);?>'s Profile</i></h2><br>
                                        <form method="post" name="signup">
                                            <div class="input-group mb-3">
                                                <label for="fullname" class="input-group-text" style="width: 130px;">Full Name</label>
                                                <input type="text" name="fullname" value="<?php echo htmlentities($result['name']);?>" class="form-control" style="width: 300px;" required >
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="email" class="input-group-text" style="width: 130px;">E-Mail</label>
                                                <input type="email" name="emailid" id="emailid" class="form-control" value="<?php echo htmlentities($result['email']);?>" readonly>
                                                <span id="user-email-status" style="font-size:12px;"></span>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="contactnumber" class="input-group-text" style="width: 130px;">Phone Number</label>
                                                <input type="text" name="contactnumber" value="<?php echo htmlentities($result['contactno']);?>" maxlength="11" class="form-control" required>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12 text-center">
                                                    <div style="margin-top: 1rem;">
                                                        <button type="submit" name="update" id="update" class="btn btn-info btn-block btn-lg btn1" value="Update">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
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
    <style>
    .custom-container {
        margin-top: -90px; /* Adjust the value as needed */
        margin-bottom: -60px;
    }

    .btn1 {
        color: #fff;
        background-color:  #c28163; /* Adjust color */
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