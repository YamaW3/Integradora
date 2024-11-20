<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pswd'];
    $password_confirmation = $_POST['pswd_confirmation'];

    if ($password !== $password_confirmation) {
        die("Las contraseñas no coinciden");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();

        // Guardar datos en la sesión y redirigir
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['user_name'] = $name;
        header("Location: home.php");
        exit();

    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            echo "El correo ya está registrado. Usa otro.";
        } else {
            echo "Error en el registro: " . $e->getMessage();
        }
    }
}
?>

