<?php
// Inicia la sesión
session_start();

// Conecta a la base de datos
$host = '127.0.0.1:3306';
$dbname = 'u207088786_Seguridad';
$username = 'u207088786_ItsTITIN';
$password = 'Ju230905'; //  // Reemplaza con tu contraseña de MySQL

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $captcha = $_POST['captcha'];

    // Verifica el CAPTCHA
    if ($captcha == "7") {
        // Verifica si el correo electrónico existe en la base de datos
        $sql = "SELECT id FROM usuarios WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Genera un token único
            $token = bin2hex(random_bytes(50));

            // Almacena el token en la base de datos
            $sql = "UPDATE usuarios SET token='$token' WHERE email='$email'";
            if ($conn->query($sql) === TRUE) {
                // Envía el enlace de recuperación al correo electrónico del usuario
                $to = $email;
                $subject = "Recuperación de contraseña";
                $message = "Haz clic en el siguiente enlace para restablecer tu contraseña: ";
                $message .= "http://tu_sitio_web.com/reset-password.php?token=$token";
                $headers = "From: no-reply@tu_sitio_web.com";

                if (mail($to, $subject, $message, $headers)) {
                    echo "Se ha enviado un enlace de recuperación a tu correo electrónico.";
                } else {
                    echo "Error al enviar el correo electrónico.";
                }
            } else {
                echo "Error al actualizar el token.";
            }
        } else {
            echo "El correo electrónico no está registrado.";
        }
    } else {
        echo "CAPTCHA incorrecto.";
    }
}

$conn->close();
?>
