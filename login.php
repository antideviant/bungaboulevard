<?php session_start();
error_reporting(0); 
include_once('includes/config.php');
// Code for User login
if(isset($_POST['login']))
{
   $email=$_POST['emailid'];
   $password=md5($_POST['inputuserpwd']);
$query=mysqli_query($con,"SELECT id,name FROM users WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
//If Login Suceesfull
if($num>0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
echo "<script type='text/javascript'> document.location ='index.php'; </script>";
}
//If Login Failed
else{
    echo "<script>alert('Invalid login details');</script>";
    echo "<script type='text/javascript'> document.location ='login.php'; </script>";
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BungaBoulevard | Log In</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets\bblogo.png" />
    <!-- Custom icons-->
    <link href="css/custom-icons.css" rel="stylesheet" />
    <!-- Core theme CSS -->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="js/jquery.min.js"></script>
</head>
<style type="text/css">
    input {
        border: solid 1px #000;
    }
</style>
<body>
    <?php include_once('includes/header.php');?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background: url(&quot;assets/bblogo.png&quot;) top / cover, #ece0d3;"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4" style="text-align: left;">
                                        <span style="color: rgb(33, 37, 41);">Login now,</span><br>
                                        <span style="color: rgb(33, 37, 41);">Discover and</span>
                                        <a href="http://localhost/bungaboulevard/admin/index.php" style="text-decoration: none; color: rgb(0, 0, 0);">
                                            <span style="color: rgb(0, 0, 0);">Embrace</span>
                                        </a><br>
                                        <span style="color: rgb(33, 37, 41);">Your Unique Style.</span>
                                    </h4>
                                </div>
                                    <form class="user" method="post" name="login">
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="email" aria-describedby="emailHelp" placeholder="Please enter your e-mail" name="emailid">
                                        </div>
                                        <div class="mb-3 input-group">
                                            <input class="form-control form-control-user" type="password" placeholder="Please enter your password" name="inputuserpwd">
                                            <div class="input-group-append">
                                                <span class="input-group-text toggle-password" style="cursor: pointer;">
                                                    <i class="far fa-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1">
                                                    <label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary d-block btn-user w-100" id="login" name="login" type="submit" style="background: #c28163; border-color: #000000;">Login</button>
                                        <br>
                                        <a href="signup.php" class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button" style="background: #b76e79; border-color: #000000;">Sign Up</a>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" style="color:#c28163" href="password-recovery.php">Forgot Password?</a></div>
                                    <div class="col-12 mt-2 text-center">
                                        <br><small>Are you admin? <a href="admin/index.php" style="color:#c28163">Log In</a> here!</small>
                                    </div>
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
        margin-bottom: -80px;
    }

    .btn1 {
        margin-left: 60%;
        color: #fff;
        background-color:  #c28163;
        border-color: #c28163;
    }

    .btn1:hover , .btn1:active {
        color: #c28163;
        background-color: #fff;
        border-color: #c28163;
    }

    .btn2 {
    margin-left: 0px;
    color: #fff;    
    background-color:  #b76e79;
    border-color: #b76e79;
}

    .btn2:hover,
    .btn2:active {
        color: #b76e79;
        background-color: #fff !important; /* Use !important to ensure higher specificity */
        border-color: #b76e79;
    }
</style>
</html>