<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($password, $usuario['password'])) {
            $_SESSION['usuario'] = $usuario['nombre'];
            header("Location: index.html");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - ARDUNOVA</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth-body">

    <main class="auth-page-wrapper">
        <article class="auth-card">
            
            <img src="imagen/logo.jpg" alt="Logo de ARDUNOVA" class="auth-logo">
            
            <h2>Iniciar sesión</h2>
            
            <form method="POST" class="w-100">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required autocomplete="email">
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required autocomplete="current-password">
                </div>

                <button type="submit" class="btn btn-gradient w-100 mt-1">Ingresar</button>
                
                <p class="auth-footer-text">
                    ¿No tenés cuenta? <a href="registro.php">Registrate</a>
                </p>
            </form>
            
        </article>
    </main>

    <footer class="main-footer">
        <div class="footer-bottom">
            <p>&copy; 2026 ARDUNOVA. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>