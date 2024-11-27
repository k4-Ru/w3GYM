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
        <a href="login.php">Login</a>
    </nav>

    <!-- Home -->
    <section class="home-section" id="home">
        <h2>w3GYM</h2>
        <p>Where. We. Win</p>
    </section>

    <!-- about section -->
    <section class="About" id="about">
        <h2>About</h2>
        <p>mga tungkol sa gym</p>
    </section>

    <!-- Pricing  -->
    <section class="home-section" id="pricing">
        <h2>Our Pricing Plans</h2>
        <div class="pricing-plans">
            <!-- Plan 1 -->
            <div class="pricing-plan">
                <h3>Basic Plan</h3>
                <p>Access to gym facilities</p>
                <div class="price">$29/month</div>
                <a href="#" class="button">Sign Up</a>
            </div>
            <!-- Plan 2 -->
            <div class="pricing-plan">
                <h3>Premium Plan</h3>
                <p>Access to gym + personal training</p>
                <div class="price">$59/month</div>
                <a href="#" class="button">Sign Up</a>
            </div>
            <!-- Plan 3 -->
            <div class="pricing-plan">
                <h3>Elite Plan</h3>
                <p>Unlimited access + all services</p>
                <div class="price">$99/month</div>
                <a href="#" class="button">Sign Up</a>
            </div>
        </div>
    </section>

    <!-- naglagay me partners/sponsors-->
    <section class ="Partners" id ="partners">
        <h2>Our Parners</h2>

    </section>

</body>

</html>