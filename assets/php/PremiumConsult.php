<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/"> 
    <title> Premium | HelPath </title>
</head>
<body>
    <a href="NotIndex.php"> AKAKAKKA</a>
    <div>
        <form action="index.php" method="post" id="consult">
            <div class="box4">
                <h2 class="consult">Select the symptoms</h2>
                        <div class="symptom-container">
                            <div class="column">
                                <label><input type="checkbox" class="symptom-select" value="1" name="Symptom[]"> Diarrea </label><br>
                                <label><input type="checkbox" class="symptom-select" value="2" name="Symptom[]"> Fiebre </label><br>
                                <label><input type="checkbox" class="symptom-select" value="3" name="Symptom[]"> Náuseas </label><br>
                                <label><input type="checkbox" class="symptom-select" value="4" name="Symptom[]"> Vómito </label><br>
                            </div>
                            <div class="column1">
                                <label><input type="checkbox" class="symptom-select" value="5" name="Symptom[]"> Dolor abdominal </label><br>
                                <label><input type="checkbox" class="symptom-select" value="6" name="Symptom[]"> Dificultad para respirar </label><br>
                                <label><input type="checkbox" class="symptom-select" value="7" name="Symptom[]"> Tos </label><br>
                                <label><input type="checkbox" class="symptom-select" value="8" name="Symptom[]"> Dolor en el pecho </label><br>
                            </div>
                            <div class="column2">
                                <label><input type="checkbox" class="symptom-select" value="9" name="Symptom[]"> Cansancio </label><br>
                                <label><input type="checkbox" class="symptom-select" value="10" name="Symptom[]"> Pérdida de peso </label><br>
                                <label><input type="checkbox" class="symptom-select" value="11" name="Symptom[]"> Sed excesiva </label><br>
                                <label><input type="checkbox" class="symptom-select" value="12" name="Symptom[]"> Aumento de orina </label><br>
                            </div>
                            <div class="column3">
                                <label><input type="checkbox" class="symptom-select" value="13" name="Symptom[]"> Visión borrosa </label><br>
                                <label><input type="checkbox" class="symptom-select" value="14" name="Symptom[]"> Dolor de cabeza </label><br>
                                <label><input type="checkbox" class="symptom-select" value="15" name="Symptom[]"> Palpitaciones </label><br>
                                <label><input type="checkbox" class="symptom-select" value="16" name="Symptom[]"> Inflamación </label><br>
                            </div>
                            <div class="column4">
                                <label><input type="checkbox" class="symptom-select" value="17" name="Symptom[]"> Dolor en las articulaciones </label><br>
                                <label><input type="checkbox" class="symptom-select" value="18" name="Symptom[]"> Debilidad </label><br>
                                <label><input type="checkbox" class="symptom-select" value="19" name="Symptom[]"> Ictericia </label><br>
                                <label><input type="checkbox" class="symptom-select" value="20" name="Symptom[]"> Dolor de espalda </label><br>
                            </div>
                            <div class="column5">
                                <label><input type="checkbox" class="symptom-select" value="21" name="Symptom[]"> Estornudos </label><br>
                                <label><input type="checkbox" class="symptom-select" value="22" name="Symptom[]"> Congestión nasal </label><br>
                                <label><input type="checkbox" class="symptom-select" value="23" name="Symptom[]"> Dolor de garganta </label><br>
                                <label><input type="checkbox" class="symptom-select" value="24" name="Symptom[]"> Escalofríos </label><br>
                                <label><input type="checkbox" class="symptom-select" value="25" name="Symptom[]"> Erupciones </label><br>
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
</body>
</html>