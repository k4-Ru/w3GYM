<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>w3GYM</title>
    <link rel="stylesheet" href= "Design/indexDesign.css">
</head>

<body>

    <!--mga bagay saNav Bar -->
    <nav>
        <a href="index.php">Home</a>
        <a href="#pricing">Pricing Plans</a>
        <a href="#contact">Contact</a>
        <a href="login.php">Login/SignUp</a>
        <a href="admin_login.php">Admin</a>
    </nav>

    <!-- banner -->
    <div id="home">
            <img src="assets/w3GYM_Banner.png" class="banner">
    </div>

    <div class="divider"> </div>

    <!-- about section -->
    <section class="About" id="about">
        <div>
           <h2>About</h2>
        <p>mga tungkol sa gym</p> 
        </div>
        
    </section>

    <!-- Pricing  -->
    <section class="price-section" id="pricing">
    <h2>Our Pricing Plans</h2>
        <div class="our-pricing-plans">

            <div class="pricing-plan">
                <h3>One Day Pass</h3>
                <p>Access to gym facilities</p>
                <div class="price">$29/day</div>
                <a href="signup.php" class="button">Sign Up</a>
            </div>
     
            <div class="pricing-plan">
                <h3>Weekly</h3>
                <p>Access to gym + personal training</p>
                <div class="price">$59/week</div>
                <a href="signup.php" class="button">Sign Up</a>
            </div>
           
            <div class="pricing-plan">
                <h3>Monthly</h3>
                <p>Unlimited access + all services</p>
                <div class="price">$99/month</div>
                <a href="signup.php" class="button">Sign Up</a>
            </div>
            <div class="pricing-plan">
                <h3>Yearly</h3>
                <p>Unlimited access + all services</p>
                <div class="price">$99/year</div>
                <a href="signup.php" class="button">Sign Up</a>
            </div>
        </div>
    </section>



    <!--sa img mga 1x1 nyo-->
    <section class ="Creators" id ="partners">
        <h2>The Creators</h2>
        <div class="pictures">
            <img src="" alt="">
            <img src="" alt="">
            <img src="" alt="">
            <img src="" alt="">
            <img src="" alt="">
        </div>
    </section>

    <section class = "Contacts" id ="contact">
        <h2>Contacts</h2>
    </section>

</body>

</html>
