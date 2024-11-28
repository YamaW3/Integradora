<?php
session_start();
?>
<!DOCTYPE html>  
<html lang="en">  
<head> 
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="assets/css/main.css">  
    <title> HelPath </title>  
</head>  
<body> 

    <nav class="navbar">  
        <div> <img src="images/logo/Helpath.svg" width="150"> </div>  
        <div class="menu-icon" onclick="toggleMenu()"> ☰ </div>
        <ul class="nav-links">  
            <li><a href="#banner">Home</a></li>  
            <li><a href="AboutUs.php">AboutUs</a></li>
            <li><a href="Pricing.php">Pricing</a></li>  
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Solo mostrar este enlace si el usuario ha iniciado sesión -->
                <li><a href="FreeConsult.php">Consult</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="SignUp-Login.html">Login</a></li>
            <?php endif; ?>
        </ul>  
    </nav>

    <section id="banner">  
        <div>
            <video autoplay muted loop id="background-video">  
                <source src="images/background/sky.mp4" type="video/mp4">  
            </video> 
        </div>
        <h2> HELPATH </h2>  
        <p> Your ally in clear and precise diagnoses </p>  
        <div>
            <!-- Aquí mostramos un texto de bienvenida en lugar del botón -->
            <?php if (isset($_SESSION['user_name'])): ?>
                <p class="welcome-text">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
            <?php else: ?>
                <a href="SignUp-Login.html" class="button">Start Now!</a>
            <?php endif; ?>
        </div>  
    </section>  
    
    <div class="box1" id="about"> <!-- Cuadro blanco debajo de la barra de navegación -->  
        <p class="text"> Welcome to Helpath </p> 
        <p class="text1"> 
            HelPath is a health sector tool designed to enhance disease diagnosis, 
            improve diagnostic efficiency, reduce medical staff burden, increase 
            access to resources and minimize unnecessary medication. 
        </p> 
        <div class="div">
            <a href="Terms-Conditions.html" class="button-terms"> Terms and Conditions </a>
        </div>
    </div>  

    <footer id="footer" class="footer">
        <ul class="icons">
            <li><a href="https://x.com/byHelPath"><img src="/images/icons/twitter.svg"><span class="label"></span></a></li>
            <li><a href="https://web.facebook.com/profile.php?id=61568232181181"><img src="/images/icons/facebook.svg"><span class="label"></span></a></li>
            <li><a href="https://www.instagram.com/helpathito/"><img src="/images/icons/instagram.svg"><span class="label"></span></a></li>
            <li><a href="https://www.youtube.com/@HELPATH"><img src="/images/icons/youtube.svg"><span class="label"></span></a></li>
        </ul>
        <ul class="copyright">
            <li> &copy; Helpath. All rights reserved.</li><li><a href="AboutUs.html"> About us </a> | <a href="UsabilityEvaluation.html">Evaluation </a></li>
        </ul>
    </footer>

    <script src="assets/js/main.js"></script>

</body>  
</html>
