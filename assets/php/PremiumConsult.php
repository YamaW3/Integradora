<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/PremiumConsult.css"> 
    <title> Premium | HelPath </title>
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
            Premium Plan
        </p>
    </div>

    <section class="box1">
    <div class="container1">
        <form action="index.php" method="post" id="consult">
            <div class="box4">
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
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Reset" onclick="resetForm()">
                    <button class="button-diagnose" type="button" onclick="diagnosticar()">Diagnose</button>
                </div>
            </div>
        </form>
    </div>
    </section>

    <section class="box2">
        <div class="container2">
            <h2>Posibles enfermedades</h2>
            <div id="resultadosEnfermedades">
                <?php
                // Conexión a la base de datos
            $host = '127.0.0.1:3306';
                $dbname = 'u207088786_Seguridad';
                $username = 'u207088786_ItsTITIN';
                $password = 'Ju230905';
                $conexion = new mysqli($servername, $username, $password, $dbname);

                // Verificar la conexión
                if ($conexion->connect_error) {
                    die("Conexión fallida: " . $conexion->connect_error);
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $symptoms = $_POST['Symptom'];

                    if (!empty($symptoms)) {
                        $symptomList = implode(",", $symptoms);

                        // Consulta para obtener enfermedades
                        $sqlEnfermedades = "SELECT e.id_enfermedad, e.enf_nombre_tecnico, e.enf_nombre_comun, e.enf_riesgo, COUNT(es.id_sintoma) AS coincidencias
                                            FROM enfermedad e
                                            JOIN enfermedad_sintoma es ON e.id_enfermedad = es.id_enfermedad
                                            WHERE es.id_sintoma IN ($symptomList)
                                            GROUP BY e.id_enfermedad, e.enf_nombre_tecnico, e.enf_nombre_comun, e.enf_riesgo
                                            HAVING COUNT(es.id_sintoma) >= 2
                                            ORDER BY coincidencias DESC";

                        $resultadoEnfermedades = $conexion->query($sqlEnfermedades);

                        if (!$resultadoEnfermedades) {
                            die("Error en la consulta: " . $conexion->error);
                        }

                        echo "<table border='1'>
                                <tr>
                                    <th>ID Enfermedad</th>
                                    <th>Nombre Técnico</th>
                                    <th>Nombre Común</th>
                                    <th>Riesgo</th>
                                    <th>Coincidencias</th>
                                </tr>";

                        while ($value = $resultadoEnfermedades->fetch_assoc()) {
                            $rowClass = '';
                            if ($value['coincidencias'] = 5) {
                                $rowClass = 'green';
                            } elseif ($value['coincidencias'] == 4) {
                                $rowClass = 'blue';
                            }elseif ($value['coincidencias'] == 3) {
                                    $rowClass = 'amarillo';
                            }
                            echo "<tr class='$rowClass'>
                                    <td>" . $value['enf_nombre_tecnico'] . "</td>
                                    <td>" . $value['enf_nombre_comun'] . "</td>
                                    <td>" . $value['enf_riesgo'] . "</td>
                                    <td>" . $value['coincidencias'] . "</td>
                                </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Por favor, selecciona al menos un síntoma.";
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section class="box3">
        <div class="container3">
            <h2>Posibles medicamentos</h2>
            <div id="resultadosMedicamentos">
                <?php
                if (!empty($symptoms)) {
                    // Consulta para obtener medicamentos por enfermedad
                    $sqlMedicamentos = "SELECT *
                                        FROM(
                                        SELECT e.enf_nombre_comun, m.medicamento_nombre, m.tipo
                                        FROM enfermedad e
                                        JOIN enfermedad_medicamento me ON e.id_enfermedad = me.id_enfermedad
                                        JOIN medicamento m ON me.id_medicamento = m.id_medicamento
                                        JOIN enfermedad_sintoma es ON e.id_enfermedad = es.id_enfermedad
                                        WHERE es.id_sintoma IN ($symptomList)
                                        GROUP BY e.enf_nombre_comun, m.medicamento_nombre, m.tipo
                                        HAVING COUNT(es.id_sintoma) >= 2
                                        ORDER BY coincidenciasMed Desc
                                        ) AS Subconsulta;";
                    $resultadoMedicamentos = $conexion->query($sqlMedicamentos);
                    if (!$resultadoMedicamentos) {
                        die("Error en la consulta: " . $conexion->error);
                    }
                    echo "<table border='1'>
                            <tr>
                                <th>Enfermedad</th>
                                <th>Nombre Medicamento</th>
                                <th>Tipo</th>
                            </tr>";
                    while ($value = $resultadoMedicamentos->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $value['enf_nombre_comun'] . "</td>
                                <td>" . $value['medicamento_nombre'] . "</td>
                                <td>" . $value['tipo'] . "</td>
                            </tr>";
                    }
                    echo "</table>";
                    $conexion->close();
                }
            
                ?>
            </div>
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
            <li> &copy; Helpath. All rights reserved.</li><li><a href="AboutUs.html"> About us </a>  | <a href="UsabilityEvaluation.html">Evaluation </a></li>
        </ul>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>