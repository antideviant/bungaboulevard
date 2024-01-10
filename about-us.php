<?php session_start();
include_once('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE html>

<style>
    .left-text,
    .right-text {
        flex: 1;
    }

    .container-1{
        display: flex; 
        align-items: center;
        padding: -2%;
        font-family: Helvetica, Arial, sans-serif;
    }
</style>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BungaBoulevard | Abous Us</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/bblogo.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
<?php include_once('includes/header.php');?>
        <!-- Header-->
        <!-- <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">

                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">About Us</h1>
        
                </div>
            </div>
        </header> -->
        <!-- Section-->
        <section class="py-0">
            <div class="container px-4 px-lg-5 mt-5" style="  background: #F6E8E5;">
                <!-- <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"> -->

                <div class="container-1">
    <div class="left-text">
        <h1><b><p style="color: brown; font-size: 50px;">About Us</p></b></h1>
        <h5>Experience the fusion of<br>trendy style and casual<br>comfort. </h5>
    </div>
    <div class="image">
        <img src="assets\aboutus2.jpg" style="width: 330px; height: 450px; margin-left: -100px;">
    </div>
    <div class="right-text" style="font-size: 15px; text-align: justify; margin-left: 50px; font-family: Helvetica, Arial, sans-serif;">
        <p>We encourage you to fully immerse yourself in the dynamic world of fashion at BungaBoulevard, 
            where every click is an investigation of style and comfort. 
            Navigate through our chosen collections to <span style="color: brown;"> "Experience the fusion of trendy style and casual comfort"</span>, 
            carefully designed to improve your wardrobe with the newest trends and easy elegance. 
            We think that fashion should be a seamless combination of stylish aesthetics and everyday comfort, 
            and we're committed to providing you with a shopping experience that matches this attitude. 
            Explore, Click, and Experience the blend of modern style and casual comfort with us.</p>
    </div>
</div>
</div><br>

<!-- Footer-->
   <?php include_once('includes/footer.php'); ?>
        <!-- Custom core JS-->
        <script src="js/custom.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>