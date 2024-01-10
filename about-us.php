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
    <title>BungaBoulevard | About Us</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/bblogo.png" />
    <!-- Custom icons-->
    <link href="css/custom-icons.css" rel="stylesheet" />
    <!-- Core theme CSS -->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        .left-text,
        .right-text {
            flex: 1;
        }

        .container-1 {
            display: flex;
            align-items: center;
            padding: 2%;
            font-family: Helvetica, Arial, sans-serif;
            position: relative;
        }

        .image img {
            width: 330px;
            height: 450px;
            margin-left: -100px;
        }

        .indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .indicator {
            width: 10px;
            height: 10px;
            background-color: #888;
            border-radius: 50%;
            cursor: pointer;
        }

        .indicator.active {
            background-color: #333;
        }
    </style>
</head>

<body>
    <?php include_once('includes/header.php'); ?>
    <section class="py-0">
        <div class="container px-4 px-lg-5 mt-5" style="background: #EADDCA;">
            <div class="container-1">
                <div class="left-text">
                    <h1><b><p style="color: brown; font-size: 50px;">About Us</p></b></h1>
                    <h5>Experience the fusion of<br>trendy style and casual<br>comfort. </h5>
                </div>
                <div class="image">
                    <img id="aboutUsImage" src="assets\aboutus1.jpg" alt="About Us Image">
                </div>
                <div class="right-text" style="font-size: 15px; text-align: justify; margin-left: 50px; font-family: Poppins, Arial, sans-serif;">
                    <p>We encourage you to fully immerse yourself in the dynamic world of fashion at BungaBoulevard,
                        where every click is an investigation of style and comfort.
                        Navigate through our chosen collections to <span style="color: brown;"><b> "Experience the fusion of trendy style and casual comfort"</b></span>,
                        carefully designed to improve your wardrobe with the newest trends and easy elegance.
                        We think that fashion should be a seamless combination of stylish aesthetics and everyday comfort,
                        and we're committed to providing you with a shopping experience that matches this attitude.
                        Explore, Click, and Experience the blend of modern style and casual comfort with us.</p>
                </div>
            </div>
            <div class="indicators" id="indicators"></div>
        </div>
    </section>

    <script>
    const imageSources = [
        "assets/aboutus1.jpg",
        "assets/aboutus2.jpg",
        "assets/aboutus3.jpg",
        "assets/aboutus4.jpg",
        "assets/aboutus5.jpg",
        "assets/aboutus6.jpg",
        // Add more image paths as needed
    ];

    let currentImageIndex = 0;
    const aboutUsImage = document.getElementById("aboutUsImage");
    const indicatorsContainer = document.getElementById("indicators");

    // Create indicators based on the number of images
    for (let i = 0; i < imageSources.length; i++) {
        const indicator = document.createElement("div");
        indicator.classList.add("indicator");
        indicator.setAttribute("data-index", i);
        indicatorsContainer.appendChild(indicator);
    }

    const indicators = document.querySelectorAll(".indicator");

    // Set the first indicator as active initially
    indicators[currentImageIndex].classList.add("active");

    // Function to change image and update indicators
    function changeImage(index) {
        currentImageIndex = index;
        aboutUsImage.src = imageSources[currentImageIndex];

        // Update indicators
        indicators.forEach((indicator, i) => {
            if (i === currentImageIndex) {
                indicator.classList.add("active");
            } else {
                indicator.classList.remove("active");
            }
        });
    }

    // Add click event listeners to indicators
    indicators.forEach((indicator, i) => {
        indicator.addEventListener("click", () => {
            changeImage(i);
        });
    });

    // Automatic image sliding every 5 seconds
    setInterval(() => {
        currentImageIndex = (currentImageIndex + 1) % imageSources.length;
        changeImage(currentImageIndex);
    }, 3000);
</script><br>

<!-- Footer-->
   <?php include_once('includes/footer.php'); ?>
        <!-- Custom core JS-->
        <script src="js/custom.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>