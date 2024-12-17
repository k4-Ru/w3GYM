<div?php
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
        <a href="#price">Pricing Plans</a>
        <a href="#contact">Contact</a>
        <a href="login.php">Login/SignUp</a>
        <a href="admin_login.php">Admin</a>
    </nav>

    <!-- banner -->
    <div id="home">
            <img src="assets/w3GYM_Banner.png" class="banner" alt="w3Gym Banner">
    </div>

    <div class="divider"> </div>

    <!-- about section -->
    <section class="About" id="About">
        <div class="bitch">
        <h2>About</h2>
        <p>
        The wellness center W3GYM offers state-of-the-art facilities for people of all fitness levels and sees fitness as a way of life. We have a professional trainer and offer top-notch equipment, seminars, and personalized training programs. In line with your goals, begin your path toward health and fitness by joining W3GYM. Our supportive community and expert guidance ensure you stay motivated and achieve long-lasting results.
        </div>
    </section>


    <!-- Pricing  -->
    <section class="price-section" id="price">
    <h2>Our Pricing Plans</h2>
        <div class="our-pricing-plans">
            <div class="pricing-plan">
                <h3>ONE DAY PASS</h3>
                <p>Access to gym facilities</p>
                <div class="price">₱69/day</div>
                <a href="signup.php" class="button">Sign Up</a>
            </div>
            <div class="pricing-plan">
                <h3>WEEKLY</h3>
                <p>Access to gym + personal training</p>
                <div class="price">₱369/week</div>
                <a href="signup.php" class="button">Sign Up</a>
            </div>
            
            <div class="pricing-plan">
                <h3>MONTHLY</h3>
                <p>Unlimited access + all services</p>
                <div class="price">₱1369/month</div>
                <a href="signup.php" class="button">Sign Up</a>
            </div>
            <div class="pricing-plan">
                <h3>YEARLY</h3>
                <p>Unlimited access + all services</p>
                <div class="price">₱13,699/year</div>
                <a href="signup.php" class="button">Sign Up</a>
            </div>
        </div>
    </section>



    <!--sa img mga 1x1 nyo-->
    <section class ="Creators" id ="partners">
        <h2>The Creators</h2>
        <div class="pictures">
            <div class="team">
                <img src="assets/kel.jpg" alt="Michael Caliguia" width="180" length="180">
                <p><a class="email-button" href="mailto:michaelcaliguia089@gmail.com?subject=Subject%20of%20the%20Email&body=Body%20of%20the%20Email">
                Michael Angelo Caliguia
            </a></p>
            </div>
            <div class="team">
            <img src="assets/parleyy.jpg" alt="Jean Lanierod Carlos">
            <p><a class="email-button" href="mailto:202311114@gordoncollege.edu.ph?subject=Subject%20of%20the%20Email&body=Body%20of%20the%20Email">
                Jean Lanierod Carlos
            </a></p>
            </div>
            <div class="team">
            <img src="assets/jay.jpg" alt="Jay Carlo Dimapilis" width="180" length="180">
            <p><a class="email-button" href="mailto:202310935@gordoncollege.edu.ph?subject=Subject%20of%20the%20Email&body=Body%20of%20the%20Email">
                Jay Carlo Dimapilis
            </a></p>
            </div>
            <div class="team">
                <img src="assets/carl.jpg" alt="Carl Nicolas Navarro">
                <p><a class="email-button" href="mailto:202311511@gordoncollege.edu.ph?subject=Subject%20of%20the%20Email&body=Body%20of%20the%20Email">
                Carl Nicolas Navarro
            </a></p>
            </div>
            <div class="team">
                <img src="assets/lhar.jpg" alt="Lhar Jashtine Militante">
                <p><a class="email-button" href="mailto:202311643@gordoncollege.edu.ph?subject=Subject%20of%20the%20Email&body=Body%20of%20the%20Email">
                Lhar Jashtine Militante
            </a></p>
            </div>
        </div>
    </section>

    <section class="Contacts" id="contact">
        <div class="dumbass_protocol">
            <a class="email-button" href="mailto:w3Gym@gmail.com?subject=Subject%20of%20the%20Email&body=Body%20of%20the%20Email">
            <img src="assets/w3Gym_banner.png" alt="w3Gym"><p>If you have any concerns, feel free to contact us at w3Gym.gmail.com</p>
            </a>
        </div>
    </section>


</body>
</html>