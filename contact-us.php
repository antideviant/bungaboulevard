<?php
session_start();
include_once('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BungaBoulevard | Contact Us</title>
    <link rel="icon" type="image/x-icon" href="assets/bblogo.png" />
    <link href="css/custom-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .social-icons {
            list-style: none;
            text-align: center;
            margin: 25px 0;
            padding: 0;
        }

        .social-icons li {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            margin-right: 20px;
        }

        .social-icons li a {
            text-decoration: none;
            color: #FFF; /* Updated color for better visibility */
        }

        .social-icons li i {
            background: #333; /* Updated background color for a more solid look */
            color: #FFF; /* Updated icon color for better visibility */
            padding: 20px;
            font-size: 30px; /* Increased icon size */
            border-radius: 50%;
            margin: 0px 5px;
            cursor: pointer;
            transition: all .5s;
        }

        .social-icons li i:hover {
            background: #FFF; /* Updated background color on hover */
            color: #333; /* Updated icon color on hover */
        }

        .social-icons li p a {
            color: #FF69B4;
        }

        .social-icons li p {
            margin-top: 1em;
            font-size: 16px;
            font-weight: bold;
            color: #333; /* Updated color for better visibility */
        }

        .social-icons li span {
            font-size: 14px;
            color: #888;
            margin-top: 0.5em;
        }

        .header-section {
            background: #FF69B4; /* Updated header color to a more suitable theme */
            padding: 1em 0;
            text-align: center;
        }

        .header-section h1 {
            color: #FFF;
            font-size: 36px;
            font-weight: bold;
            margin: 0;
        }

        .header-section h5 {
            color: #FFF;
            font-size: 18px;
        }

        .text {
            font-family: serif;
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .contact-info {
            text-align: left;
            max-width: 400px;
            margin: 0 auto;
        }

        .contact-info h3 {
            margin-top: 20px;
        }

        .contact-info p {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <?php include_once('includes/header.php'); ?>

    <!-- Header Section -->
    <header class="header-section">
        <div class="container px-4 px-lg-5 my-5">
            <h1 class="display-4 fw-bolder">Contact Us</h1>
            <h5 class="display-10">Fusion brand | Comfort & Versatility</h5>
        </div>
    </header>

    <div class="text">
        <ul class="social-icons">
            <li>
                <a href="tel:+123456789">
                    <i class="fas fa-phone"></i>
                </a>
                <p><a href="tel:+123456789">Call Us</a></p>
            </li>
            <li>
                <a href="https://www.facebook.com/bungaboulevard.co">
                    <i class="fab fa-facebook"></i>
                </a>
                <p><a href="https://www.facebook.com/bungaboulevard.co">Facebook</a></p>
            </li>
            <li>
                <a href="https://www.instagram.com/bungaboulevard.co/">
                    <i class="fab fa-instagram"></i>
                </a>
                <p><a href="https://www.instagram.com/bungaboulevard.co/">Instagram</a></p>
            </li>
            <li>
                <a href="mailto:bungaboulevard@gmail.com">
                    <i class="far fa-envelope email"></i>
                </a>
                <p><a href="mailto:bungaboulevard@gmail.com">Email</a></p>
            </li>
        </ul>

        <!-- Contact Information -->
        <div class="contact-info">
            <h3>Contact Information</h3>
            <p><strong>Address:</strong> Bunga Street, Petaling Jaya</p>
            <p><strong>Phone:</strong> +6012345678</p>
            <p><strong>Email:</strong> info@bungaboulevard.com</p>
        </div>
    </div>

    <?php include_once('includes/footer.php'); ?>
    <script src="js/custom.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
