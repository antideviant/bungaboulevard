<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$contactno=$_POST['contactnumber'];
$password=md5($_POST['inputuserpwd']);
$sql=mysqli_query($con,"select id from users where email='$email'");
$count=mysqli_num_rows($sql);
if($count==0){
$query=mysqli_query($con,"insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')");
if($query)
{
    echo "<script>alert('You are successfully register');</script>";
    echo "<script type='text/javascript'> document.location ='login.php'; </script>";
}
else{
echo "<script>alert('Not register something went worng');</script>";
    echo "<script type='text/javascript'> document.location ='signup.php'; </script>";
} } else{
 echo "<script>alert('Email id already registered with another accout. Please try  with another email id.');</script>";
    echo "<script type='text/javascript'> document.location ='signup.php'; </script>";   
}}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BungaBoulevard | Sign up</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/bblogo.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
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
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background: url(&quot;assets/bblogo.png&quot;) top / cover, #ece0d3;"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4" style="text-align: left;"><span style="color: rgb(33, 37, 41);">Discover the Fusion</span><br><span style="color: rgb(33, 37, 41);">of Comfort &amp; Trendy,</span><br><span style="color: rgb(33, 37, 41);">Embrace Your Style Today.</span></h4>
                            </div>
                            <form method="post" name="signup">
                                <div class="mb-3">
                                    <label class="form-label">Fullname</label>
                                    <input type="text" class="form-control" name="fullname" placeholder="Please enter your full name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" name="contactnumber" maxlength="11" placeholder="Please enter your phone number" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="emailid" placeholder="Please enter your e-mail" required>
                                </div>
                                <label class="form-label">Password</label>
                                <div class="mb-3 input-group">
                                    <input type="password" class="form-control" name="inputuserpwd" placeholder="Please enter your password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text toggle-password" style="cursor: pointer;">
                                            <i class="far fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-primary d-block btn-user w-100" style="background-color:#b76e79; border-color: #000000;" type="submit" name="submit" id="submit">Signup</button>
                            </form>
                            <div class="text-center"></div>
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
        <script>
        $(document).ready(function() {
            $('.toggle-password').click(function() {
                var input = $(this).closest('.input-group').find('input');
                var type = input.attr('type');
                if (type === 'password') {
                    input.attr('type', 'text');
                    $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
        </script>
    </body>
    <style>
    .custom-container {
        margin-top: -90px; /* Adjust the value as needed */
        margin-bottom: -60px;
    }

    .btn1 {
        margin-left: 0px;
        color: #fff;    
        background-color:  #b76e79;
        border-color: #b76e79;
    }

    .btn1:hover , .btn1:active {
        color: #b76e79;
        background-color: #fff;
        border-color: #b76e79;
    }
    </style>
</html>
