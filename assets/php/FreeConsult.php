<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/FreeConsult.css">  
    <title> Basic Plan | HelPath </title>
</head>
<body>

    <nav class="navbar">  
        <div> <img src="/images/logo/Helpath.svg" width="150"> </div>  
        <div class="menu-icon" onclick="toggleMenu()"> ☰ </div>
        <ul class="nav-links" >  
            <li><a href="/index.html"> Home </a></li>  
            <li><a href="/index.html"> About </a></li>
            <li><a href="/assets/html/consult.html"> Consult </a></li>  
            <li><a href="/assets/html/Pricing.html"> Pricing </a></li>  
            <li><a href="/index.html"> Support </a></li>  
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
            Basic Plan
        </p>
    </div>

    <section class="box1">
    <div class="container1">
        <form action="NotIndex.php" method="post" id="consult">
            <div>
                <h2 class="consult">Select the symptoms</h2>
                <div class="symptom-container">
                    <div class="column">
                        <label><input type="checkbox" class="symptom-select" value="1" name="Symptom[]"> Diarrhea </label><br>
                        <label><input type="checkbox" class="symptom-select" value="2" name="Symptom[]"> Fever </label><br>
                        <label><input type="checkbox" class="symptom-select" value="3" name="Symptom[]"> Nausea </label><br>
                        <label><input type="checkbox" class="symptom-select" value="4" name="Symptom[]"> Vomit </label><br>
                        <label><input type="checkbox" class="symptom-select" value="5" name="Symptom[]"> Abdominal pain </label><br>
                        <label><input type="checkbox" class="symptom-select" value="6" name="Symptom[]"> Difficulty breathing </label><br>
                        <label><input type="checkbox" class="symptom-select" value="7" name="Symptom[]"> Cough </label><br>
                        <label><input type="checkbox" class="symptom-select" value="8" name="Symptom[]"> Chest pain </label><br>
                    </div>
                    <div class="column">
                        <label><input type="checkbox" class="symptom-select" value="9" name="Symptom[]"> Fatigue </label><br>
                        <label><input type="checkbox" class="symptom-select" value="10" name="Symptom[]"> Weight loss </label><br>
                        <label><input type="checkbox" class="symptom-select" value="11" name="Symptom[]"> Excessive thirst </label><br>
                        <label><input type="checkbox" class="symptom-select" value="12" name="Symptom[]"> Increased urine output </label><br>
                        <label><input type="checkbox" class="symptom-select" value="13" name="Symptom[]"> Blurry vision </label><br>
                        <label><input type="checkbox" class="symptom-select" value="14" name="Symptom[]"> Headache </label><br>
                        <label><input type="checkbox" class="symptom-select" value="15" name="Symptom[]"> Palpitations </label><br>
                        <label><input type="checkbox" class="symptom-select" value="16" name="Symptom[]"> Inflammation </label><br>
                        <label><input type="checkbox" class="symptom-select" value="17" name="Symptom[]"> Joint pain </label><br>
                    </div>
                    <div class="column">
                        <label><input type="checkbox" class="symptom-select" value="18" name="Symptom[]"> Weakness </label><br>
                        <label><input type="checkbox" class="symptom-select" value="19" name="Symptom[]"> Jaundice </label><br>
                        <label><input type="checkbox" class="symptom-select" value="20" name="Symptom[]"> Backache </label><br>
                        <label><input type="checkbox" class="symptom-select" value="21" name="Symptom[]"> Sneezing </label><br>
                        <label><input type="checkbox" class="symptom-select" value="22" name="Symptom[]"> Nasal congestion </label><br>
                        <label><input type="checkbox" class="symptom-select" value="23" name="Symptom[]"> Sore throat </label><br>
                        <label><input type="checkbox" class="symptom-select" value="24" name="Symptom[]"> Shivers </label><br>
                        <label><input type="checkbox" class="symptom-select" value="25" name="Symptom[]"> Eruptions </label><br>
                    </div>
                </div>
                <div class="button-container">
                    <input type="submit" value="Send">
                    <input type="reset" value="Reset" onclick="resetForm()">
                    <button class="button-diagnose" type="button" onclick="diagnosticar()">Diagnose</button>
                </div>
            </div>
        </form>
    </div>
    </section>
 

    <section class="box2">
        <div class="container2"> 
            <h2> Possible diseases </h2>
            <div id="resultadosEnfermedades">
                
            </div>
        </div>
    </section>

    <section class="box3">
        <div class="container3">
            <h2> Possible medications </h2>
            <div id="resultadosMedicamentos"></div>
        </div>
    </section>

    <script src="/assets/js/main.js"></script>
</body>
</html>