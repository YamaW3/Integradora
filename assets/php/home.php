<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Página de Inicio</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
    <p>Has iniciado sesión exitosamente.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>

