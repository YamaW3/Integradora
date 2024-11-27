<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/reset-password.css">
    <title> Reset Password | HelPath </title>
</head>
<body>
    <div class="container">
        <h2> Reset Password </h2>
        <form action="process-reset-password.php" method="POST">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token']); ?>">
            <label for="password"> New Password: </label>
            <input type="password" name="password" id="password" required>
            <label for="password_confirmation"> Confirm Password: </label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
            <button type="submit"> Reset Password </button>
        </form>

        <a href="/SignUp-Login.html" class="return"> Return to Login </a>  
    </div>
</body>
</html>