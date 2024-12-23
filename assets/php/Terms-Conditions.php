<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/Terms-Conditions.css">
    <title> Our Terms | HelPath</title>
</head>
<body>
    <nav class="navbar">  
        <div> <img src="/images/logo/Helpath.svg" width="150"> </div>  
        <div class="menu-icon" onclick="toggleMenu()"> ☰ </div>
        <ul class="nav-links" >  
            <li><a href="index.php"> Home </a></li>  
            <li><a href="AboutUs.php"> About Us </a></li> 
            <li><a href="Pricing.html"> Pricing </a></li>  
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Solo mostrar este enlace si el usuario ha iniciado sesión -->
                <li><a href="FreeConsult.php">Consult</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="SignUp-Login.html">Login</a></li>
            <?php endif; ?>
        </ul>  
    </nav> 

    <section id="box">
        <div>
            <video autoplay muted loop id="background-video">  
                <source src="/images/background/sky.mp4" type="video/mp4">  
            </video> 
        </div>
    </section>

    <div class="box"> 
        <p class="text">
            Our Terms and Conditions
        </p>
    </div>

    <section class="box2">
        <div>
            <h2> Welcome to our Terms and Conditions </h2>
            <p> 
                This page presents the terms and conditions outline the rules and 
                regulations for the use of HelPath's services and website, 
                located at https://helpath.site/. By accessing this website, 
                we assume you accept these terms and conditions. 
                Do not continue to use HelPath if you do not agree to 
                take all of the terms and conditions stated on this page.
                <br>
            </p>

            <h3> License </h3>
            <p>
                Unless otherwise stated, HelPath and/or its licensors own 
                the intellectual property rights for all material on HelPath. 
                All intellectual property rights are reserved. You may access 
                this from HelPath for your own personal use subjected to 
                restrictions set in these terms and conditions.
                <br>
                You must not:
                <ul>
                    <li> Republish material from HelPath. </li>
                    <li> Sell, rent or sub-license material from HelPath. </li>
                    <li> Reproduce, duplicate, or copy material from HelPath. </li>
                    <li> Redistribute content from HelPath. </li>
                </ul>
            </p>

            <h3> Modifications </h3>
            <p> 
                We reserve the right to modify these terms and conditions at any time. 
                If we make changes, we will notify you by updating the date at the top 
                of these terms.
            </p>

            <h3> Contact </h3>
            <p>
                If you have any questions or concerns about these terms and conditions, 
                please contact us at soporte@helpath.site.
            </p>
        </div>
    </section>   

    <footer id="footer" class="footer">
        <ul class="icons">
            <li><a href="https://x.com/byHelPath"><img src="/images/icons/twitter.svg"><span class="label"></span></a></li>
            <li><a href="https://web.facebook.com/profile.php?id=61568232181181"><img src="/images/icons/facebook.svg"><span class="label"></span></a></li>
            <li><a href="https://www.instagram.com/helpathito/"><img src="/images/icons/instagram.svg"><span class="label"></span></a></li>
            <li><a href="https://www.youtube.com/@HELPATH"><img src="/images/icons/youtube.svg"><span class="label"></span></a></li>
        </ul>
        <ul class="copyright">
            <li id="footer"> &copy; Helpath. All rights reserved.</li><li id="footer"> <a href="UsabilityEvaluation.html">Evaluation. </a></li>
        </ul>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>