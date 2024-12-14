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
        <p>Welcome to our wellness haven, where vitality intersects with enthusiasm! At W3GYM, we view fitness as not merely a practice; it’s a way of life.<br>
Our advanced facilities are intended to serve all individuals, from novices making their initial moves towards a healthier lifestyle to experienced athletes aiming for optimal performance.<br>
We provide an extensive selection of equipment, classes, and customized training plans designed to suit your individual fitness objectives.<br>
Our expert trainers are committed to equipping you with the resources, insights, and encouragement needed to reach your potential.<br>
Regardless of whether your goal is to enhance strength, boost endurance, or just sustain a balanced way of living, we are here to support you at each stage.<br>
We emphasize building an inclusive and supportive community where all individuals feel embraced and motivated.<br>
At 3GYM, we extend our focus past just physical fitness. We are dedicated to fostering a comprehensive perspective on health that encompasses mental wellness and nutrition.<br>
Through workshops, wellness activities, and expert guidance, we guarantee that you are prepared to lead your healthiest lifestyle both in and out of the gym.<br>
Safety and cleanliness are central to our activities. Our establishment is consistently cleaned and disinfected to provide a safe space for all members.<br>
Additionally, our welcoming team is always on hand to help you with any issues, ensuring your gym experience is as seamless and pleasant as it can be.<br>
Join us now and initiate your path to transforming your health and wellness journey.<br> 
At W3GYM, your aspirations align with ours, and together, we will assist you in achieving new milestones.</p>
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
                <img src="assets/mgakaGrupo/michael.jpg" alt="Michael Caliguia" width="180" length="180">
                <p><a class="email-button" href="mailto:michaelcaliguia089@gmail.com?subject=Subject%20of%20the%20Email&body=Body%20of%20the%20Email">
                Michael Angelo Caliguia
            </a></p>
            </div>
            <div class="team">
            <img src="assets/mgakaGrupo/jean.jpg" alt="">
            <p><a class="email-button" href="mailto:202311114@gordoncollege.edu.ph?subject=Subject%20of%20the%20Email&body=Body%20of%20the%20Email">
                Jean Lanierod Carlos
            </a></p>
            </div>
            <div class="team">
            <img src="assets/mgakaGrupo/carlo.png" alt="Jay Carlo Dimapilis" width="180" length="180">
            <p><a class="email-button" href="mailto:202310935@gordoncollege.edu.ph?subject=Subject%20of%20the%20Email&body=Body%20of%20the%20Email">
                Jay Carlo Dimapilis
            </a></p>
            </div>
            <div class="team">
                <img src="assets/mgakaGrupo/nicolas.jpg" alt="">
                <p><a class="email-button" href="mailto:202311511@gordoncollege.edu.ph?subject=Subject%20of%20the%20Email&body=Body%20of%20the%20Email">
                Carl Nicolas Navarro
            </a></p>
            </div>
            <div class="team">
                <img src="assets/mgakaGrupo/lhar.jpg" alt="">
                <p><a class="email-button" href="mailto:202311643@gordoncollege.edu.ph?subject=Subject%20of%20the%20Email&body=Body%20of%20the%20Email">
                Lhar Jashtine Militante
            </a></p>
            </div>
        </div>
    </section>

    <section class="Contacts" id="contact">
    <h2>Contacts</h2>
        <div class="team">
            <a class="email-button" href="mailto:w3Gym@gmail.com?subject=Subject%20of%20the%20Email&body=Body%20of%20the%20Email">
            </a>
        </div>
    </section>

</body>
</html>