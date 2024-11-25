<?php
$host = '127.0.0.1:3306';
$dbname = 'u207088786_Seguridad';
$username = 'u207088786_ItsTITIN';
$password = 'Ju230905'; //  // Reemplaza con tu contraseña de MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
?>